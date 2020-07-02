<?php

class AdminStaticFooterController extends ModuleAdminController
{
    public $className = 'FooterBlock';
    private $name;
    private $repository;
    private $secure_key;

    public static $width = array(
        1 => array('id' =>1 , 'name' => '1/12'),
        2 => array('id' =>2 , 'name' => '2/12'),
        3 => array('id' =>3 , 'name' => '3/12'),
        4 => array('id' =>4 , 'name' => '4/12'),
        5 => array('id' =>5 , 'name' => '5/12'),
        6 => array('id' =>6 , 'name' => '6/12'),
        7 => array('id' =>7 , 'name' => '7/12'),
        8 => array('id' =>8 , 'name' => '8/12'),
        9 => array('id' =>9 , 'name' => '9/12'),
        10 => array('id' =>10 , 'name' => '10/12'),
        11 => array('id' =>11 , 'name' => '11/12'),
        12 => array('id' =>12 , 'name' => '12/12'),
    );
    
    public static $type_content = array(
        0 => array('id' =>0 , 'name' => 'List links'),
        1 => array('id' =>1 , 'name' => 'Custom content'),
    );

    public function __construct()
    {
        $this->bootstrap = true;
        $this->display = 'view';

        parent::__construct();
        $this->meta_title = $this->l('Pos Static Footer');

        if (!$this->module->active) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
        }

        $this->name = 'StaticFooter';
        $this->secure_key = Tools::encrypt(get_class($this));

