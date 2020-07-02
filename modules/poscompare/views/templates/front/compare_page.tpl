{extends file='page.tpl'}
{block name='page_content'}
    <h1 class="h1 page-title"><span>{l s='Products compare' mod='poscompare'}</span></h1>
    {if isset($compareProducts) && $compareProducts}
        <div id="poscompare-table">
            <div class="poscompare-table-container">
                <div class="table table-hover">
  
                    <div class="poscompare-product-tr">
						<div class="poscompare-table-actions feature-name poscompare-product-td">
							<a href="#" class="js-poscompare-remove-all poscompare-remove-all"
							   data-url="{url entity='module' name='poscompare' controller='actions'}">
								{l s='Remove all products' mod='poscompare'}
							</a>
						</div>
  
                        {foreach from=$compareProducts item="compareProduct"}
                            <div class="poscompare-product-td js-poscompare-product-{$compareProduct.id_product}">
                                {include 'module:poscompare/views/templates/front/product.tpl' product=$compareProduct}
                            </div>
                        {/foreach}
                    </div>
                    {if $orderedFeatures}
                        {foreach from=$orderedFeatures item=feature}
                            <div class="poscompare-product-tr poscompare-product-row">
                                {cycle values='comparison_feature_odd,comparison_feature_even' assign='classname'}
                                <div class="{$classname} feature-name poscompare-product-td">
                                    {$feature.name}
                                </div>
                                {foreach from=$compareProducts item="product"}

                                    {assign var='product_id' value=$product.id_product}
                                    {assign var='feature_id' value=$feature.id_feature}

                                    {if isset($listFeatures[$product_id])}
                                        {assign var='tab' value=$listFeatures[$product_id]}
                                        <div class="{$classname} poscompare-feature-td poscompare-product-td js-poscompare-product-{$product.id_product}">
                                            {if (isset($tab[$feature_id]))}
                                                {foreach from=$tab[$feature_id] item=tabfeature}
                                                    {$tabfeature|escape:'htmlall'|nl2br nofilter}
                                                {/foreach}
                                                {/if}
                                        </div>
                                    {else}
                                        <div class="{$classname} poscompare-feature-td js-poscompare-product-{$product.id_product} poscompare-product-td">
                                            ---
                                        </div>
                                    {/if}

                                {/foreach}
                            </div>
                        {/foreach}
                    {else}
                        <div>
                            <div colspan="{$compareProducts|@count}">{l s='No features to compare.' mod='poscompare'}</div>
                        </div>
                    {/if}

                </div>
            </div>
        </div>
        <p class="alert alert-warning hidden-xs-up"
           id="poscompare-warning">{l s='There is no products to compare.' mod='poscompare'}</p>
    {else}
        <p class="alert alert-warning">{l s='There is no products to compare.' mod='poscompare'}</p>
    {/if}
{/block}


