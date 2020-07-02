<?php

class AdminPosStaticblocksController extends ModuleAdminController
{
    public $className = 'Staticblocks';
    private $name;
    private $repository;

    public function __construct()
    {
        $this->bootstrap = true;
        $this->display = 'view';

        parent::__construct();
        $this->meta_title = $this->trans('PosStaticblocks', array(), 'Modules.Linklist.Admin');

        if (!$this->module->active) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
        }

        $this->name = 'PosStaticblocks';

        $this->repository = new PosStaticblockRepository(
            Db::getInstance(),
            $this->context->shop,
            $this->context->getTranslator()
        );
    }

    public function init()
    {
        if (Tools::isSubmit('edit'.$this->className)) {
            $this->display = 'edit';
        } elseif (Tools::isSubmit('addStaticblock')) {
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
        } elseif (Tools::isSubmit('changeStatus')){
            $this->changeStatus(Tools::getValue('id_pos_staticblock'));
            Tools::redirectAdmin($this->context->link->getAdminLink('Admin'.$this->name));
        }

        return parent::postProcess();
    }

    public function changeStatus($id){
        $status =  DB::getInstance()->getRow('SELECT sb.active FROM `' . _DB_PREFIX_ . 'pos_staticblock` sb WHERE sb.`id_pos_staticblock` = '.$id.'');

        if($status['active'] == 1){
            $query = 'UPDATE `' . _DB_PREFIX_ . 'pos_staticblock` SET `active` = 0 WHERE `id_pos_staticblock` = '.$id;
        }else{
            $query = 'UPDATE `' . _DB_PREFIX_ . 'pos_staticblock` SET `active` = 1  WHERE `id_pos_staticblock` = '.$id;
        }

        return DB::getInstance()->execute($query);
    }

    public function renderView()
    {
        $title = $this->trans('Pos Staticblocks configuration', array(), 'Modules.Linklist.Admin');

        $this->fields_form[]['form'] = array(
            'legend' => array(
                'title' => $title,
                'icon' => 'icon-list-alt'
            ),
            'input' => array(
                array(
                    'type' => 'link_blocks',
                    'label' => $this->trans('Link Blocks', array(), 'Modules.Linklist.Admin'),
                    'name' => 'link_blocks',
                    'values' => $this->repository->getCMSBlocksSortedByHook(),
                ),
            ),
            'buttons' => array(
                'newBlock' => array(
                    'title' => $this->trans('New block', array(), 'Modules.Linklist.Admin'),
                    'href' => $this->context->link->getAdminLink('Admin'.$this->name).'&amp;addStaticblock',
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
            'base_url' => AdminController::$currentIndex,
            'token'    => Tools::getAdminTokenLite('Admin'.$this->name),
            'configure_name' => $this->name,
        );

        return $helper->generateForm($this->fields_form);
    }

    public function renderForm()
    {
        $block = new Staticblocks((int)Tools::getValue('id_pos_staticblock'));
        
        $this->fields_form[0]['form'] = array(
            'tinymce' => true,
            'legend' => array(
                'title' => isset($block) ? $this->trans('Edit the staticblock.', array(), 'Modules.Linklist.Admin') : $this->trans('New link block', array(), 'Modules.Linklist.Admin'),
                'icon' => isset($block) ? 'icon-edit' : 'icon-plus-square'
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'id_pos_staticblock',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->trans('Name of the block', array(), 'Modules.Linklist.Admin'),
                    'name' => 'name',
                    'required' => true,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->trans('Hook', array(), 'Admin.Global'),
                    'name' => 'id_hook',
                    'options' => array(
                        'query' => $this->repository->getDisplayHooksForHelper(),
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->trans('Content', array(), 'Modules.Linklist.Admin'),
                    'lang' => true,
                    'name' => 'content',
                    'cols' => 40,
                    'rows' => 10,
                    'class' => 'rte',
                    'autoload_rte' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->trans('Active', array(), 'Modules.Linklist.Admin'),
                    'name' => 'active',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->trans('Yes', array(), 'Modules.Linklist.Admin')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->trans('No', array(), 'Modules.Linklist.Admin')
                        )
                    ),
                ),
            ),
            'buttons' => array(
                'cancelBlock' => array(
                    'title' => $this->trans('Cancel', array(), 'Admin.Actions'),
                    'href' => (Tools::safeOutput(Tools::getValue('back', false)))
                                ?: $this->context->link->getAdminLink('Admin'.$this->name),
                    'icon' => 'process-icon-cancel'
                )
            ),
            'submit' => array(
                'name' => 'submit'.$this->className,
                'title' => $this->trans('Save', array(), 'Admin.Actions'),
            )
        );

        if ($id_hook = Tools::getValue('id_hook')) {
            $block->id_hook = (int)$id_hook;
        }

        if (Tools::getValue('name')) {
            $block->name = Tools::getValue('name');
        }

        $helper = $this->buildHelper();
        if (isset($id_pos_staticblock)) {
            $helper->currentIndex = AdminController::$currentIndex.'&id_pos_staticblock='.$id_pos_staticblock;
            $helper->submit_action = 'edit'.$this->className;
        } else {
            $helper->submit_action = 'addStaticblock';
        }

        $helper->fields_value = (array)$block;

        return $helper->generateForm($this->fields_form);
    }

    protected function buildHelper()
    {
        $helper = new HelperForm();

        $helper->module = $this->module;
        $helper->override_folder = 'linkwidget/';
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

    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->trans('Themes', array(), 'Modules.Linklist.Admin');
        $this->toolbar_title[] = $this->trans('Pos Staticblocks', array(), 'Modules.Linklist.Admin');
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

        $this->addJqueryPlugin('tablednd');
        $this->addJS(_PS_JS_DIR_.'admin/dnd.js');
    }

    private function updatePositions()
    {
	
		for($i=0; $i<=50; $i++)  {
			 $linkBlocks = Tools::getValue('link_block_'.$i);
			 if(is_array($linkBlocks)) break; 
		}
		if(!is_array($linkBlocks)) return false; 
			
        $query = 'UPDATE `' . _DB_PREFIX_ . 'pos_staticblock` SET `position` = CASE `id_pos_staticblock` ';

        foreach ($linkBlocks as $position => $linkBlock) {
            preg_match('/tr_\d+_(\d+)_\d+/', $linkBlock, $matches);
            if (isset($matches[1])) {
                $query .= 'WHEN ' . $matches[1] . ' THEN ' . $position . ' ';
            }
        }

        $query .= 'ELSE `position` END';
        return DB::getInstance()->execute($query);
    }

    private function manageLinkList()
    {
        $success = true;

        $id_pos_staticblock = (int) Tools::getValue('id_pos_staticblock');
        $id_hook = (int) Tools::getValue('id_hook');

        if (!empty($id_hook)) {
            return $this->repository->createOrUpdateStaticblock(
                $id_pos_staticblock,
                $id_hook
            );
        }

        return $success;
    }

    private function deleteLinkList()
    {
        $success = true;

        $id_pos_staticblock = (int) Tools::getValue('id_pos_staticblock');

        if (!empty($id_pos_staticblock)) {
            $success &= Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'pos_staticblock` WHERE `id_pos_staticblock` = '.$id_pos_staticblock);

            if ($success) {
                $success &= Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'pos_staticblock_lang` WHERE `id_pos_staticblock` = '.$id_pos_staticblock);
            }
        }

        return $success;
    }
}
