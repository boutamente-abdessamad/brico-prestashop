<?php
class xipblogdisplayposts extends Module {
/*     public $css_files = array(
		array(
			'key' => 'xipblogdisplayposts',
			'src' => 'xipblogdisplayposts.css',
			'priority' => 50,
			'media' => 'all',
			'load_theme' => false,
		),
	); */
	public $js_files = array(
		array(
			'key' => 'xipblogdisplayposts',
			'src' => 'xipblogdisplayposts.js',
			'priority' => 50,
			'position' => 'bottom', // bottom or head
			'load_theme' => false,
		),
	);
	public function __construct() {
		$this->name = 'xipblogdisplayposts';
		$this->tab = 'front_office_features';
		$this->version = '2.0.0';
		$this->author = 'xpert-idea.com';
		$this->bootstrap = true;
		$this->dependencies = array('xipblog');
		parent::__construct();
		$this->displayName = $this->l('Xpert Blog Display Posts on Home Page.');
		$this->description = $this->l('Xpert Blog Display Posts on Home Page by xpert-idea.com . This is xpert blog modules child module only display some of posts on your home page. ');
		$this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
	}
	// For installation service
	public function install() {
		if (!parent::install()
			|| !$this->registerHook('header')
			)
			return false;
		$languages = Language::getLanguages(false);
           	foreach($languages as $lang){
        		Configuration::updateValue('xipbdp_title_'.$lang['id_lang'],"From Our Blog");
        		Configuration::updateValue('xipbdp_subtext_'.$lang['id_lang'],"There are latest blog posts");
           	}
        	Configuration::updateValue('xipbdp_postcount',4);
        	Configuration::updateValue('xipbdp_designlayout','general');
        	Configuration::updateValue('xipbdp_numcolumn',3);
			return true;
	}
	// For uninstallation service
	public function uninstall() {
		if (!parent::uninstall()
			)
			return false;
		else
			return true;
	}
	// Helper Form for Html markup generate
	public function SettingForm() {

		$default_lang = (int) Configuration::get('PS_LANG_DEFAULT');
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Setting'),
			),
			'submit' => array(
				'title' => $this->l('Save'),
				'class' => 'button',
			),
		);
			$this->fields_form[0]['form']['input'][] = array(
				'type' => 'text',
				'label' => $this->l('Title'),
				'name' => 'xipbdp_title',
				'lang' => true,
			);
			$this->fields_form[0]['form']['input'][] = array(
				'type' => 'text',
				'label' => $this->l('Sub Title'),
				'name' => 'xipbdp_subtext',
				'lang' => true,
			);
			$this->fields_form[0]['form']['input'][] = array(
				'type' => 'text',
				'label' => $this->l('How Many Post You Want To Display'),
				'name' => 'xipbdp_postcount',
			);
			$this->fields_form[0]['form']['input'][] = array(
                'type' => 'select',
                'label' => $this->l('Select number of column to display'),
                'name' => 'xipbdp_numcolumn',
                'options' => array(
                    'query' => array(
                    		array(
                    			'id' => '1',
                    			'name' => '1 column',
                    		),
                    		array(
                    			'id' => '2',
                    			'name' => '2 column',
                    		),
                    		array(
                    			'id' => '3',
                    			'name' => '3 column',
                    		),
                    		array(
                    			'id' => '4',
                    			'name' => '4 column',
                    		),
                    	),
                    'id' => 'id',
                    'name' => 'name'
                )
            );
			$this->fields_form[0]['form']['input'][] = array(
                'type' => 'select',
                'label' => $this->l('Select Design Layout'),
                'name' => 'xipbdp_designlayout',
                'options' => array(
                    'query' => array(
                    		array(
                    			'id' => 'general',
                    			'name' => 'General',
                    		),
                    		array(
                    			'id' => 'classic',
                    			'name' => 'Classic',
                    		),
                    		array(
                    			'id' => 'creative',
                    			'name' => 'Creative',
                    		),
                    	),
                    'id' => 'id',
                    'name' => 'name'
                )
            );
		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
		foreach (Language::getLanguages(false) as $lang) {
			$helper->languages[] = array(
				'id_lang' => $lang['id_lang'],
				'iso_code' => $lang['iso_code'],
				'name' => $lang['name'],
				'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0),
			);
		}
		$helper->toolbar_btn = array(
			'save' => array(
				'desc' => $this->l('Save'),
				'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&save' . $this->name . 'token=' . Tools::getAdminTokenLite('AdminModules'),
			),
		);
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;
		$helper->toolbar_scroll = true;
		$helper->submit_action = 'save' . $this->name;
		$languages = Language::getLanguages(false);
           	foreach($languages as $lang){
           		$helper->fields_value['xipbdp_title'][$lang['id_lang']] = Configuration::get('xipbdp_title_'.$lang['id_lang']);
           		$helper->fields_value['xipbdp_subtext'][$lang['id_lang']] = Configuration::get('xipbdp_subtext_'.$lang['id_lang']);
           	}
           	$helper->fields_value['xipbdp_postcount'] = Configuration::get('xipbdp_postcount');
           	$helper->fields_value['xipbdp_designlayout'] = Configuration::get('xipbdp_designlayout');
           	$helper->fields_value['xipbdp_numcolumn'] = Configuration::get('xipbdp_numcolumn');
		return $helper;
	}
	// All Functional Logic here.
	public function getContent() {
		$html = '';
		if (Tools::isSubmit('save' . $this->name)) {
			$languages = Language::getLanguages(false);
               foreach($languages as $lang){
            		Configuration::updateValue('xipbdp_title_'.$lang['id_lang'],Tools::getvalue('xipbdp_title_'.$lang['id_lang']));
            		Configuration::updateValue('xipbdp_subtext_'.$lang['id_lang'],Tools::getvalue('xipbdp_subtext_'.$lang['id_lang']));
               }
            	Configuration::updateValue('xipbdp_postcount',Tools::getvalue('xipbdp_postcount'));
            	Configuration::updateValue('xipbdp_designlayout',Tools::getvalue('xipbdp_designlayout'));
            	Configuration::updateValue('xipbdp_numcolumn',Tools::getvalue('xipbdp_numcolumn'));
		}
		$helper = $this->SettingForm();
		$html .= $helper->generateForm($this->fields_form);
		return $html;
	}
    public function Register_Css()
    {
        if(isset($this->css_files) && !empty($this->css_files)){
        	$theme_name = $this->context->shop->theme_name;
        	foreach($this->css_files as $css_file):
        		if(isset($css_file['key']) && !empty($css_file['key']) && isset($css_file['src']) && !empty($css_file['src'])){
        			$media = (isset($css_file['media']) && !empty($css_file['media'])) ? $css_file['media'] : 'all';
        			$priority = (isset($css_file['priority']) && !empty($css_file['priority'])) ? $css_file['priority'] : 50;
	        			if(isset($css_file['load_theme']) && ($css_file['load_theme'] == true)){
	        				$this->context->controller->registerStylesheet($css_file['key'], 'themes/'.$theme_name.'/assets/css/'.$css_file['src'], ['media' => $media, 'priority' => $priority]);
	        			}else{
	        				$this->context->controller->registerStylesheet($css_file['key'], 'modules/'.$this->name.'/css/'.$css_file['src'], ['media' => $media, 'priority' => $priority]);
	        			}
        		}
        	endforeach;
        }
        return true;
    }
    public function Register_Js()
    {
        if(isset($this->js_files) && !empty($this->js_files)){
        	foreach($this->js_files as $js_file):
        		if(isset($js_file['key']) && !empty($js_file['key']) && isset($js_file['src']) && !empty($js_file['src'])){
        			$position = (isset($js_file['position']) && !empty($js_file['position'])) ? $js_file['position'] : 'bottom';
        			$priority = (isset($js_file['priority']) && !empty($js_file['priority'])) ? $js_file['priority'] : 50;
	        			if(isset($js_file['load_theme']) && ($js_file['load_theme'] == true)){
	        				$this->context->controller->registerJavascript($js_file['key'], _THEME_DIR_.'assets/js/'.$js_file['src'], ['position' => $position, 'priority' => $priority]);
	        			}else{
	        				$this->context->controller->registerJavascript($js_file['key'], 'modules/'.$this->name.'/js/'.$js_file['src'], ['position' => $position, 'priority' => $priority]);
	        			}
        		}
        	endforeach;
        }
        return true;
    }
	// Display Header Hook Execute Functions
	public function hookdisplayheader($params) {
		$this->Register_Css();
		$this->Register_Js();
	}
	// Display Header Hook Execute Functions
	public function ExecuteHook(){
		$id_lang = (int)$this->context->language->id;
		$xipbdp_title = Configuration::get('xipbdp_title_'.$id_lang);
		$xipbdp_subtext = Configuration::get('xipbdp_subtext_'.$id_lang);
		$xipbdp_postcount = Configuration::get('xipbdp_postcount');
		$xipbdp_designlayout = Configuration::get('xipbdp_designlayout');
		$xipbdp_numcolumn = Configuration::get('xipbdp_numcolumn');
		Media::addJsDef(array('xipbdp_numcolumn'=>$xipbdp_numcolumn));
		$xipblogposts = array();
		if(Module::isInstalled('xipblog') && Module::isEnabled('xipblog')){
			$xipblogposts = xippostsclass::GetCategoryPosts(0,1,$xipbdp_postcount,'post','DESC');
		}
		$this->smarty->assign(
			array(
				'xipbdp_title' => $xipbdp_title,
				'xipbdp_subtext' => $xipbdp_subtext,
				'xipbdp_postcount' => $xipbdp_postcount,
				'xipbdp_designlayout' => $xipbdp_designlayout,
				'xipbdp_numcolumn' => $xipbdp_numcolumn,
				'xipblogposts' => $xipblogposts,
			)
		);
	}
	public function hookdisplayContainerbottom($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');	
	}
	public function hookdisplayContainerbottom2($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');	
	}
	public function hookdisplayFullbottom($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');	
	}
	public function hookdisplayFullbottom2($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');	
	}
	public function hookdisplayhome($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');	
	}
	public function hookdisplayContainertop($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayfooterposts.tpl');	
	}
	public function hookdisplayContainertop2($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayfooterposts.tpl');	
	}
	public function hookdisplayFulltop($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayfooterposts.tpl');	
	}
	public function hookdisplayFulltop2($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayfooterposts.tpl');	
	}
	public function hookLeftColumn($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');	
	}	
	public function hookdisplayBrandSlider($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');	
	}
	public function hookRightColumn($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayleftposts.tpl');	
	}
	public function hookdisplayxipblogleft($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayleftposts.tpl');	
	}
	public function hookdisplayxipblogright($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayleftposts.tpl');	
	}
	// Display Header Hook Execute Functions
	public function hookdisplayHomeBottom($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');
	}
	public function hookdisplayHomeMiddle($params) {
		$this->ExecuteHook();
		return $this->fetch('module:'.$this->name.'/views/templates/front/xipblogdisplayposts.tpl');
	}
}