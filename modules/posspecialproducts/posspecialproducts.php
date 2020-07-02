<?php
if (!defined('_PS_VERSION_'))
	exit;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Adapter\Translator;
use PrestaShop\PrestaShop\Adapter\LegacyContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

class PosSpecialProducts extends Module implements WidgetInterface{
	private $token = '';
	private $_html = '';

	public static $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Product Name'),
        2 => array('id' =>2 , 'name' => 'Price'),
        3 => array('id' =>3 , 'name' => 'Product ID'),       
        4 => array('id' =>4 , 'name' => 'Position'),
        5 => array('id' =>5 , 'name' => 'Date updated'),
        6 => array('id' =>6 , 'name' => 'Date added')
    );

    public static $order_by = array(
        1 => array('id' =>1 , 'name' => 'Descending'),
        2 => array('id' =>2 , 'name' => 'Ascending'),
    );
	public function __construct() {
		$this->name 		= 'posspecialproducts';
		$this->tab 			= 'front_office_features';
		$this->version 		= '2.0';
		$this->author 		= 'posthemes';
		$this->bootstrap = true;
		$this->_html        = '';
		$this->displayName 	= $this->l('Pos Special Products module');
		$this->description 	= $this->l('Show special products on homepage.');
		parent :: __construct();
		$this->templateFile = 'module:posspecialproducts/views/templates/hook/posspecialproducts.tpl';
       
	}
	
	public function install() {
        Configuration::updateValue($this->name . '_limit', 12); 
        Configuration::updateValue($this->name . '_row', 1);
        Configuration::updateValue($this->name . '_items', 2);
		Configuration::updateValue($this->name . '_speed', 1000);
        Configuration::updateValue($this->name . '_auto', 0);
		Configuration::updateValue($this->name . '_pause', 3000);
        Configuration::updateValue($this->name . '_arrow', 1);
        Configuration::updateValue($this->name . '_pagi', 0);
		Configuration::updateValue($this->name . '_move', 1);
        Configuration::updateValue($this->name . '_per_lg', 2);
        Configuration::updateValue($this->name . '_per_md', 1);
        Configuration::updateValue($this->name . '_per_sm', 1);
        Configuration::updateValue($this->name . '_per_xs', 1);
        Configuration::updateValue($this->name . '_per_xxs', 1);
        Configuration::updateValue($this->name . '_sort', 7);
        Configuration::updateValue($this->name . '_order', 1);
        
		
		return parent :: install()
			&& $this->registerHook('displayHome')
			&& $this->registerHook('addproduct')
			&& $this->registerHook('updateproduct')
			&& $this->registerHook('deleteproduct')
			&& $this->registerHook('header')
			&& $this->installFixtures();
	}
	public function hookDisplayHeader()
	{ 
		$this->context->controller->addJS($this->_path.'js/posspecialproducts.js');
	}
	protected function installFixtures()
	{
		$languages = Language::getLanguages(false);
		foreach ($languages as $lang){
			$this->installFixture((int)$lang['id_lang'], 'cms.jpg');
		}

		return true;
	}

	protected function installFixture($id_lang, $image = null)
	{	
		$values['posspecialproducts_img'][(int)$id_lang] = $image;
		$values['posspecialproducts_link'][(int)$id_lang] = '#';
		$values['posspecialproducts_title'][(int)$id_lang] = 'Hot Deals';
		$values['posspecialproducts_desc'][(int)$id_lang] = '';
		Configuration::updateValue($this->name . '_title', $values['posspecialproducts_title']);
		Configuration::updateValue($this->name . '_desc', $values['posspecialproducts_desc']);
		Configuration::updateValue($this->name . '_img', $values['posspecialproducts_img']);
		Configuration::updateValue($this->name . '_link', $values['posspecialproducts_link']);

	}
	
    public function uninstall() {
        $this->_clearCache('*');

		Configuration::deleteByName($this->name . '_limit');
        Configuration::deleteByName($this->name . '_row');
        Configuration::deleteByName($this->name . '_items');
		Configuration::deleteByName($this->name . '_speed');
        Configuration::deleteByName($this->name . '_auto');
		Configuration::deleteByName($this->name . '_pause');
        Configuration::deleteByName($this->name . '_arrow');
        Configuration::deleteByName($this->name . '_pagi');
		Configuration::deleteByName($this->name . '_move');
        Configuration::deleteByName($this->name . '_per_lg');
        Configuration::deleteByName($this->name . '_per_md');
        Configuration::deleteByName($this->name . '_per_sm');
        Configuration::deleteByName($this->name . '_per_xs');
        Configuration::deleteByName($this->name . '_per_xxs');
        Configuration::deleteByName($this->name . '_sort');
        Configuration::deleteByName($this->name . '_order');
        Configuration::deleteByName($this->name . '_img');
        Configuration::deleteByName($this->name . '_link');
		
        return parent::uninstall();
    }

  
	public function psversion() {
		$version=_PS_VERSION_;
		$exp=$explode=explode(".",$version);
		return $exp[1];
	}
	
    private function postProcess() {
		if (Tools::isSubmit('submitposspecialproducts'))
		{
			if($this->_postValidation()){
				$languages = Language::getLanguages(false);
				$values = array();
				$update_images_values = false;
		        
				
				foreach ($languages as $lang){
					if (isset($_FILES['poss_img_'.$lang['id_lang']])
					&& isset($_FILES['poss_img_'.$lang['id_lang']]['tmp_name'])
					&& !empty($_FILES['poss_img_'.$lang['id_lang']]['tmp_name']))
					{
						if ($error = ImageManager::validateUpload($_FILES['poss_img_'.$lang['id_lang']], 4000000))
							return $error;
						else
						{
							$ext = substr($_FILES['poss_img_'.$lang['id_lang']]['name'], strrpos($_FILES['poss_img_'.$lang['id_lang']]['name'], '.') + 1);
							$file_name = md5($_FILES['poss_img_'.$lang['id_lang']]['name']).'.'.$ext;

							if (!move_uploaded_file($_FILES['poss_img_'.$lang['id_lang']]['tmp_name'], dirname(__FILE__).DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$file_name))
								return $this->displayError($this->l('An error occurred while attempting to upload the file.'));
							else
							{
								if (Configuration::hasContext('poss_img', $lang['id_lang'], Shop::getContext())
									&& Configuration::get('poss_img', $lang['id_lang']) != $file_name)
									@unlink(dirname(__FILE__).DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.Configuration::get('poss_img', $lang['id_lang']));

								$values[$this->name . '_img'][$lang['id_lang']] = $file_name;
								
							}
						}

						$update_images_values = true;
					}
					$values[$this->name . '_link'][$lang['id_lang']] = Tools::getValue('poss_link_'.$lang['id_lang']);
					$values[$this->name . '_title'][$lang['id_lang']] = Tools::getValue('poss_title_'.$lang['id_lang']);
					$values[$this->name . '_desc'][$lang['id_lang']] = Tools::getValue('poss_desc_'.$lang['id_lang']);
				}
				if ($update_images_values)
				Configuration::updateValue($this->name . '_img', $values[$this->name . '_img']);
				Configuration::updateValue($this->name . '_link', $values[$this->name . '_link']);
				Configuration::updateValue($this->name . '_title', $values[$this->name . '_title']);
				Configuration::updateValue($this->name . '_desc', $values[$this->name . '_desc']);
				Configuration::updateValue($this->name . '_row', Tools::getValue('poss_row'));
				Configuration::updateValue($this->name . '_items', Tools::getValue('poss_items'));
				Configuration::updateValue($this->name . '_speed', Tools::getValue('poss_speed'));
				Configuration::updateValue($this->name . '_auto', Tools::getValue('poss_auto'));
				Configuration::updateValue($this->name . '_pause', Tools::getValue('poss_pause'));
				Configuration::updateValue($this->name . '_arrow', Tools::getValue('poss_arrow'));
				Configuration::updateValue($this->name . '_pagi', Tools::getValue('poss_pagi'));
				Configuration::updateValue($this->name . '_move', Tools::getValue('poss_move'));
				Configuration::updateValue($this->name . '_pausehover', Tools::getValue('poss_pausehover'));
				Configuration::updateValue($this->name . '_limit', Tools::getValue('poss_limit'));
				Configuration::updateValue($this->name . '_sort', Tools::getValue('poss_sort'));
				Configuration::updateValue($this->name . '_order', Tools::getValue('poss_order'));
				Configuration::updateValue($this->name . '_per_lg', Tools::getValue($this->name . '_per_lg'));
				Configuration::updateValue($this->name . '_per_md', Tools::getValue($this->name . '_per_md'));
				Configuration::updateValue($this->name . '_per_sm', Tools::getValue($this->name . '_per_sm'));
				Configuration::updateValue($this->name . '_per_xs', Tools::getValue($this->name . '_per_xs'));
				Configuration::updateValue($this->name . '_per_xxs', Tools::getValue($this->name . '_per_xxs'));
				
				
				return $this->displayConfirmation($this->l('The settings have been updated.'));
			}else{
				return $this->_html;
			}
		}
		
		return '';
    }
	
	public function getContent()
	{		
		return $this->postProcess().$this->renderForm();
	}

	protected function _postValidation()
	{
		$errors = array();
		if (Tools::isSubmit('submitposspecialproducts'))
		{

			if (!Validate::isInt(Tools::getValue('poss_row')) || !Validate::isInt(Tools::getValue('poss_items')) ||
				!Validate::isInt(Tools::getValue('poss_speed')) || !Validate::isInt(Tools::getValue('poss_pause')) || !Validate::isInt(Tools::getValue('poss_limit'))
			)
				$errors[] = $this->l('Invalid values');
		} 
		/* Returns if validation is ok */
		if (count($errors))
		{
			$this->_html .= $this->displayError(implode('<br />', $errors));

			return false;
		}

		return true;
	}
	public function renderForm()
	{	
		
        $id_lang = (int) Context::getContext()->language->id;
        //echo '<pre>';print_r($test);die;
			$fields_form[0]['form'] = array(
				'legend' => array(
					'title' => $this->l('Module Settings'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
						array(
							'type' => 'text',
							'lang' => true,
							'label' => $this->l('Module title'),
							'name' => 'poss_title',
							'desc' => $this->l('This title will be displayed on front-office.')
						 ),
						array(
							'type' => 'text',
							'lang' => true,
							'label' => $this->l('Module desc'),
							'name' => 'poss_desc',
							'desc' => $this->l('This desc will be displayed on front-office.')
						 ),
						/*  array(
							'type' => 'file_lang',
							'label' => $this->l('Banner image'),
							'name' => 'poss_img',
							'desc' => $this->l('Upload an image for your banner. The recommended dimensions are 350 x 461px.'),
							'lang' => true,
						),
						array(
							'type' => 'text',
							'lang' => true,
							'label' => $this->l('Banner Link'),
							'name' => 'poss_link',
							'desc' => $this->l('Enter the link associated to your banner. When clicking on the banner, the link opens in the same window.')
						),  */
						array(
		                    'type' => 'select',
		                    'label' => $this->l('Sort by:'),
		                    'name' => 'poss_sort',
		                    'options' => array(
		                        'query' => self::$sort_by,
		                        'id' => 'id',
		                        'name' => 'name',
		                    ),
		                    'validation' => 'isUnsignedInt',
		                ),
		                array(
		                    'type' => 'select',
		                    'label' => $this->l('Order by:'),
		                    'name' => 'poss_order',
		                    'options' => array(
		                        'query' => self::$order_by,
		                        'id' => 'id',
		                        'name' => 'name',
		                    ),
		                    'validation' => 'isUnsignedInt',
		                ), 
						array(
							'type' => 'text',
							'label' => $this->l('Products limit :'),
							'name' => 'poss_limit',
							'class' => 'fixed-width-sm',
							'desc' => $this->l('Set the number of products which you would like to see displayed in this module')
						),
						
						
				),
				'submit' => array(
					'title' => $this->l('Save'),
				)
			);
			$fields_form[1]['form'] = array(
				'legend' => array(
					'title' => $this->l('Slider configurations'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
							'type' => 'text',
							'label' => $this->l('Rows'),
							'name' => 'poss_row',
							'class' => 'fixed-width-sm',
							'desc' => $this->l('Number rows of module')
					),
					array(
							'type' => 'text',
							'label' => $this->l('Number of Items:'),
							'name' => 'poss_items',
							'class' => 'fixed-width-sm',
							'desc' => $this->l('Show number of product visible.')
					),
					array(
							'type' => 'text',
							'label' => $this->l('Slide speed:'),
							'name' => 'poss_speed',
							'class' => 'fixed-width-sm',
							'suffix' => 'milliseconds',
							'desc' => $this->l('')
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Auto play'),
						'name' => 'poss_auto',
						'class' => 'fixed-width-xs',
						'desc' => $this->l('Default is 1000ms'),
						'values' => array(
							array(
								'id' => 'poss_auto_on',
								'value' => 1,
								'label' => $this->l('Enabled')
								),
							array(
								'id' => 'poss_auto_off',
								'value' => 0,
								'label' => $this->l('Disabled')
							)
						)
					),
					array(
							'type' => 'text',
							'label' => $this->l('Time auto'),
							'name' => 'poss_pause',
							'class' => 'fixed-width-sm',
							'suffix' => 'milliseconds',
							'desc' => $this->l('This field only is value when auto play function is enable. Default is 3000ms.')
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Show Next/Back control:'),
						'name' => 'poss_arrow',
						'class' => 'fixed-width-xs',
						'desc' => $this->l(''),
						'values' => array(
							array(
								'id' => 'poss_arrow_on',
								'value' => 1,
								'label' => $this->l('Enabled')
								),
							array(
								'id' => 'poss_arrow_off',
								'value' => 0,
								'label' => $this->l('Disabled')
							)
						)
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Show pagination control:'),
						'name' => 'poss_pagi',
						'class' => 'fixed-width-xs',
						'desc' => $this->l(''),
						'values' => array(
							array(
								'id' => 'poss_pagi_on',
								'value' => 1,
								'label' => $this->l('Enabled')
								),
							array(
								'id' => 'poss_pagi_off',
								'value' => 0,
								'label' => $this->l('Disabled')
							)
						)
					),
					array(
						'type' => 'radio',
						'label' => $this->l('Scroll number:'),
						'name' => 'poss_move',
	                    'default_value' => 0,
						'values' => array(
							array(
								'id' => 'poss_move_on',
								'value' => 1,
								'label' => $this->l('1 item')),
							array(
								'id' => 'poss_move_off',
								'value' => 0,
								'label' => $this->l('All visible items')),
						),
	                    'validation' => 'isBool',
					),
					 array(
						'type' => 'switch',
						'label' => $this->l('Pause On Hover:'),
						'name' => 'poss_pausehover',
	                    'default_value' => 1,
						'is_bool' => true,
						'values' => array(
							array(
								'id' => 'poss_pausehover_on',
								'value' => 1,
								'label' => $this->l('Yes')),
							array(
								'id' => 'poss_pausehover_off',
								'value' => 0,
								'label' => $this->l('No')),
						),
	                    'validation' => 'isBool',
					),
					 'pos_fp_pro' => array(
	                    'type' => 'html',
	                    'id' => 'pos_fp_pro',
	                    'label'=> $this->l('Responsive:'),
	                    'name' => '',
	                ),
					
				),
				'submit' => array(
					'title' => $this->l('Save'),
				)		
			);
		$fields_form[1]['form']['input']['pos_fp_pro']['name'] = $this->BuildDropListGroup($this->findCateProPer());
		
		$helper = new HelperForm();
		$helper->show_toolbar = true;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->module = $this;
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitposspecialproducts';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$module = _PS_MODULE_DIR_ ;
		$helper->tpl_vars = array(
			'module' =>$module,
			'uri' => $this->getPathUri(),
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
		);

		return $helper->generateForm($fields_form);
	}
	
	public function getConfigFieldsValues()
	{
		$languages = Language::getLanguages(false);
		$fields = array(
			'poss_row'        => Configuration::get($this->name . '_row'),
			'poss_items'      => Configuration::get($this->name . '_items'),
			'poss_speed'      => Configuration::get($this->name . '_speed'),
			'poss_auto'       => Configuration::get($this->name . '_auto'),
			'poss_pause'      => Configuration::get($this->name . '_pause'),
			'poss_arrow'      => Configuration::get($this->name . '_arrow'),
			'poss_pagi'       => Configuration::get($this->name . '_pagi'),
			'poss_move'       => Configuration::get($this->name . '_move'),
			'poss_pausehover' => Configuration::get($this->name . '_pausehover'),
			'poss_sort'       => Configuration::get($this->name . '_sort'),
			'poss_order'      => Configuration::get($this->name . '_order'),
			'poss_limit'      => Configuration::get($this->name . '_limit'),

		);
		
		
		foreach ($languages as $lang)
		{	
			$fields['poss_title'][$lang['id_lang']] = Tools::getValue('posspecialproducts_title_'.$lang['id_lang'], Configuration::get($this->name . '_title', $lang['id_lang']));
			$fields['poss_desc'][$lang['id_lang']] = Tools::getValue('posspecialproducts_desc_'.$lang['id_lang'], Configuration::get($this->name . '_desc', $lang['id_lang']));
			$fields['poss_img'][$lang['id_lang']] = Tools::getValue('posspecialproducts_img_'.$lang['id_lang'], Configuration::get($this->name . '_img', $lang['id_lang']));
			$fields['poss_link'][$lang['id_lang']] = Tools::getValue('posspecialproducts_link_'.$lang['id_lang'], Configuration::get($this->name . '_link', $lang['id_lang']));
		}
		
		return $fields;
	}

	public function hookHeader($params){
		$this->context->controller->addCSS(($this->_path).'posspecialproducts.css', 'all');
    }
        
    

    public function renderWidget($hookName = null, array $configuration = [])
    {
            $variables = $this->getWidgetVariables($hookName, $configuration);

            if (empty($variables)) {
                return false;
            }

            $this->smarty->assign($variables);
  

        return $this->fetch($this->templateFile);
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $products = $this->getProducts();

        $title = Configuration::get($this->name . '_title', $this->context->language->id);
		$desc = Configuration::get($this->name . '_desc', $this->context->language->id);
        $slider_options = array(
            'rows' => (int)Configuration::get($this->name . '_row'),
            'number_item' => (int)Configuration::get($this->name . '_items'),
            'speed_slide' => (int)Configuration::get($this->name . '_speed'),
            'auto_play' => (int)Configuration::get($this->name . '_auto'),
            'auto_time' => (int)Configuration::get($this->name . '_pause'),
            'show_arrow' => (int)Configuration::get($this->name . '_arrow'),
            'show_pagination' => (int)Configuration::get($this->name . '_pagi'),
            'move' => (int)Configuration::get($this->name . '_move'),
            'pausehover' => (int)Configuration::get($this->name . '_pausehover'),
            'items_lg' => (int)Configuration::get($this->name . '_per_lg'), 
            'items_md' => (int)Configuration::get($this->name . '_per_md'), 
            'items_sm' => (int)Configuration::get($this->name . '_per_sm'), 
            'items_xs' => (int)Configuration::get($this->name . '_per_xs'), 
            'items_xxs' => (int)Configuration::get($this->name . '_per_xxs'),       
        );
		$countdown_products = $this->getCoutdownProducts();
		//echo '<pre>'; print_r($countdown_products); die;
        $imgname = Configuration::get($this->name . '_img', $this->context->language->id);
        $banner_image= '';
		if ($imgname && file_exists(_PS_MODULE_DIR_.$this->name.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$imgname))
			$banner_image = $this->context->link->protocol_content.Tools::getMediaServer($imgname).$this->_path.'img/'.$imgname;
        if (!empty($products)) {
            return array(
				'countdown_products' => $countdown_products,
                'products' => $products,
                'title' => $title,
				'desc' => $desc,
                'slider_options' => $slider_options,
                'image_link' => Configuration::get($this->name . '_link', $this->context->language->id),
                'banner_img' =>  $banner_image
            );
        }
        return false;
    }
	
	public function hookAddProduct($params)
	{
		$this->_clearCache('*');
	}

	public function hookUpdateProduct($params)
	{
		$this->_clearCache('*');
	}

	public function hookDeleteProduct($params)
	{
		$this->_clearCache('*');
	}

	public function BuildDropListGroup($group)
    {
        if(!is_array($group) || !count($group))
            return false;

        $html = '<div class="row">';
        foreach($group AS $key => $k)
        {
             if($key==4)
                 $html .= '</div><div class="row">';

             $html .= '<div class="col-xs-4 col-sm-3">'.$k['label'].'</label>'.
             '<select name="'.$k['id'].'" 
             id="'.$k['id'].'" 
             class="'.(isset($k['class']) ? $k['class'] : 'fixed-width-md').'"'.
             (isset($k['onchange']) ? ' onchange="'.$k['onchange'].'"':'').' >';
            
            for ($i=1; $i < 7; $i++){
                $html .= '<option value="'.$i.'" '.(Configuration::get($k['id']) == $i ? ' selected="selected"':'').'>'.$i.'</option>';
            }
                                
            $html .= '</select></div>';
        }

        return $html.'</div>';
    }
    public function findCateProPer()
    {
        return array(
            array(
                'id' => 'posspecialproducts_per_lg',
                'label' => $this->l('Desktops (<1200 pixels)'),
            ),   
			array(
                'id' => 'posspecialproducts_per_md',
                'label' => $this->l('Tablets (<992 pixels)'),
            ),
            array(
                'id' => 'posspecialproducts_per_sm',
                'label' => $this->l('Large Phones (<768 pixels)'),
            ),
            array(
                'id' => 'posspecialproducts_per_xs',
                'label' => $this->l('Medium Phones (<576 pixels)'),
            ),
            array(
                'id' => 'posspecialproducts_per_xxs',
                'label' => $this->l('Small phones (<360 pixels)'),
            ),
        );
    }
    protected function getCacheId($name = null)
	{
		if ($name === null)
		$name = 'posspecialproducts';
		return parent::getCacheId($name.'|'.date('Ymd'));
	}

	public function _clearCache($template, $cache_id = null, $compile_id = null)
	{
		parent::_clearCache('posspecialproducts.tpl');
	}
	 protected function getProducts()
    {   
        $random = false;
        $sortby = Configuration::get($this->name . '_sort');
        switch($sortby)
        {
            case 1:
            $sortby = 'name';
            break;
            case 2:
            $sortby = 'price';
            break;
            case 3:
            $sortby = 'id_product';
            break;
            case 4:
            $sortby = 'position';
            break;
            case 5:
            $sortby = 'date_upd';
            break;
            case 6:
            $sortby = 'date_add';
            break;
        }
        $orderby = Configuration::get($this->name . '_order');
        if($orderby == 1) {
            $orderby = 'DESC';
        } else {
            $orderby = 'ASC';
        };
        
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

        $nProducts = Configuration::get($this->name . '_limit');

        $products = Product::getPricesDrop((int) Context::getContext()->language->id, 0, ($nProducts ? $nProducts : 8), false,  $sortby , $orderby);
		if($products){
			foreach ($products as $rawProduct) {
				$products_for_template[] = $presenter->present(
					$presentationSettings,
					$assembler->assembleProduct($rawProduct),
					$this->context->language
				);
			}
		}
        return $products_for_template;
    }
	 protected function getCoutdownProducts()
    {   

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

        $nProducts = Configuration::get($this->name . '_limit');

        $products = $this->getPricesDropCountdown((int) Context::getContext()->language->id);
		if($products){
			foreach ($products as $rawProduct) {
				$products_for_template[] = $presenter->present(
					$presentationSettings,
					$assembler->assembleProduct($rawProduct),
					$this->context->language
				);
			}
		}
        return $products_for_template;
    }
	public static function getPricesDropCountdown($id_lang, $page_number = 0, $nb_products = 10, $count = false,$order_by = null, $order_way = null, $beginning = false, $ending = false, Context $context = null)
	 {

	  if (!$context)
	   $context = Context::getContext();
	  if ($page_number < 0)
	   $page_number = 0;
	  if ($nb_products < 1)
	   $nb_products = 10;
	  if (empty($order_by) || $order_by == 'position')
	   $order_by = 'price';
	  if (empty($order_way))
	   $order_way = 'DESC';
	  if ($order_by == 'id_product' || $order_by == 'price' || $order_by == 'date_add' || $order_by == 'date_upd')
	   $order_by_prefix = 'p';
	  else if ($order_by == 'name')
	   $order_by_prefix = 'pl';

	  if (!Validate::isOrderBy($order_by) || !Validate::isOrderWay($order_way))
	   die(Tools::displayError());
	  $current_date = date('Y-m-d H:i:s');

	  $ids_product = self::getProductIdByDates((!$beginning ? $current_date : $beginning),
		  (!$ending ? $current_date : $ending), $context);
	  
	  $tab_id_product = array();
	  foreach ($ids_product as $product)
	   if (is_array($product))
		$tab_id_product[] = (int)$product['id_product'];
	   else
		$tab_id_product[] = (int)$product;

	  $front = true;
	  if (!in_array($context->controller->controller_type, array('front', 'modulefront')))
	   $front = false;

	  $sql_groups = '';
	  if (Group::isFeatureActive())
	  {
	   $groups = FrontController::getCurrentCustomerGroups();
	   $sql_groups = 'AND p.`id_product` IN (
		 SELECT cp.`id_product`
		 FROM `'._DB_PREFIX_.'category_group` cg
		 LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_category` = cg.`id_category`)
		 WHERE cg.`id_group` '.(count($groups) ? 'IN ('.pSQL(implode(',', $groups)).')' : '= 1').'
		)';
	  }

	  if (strpos($order_by, '.') > 0)
	  {
	   $order_by = explode('.', $order_by);
	   $order_by = pSQL($order_by[0]).'.`'.pSQL($order_by[1]).'`';
	  }

	  $sql = '
	   SELECT
		p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, pl.`description`, pl.`description_short`,
		MAX(product_attribute_shop.id_product_attribute) id_product_attribute,
		pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`,
		pl.`name`, MAX(image_shop.`id_image`) id_image, il.`legend`, m.`name` AS manufacturer_name,
		DATEDIFF(
		 p.`date_add`,
		 DATE_SUB(
		  NOW(),
		  INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT'))
			 ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY
		 )
		) > 0 AS new
	   FROM `'._DB_PREFIX_.'product` p
	   '.Shop::addSqlAssociation('product', 'p').'
	   LEFT JOIN '._DB_PREFIX_.'product_attribute pa ON (pa.id_product = p.id_product)
	   '.Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.default_on=1').'
	   '.Product::sqlStock('p', 0, false, $context->shop).'
	   LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (
		p.`id_product` = pl.`id_product`
		AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
	   )
	   LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product`)'.
		  Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
	   LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
	   LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON (m.`id_manufacturer` = p.`id_manufacturer`)
	   WHERE product_shop.`active` = 1
	   AND product_shop.`show_price` = 1
	   '.($front ? ' AND p.`visibility` IN ("both", "catalog")' : '').'
	   '.((!$beginning && !$ending) ? ' AND p.`id_product` IN ('.((is_array($tab_id_product) && count($tab_id_product))
		   ? pSQL(implode(', ', $tab_id_product)) : 0).')' : '').'
	   '.$sql_groups.'
	   GROUP BY product_shop.id_product
	   ORDER BY '.(isset($order_by_prefix) ? pSQL($order_by_prefix).'.' : '').pSQL($order_by).' '.pSQL($order_way).'
	   LIMIT '.((int)$page_number * (int)$nb_products).', '.(int)$nb_products;

	  $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
	  
	  if (!$result)
	   return false;

	  if ($order_by == 'price')
	   Tools::orderbyPrice($result, $order_way);

	  return Product::getProductsProperties($id_lang, $result);
	 }

	 public static function getProductIdByDates($beginning, $ending, Context $context = null, $with_combination = false)
	 {
	  if (!$context)
	   $context = Context::getContext();

	  $id_address = $context->cart->{Configuration::get('PS_TAX_ADDRESS_TYPE')};
	  $ids = Address::getCountryAndState($id_address);
	  $id_country = ($ids['id_country'] ? (int)$ids['id_country'] : (int)Configuration::get('PS_COUNTRY_DEFAULT'));

	  return self::getProductIdByDate($context->shop->id, $context->currency->id, $id_country,
		  $context->customer->id_default_group, $beginning, $ending, 0, $with_combination);
	 }
	 public static function getProductIdByDate($id_shop, $id_currency, $id_country,
		 $id_group, $beginning, $ending, $id_customer = 0, $with_combination_id = false)
	 {
	  if (!SpecificPrice::isFeatureActive())
	   return array();

	  $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT sp.`id_product`, sp.`id_product_attribute`
		FROM `'._DB_PREFIX_.'specific_price` sp 
		JOIN `'._DB_PREFIX_.'category_product` cp ON (sp.`id_product` = cp.`id_product`)
		WHERE sp.`id_shop` IN(0, '.(int)$id_shop.') AND
		  sp.`id_currency` IN(0, '.(int)$id_currency.') AND
		  sp.`id_country` IN(0, '.(int)$id_country.') AND
		  sp.`id_group` IN(0, '.(int)$id_group.') AND
		  sp.`id_customer` IN(0, '.(int)$id_customer.') AND
		  sp.`from_quantity` = 1 AND
		  (
		   (`from` = \'0000-00-00 00:00:00\' OR \''.pSQL($beginning).'\' >= `from`)
		   AND
		   (\''.pSQL($ending).'\' <= `to`)
		  )
		  AND
		  sp.`reduction` > 0
	   ', false);
	  $ids_product = array();
	  while ($row = Db::getInstance()->nextRow($result))
	   $ids_product[] = $with_combination_id ? array('id_product' => (int)$row['id_product'],
		'id_product_attribute' => (int)$row['id_product_attribute']) : (int)$row['id_product'];
	  return $ids_product;
	 }
}