<?php
/**
* 2007-2014 PrestaShop
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2014 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

include_once(_PS_MODULE_DIR_.'posmegamenu/classes/PosMegamenuClass.php');
include_once(_PS_MODULE_DIR_.'posmegamenu/classes/PosMegamenuSubmenuClass.php');
include_once(_PS_MODULE_DIR_.'posmegamenu/classes/PosMegamenuSubmenuRowClass.php');
include_once(_PS_MODULE_DIR_.'posmegamenu/classes/PosMegamenuSubmenuColumnClass.php');
include_once(_PS_MODULE_DIR_.'posmegamenu/classes/PosMegamenuSubmenuItemClass.php');
include_once(_PS_MODULE_DIR_.'posmegamenu/sql/posSampleDataMenu.php');

class Posmegamenu extends Module 
{	

	private $html = '';
	
	public function __construct()
	{	
		$this->name = 'posmegamenu';
		$this->tab = 'front_office_features';
		$this->version = '1.1.2';
		$this->author = 'Pposthemes';
		$this->need_instance = 1;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->l('Megamenu custommer');
		$this->description = $this->l('Megamenu custommer module');
		$this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
		$this->secure_key = Tools::encrypt($this->name);
	}

	public function install()
	{
		Configuration::updateValue($this->name . '_bg', 1);
        Configuration::updateValue($this->name . '_bg_color', 0);
        Configuration::updateValue($this->name . '_bg_image', '');
        Configuration::updateValue($this->name . '_bg_repeat', 1);
        Configuration::updateValue($this->name . '_sticky', 1);
        Configuration::updateValue($this->name . '_center', 0);
        Configuration::updateValue($this->name . '_sub_animation', 2);
        Configuration::updateValue($this->name . '_css', '');

		if (parent::install() &&
			$this->registerHook('header') &&
			$this->registerHook('displayMegamenu') &&
			$this->registerHook('actionShopDataDuplication') &&
			$this->registerHook('actionObjectLanguageAddAfter'))
			{
				include(dirname(__FILE__).'/sql/install.php');
				$sample_data = new PosSampleDataMenu();
			    $sample_data->initData();
				$this->generateCss();
				return true;
			}
		return false;
	}

	public function uninstall()
	{
		Configuration::deleteByName($this->name . '_bg', 1);
        Configuration::deleteByName($this->name . '_bg_color', 0);
        Configuration::deleteByName($this->name . '_bg_image', '');
        Configuration::deleteByName($this->name . '_bg_repeat', 1);
        Configuration::deleteByName($this->name . '_sticky', 0);
        Configuration::deleteByName($this->name . '_center', 0);
        Configuration::deleteByName($this->name . '_sub_animation', 1);
        Configuration::deleteByName($this->name . '_css', '');
        
		$tab = new Tab((int)Tab::getIdFromClassName('Adminposmegamenu'));
        $tab->delete();	
		include(dirname(__FILE__).'/sql/uninstall.php');
			return parent::uninstall();
		return false;	
	}
	
	public function getContent()
	{
		if (Tools::isSubmit('submitMenuItem') || Tools::isSubmit('delete_id_menu') || Tools::isSubmit('changeStatus') || Tools::isSubmit('removeIcon'))
		{
			$this->_postProcess();
			$this->html .= $this->renderList();
		}
		elseif (Tools::isSubmit('buildMenu') && Tools::isSubmit('id_posmegamenu_item') )
		{
			$this->_postProcess();
			$this->html .= $this->renderBuildMenu();
		}
		elseif (Tools::isSubmit('addMenu') || Tools::isSubmit('editMenu'))
			$this->html .= $this->renderAddForm();
		else
		{
			$this->_postProcess();
			$this->context->smarty->assign('module_dir', $this->_path);
			$this->html .= $this->renderList();
		}
		return $this->html;
	}
	

	public function renderList()
	{	
		if (Shop::getContext() == Shop::CONTEXT_GROUP || Shop::getContext() == Shop::CONTEXT_ALL) return '<p class="alert alert-warning">'.
			$this->l('You have to configure this module for each shop').
		'</p>';
		$this->context->controller->addJqueryUI('ui.sortable');
		$this->context->controller->addCSS($this->_path.'views/css/back.css');
		$this->context->controller->addJS($this->_path.'views/js/jquery.colorpicker.js');
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		$info_menus = $this->getMenuInfo();

		foreach ($info_menus as $key => $info_menu)
		{
			$info_menus[$key]['status'] = $this->displayStatus($info_menu['id_posmegamenu_item'], $info_menu['active']);
		}
		$menu_config = $this->getMenuConfig();
		//echo '<pre>'; print_r($menu_config);die;
		$this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'info_menus' => $info_menus,
				'url_base' => $this->context->shop->physical_uri.$this->context->shop->virtual_uri,
				'secure_key' => $this->secure_key,
				'menu_config' => $menu_config
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/list.tpl');
	}

	public function displayStatus($id_posmegamenu_item, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		$html = '<a class="btn '.$class.'" href="'.AdminController::$currentIndex.
			'&configure='.$this->name.'
				&token='.Tools::getAdminTokenLite('AdminModules').'
				&changeStatus&id_posmegamenu_item='.(int)$id_posmegamenu_item.'" title="'.$title.'"><i class="'.$icon.'"></i> '.$title.'</a>';

		return $html;
	}
	
	public function getMenuInfo($active = null)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pi.*, pil.*
			FROM '._DB_PREFIX_.'posmegamenu_item pi
			LEFT JOIN '._DB_PREFIX_.'posmegamenu_item_lang pil ON pi.id_posmegamenu_item = pil.id_posmegamenu_item 
			LEFT JOIN '._DB_PREFIX_.'posmegamenu_item_shop pis ON pi.id_posmegamenu_item = pis.id_posmegamenu_item 
			WHERE pis.id_shop = '.$id_shop.' AND pil.id_lang = '.$id_lang.($active ? ' AND pi.`active` = 1' : ' ').' ORDER BY pi.position ASC, pi.id_posmegamenu_item ASC'
		);
	}
	public function getMenuConfig(){
		$fields = array(
            'posmegamenu_bg'            => Configuration::get('posmegamenu_bg'),
            'posmegamenu_bg_color'      => Configuration::get('posmegamenu_bg_color'),
            'posmegamenu_bg_image'      => Configuration::get('posmegamenu_bg_image'),
            'posmegamenu_bg_repeat'     => Configuration::get('posmegamenu_bg_repeat'),
            'posmegamenu_sticky'        => Configuration::get('posmegamenu_sticky'),
            'posmegamenu_center'        => Configuration::get('posmegamenu_center'),
            'posmegamenu_sub_animation' => Configuration::get('posmegamenu_sub_animation'),
            'posmegamenu_css'           => Configuration::get('posmegamenu_css'),

        );
        return $fields;
	}
	protected function _postProcess()
	{
		$errors = array();
		if(Tools::isSubmit('submitMenu')){
			Configuration::updateValue('posmegamenu_bg', Tools::getValue('posmegamenu_bg'));
            Configuration::updateValue('posmegamenu_bg_color', Tools::getValue('posmegamenu_bg_color'));
            Configuration::updateValue('posmegamenu_bg_image', Tools::getValue('posmegamenu_bg_image'));
            Configuration::updateValue('posmegamenu_bg_repeat', Tools::getValue('posmegamenu_bg_repeat'));
            Configuration::updateValue('posmegamenu_sticky', Tools::getValue('posmegamenu_sticky'));
            Configuration::updateValue('posmegamenu_center', Tools::getValue('posmegamenu_center'));
            Configuration::updateValue('posmegamenu_sub_animation', Tools::getValue('posmegamenu_sub_animation'));
            Configuration::updateValue('posmegamenu_css', Tools::getValue('posmegamenu_css'));
		}
		elseif (Tools::isSubmit('submitMenuItem'))
		{
			$this->_clearCache('posmegamenu.tpl');

			if (Tools::getValue('id_posmegamenu_item'))
			{
				$menu_item = new PosMegamenuClass((int)Tools::getValue('id_posmegamenu_item'));
				if (!Validate::isLoadedObject($menu_item))
				{
					$this->html .= $this->displayError($this->l('Invalid id_posmegamenu_item'));
					return false;
				}
			}
			else{
				$menu_item = new PosMegamenuClass();
			}
			
			
			$menu_item->active = (int)Tools::getValue('active');
			$menu_item->type_link = Tools::getValue('type_link');
			$menu_item->link = Tools::getValue('link');
			$menu_item->type_icon = Tools::getValue('type_icon');
			$menu_item->icon_class = Tools::getValue('icon_class');
			$menu_item->icon = Tools::getValue('icon_img');

			$menu_item->item_class  = Tools::getValue('item_class');
			//var_dump(Tools::getValue('item_class')
			$menu_item->new_window  = Tools::getValue('new_window');
			$menu_item->submenu_type  = Tools::getValue('submenu_type');

			$menu_item->item_bg_color  = Tools::getValue('bgcolor');
			$menu_item->item_bg_colorh  = Tools::getValue('bgcolor_hover');
			$menu_item->item_color  = Tools::getValue('link_color');
			$menu_item->item_colorh  = Tools::getValue('color_hover');
			$menu_item->item_fontsize  = Tools::getValue('fontsize');
			$menu_item->item_lineheight  = Tools::getValue('lineheight');
			$menu_item->item_transform  = Tools::getValue('transform');
			$menu_item->subtitle_bg_color  = Tools::getValue('subtitle_bgcolor');
			$menu_item->subtitle_color  = Tools::getValue('subtitle_color');
			$menu_item->subtitle_fontsize  = Tools::getValue('subtitle_fontsize');
			$menu_item->subtitle_lineheight  = Tools::getValue('subtitle_lineheight');
			$menu_item->subtitle_transform  = Tools::getValue('subtitle_transform');
			
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{	
				
				$menu_item->title[$language['id_lang']] = Tools::getValue('title_'.$language['id_lang']);
				$menu_item->custom_link[$language['id_lang']] = Tools::getValue('custom_link_'.$language['id_lang']);
				$menu_item->subtitle[$language['id_lang']] = Tools::getValue('subtitle_'.$language['id_lang']);	
			}
			if (!$errors)
			{
				if (!Tools::getValue('id_posmegamenu_item'))
				{
					$menu_item->position = PosMegamenuClass::getLastPosition()+1;
					if (!$menu_item->add())
					{
						$errors[] = $this->displayError($this->l('The menu_item could not be added.'));
						
						Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
					}
					$this->generateCss();
				}
				else
				{
					if (!$menu_item->update())
					{
						$errors[] = $this->displayError($this->l('The menu_item could not be updated.'));
						Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
					}
					$this->generateCss();
				}
			}
			return $errors;
		}
		elseif (Tools::isSubmit('changeStatus') && Tools::isSubmit('id_posmegamenu_item'))
		{
			$this->_clearCache('posmegamenu.tpl');
			$menu = new PosMegamenuClass((int)Tools::getValue('id_posmegamenu_item'));
			if ($menu->active == 0)
				$menu->active = 1;
			else
				$menu->active = 0;
			$res = $menu->update();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=6&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		}
		elseif (Tools::isSubmit('delete_id_menu'))
		{
			$this->_clearCache('posmegamenu.tpl');
			$menu_item = new PosMegamenuClass((int)Tools::getValue('delete_id_menu'));
			$res = $menu_item->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else{
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_posmegamenu_item='.Tools::getValue('id_posmegamenu_item'));
				$this->generateCss();
			}
		}
		elseif(Tools::isSubmit('submitSubmenu')){
			$submenu_item = new PosMegamenuSubmenuClass((int)Tools::getValue('id_posmegamenu_item'));	
			
			$submenu_item->id_posmegamenu_item = (int)Tools::getValue('id_posmegamenu_item');
			$submenu_item->submenu_width = (int)Tools::getValue('submenu_width');
			$submenu_item->submenu_class = Tools::getValue('submenu_class');
			$submenu_item->submenu_bg = Tools::getValue('submenu_bg');
			$submenu_item->submenu_bg_color = Tools::getValue('submenu_bg_color');
			$submenu_item->submenu_bg_image = Tools::getValue('submenu_bg_image');
			$submenu_item->submenu_bg_repeat = (int)Tools::getValue('submenu_bg_repeat');
			$submenu_item->submenu_bg_position  = (int)Tools::getValue('submenu_bg_position');

			$submenu_item->submenu_title_color  = Tools::getValue('submenu_title_color');
			$submenu_item->submenu_title_colorh  = Tools::getValue('submenu_title_colorh');
			$submenu_item->submenu_title_fontsize  = (int)Tools::getValue('submenu_title_fontsize');
			$submenu_item->submenu_title_lineheight  = (int)Tools::getValue('submenu_title_lineheight');
			$submenu_item->submenu_title_transform  = (int)Tools::getValue('submenu_title_transform');
			$submenu_item->submenu_link_color  = Tools::getValue('submenu_link_color');
			$submenu_item->submenu_link_colorh  = Tools::getValue('submenu_link_colorh');
			$submenu_item->submenu_link_fontsize  = (int)Tools::getValue('submenu_link_fontsize');
			$submenu_item->submenu_link_lineheight  = (int)Tools::getValue('submenu_link_lineheight');
			$submenu_item->submenu_link_transform  = (int)Tools::getValue('submenu_link_transform');
			
			if (!$errors)
			{
				$submenu_item->update();
				$this->generateCss();
			}
			return $errors;
		}
		
	}
	
	public function renderAddForm()
	{
		$this->context->controller->addJS($this->_path.'views/js/jquery.colorpicker.js');
		$this->context->controller->addJS($this->_path.'views/js/admin.js');
		$this->context->controller->addCSS($this->_path.'views/css/back.css');
		$id_posmegamenu_item = Tools::getValue('id_posmegamenu_item');
		if (isset($id_posmegamenu_item))
			$menu = new PosMegamenuClass($id_posmegamenu_item);
		else
			$menu = new PosMegamenuClass();
		//echo '<pre>'; print_r($menu);die;
		$languages = $this->context->controller->getLanguages();
		$this->context->smarty->assign(
			array(
				'languages' => $languages,
				'id_language' => (int)$this->context->language->id,
				'token' => Tools::getAdminTokenLite('AdminModules'),
				'all_options' => $this->getAllDefaultLink(),
				'menu' => $menu,
				'image_baseurl' => $this->_path.'views/img/icons/',
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/menu_item.tpl');
	}
	
	public function renderBuildMenu()
	{
		$this->context->controller->addJqueryUI('ui.sortable');
		$this->context->controller->addJS(__PS_BASE_URI__.'js/tiny_mce/tiny_mce.js');
		$this->context->controller->addJS(__PS_BASE_URI__.'js/admin/tinymce.inc.js');
		$this->context->controller->addJS($this->_path.'views/js/jquery.colorpicker.js');
		$this->context->controller->addJS($this->_path.'views/js/back.js');
		$this->context->controller->addJS($this->_path.'views/js/admin.js');
		$this->context->controller->addCSS($this->_path.'views/css/back.css');

		$languages = $this->context->controller->getLanguages();
		$id_posmegamenu_item = Tools::getValue('id_posmegamenu_item', 1);
		$submenu_info = $this->getSubmenuInfo($id_posmegamenu_item);
		$info_rows = $this->getRowInfo($id_posmegamenu_item);
		
		foreach ($info_rows as $key => $info_row)
		{
			$info_rows[$key]['list_col'] = $this->getColInfo($info_row['id_row']);
		}
		//echo '<pre>'; print_r($info_rows);die;
		$this->context->smarty->assign(
			array(
				'id_posmegamenu_item' => $id_posmegamenu_item,
				'token' => Tools::getAdminTokenLite('AdminModules'),
				'info_rows' => $info_rows,
				'submenu_info' => $submenu_info,
				'link' => $this->context->link,
				'url_base' => $this->context->shop->physical_uri.$this->context->shop->virtual_uri,
				'secure_key' => $this->secure_key,
				'ps_links' => $this->getAllDefaultLink(),
				'manufacturers' => $this->getManufacturers(),
				'category_links' => $this->getCategoryOption(1, (int)$this->context->language->id, false, true, false),
				'languages' => $languages,
				'id_language' => (int)$this->context->language->id,
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/build_menu.tpl').$this->display(__FILE__, 'views/templates/admin/menu_submenu_config.tpl');
	}

	// this function is used for ajax reload
	public function renderSubmenu()
    {  
    	$id_posmegamenu_item = Tools::getValue('id_posmegamenu_item', 1);
		$info_rows = $this->getRowInfo($id_posmegamenu_item);
		$languages = $this->context->controller->getLanguages();
		
		foreach ($info_rows as $key => $info_row)
		{
			$info_rows[$key]['list_col'] = $this->getColInfo($info_row['id_row']);
		}
		return $this->render('views/templates/admin/build_menu.tpl', array(
			'id_posmegamenu_item' => $id_posmegamenu_item,
			'token' => Tools::getAdminTokenLite('AdminModules'),
			'info_rows' => $info_rows,
			'link' => $this->context->link,
			'url_base' => $this->context->shop->physical_uri.$this->context->shop->virtual_uri,
			'secure_key' => $this->secure_key,
			'ps_links' => $this->getAllDefaultLink(),
			'category_links' => $this->getCategoryOption(1, (int)$this->context->language->id, false, true, false),
			'manufacturers' => $this->getManufacturers(),
			'languages' => $languages,
			'id_language' => (int)$this->context->language->id,
		));
		
    }
    public function render($template, $params = array())
    {
        $this->smarty->assign($params);
        return $this->display(__FILE__, $template);
    }
	public function getSubmenuInfo($id_menu, $active = null)
	{
		$id_shop = (int)$this->context->shop->id;
		$row_infos = array();
		$row_infos_rs = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT ps.*
			FROM '._DB_PREFIX_.'posmegamenu_submenu ps
			WHERE ps.id_posmegamenu_item = '.$id_menu.($active ? ' AND ps.`active` = 1' : ' ')
		);
		if (is_array($row_infos_rs) && count($row_infos_rs) > 0)
			$row_infos = $row_infos_rs;
		return $row_infos;
	}
	public function getRowInfo($id_menu, $active = null)
	{
		$row_infos = array();
		$row_infos_rs = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT sr.*
			FROM '._DB_PREFIX_.'posmegamenu_submenu_row sr
			WHERE sr.id_posmegamenu_item = '.$id_menu.($active ? ' AND sr.`active` = 1' : '').' ORDER BY sr.position ASC'
		);
		if (is_array($row_infos_rs) && count($row_infos_rs) > 0)
			$row_infos = $row_infos_rs;
		return $row_infos;
	}
	
	public function getColInfo($id_row, $active = null, $is_backend = true)
	{
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		$col_infos = array();
		
		$cols_result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT sc.*, scl.title, scl.custom_link
			FROM '._DB_PREFIX_.'posmegamenu_submenu_column sc
			LEFT JOIN '._DB_PREFIX_.'posmegamenu_submenu_column_lang scl ON (sc.id_posmegamenu_submenu_column = scl.id_posmegamenu_submenu_column)
			WHERE  sc.id_row = '.$id_row.'  AND scl.`id_lang` = '.$id_lang.'  AND sc.`active` = 1
			ORDER BY sc.position ASC, sc.id_posmegamenu_submenu_column ASC'
		);
		if (is_array($cols_result) && count($cols_result) > 0)
			$col_infos = $cols_result;
		
		if (is_array($col_infos) && count($col_infos) > 0)
			foreach ($col_infos as $key => $col_info)
			{
				
				$sub_menu_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
					SELECT psi.*,psil.*
					FROM '._DB_PREFIX_.'posmegamenu_submenu_item psi
					LEFT JOIN '._DB_PREFIX_.'posmegamenu_submenu_item_lang psil ON psi.id_posmegamenu_submenu_item = psil.id_posmegamenu_submenu_item
					WHERE psi.id_posmegamenu_submenu_column = '.$col_info['id_posmegamenu_submenu_column'].' AND psil.id_lang = '.$id_lang.($active ? ' AND psi.`active` = 1' : '').' ORDER BY psi.position ASC, psi.id_posmegamenu_submenu_item ASC');
				if (is_array($sub_menu_infos) && count($sub_menu_infos) > 0)
				{	
					foreach ($sub_menu_infos as $key1 => $sub_menu_info)
					{	
						$id_posmegamenu_item = Tools::getValue('id_posmegamenu_item', 1);
						//if (isset($id_posmegamenu_item) && $id_posmegamenu_item > 0 && $is_backend)
						$sub_menu_infos[$key1]['active'] = $sub_menu_info['active'];
						switch ($sub_menu_info['type_link']) {
							case 1: // category tree
						        $id_category = Tools::substr($sub_menu_info['category_tree'], 3, Tools::strlen($sub_menu_info['category_tree']) - 3);
						        $category = new Category($id_category, $this->context->language->id);
								$sub_menu_infos[$key1]['categories'] = $this->getCategories($category);
								//echo '<pre>'; print_r($sub_menu_infos[$key1]['categories']);die;
								$sub_menu_infos[$key1]['title'] = 'Category tree: '.$category->name;
						        break;
						    case 2: // ps links
						        $menu_info = $this->fomartLink($sub_menu_info, $id_lang, true);
								$sub_menu_infos[$key1]['link'] = $menu_info['link'];
								$sub_menu_infos[$key1]['title'] = $menu_info['title'];
						        break;
						    case 3: // custom link
						        $sub_menu_infos[$key1]['title'] = $sub_menu_info['customlink_title'];
						        break;
						    case 4: // product
						        $id_prod = (int)$sub_menu_info['id_product'];
								if (isset($id_prod) && $id_prod > 0)
								{	
									$productName = Product::getProductName($id_prod);
								}
								$sub_menu_infos[$key1]['title'] = 'Product: '.$productName.' - ID: '.$id_prod;
						        break;
						    case 5: // banner image
						        $sub_menu_infos[$key1]['title'] = 'Banner image';
						        break;
						    case 6: // html
						        $sub_menu_infos[$key1]['title'] = 'HTML content';
						        break;
						    case 7: // manufacturer
						        $sub_menu_infos[$key1]['title'] = 'Manufacturer logo - ID: '.(int)$sub_menu_info['id_manufacturer'];
						        $sub_menu_infos[$key1]['manufacturer_logo'] = $this->context->link->getManufacturerImageLink((int)$sub_menu_info['id_manufacturer']);
						        $sub_menu_infos[$key1]['link'] = $this->context->link->getManufacturerLink((int)$sub_menu_info['id_manufacturer']);

						        break;
						}
						
					}
					
					$col_infos[$key]['list_menu_item'] = $sub_menu_infos;
				}
				else
					$col_infos[$key]['list_menu_item'] = array();
			}
		return $col_infos;
	}
	public function getColInfoFront($id_row, $active = null, $is_backend = true)
	{
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		$col_infos = array();
		
		$cols_result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT sc.*, scl.title, scl.custom_link
			FROM '._DB_PREFIX_.'posmegamenu_submenu_column sc
			LEFT JOIN '._DB_PREFIX_.'posmegamenu_submenu_column_lang scl ON (sc.id_posmegamenu_submenu_column = scl.id_posmegamenu_submenu_column)
			WHERE  sc.id_row = '.$id_row.'  AND scl.`id_lang` = '.$id_lang.'  AND sc.`active` = 1
			ORDER BY sc.position ASC, sc.id_posmegamenu_submenu_column ASC'
		);
		if (is_array($cols_result) && count($cols_result) > 0)
			$col_infos = $cols_result;
		
		if (is_array($col_infos) && count($col_infos) > 0)
			foreach ($col_infos as $key => $col_info)
			{
				//	echo '<pre>'; print_r($col_info);die;
				if($col_info['type_link'] == 0){
					$col_title_link = $this->fomartLink($col_info, $id_lang);
					$col_infos[$key]['link']= $col_title_link['link'];
				}

				$sub_menu_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
					SELECT psi.*,psil.*
					FROM '._DB_PREFIX_.'posmegamenu_submenu_item psi
					LEFT JOIN '._DB_PREFIX_.'posmegamenu_submenu_item_lang psil ON psi.id_posmegamenu_submenu_item = psil.id_posmegamenu_submenu_item
					WHERE psi.id_posmegamenu_submenu_column = '.$col_info['id_posmegamenu_submenu_column'].' AND psil.id_lang = '.$id_lang.($active ? ' AND psi.`active` = 1' : '').' ORDER BY psi.position ASC, psi.id_posmegamenu_submenu_item ASC');
				if (is_array($sub_menu_infos) && count($sub_menu_infos) > 0)
				{
					foreach ($sub_menu_infos as $key1 => $sub_menu_info)
					{	
						$id_posmegamenu_item = Tools::getValue('id_posmegamenu_item', 1);
						$sub_menu_infos[$key1]['active'] = $sub_menu_info['active'];
						switch ($sub_menu_info['type_link']) {
							case 1: // category tree
						        $id_category = Tools::substr($sub_menu_info['category_tree'], 3, Tools::strlen($sub_menu_info['category_tree']) - 3);
						        $category = new Category($id_category, $this->context->language->id);
								$sub_menu_infos[$key1]['categories'] = $this->getCategories($category);
						        break;
						    case 2: // ps links
						        $menu_info = $this->fomartLink($sub_menu_info, $id_lang, true);
								$sub_menu_infos[$key1]['link'] = $menu_info['link'];
								$sub_menu_infos[$key1]['title'] = $menu_info['title'];
						        break;
						    case 3: // custom link
						        break;
						    case 4: // product
						        $id_prod = (int)$sub_menu_info['id_product'];
								if (isset($id_prod) && $id_prod > 0)
								{	
									$productInfo = $this->getProducts($id_prod);
								}
								$sub_menu_infos[$key1]['product'] = $productInfo[0];
						        break;
						    case 5: // banner image
								$sub_menu_infos[$key1]['image']= str_replace('/pos_madina/',__PS_BASE_URI__,$sub_menu_infos[$key1]['image']);
						        break;
						    case 6: // html
								$sub_menu_infos[$key1]['htmlcontent']= str_replace('/pos_madina/',__PS_BASE_URI__,$sub_menu_infos[$key1]['htmlcontent']);
						        break;
						    case 7: // manufacturer
						        $sub_menu_infos[$key1]['manufacturer_logo'] = $this->context->link->getManufacturerImageLink((int)$sub_menu_info['id_manufacturer']);
						        $sub_menu_infos[$key1]['link'] = $this->context->link->getManufacturerLink((int)$sub_menu_info['id_manufacturer']);

						        break;
						}
						
					}
					
					$col_infos[$key]['list_menu_item'] = $sub_menu_infos;
				}
				else
					$col_infos[$key]['list_menu_item'] = array();
			}
		return $col_infos;
	}

	public function getProducts($id_product)
    {

        $product_info = $this->getProductByID($id_product);
        if($product_info)
        $result = $product_info;

        $assembler = new ProductAssembler($this->context);

        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        $products_for_template = [];

        foreach ($result as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }
        return $products_for_template;
    }
	public function getProductByID($id_product){
        $nb_days_new_product = Configuration::get('PS_NB_DAYS_NEW_PRODUCT');
        $id_lang =(int) Context::getContext()->language->id;
        $id_shop = (int) Context::getContext()->shop->id;

        $sql = 'SELECT p.*, product_shop.*,  pl.`description`, pl.`description_short`, pl.`available_now`,
                    pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, image_shop.`id_image` id_image,
                    il.`legend` as legend, m.`name` AS manufacturer_name,
                    DATEDIFF(product_shop.`date_add`, DATE_SUB("'.date('Y-m-d').' 00:00:00",
                    INTERVAL '.(int)$nb_days_new_product.' DAY)) > 0 AS new, product_shop.price AS orderprice
                FROM `'._DB_PREFIX_.'product` p
                LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
                    ON (pl.`id_product` = '.$id_product.'
                    AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
                LEFT JOIN `'._DB_PREFIX_.'product_shop` product_shop
                    ON product_shop.`id_product` = '.$id_product.'
                LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
                    ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop='.$id_shop.')
                LEFT JOIN `'._DB_PREFIX_.'image_lang` il
                    ON (image_shop.`id_image` = il.`id_image`
                    AND il.`id_lang` = '.(int)$id_lang.')
                LEFT JOIN `'._DB_PREFIX_.'manufacturer` m
                    ON m.`id_manufacturer` = p.`id_manufacturer`
                WHERE product_shop.`id_shop` = '.$id_shop.'
                    AND p.`id_product` = '.(int)$id_product;

           //echo '<pre>'; print_r($sql); die;
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql, true, false);

        if($result){
        	return Product::getProductsProperties($id_lang, $result);
    	}else{
	    	return false;
	    }
    }
	
	public function getSubMenu($id_posmegamenu_item)
	{
		$submenu_info = array();
		$info_rows = array();
		$submenu_config = $this->getSubmenuInfo($id_posmegamenu_item, true);
		if (is_array($this->getRowInfo($id_posmegamenu_item, true)) && count($this->getRowInfo($id_posmegamenu_item, true)) > 0)
		{
			$info_rows = $this->getRowInfo($id_posmegamenu_item, true);			
			foreach ($info_rows as $key => $info_row){
				$info_rows[$key]['list_col'] = $this->getColInfoFront($info_row['id_row'], true, false);
			}	
		}
		$submenu_info =array(
			'info_rows' => $info_rows,
			'submenu_config' => $submenu_config
		);
		return $submenu_info;
	}

	public function menuExists($id)
	{
		$req = 'SELECT pi.`id_posmegamenu_item` as id_posmegamenu_item
				FROM `'._DB_PREFIX_.'posmegamenu_item` pi
				WHERE pi.`id_posmegamenu_item` = '.(int)$id;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);
		return ($row);
	}
	
	public function hookHeader()
	{
		$this->context->controller->addJS($this->_path.'/views/js/front.js');
		$this->context->controller->addCSS($this->_path.'/views/css/front.css');
		if (Shop::getContext() == Shop::CONTEXT_SHOP)
		$this->context->controller->addCSS(($this->_path).'views/css/posmegamenu_s_'.(int)$this->context->shop->getContextShopID().'.css', 'all');
	}

	public function hookDisplayMegamenu()
	{
		$test = $this->generateCss();
		$id_lang = (int)$this->context->language->id;
		$id_shop = (int)Context::getContext()->shop->id;

		$menu_config = $this->getMenuConfig();
		$group_cat_result = array();
		
			$menu_obj = new PosMegamenuClass();
			$menus = $menu_obj->getMenus();
			$languages = Language::getLanguages();
			$new_menus = array();
			foreach ($menus as $menu)
			{
				$type = Tools::substr($menu['link'], 0, 3);
				$id = (int)Tools::substr($menu['link'], 3, Tools::strlen($menu['link']) - 3);
				if ($menu['type_link'] == 0)
				{	
					$menu_info = $this->fomartLink($menu);
					$menu['link'] = $menu_info['link'];
					$menu['title'] = $menu_info['title'];
					$menu['selected_item'] = $menu_info['selected_item'];
				}
				if($menu['submenu_type'] == 0){
					$sub_menu = $this->getSubMenu($menu['id_posmegamenu_item']);

					if (is_array($sub_menu) && count($sub_menu) > 0)
						$menu['sub_menu'] = $sub_menu;
					else
						$menu['sub_menu'] = array();
				}elseif($menu['submenu_type']==1 && $type == 'CAT'){
					$this->respMenu = '';
					$category = new Category((int)$id, $id_lang, $id_shop);
					$menu['sub_menu'] = $this->getRespCategories($id, false, false, $category->level_depth, $menu_config['posmegamenu_sub_animation']);
				}else{
					$menu['sub_menu'] = array();
				}
				$new_menus[] = $menu;
			}
			
			$this->context->smarty->assign(array(
				'menus' => $new_menus,
				'menu_config' => $menu_config
			));
		
		return $this->display(__FILE__, 'posmegamenu.tpl', $this->getCacheId('posmegamenu'));
	}

	public function fomartLink($item = null, $id_lang = null, $submenu_selection = null)
	{	
		if (is_null($item)) return;
			if (!empty($this->context->controller->php_self)) $page_name = $this->context->controller->php_self;
		else
		{
			$page_name = Dispatcher::getInstance()->getController();
			$page_name = (preg_match('/^[0-9]/', $page_name) ? 'page_'.$page_name : $page_name);
		}
		$link = '';
		$selected_item = false;
		if (is_null($id_lang)) $id_lang = (int)$this->context->language->id;
		if(isset($submenu_selection)){
			$type = Tools::substr($item['ps_link'], 0, 3);
			$key = Tools::substr($item['ps_link'], 3, Tools::strlen($item['ps_link']) - 3);
		}else{
			$type = Tools::substr($item['link'], 0, 3);
			$key = Tools::substr($item['link'], 3, Tools::strlen($item['link']) - 3);
		}
		//echo '<pre>';print_r($item);die;
		$title = '';
		switch ($type)
		{
			case 'CAT':
				if ($page_name == 'category' && (int)Tools::getValue('id_category') == (int)$key) $selected_item = true;
				$link = $this->context->link->getCategoryLink((int)$key, null, $id_lang);
				$category = new Category($key, $id_lang);
				if(!isset($submenu_selection) && $item['title']){
					$title = $item['title'];
				}else{
					$title = $category->name;
				}
				break;
			case 'CMS':
				if ($page_name == 'cms' && (int)Tools::getValue('id_cms') == (int)$key) $selected_item = true;
				$id_shop = (int)Context::getContext()->shop->id;
				$link = $this->context->link->getCMSLink((int)$key, null, $id_lang, $id_shop);
				$cms = new CMS($key, $id_lang, $id_shop);
				//echo '<pre>'; print_r($item['title']);die;
				if(!isset($submenu_selection) && $item['title']){
					$title = $item['title'];
				}else{
					$title = $cms->meta_title;
				}
				break;
			case 'MAN':
				if ($page_name == 'manufacturer' && (int)Tools::getValue('id_manufacturer') == (int)$key) $selected_item = true;
				$man = new Manufacturer((int)$key, $id_lang);
				$link = $this->context->link->getManufacturerLink($man->id, $man->link_rewrite, $id_lang);
				if(!isset($submenu_selection) && $item['title']){
					$title = $item['title'];
				}else{
					$title = $man->name;
				}
				break;
			case 'SUP':
				if ($page_name == 'supplier' && (int)Tools::getValue('id_supplier') == (int)$key) $selected_item = true;
				$sup = new Supplier((int)$key, $id_lang);
				$link = $this->context->link->getSupplierLink($sup->id, $sup->link_rewrite, $id_lang);
				if(!isset($submenu_selection) && $item['title']){
					$title = $item['title'];
				}else{
					$title = $sup->name;
				}
				break;
			case 'PAG':
				$pag = Meta::getMetaByPage($key, $id_lang);
				$link = $this->context->link->getPageLink($pag['page'], true, $id_lang);
				if ($page_name == $pag['page']) $selected_item = true;
				if(!isset($submenu_selection) && $item['title']){
					$title = $item['title'];
				}else{
					if ($pag['page'] == 'index')
						$title = $this->l('Home');
					elseif($pag['page'] == 'homepage'){
						$title = $this->l('Home');
						$link = $this->context->link->getPageLink('index', true, $id_lang);
					}else{
						$title = $pag['title'];
					}
				}
				break;
			case 'SHO':
				$shop = new Shop((int)$key);
				$link = $shop->getBaseURL();
				$title = $shop->name;
				break;
			default:
				$link = $item['link'];
				break;
		}
		return array('title' => $title, 'link' => $link, 'selected_item' => $selected_item);
	}
	private function getManufacturers(){
		$html = '';
		$manufacturers = Manufacturer::getManufacturers(false, (int)$this->context->language->id, true);
		//echo '<pre>'; print_r($manufacturers);die;
		foreach ($manufacturers as $manufacturer){
			$html .= '<option value="'.$manufacturer['id_manufacturer'].'">'.$manufacturer['name'].'</option>';
		}
		return $html;
	}
	private function getAllDefaultLink($id_lang = null, $link = false)
	{
		if (is_null($id_lang)) $id_lang = (int)$this->context->language->id;
		$html = '<option value="PAGhomepage">'.$this->l('Homepage').'</option>';
		$html .= '<optgroup label="'.$this->l('Category').'">';
		$html .= $this->getCategoryOption(1, $id_lang, false, true, $link);
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Cms').'">';
		$html .= $this->getCMSOptions(0, 0, $id_lang, $link);
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Manufacturer').'">';
		$manufacturers = Manufacturer::getManufacturers(false, $id_lang);
		foreach ($manufacturers as $manufacturer)
		{
			if ($link)
				$html .= '<option value="'.$this->context->link->getManufacturerLink($manufacturer['id_manufacturer']).'">'.$manufacturer['name'].'</option>';
			else
				$html .= '<option value="MAN'.(int)$manufacturer['id_manufacturer'].'">'.$manufacturer['name'].'</option>';
		}
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Supplier').'">';
		$suppliers = Supplier::getSuppliers(false, $id_lang);
		foreach ($suppliers as $supplier)
		{
		if ($link)
			$html .= '<option value="'.$this->context->link->getSupplierLink($supplier['id_supplier']).'">'.$supplier['name'].'</option>';
		else
			$html .= '<option value="SUP'.(int)$supplier['id_supplier'].'">'.$supplier['name'].'</option>';
		}
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Page').'">';
		$html .= $this->getPagesOption($id_lang, $link);
		$shoplink = Shop::getShops();
		if (count($shoplink) > 1)
		{
			$html .= '<optgroup label="'.$this->l('Shops').'">';
			foreach ($shoplink as $sh)
				$html .= '<option value="SHO'.(int)$sh['id_shop'].'">'.$sh['name'].'</option>';
		}
		$html .= '</optgroup>';
		return $html;
	}
	private function getCategories($category)
    {
        $range = '';
        $maxdepth = 2;
        if (Validate::isLoadedObject($category)) {
            if ($maxdepth > 0) {
                $maxdepth += $category->level_depth;
            }
            $range = 'AND nleft >= '.(int)$category->nleft.' AND nright <= '.(int)$category->nright;
        }

        $resultIds = array();
        $resultParents = array();
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.id_parent, c.id_category, cl.name, cl.description, cl.link_rewrite
			FROM `'._DB_PREFIX_.'category` c
			INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category` AND cl.`id_lang` = '.(int)$this->context->language->id.Shop::addSqlRestrictionOnLang('cl').')
			INNER JOIN `'._DB_PREFIX_.'category_shop` cs ON (cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.(int)$this->context->shop->id.')
			WHERE (c.`active` = 1 OR c.`id_category` = '.(int)Configuration::get('PS_HOME_CATEGORY').')
			AND c.`id_category` != '.(int)Configuration::get('PS_ROOT_CATEGORY').'
			'.((int)$maxdepth != 0 ? ' AND `level_depth` <= '.(int)$maxdepth : '').'
			'.$range.'
			ORDER BY `level_depth` ASC, '.(Configuration::get('BLOCK_CATEG_SORT') ? 'cl.`name`' : 'cs.`position`').' '.(Configuration::get('BLOCK_CATEG_SORT_WAY') ? 'DESC' : 'ASC'));
        foreach ($result as &$row) {
            $resultParents[$row['id_parent']][] = &$row;
            $resultIds[$row['id_category']] = &$row;
        }

        return $this->getTree($resultParents, $resultIds, $maxdepth, ($category ? $category->id : null));
    }

    public function getTree($resultParents, $resultIds, $maxDepth, $id_category = null, $currentDepth = 0)
    {
        if (is_null($id_category)) {
            $id_category = $this->context->shop->getCategory();
        }

        $children = [];

        if (isset($resultParents[$id_category]) && count($resultParents[$id_category]) && ($maxDepth == 0 || $currentDepth < $maxDepth)) {
            foreach ($resultParents[$id_category] as $subcat) {
                $children[] = $this->getTree($resultParents, $resultIds, $maxDepth, $subcat['id_category'], $currentDepth + 1);
            }
        }

        if (isset($resultIds[$id_category])) {
            $link = $this->context->link->getCategoryLink($id_category, $resultIds[$id_category]['link_rewrite']);
            $name = $resultIds[$id_category]['name'];
            $desc = $resultIds[$id_category]['description'];
        } else {
            $link = $name = $desc = '';
        }

        return [
            'id' => $id_category,
            'link' => $link,
            'name' => $name,
            'desc'=> $desc,
            'children' => $children
        ];
    }
	
	public function getCategoryOption($id_category = 1, $id_lang = false, $id_shop = false, $recursive = true, $link = false)
	{
		$html = '';
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$id_shop = $id_shop ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);
		if (is_null($category->id)) return;
		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
			$spacer = str_repeat('&nbsp;', 3 * (int)$category->level_depth);
		}
		$shop = (object)Shop::getShop((int)$category->getShopID());
		if (!in_array($category->id, array(Configuration::get('PS_HOME_CATEGORY'), Configuration::get('PS_ROOT_CATEGORY'))))
		{
		if ($link)
			$html .= '<option value="'.$this->context->link->getCategoryLink($category->id).'">'.(isset($spacer) ? $spacer : '').str_repeat('&nbsp;', 3 * (int)$category->level_depth).$category->name.'</option>';
		else
			$html .= '<option value="CAT'.(int)$category->id.'">'.str_repeat('&nbsp;', 3 * (int)$category->level_depth).$category->name.'</option>';
		}
		elseif ($category->id != Configuration::get('PS_ROOT_CATEGORY'))
			$html .= '<optgroup label="'.str_repeat('&nbsp;', 3 * (int)$category->level_depth).$category->name.'">';
		if (isset($children) && count($children))
			foreach ($children as $child)
			{
				$html .= $this->getCategoryOption((int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],
				$recursive, $link);
			}
		return $html;
	}
	
	public function getCMSOptions($parent = 0, $depth = 0, $id_lang = false, $link = false)
	{
		$html = '';
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
		$pages = $this->getCMSPages((int)$parent, false, $id_lang);
		$spacer = str_repeat('&nbsp;', 3 * (int)$depth);
		foreach ($categories as $category)
			$html .= $this->getCMSOptions($category['id_cms_category'], (int)$depth + 1, (int)$id_lang, $link);
		foreach ($pages as $page)
			if ($link)
				$html .= '<option value="'.$this->context->link->getCMSLink($page['id_cms']).'">'.(isset($spacer) ? $spacer : '').$page['meta_title'].'</option>';
			else
				$html .= '<option value="CMS'.$page['id_cms'].'">'.$page['meta_title'].'</option>';
		return $html;
	}
	
	public function getCMSCategories($recursive = false, $parent = 1, $id_lang = false)
	{
		$categories = array();
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		if ($recursive === false)
		{
			$sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
				FROM `'._DB_PREFIX_.'cms_category` bcp
				INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
				ON (bcp.`id_cms_category` = cl.`id_cms_category`)
				WHERE cl.`id_lang` = '.(int)$id_lang.'
				AND bcp.`id_parent` = '.(int)$parent;
			return Db::getInstance()->executeS($sql);
		}
		else
		{
			$sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
				FROM `'._DB_PREFIX_.'cms_category` bcp
				INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
				ON (bcp.`id_cms_category` = cl.`id_cms_category`)
				WHERE cl.`id_lang` = '.(int)$id_lang.'
				AND bcp.`id_parent` = '.(int)$parent;
				$results = Db::getInstance()->executeS($sql);
			foreach ($results as $result)
			{
			$sub_categories = $this->getCMSCategories(true, $result['id_cms_category'], (int)$id_lang);
			if ($sub_categories && count($sub_categories) > 0) $result['sub_categories'] = $sub_categories;
				$categories[] = $result;
			}
			return isset($categories) ? $categories : false;
		}
	}
	
	public function getCMSPages($id_cms_category, $id_shop = false, $id_lang = false)
	{
		$id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
			FROM `'._DB_PREFIX_.'cms` c
			INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
			ON (c.`id_cms` = cs.`id_cms`)
			INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
			ON (c.`id_cms` = cl.`id_cms` AND cs.`id_shop` = cl.`id_shop`)
			WHERE c.`id_cms_category` = '.(int)$id_cms_category.'
			AND cl.`id_shop` = '.(int)$id_shop.'
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';
		return Db::getInstance()->executeS($sql);
	}
	
	public function getPagesOption($id_lang = null, $link = false)
	{
		if (is_null($id_lang)) $id_lang = (int)$this->context->cookie->id_lang;
		$files = Meta::getMetasByIdLang($id_lang);
		$html = '';
		foreach ($files as $file)
		{
			if ($link) $html .= '<option value="'.$this->context->link->getPageLink($file['page']).'">'.(($file['title'] != '') ? $file['title'] : $file['page']).'</option>';
			else  $html .= '<option value="PAG'.$file['page'].'">'.(($file['title'] != '') ? $file['title'] :$file['page']).'</option>';
		}
		return $html;
	}
	
	
	
	public function getRespCategories($id_category = 1, $id_lang = false, $id_shop = false, $level_root = 1, $sub_animation = null)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$class= '';
		if ($sub_animation) {
			switch ($sub_animation) {
				case 4:
					$class = 'menu_rotate';
					break;
				case 3:
					$class = 'menu_slideup';
					break;
				case 2:
					$class = 'menu_slidedown';
					break;
				default:
					$class = 'menu_noanimation';
					break;
			}
		}
		$category = new Category((int)$id_category, $id_lang, $id_shop);

		if (is_null($category->id))
			return;
		$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
		
		if (isset($children) && count($children))
		{
			$this->respMenu .= '<span class="icon-drop-mobile"><i class="material-icons add">add</i><i class="material-icons remove">remove </i></span>';  
			$this->respMenu .= '<div class="menu-dropdown cat-drop-menu '.$class.'">';
			$this->respMenu .= '<ul class="pos-sub-inner">';
			foreach ($children as $child){	
				$category = new Category((int)$child['id_category'], $id_lang, $id_shop);
				$this->respMenu .= '<li>';
				$this->respMenu .= '<a href="'.$category->getLink().'" class=""><span>'.$category->name.'</span></a>';			
				$this->getRespCategories((int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'], $level_root);
				$this->respMenu .= '</li>';
			}
			$this->respMenu .= '</ul>';
			$this->respMenu .= '</div>';
		}

		return $this->respMenu;
	}
	
	public function clearCache()
	{
		$this->_clearCache('posmegamenu.tpl');
	}	
	
	public function generateCss()
	{
		$css = '';

		$submenus = PosMegamenuClass::getMenus(); 
		foreach ($submenus as $key => $submenu)
		{
			$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' > a{ 
				'.($submenus[$key]['item_bg_color'] != '' ? 'background: '.$submenus[$key]['item_bg_color'].';' : '').'
				'.($submenus[$key]['item_color'] != '' ? 'color: '.$submenus[$key]['item_color'].';' : '').'
				'.($submenus[$key]['item_fontsize'] != 0 ? 'font-size: '.$submenus[$key]['item_fontsize'].'px;' : '').'
				'.($submenus[$key]['item_lineheight'] != 0 ? 'line-height: '.$submenus[$key]['item_lineheight'].'px;' : '').'
				text-transform: '.$this->convertTransform($submenus[$key]['item_transform']).';
			}';
			if($submenus[$key]['item_bg_colorh'] != '' || $submenus[$key]['item_colorh'] != ''){
				$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' > a:hover { 
					'.($submenus[$key]['item_bg_colorh'] != '' ? 'background: '.$submenus[$key]['item_bg_colorh'].';' : '').'
					'.($submenus[$key]['item_colorh'] != '' ? 'color: '.$submenus[$key]['item_colorh'].';' : '').'
				}';
			}
			$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' > a .menu-subtitle,
			#_mobile_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' > a .menu-subtitle{ 
				'.($submenus[$key]['subtitle_bg_color'] != '' ? 'background: '.$submenus[$key]['subtitle_bg_color'].';' : '').'
				'.($submenus[$key]['subtitle_color'] != '' ? 'color: '.$submenus[$key]['subtitle_color'].';' : '').'
				'.($submenus[$key]['subtitle_fontsize'] != 0 ? 'font-size: '.$submenus[$key]['subtitle_fontsize'].'px;' : '').'
				'.($submenus[$key]['subtitle_lineheight'] != 0 ? 'line-height: '.$submenus[$key]['subtitle_lineheight'].'px;' : '').'
				text-transform: '.$this->convertTransform($submenus[$key]['subtitle_transform']).';
			}';
			$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' > a .menu-subtitle:after{ 
				'.($submenus[$key]['subtitle_bg_color'] != '' ? 'border-top-color: '.$submenus[$key]['subtitle_bg_color'].';' : '').'
			}';	
			$css .= '#_mobile_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' > a .menu-subtitle:after{ 
				'.($submenus[$key]['subtitle_bg_color'] != '' ? 'border-right-color: '.$submenus[$key]['subtitle_bg_color'].';' : '').'
			}';
			$submenu_config = PosMegamenuSubmenuClass::getSubmenuConfig($submenus[$key]['id_posmegamenu_item']);
			if($submenu_config['submenu_bg'] == 2 && $submenu_config['submenu_bg_color'] != ''){
				$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' .menu-dropdown{
					'.($submenu_config['submenu_bg_color'] != '' ? 'background: '.$submenu_config['submenu_bg_color'].';' : '').'
				}';
			}elseif($submenu_config['submenu_bg'] == 3 && $submenu_config['submenu_bg_image'] != ''){
				$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' .menu-dropdown{
					'.($submenu_config['submenu_bg_image'] != '' ? 'background-image: url("'.$submenu_config['submenu_bg_image'].'");' : '').'
					background-repeat: '.$this->convertBgRepeat($submenu_config['submenu_bg_repeat']).';
					background-position: '.$this->convertBgPosition($submenu_config['submenu_bg_position']).';
				}';
			}
			$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' .menu-dropdown .pos-menu-col .column_title{
				'.($submenu_config['submenu_title_color'] != '' ? 'color: '.$submenu_config['submenu_title_color'].';' : '').'
				'.($submenu_config['submenu_title_fontsize'] != 0 ? 'font-size: '.$submenu_config['submenu_title_fontsize'].'px;' : '').'
				'.($submenu_config['submenu_title_lineheight'] != 0 ? 'line-height: '.$submenu_config['submenu_title_lineheight'].'px;' : '').'
				text-transform: '.$this->convertTransform($submenu_config['submenu_title_transform']).';
			}';
			if($submenu_config['submenu_title_colorh'] != ''){
				$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' .menu-dropdown .pos-menu-col .column_title:hover { 
					'.($submenu_config['submenu_title_colorh'] != '' ? 'color: '.$submenu_config['submenu_title_colorh'].';' : '').'
				}';
			}
			$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' .menu-dropdown .submenu-item > a{
				'.($submenu_config['submenu_link_color'] != '' ? 'color: '.$submenu_config['submenu_link_color'].';' : '').'
				'.($submenu_config['submenu_link_fontsize'] != 0 ? 'font-size: '.$submenu_config['submenu_link_fontsize'].'px;' : '').'
				'.($submenu_config['submenu_link_lineheight'] != 0 ? 'line-height: '.$submenu_config['submenu_link_lineheight'].'px;' : '').'
				text-transform: '.$this->convertTransform($submenu_config['submenu_link_transform']).';
			}';
			if($submenu_config['submenu_link_colorh'] != ''){
				$css .= '#_desktop_megamenu .pos-menu-horizontal .menu-content  .menu-item.menu-item'.$submenus[$key]['id_posmegamenu_item'].' .menu-dropdown .submenu-item > a:hover {    
					'.($submenu_config['submenu_link_colorh'] != '' ? 'color: '.$submenu_config['submenu_link_colorh'].';' : '').'
				}';
			}
		}
		$menu_type_bg = Configuration::get('posmegamenu_bg');
        $menu_bg_color= Configuration::get('posmegamenu_bg_color');
        $menu_bg_image= Configuration::get('posmegamenu_bg_image');
        $menu_bg_repeat= Configuration::get('posmegamenu_bg_repeat');
        $menu_center= Configuration::get('posmegamenu_center');
        $menu_customCSS= Configuration::get('posmegamenu_css');
        if($menu_type_bg ==2){
			$css .='#_desktop_megamenu .pos-menu-horizontal .menu-content {
				'.($menu_bg_color != '' ? 'background: '.$menu_bg_color.';' : '').'
			}';
		}
		if($menu_type_bg ==3 && $menu_bg_image){
			$css .='#_desktop_megamenu .pos-menu-horizontal .menu-content {
				'.($menu_bg_image != '' ? 'background-image: url("'.$menu_bg_image.'");' : '').'
				background-repeat: '.$this->convertBgRepeat($menu_bg_repeat).'
			}';
		}
		if($menu_center){
			$css .= '#_desktop_megamenu {text-align: center;}';
			$css .= '#_desktop_megamenu  .menu-content li.menu-item{float:none; display: inline-block;}';
		}
		$css .= Configuration::get('posmegamenu_css');

		$css  = trim(preg_replace('/\s+/', ' ', $css));
		if (Shop::getContext() == Shop::CONTEXT_SHOP)
			$my_file = $this->local_path.'views/css/posmegamenu_s_'.(int)$this->context->shop->getContextShopID().'.css';
		
		$fh = fopen($my_file, 'w') or die("can't open file");
		fwrite($fh, $css);
		fclose($fh);
	}
	public function convertTransform($value) {
			switch($value) {
				case 2 :
					$transform_option = 'capitalize';
					break;
				case 1 :
					$transform_option = 'uppercase';
					break;
				default :
					$transform_option = 'none';
			}
			return  $transform_option;
	}
	public function convertBgPosition($value) {
			switch($value) {
				case 9 :
					$position_option = 'left top';
					break;
				case 8 :
					$position_option = 'left center';
					break;
				case 7 :
					$position_option = 'left bottom';
					break;
				case 6 :
					$position_option = 'right top';
					break;
				case 5 :
					$position_option = 'right center';
					break;
				case 4 :
					$position_option = 'right bottom';
					break;
				case 3 :
					$position_option = 'center top';
					break;
				case 2 :
					$position_option = 'center center';
					break;
				default :
					$position_option = 'center bottom';
			}
			return  $position_option;
	}
	public function convertBgRepeat($value) {
			switch($value) {
				case 1 :
					$repeat_option = 'no-repeat';
					break;
				case 2 :
					$repeat_option = 'repeat-x';
					break;
				case 3 :
					$repeat_option = 'repeat-y';
					break;
				case 4 :
					$repeat_option = 'repeat';
					break;
			}
			return  $repeat_option;
	}
}