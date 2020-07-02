<?php

use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

if (!defined('_PS_VERSION_')) {
    exit;
}

class PosCompare extends Module implements WidgetInterface
{
    public $configName;

    public function __construct()
    {
        $this->name = 'poscompare';
        $this->version = '1.0.0';
        $this->author = 'posthemes';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->tab = 'front_office_features';
        $this->controllers = array('comparePage');

        parent::__construct();
        $this->displayName = $this->l('Pos Compare');
        $this->description = $this->l('Allow customers to compare products');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->defaults = array(
            'productsNb' => 0,
        );
    }

    public function install()
    {
        return (parent::install()
            && $this->setDefaults()
            && $this->registerHook('header')
            && $this->registerHook('displayNav')
            && $this->registerHook('displayProductAdditionalInfo')
            && $this->registerHook('displayAfterProductAddCartBtn')
            && $this->registerHook('displayProductListCompare')
            && $this->registerHook('displayBeforeBodyClosingTag')
        );
    }

    public function uninstall()
    {
        foreach ($this->defaults as $default => $value) {
            Configuration::deleteByName($this->configName . $default);
        }
        return parent::uninstall();
    }

    public function setDefaults()
    {
        foreach ($this->defaults as $default => $value) {
            Configuration::updateValue($this->configName . $default, $value);
        }
        return true;
    }


    public function hookHeader()
    {
        $this->context->controller->registerStylesheet('modules-poscompate-style', 'modules/'.$this->name.'/views/css/front.css', ['media' => 'all', 'priority' => 150]);
        $this->context->controller->registerJavascript('modules-poscompare-script', 'modules/'.$this->name.'/views/js/front.js', ['position' => 'bottom', 'priority' => 150]);

        Media::addJsDef(array('poscompare' => [
            'nbProducts' =>  (int) $this->context->cookie->posCompareNb
        ]));
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }
        $templateFile = 'compare_top.tpl';
        if (preg_match('/^displayNav\d*$/', $hookName)) {
            $templateFile = 'compare_top.tpl';
        } elseif (preg_match('/^displayProductAdditionalInfo\d*$/', $hookName) || preg_match('/^displayAfterProductAddCartBtn\d*$/', $hookName)) {
            $templateFile = 'product-page.tpl';
        } elseif (preg_match('/^displayBeforeBodyClosingTag\d*$/', $hookName)) {
            $templateFile = 'compare-success.tpl';
        } 
        $assign = $this->getWidgetVariables($hookName, $configuration);
        $this->smarty->assign($assign);
        return $this->fetch('module:' . $this->name . '/views/templates/hook/' . $templateFile);
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }

        $useSSL = ((isset($this->ssl) && $this->ssl && Configuration::get('PS_SSL_ENABLED')) || Tools::usingSecureMode()) ? true : false;
        $protocol_content = ($useSSL) ? 'https://' : 'http://';

        if (preg_match('/^displayProductListCompare\d*$/', $hookName)) {
            return array(
                'id_product' => $configuration['smarty']->tpl_vars['product']->value['id_product'],
				'content_dir'=> $protocol_content.Tools::getHttpHost().__PS_BASE_URI__,
            );
        }
        if (preg_match('/^displayNav2\d*$/', $hookName) || preg_match('/^displayNav\d*$/', $hookName)) {
            return array(
                'content_dir'=> $protocol_content.Tools::getHttpHost().__PS_BASE_URI__,
            );
        }
    }

    public function getFeaturesForComparison($idsArray, $idLang)
    {
        if (!Feature::isFeatureActive()) {
            return false;
        }

        $ids = implode(",", $idsArray);

        if (empty($ids)) {
            return false;
        }

        return Db::getInstance()->executeS('
			SELECT f.*, fl.*
			FROM `'._DB_PREFIX_.'feature` f
			LEFT JOIN `'._DB_PREFIX_.'feature_product` fp
				ON f.`id_feature` = fp.`id_feature`
			LEFT JOIN `'._DB_PREFIX_.'feature_lang` fl
				ON f.`id_feature` = fl.`id_feature`
			WHERE fp.`id_product` IN ('.$ids.')
			AND `id_lang` = '.(int)$idLang.'
			GROUP BY f.`id_feature`
			ORDER BY f.`position` ASC
		');
    }
}
