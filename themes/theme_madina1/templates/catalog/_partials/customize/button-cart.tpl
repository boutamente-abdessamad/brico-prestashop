{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{if !$configuration.is_catalog}
{if ($product.quantity > 0 || $product.allow_oosp)}
<div class="product-add-to-cart">	
 <form action="{$urls.pages.cart}" method="post" class="add-to-cart-or-refresh">
   <input type="hidden" name="token" value="{$static_token}">
   <input type="hidden" name="id_product" value="{$product.id}" class="product_page_product_id">
   <input type="hidden" name="qty" value="{$product.minimal_quantity}">
   <button class="button ajax_add_to_cart_button add-to-cart btn-default" data-button-action="add-to-cart" type="submit" title="{l s='Add to cart' d='Shop.Theme.Actions'}" >
  		 <i class="fa fa-shopping-cart"></i> <span>{l s='Add to cart' d='Shop.Theme.Actions'}</span>
   </button>
 </form>
</div>
{else}
	<span class="ajax_add_to_cart_button disabled" title="{l s=' Out of stock ' d='Shop.Theme.Actions'}" ><i class="fa fa-shopping-cart"></i> <span>{l s='Add to cart' d='Shop.Theme.Actions'}</span></span>
{/if}
{/if} 