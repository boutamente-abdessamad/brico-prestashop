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

include_once(__DIR__ . '/src/PosStaticblockRepository.php');
include_once(__DIR__ . '/data/demoData.php');
include_once(__DIR__ . '/src/Staticblocks.php');

class PosStaticblocks extends Module implements WidgetInterface
{
    protected $_html;
    protected $_display;
    private $posStaticblockRepository;

    public $templateFile;

    public function __construct()
    {
        $this->name = 'posstaticblocks';
        $this->author = 'Posthemes';
        $this->version = '1.0.0';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Pos Static Blocks', array(), 'Modules.Linklist.Admin');
        $this->description = $this->trans('Adds a static block.', array(), 'Modules.Linklist.Admin');
        $this->secure_key = Tools::encrypt($this->name);

        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
        $this->templateFile = 'module:posstaticblocks/views/templates/hook/staticblocks.tpl';

        $this->posStaticblockRepository = new PosStaticblockRepository(Db::getInstance(), $this->context->shop, $this->context->getTranslator());
    }

    public function install()
    {
        $sample_data = new demoData();
        return parent::install()
            && $this->installTab()
            && $this->posStaticblockRepository->createTables()         
			&& $this->registerHook('displayBannersequence')
			&& $this->registerHook('displayNav')
			&& $this->registerHook('displayHome')
			&& $this->registerHook('displayContainertop')
			&& $this->registerHook('displayContainertop2')
            && $this->registerHook('displayFulltop')
			&& $this->registerHook('displayFulltop2')
			&& $this->registerHook('displayContainerbottom')
			&& $this->registerHook('displayContainerbottom2')
		    && $this->registerHook('displayFullbottom')
			&& $this->registerHook('displayFullbottom2') 
			&& $sample_data->initData();
            //&& $this->registerHook('actionUpdateLangAfter');
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->uninstallTab()
            && $this->posStaticblockRepository->dropTables();
    }

    public function installTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminPosStaticblocks";
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = "Pos Staticblocks";
        }
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentThemes');
        $tab->module = $this->name;
        return $tab->add();
    }

    public function uninstallTab()
    {
        $id_tab = (int)Tab::getIdFromClassName('AdminPosStaticblocks');
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
            $this->context->link->getAdminLink('AdminPosStaticblocks')
        );
    }

    public function renderWidget($hookName, array $configuration)
    {
        $key = 'ps_linklist|' . $hookName;

        if (!$this->isCached($this->templateFile, $this->getCacheId($key))) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }

        return $this->fetch($this->templateFile, $this->getCacheId($key));
    }

    public function getWidgetVariables($hookName, array $configuration)
    {
        $id_hook = Hook::getIdByName($hookName);

        $linkBlocks = $this->posStaticblockRepository->getByIdHook($id_hook);
        //echo '<pre>'; print_R($hookName);die;
		foreach ($linkBlocks as &$block) {
            $block['content'] = str_replace('/pos_madina/',__PS_BASE_URI__,$block['content']);
        }
        return array(
            'linkBlocks' => $linkBlocks
        );
    }
}
