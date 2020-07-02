<div class="img_content">
	<img class="product-image img-responsive" src = "{$product.cover.bySize.small_default.url}" alt="{$product.cover.legend}" title="{$product.cover.legend}">
	<span class="product-quantity">{$product.quantity}x</span>
</div>
<div class="right_block">
	<span class="product-name">{$product.name}</span>
	<span class="product-price">{$product.price}</span>
	<a class = "remove-from-cart" rel = "nofollow" href= "{$product.remove_from_cart_url}" data-link-action= "delete-from-cart" data-id-product= "{$product.id_product|escape:'javascript'}"
data-id-product-attribute= "{$product.id_product_attribute|escape:'javascript'}" data-id-customization= "{$product.id_customization|escape:'javascript'}">
            {if !isset($product.is_gift) || !$product.is_gift}
			<i class="icon-x pull-xs-left"></i>
            {/if}
          </a>
	<div class="attributes_content">
		{foreach from=$product.attributes item="property_value" key="property"}
		  <span><strong>{$property}</strong>: {$property_value}</span><br>
		{/foreach}
	</div>
</div>