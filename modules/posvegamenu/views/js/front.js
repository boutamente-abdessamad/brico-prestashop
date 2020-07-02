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
	activeMobileVetical();
	$(window).resize(function(){
		if($(window).width() < 992)
		{
			$('.pos-menu-vertical').addClass('pos-mobile-menu');
			$('#_mobile_vegamenu img').not('.img-icon').parent('a').addClass("img_banner"); 
		}
		else
		{
			$('.pos-menu-vertical').removeClass('pos-mobile-menu');
			$('.pos-menu-vertical .menu-dropdown').show(); 		
		}
		
		
	});
	$('#_mobile_vegamenu img').not('.img-icon').parent('a').addClass("img_banner"); 
	$('#_desktop_vegamenu img').parent('a').addClass("img_desktop"); 
	$('#_desktop_vegamenu .pos-menu-vertical .menu-item .pos-sub-menu').each(function(){
		var wrapWidthPopup = 840;
		if($(window).width() < 1199)
		{
			var wrapWidthPopup = 720; 
		}
		var colum_Width       = wrapWidthPopup / 12;
		 
		var colum_Width_col1       = colum_Width;
		var colum_Width_col2       = colum_Width * 2;
		var colum_Width_col3       = colum_Width * 3;
		var colum_Width_col4       = colum_Width * 4;
		var colum_Width_col5       = colum_Width * 5;
		var colum_Width_col6       = colum_Width * 6;
		var colum_Width_col7       = colum_Width * 7;
		var colum_Width_col8       = colum_Width * 8;
		var colum_Width_col9       = colum_Width * 9;
		var colum_Width_col10       = colum_Width * 10;
		var colum_Width_col11       = colum_Width * 11;
		var colum_Width_col12       = colum_Width * 12;
		$(this).find('.col-lg-1').css('width',colum_Width_col1); 
		$(this).find('.col-lg-2').css('width',colum_Width_col2); 
		$(this).find('.col-lg-3').css('width',colum_Width_col3); 
		$(this).find('.col-lg-4').css('width',colum_Width_col4); 
		$(this).find('.col-lg-5').css('width',colum_Width_col5); 
		$(this).find('.col-lg-6').css('width',colum_Width_col6); 
		$(this).find('.col-lg-7').css('width',colum_Width_col7); 
		$(this).find('.col-lg-8').css('width',colum_Width_col8); 
		$(this).find('.col-lg-9').css('width',colum_Width_col9); 
		$(this).find('.col-lg-10').css('width',colum_Width_col10); 
		$(this).find('.col-lg-11').css('width',colum_Width_col11); 
		$(this).find('.col-lg-12').css('width',colum_Width_col12); 
		var posWraper = wrapWidthPopup + 60;
		$(this).css('width',posWraper); 
	}); 
	$("#_desktop_vegamenu .pos-menu-vertical .title_vertical").on('click', function(e){
		e.stopPropagation();
		var vega = $("#_desktop_vegamenu .pos-menu-vertical .menu-content");
		if(vega.is(':hidden')){
			vega.slideDown();
		} else {
			vega.slideUp();
		}
		e.preventDefault();
	});
 	var count_block = $('#_desktop_vegamenu .pos-menu-vertical .menu-content li').length; 
	var number_blocks = parseInt($('.pos-menu-vertical').attr('data-more-less'));
	if($(window).width() < 1199)
	{
		var number_blocks = 10;
	}
	//console.log(number_blocks);
	if(count_block < number_blocks){
		return false; 
	} else {
		$('#_desktop_vegamenu .pos-menu-vertical .menu-item').each(function(i,n){
			if(i == number_blocks ) {
				$('.pos-menu-vertical .menu-content').append('<li class="menu-item"><a href="javascript:void(0)" class="view_more"><span> + ' + MORE + '</span></a></li>'); 
			}
			if(i> (number_blocks -1) ) {
				$(this).addClass('hide_menu_block');
			}
		})
		$('#_desktop_vegamenu .pos-menu-vertical .hide_menu_block').hide();
		$('#_desktop_vegamenu .pos-menu-vertical .view_more').click(function() {
			$(this).toggleClass('active');
			if($(this).hasClass('active')){
				$(this).addClass('open_menu');
				$(this).html('<span><em class="closed-menu"> - '+ CLOSE +'</em></span>');
				$('.hide_menu_block').slideDown();	
			}
			else
			{
				$(this).removeClass('open_menu').addClass('close_menu');
				$(this).html('<span><em class="closed-menu"> + '+ MORE +'</em></span>'); 
				$('.hide_menu_block').slideUp();
				
			}
	
		});
	} 
	
});
function activeMobileVetical(){
	
	$('.pos-menu-vertical .menu-item > .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$('.pos-menu-vertical .menu-item > .icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-vertical .menu-dropdown').slideUp();
			$('.pos-menu-vertical .menu-item > .icon-drop-mobile').next('.pos-menu-vertical .menu-dropdown').slideUp();
		}
		else {	
			$('.pos-menu-vertical .menu-item > .icon-drop-mobile').removeClass( 'open_menu' ); 
			$('.pos-menu-vertical .menu-item > .icon-drop-mobile').next('.pos-menu-vertical .menu-dropdown').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-vertical .menu-dropdown').slideDown();
	
		}
		
	});
	$('.pos-menu-vertical .cat-drop-menu .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$(this).parent().siblings().find('.icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-vertical .cat-drop-menu').slideUp();
			$(this).parent().siblings().find('.cat-drop-menu').slideUp();
		}
		else {	
			$(this).parent().siblings().find('.icon-drop-mobile').removeClass( 'open_menu' );  
			$(this).parent().siblings().find('.cat-drop-menu').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-vertical .cat-drop-menu').slideDown();
	
		}
		
	});
	$('.pos-menu-vertical .pos-menu-col > .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$('.pos-menu-vertical .pos-menu-col > .icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-vertical ul.ul-column').slideUp();
			$('.pos-menu-vertical .pos-menu-col > .icon-drop-mobile').next('.pos-menu-vertical ul.ul-column').slideUp();
		} 
		else {	
			$('.pos-menu-vertical .pos-menu-col > .icon-drop-mobile').removeClass( 'open_menu' ); 
			$('.pos-menu-vertical .pos-menu-col > .icon-drop-mobile').next('.pos-menu-vertical ul.ul-column').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-vertical ul.ul-column').slideDown();
	
		}
	
	});
	$('.pos-menu-vertical .submenu-item  > .icon-drop-mobile').on('click', function(){
		if($(this).hasClass('open_menu')) {
			$('.pos-menu-vertical .submenu-item  > .icon-drop-mobile').removeClass( 'open_menu' );   
			$(this).removeClass( 'open_menu' );  
			$(this).next('.pos-menu-vertical ul.category-sub-menu').slideUp();
			$('.pos-menu-vertical .submenu-item  > .icon-drop-mobile').next('.pos-menu-vertical ul.category-sub-menu').slideUp();
		}
		else {	
			$('.pos-menu-vertical .submenu-item  > .icon-drop-mobile').removeClass( 'open_menu' ); 
			$('.pos-menu-vertical .submenu-item  > .icon-drop-mobile').next('.pos-menu-vertical ul.category-sub-menu').slideUp();
			$(this).addClass( 'open_menu' );   
			$(this).next('.pos-menu-vertical ul.category-sub-menu').slideDown();
	
		}
	});
	
}
