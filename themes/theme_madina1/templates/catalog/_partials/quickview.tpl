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
<div id="quickview-modal-{$product.id}-{$product.id_product_attribute}" class="modal fade quickview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <div class="row">
        <div class="{if $postheme.product_thumbnail == 0}col-md-6 {else} col-md-6 {/if}">
		    {if $postheme.product_thumbnail == 0}
				<div class="images-quickviews">
				  {block name='product_cover'}
					<div class="product-cover quickviews-for ">
					 {foreach from=$product.images item=image}
					 <div class="thumb-item" style="width:500px;">
					  {if $product.cover}		
					   <img class="" style="width:100%;" src="{$image.bySize.large_default.url}" alt="{$image.legend}" title="{$image.legend}" itemprop="image">
					  {else}
						<img src="{$urls.no_picture_image.bySize.large_default.url}" style="width:100%;">
					  {/if}
					   </div>
					 {/foreach}
					</div>
				  {/block}

				  {block name='product_images'}
					  <ul class="product-images quickviews-nav">
						{foreach from=$product.images item=image}
						  <div class="thumb-container">
							<div>
							<img
							  class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
							  src="{$image.bySize.home_default.url}"
							  alt="{$image.legend}"
							  title="{$image.legend}"
							  width="100"
							  itemprop="image"
							>
							</div>
						  </div>
						{/foreach}
					  </ul>

				  {/block}
				</div> 
			{else if $postheme.product_thumbnail == 1}
				<div class="images-quickviews left_vertical"> 
					{block name='product_images'}
					<ul class="product-images quickviews-nav"> 
						{foreach from=$product.images item=image}
						<div class="thumb-container">
							<div>
							<img 
							  class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
							  src="{$image.bySize.home_default.url}"
							  alt="{$image.legend}"
							  title="{$image.legend}"
							  itemprop="image"
							>
							</div>
						</div>
						{/foreach}
					</ul>
					{/block}
				  {block name='product_cover'}
				   <div class="product-view_content">
					  {block name='product_flags'}
						<ul class="product-flag">
						  {foreach from=$product.flags item=flag}
							<li class=" {$flag.type}">{$flag.label}</li>
						  {/foreach}
						</ul>
					  {/block}
					<div class="product-cover quickviews-for">
					 {foreach from=$product.images item=image}
					 <div class="thumb-item">
					  {if $product.cover}
					  <div class="easyzoom easyzoom--overlay">
					  <a href="{$image.bySize.large_default.url}">
					   <img class=""  style="width:100%;" src="{$image.bySize.large_default.url}" alt="{$image.legend}" title="{$image.legend}" itemprop="image">
					  </a>
					  </div>

					  {else}
						<img src="{$urls.no_picture_image.bySize.large_default.url}" style="width:100%;">
					  {/if}
					   </div>
					 {/foreach}
					</div>
					</div>
				  {/block}
				</div>
			{else if $postheme.product_thumbnail == 2}
				<div class="images-quickviews right_vertical">     
					{block name='product_images'}
					<ul class="product-images quickviews-nav"> 
						{foreach from=$product.images item=image}
						<div class="thumb-container">
							<div>
							<img 
							  class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
							  src="{$image.bySize.home_default.url}"
							  alt="{$image.legend}"
							  title="{$image.legend}"
							  itemprop="image"
							>
							</div>
						</div>
						{/foreach}
					</ul>
					{/block}
				  {block name='product_cover'}
				   <div class="product-view_content">
					  {block name='product_flags'}
						<ul class="product-flag">
						  {foreach from=$product.flags item=flag}
							<li class=" {$flag.type}">{$flag.label}</li>
						  {/foreach}
						</ul>
					  {/block}
					<div class="product-cover quickviews-for">
					 {foreach from=$product.images item=image}
					 <div class="thumb-item">
					  {if $product.cover}
					  <div class="easyzoom easyzoom--overlay">
					  <a href="{$image.bySize.large_default.url}">
					   <img class=""  style="width:100%;" src="{$image.bySize.large_default.url}" alt="{$image.legend}" title="{$image.legend}" itemprop="image">
					  </a>
					  </div>

					  {else}
						<img src="{$urls.no_picture_image.bySize.large_default.url}" style="width:100%;">
					  {/if}
					   </div>
					 {/foreach}
					</div>
					</div>
				  {/block}
				</div> 
			{/if}	
     
        </div>
        <div class="{if $postheme.product_thumbnail == 0}col-md-6 {else} col-md-6 {/if}">
          <h1 class="h1 namne_details">{$product.name}</h1>
		   <p class="reference">{l s='Reference' d='Shop.Theme.Catalog'}: {$product.reference}</p>
		  {hook h='DisplayReviewsProduct'}
          {block name='product_prices'}
            {include file='catalog/_partials/product-prices.tpl'}
          {/block}
		  <div class="product-information">
          {block name='product_description_short'}
            <div id="product-description-short"  class="product-description-short" itemprop="description">{$product.description_short nofilter}</div>
          {/block}
          {block name='product_buy'}
            <div class="product-actions">
              <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                <input type="hidden" name="token" value="{$static_token}">
                <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id">
                {block name='product_variants'}
                  {include file='catalog/_partials/product-variants.tpl'}
                {/block}

                {block name='product_add_to_cart'}
                  {include file='catalog/_partials/product-add-to-cart.tpl'}
                {/block}

                {* Input to refresh product HTML removed, block kept for compatibility with themes *}
                {block name='product_refresh'}{/block}
            </form>
          </div>
        {/block}
		 {hook h='displayProductAdditionalInfo' product=$product}
        </div>
        </div>
      </div>
     </div>
   
   </div>
 </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	 $('.images-quickviews .quickviews-for').slick({
	   slidesToShow: 1,
	   slidesToScroll: 1,
	   focusOnSelect: true,
	   infinite: true,
	   arrows: false, 
	   fade: true,
	   lazyLoad: 'ondemand',
	   asNavFor: '.quickviews-nav'
	 });
	 if ({$postheme.product_thumbnail} == 0) {
	 $('.images-quickviews .quickviews-nav').slick({
	   slidesToShow: 4,
	   slidesToScroll: 1,
	   asNavFor: '.quickviews-for', 
	   dots: false, 
	   arrows: true, 
	   lazyLoad: 'ondemand',
	   focusOnSelect: true
	 });
	 }else {
	  $('.images-quickviews .quickviews-nav').slick({
	   slidesToShow: 4,
	   vertical:true,
	   slidesToScroll: 1,
	   asNavFor: '.quickviews-for', 
	   dots: false, 
	   arrows: true, 
	   lazyLoad: 'ondemand',
	   focusOnSelect: true
	 });
	}
	$('.modal').on('shown.bs.modal', function (e) {
		$('.images-quickviews .slick-slider').slick("setPosition", 0);
		$('.images-quickviews .slick-slider').slick("setPosition", 0); 
	}); 
	 $( '.images-quickviews img' ).load(function() {
		$('.images-quickviews .quickviews-for').slick("setPosition", 0);
		$('.images-quickviews .quickviews-nav').slick("setPosition", 0);   
	});  
});
</script>