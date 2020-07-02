/*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

var handle_font_style = function(){  
    $('#image-box').removeAttr('class')      
    var animation_style = $('#posrotatorimg_animation').val();
    var animation_time = $('#posrotatorimg_time').val();
    animation_time = animation_time/1000 + 's';
    var style;
    switch(animation_style){
        case "1":
            style = "an1";
            break;
        case "2":
            style = "an2";
            break;
        case "3":
            style = "an3";
            break;
        case "4":
            style = "an4";
            break;
        case "5":
            style = "an5";
            break;
        case "6":
            style = "an6";
            break;
        case "7":
            style = "an7";
            break;
        case "8":
            style = "an8";
            break;
        case "9":
            style = "an9";
            break;
        case "10":
            style = "an10";
            break;
        case "11":
            style = "an11";
    
    };
    $('#image-box').addClass(style);
    $('#image-box .second-image').css({'-webkit-transition':animation_time,'-moz-transition':animation_time,'transition':animation_time});
};
$(document).ready(function() {
    handle_font_style();
})