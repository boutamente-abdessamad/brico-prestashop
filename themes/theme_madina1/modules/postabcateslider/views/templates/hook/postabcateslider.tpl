<script type="text/javascript">
var baseDir ='{$content_dir}';
</script> 
<div class="tab-category-container-slider"  
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
	<div class="tab-category">
		<div class="pos_title">
			{if $title}
			<h2>
				<span>{$title}</span>
			</h2>	
			{/if}
			{if $desc}
			<div class="desc_title">{$desc}</div>
			{/if}
			<ul class="tab_cates  hidden-md-down"> 
			{$count=0}
			{foreach from=$productCates item=productCate name=postabcateslider}
					<li data-title="tabtitle_{$productCate.id}" data-cate_id ="{$productCate.id}" rel="tab_{$productCate.id}" {if $count==0} class="active"  {/if} > 
					<span>{$productCate.name}</span>
					</li>
					{$count= $count+1}
			{/foreach}	
			</ul>
			<div class="cate_mobile btn-group hidden-lg-up">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						
				  </button>
				  <ul class="tab_cates dropdown-menu">
				{foreach from=$productCates item=productCate name=postabcateslider}
					<li data-title="tabtitle_{$productCate.id}" data-cate_id ="{$productCate.id}" rel="tab_{$productCate.id}" {if $count==0} class="active"  {/if} > 
					<span>{$productCate.name}</span>
					</li>
					{$count= $count+1}
				{/foreach}
				  </ul>
			</div>
		</div>
		
		
		<div class="row pos_content pos_content_product_cate">	

		</div>
	</div>	
</div>	

