jQuery(document).ready(function ($) {
		$(document).off('mouseenter').on('mouseenter', '.pos-slideshow', function(e){
		$('.pos-slideshow .timethai').addClass('pos_hover');
		});

		 $(document).off('mouseleave').on('mouseleave', '.pos-slideshow', function(e){
		   $('.pos-slideshow .timethai').removeClass('pos_hover');
		 });
		var $slideShowConf = $('.slideshow_container');
		var speed       = parseInt($slideShowConf.attr('data-speed'));
		if(!speed) speed = 600;
		var time        = parseInt($slideShowConf.attr('data-time'));
		if(!time) time = 3000;
		var nav     	= $slideShowConf.attr('data-nav');
		var pag         = $slideShowConf.attr('data-pag'); 
		var pausehover  = parseInt($slideShowConf.attr('data-pausehover'));  
		if(nav == 'true'){
			nav = true;
		}else{
			nav = false;
		}
		if(pag == 'true'){
			pag = true;
		}else{
			pag = false;
		}
 
        $('#pos-slideshow-home').nivoSlider({
			effect: 'random',
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			animSpeed: speed,
			pauseTime: time,
			startSlide: 0,
			directionNav: nav,
			controlNav: pag,
			controlNavThumbs: false,
			pauseOnHover: pausehover,
			manualAdvance: false,
			prevText: '<i class="icon-chevron-thin-left"></i>',
			nextText: '<i class="icon-chevron-thin-right"></i>',
                        afterLoad: function(){
                         $('.pos-loading').css("display","none");
                        },     
                        beforeChange: function(){ 
                            $('.bannerSlideshow1').removeClass("pos_in"); 
                            $('.bannerSlideshow2').removeClass("pos_in"); 
                            $('.bannerSlideshow3').removeClass("pos_in"); 
                        }, 
                        afterChange: function(){ 
                             $('.bannerSlideshow1').addClass("pos_in"); 
                            $('.bannerSlideshow2').addClass("pos_in"); 
                            $('.bannerSlideshow3').addClass("pos_in"); 
                        }
 		});
    });