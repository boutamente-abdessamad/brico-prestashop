<?php

include_once dirname(__FILE__).'/../../classes/PosMegamenuSubmenuItemClass.php';
class AdminPosmegamenuController extends ModuleAdminController {
    public function __construct() {
		$this->bootstrap = true;
        $this->display = 'view';
        parent::__construct();
        $this->meta_title = $this->l('Pos Megamenu');
        if (!$this->module->active) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
        }
    }
    public function ajaxProcessSave()
    {
        $data = Tools::getValue('data');
        $id_column = Tools::getValue('id_column');
        $id = Tools::getValue('id');
        //echo $id; die;
        $title = array();
        $errors = array();
        if ($id) {
            $model = new PosMegamenuSubmenuItemClass($id);
        } else {
            $model = new PosMegamenuSubmenuItemClass();
            $model->position = PosMegamenuSubmenuItemClass::getLastPosition() + 1;
            $model->active = 1;
        }
        
        foreach ($data as $param) {
            if ($param['name'] == 'type_link') {
                $model->type_link = pSQL($param['value']);
            }
            if ($param['name'] == 'category_tree') {
                $model->category_tree = pSQL($param['value']);
            }
            if ($param['name'] == 'ps_link') {
                $model->ps_link = pSQL($param['value']);
            }
            if ($param['name'] == 'type_item') {
                $model->type_item = pSQL($param['value']);
            }
            if ($param['name'] == 'id_product') {
                $model->id_product = pSQL($param['value']);
            }
            if ($param['name'] == 'id_manufacturer') {
                $model->id_manufacturer = pSQL($param['value']);
            }
            if ($param['name'] == 'active_mobile') {
                $model->active_mobile = pSQL($param['value']);
            }
            $languages = Language::getLanguages(false);
            foreach ($languages as $language)
            {   
                if ($param['name'] == 'customlink_title_'.$language['id_lang']) {
                    $model->customlink_title[$language['id_lang']] = pSQL($param['value']);
                }
                if ($param['name'] == 'customlink_link_'.$language['id_lang']) {
                    $model->customlink_link[$language['id_lang']] = pSQL($param['value']);
                }
                if ($param['name'] == 'htmlcontent_'.$language['id_lang']) {
                    $model->htmlcontent[$language['id_lang']] = $param['value'];
                }
                if ($param['name'] == 'image_'.$language['id_lang']) {
                    $model->image[$language['id_lang']] = pSQL($param['value']);
                }
                if ($param['name'] == 'image_link_'.$language['id_lang']) {
                    $model->image_link[$language['id_lang']] = pSQL($param['value']);
                }
            }
            
        }
        $model->id_posmegamenu_submenu_column = $id_column;
        if ($errors) {
            die(Tools::jsonEncode(array(
                'success' => 0,
                'errors' => $errors
            )));
        }
        if ($id) {
            $model->save();
        }else{
            $model->add();
        }
        $this->module->clearCache();
        die(Tools::jsonEncode(array(
            'success' => 1,
            'errors' => $errors,
            'model' => $model
        )));
    }
    public function ajaxProcessSwitch()
    {
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuItemClass($id);
        $model->active = !$model->active;
        $model->save();
        $this->module->clearCache();
        die(Tools::jsonEncode(array(
            'active' => (int)$model->active
        )));
    }
    public function ajaxProcessEdit()
    {
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuItemClass($id);
        if($model->id_product > 0) {

            $model->product_name = $this->getProductnameById($model->id_product).' - ID: '.$model->id_product; 
        }else{
            $model->product_name = '';
        }
        die(Tools::jsonEncode($model));
    }
    public function getProductnameById($id_prod)
    {
        $id_lang = (int)$this->context->language->id;   
        $name = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
        SELECT pl.name
        FROM '._DB_PREFIX_.'product_lang pl
        WHERE pl.id_product ='.$id_prod.'
        AND pl.id_lang = '.$id_lang.'');
        return $name['name'];
    }
    public function ajaxProcessDelete(){
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuItemClass($id);
        die(Tools::jsonEncode(array(
            'success' => $model->delete()
        )));
    }
    public function ajaxProcessReload()
    {
        die(Tools::jsonEncode(array(
            'content' => $this->module->renderSubmenu()
        )));
    }
    public function ajaxProcessEditColumn()
    {
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuColumnClass($id);
        die(Tools::jsonEncode($model));
    }
    public function ajaxProcessSaveColumn(){
        $data = Tools::getValue('data');
        $id_row = Tools::getValue('id_row');
        $id = Tools::getValue('id');
        
        $errors = array();
        if ($id) {
            $model = new PosMegamenuSubmenuColumnClass($id);
        } else {
            $model = new PosMegamenuSubmenuColumnClass();
            $model->position = PosMegamenuSubmenuColumnClass::getLastPosition() + 1;
            $model->active = 1;
        }
        
        foreach ($data as $param) {
            if ($param['name'] == 'column_width') {
                $model->width = pSQL($param['value']);
            }
            if ($param['name'] == 'column_class') {
                $model->class = pSQL($param['value']);
            }
            if ($param['name'] == 'column_type_link') {
                $model->type_link = pSQL($param['value']);
            }
            if ($param['name'] == 'column_link') {
                $model->link = pSQL($param['value']);
            }
            if ($param['name'] == 'active_mobile') {
                $model->active_mobile = pSQL($param['value']);
            }
            $languages = Language::getLanguages(false);
            foreach ($languages as $language)
            {   
                if ($param['name'] == 'column_title_'.$language['id_lang']) {
                    $model->title[$language['id_lang']] = pSQL($param['value']);
                }
                if ($param['name'] == 'column_custom_link_'.$language['id_lang']) {
                    $model->custom_link[$language['id_lang']] = pSQL($param['value']);
                }
            }
 
        }
        $model->id_row = $id_row;
        if ($errors) {
            die(Tools::jsonEncode(array(
                'success' => 0,
                'errors' => $errors
            )));
        }
        if ($id) {
            $model->save();
        }else{
            $model->add();
        }
        $this->module->clearCache();
        die(Tools::jsonEncode(array(
            'success' => 1,
            'errors' => $errors,
            'model' => $model
        )));
    }
    public function ajaxProcessDeleteColumn(){
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuColumnClass($id);
        die(Tools::jsonEncode(array(
            'success' => $model->delete()
        )));
    }
    // Row functions
    public function ajaxProcessEditRow()
    {
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuRowClass($id);
        die(Tools::jsonEncode($model));
    }
    public function ajaxProcessSaveRow(){
        $data = Tools::getValue('data');
        $id_posmegamenu_item = Tools::getValue('id_posmegamenu_item');
        $id = Tools::getValue('id');
        
        $errors = array();
        if ($id) {
            $model = new PosMegamenuSubmenuRowClass($id);
        } else {
            $model = new PosMegamenuSubmenuRowClass();
            $model->position = PosMegamenuSubmenuRowClass::getLastPosition() + 1;
            $model->active = 1;
        }
        
        foreach ($data as $param) {
            if ($param['name'] == 'column_class') {
                $model->class = pSQL($param['value']);
            }
 
        }
        $model->id_posmegamenu_item = $id_posmegamenu_item;
        if ($errors) {
            die(Tools::jsonEncode(array(
                'success' => 0,
                'errors' => $errors
            )));
        }
        if ($id) {
            $model->save();
        }else{
            $model->add();
        }
        $this->module->clearCache();
        die(Tools::jsonEncode(array(
            'success' => 1,
            'errors' => $errors,
            'model' => $model
        )));
    }
    public function ajaxProcessSwitchRow()
    {
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuRowClass($id);
        $model->active = !$model->active;
        $model->save();
        $this->module->clearCache();
        die(Tools::jsonEncode(array(
            'success' => 1,
        )));
    }
    public function ajaxProcessDeleteRow(){
        $id = Tools::getValue('id');
        $model = new PosMegamenuSubmenuRowClass($id);
        die(Tools::jsonEncode(array(
            'success' => $model->delete()
        )));
    }
}
