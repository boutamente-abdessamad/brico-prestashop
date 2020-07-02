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
<div id="_desktop_user_info">
	<div class="user-info-block selector-block">
		<div class="currency-selector localiz_block dropdown js-dropdown">
			<button data-target="#" data-toggle="dropdown" class=" btn-unstyle hidden-md-down">
			  <span class="expand-more"><i class="icon-user"></i>{l s='Setting' d='Shop.Theme.Customeraccount'}</span>
			  <i class="material-icons">expand_more</i>
			</button>
			<button data-target="#" data-toggle="dropdown" class=" btn-unstyle hidden-lg-up">
				<i class="icon-user"></i>
			</button>
			<ul class="dropdown-menu">
			<li>
				<a href="{$my_account_url}" rel="nofollow" class="dropdown-item">{l s='My account' d='Shop.Theme.Customeraccount'}</a>
			</li>
			<li>
			<li>
				<a href="{$link->getPageLink('cart', true)|escape:'html':'UTF-8'}?action=show" class="dropdown-item" >{l s='Checkout' d='Shop.Theme.Actions'}</a>
			</li>
			<li>
				{if $logged}
				  <a
					class="logout dropdown-item"
					href="{$logout_url}"
					rel="nofollow"
				  >
					{l s='Sign out' d='Shop.Theme.Actions'}
				  </a>

				{else}
				  <a
					href="{$my_account_url}"
					title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}"
					rel="nofollow" class="dropdown-item"
				  >
					<span>{l s='Sign in' d='Shop.Theme.Actions'}</span>
				  </a>
			  </li>
			{/if}
			</ul>
		</div>
	</div>
	
</div>
