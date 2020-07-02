$(document).ready(function() {
	var $featuredSlideConf = $('.pos-featured-products');
	var items       = parseInt($featuredSlideConf.attr('data-items'));
	var speed     	= parseInt($featuredSlideConf.attr('data-speed'));
	var autoPlay    = parseInt($featuredSlideConf.attr('data-autoplay'));
	var time    	= parseInt($featuredSlideConf.attr('data-time'));
	var arrow       = parseInt($featuredSlideConf.attr('data-arrow'));
	var pagination  = parseInt($featuredSlideConf.attr('data-pagination'));
	var move        = parseInt($featuredSlideConf.attr('data-move'));
	var pausehover  = parseInt($featuredSlideConf.attr('data-pausehover'));
	var lg          = parseInt($featuredSlideConf.attr('data-lg'));
	var md          = parseInt($featuredSlideConf.attr('data-md'));
	var sm          = parseInt($featuredSlideConf.attr('data-sm'));
	var xs          = parseInt($featuredSlideConf.attr('data-xs'));
	var xxs         = parseInt($featuredSlideConf.attr('data-xxs'));
	
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

	var featuredSlide = $(".pos-featured-products .feature-item");
	featuredSlide.owlCarousel({
		autoplay : autoPlay ,
		smartSpeed: speed,
		autoplayHoverPause: pausehover,
		scrollPerPage: move,
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
    featuredSlide.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
		var total = $('.pos-featured-products .feature-item .owl-stage .owl-item.active').length;
        $('.pos-featured-products ').each(function(){
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

