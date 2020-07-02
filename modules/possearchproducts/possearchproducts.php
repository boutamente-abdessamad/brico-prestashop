<?php
if (!defined('_PS_VERSION_'))
	exit;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class Possearchproducts extends Module implements WidgetInterface
{
	private $templateFile;

	public static $level = array(
        1 => array('id' =>1 , 'name' => '2'),
        2 => array('id' =>2 , 'name' => '3'),
        3 => array('id' =>3 , 'name' => '4'),
        4 => array('id' =>4 , 'name' => '5'),

    );
	public function __construct()
	{
		$this->name = 'possearchproducts';
		$this->tab = 'Search and filter';
		$this->version = 1.7;
		$this->author = 'Posthemes';
		$this->need_instance = 0;
		$this->bootstrap =true ;
		$this->need_instance = 0;
        $this->ps_versions_compliancy = ['min' => '1.7','max' => _PS_VERSION_];
		parent::__construct();
		$this->displayName = $this->l('Pos search products by category ');
		$this->description = $this->l('Adds a quick search field categories to your website.');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		$this->templateFile = 'module:possearchproducts/views/templates/front/possearch.tpl';
	}
	public function install()
	{ 	
		Configuration::updateValue('POSSEARCH_CATE', 1);
        Configuration::updateValue('POSSEARCH_LEVEL', 3);
        Configuration::updateValue('POSSEARCH_IMAGE', 1);
		Configuration::updateValue('POSSEARCH_NUMBER', 10);

        return parent :: install()
			&& $this->registerHook('header')
			&& $this->registerHook('displaySearchTop');
	}

	public function uninstall(){
		Configuration::deleteByName('POSSEARCH_CATE');
		Configuration::deleteByName('POSSEARCH_LEVEL');
		Configuration::deleteByName('POSSEARCH_IMAGE');
		Configuration::deleteByName('POSSEARCH_NUMBER');
		return parent::uninstall();
	}

	public function getContent(){
		$this->html = '';
		if(Tools::isSubmit('submitUpdate')){
			Configuration::UpdateValue('POSSEARCH_CATE',Tools::getValue('POSSEARCH_CATE'));
			Configuration::UpdateValue('POSSEARCH_LEVEL',Tools::getValue('POSSEARCH_LEVEL'));
			Configuration::UpdateValue('POSSEARCH_IMAGE',Tools::getValue('POSSEARCH_IMAGE'));
			Configuration::UpdateValue('POSSEARCH_NUMBER',Tools::getValue('POSSEARCH_NUMBER'));
			$this->html = $this->displayConfirmation($this->l('Settings updated successfully.'));
		}
		$this->html .= $this->renderForm();
		return $this->html;

	}

	public function renderForm(){
	
			$fields_form = array(
				'form' => array(
					'legend' => array(
						'title' => $this->l('Settings'),
						'icon' => 'icon-cogs'
					),
					'input' => array(
						array(
							'type'      => 'switch',
							'label'     => $this->l('Enable list categories'),
							'desc'      => $this->l('Would you like show  categories ?'),
							'name'      => 'POSSEARCH_CATE',
							'values'    => array(
								array(
									'id'    => 'active_on',
									'value' => 1,
									'label' => $this->l('Enabled')
								),
								array(
									'id'    => 'active_off',
									'value' => 0,
									'label' => $this->l('Disabled')
								)
							),
						),
						array(
		                    'type' => 'select',
		                    'label' => $this->l('Category depth level'),
		                    'name' => 'POSSEARCH_LEVEL',
		                    'options' => array(
		                        'query' => self::$level,
		                        'id' => 'id',
		                        'name' => 'name',
		                    ),
		                    'validation' => 'isUnsignedInt',
		                ), 
		                array(
							'type'      => 'switch',
							'label'     => $this->l('Show product image in results'),
							'name'      => 'POSSEARCH_IMAGE',
							'values'    => array(
								array(
									'id'    => 'active_on',
									'value' => 1,
									'label' => $this->l('Enabled')
								),
								array(
									'id'    => 'active_off',
									'value' => 0,
									'label' => $this->l('Disabled')
								)
							),
						),
						array(
							'type' => 'text',
							'label' => $this->l('Number products in ajax result'),
							'name' => 'POSSEARCH_NUMBER',
							'class' => 'fixed-width-sm',
							'desc' => $this->l('')
						),
					),
					'submit' => array(
						'title' => $this->l('Save'),
					),
				),
			);
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitUpdate';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper->generateForm(array($fields_form));
	}

	public function getConfigFieldsValues()
	{
		return array(
			'POSSEARCH_CATE' => Tools::getValue('POSSEARCH_CATE', Configuration::get('POSSEARCH_CATE')),
			'POSSEARCH_LEVEL' => Tools::getValue('POSSEARCH_LEVEL', Configuration::get('POSSEARCH_LEVEL')),
			'POSSEARCH_IMAGE' => Tools::getValue('POSSEARCH_IMAGE', Configuration::get('POSSEARCH_IMAGE')),
			'POSSEARCH_NUMBER' => Tools::getValue('POSSEARCH_NUMBER', Configuration::get('POSSEARCH_NUMBER')),
		);
	}
	public function hookHeader($params)
	{	
		$this->context->controller->addJqueryUI('ui.autocomplete');
		$this->context->controller->registerJavascript('modules-possearchproducts', 'modules/'.$this->name.'/views/js/possearch.js', ['position' => 'bottom', 'priority' => 150]);
		$this->context->controller->registerStylesheet('modules-possearchproducts', 'modules/'.$this->name.'/views/css/possearch.css', ['media' => 'all', 'priority' => 100]);

		Media::addJsDef(
            array(
                'id_lang' => (int)$this->context->language->id ,
                'possearch_image' => (int)Configuration::get('POSSEARCH_IMAGE'),
                'possearch_number' => (int)Configuration::get('POSSEARCH_NUMBER'),
             )
    	);
	}

	public function getWidgetVariables($hookName, array $configuration = [])
    {	
        $category = new Category((int)Configuration::get('PS_HOME_CATEGORY'), $this->context->language->id);
        $cate_on = (int)Configuration::get('POSSEARCH_CATE');
        
        $widgetVariables = array(
        	'cate_on' =>$cate_on,
        	'search_query' => (string)Tools::getValue('search_query'),
        	'categories_option' => $this->getCategories($category),
        	'url_search' => __PS_BASE_URI__ . 'modules/possearchproducts/SearchProducts.php',
            'search_controller_url' =>$this->context->link->getPageLink('search', null, null, null, false, null, true),
        );
        if (!array_key_exists('search_string', $this->context->smarty->getTemplateVars())) {
            $widgetVariables['search_string'] = '';
        }
        return $widgetVariables;
    }

    public function renderWidget($hookName, array $configuration = [])
    { 
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->fetch($this->templateFile);
    }

	private function getCategories($category)
    {
        $range = '';
        $maxdepth = (int)Configuration::get('POSSEARCH_LEVEL');
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
			AND c.id_category IN (
				SELECT id_category
				FROM `'._DB_PREFIX_.'category_group`
				WHERE `id_group` IN ('.pSQL(implode(', ', Customer::getGroupsStatic((int)$this->context->customer->id))).')
			)
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
        } else {
            $link = $name = '';
        }

        return [
            'id' => $id_category,
            'link' => $link,
            'name' => $name,
            'children' => $children,
            'currentDepth' => $currentDepth - 1
        ];
    }

	public  function addJsDef($js_def)
	{
		if (is_array($js_def))
			foreach ($js_def as $key => $js)
				Possearchproducts::$js_def[$key] = $js;
		elseif ($js_def)
			Possearchproducts::$js_def[] = $js_def;
	}
}

