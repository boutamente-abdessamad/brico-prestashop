{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<script type="text/javascript">
var wishlistProductsIds='';
var baseDir ='{$content_dir}';
var static_token='{$static_token}';
var isLogged ='{$isLogged}';
var loggin_required='{l s='You must be logged in to manage your wishlist.' mod='blockwishlist' js=1}';
var added_to_wishlist ='{l s='The product was successfully added to your wishlist.' mod='blockwishlist' js=1}';
var mywishlist_url='{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|escape:'quotes':'UTF-8'}';
{if isset($isLogged)&&$isLogged}
	var isLoggedWishlist=true;
{else}
	var isLoggedWishlist=false;
{/if}
</script>
<div id="_desktop_wishtlist">
	<div class="wishtlist_top">
	<a class="" href="{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|escape:'html':'UTF-8'}">
		<i class="icon-heart"></i><span class="txt_wishlist">{l s='Wishlist' mod='blockwishlist'}</span>(<span class="cart-wishlist-number">{$count_product}</span>)
	</a>
	</div>
</div>