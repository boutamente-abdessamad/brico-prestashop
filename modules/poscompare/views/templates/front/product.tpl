<article class="poscompare-product ">
	<div class="pack-product-container">
		<div class="thumb-mask">
			{block name='product_thumbnail'}
			<a href="{$product.url}" class="thumbnail product-thumbnail">
			  <img class="first-image"
				src = "{$product.cover.bySize.home_default.url}"
				alt = "{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
				data-full-size-image-url = "{$product.cover.large.url}"
			  >
			   {hook h="rotatorImg" product=$product}	
			</a>
		  {/block}
		</div>
		<div class="desc-box">
			<a href="{$product.url}" class="product_name {if $postheme.name_length ==0 }one_line{/if}">{$product.name|truncate:45:'...'}</a>
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
		</div>			
	</div>
	<a href="#" class="js-poscompare-remove poscompare-remove" onclick="posCompare.removeCompare({$product.id_product|intval}); return false;">Remove</a>
</article>