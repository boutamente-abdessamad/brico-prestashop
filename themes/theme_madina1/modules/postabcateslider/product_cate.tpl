{if $productCate }
	<div class='imgSpinner'> </div>	
		<div class="productTabCategorySlider owl-carousel">						
			{foreach from=$productCate item=product name=myLoop}	
				{if ($smarty.foreach.myLoop.index) % $rows == 0 || $smarty.foreach.myLoop.first }
					<div class="item-product">
				{/if}
					{include file="catalog/_partials/miniatures/product.tpl" product=$product}
					
				{if ($smarty.foreach.myLoop.iteration) % $rows == 0 || $smarty.foreach.myLoop.last  }
					</div>
				{/if}
			{/foreach}
		</div>
{/if}
<script>
	var tabcateSlide = $(".tab-category-container-slider .productTabCategorySlider");
	var $tabcateSlideConf = $('.tab-category-container-slider');
	var items       = parseInt($tabcateSlideConf.attr('data-items'));
	var speed     	= parseInt($tabcateSlideConf.attr('data-speed'));
	var autoPlay    = parseInt($tabcateSlideConf.attr('data-autoplay'));
	var time    	= parseInt($tabcateSlideConf.attr('data-time'));
	var arrow       = parseInt($tabcateSlideConf.attr('data-arrow'));
	var pagination  = parseInt($tabcateSlideConf.attr('data-pagination'));
	var move        = parseInt($tabcateSlideConf.attr('data-move'));
	var pausehover  = parseInt($tabcateSlideConf.attr('data-pausehover'));
	var lg          = parseInt($tabcateSlideConf.attr('data-lg'));
	var md          = parseInt($tabcateSlideConf.attr('data-md'));
	var sm          = parseInt($tabcateSlideConf.attr('data-sm'));
	var xs          = parseInt($tabcateSlideConf.attr('data-xs'));
	var xxs         = parseInt($tabcateSlideConf.attr('data-xxs'));
	
	if(autoPlay==1) {
		if(time){
			autoPlay = time;
		}else{
			autoPlay = '3000';
		}
	}else{
		autoPlay = false;
	}
	if(pausehover){ pausehover = true }else{ pausehover=false }
	if(move){ move = false }else{ move=true }
	if(arrow){ arrow =true }else{ arrow=false }
	if(pagination==1){ pagination = true }else{ pagination=false }
	tabcateSlide.owlCarousel({
		autoplay : autoPlay ,
		smartSpeed: speed,
		autoplayHoverPause: pausehover,
		addClassActive: true,
		scrollPerPage: move,
		nav : arrow,
		dots : pagination,
		responsiveClass:true,		
		responsive:{
			0:{
				items:xxs,
			},
			360:{
				items:xs,
			},	
			576:{
				items:sm,
			},
			768:{
				items:md,
			},
			992:{
				items:lg,
			},
			1200:{
				items:items,
			}
		}
	});
	checkClasses();
    tabcateSlide.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
        tabcateSlide.each(function(){
        	var total = $(this).find('.owl-stage .owl-item.active').length;
			$(this).find('.owl-item').removeClass('firstActiveItem');
			$(this).find('.owl-item').removeClass('lastActiveItem');
			$(this).find('.owl-item.active').each(function(index){
				if (index === 0) { $(this).addClass('firstActiveItem'); }
				if (index === total - 1 && total>1) {
					$(this).addClass('lastActiveItem'); 
				}
			}) 
        });
    }
	$(document).ready(function(){
		$('.pos_content').each(function(){ 
			var maxHeight = 0;
			var maxHeightname = 0;
			$(this).find('.js-product-miniature').each(function(){
				if ($(this).outerHeight() > maxHeight) { 
					 maxHeight = parseFloat($(this).outerHeight()) > maxHeight ? parseFloat($(this).outerHeight()) : maxHeight;  
				};
			});
			 $(this).find('.js-product-miniature').css('min-height', maxHeight);		
		});

	}); 
</script>	
