{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<section class="featured-products clearfix">
  <div class="pos_title">
    <h2>{l s='Popular Products' d='Shop.Theme.Catalog'}</h2>
  </div>
  <div class="row pos_content">
	  <div class="popularslider owl-carousel">
		{foreach from=$products item="product"}
		  {include file="catalog/_partials/miniatures/product.tpl" product=$product}
		{/foreach}
	  </div>
  </div>
</section>
<script>
$(document).ready(function(){
var popularslider = $(".popularslider");
		popularslider.owlCarousel({
		autoPlay : false ,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		nav: true,
		dots : false,		
		responsive:{
			0:{
				items:1,
			},
			360:{
				items:2,
			},
			576:{
				items:2,
			},
			768:{
				items:3,
			},
			992:{
				items:4,
			},
			1200:{
				items:4, 
			}
		}
	});
	checkClasses();
    popularslider.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
		var total = $('.featured-products .popularslider .owl-stage .owl-item.active').length;
        $('.featured-products ').each(function(){
			$(this).find('.owl-item').removeClass('firstActiveItem');
			$(this).find('.owl-item').removeClass('lastActiveItem');
			$(this).find('.owl-item.active').each(function(index){
				if (index === 0) { $(this).addClass('firstActiveItem'); }
				if (index === total - 1 && total>1) {
					$(this).addClass('lastActiveItem');
				}
			})  
        });
    }
});	
</script>