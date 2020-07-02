<?php

class demoData
{
    public function initData()
    {
        $return = true;
        $languages = Language::getLanguages(true);
        $id_shop = Context::getContext()->shop->id;
        $id_hook_search = (int)Hook::getIdByName('displaySearchTop');
        $id_hook_top = (int)Hook::getIdByName('displayTopColumn');
        $id_hook_home = (int)Hook::getIdByName('displayHome');
        $id_hook_bottom = (int)Hook::getIdByName('displayContainerbottom');
        
        $queries = [
            'INSERT INTO `'._DB_PREFIX_.'pos_staticblock` (`id_pos_staticblock`, `id_hook`, `position`, `name`,`active`) VALUES
                (1, '.$id_hook_search.', 1, "Static shipping", 1),
                (2, '.$id_hook_top.', 2, "Static Cms", 1),
                (3, '.$id_hook_home.', 3, "Home Banner", 1),
                (4, '.$id_hook_bottom.', 4, "Home Banner2", 1)'
        ];

        foreach (Language::getLanguages(true, Context::getContext()->shop->id) as $lang) {
            $queries[] = 'INSERT INTO `'._DB_PREFIX_.'pos_staticblock_lang` (`id_pos_staticblock`, `id_lang`, `content`) VALUES
                (1, '.(int)$lang['id_lang'].', \'<div id="_desktop_static">
				<div class="shipping"><img src="/pos_madina/img/cms/shipping.png" alt="" />
				<p><span>Free Shipping</span> on Orders $50+</p>
				</div>
				</div>\'),
				(2, '.(int)$lang['id_lang'].', \'<div class="container">
				<div class="static_cms">
				<div class="col-cms">
				<div class="box_cms"><img src="/pos_madina/img/cms/cms1.png" alt="" class="img-responsive" />
				<div class="txt_cms">
				<h4>Free Shipping</h4>
				<p>On all orders over $75.00</p>
				</div>
				</div>
				</div>
				<div class="col-cms">
				<div class="box_cms"><img src="/pos_madina/img/cms/cms2.png" alt="" class="img-responsive" />
				<div class="txt_cms">
				<h4>Free Returns</h4>
				<p>If goods have problems</p>
				</div>
				</div>
				</div>
				<div class="col-cms">
				<div class="box_cms"><img src="/pos_madina/img/cms/cms3.png" alt="" class="img-responsive" />
				<div class="txt_cms">
				<h4>Secure Payment</h4>
				<p>100% secure payment</p>
				</div>
				</div>
				</div>
				<div class="col-cms">
				<div class="box_cms"><img src="/pos_madina/img/cms/cms4.png" alt="" class="img-responsive" />
				<div class="txt_cms">
				<h4>Support 24/7</h4>
				<p>Contact us 24hrs a day</p>
				</div>
				</div>
				</div>
				<div class="col-cms">
				<div class="box_cms"><img src="/pos_madina/img/cms/cms5.png" alt="" class="img-responsive" />
				<div class="txt_cms">
				<h4>Gift Service</h4>
				<p>Support gift service</p>
				</div>
				</div>
				</div>
				</div>
				</div>\'),	
				(3, '.(int)$lang['id_lang'].', \'<div class="home-banner">
				<div class="row">
				<div class="col col-lg-3 col-md-3 col-sm-12  col-xs-12">
				<div class="banner-box"><a href="#"><img src="/pos_madina/img/cms/1_1.jpg" alt="" /></a></div>
				</div>
				<div class="col col-lg-6 col-md-6 col-sm-12  col-xs-12">
				<div class="banner-box"><a href="#"><img src="/pos_madina/img/cms/2_1.jpg" alt="" /></a></div>
				</div>
				<div class="col col-lg-3 col-md-3 col-sm-12  col-xs-12">
				<div class="banner-box"><a href="#"><img src="/pos_madina/img/cms/3_1.jpg" alt="" /></a></div>
				</div>
				</div>
				</div>\'),
                (4, '.(int)$lang['id_lang'].', \'<div class="home-banner">
				<div class="row">
				<div class="col col-lg-6 col-md-6 col-sm-12  col-xs-12">
				<div class="banner-box"><a href="#"><img src="/pos_madina/img/cms/4_1.jpg" alt="" /></a></div>
				</div>
				<div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="banner-box"><a href="#"><img src="/pos_madina/img/cms/5_1.jpg" alt="" /></a></div>
				</div>
				</div>
				</div>\')'
            ;
        }

        $queries[] = 'INSERT INTO `'._DB_PREFIX_.'pos_staticblock_shop` (`id_pos_staticblock`, `id_shop`) VALUES
                (1, 1),  
                (2, 1),  
                (3, 1),  
                (4, 1)'; 

        foreach ($queries as $query) {
            $return &= Db::getInstance()->execute($query);
        }

        return $return;
    }
}
?>