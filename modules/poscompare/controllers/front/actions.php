<?php
class PosCompareActionsModuleFrontController extends ModuleFrontController
{

    public $id_product;

    public function init()
    {
        parent::init();

        $this->id_product = (int)Tools::getValue('id_product');
    }

    public function postProcess()
    {
        if (Tools::getValue('action') == 'remove') {
            $this->ajaxProcessRemove();
        } elseif (Tools::getValue('action') == 'add') {
            $this->ajaxProcessAdd();
        } elseif (Tools::getValue('action') == 'removeAll') {
            $this->ajaxProcessRemoveAll();
        }
		 elseif (Tools::getValue('action') == 'checkCompare') {
            $this->checkCompare();
        }
    }

    /**
     * Add product to compare.
     */
    public function ajaxProcessAdd()
    {   
        header('Content-Type: application/json');

        $idProduct = (int)Tools::getValue('id');

        $productsIds = $this->context->cookie->posCompare;
        $productsIds = json_decode($productsIds, true);

        if (!isset($productsIds[$idProduct])) {
            $productsIds[$idProduct] = $idProduct;
            $productsIds = json_encode($productsIds, true);

            $this->context->cookie->__set('posCompare', $productsIds);
            $this->context->cookie->__set('posCompareNb', (int) $this->context->cookie->posCompareNb + 1);

            $this->ajaxDie(json_encode(array(
                'success' => true,
                'data' => [
                    'message' => $this->l('Product added to comparator'),
                    'type' => 'added'
                ]
            )));
        }
    }

	 /**
     * Add product to compare.
     */
    public function checkCompare()
    {   
        header('Content-Type: application/json');

        $idProduct = (int)Tools::getValue('id');

        $productsIds = $this->context->cookie->posCompare;
        $productsIds = json_decode($productsIds, true);

        if (isset($productsIds[$idProduct])) {
            
            $this->ajaxDie(json_encode(array(
                'success' => true,
            )));
        }
    }
	
    /**
     * Remove a product from compare.
     */
    public function ajaxProcessRemove()
    {
        header('Content-Type: application/json');

        $idProduct = (int)Tools::getValue('id');
        $productsIds = $this->context->cookie->posCompare;
        $productsIds = json_decode($productsIds, true);
        unset($productsIds[$idProduct]);
        $productsIds = json_encode($productsIds, true);
        $this->context->cookie->__set('posCompare', $productsIds);
        $this->context->cookie->__set('posCompareNb', (int) $this->context->cookie->posCompareNb - 1);

        $this->ajaxDie(json_encode(array(
            'success' => true,
            'data' => [
                'message' => $this->l('Product removed'),
                'type' => 'removed'
            ]
        )));
    }

    /**
     * Remove all compare products.
     */
    public function ajaxProcessRemoveAll()
    {
        header('Content-Type: application/json');

        $productsIds = array();
        $productsIds = json_encode($productsIds, true);
        $this->context->cookie->__set('posCompare', $productsIds);
        $this->context->cookie->__set('posCompareNb', 0);

        $this->ajaxDie(json_encode(array(
            'success' => true,
            'data' => [
                'message' => $this->l('All products removed'),
                'type' => 'removedAll'
            ]
        )));
    }

    
}
