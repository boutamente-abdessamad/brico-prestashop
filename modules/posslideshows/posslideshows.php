<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

include_once(_PS_MODULE_DIR_.'posslideshows/Slideshow.php');

class Posslideshows extends Module implements WidgetInterface
{
    protected $_html = '';
    protected $default_speed = 600;
    protected $default_time = 6000;
    protected $default_pause_on_hover = 1;
    protected $default_nav = 0;
    protected $default_pag = 1;
    protected $default_caption = 1;
 
    public function __construct()
    {
        $this->name = 'posslideshows';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Posthemes';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Pos Slideshow Slider');
        $this->description = $this->l('Adds an image slider to your site.');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->repository = new Slideshow();
    }

    /**
     * @see Module::install()
     */
    public function install()
    {
		
	     // Install Tabs
		$tab = new Tab();		
		// Need a foreach for the language
		foreach (Language::getLanguages() as $language)
			$tab->name[$language['id_lang']] =  $this->l('Manage Pos Slideshow');
		$tab->class_name = 'AdminPosslideshows';
		$tab->id_parent = -1;
		$tab->module = $this->name;
		$tab->add();
		
        /* Adds Module */
        if (parent::install() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayTopColumn') &&
            $this->registerHook('actionShopDataDuplication')
        ) {
            $shops = Shop::getContextListShopID();
            $shop_groups_list = array();

            /* Setup each shop */
            foreach ($shops as $shop_id) {
                $shop_group_id = (int)Shop::getGroupFromShop($shop_id, true);

                if (!in_array($shop_group_id, $shop_groups_list)) {
                    $shop_groups_list[] = $shop_group_id;
                }

                /* Sets up configuration */
                $res = Configuration::updateValue('POSSLIDESHOW_SPEED', $this->default_speed, false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_TIME', $this->default_time, false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_PAUSE_ON_HOVER', $this->default_pause_on_hover, false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_NAV', $this->default_nav, false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_PAG', $this->default_pag, false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_CAPTION', $this->default_caption, false, $shop_group_id, $shop_id);
            }

            /* Sets up Shop Group configuration */
            if (count($shop_groups_list)) {
                foreach ($shop_groups_list as $shop_group_id) {
                    $res &= Configuration::updateValue('POSSLIDESHOW_SPEED', $this->default_speed, false, $shop_group_id);
                    $res &= Configuration::updateValue('POSSLIDESHOW_TIME', $this->default_time, false, $shop_group_id);
                    $res &= Configuration::updateValue('POSSLIDESHOW_PAUSE_ON_HOVER', $this->default_pause_on_hover, false, $shop_group_id);
                    $res &= Configuration::updateValue('POSSLIDESHOW_NAV', $this->default_nav, false, $shop_group_id);
                    $res &= Configuration::updateValue('POSSLIDESHOW_PAG', $this->default_pag, false, $shop_group_id);
                    $res &= Configuration::updateValue('POSSLIDESHOW_CAPTION', $this->default_caption, false, $shop_group_id);
                }
            }

            /* Sets up Global configuration */
            $res &= Configuration::updateValue('POSSLIDESHOW_SPEED', $this->default_speed);
            $res &= Configuration::updateValue('POSSLIDESHOW_TIME', $this->default_time);
            $res &= Configuration::updateValue('POSSLIDESHOW_PAUSE_ON_HOVER', $this->default_pause_on_hover);
            $res &= Configuration::updateValue('POSSLIDESHOW_NAV', $this->default_nav);
            $res &= Configuration::updateValue('POSSLIDESHOW_PAG', $this->default_pag);
            $res &= Configuration::updateValue('POSSLIDESHOW_CAPTION', $this->default_caption);

            /* Creates tables */
            $res &= $this->createTables();

            /* Adds samples */
            if ($res) {
                $this->installSamples();
            }

            return (bool)$res;
        }

        return false;
    }

    /**
     * Adds samples
     */
    protected function installSamples()
    {
        $languages = Language::getLanguages(false);
        for ($i = 1; $i <= 2; ++$i) {
            $slide = new Slideshow();
            $slide->position = $i;
            $slide->active = 1;
            foreach ($languages as $language) {
                $slide->title[$language['id_lang']] = 'Sample '.$i;
				if($i==1){
					$slide->title = 'slide show1';
					$slide->cap_position = 1;
					$slide->description[$language['id_lang']] = '{"1":{"title":"Arlo Pro 2","display":"0","animation":"6"},"2":{"title":"Wi-Fi Camera","display":"0","animation":"7"},"3":{"title":"Fist Choise for Security Pofessionals.","display":"4","animation":"8"},"4":{"title":"Shop Now","display":"5","animation":"10"}}';
				}elseif($i==2){
					$slide->title = 'slide show2';
					$slide->cap_position = 1;
					$slide->description[$language['id_lang']] = '{"1":{"title":"Pre-Order","display":"0","animation":"7"},"2":{"title":"Exclusive Watch","display":"0","animation":"8"},"3":{"title":"Free Galaxy Watch Strap worth RM109","display":"4","animation":"9"},"4":{"title":"Shop Now","display":"5","animation":"10"}}';
				}else{
					$slide->description[$language['id_lang']] = '';
				}
                $slide->url[$language['id_lang']] = 'http://www.posthemes.com';
                $slide->image[$language['id_lang']] = 'sample-'.$i.'.jpg';
            }
            $slide->add();
        }
    }

    /**
     * @see Module::uninstall()
     */
    public function uninstall()
    {
        /* Deletes Module */
        if (parent::uninstall()) {
            /* Deletes tables */
            $res = $this->deleteTables();

            /* Unsets configuration */
            $res &= Configuration::deleteByName('POSSLIDESHOW_SPEED');
            $res &= Configuration::deleteByName('POSSLIDESHOW_TIME');
            $res &= Configuration::deleteByName('POSSLIDESHOW_PAUSE_ON_HOVER');
            $res &= Configuration::deleteByName('POSSLIDESHOW_NAV');
            $res &= Configuration::deleteByName('POSSLIDESHOW_PAG');
            $res &= Configuration::deleteByName('POSSLIDESHOW_CAPTION');
			$tab = new Tab((int)Tab::getIdFromClassName('AdminPosslideshows'));
			$tab->delete();

            return (bool)$res;
        }

        return false;
    }

    /**
     * Creates tables
     */
    protected function createTables()
    {
        /* Slides */
        $res = (bool)Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posslideshows` (
                `id_posslideshows_slides` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `id_shop` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id_posslideshows_slides`, `id_shop`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        ');

        /* Slides configuration */
        $res &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posslideshows_slides` (
              `id_posslideshows_slides` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(255) NOT NULL,
              `cap_position` tinyint(1) DEFAULT \'0\',
              `position` int(10) unsigned NOT NULL DEFAULT \'0\',
              `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
              PRIMARY KEY (`id_posslideshows_slides`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        ');

        /* Slides lang configuration */
        $res &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posslideshows_slides_lang` (
              `id_posslideshows_slides` int(10) unsigned NOT NULL,
              `id_lang` int(10) unsigned NOT NULL,
              `description` text DEFAULT NULL,
              `url` varchar(255) NOT NULL,
              `image` varchar(255) NOT NULL,
              PRIMARY KEY (`id_posslideshows_slides`,`id_lang`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        ');

        return $res;
    }

    /**
     * deletes tables
     */
    protected function deleteTables()
    {
      
        return Db::getInstance()->execute('
            DROP TABLE IF EXISTS `'._DB_PREFIX_.'posslideshows`, `'._DB_PREFIX_.'posslideshows_slides`, `'._DB_PREFIX_.'posslideshows_slides_lang`;
        ');
    }

    public function getContent()
    {
        $this->_html .= $this->headerHTML();

        /* Validate & process */
        if (Tools::isSubmit('submitSlide') || Tools::isSubmit('delete_id_slide') ||
            Tools::isSubmit('submitSlider') ||
            Tools::isSubmit('changeStatus')
        ) {
            if ($this->_postValidation()) {
                $this->_postProcess();
                $this->_html .= $this->renderForm();
                $this->_html .= $this->renderList();
            } else {
                $this->_html .= $this->renderAddForm();
            }

            $this->clearCache();
        } elseif (Tools::isSubmit('addSlide') || (Tools::isSubmit('id_slide') && $this->slideExists((int)Tools::getValue('id_slide')))) {
            if (Tools::isSubmit('addSlide')) {
                $mode = 'add';
            } else {
                $mode = 'edit';
            }

            if ($mode == 'add') {
                if (Shop::getContext() != Shop::CONTEXT_GROUP && Shop::getContext() != Shop::CONTEXT_ALL) {
                    $this->_html .= $this->renderAddForm();
                } else {
                    $this->_html .= $this->getShopContextError(null, $mode);
                }
            } else {
                $associated_shop_ids = Slideshow::getAssociatedIdsShop((int)Tools::getValue('id_slide'));
                $context_shop_id = (int)Shop::getContextShopID();

                if ($associated_shop_ids === false) {
                    $this->_html .= $this->getShopAssociationError((int)Tools::getValue('id_slide'));
                } elseif (Shop::getContext() != Shop::CONTEXT_GROUP && Shop::getContext() != Shop::CONTEXT_ALL && in_array($context_shop_id, $associated_shop_ids)) {
                    if (count($associated_shop_ids) > 1) {
                        $this->_html = $this->getSharedSlideWarning();
                    }
                    $this->_html .= $this->renderAddForm();
                } else {
                    $shops_name_list = array();
                    foreach ($associated_shop_ids as $shop_id) {
                        $associated_shop = new Shop((int)$shop_id);
                        $shops_name_list[] = $associated_shop->name;
                    }
                    $this->_html .= $this->getShopContextError($shops_name_list, $mode);
                }
            }
        } else {
            $this->_html .= $this->getWarningMultishopHtml().$this->getCurrentShopInfoMsg().$this->renderForm();

            if (Shop::getContext() != Shop::CONTEXT_GROUP && Shop::getContext() != Shop::CONTEXT_ALL) {
                $this->_html .= $this->renderList();
            }
        }

        return $this->_html;
    }

    protected function _postValidation()
    {
        $errors = array();

        /* Validation for Slider configuration */
        if (Tools::isSubmit('submitSlider')) {
            if (!Validate::isInt(Tools::getValue('POSSLIDESHOW_SPEED'))) {
                $errors[] = $this->l('Invalid values');
            }
        } elseif (Tools::isSubmit('changeStatus')) {
            if (!Validate::isInt(Tools::getValue('id_slide'))) {
                $errors[] = $this->l('Invalid slide');
            }
        } elseif (Tools::isSubmit('submitSlide')) {
            /* Checks state (active) */
            if (!Validate::isInt(Tools::getValue('active_slide')) || (Tools::getValue('active_slide') != 0 && Tools::getValue('active_slide') != 1)) {
                $errors[] = $this->l('Invalid slide state.');
            }
            /* Checks position */
            if (!Validate::isInt(Tools::getValue('position')) || (Tools::getValue('position') < 0)) {
                $errors[] = $this->l('Invalid slide position.');
            }
            /* If edit : checks id_slide */
            if (Tools::isSubmit('id_slide')) {
                if (!Validate::isInt(Tools::getValue('id_slide')) && !$this->slideExists(Tools::getValue('id_slide'))) {
                    $errors[] = $this->l('Invalid slide ID');
                }
            }
            /* Checks title/url/legend/description/image */
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                if (Tools::strlen(Tools::getValue('title_' . $language['id_lang'])) > 255) {
                    $errors[] = $this->l('The title is too long.');
                }
                if (Tools::strlen(Tools::getValue('url_' . $language['id_lang'])) > 255) {
                    $errors[] = $this->l('The URL is too long.');
                }
                if (Tools::strlen(Tools::getValue('url_' . $language['id_lang'])) > 0 && !Validate::isUrl(Tools::getValue('url_' . $language['id_lang']))) {
                    $errors[] = $this->l('The URL format is not correct.');
                }
                if (Tools::getValue('image_' . $language['id_lang']) != null && !Validate::isFileName(Tools::getValue('image_' . $language['id_lang']))) {
                    $errors[] = $this->l('Invalid filename.');
                }
                if (Tools::getValue('image_old_' . $language['id_lang']) != null && !Validate::isFileName(Tools::getValue('image_old_' . $language['id_lang']))) {
                    $errors[] = $this->l('Invalid filename.');
                }
            }

            /* Checks title/url/legend/description for default lang */
            $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
            if (Tools::strlen(Tools::getValue('url_' . $id_lang_default)) == 0) {
                $errors[] = $this->l('The URL is not set.');
            }
		
            if (Tools::getValue('image_old_'.$id_lang_default) && !Validate::isFileName(Tools::getValue('image_old_'.$id_lang_default))) {
                $errors[] = $this->l('The image is not set.');
            }
		
        } elseif (Tools::isSubmit('delete_id_slide') && (!Validate::isInt(Tools::getValue('delete_id_slide')) || !$this->slideExists((int)Tools::getValue('delete_id_slide')))) {
            $errors[] = $this->l('Invalid slide ID');
        }

        /* Display errors if needed */
        if (count($errors)) {
            $this->_html .= $this->displayError(implode('<br />', $errors));

            return false;
        }

        /* Returns if validation is ok */

        return true;
    }

    protected function _postProcess()
    {
        $errors = array();
        $shop_context = Shop::getContext();

        /* Processes Slider */
        if (Tools::isSubmit('submitSlider')) {
            $shop_groups_list = array();
            $shops = Shop::getContextListShopID();

            foreach ($shops as $shop_id) {
                $shop_group_id = (int)Shop::getGroupFromShop($shop_id, true);

                if (!in_array($shop_group_id, $shop_groups_list)) {
                    $shop_groups_list[] = $shop_group_id;
                }

                $res = Configuration::updateValue('POSSLIDESHOW_SPEED', (int)Tools::getValue('POSSLIDESHOW_SPEED'), false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_TIME', (int)Tools::getValue('POSSLIDESHOW_TIME'), false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_PAUSE_ON_HOVER', (int)Tools::getValue('POSSLIDESHOW_PAUSE_ON_HOVER'), false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_NAV', (int)Tools::getValue('POSSLIDESHOW_NAV'), false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_PAG', (int)Tools::getValue('POSSLIDESHOW_PAG'), false, $shop_group_id, $shop_id);
                $res &= Configuration::updateValue('POSSLIDESHOW_CAPTION', (int)Tools::getValue('POSSLIDESHOW_CAPTION'), false, $shop_group_id, $shop_id);
            }

            /* Update global shop context if needed*/
            switch ($shop_context) {
                case Shop::CONTEXT_ALL:
                    $res &= Configuration::updateValue('POSSLIDESHOW_SPEED', (int)Tools::getValue('POSSLIDESHOW_SPEED'));
                    $res &= Configuration::updateValue('POSSLIDESHOW_TIME', (int)Tools::getValue('POSSLIDESHOW_TIME'));
                    $res &= Configuration::updateValue('POSSLIDESHOW_PAUSE_ON_HOVER', (int)Tools::getValue('POSSLIDESHOW_PAUSE_ON_HOVER'));
                    $res &= Configuration::updateValue('POSSLIDESHOW_NAV', (int)Tools::getValue('POSSLIDESHOW_NAV'));
                    $res &= Configuration::updateValue('POSSLIDESHOW_PAG', (int)Tools::getValue('POSSLIDESHOW_PAG'));
                    $res &= Configuration::updateValue('POSSLIDESHOW_CAPTION', (int)Tools::getValue('POSSLIDESHOW_CAPTION'));
                    if (count($shop_groups_list)) {
                        foreach ($shop_groups_list as $shop_group_id) {
                            $res &= Configuration::updateValue('POSSLIDESHOW_SPEED', (int)Tools::getValue('POSSLIDESHOW_SPEED'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_TIME', (int)Tools::getValue('POSSLIDESHOW_TIME'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_PAUSE_ON_HOVER', (int)Tools::getValue('POSSLIDESHOW_PAUSE_ON_HOVER'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_NAV', (int)Tools::getValue('POSSLIDESHOW_NAV'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_PAG', (int)Tools::getValue('POSSLIDESHOW_PAG'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_CAPTION', (int)Tools::getValue('POSSLIDESHOW_CAPTION'), false, $shop_group_id);
                        }
                    }
                    break;
                case Shop::CONTEXT_GROUP:
                    if (count($shop_groups_list)) {
                        foreach ($shop_groups_list as $shop_group_id) {
                            $res &= Configuration::updateValue('POSSLIDESHOW_SPEED', (int)Tools::getValue('POSSLIDESHOW_SPEED'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_TIME', (int)Tools::getValue('POSSLIDESHOW_TIME'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_PAUSE_ON_HOVER', (int)Tools::getValue('POSSLIDESHOW_PAUSE_ON_HOVER'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_NAV', (int)Tools::getValue('POSSLIDESHOW_NAV'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_PAG', (int)Tools::getValue('POSSLIDESHOW_PAG'), false, $shop_group_id);
                            $res &= Configuration::updateValue('POSSLIDESHOW_CAPTION', (int)Tools::getValue('POSSLIDESHOW_CAPTION'), false, $shop_group_id);
                        }
                    }
                    break;
            }

            $this->clearCache();

            if (!$res) {
                $errors[] = $this->displayError($this->l('The configuration could not be updated.'));
            } else {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=6&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name);
            }
        } elseif (Tools::isSubmit('changeStatus') && Tools::isSubmit('id_slide')) {
            $slide = new Slideshow((int)Tools::getValue('id_slide'));
            if ($slide->active == 0) {
                $slide->active = 1;
            } else {
                $slide->active = 0;
            }
            $res = $slide->update();
            $this->clearCache();
            $this->_html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
        } elseif (Tools::isSubmit('submitSlide')) {
            /* Sets ID if needed */
            if (Tools::getValue('id_slide')) {
                $slide = new Slideshow((int)Tools::getValue('id_slide'));
                if (!Validate::isLoadedObject($slide)) {
                    $this->_html .= $this->displayError($this->l('Invalid slide ID'));
                    return false;
                }
            } else {
                $slide = new Slideshow();
            }
			$slide->cap_position = (int)Tools::getValue('positionslide');
            /* Sets position */
            $slide->position = (int)Tools::getValue('position');
            /* Sets active */
            $slide->active = (int)Tools::getValue('active_slide');
            $slide->title = Tools::getValue('title');

            /* Sets each langue fields */
            $languages = Language::getLanguages(false);

            foreach ($languages as $language) {
                
                $slide->url[$language['id_lang']] = Tools::getValue('url_'.$language['id_lang']);
                $description = Tools::getValue('description');
                $description = $description[$language['id_lang']];
                

                $description = json_encode(array_filter($description, function ($el) {
                    if (empty($el['title'])) {
                        return false;
                    }
                    return true;
                }));

                $slide->description[$language['id_lang']] = $description;

                /* Uploads image and sets slide */
                $type = Tools::strtolower(Tools::substr(strrchr($_FILES['image_'.$language['id_lang']]['name'], '.'), 1));
                $imagesize = @getimagesize($_FILES['image_'.$language['id_lang']]['tmp_name']);
                if (isset($_FILES['image_'.$language['id_lang']]) &&
                    isset($_FILES['image_'.$language['id_lang']]['tmp_name']) &&
                    !empty($_FILES['image_'.$language['id_lang']]['tmp_name']) &&
                    !empty($imagesize) &&
                    in_array(
                        Tools::strtolower(Tools::substr(strrchr($imagesize['mime'], '/'), 1)), array(
                            'jpg',
                            'gif',
                            'jpeg',
                            'png'
                        )
                    ) &&
                    in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
                ) {
                    $temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
                    $salt = sha1(microtime());
                    if ($error = ImageManager::validateUpload($_FILES['image_'.$language['id_lang']])) {
                        $errors[] = $error;
                    } elseif (!$temp_name || !move_uploaded_file($_FILES['image_'.$language['id_lang']]['tmp_name'], $temp_name)) {
                        return false;
                    } elseif (!ImageManager::resize($temp_name, dirname(__FILE__).'/images/'.$salt.'_'.$_FILES['image_'.$language['id_lang']]['name'], null, null, $type)) {
                        $errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
                    }
                    if (isset($temp_name)) {
                        @unlink($temp_name);
                    }
                    $slide->image[$language['id_lang']] = $salt.'_'.$_FILES['image_'.$language['id_lang']]['name'];
                } elseif (Tools::getValue('image_old_'.$language['id_lang']) != '') {
                    $slide->image[$language['id_lang']] = Tools::getValue('image_old_' . $language['id_lang']);
                }
            }

            /* Processes if no errors  */
            if (!$errors) {
                /* Adds */
                if (!Tools::getValue('id_slide')) {
                    if (!$slide->add()) {
                        $errors[] = $this->displayError($this->l('The slide could not be added.'));
                    }
                } elseif (!$slide->update()) {
                    $errors[] = $this->displayError($this->l('The slide could not be updated.'));
                }
                $this->clearCache();
            }
        } elseif (Tools::isSubmit('delete_id_slide')) {
            $slide = new Slideshow((int)Tools::getValue('delete_id_slide'));
            $res = $slide->delete();
            $this->clearCache();
            if (!$res) {
                $this->_html .= $this->displayError('Could not delete.');
            } else {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=1&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name);
            }
        }

        /* Display errors if needed */
        if (count($errors)) {
            $this->_html .= $this->displayError(implode('<br />', $errors));
        } elseif (Tools::isSubmit('submitSlide') && Tools::getValue('id_slide')) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=4&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name);
        } elseif (Tools::isSubmit('submitSlide')) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true) . '&conf=3&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name);
        }
    }

    public function hookdisplayHeader($params)
    {
		$this->context->controller->addCSS($this->_path.'css/nivo-slider/nivo-slider.css');
		$this->context->controller->addJS($this->_path.'js/nivo-slider/jquery.nivo.slider.pack.js');
		$this->context->controller->addJS($this->_path.'js/posslideshow.js');
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
		
        if (!$this->isCached('slider.tpl', $this->getCacheId())) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }

        return $this->display(__FILE__, 'slider.tpl', $this->getCacheId());
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $slides = $this->getSlides(true);
		foreach($slides as &$slide){
            $slide['description']= json_decode($slide['description'], true);
		}
        if (is_array($slides)) {
            foreach ($slides as &$slide) {
                $slide['sizes'] = @getimagesize((dirname(__FILE__) . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $slide['image']));
                if (isset($slide['sizes'][3]) && $slide['sizes'][3]) {
                    $slide['size'] = $slide['sizes'][3];
                }
            }
        }

        $config = $this->getConfigFieldsValues();
        //echo '<pre>'; print_r($slides);die;
		if ($slides) {
		$first_load_image = $slides[0]['image_url']; 
		}else {
			$first_load_image = '';
		}
        return [
            'homeslider' => [
                'speed' => $config['POSSLIDESHOW_SPEED'],
                'time' => $config['POSSLIDESHOW_TIME'],
                'pause_on_hover' => $config['POSSLIDESHOW_PAUSE_ON_HOVER'] ? 'hover' : '',
                'nav' => $config['POSSLIDESHOW_NAV'] ? 'true' : 'false',
                'pag' => $config['POSSLIDESHOW_PAG'] ? 'true' : 'false',
				'show_caption' => $config['POSSLIDESHOW_CAPTION'] ? 1 : 'false',
                'slides' => $slides,
				'first_load_image' => $first_load_image,  
            ],
        ];
    }

    public function clearCache()
    {
        $this->_clearCache('slider.tpl');
    }

    public function hookActionShopDataDuplication($params)
    {
        Db::getInstance()->execute('
            INSERT IGNORE INTO '._DB_PREFIX_.'posslideshows (id_posslideshows_slides, id_shop)
            SELECT id_posslideshows_slides, '.(int)$params['new_id_shop'].'
            FROM '._DB_PREFIX_.'posslideshows
            WHERE id_shop = '.(int)$params['old_id_shop']
        );
        $this->clearCache();
    }

    public function headerHTML()
    {
        if (Tools::getValue('controller') != 'AdminModules' && Tools::getValue('configure') != $this->name) {
            return;
        }

        $this->context->controller->addJqueryUI('ui.sortable');
        /* Style & js for fieldset 'slides configuration' */
        $html = '<script type="text/javascript">
            $(function() {
                var $mySlides = $("#slides");
                $mySlides.sortable({
                    opacity: 0.6,
                    cursor: "move",
                    update: function() {
                        var order = $(this).sortable("serialize") + "&action=updateSlidesPosition";
                        $.post("'.$this->context->shop->physical_uri.$this->context->shop->virtual_uri.'modules/'.$this->name.'/ajax_'.$this->name.'.php?secure_key='.$this->secure_key.'", order);
                        }
                    });
                $mySlides.hover(function() {
                    $(this).css("cursor","move");
                    },
                    function() {
                    $(this).css("cursor","auto");
                });
            });
        </script>';

        return $html;
    }

    public function getNextPosition()
    {
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
            SELECT MAX(hss.`position`) AS `next_position`
            FROM `'._DB_PREFIX_.'posslideshows_slides` hss, `'._DB_PREFIX_.'posslideshows` hs
            WHERE hss.`id_posslideshows_slides` = hs.`id_posslideshows_slides` AND hs.`id_shop` = '.(int)$this->context->shop->id
        );

        return (++$row['next_position']);
    }

    public function getSlides($active = null)
    {
        $this->context = Context::getContext();
        $id_shop = $this->context->shop->id;
        $id_lang = $this->context->language->id;

        $slides = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT hs.`id_posslideshows_slides` as id_slide, hss.`position`, hss.`cap_position`, hss.`active`, hss.`title`,
            hssl.`url`, hssl.`description`, hssl.`image`
            FROM '._DB_PREFIX_.'posslideshows hs
            LEFT JOIN '._DB_PREFIX_.'posslideshows_slides hss ON (hs.id_posslideshows_slides = hss.id_posslideshows_slides)
            LEFT JOIN '._DB_PREFIX_.'posslideshows_slides_lang hssl ON (hss.id_posslideshows_slides = hssl.id_posslideshows_slides)
            WHERE id_shop = '.(int)$id_shop.'
            AND hssl.id_lang = '.(int)$id_lang.
            ($active ? ' AND hss.`active` = 1' : ' ').'
            ORDER BY hss.position'
        );

        foreach ($slides as &$slide) {
            $slide['image_url'] = $this->context->link->getMediaLink(_MODULE_DIR_.'posslideshows/images/'.$slide['image']);
        }

        return $slides;
    }

    public function getAllImagesBySlidesId($id_slides, $active = null, $id_shop = null)
    {
        $this->context = Context::getContext();
        $images = array();

        if (!isset($id_shop))
            $id_shop = $this->context->shop->id;

        $results = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT hssl.`image`, hssl.`id_lang`
            FROM '._DB_PREFIX_.'posslideshows hs
            LEFT JOIN '._DB_PREFIX_.'posslideshows_slides hss ON (hs.id_posslideshows_slides = hss.id_posslideshows_slides)
            LEFT JOIN '._DB_PREFIX_.'posslideshows_slides_lang hssl ON (hss.id_posslideshows_slides = hssl.id_posslideshows_slides)
            WHERE hs.`id_posslideshows_slides` = '.(int)$id_slides.' AND hs.`id_shop` = '.(int)$id_shop.
            ($active ? ' AND hss.`active` = 1' : ' ')
        );

        foreach ($results as $result)
            $images[$result['id_lang']] = $result['image'];

        return $images;
    }

    public function displayStatus($id_slide, $active)
    {
        $title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
        $icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
        $class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
        $html = '<a class="btn '.$class.'" href="'.AdminController::$currentIndex.
            '&configure='.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminModules').
                '&changeStatus&id_slide='.(int)$id_slide.'" title="'.$title.'"><i class="'.$icon.'"></i> '.$title.'</a>';

        return $html;
    }

    public function slideExists($id_slide)
    {
        $req = 'SELECT hs.`id_posslideshows_slides` as id_slide
                FROM `'._DB_PREFIX_.'posslideshows` hs
                WHERE hs.`id_posslideshows_slides` = '.(int)$id_slide;
        $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);

        return ($row);
    }

    public function renderList()
    {
        $slides = $this->getSlides();
        foreach ($slides as $key => $slide) {
            $slides[$key]['status'] = $this->displayStatus($slide['id_slide'], $slide['active']);
            $associated_shop_ids = Slideshow::getAssociatedIdsShop((int)$slide['id_slide']);
            if ($associated_shop_ids && count($associated_shop_ids) > 1) {
                $slides[$key]['is_shared'] = true;
            } else {
                $slides[$key]['is_shared'] = false;
            }
        }

        $this->context->smarty->assign(
            array(
                'link' => $this->context->link,
                'slides' => $slides,
                'image_baseurl' => $this->_path.'images/'
            )
        );

        return $this->display(__FILE__, 'list.tpl');
    }

    public function renderAddForm()
    {
        $block = new Slideshow((int)Tools::getValue('id_slide'));
        //echo '<pre>'; print_r($description);die;

        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Slide information'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Slide name'),
                        'name' => 'title',
                        'class' => 'fixed-width-xxl'
                    ),
				    array(
                        'type' => 'select',
                        'label' => $this->l('Position slide'),
                        'name' => 'positionslide',
						'options' => array(
							'query' => array(
								array('key' => '1', 'name' => 'position left'),
								array('key' => '2', 'name' => 'position center'),
								array('key' => '3', 'name' => 'position right'),
							),
							'id' => 'key',
							'name' => 'name'
						)
                    ),
                    array(
                        'type' => 'file_lang',
                        'label' => $this->l('Select a file'),
                        'name' => 'image',
                        'required' => true,
                        'lang' => true,
                        'desc' => '<div class="col-md-4"></div><p style="font-style:italic;">'.sprintf($this->l('Maximum image size: %s.'), ini_get('upload_max_filesize')).'</p>'
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Target URL'),
                        'name' => 'url',
                        'required' => true,
                        'lang' => true,
                    ),
                    array(
                        'type' => 'custom_des',
                        'label' => $this->l('Caption'),
                        'name' => 'description[]',
                        'values' => $this->repository->getDescription($block),
                        'desc' => '<div class="col-md-4"></div><p style="font-style:italic;">'.$this->l('Button will use link of Target URL').'</p>',
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enabled'),
                        'name' => 'active_slide',
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
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        if (Tools::isSubmit('id_slide') && $this->slideExists((int)Tools::getValue('id_slide'))) {
            $slide = new Slideshow((int)Tools::getValue('id_slide'));
            //echo '<pre>'; print_r($slide);die;
            $fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_slide');
            $fields_form['form']['images'] = $slide->image;

            $has_picture = true;

            foreach (Language::getLanguages(false) as $lang) {
                if (!isset($slide->image[$lang['id_lang']])) {
                    $has_picture &= false;
                }
            }

            if ($has_picture) {
                $fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'has_picture');
            }
        }

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitSlide';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
            'language' => array(
                'id_lang' => $language->id,
                'iso_code' => $language->iso_code
            ),
            'fields_value' => $this->getAddFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'image_baseurl' => $this->_path.'images/'
        );

        $helper->override_folder = '/';

        $languages = Language::getLanguages(false);

        if (count($languages) > 1) {
            return $this->getMultiLanguageInfoMsg() . $helper->generateForm(array($fields_form));
        } else {
            return $helper->generateForm(array($fields_form));
        }
    }

    public function renderForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Speed'),
                        'name' => 'POSSLIDESHOW_SPEED',
                        'suffix' => 'milliseconds',
                        'class' => 'fixed-width-sm',
                        'desc' => $this->l('Time to complete showing a slider.')
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delay time'),
                        'name' => 'POSSLIDESHOW_TIME',
                        'suffix' => 'milliseconds',
                        'class' => 'fixed-width-sm',
                        'desc' => $this->l('The duration of the transition between two slides.')
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Pause on hover'),
                        'name' => 'POSSLIDESHOW_PAUSE_ON_HOVER',
                        'desc' => $this->l('Stop sliding when .'),
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
                        ),
                    ),
					array(
                        'type' => 'switch',
                        'label' => $this->l('Show Caption'),
                        'name' => 'POSSLIDESHOW_CAPTION',
                        'desc' => $this->l('Show/Hide Captions .'),
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
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show navigation'),
                        'name' => 'POSSLIDESHOW_NAV',
                        'desc' => $this->l('Show/Hide Captions .'),
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
                        'type' => 'switch',
                        'label' => $this->l('Show pagination'),
                        'name' => 'POSSLIDESHOW_PAG',
                        'desc' => $this->l('Show/Hide Captions .'),
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
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitSlider';
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
        $id_shop_group = Shop::getContextShopGroupID();
        $id_shop = Shop::getContextShopID();

        return array(
            'POSSLIDESHOW_SPEED' => Tools::getValue('POSSLIDESHOW_SPEED', Configuration::get('POSSLIDESHOW_SPEED', null, $id_shop_group, $id_shop)),
            'POSSLIDESHOW_TIME' => Tools::getValue('POSSLIDESHOW_TIME', Configuration::get('POSSLIDESHOW_TIME', null, $id_shop_group, $id_shop)),
            'POSSLIDESHOW_PAUSE_ON_HOVER' => Tools::getValue('POSSLIDESHOW_PAUSE_ON_HOVER', Configuration::get('POSSLIDESHOW_PAUSE_ON_HOVER', null, $id_shop_group, $id_shop)),
            'POSSLIDESHOW_NAV' => Tools::getValue('POSSLIDESHOW_NAV', Configuration::get('POSSLIDESHOW_NAV', null, $id_shop_group, $id_shop)),
            'POSSLIDESHOW_PAG' => Tools::getValue('POSSLIDESHOW_PAG', Configuration::get('POSSLIDESHOW_PAG', null, $id_shop_group, $id_shop)),
            'POSSLIDESHOW_CAPTION' => Tools::getValue('POSSLIDESHOW_CAPTION', Configuration::get('POSSLIDESHOW_CAPTION', null, $id_shop_group, $id_shop)),
        );
    }

    public function getAddFieldsValues()
    {
        $fields = array();

        if (Tools::isSubmit('id_slide') && $this->slideExists((int)Tools::getValue('id_slide'))) {
            $slide = new Slideshow((int)Tools::getValue('id_slide'));
            $fields['id_slide'] = (int)Tools::getValue('id_slide', $slide->id);
        } else {
            $slide = new Slideshow();
        }

        $fields['active_slide'] = Tools::getValue('active_slide', $slide->active);
        $fields['has_picture'] = true;
        $fields['title'] = Tools::getValue('title', $slide->title);
        $fields['positionslide'] = Tools::getValue('cap_position', $slide->cap_position);

        $languages = Language::getLanguages(false);

		 foreach ($languages as $lang) {
            $fields['image'][$lang['id_lang']] = Tools::getValue('image_'.(int)$lang['id_lang']);
			$fields['url'][$lang['id_lang']] = Tools::getValue('url_'.(int)$lang['id_lang'], $slide->url[$lang['id_lang']]);
		}

        return $fields;
    }

    protected function getMultiLanguageInfoMsg()
    {
        return '<p class="alert alert-warning">'.
                    $this->l('Since multiple languages are activated on your shop, please mind to upload your image for each one of them').
                '</p>';
    }

    protected function getWarningMultishopHtml()
    {
        if (Shop::getContext() == Shop::CONTEXT_GROUP || Shop::getContext() == Shop::CONTEXT_ALL) {
            return '<p class="alert alert-warning">' .
            $this->l('You cannot manage slides items from a "All Shops" or a "Group Shop" context, select directly the shop you want to edit') .
            '</p>';
        } else {
            return '';
        }
    }

    protected function getShopContextError($shop_contextualized_name, $mode)
    {
        if (is_array($shop_contextualized_name)) {
            $shop_contextualized_name = implode('<br/>', $shop_contextualized_name);
        }

        if ($mode == 'edit') {
            return '<p class="alert alert-danger">' .
            sprintf($this->l('You can only edit this slide from the shop(s) context: %s'), $shop_contextualized_name) .
            '</p>';
        } else {
            return '<p class="alert alert-danger">' .
            sprintf($this->l('You cannot add slides from a "All Shops" or a "Group Shop" context')) .
            '</p>';
        }
    }

    protected function getShopAssociationError($id_slide)
    {
        return '<p class="alert alert-danger">'.
                        sprintf($this->l('Unable to get slide shop association information (id_slide: %d)'), (int)$id_slide).
                '</p>';
    }


    protected function getCurrentShopInfoMsg()
    {
        $shop_info = null;

        if (Shop::isFeatureActive()) {
            if (Shop::getContext() == Shop::CONTEXT_SHOP) {
                $shop_info = sprintf($this->l('The modifications will be applied to shop: %s'), $this->context->shop->name);
            } else if (Shop::getContext() == Shop::CONTEXT_GROUP) {
                $shop_info = sprintf($this->l('The modifications will be applied to this group: %s'), Shop::getContextShopGroup()->name);
            } else {
                $shop_info = $this->l('The modifications will be applied to all shops and shop groups');
            }

            return '<div class="alert alert-info">'.
                        $shop_info.
                    '</div>';
        } else {
            return '';
        }
    }

    protected function getSharedSlideWarning()
    {
        return '<p class="alert alert-warning">'.
                    $this->l('This slide is shared with other shops! All shops associated to this slide will apply modifications made here').
                '</p>';
    }
}
