/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

jQuery(document).ready(function ($) {
	var logo = $(".logo-slider");
	logo.owlCarousel({
		autoplay : true ,
		smartSpeed: 1000,
		autoplayHoverPause: true, 
		nav: true,
		dots : false,	
		responsive:{
			0:{
				items:2,
			},
			480:{
				items:3,
			},
			768:{
				items:5,
			},
			992:{
				items:6,
			},
			1200:{
				items:7,
			}
		}
	});
	checkClasses();
    logo.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
		var total = $('.pos_logo  .logo-slide .owl-stage .owl-item.active').length;
        $('.pos_logo  ').each(function(){
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
