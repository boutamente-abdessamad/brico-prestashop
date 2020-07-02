<div id="_desktop_cart_block">
	<div class="blockcart cart-preview" data-refresh-url="{$refresh_url}" data-cartitems="{$cart.products_count}">
		<div class="button_cart">
			<a rel="nofollow" href="{$cart_url}" class="desktop hidden-md-down">
				 <i class="icon-bag"></i> 
				 <span class="item_total">{$cart.totals.total.value}</span>
				 <span class="item_count">{$cart.products_count}</span>
			</a>
			<a rel="nofollow" href="{$cart_url}" class="mobile hidden-lg-up">
				<i class="icon-bag"></i> 
				<span class="item_count">{$cart.products_count}</span>
			</a>
		</div>
		<div class="popup_cart">
			<div class="content-cart">
				<div class="mini_cart_arrow"></div>
				<ul>
				  {foreach from=$cart.products item=product}
					<li>{include 'module:ps_shoppingcart/ps_shoppingcart-product-line.tpl' product=$product}</li>
				  {/foreach}
				</ul>
				<div class="price_content">
					<div class="cart-subtotals">
					  {foreach from=$cart.subtotals item="subtotal"}
						<div class="{$subtotal.type} price_inline">
						  <span class="label">{$subtotal.label}</span>
						  <span class="value">{$subtotal.value}</span>
						</div>
					  {/foreach}
					</div>
					<div class="cart-total price_inline">
					  <span class="label">{$cart.totals.total.label}</span>
					  <span class="value">{$cart.totals.total.value}</span>
					</div>
				</div>
				<div class="checkout">
					<a href="{$cart_url}" class="btn btn-primary">{l s='Checkout' d='Shop.Theme.Actions'}</a> 
				</div>
			</div>
		</div>
	</div>
</div>
