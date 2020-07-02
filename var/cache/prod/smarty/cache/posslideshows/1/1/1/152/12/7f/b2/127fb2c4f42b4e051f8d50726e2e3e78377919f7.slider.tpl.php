<?php
/* Smarty version 3.1.33, created on 2020-06-30 00:11:48
  from 'C:\wamp64\www\prestashop\modules\posslideshows\views\templates\hook\slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa7534e44a35_47913775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd452386043df1e2502d7fb418ee25a0b7e22d122' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\posslideshows\\views\\templates\\hook\\slider.tpl',
      1 => 1593472238,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_5efa7534e44a35_47913775 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="slideshow_container" data-speed="600" data-time="6000" data-nav="false" data-pag="true" data-pausehover="hover">
	<div class="pos-slideshow">
		<div class="flexslider ma-nivoslider">
			<div class="pos-loading"><span></span><img src="http://localhost:81/prestashop/modules/posslideshows/images/sample-1.jpg" alt="" /></div>
			<div id="pos-slideshow-home" class="slides">
				
													<a href="http://www.posthemes.com" title="slide show1" ><img style="display:none" src="http://localhost:81/prestashop/modules/posslideshows/images/sample-1.jpg"  data-thumb="http://localhost:81/prestashop/modules/posslideshows/images/sample-1.jpg"  alt="" title="#htmlcaption1"  /> </a>
			   					<a href="http://www.posthemes.com" title="slide show2" ><img style="display:none" src="http://localhost:81/prestashop/modules/posslideshows/images/sample-2.jpg"  data-thumb="http://localhost:81/prestashop/modules/posslideshows/images/sample-2.jpg"  alt="" title="#htmlcaption2"  /> </a>
			   			</div>
																<div id="htmlcaption1" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst 6000ms ease-in-out;
								-moz-animation: myfirst 6000ms ease-in-out;
								-ms-animation: myfirst 6000ms ease-in-out;
								animation: myfirst 6000ms ease-in-out;
							
							">
							</div>
																																				<div class="banner7-des">
								<div class="container">
									<div class="desc_slideshow desc_slideshow_0 position_left">
									<div class="info">
																																																																	
																							<h2 data-animation="animated fadeInDown " class="transition_slide_0">Arlo Pro 2</h2>
																				
																																																																		
																							<h2 data-animation="animated fadeInLeft " class="transition_slide_1">Wi-Fi Camera</h2>
																				
																																																																		
																							<p data-animation="animated fadeInRight " class="transition_slide_2">Fist Choise for Security Pofessionals.</p>
																				
																																																																		
																							<a href="http://www.posthemes.com" data-animation="animated zoomIn" class="readmore transition_slide_3">Shop Now</a>
																				
																														</div>
									</div>
								</div> 
							</div>
												</div>
									 					<div id="htmlcaption2" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst 6000ms ease-in-out;
								-moz-animation: myfirst 6000ms ease-in-out;
								-ms-animation: myfirst 6000ms ease-in-out;
								animation: myfirst 6000ms ease-in-out;
							
							">
							</div>
																																				<div class="banner7-des">
								<div class="container">
									<div class="desc_slideshow desc_slideshow_1 position_left">
									<div class="info">
																																																																	
																							<h2 data-animation="animated fadeInLeft " class="transition_slide_0">Pre-Order</h2>
																				
																																																																		
																							<h2 data-animation="animated fadeInRight " class="transition_slide_1">Exclusive Watch</h2>
																				
																																																																		
																							<p data-animation="animated fadeInUp " class="transition_slide_2">Free Galaxy Watch Strap worth RM109</p>
																				
																																																																		
																							<a href="http://www.posthemes.com" data-animation="animated zoomIn" class="readmore transition_slide_3">Shop Now</a>
																				
																														</div>
									</div>
								</div> 
							</div>
												</div>
									 			 		</div>
	</div>
</div>

 <script type="text/javascript">
 $(document).ready(function() {
	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	//Variables on page load 
	var $myCarousel = $('.ma-nivoslider'),
		$firstAnimatingElems = $myCarousel.find('.nivo-caption').find("[data-animation ^= 'animated']");
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);

});
</script><?php }
}
