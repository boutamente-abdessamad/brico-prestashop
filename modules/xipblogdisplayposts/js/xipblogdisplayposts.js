jQuery(document).ready(function($) {  
	var blog = $(".blog_slider");
		blog.owlCarousel({
		autoPlay : true ,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		nav: true,
		dots : false,	
		responsive:{
			0:{
				items:1,
			},
			360:{
				items:1,
			},	
			576:{
				items:1,
			},
			768:{
				items:1, 
			},
			992:{
				items:2,
			},
			1200:{
				items:2,
			}
		}
	}); 
});