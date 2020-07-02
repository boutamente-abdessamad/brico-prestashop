{if $productCate }
	<div class='imgSpinner'> </div>	
	<div class="content_item row">
	
		<div class="counts-item col-xs-12 col-md-6 col-lg-8">
			<div class="productTabCategorySlider owl-carousel">
				{$j=0}							
				{foreach from=$productCate item=product name=myLoop}
				{if $j >= 1}	
					{if ($smarty.foreach.myLoop.index-1) % $rows == 0 || $smarty.foreach.myLoop.first }
						<div class="item-product">
					{/if}
						{include file="catalog/_partials/miniatures/product.tpl" product=$product}
						
					{if ($smarty.foreach.myLoop.iteration-1) % $rows == 0 || $smarty.foreach.myLoop.last  }
						</div>
					{/if}
				{/if}	
				{$j = $j+1}  
				{/foreach}
			</div>
		</div>
		<div class="first-item col-xs-12 col-md-6 col-lg-4">
			{$j=0}
			{foreach from=$productCate item=product name=myLoop}	
				<div class="item-product">									
					<article class="style_product_default product-miniature js-product-miniature item_in" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
					<div class="img_block">
					  {block name='product_thumbnail'}
			
							<div class="slider-for">
							 {foreach from=$product.images item=image}
							 <div class="thumb-item">
							 <a href="{$product.url}" class="thumbnail product-thumbnail"> 
							   <img class="" style="width:100%;" src="{$image.bySize.large_default.url}" alt="{$image.legend}" title="{$image.legend}" itemprop="image">
							  </a>
							   </div>
							 {/foreach}
							</div>					
					  {/block}
						<ul class="add-to-links">
							
							<li>
								{hook h='displayProductListFunctionalButtons' product=$product}
							</li>
							<li class="compare">	
								 <a href="#" class="poscompare-add compare-button js-poscompare-add"  data-id_product="{$product.id_product|intval}" onclick="posCompare.addCompare($(this),{$product.id_product|intval}); return false;" title="{l s='Add to compare' d='Shop.Theme.Actions'}">{l s='Add to compare' d='Shop.Theme.Actions'}</a>
							</li>
							<li class="quick-view">
								{block name='quick_view'}
								<a class="quick_view" href="#" data-link-action="quickview" title="{l s='Quick view' d='Shop.Theme.Actions'}">
								 {l s='Quick view' d='Shop.Theme.Actions'}
								</a>
								{/block}
							</li>
						</ul> 
						{block name='product_price_and_shipping'}
						  {if $product.show_price}
							<div class="product-price-and-shipping-top">
							  {if $product.has_discount}
								{if $product.discount_type === 'percentage'}
								  <span class="discount-percentage discount-product">{$product.discount_percentage}</span>
								{elseif $product.discount_type === 'amount'}
								  <span class="discount-amount discount-product">{$product.discount_amount_to_display}</span>
								{/if}
							  {/if}
							</div>
						  {/if}
						{/block}
						{block name='product_flags'}
						<ul class="product-flag">
						{foreach from=$product.flags item=flag}
							<li class="{$flag.type}"><span>{$flag.label}</span></li>
						{/foreach}
						</ul>
						{/block}
					</div>
					<div class="product_desc">
						<ul class="thumb_cate slider-nav">
							{foreach from=$product.images item=image}
							  <div class="thumb-container">
								<div>
								<img
								  class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
								  src="{$image.bySize.home_default.url}"
								  alt="{$image.legend}"
								  title="{$image.legend}"
								  width="100%"
								  itemprop="image"
								>
								</div>
							  </div>
							{/foreach}
						</ul>
						{block name='product_name'}
						  <h3 itemprop="name"><a href="{$product.url}" class="product_name {if $postheme.name_length ==0 }one_line{/if}" title="{$product.name}">{$product.name|truncate:50:'...'}</a></h3> 
						{/block}
						{block name='product_reviews'}
							<div class="hook-reviews">
							{hook h='displayProductListReviews' product=$product}
							</div>
						{/block} 
						{block name='product_price_and_shipping'}
						  {if $product.show_price}
							<div class="product-price-and-shipping">
							  {if $product.has_discount}
								{hook h='displayProductPriceBlock' product=$product type="old_price"}

								<span class="sr-only">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
								<span class="regular-price">{$product.regular_price}</span>
							  {/if}

							  {hook h='displayProductPriceBlock' product=$product type="before_price"}

							  <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
							  <span itemprop="price" class="price {if $product.has_discount}price-sale{/if}">{$product.price}</span>
							  {hook h='displayProductPriceBlock' product=$product type='unit_price'}

							  {hook h='displayProductPriceBlock' product=$product type='weight'}
							</div>
						  {/if}
						{/block}
						<div class="cart">
							{include file='catalog/_partials/customize/button-cart.tpl' product=$product}
						</div>
						{block name='product_description_short'}
							<div class="product-desc" itemprop="description">{$product.description_short nofilter}</div>
						{/block}
					
						{block name='product_variants'}
						{if $product.main_variants}
						{include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
						{/if}
						{/block}
					
					</div>
				</article>
				</div>				
			{$j = $j+1}  
			{if $j == 1}     {break}  {/if}
			{/foreach}
		
		</div> 
	</div> 
{/if}
<script>
	var tabcateSlide = $(".tab-category-container-slider .productTabCategorySlider");
	var $tabcateSlideConf = $('.tab-category-container-slider');
	var items       = parseInt($tabcateSlideConf.attr('data-items'));
	var speed     	= parseInt($tabcateSlideConf.attr('data-speed'));
	var autoPlay    = parseInt($tabcateSlideConf.attr('data-autoplay'));
	var time    	= parseInt($tabcateSlideConf.attr('data-time'));
	var arrow       = parseInt($tabcateSlideConf.attr('data-arrow'));
	var pagination  = parseInt($tabcateSlideConf.attr('data-pagination'));
	var move        = parseInt($tabcateSlideConf.attr('data-move'));
	var pausehover  = parseInt($tabcateSlideConf.attr('data-pausehover'));
	var lg          = parseInt($tabcateSlideConf.attr('data-lg'));
	var md          = parseInt($tabcateSlideConf.attr('data-md'));
	var sm          = parseInt($tabcateSlideConf.attr('data-sm'));
	var xs          = parseInt($tabcateSlideConf.attr('data-xs'));
	var xxs         = parseInt($tabcateSlideConf.attr('data-xxs'));
	
	if(autoPlay==1) {
		if(time){
			autoPlay = time;
		}else{
			autoPlay = '3000';
		}
	}else{
		autoPlay = false;
	}
	if(pausehover){ pausehover = true }else{ pausehover=false }
	if(move){ move = false }else{ move=true }
	if(arrow){ arrow =true }else{ arrow=false }
	if(pagination==1){ pagination = true }else{ pagination=false }
	tabcateSlide.owlCarousel({
		autoplay : autoPlay ,
		smartSpeed: speed,
		autoplayHoverPause: pausehover,
		addClassActive: true,
		scrollPerPage: move,
		nav : arrow,
		dots : pagination,
		responsiveClass:true,		
		responsive:{
			0:{
				items:xxs,
			},
			360:{
				items:xs,
			},	
			576:{
				items:sm,
			},
			768:{
				items:md,
			},
			992:{
				items:lg,
			},
			1200:{
				items:items,
			}
		}
	});
	checkClasses();
    tabcateSlide.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
        tabcateSlide.each(function(){
        	var total = $(this).find('.owl-stage .owl-item.active').length;
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
</script>	
<script type="text/javascript">
	$(document).ready(function() {
	$('.tab-category-container-slider .img_block .slider-for').slick({
	   slidesToShow: 1,
	   slidesToScroll: 1,
	   focusOnSelect: true,
	   arrows: true, 
	   fade: true,
	   infinite: true,
	   lazyLoad: 'ondemand',
	   asNavFor: '.slider-nav'
	 });

	 $('.tab-category-container-slider .product_desc .slider-nav').slick({ 
	   slidesToShow: 4,
	   slidesToScroll: 1,
	   asNavFor: '.slider-for',
	   dots: false, 
	   arrows: true, 
	   infinite: true,
	   focusOnSelect: true 
	});
	 $( '.tab-category-container-slider img' ).load(function() {
		$('.tab-category-container-slider .img_block .slider-for').slick("setPosition", 0);
		$('.tab-category-container-slider .product_desc .slider-nav').slick("setPosition", 0);   
	});  
});
</script>