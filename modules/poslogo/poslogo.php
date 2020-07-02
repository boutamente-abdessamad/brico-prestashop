<?php

// Security
if (!defined('_PS_VERSION_'))
	exit;

// Checking compatibility with older PrestaShop and fixing it
if (!defined('_MYSQL_ENGINE_'))
	define('_MYSQL_ENGINE_', 'MyISAM');

// Loading Models
require_once(_PS_MODULE_DIR_ . 'poslogo/models/Logo.php');
class poslogo extends Module {
    private $_html = '';
    private $_postErrors = array();
        
    public function __construct() {
        $this->name = 'poslogo';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'posthemes';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        parent::__construct();

        $this->displayName = $this->l('Pos Logo');
        $this->description = $this->l('block config');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
	$this->admin_tpl_path 	= _PS_MODULE_DIR_.$this->name.'/views/templates/admin/';
    }

   

    public function install()
	{
        
        
        //create folder blocklogo
        $path = _PS_IMG_DIR_.'blocklogo';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }  
        
        // Install SQL
		include(dirname(__FILE__).'/sql/install.php');
		foreach ($sql as $s)
			if (!Db::getInstance()->execute($s))
				return false;
        
          // Install Tabs
                if(!(int)Tab::getIdFromClassName('AdminPosMenu')) {
                    $parent_tab = new Tab();
                    // Need a foreach for the language
                    foreach (Language::getLanguages() as $language)
					$parent_tab->name[$language['id_lang']] = $this->l('PosExtentions');
                    $parent_tab->class_name = 'AdminPosMenu';
                    $parent_tab->id_parent = 0; // Home tab
                    $parent_tab->module = $this->name;
                    $parent_tab->add();
                }
		
		$tab = new Tab();		
		// Need a foreach for the language
		//$tab->name[$this->context->language->id] = $this->l('Manage Logo');
		foreach (Language::getLanguages() as $language)
            $tab->name[$language['id_lang']] = $this->l('Manage Logo');
		$tab->class_name = 'AdminPosLogo';
		$tab->id_parent = (int)Tab::getIdFromClassName('AdminPosMenu');
		$tab->module = $this->name;
		$tab->add();
                Configuration::updateValue($this->name . '_auto', 0);
                Configuration::updateValue($this->name . '_speed_slide', '3000');
                Configuration::updateValue($this->name . '_a_speed', '600');
                Configuration::updateValue($this->name . '_qty_products', 30);
                Configuration::updateValue($this->name . '_qty_items', 9);
                Configuration::updateValue($this->name . '_width_item', 180);
                Configuration::updateValue($this->name . '_show_nextback', 1);
                Configuration::updateValue($this->name . '_show_control', 0);
                Configuration::updateValue($this->name . '_min_item', 1);
                Configuration::updateValue($this->name . '_max_item', 6);
                Configuration::updateValue($this->name . '_mode_dir', 'vertical');
	
