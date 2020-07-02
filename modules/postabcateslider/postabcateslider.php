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

class postabcateslider extends Module implements WidgetInterface {

	private $templateFile;

	public static $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Product Name'),
        2 => array('id' =>2 , 'name' => 'Price'),
        3 => array('id' =>3 , 'name' => 'Product ID'),       
        4 => array('id' =>4 , 'name' => 'Position'),
        5 => array('id' =>5 , 'name' => 'Date updated'),
        6 => array('id' =>6 , 'name' => 'Date added'),
        7 => array('id' =>7 , 'name' => 'Random'),
    );

    public static $order_by = array(
        1 => array('id' =>1 , 'name' => 'Descending'),
        2 => array('id' =>2 , 'name' => 'Ascending'),
    );	
	public function __construct() {
		$this->name 		= 'postabcateslider';
		$this->tab 			= 'front_office_features';
		$this->version 		= '1.5';
		$this->author 		= 'posthemes';
		$this->bootstrap = true;
		$this->_html        = '';
		$this->displayName 	= $this->l('Category Tab Slider');
		$this->description 	= $this->l('Show tab products from  categories on homepage');
		parent :: __construct();
		$useSSL = ((isset($this->ssl) && $this->ssl && Configuration::get('PS_SSL_ENABLED')) || Tools::usingSecureMode()) ? true : false;
        $protocol_content = ($useSSL) ? 'https://' : 'http://';
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
		
		$this->context->smarty->assign(
            array(
                'content_dir'=> $protocol_content.Tools::getHttpHost().__PS_BASE_URI__,
                       )
        );
		$this->templateFile = 'module:postabcateslider/views/templates/hook/postabcateslider.tpl';
       
	}
	
	public function install() {
        Configuration::updateValue($this->name . '_row', 2);
        Configuration::updateValue($this->name . '_number_item', 6);
		Configuration::updateValue($this->name . '_speed_slide', 1000);
        Configuration::updateValue($this->name . '_auto_play', 0);
		Configuration::updateValue($this->name . '_pause_time', 3000);
        Configuration::updateValue($this->name . '_show_arrow', 1);
        Configuration::updateValue($this->name . '_show_ctr', 0);
        Configuration::updateValue($this->name . '_limit', 12);
        Configuration::updateValue($this->name . '_sort', 1);
        Configuration::updateValue($this->name . '_order', 1);
        Configuration::updateValue($this->name . '_move', 1);
        Configuration::updateValue($this->name . '_pausehover', 0);
		Configuration::updateValue($this->name . '_per_lg', 4);
        Configuration::updateValue($this->name . '_per_md', 3);
        Configuration::updateValue($this->name . '_per_sm', 2);
        Configuration::updateValue($this->name . '_per_xs', 2);
        Configuration::updateValue($this->name . '_per_xxs', 1);
		$arrayDefault = array('3','4','5');
		$cateDefault = implode(',',$arrayDefault);
		Configuration::updateGlobalValue($this->name.'_list_cate',$cateDefault);
		
		return parent :: install()
			&& $this->registerHook('displayHome')
			&& $this->registerHook('header')
			&& $this->installFixtures();
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
		$values['postabcateslider_img'][(int)$id_lang] = $image;
		$values['postabcateslider_link'][(int)$id_lang] = '#';
		$values['postabcateslider_title'][(int)$id_lang] = 'New Arrivals';
		$values['postabcateslider_desc'][(int)$id_lang] = '';
		Configuration::updateValue($this->name . '_title', $values['postabcateslider_title']);
		Configuration::updateValue($this->name . '_desc', $values['postabcateslider_desc']);
		Configuration::updateValue($this->name . '_img', $values['postabcateslider_img']);
		Configuration::updateValue($this->name . '_link', $values['postabcateslider_link']);
	}
	
      public function uninstall() {
        $this->_clearCache('postabcateslider.tpl');
		Configuration::deleteByName($this->name . '_row');
		Configuration::deleteByName($this->name . '_number_item');
		Configuration::deleteByName($this->name . '_speed_slide');
		Configuration::deleteByName($this->name . '_auto_play');
		Configuration::deleteByName($this->name . '_pause_time');
		Configuration::deleteByName($this->name . '_show_arrow');
		Configuration::deleteByName($this->name . '_show_ctr');
		Configuration::deleteByName($this->name . '_limit');
		Configuration::deleteByName($this->name . '_list_cate');
		Configuration::deleteByName($this->name . '_title');
		Configuration::deleteByName($this->name . '_desc');
		Configuration::deleteByName($this->name . '_img');
		Configuration::deleteByName($this->name . '_link');
		Configuration::deleteByName($this->name . '_sort');
        Configuration::deleteByName($this->name . '_order');
        Configuration::deleteByName($this->name . '_move');
        Configuration::deleteByName($this->name . '_pausehover');
        Configuration::deleteByName($this->name . '_per_lg');
        Configuration::deleteByName($this->name . '_per_md');
        Configuration::deleteByName($this->name . '_per_sm');
        Configuration::deleteByName($this->name . '_per_xs');
        Configuration::deleteByName($this->name . '_per_xxs');
		$arrayDefault = array('3','4','5');
		
        return parent::uninstall();
    }

  
	public function psversion() {
		$version=_PS_VERSION_;
		$exp=$explode=explode(".",$version);
		return $exp[1];
	}
    
    
    public function hookHeader($params){
        $this->context->controller->addJS($this->_path.'js/postabcateslider.js');
		$this->context->controller->addCSS($this->_path.'postabcateslider.css');
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
        $catSelected = Configuration::get($this->name . '_list_cate');
		$cateArray = explode(',', $catSelected); 
		$id_lang =(int) Context::getContext()->language->id;
		$id_shop = (int) Context::getContext()->shop->id;
		$arrayProductCate = array();
		
		foreach($cateArray as $id_category) {
			$category = new Category((int) $id_category, (int) $id_lang, (int) $id_shop);
			$categoryProducts = $this->getProducts((int) $id_category);
			$files = scandir(_PS_CAT_IMG_DIR_);
			$categorythumb ='';
			if (count($files) > 0){
				foreach ($files as $file){
					if (preg_match('/^'.$id_category.'-([0-9])?_thumb.jpg/i',$file) === 1) {
						$categorythumb = $this->context->link->getMediaLink(_THEME_CAT_DIR_.$file);
					}
				}
			}
			if($categoryProducts) {
				$arrayProductCate[] = array('id' => $id_category, 'name'=> $category->name, 'product' => $categoryProducts,'categorythumbs' => $categorythumb,);
			}
		
		}
        $title = Configuration::get($this->name . '_title', $this->context->language->id);
        $desc = Configuration::get($this->name . '_desc', $this->context->language->id);
        $slider_options = array(
            'rows' => (int)Configuration::get($this->name . '_row'),
			'number_item' => (int)Configuration::get($this->name . '_number_item'),
			'speed_slide' => (int)Configuration::get($this->name . '_speed_slide'),
			'auto_play' => (int)Configuration::get($this->name . '_auto_play'),
			'auto_time' => (int)Configuration::get($this->name . '_pause_time'),
			'show_arrow' => (int)Configuration::get($this->name . '_show_arrow'),
			'show_pagination' => (int)Configuration::get($this->name . '_show_ctr'),
			'limit' => (int)Configuration::get($this->name . '_limit'),
			'move' => (int)Configuration::get($this->name . '_move'),
			'pausehover' => (int)Configuration::get($this->name . '_pausehover'),
			'items_lg' => (int)Configuration::get($this->name . '_per_lg'),	
			'items_md' => (int)Configuration::get($this->name . '_per_md'),	
			'items_sm' => (int)Configuration::get($this->name . '_per_sm'),	
			'items_xs' => (int)Configuration::get($this->name . '_per_xs'),	
			'items_xxs' => (int)Configuration::get($this->name . '_per_xxs'),      
        );

		$imgname = Configuration::get($this->name . '_img', $this->context->language->id);

		if ($imgname && file_exists(_PS_MODULE_DIR_.$this->name.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$imgname))
			$this->smarty->assign('banner_img', $this->context->link->protocol_content.Tools::getMediaServer($imgname).$this->_path.'img/'.$imgname);
		if(!empty($arrayProductCate)){
			return array(
				'productCates' => $arrayProductCate,
	            'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
				'title' => Configuration::get($this->name . '_title', $this->context->language->id),
				'desc' => Configuration::get($this->name . '_desc', $this->context->language->id),
				'image_link' => Configuration::get($this->name . '_link', $this->context->language->id),	
				'slider_options' => $slider_options
	        );
		}
       
        return false;
    }
	protected function getProducts($id_category)
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
            case 7:
            $sortby = null;
            $random = true;
            break;
        }
        $orderby = Configuration::get($this->name . '_order');
        if($orderby == 1) {
            $orderby = 'DESC';
        } else {
            $orderby = 'ASC';
        };

         $category = new Category($id_category);

        $searchProvider = new CategoryProductSearchProvider(
            $this->context->getTranslator(),
            $category
        );

        $context = new ProductSearchContext($this->context);

        $query = new ProductSearchQuery();

        $nProducts = Configuration::get($this->name . '_limit');
        if ($nProducts < 0) {
            $nProducts = 12;
        }

        $query
            ->setResultsPerPage($nProducts)
            ->setPage(1)
        ;

        if ($random) {
            $query->setSortOrder(SortOrder::random());
        } else {
            $query->setSortOrder(new SortOrder('product', $sortby, $orderby));
        }

        $result = $searchProvider->runQuery(
            $context,
            $query
        );
        
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
        
        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }
    
        return $products_for_template;
    }
    private function postProcess() {
		if (Tools::isSubmit('submitpostabcateslider'))
		{
			$languages = Language::getLanguages(false);
			$values = array();
			$update_images_values = false;
        
		
		foreach ($languages as $lang){
			if (isset($_FILES['postabcateslider_img_'.$lang['id_lang']])
					&& isset($_FILES['postabcateslider_img_'.$lang['id_lang']]['tmp_name'])
					&& !empty($_FILES['postabcateslider_img_'.$lang['id_lang']]['tmp_name']))
				{
					if ($error = ImageManager::validateUpload($_FILES['postabcateslider_img_'.$lang['id_lang']], 4000000))
						return $error;
					else
					{
						$ext = substr($_FILES['postabcateslider_img_'.$lang['id_lang']]['name'], strrpos($_FILES['postabcateslider_img_'.$lang['id_lang']]['name'], '.') + 1);
						$file_name = md5($_FILES['postabcateslider_img_'.$lang['id_lang']]['name']).'.'.$ext;

						if (!move_uploaded_file($_FILES['postabcateslider_img_'.$lang['id_lang']]['tmp_name'], dirname(__FILE__).DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$file_name))
							return $this->displayError($this->l('An error occurred while attempting to upload the file.'));
						else
						{
							if (Configuration::hasContext('postabcateslider_img', $lang['id_lang'], Shop::getContext())
								&& Configuration::get('postabcateslider_img', $lang['id_lang']) != $file_name)
								@unlink(dirname(__FILE__).DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.Configuration::get('postabcateslider_img', $lang['id_lang']));

							$values['postabcateslider_img'][$lang['id_lang']] = $file_name;
							
						}
					}

					$update_images_values = true;
				}
				$values['postabcateslider_link'][$lang['id_lang']] = Tools::getValue('postabcateslider_link_'.$lang['id_lang']);
				$values['postabcateslider_title'][$lang['id_lang']] = Tools::getValue('postabcateslider_title_'.$lang['id_lang']);
				$values['postabcateslider_desc'][$lang['id_lang']] = Tools::getValue('postabcateslider_desc_'.$lang['id_lang']);
		}
		
		if ($update_images_values)
				Configuration::updateValue($this->name . '_img', $values['postabcateslider_img']);

				Configuration::updateValue($this->name . '_link', $values['postabcateslider_link']);
				Configuration::updateValue($this->name . '_title', $values['postabcateslider_title']);
				Configuration::updateValue($this->name . '_desc', $values['postabcateslider_desc']);
				
				Configuration::updateValue($this->name . '_list_cate', implode(',', Tools::getValue('postabcateslider_list_cate')));

				Configuration::updateValue($this->name . '_limit', Tools::getValue('postabcateslider_limit'));
				Configuration::updateValue($this->name . '_row', Tools::getValue('postabcateslider_row'));
				Configuration::updateValue($this->name . '_speed_slide', Tools::getValue('postabcateslider_speed_slide'));
				Configuration::updateValue($this->name . '_pause_time', Tools::getValue('postabcateslider_pause_time'));
				Configuration::updateValue($this->name . '_auto_play', Tools::getValue('postabcateslider_auto_play'));
				Configuration::updateValue($this->name . '_show_arrow', Tools::getValue('postabcateslider_show_arrow'));
				Configuration::updateValue($this->name . '_show_ctr', Tools::getValue('postabcateslider_show_ctr'));
				Configuration::updateValue($this->name . '_number_item', Tools::getValue('postabcateslider_number_item'));

				Configuration::updateValue($this->name . '_sort', Tools::getValue('postabcateslider_sort'));
				Configuration::updateValue($this->name . '_order', Tools::getValue('postabcateslider_order'));
				Configuration::updateValue($this->name . '_move', Tools::getValue('postabcateslider_move'));
				Configuration::updateValue($this->name . '_pausehover', Tools::getValue('postabcateslider_pausehover'));
				Configuration::updateValue($this->name . '_per_lg', Tools::getValue('postabcateslider_per_lg'));
				Configuration::updateValue($this->name . '_per_md', Tools::getValue('postabcateslider_per_md'));
				Configuration::updateValue($this->name . '_per_sm', Tools::getValue('postabcateslider_per_sm'));
				Configuration::updateValue($this->name . '_per_xs', Tools::getValue('postabcateslider_per_xs'));
				Configuration::updateValue($this->name . '_per_xxs', Tools::getValue('postabcateslider_per_xxs'));
		return $this->displayConfirmation($this->l('The settings have been updated.'));
		}
		
		return '';
    }
	
	public function getContent()
	{
		return $this->postProcess().$this->renderForm();
	}
	public function renderForm()
	{	
		$cateCurrent = Configuration::get($this->name . '_list_cate');
		$cateCurrent = explode(',', $cateCurrent);

        $id_lang = (int) Context::getContext()->language->id;
        $options =  $this->getCategoryOption(1, (int)$id_lang, (int)Shop::getContextShopID());
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
						'name' => 'postabcateslider_title',
						'desc' => $this->l('This title will be displayed on front-office.')
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Module desc'),
						'name' => 'postabcateslider_desc',
						'desc' => $this->l('This desc will be displayed on front-office.')
					),
					array(
	                    'type' => 'select',
	                    'label' => $this->l('Sort by:'),
	                    'name' => 'postabcateslider_sort',
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
	                    'name' => 'postabcateslider_order',
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
							'name' => 'postabcateslider_limit',
							'class' => 'fixed-width-sm',
							'desc' => $this->l('Set the number of products which you would like to see displayed in this module')
					),
					// array(
						// 'type' => 'file_lang',
						// 'label' => $this->l('Banner image'),
						// 'name' => 'postabcateslider_img',
						// 'desc' => $this->l('Upload an image for your banner. The recommended dimensions are 210 x 378px.'),
						// 'lang' => true,
					// ),
					// array(
						// 'type' => 'text',
						// 'lang' => true,
						// 'label' => $this->l('Banner Link'),
						// 'name' => 'postabcateslider_link',
						// 'desc' => $this->l('Enter the link associated to your banner. When clicking on the banner, the link opens in the same window.')
					// ),
					array(
						'type' => 'selectlist',
						'label' => 'Choose the categories:',
						'name' => 'postabcateslider_list_cate',
						'multiple'=>true,
						'size' => 500
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
						'name' => 'postabcateslider_row',
						'class' => 'fixed-width-sm',
						'desc' => $this->l('Number rows of module')
				),
				array(
						'type' => 'text',
						'label' => $this->l('Number of Items:'),
						'name' => 'postabcateslider_number_item',
						'class' => 'fixed-width-sm',
						'desc' => $this->l('Show number of product visible.')
				),
				array(
						'type' => 'text',
						'label' => $this->l('Slide speed:'),
						'name' => 'postabcateslider_speed_slide',
						'class' => 'fixed-width-sm',
						'desc' => $this->l('')
				),
				
				array(
					'type' => 'switch',
					'label' => $this->l('Auto play'),
					'name' => 'postabcateslider_auto_play',
					'class' => 'fixed-width-xs',
					'desc' => $this->l(''),
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
							),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
						'type' => 'text',
						'label' => $this->l('Time auto'),
						'name' => 'postabcateslider_pause_time',
						'class' => 'fixed-width-sm',
						'desc' => $this->l('This field only is value when auto play function is enable. Default is 3000ms.')
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Show Next/Back control:'),
					'name' => 'postabcateslider_show_arrow',
					'class' => 'fixed-width-xs',
					'desc' => $this->l(''),
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
							),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Show navigation control:'),
					'name' => 'postabcateslider_show_ctr',
					'class' => 'fixed-width-xs',
					'desc' => $this->l(''),
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
							),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Scroll number:'),
					'name' => 'postabcateslider_move',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'postabcateslider_move_on',
							'value' => 1,
							'label' => $this->l('1 item')),
						array(
							'id' => 'postabcateslider_move_off',
							'value' => 0,
							'label' => $this->l('All visible items')),
					),
                    'validation' => 'isBool',
				),
				 array(
					'type' => 'switch',
					'label' => $this->l('Pause On Hover:'),
					'name' => 'postabcateslider_pausehover',
                    'default_value' => 1,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'postabcateslider_pausehover_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'postabcateslider_pausehover_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				),
				'pos_tabcate_pro' => array(
                    'type' => 'html',
                    'id' => 'pos_tabcate_pro',
                    'label'=> $this->l('Responsive:'),
                    'name' => '',
                ),
			),
			'submit' => array(
				'title' => $this->l('Save'),
			)
		);	
		$fields_form[1]['form']['input']['pos_tabcate_pro']['name'] = $this->BuildDropListGroup($this->findCateProPer());
		
		$helper = new HelperForm();
		$helper->show_toolbar = true;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->module = $this;
		$helper->options = $options;
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitpostabcateslider';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$module = _PS_MODULE_DIR_ ;
		$helper->tpl_vars = array(
			'module' =>$module,
			'uri' => $this->getPathUri(),
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
			'options' => $options,
			'cateCurrent' => $cateCurrent,
		);

		return $helper->generateForm($fields_form);
	}
	
	public function getConfigFieldsValues()
	{
		$languages = Language::getLanguages(false);
		$fields = array();
		$fields['postabcateslider_number_item'] = Tools::getValue('postabcateslider_number_item', (int)Configuration::get($this->name . '_number_item'));
		$fields['postabcateslider_speed_slide'] = Tools::getValue('postabcateslider_speed_slide', (int)Configuration::get($this->name . '_speed_slide'));
		$fields['postabcateslider_pause_time'] = Tools::getValue('postabcateslider_pause_time', (int)Configuration::get($this->name . '_pause_time'));
		$fields['postabcateslider_auto_play'] = Tools::getValue('postabcateslider_auto_play', (int)Configuration::get($this->name . '_auto_play'));
		$fields['postabcateslider_show_arrow'] = Tools::getValue('postabcateslider_show_arrow', (int)Configuration::get($this->name . '_show_arrow'));
		$fields['postabcateslider_show_ctr'] = Tools::getValue('postabcateslider_show_ctr', (int)Configuration::get($this->name . '_show_ctr'));
		$fields['postabcateslider_limit'] = Tools::getValue('postabcateslider_limit', (int)Configuration::get($this->name . '_limit'));
		$fields['postabcateslider_row'] = Tools::getValue('postabcateslider_row', (int)Configuration::get($this->name . '_row'));
		$fields['postabcateslider_list_cate'] = Tools::getValue('postabcateslider_list_cate', Configuration::get($this->name . '_list_cate'));

		$fields['postabcateslider_move'] = Tools::getValue('postabcateslider_move', Configuration::get($this->name . '_move'));
		$fields['postabcateslider_pausehover'] = Tools::getValue('postabcateslider_pausehover', Configuration::get($this->name . '_pausehover'));
		$fields['postabcateslider_sort'] = Tools::getValue('postabcateslider_sort', Configuration::get($this->name . '_sort'));
		$fields['postabcateslider_order'] = Tools::getValue('postabcateslider_order', Configuration::get($this->name . '_order'));
		
		foreach ($languages as $lang)
		{	
			$fields['postabcateslider_title'][$lang['id_lang']] = Tools::getValue('postabcateslider_title_'.$lang['id_lang'], Configuration::get($this->name . '_title', $lang['id_lang']));
			$fields['postabcateslider_desc'][$lang['id_lang']] = Tools::getValue('postabcateslider_desc_'.$lang['id_lang'], Configuration::get($this->name . '_desc', $lang['id_lang']));
			$fields['postabcateslider_img'][$lang['id_lang']] = Tools::getValue('postabcateslider_img_'.$lang['id_lang'], Configuration::get($this->name . '_img', $lang['id_lang']));
			$fields['postabcateslider_link'][$lang['id_lang']] = Tools::getValue('postabcateslider_link_'.$lang['id_lang'], Configuration::get($this->name . '_link', $lang['id_lang']));
		}
		
		return $fields;
	}
	
	public function getCategoryOption($id_category = 1, $id_lang = false, $id_shop = false, $recursive = true) {
		$cateCurrent = Configuration::get($this->name . '_list_cate');
		$cateCurrent = explode(',', $cateCurrent);
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);
		if (is_null($category->id))
			return;
		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop); // array	
		}
		
		if (isset($children) && count($children)){
			 if($category->id != 1 && $category->id != 2){
				 $this->_html .='<li class="tree-folder">';
				 $this->_html .='<span class="tree-folder-name"><input type="checkbox" name="postabcateslider_list_cate[]" value="'.$category->id.'"/><i class="icon-folder-close" style="padding-right: 3px;"></i><label>'.$category->name.'</label></span>';
				 $this->_html .='<ul class="tree">';
			 }
			 foreach ($children as $child){
				$this->getCategoryOption((int)$child['id_category'], (int)$id_lang, (int)$child['id_shop']);
			 }
			 if($category->id != 1 && $category->id != 2){
				 $this->_html .='</ul>';
				 $this->_html .='</li>';
			 }
			
		 }else{
			 $this->_html .='<li class="tree-item">';
			 $this->_html .='<span class="tree-item-name"><input type="checkbox" name="postabcateslider_list_cate[]" value="'.$category->id.'"/><i class="tree-dot"></i><label>'.$category->name.'</label></span>';
			 $this->_html .='</li>';
		 }
		
		$shop = (object) Shop::getShop((int)$category->getShopID());
         return $this->_html ;
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
                'id' => 'postabcateslider_per_lg',
                'label' => $this->l('Desktops (<1200 pixels)'),
            ),
            array(
                'id' => 'postabcateslider_per_md',
                'label' => $this->l('Tablets (<992 pixels)'),
            ),
            array(
                'id' => 'postabcateslider_per_sm',
                'label' => $this->l('Large Phones (<768 pixels)'),
            ),
            array(
                'id' => 'postabcateslider_per_xs',
                'label' => $this->l('Medium Phones (<576 pixels)'),
            ),
            array(
                'id' => 'postabcateslider_per_xxs',
                'label' => $this->l('Small phones (<360 pixels)'),
            ),
        );
    }
}