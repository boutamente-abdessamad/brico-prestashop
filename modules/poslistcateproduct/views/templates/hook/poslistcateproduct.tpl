{$count=0}
{foreach from=$productCates item=productCate name=poslistcateproduct}
<div class="poslistcateproduct poslistcateproduct_{$count} product_container"
	data-items="{$slider_options.number_item}" 
	data-speed="{$slider_options.speed_slide}"
	data-autoplay="{$slider_options.auto_play}"
	data-time="{$slider_options.auto_time}"
	data-arrow="{$slider_options.show_arrow}"
	data-pagination="{$slider_options.show_pagination}"
	data-move="{$slider_options.move}"
	data-pausehover="{$slider_options.pausehover}"
	data-lg="{$slider_options.items_lg}"	data-md="{$slider_options.items_md}"
	data-sm="{$slider_options.items_sm}"
	data-xs="{$slider_options.items_xs}"
	data-xxs="{$slider_options.items_xxs}">
		<div class="pos_title">
			<h2>
				<span>{$productCate.category_name}</span>
			</h2>
			{if $productCate.list_subcategories}
			<ul class="subcategories-list hidden-md-down">
				{foreach from=$productCate.list_subcategories item=subcategories}
				<li><a href="{$link->getCategoryLink($subcategories['id_category'])}" target="_blank">{$subcategories.name}</a></li>
				{/foreach}
			</ul>
			<div class="btn-group hidden-lg-up">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">list</i>
				  </button>
				  <ul class="dropdown-menu">
				{foreach from=$productCate.list_subcategories item=subcategories}
					<li><a href="{$link->getCategoryLink($subcategories['id_category'])}" target="_blank">{$subcategories.name}</a><li>
				{/foreach}
				  </ul>
			</div>
			{/if}
		</div>
		<div class="row">	
			<div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
				{if $productCate.image}
					<div class="banner-box">
						{if $productCate.url}<a href="{$productCate.url}">{/if}<img src="{$link->getMediaLink("`$smarty.const._MODULE_DIR_`poslistcateproduct/images/`$productCate.image|escape:'htmlall':'UTF-8'`")}" alt="" />{if $productCate.url}</a>{/if}
					</div>
				{/if}
			</div> 
			<div class="col-xs-12 col-md-6 col-lg-8 col-xl-9">
				<div class="listcateproduct-products">	
					<div class="row pos_content">	
						<div class="listcateSlide owl-carousel">
							{foreach from=$productCate.product item=product name=myLoop}					
								{if $smarty.foreach.myLoop.index % $slider_options.rows == 0 || $smarty.foreach.myLoop.first }
								<div class="item-product">
								{/if}
									<article class="style_product_default product-miniature js-product-miniature item_in" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
										<div class="img_block">
										  {block name='product_thumbnail'}
											<a href="{$product.url}" class="thumbnail product-thumbnail">
											  <img class="first-image "
											  src="{$product.cover.bySize.home_default.url}" 
												alt = "{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
												data-full-size-image-url = "{$product.cover.large.url}"
											  >
											   {hook h="rotatorImg" product=$product}	
											</a>
										  {/block}
											
										</div>
										<div class="product_desc">
											{if isset($product.id_manufacturer)}
											 <div class="manufacturer"><a href="{url entity='manufacturer' id=$product.id_manufacturer }">{Manufacturer::getnamebyid($product.id_manufacturer)}</a></div>
											{/if}
											{block name='product_reviews'}
												<div class="hook-reviews">
												{hook h='displayProductListReviews' product=$product}
												</div>
											{/block} 
											{block name='product_name'}
											  <h3 itemprop="name"><a href="{$product.url}" class="product_name {if $postheme.name_length ==0 }one_line{/if}" title="{$product.name}">{$product.name|truncate:50:'...'}</a></h3> 
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
																	
										</div>
									</article>
								{if $smarty.foreach.myLoop.iteration %  $slider_options.rows == 0 || $smarty.foreach.myLoop.last}
									</div>
								{/if}	
							{/foreach}
						</div>
					</div>
				</div>
			</div>
		</div> 		{if $productCate.description}
			{$productCate.description nofilter}
		{/if}

</div>
{$count= $count+1}
{/foreach}
