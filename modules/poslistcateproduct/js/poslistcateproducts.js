$(document).ready(function() {
		var $listcateSlideConf = $('.poslistcateproduct');
	// var count       = parseInt($listcateSlideConf.attr('data-c'));
	var items       = parseInt($listcateSlideConf.attr('data-items'));
	var speed     	= parseInt($listcateSlideConf.attr('data-speed'));
	var autoPlay    = parseInt($listcateSlideConf.attr('data-autoplay'));
	var time    	= parseInt($listcateSlideConf.attr('data-time'));
	var arrow       = parseInt($listcateSlideConf.attr('data-arrow'));
	var pagination  = parseInt($listcateSlideConf.attr('data-pagination'));
	var move        = parseInt($listcateSlideConf.attr('data-move'));
	var pausehover  = parseInt($listcateSlideConf.attr('data-pausehover'));
	var lg          = parseInt($listcateSlideConf.attr('data-lg'));
	var md          = parseInt($listcateSlideConf.attr('data-md'));
	var sm          = parseInt($listcateSlideConf.attr('data-sm'));
	var xs          = parseInt($listcateSlideConf.attr('data-xs'));
	var xxs         = parseInt($listcateSlideConf.attr('data-xxs'));
	if(autoPlay==1) {
		if(time){
			autoPlay = time;
		}else{
			autoPlay = '3000';
		}
	}else{
		autoPlay = false;
	}
	if(pausehover){pausehover = true}else{pausehover=false}
	if(move){move = false}else{move=true}
	if(arrow){arrow =true}else{arrow=false}
	if(pagination==1){pagination = true}else{pagination=false}
	var listcateSlide = $(".poslistcateproduct .listcateSlide");
	listcateSlide.owlCarousel({
		autoPlay : autoPlay ,
		smartSpeed: speed,
		autoplayHoverPause: pausehover,
		nav: arrow,
		dots : pagination,	
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
    listcateSlide.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
        $('.poslistcateproduct .listcateSlide').each(function(){
			var total = $(this).find('.owl-item.active').length;
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
 });
