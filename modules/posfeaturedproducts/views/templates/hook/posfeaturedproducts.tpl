
<div class="pos-featured-products" 
	data-items="{$slider_options.number_item}" 
	data-speed="{$slider_options.speed_slide}"
	data-autoplay="{$slider_options.auto_play}"
	data-time="{$slider_options.auto_time}"
	data-arrow="{$slider_options.show_arrow}"
	data-pagination="{$slider_options.show_pagination}"
	data-move="{$slider_options.move}"
	data-pausehover="{$slider_options.pausehover}"
	data-lg="{$slider_options.items_lg}"
	data-md="{$slider_options.items_md}"
	data-sm="{$slider_options.items_sm}"
	data-xs="{$slider_options.items_xs}"
	data-xxs="{$slider_options.items_xxs}">
		<div class="pos_title">	
			{if $title}
			 <h2>
				{$title}
			</h2>
			{/if}
			{if $desc}
			<div class="desc_title">		
				{$desc}		
			</div>
			{/if}	
		</div>
	
		{$rows= $slider_options.rows}

		<div class=" pos_content row">
			<div class="feature-item owl-carousel">
			{foreach from=$products item=product name=myLoop}
				{if $smarty.foreach.myLoop.index % $rows == 0 || $smarty.foreach.myLoop.first }
				<div class="item-product">
				{/if}
					{include file='catalog/_partials/miniatures/product.tpl' product=$product}
				{if $smarty.foreach.myLoop.iteration % $rows == 0 || $smarty.foreach.myLoop.last  }
				</div>
				{/if}
			{/foreach}
			</div>
		</div>


</div>
