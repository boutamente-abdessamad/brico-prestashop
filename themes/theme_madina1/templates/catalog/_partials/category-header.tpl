{**
 * 2007-2018 PrestaShop.
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
<div id="js-product-list-header">
    {if $listing.pagination.items_shown_from == 1}
        <div class="block-category card card-block {if $category.image.large.url}category_img{/if}"> 
			{if $category.image.large.url}
                <div class="category-cover">
                    <img src="{$category.image.large.url}" alt="{if !empty($category.image.legend)}{$category.image.legend}{else}{$category.name}{/if}">
                </div>
            {/if}
			{if $category.description}
			<div class="block-desc">
				<h1 class="h1">{$category.name}</h1>
                <div id="category-description" class="text-muted">{$category.description nofilter}</div>       
			</div>
			 {/if}
           
		  
        </div>
    {/if} 
	
	{if $postheme.cate_show_subcategories == 1}
	{if isset($subcategories)}
        <!-- Subcategories -->
	<div id="subcategories">
		<h2 class="subcategory-heading">{l s='Subcategories' d='Shop.Theme.Catalog'}</h2>
		<ul class="clearfix subcategory-content">
			{foreach from=$subcategories item=subcategory}
				<li>
					<div class="subcategory-image">
						<a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">
						  
							{if $subcategory.image.large.url}
								<img class="replace-2x" src="{$subcategory.image.large.url}" alt="{$subcategory.name|escape:'html':'UTF-8'}"/>
								
							{/if} 
						</a>
						<h5><a class="subcategory-name" href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'}</a></h5>		
					</div>
								
				</li>
			{/foreach}
		</ul>
	</div>
    {/if}
	{/if}
</div>
