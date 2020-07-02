{if isset($rotator_img)}
    {foreach from=$rotator_img item=image name=thumbnails}
		  {assign var=imageIds value="`$product.id_product`-`$image.id_image`"}
          <img class="img-responsive second-image {$class_name}" 
		  {if isset($imagesize)}
			src="{$link->getImageLink($product.link_rewrite, $imageIds, $imagesize)|escape:'html':'UTF-8'}" 
		  {else}
			src="{$link->getImageLink($product.link_rewrite, $imageIds, 'home_default')|escape:'html':'UTF-8'}" 
		  {/if}
		  alt="" itemprop="image"  />
    {/foreach}
{/if}		