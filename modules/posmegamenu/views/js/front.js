/**
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also avaiposle through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2015 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/

$(document).ready(function()
{	
	if($('#header').length > 0){
		var headerSpaceH = $('#header').outerHeight(true);
		$('#header').after('<div class="headerSpace unvisible" style="height: '+headerSpaceH+'px;" ></div>');
	}
	if ($(window).width() >= 992)
	{	
		var currentP = 0;
		var headerSpaceH = $('#header').outerHeight(true);
		$('.headerSpace').css('height',headerSpaceH);
		$(window).scroll(function() {    
	
			var scroll = $(window).scrollTop();
			if(scroll != currentP){
			if (scroll >= headerSpaceH) {
			    $(".use-sticky").parents("#header").find(".header-top").addClass("scroll-menu");
				$(".use-sticky").parents("#header").find(".header-top").addClass(" animated fadeInDown");
			    $('.headerSpace').removeClass('unvisible'); 
			}else{
			    $(".use-sticky").parents("#header").find(".header-top").removeClass("scroll-menu");
			    $(".use-sticky").parents("#header").find(".header-top").removeClass("animated fadeInDown");
			    $('.headerSpace').addClass('unvisible'); 
			}
			}
			currentP = $(window).scrollTop();
		   
		});		
	}
	activeMobile();
	$(window).resize(function(){
		if($(window).width() < 992)
		{
			$('.pos-menu-horizontal').addClass('pos-mobile-menu');
			$('#_mobile_megamenu img').parent('a').addClass("img_banner"); 
		}
		else
		{
			$('.pos-menu-horizontal').removeClass('pos-mobile-menu');
			$('.pos-menu-horizontal .menu-dropdown').show(); 		
		}
		if($('#header').length > 0){
			var headerSpaceH = $('#header').outerHeight(true);
			$('#header').after('<div class="headerSpace unvisible" style="height: '+headerSpaceH+'px;" ></div>');
		}
		if ($(window).width() >= 992)
		{	
			var currentP = 0;
			var headerSpaceH = $('#header').outerHeight(true);
			$('.headerSpace').css('height',headerSpaceH);
			$(window).scroll(function() {    
		
				var scroll = $(window).scrollTop();
				if(scroll != currentP){
				if (scroll >= headerSpaceH) {
					$(".use-sticky").parents("#header").find(".header-top").addClass("scroll-menu");
					$(".use-sticky").parents("#header").find(".header-top").addClass(" animated fadeInDown");
					$('.headerSpace').removeClass('unvisible');
				}else{
					$(".use-sticky").parents("#header").find(".header-top").removeClass("scroll-menu");
					$(".use-sticky").parents("#header").find(".header-top").removeClass("animated fadeInDown");
					$('.headerSpace').addClass('unvisible');  
				}
				}
				currentP = $(window).scrollTop();
			   
			});		
		}else
		{
			$('.pos-mobile-menu').removeClass('container');		
		}
	});
	$('#_desktop_megamenu .pos-menu-horizontal .menu-item').hover(function(){
	   var extraWidth       = 0
       var wrapWidthPopup   = $(this).find('.pos-sub-menu').outerWidth(true); /*include padding + margin + border*/
       
       /*define top and left of the popup*/
       var wraper = $('.pos-menu-horizontal');
       var wWraper = wraper.outerWidth();
       var posWraper = wraper.offset();
       var pos = $(this).offset();
       var xLeft = pos.left - posWraper.left; 
	    if (wWraper < 1110 ){ 
			$(this).parents("body").find('.pos-menu-horizontal').css('position', 'static');  
		}else {
			$(this).parents("body").find('.pos-menu-horizontal').css('position', 'relative');   
		}
	   $(this).find(' > .cat-drop-menu').css('left',xLeft); 
       if ((xLeft + wrapWidthPopup) > wWraper){
			$(this).find('.pos-sub-menu').css('right', 0);
		}else {
		$(this).find('.pos-sub-menu').css('left',xLeft); 
		}
	});
	

	$('#_desktop_megamenu img').parent('a').addClass("img_desktop"); 
	$('#_mobile_megamenu img').parent('a').addClass("img_banner"); 
});
function activeMobile(){
	$('.pos-menu-horizontal .menu-item > .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$('.pos-menu-horizontal .menu-item > .icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-horizontal .menu-dropdown').slideUp();
			$('.pos-menu-horizontal .menu-item > .icon-drop-mobile').next('.pos-menu-horizontal .menu-dropdown').slideUp();
		}
		else {	
			$('.pos-menu-horizontal .menu-item > .icon-drop-mobile').removeClass( 'open_menu' ); 
			$('.pos-menu-horizontal .menu-item > .icon-drop-mobile').next('.pos-menu-horizontal .menu-dropdown').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-horizontal .menu-dropdown').slideDown();
	
		}
		
	});
	$('.pos-menu-horizontal .cat-drop-menu .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$(this).parent().siblings().find('.icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-horizontal .cat-drop-menu').slideUp();
			$(this).parent().siblings().find('.cat-drop-menu').slideUp();
		}
		else {	
			$(this).parent().siblings().find('.icon-drop-mobile').removeClass( 'open_menu' );  
			$(this).parent().siblings().find('.cat-drop-menu').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-horizontal .cat-drop-menu').slideDown();
	
		}
		
	});
	$('.pos-menu-horizontal .pos-menu-col > .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$('.pos-menu-horizontal .pos-menu-col > .icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-horizontal ul.ul-column').slideUp();
			$('.pos-menu-horizontal .pos-menu-col > .icon-drop-mobile').next('.pos-menu-horizontal ul.ul-column').slideUp();
		} 
		else {	
			$('.pos-menu-horizontal .pos-menu-col > .icon-drop-mobile').removeClass( 'open_menu' ); 
			$('.pos-menu-horizontal .pos-menu-col > .icon-drop-mobile').next('.pos-menu-horizontal ul.ul-column').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-horizontal ul.ul-column').slideDown();
	
		}
	
	});
	$('.pos-menu-horizontal .submenu-item  > .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$('.pos-menu-horizontal .submenu-item  > .icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-horizontal ul.category-sub-menu').slideUp();
			$('.pos-menu-horizontal .submenu-item  > .icon-drop-mobile').next('.pos-menu-horizontal ul.category-sub-menu').slideUp();
		}
		else {	
			$('.pos-menu-horizontal .submenu-item  > .icon-drop-mobile').removeClass( 'open_menu' ); 
			$('.pos-menu-horizontal .submenu-item  > .icon-drop-mobile').next('.pos-menu-horizontal ul.category-sub-menu').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-horizontal ul.category-sub-menu').slideDown();
	
		}
	});

	
}
