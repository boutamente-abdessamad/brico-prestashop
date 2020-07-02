$(document).ready(function() {
	var $specialSlideConf = $('.pos-special-products');
	var items       = parseInt($specialSlideConf.attr('data-items'));
	var speed     	= parseInt($specialSlideConf.attr('data-speed'));
	var autoPlay    = parseInt($specialSlideConf.attr('data-autoplay'));
	var time    	= parseInt($specialSlideConf.attr('data-time'));
	var arrow       = parseInt($specialSlideConf.attr('data-arrow'));
	var pagination  = parseInt($specialSlideConf.attr('data-pagination'));
	var move        = parseInt($specialSlideConf.attr('data-move'));
	var pausehover  = parseInt($specialSlideConf.attr('data-pausehover'));
	var lg          = parseInt($specialSlideConf.attr('data-lg'));
	var md          = parseInt($specialSlideConf.attr('data-md'));
	var sm          = parseInt($specialSlideConf.attr('data-sm'));
	var xs          = parseInt($specialSlideConf.attr('data-xs'));
	var xxs         = parseInt($specialSlideConf.attr('data-xxs'));
	
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

	var specialSlide = $(".pos-special-products .special-item");
	specialSlide.owlCarousel({
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
			480:{
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
    specialSlide.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
		var total = $('.pos-special-products .special-item .owl-stage .owl-item.active').length;
        $('.pos-special-products').each(function(){
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

