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
{block name='header_banner'}
<div class="header-banner">
	{hook h='displayBanner'}
</div>
{/block}

{block name='header_nav'}
<nav class="header-nav">
	<div class="container"> 
		<div class="hidden-md-down">
			{hook h='displayNav'}
		</div>
		<div class="hidden-lg-up  mobile">
			<div class="row row-mobile">
				<div class="col-mobile col-md-4 col-xs-4">
					<div class="float-xs-left" id="menu-icon">
						<i class="icon-menu"></i>
					</div>
					<div id="mobile_top_menu_wrapper" class="row hidden-lg-up" style="display:none;">
						<div class="top-header-mobile">
							<div id="_mobile_social"></div>							
							<div id="_mobile_compare"></div>
							<div id="_mobile_wishtlist"></div>
						</div>
						<div id="_mobile_currency_selector"></div>
						<div id="_mobile_language_selector"></div>				
						<div class="menu-close"> 
							{l s='menu' d='Shop.Theme.Global'} <i class="material-icons float-xs-right">arrow_back</i>
						</div>
						<div class="menu-tabs">							
							<div class="js-top-menu-bottom">												
								<div id="_mobile_megamenu"></div>
								<div id="_mobile_vegamenu"></div>
							</div>
							
						</div>
					 </div>
				</div>
				<div class="col-mobile col-md-4 col-xs-4">
					<div class="top-logo" id="_mobile_logo"></div>
				</div>
				<div class="col-mobile col-md-4 col-xs-4">				
					<div id="_mobile_cart_block"></div>
					<div id="_mobile_user_info"></div>
				</div>
			</div>
			<div id="_mobile_search_category"></div>
		</div>
	</div>
</nav>
{/block}

{block name='header_top'}
<div class="header-top hidden-md-down">
	<div class="container">
		<div class="row no-gutters">
			<div class="col col-left col-lg-3" id="_desktop_logo">
				{if $page.page_name == 'index'}
				<a href="{$urls.base_url}">
				<img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
				</a>
				{else}
				<a href="{$urls.base_url}">
				<img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
				</a>
				{/if}
			</div>
			<div class=" col col-right col-lg-9 col-sm-12 position-static">					
				{hook h='displaySearchTop'}		
				{hook h='displayTop'}			
			</div>
			
			
		</div>
	</div>

</div>
<div class="header-bottom hidden-md-down">
	<div class="container">
		<div class="row no-gutters">
			<div class="col col-left col-lg-3">
				{hook h='displayvegamenu'}
			</div>
			<div class=" col col-right col-lg-9 col-sm-12 position-static">	
				{hook h='displaymegamenu'}		
			</div>
			
		</div>
	</div>

</div>
{hook h='displayNavFullWidth'}
{/block}

