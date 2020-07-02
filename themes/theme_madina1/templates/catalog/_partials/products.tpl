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
<div id="js-product-list" data-cate="{$postheme.cate_product_per_row}" data-type="{$postheme.grid_type}" data-list="{$postheme.cate_default_display}">
   <div class="row product_content grid {if isset($smarty.cookies.show_list)}list {/if}">
    {foreach from=$listing.products item="product"}
      {block name='product_miniature'}
	  	<div class="item-product {if $postheme.cate_product_per_row == 1}product_per_3 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 {else if $postheme.cate_product_per_row == 2}product_per_4 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3{else if $postheme.cate_product_per_row == 3 }product_per_5 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3{/if}">
			{include file='catalog/_partials/miniatures/product.tpl' product=$product}
		</div>
      {/block}
    {/foreach}
  </div>
  {block name='pagination'}
    {include file='_partials/pagination.tpl' pagination=$listing.pagination}
  {/block}
</div>
