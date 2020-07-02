<?php
/*
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2016 PrestaShop SA
 *  @version  Release: $Revision: 7060 $
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

 use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

 if (!defined('_CAN_LOAD_FILES_')) {
     exit;
 }

include_once(__DIR__ . '/src/FooterBlockRepository.php');
include_once(__DIR__ . '/src/FooterBlock.php');
include_once(__DIR__ . '/src/FooterBlockPresenter.php');
include_once(__DIR__ . '/data/demoDataFooter.php');

class PosStaticfooter extends Module implements WidgetInterface
{
    protected $_html;
    protected $_display;
    private $footerBlockPresenter;
    private $footerBlockRepository;

    public $templateFile;

    public function __construct()
    {
        $this->name = 'posstaticfooter';
        $this->author = 'PrestaShop';
        $this->version = '2.1.5';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Pos Static Footer', array(), 'Modules.Linklist.Admin');
        $this->description = $this->trans('Create the footer for your website.', array(), 'Modules.Linklist.Admin');
        $this->secure_key = Tools::encrypt($this->name);

        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
        $this->templateFile = 'module:posstaticfooter/views/templates/hook/staticfooter.tpl';

        $this->footerBlockPresenter = new FooterBlockPresenter(new Link(), $this->context->language);
        $this->footerBlockRepository = new FooterBlockRepository(Db::getInstance(), $this->context->shop, $this->context->getTranslator());
    }

    public function install()
    {
        $sample_data = new demoDataFooter();
        return parent::install()
            && $this->installTab()
            && $this->footerBlockRepository->createTables()
		    && $this->registerHook('displayFooterTop')
			&& $this->registerHook('displayFooterBottom')
            && $this->registerHook('displayFooter')
            && $this->registerHook('displayFooterBefore')
            && $this->registerHook('displayFooterAfter')
			&& $sample_data->initData();
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->uninstallTab()
            && $this->footerBlockRepository->dropTables();
    }

    public function installTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminStaticFooter";
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = "Pos Staticfooter";
        }
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentThemes');
        $tab->module = $this->name;
        return $tab->add();
    }

    public function uninstallTab()
    {
        $id_tab = (int)Tab::getIdFromClassName('AdminStaticFooter');
        $tab = new Tab($id_tab);
        return $tab->delete();
    }

    public function _clearCache($template, $cache_id = null, $compile_id = null)
    {
        parent::_clearCache($this->templateFile);
    }

    public function getContent()
    {
        Tools::redirectAdmin(
            $this->context->link->getAdminLink('AdminStaticFooter')
        );
    }

    public function renderWidget($hookName, array $configuration)
    {
        $key = 'posstaticfooter|' . $hookName;

        if (!$this->isCached($this->templateFile, $this->getCacheId($key))) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }

        return $this->fetch($this->templateFile, $this->getCacheId($key));
    }

    public function getWidgetVariables($hookName, array $configuration)
    {
        $id_hook = Hook::getIdByName($hookName);

        $footerBlocks = $this->footerBlockRepository->getByIdHook($id_hook);

        $blocks = array();
        foreach ($footerBlocks as $block) {
            $blocks[] = $this->footerBlockPresenter->present($block);
        }
        foreach ($blocks as &$block) {
            $block['html_content'] = str_replace('/pos_madina/',__PS_BASE_URI__,$block['html_content']);
        }
        return array(
            'footerBlocks' => $blocks
        );
    }
    public function getHooksByModuleId($id_module) {
        $id_shop = (int)Context::getContext()->shop->id;
        $sql = 'SELECT * FROM '._DB_PREFIX_.'hook_module AS `ps` LEFT JOIN '._DB_PREFIX_.'hook AS `ph` ON `ps`.`id_hook` = `ph`.`id_hook`  WHERE (lower(ph.`name`) LIKE "display%") AND `ps`.`id_module`='.$id_module .' AND `ps`.`id_shop` = '.$id_shop;
        $hooks = array();
         if($object = Db::getInstance()->ExecuteS($sql)){
             if(count($object)>0) {
                 foreach($object as $module_hook) {
                    if(isset($module_hook['name']))
                        $hooks[] = $module_hook['name'];
                 }
             }
            
         }
         return $hooks; 
   }
    public function getPosCurrentHook($name_module) {
        $id_shop = (int)Context::getContext()->shop->id;
        $sql = 'SELECT psb.`hook_module` FROM '._DB_PREFIX_.'posstaticfooter AS psb LEFT JOIN '._DB_PREFIX_.'posstaticfooter_shop AS pss ON psb.`id_posstaticfooter`= pss.`id_posstaticfooter` WHERE  psb.`name_module` ="'.$name_module.'" AND pss.`id_shop` = "'.$id_shop.'"';
        return Db::getInstance()->getRow($sql);
   }
}