        $this->repository = new FooterBlockRepository(
            Db::getInstance(),
            $this->context->shop,
            $this->context->getTranslator()
        );

    }

    public function init()
    {
        if (Tools::isSubmit('edit'.$this->className)) {
            $this->display = 'edit';
        } elseif (Tools::isSubmit('addFooterBlock')) {
            $this->display = 'add';
        }

        parent::init();
    }

    public function postProcess()
    {
        if (Tools::isSubmit('action')) {
            switch (Tools::getValue('action')) {
                case 'updatePositions':
                    $this->updatePositions();
                    break;
            }
        } elseif (Tools::isSubmit('submit'.$this->className)) {
            if (!$this->manageLinkList()) {
                return false;
            }

            $hook_name = Hook::getNameById(Tools::getValue('id_hook'));
            if (!Hook::isModuleRegisteredOnHook($this->module, $hook_name, $this->context->shop->id)) {
                Hook::registerHook($this->module, $hook_name);
            }

            $this->module->_clearCache($this->module->templateFile);

            Tools::redirectAdmin($this->context->link->getAdminLink('Admin'.$this->name));
        } elseif (Tools::isSubmit('delete'.$this->className)) {
            if (!$this->deleteLinkList()) {
                return false;
            }

            $this->module->_clearCache($this->module->templateFile);

            Tools::redirectAdmin($this->context->link->getAdminLink('Admin'.$this->name));
        }

        return parent::postProcess();
    }

    public function renderView()
    {
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/jquery.ui.sortable.min.js');
        $title = $this->l('Footer configuration');

        $this->fields_form[]['form'] = array(
            'legend' => array(
                'title' => $title,
                'icon' => 'icon-list-alt'
            ),
            'input' => array(
                array(
                    'type' => 'link_blocks',
                    'label' => $this->l('Link Blocks'),
                    'name' => 'link_blocks',
                    'values' => $this->repository->getCMSBlocksSortedByHook(),
                ),
            ),
            'buttons' => array(
                'newBlock' => array(
                    'title' => $this->l('New block'),
                    'href' => $this->context->link->getAdminLink('Admin'.$this->name).'&amp;addFooterBlock',
                    'class' => 'pull-right',
                    'icon' => 'process-icon-new'
                ),
            ),
        );

        $this->getLanguages();


        $helper = $this->buildHelper();
        $helper->submit_action = '';
        $helper->title = $title;

        $helper->fields_value = $this->fields_value;
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL().$this->admin_webpath,
            'secure_key' => $this->secure_key,
        );

        return $helper->generateForm($this->fields_form);
    }

    public function renderForm()
    {
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/back.js');

        $block = new FooterBlock((int)Tools::getValue('id_posstaticfooter'));
        $this->fields_form[0]['form'] = array(
            'tinymce' => true,
            'legend' => array(
                'title' => isset($block) ? $this->l('Edit the link block.') : $this->l('New link block'),
                'icon' => isset($block) ? 'icon-edit' : 'icon-plus-square'
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'id_posstaticfooter',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Name of the block'),
                    'name' => 'name',
                    'lang' => true,
                    'required' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show title'),
                    'name' => 'active_title',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('No')
                        )
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' =>  $this->l('Width of this block'),
                    'name' => 'width',
                    'options' => array(
                        'query' => self::$width,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'select',
                    'label' => $this->l('Hook'),
                    'name' => 'id_hook',
                    'class' => 'fixed-width-xl',
                    'options' => array(
                        'query' => $this->repository->getDisplayHooksForHelper(),
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'select',
                    'label' =>  $this->l('Select type content'),
                    'name' => 'type_content',
                    'options' => array(
                        'query' => self::$type_content,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'cms_pages',
                    'label' => $this->l('Content pages'),
                    'name' => 'cms[]',
                    'values' => $this->repository->getCmsPages(),
                    'desc' => $this->l('Please mark every page that you want to display in this block.'),
                    'preffix_wrapper' => 'list_links',
                ),
                array(
                    'type' => 'product_pages',
                    'label' => $this->l('Product pages'),
                    'name' => 'product[]',
                    'values' => $this->repository->getProductPages(),
                    'desc' => $this->l('Please mark every page that you want to display in this block.'),
                    'preffix_wrapper' => 'list_links',
                ),
                array(
                    'type' => 'static_pages',
                    'label' => $this->l('Static content'),
                    'name' => 'static[]',
                    'values' => $this->repository->getStaticPages(),
                    'desc' => $this->l('Please mark every page that you want to display in this block.'),
                    'preffix_wrapper' => 'list_links',
                ),
                array(
                    'type' => 'custom_pages',
                    'label' => $this->l('Custom content'),
                    'name' => 'custom[]',
                    'values' => $this->repository->getCustomPages($block),
                    'desc' => $this->l('Please add every page that you want to display in this block.'),
                    'preffix_wrapper' => 'list_links',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('HTML content'),
                    'lang' => true,
                    'name' => 'html_content',
                    'cols' => 40,
                    'rows' => 10,
                    'class' => 'rte',
                    'autoload_rte' => true,
                    'preffix_wrapper' => 'custom_content',
                ),
                array(
                    'type' => 'select',
                    'label' =>  $this->l('Select a module'),
                    'name' => 'name_module',
                    'options' => array(
                        'query' => $this->getListModuleInstalled(),
                        'id' => 'name',
                        'name' => 'name',
                    ),
                    'preffix_wrapper' => 'custom_content',
                    'desc' => $this->l('If HTML content is used , the module content will show under HTML content.'),
                ), 
            ),
            'buttons' => array(
                'cancelBlock' => array(
                    'title' => $this->l('Cancel'),
                    'href' => (Tools::safeOutput(Tools::getValue('back', false)))
                                ?: $this->context->link->getAdminLink('Admin'.$this->name),
                    'icon' => 'process-icon-cancel'
                )
            ),
            'submit' => array(
                'name' => 'submit'.$this->className,
                'title' => $this->l('Save'),
            )
        );

        if ($id_hook = Tools::getValue('id_hook')) {
            $block->id_hook = (int)$id_hook;
        }

        if (Tools::getValue('name')) {
            $block->name = Tools::getValue('name');
        }

        $helper = $this->buildHelper();
        if (isset($id_posstaticfooter)) {
            $helper->currentIndex = AdminController::$currentIndex.'&id_posstaticfooter='.$id_posstaticfooter;
            $helper->submit_action = 'edit'.$this->className;
        } else {
            $helper->submit_action = 'addFooterBlock';
        }

        $helper->fields_value = (array)$block;

        return $helper->generateForm($this->fields_form);
    }

    protected function buildHelper()
    {
        $helper = new HelperForm();

        $helper->module = $this->module;
        $helper->override_folder = 'posstaticfooter/';
        $helper->identifier = $this->className;
        $helper->token = Tools::getAdminTokenLite('Admin'.$this->name);
        $helper->languages = $this->_languages;
        $helper->currentIndex = $this->context->link->getAdminLink('Admin'.$this->name);
        $helper->default_form_language = $this->default_form_language;
        $helper->allow_employee_form_lang = $this->allow_employee_form_lang;
        $helper->toolbar_scroll = true;
        $helper->toolbar_btn = $this->initToolbar();

        return $helper;
    }

    public function getListModuleInstalled() {
        $modules = $this->repository->getModulesInstalled(0);
        $arrayModule = array();
        foreach($modules as $key => $module) {
            if($module['active']==1) {
                $arrayModule[0] = array('id_module'=>'---', 'name'=>'Chose Module');
                $arrayModule[$key] = $module;
            }
        }
        if ($arrayModule)
            return $arrayModule;
        return array();
    }

    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->l('Themes');
        $this->toolbar_title[] = $this->l('Pos Static Footer');
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

        $this->addJqueryPlugin('tablednd');
        $this->addJS(_PS_JS_DIR_.'admin/dnd.js');
    }

    private function updatePositions()
    {
        $footerblocks = Tools::getValue('footerblock');
        foreach ($footerblocks as $position => $id_footerblock)
            Db::getInstance()->execute('
                UPDATE `'._DB_PREFIX_.'posstaticfooter` SET `position` = '.(int)$position.'
                WHERE `id_posstaticfooter` = '.(int)$id_footerblock
            );
    }

    private function manageLinkList()
    {
        $success = true;

        $id_posstaticfooter = (int) Tools::getValue('id_posstaticfooter');
        $id_hook = (int) Tools::getValue('id_hook');
        $width = (int) Tools::getValue('width');
        $type_content = (int) Tools::getValue('type_content');
        $name_module = Tools::getValue('name_module');

        if (!empty($id_hook)) {
            $content = '';

            $cms = Tools::getValue('cms');
            $content .= '{"cms":[' . (empty($cms) ? 'false': '"' . implode('","', array_map('intval', $cms)) . '"') . '],';

            $product = Tools::getValue('product');
            $content .= '"product":[' . (empty($product) ? 'false': '"' . implode('","', array_map('bqSQL', $product)) . '"') . '],';

            $static = Tools::getValue('static');
            $content .= '"static":[' . (empty($static) ? 'false': '"' . implode('","', array_map('bqSQL', $static)) . '"') . ']}';

            $customs = Tools::getValue('custom');
            foreach ($customs as &$custom) {
                $custom = json_encode(array_filter($custom, function ($el) {
                    if (empty($el['title']) || empty($el['url'])) {
                        return false;
                    }
                    return true;
                }));
            }

            return $this->repository->createOrUpdateLinkList(
                $id_posstaticfooter,
                $id_hook,
                $width,
                $type_content,
                $name_module,
                $content,
                $customs
            );
        }

        return $success;
    }

    private function deleteLinkList()
    {
        $success = true;

        $id_posstaticfooter = (int) Tools::getValue('id_posstaticfooter');

        if (!empty($id_posstaticfooter)) {
            $success &= Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'posstaticfooter` WHERE `id_posstaticfooter` = '.$id_posstaticfooter);

            if ($success) {
                $success &= Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'posstaticfooter_lang` WHERE `id_posstaticfooter` = '.$id_posstaticfooter);
            }
        }

        return $success;
    }
}
