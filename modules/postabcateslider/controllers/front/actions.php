<?php

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
class PostabcatesliderActionsModuleFrontController extends ModuleFrontController
{

    public $id_product;

	public function initContent() {
		$this->name 		= 'postabcateslider';
        parent::initContent();
        $this->ajax = true; // enable ajax
    }

    public function postProcess123()
    { 
        if (Tools::getValue('action') == 'load_products') {
            $this->getProductsByCategoryId();
        } elseif (Tools::getValue('action') == 'sdfds') {
           
        } 
    }
	public function displayAjax()
    {
		header('Content-Type: application/json');
		$id_lang =(int) Context::getContext()->language->id;
		$id_shop = (int) Context::getContext()->shop->id;
		$id_category = (int)Tools::getValue('id');
		//$category = new Category((int) $id_category, (int) $id_lang, (int) $id_shop);
		$categoryProducts = $this->getProducts($id_category);
		$context = Context::getContext();
		$context->smarty->assign('productCate',$categoryProducts);	
		$context->smarty->assign( 'rows' , (int)Configuration::get($this->name . '_row'));
		//$tpl =$this->context->smarty->display(dirname(__FILE__).'/product_cate.tpl'); 
		// die($this->context->smarty->fetch(dirname(__FILE__).'/product_cate.tpl'));
		 $this->ajaxDie(json_encode(array(
                'success' => true,
                'product_cate' => $this->context->smarty->fetch(_PS_THEME_DIR_.'/modules/'.$this->name.'/product_cate.tpl'),
                
            )));
		
	}
	
	
	
	
	protected function getProducts($cate_id=1)
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

        $category = new Category($cate_id);

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
	
	
	
    /**
     * Add product to compare.
     */
    public function getProductsByCategoryId()
    {   
        header('Content-Type: application/json');
		$cate_id = (int)Tools::getValue('id');
		$template = $this->context->smarty->fetch('module:postabcateslider/views/temapltes/front/product_cate.tpl');
		echo $template;
		echo $cate_id; die('ss');

       
    }
	
	 public function getProductsByCategoryId123()
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

    
}