		// Set some defaults
                return parent::install() &&
		 $this->registerHook('displayBrandSlider')&&
		 $this->_installHookCustomer()&&
		 $this->registerHook('displayHeader');
              
	}
        
        public function uninstall() {
            
		Configuration::deleteByName('poslogo');

		// Uninstall Tabs
		
                $tab = new Tab((int)Tab::getIdFromClassName('AdminPosLogo'));
		$tab->delete();
		Configuration::deleteByName($this->name . '_auto');
                Configuration::deleteByName($this->name . '_speed_slide');
                Configuration::deleteByName($this->name . '_a_speed');
               // Configuration::deleteByName($this->name . '_show_price');
                //Configuration::deleteByName($this->name . '_show_des');
                Configuration::deleteByName($this->name . '_qty_products');
                Configuration::deleteByName($this->name . '_qty_items');
                Configuration::deleteByName($this->name . '_width_item');
                Configuration::deleteByName($this->name . '_show_nextback');
                Configuration::deleteByName($this->name . '_show_control');
                Configuration::deleteByName($this->name . '_min_item');
                Configuration::deleteByName($this->name . '_max_item');
                Configuration::deleteByName($this->name . '_mode_dir');
		     
		include(dirname(__FILE__).'/sql/uninstall_sql.php');
		foreach ($sql as $s)
			if (!Db::getInstance()->execute($s))
				return false;
		// Uninstall Module
		if (!parent::uninstall())
			return false;
		// !$this->unregisterHook('actionObjectExampleDataAddAfter')
		return true;
        }


	
	private function _postProcess()
	{  
            Configuration::updateValue($this->name . '_auto', Tools::getValue('auto'));
            Configuration::updateValue($this->name . '_speed_slide', Tools::getValue('speed_slide'));
            Configuration::updateValue($this->name . '_a_speed', Tools::getValue('a_speed'));
            //Configuration::updateValue($this->name . '_show_price', Tools::getValue('show_price'));
            //Configuration::updateValue($this->name . '_show_des', Tools::getValue('show_des'));
            Configuration::updateValue($this->name . '_qty_products', Tools::getValue('qty_products'));
            Configuration::updateValue($this->name . '_qty_items', Tools::getValue('qty_items'));
            Configuration::updateValue($this->name . '_width_item', Tools::getValue('width_item'));
            Configuration::updateValue($this->name . '_show_nextback', Tools::getValue('show_nextback'));
            Configuration::updateValue($this->name . '_show_control', Tools::getValue('show_control'));
            Configuration::updateValue($this->name . '_min_item', Tools::getValue('min_item'));
            Configuration::updateValue($this->name . '_max_item', Tools::getValue('max_item'));
            Configuration::updateValue($this->name . '_mode_dir', Tools::getValue('mode_dir'));

		
		$this->_html .= '<div class="conf confirm">'.$this->l('Settings updated').'</div>';
	}
	
	public function getContent()
	{
		$this->_html .= '<h2>'.$this->displayName.'</h2>';
		
		if (Tools::isSubmit('submitPostLogo'))
		{			
			//$this->_postValidation();
			
			if (!sizeof($this->_postErrors))
				$this->_postProcess();
			else
			{
				foreach ($this->_postErrors AS $err)
				{
					$this->_html .= '<div class="alert error">'.$err.'</div>';
				}
			}
		}
		
		$this->_displayForm();
		
		return $this->_html;
	}
        
        
        public function  getAttrFromImage($image = NULL){
            $doc = new DOMDocument();
            $doc->loadHTML($image);
            $imageTags = $doc->getElementsByTagName('img');
            foreach ($imageTags as $tag) {
                if($tag->getAttribute('src')) {
                    return $tag->getAttribute('src'); 
                    break;
                }
            }
            return NULL;
        }
        
        public function getLogo() { 
                        $id_shop = (int)Context::getContext()->shop->id;
                        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'pos_logo` ps LEFT JOIN `' . _DB_PREFIX_ . 'pos_logo_shop`  s ON ps.id_pos_logo = s.id_pos_logo where s.`id_shop` ='.$id_shop.'  ORDER BY `porder` ASC';
                        $slides = Db::getInstance()->ExecuteS($sql);
                        if(is_array($slides)){
                            $limit = 0;
                            $arraySlides = array();
                            foreach($slides  as $key => $slideArray) {
                                if($limit == Configuration::get($this->name.'_qty_products')) break;
                                $limit ++;
                                 //echo "<pre>"; print_r($slideArray); 
                                $newSlide = array();
                                 foreach($slideArray as $k => $v) {
                                     if($k=='image'){
                                         $v = _PS_BASE_URL_.__PS_BASE_URI__.'img/blocklogo/'.$slideArray['id_pos_logo'].'.jpg';
                                     }
                                     $newSlide[$k] = $v;
                                 }
                                 $arraySlides[$key] = $newSlide;
                            }

                        }
                        return $arraySlides;
        }
     

    public function getSelectOptionsHtml($options = NULL, $name = NULL, $selected = NULL) {
        $html = "";
        $html .='<select name =' . $name . ' style="width:130px">';
        if (count($options) > 0) {
            foreach ($options as $key => $val) {
                if (trim($key) == trim($selected)) {
                    $html .='<option value=' . $key . ' selected="selected">' . $val . '</option>';
                } else {
                    $html .='<option value=' . $key . '>' . $val . '</option>';
                }
            }
        }
        $html .= '</select>';
        return $html;
    }

    private function _displayForm() {
        $this->_html .= '
		<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                  <fieldset>
                    <legend><img src="../img/admin/edit.gif" alt="" class="middle" />' . $this->l('Settings') . '</legend>
                    <div class="margin-form">';
        $this->_html .='
                    </div>
                     <label>' . $this->l('Qty of Logos  : ') . '</label>
                    <div class="margin-form">
                            <input type = "text"  name="qty_products" value =' . (Tools::getValue('qty_products') ? Tools::getValue('qty_products') : Configuration::get($this->name . '_qty_products')) . ' ></input>
                    </div>
                     <div class="margin-form">';
        $this->_html .='
                    </div>
                    <input type="submit" name="submitPostLogo" value="' . $this->l('Update') . '" class="button" />
                     </fieldset>
		</form>';
		$url  = 'index.php?controller=AdminPosLogo';
		$url .= '&token='.Tools::getAdminTokenLite('AdminPosLogo');
		$this->_html .='<div class="link_module bootstrap panel"><a href="'.$url.'">Go to Manager Logo</div>';
        return $this->_html;
        return $this->_html;
    }
        
	public function hookDisplayHeader()
	{       
			$this->context->controller->addJS($this->_path.'js/poslogo.js');
	}
	
	function hookdisplayBrandSlider($params) {
			$options = array(
                'auto' => Configuration::get($this->name . '_auto'),
                'speed_slide' => Configuration::get($this->name . '_speed_slide'),
                'a_speed' => Configuration::get($this->name . '_a_speed'),
                'qty_products' => Configuration::get($this->name . '_qty_products'),
                'qty_items' => Configuration::get($this->name . '_qty_items'),
                'width_item' => Configuration::get($this->name . '_width_item'),
                'show_nexback' => Configuration::get($this->name . '_show_nextback'),
                'show_control' => Configuration::get($this->name . '_show_control'),
                'min_item' => Configuration::get($this->name . '_min_item'),
                'max_item' => Configuration::get($this->name . '_max_item'),
                'mode_dir' => Configuration::get($this->name . '_mode_dir'),
				);    


            $logos = $this->getLogo();
            if(count($logos)<1) return NULL;
            $this->context->smarty->assign('slideOptions', $options);
            $this->context->smarty->assign('logos', $logos);
            return $this->display(__FILE__, 'logo.tpl');
	}
	function hookdisplayHome($params) {
			$options = array(
                'auto' => Configuration::get($this->name . '_auto'),
                'speed_slide' => Configuration::get($this->name . '_speed_slide'),
                'a_speed' => Configuration::get($this->name . '_a_speed'),
                'qty_products' => Configuration::get($this->name . '_qty_products'),
                'qty_items' => Configuration::get($this->name . '_qty_items'),
                'width_item' => Configuration::get($this->name . '_width_item'),
                'show_nexback' => Configuration::get($this->name . '_show_nextback'),
                'show_control' => Configuration::get($this->name . '_show_control'),
                'min_item' => Configuration::get($this->name . '_min_item'),
                'max_item' => Configuration::get($this->name . '_max_item'),
                'mode_dir' => Configuration::get($this->name . '_mode_dir'),
				);    


            $logos = $this->getLogo();
            if(count($logos)<1) return NULL;
            $this->context->smarty->assign('slideOptions', $options);
            $this->context->smarty->assign('logos', $logos);
            return $this->display(__FILE__, 'logo.tpl');
	}
	function hookdisplayContainerbottom($params) {
			$options = array(
                'auto' => Configuration::get($this->name . '_auto'),
                'speed_slide' => Configuration::get($this->name . '_speed_slide'),
                'a_speed' => Configuration::get($this->name . '_a_speed'),
                'qty_products' => Configuration::get($this->name . '_qty_products'),
                'qty_items' => Configuration::get($this->name . '_qty_items'),
                'width_item' => Configuration::get($this->name . '_width_item'),
                'show_nexback' => Configuration::get($this->name . '_show_nextback'),
                'show_control' => Configuration::get($this->name . '_show_control'),
                'min_item' => Configuration::get($this->name . '_min_item'),
                'max_item' => Configuration::get($this->name . '_max_item'),
                'mode_dir' => Configuration::get($this->name . '_mode_dir'),
				);    


            $logos = $this->getLogo();
            if(count($logos)<1) return NULL;
            $this->context->smarty->assign('slideOptions', $options);
            $this->context->smarty->assign('logos', $logos);
            return $this->display(__FILE__, 'logo.tpl');
	}
	
	private function _installHookCustomer(){
		$hookspos = array(
				'brandSlider',
			); 
		foreach( $hookspos as $hook ){
			if( Hook::getIdByName($hook) ){
				
			} else {
				$new_hook = new Hook();
				$new_hook->name = pSQL($hook);
				$new_hook->title = pSQL($hook);
				$new_hook->add();
				$id_hook = $new_hook->id;
			}
		}
		return true;
	}
     

}