<?php
/**
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2014 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_item` (
    `id_posvegamenu_item` int(11) NOT NULL AUTO_INCREMENT,
	`type_link` int(10) unsigned NOT NULL,
	`link` varchar(255) NULL,
	`type_icon` int(10) unsigned NULL,
	`icon` varchar(255) NULL,
	`icon_class` text NULL,
	`submenu_type` int(10) NULL,
	`item_class` varchar(255) NULL,
	`new_window` tinyint(1) unsigned,
	`position` int(10) unsigned NOT NULL DEFAULT \'0\',
	`active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	`item_bg_color` varchar(64) NULL,
	`item_bg_colorh` varchar(64) NULL,
	`item_color` varchar(64) NULL,
    `item_colorh` varchar(64) NULL,
    `item_fontsize` tinyint(1) unsigned NULL,
    `item_lineheight` tinyint(1) unsigned NULL,
    `item_transform` tinyint(1) unsigned NULL,
    `subtitle_bg_color` varchar(64) NULL,
    `subtitle_color` varchar(64) NULL,
    `subtitle_fontsize` tinyint(1) unsigned NULL,
    `subtitle_lineheight` tinyint(1) unsigned NULL,
    `subtitle_transform` tinyint(1) unsigned NULL,
    PRIMARY KEY  (`id_posvegamenu_item`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_item_lang` (
	  `id_posvegamenu_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_lang` int(10) unsigned NOT NULL,
	  `title` varchar(255) NULL,
	  `custom_link` varchar(255) NULL,
	  `subtitle` varchar(255) NULL,
	  PRIMARY KEY (`id_posvegamenu_item`, `id_lang`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_item_shop` (
    `id_posvegamenu_item` int(11) NOT NULL AUTO_INCREMENT,
	`id_shop` int(10) unsigned NOT NULL,
    PRIMARY KEY  (`id_posvegamenu_item`, `id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_submenu` (
	  `id_submenu` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_posvegamenu_item` int(10) unsigned NOT NULL,
	  `submenu_class` varchar(64) NULL,
	  `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	  `submenu_width` tinyint(1) unsigned NULL,
	  `submenu_bg` varchar(64) NULL,
	  `submenu_bg_color` varchar(64) NULL,
	  `submenu_bg_image` varchar(255) NULL,
	  `submenu_bg_repeat` tinyint(1) unsigned NULL,
	  `submenu_bg_position` tinyint(1) unsigned NULL,
	  `submenu_link_color` varchar(64) NULL,
	  `submenu_link_colorh` varchar(64) NULL,
	  `submenu_link_fontsize` tinyint(1) unsigned NULL,
	  `submenu_link_lineheight` tinyint(1) unsigned NULL,
	  `submenu_link_transform` tinyint(1) unsigned NULL,
	  `submenu_title_color` varchar(64) NULL,
	  `submenu_title_colorh` varchar(64) NULL,
	  `submenu_title_fontsize` tinyint(1) unsigned NULL,
	  `submenu_title_lineheight` tinyint(1) unsigned NULL,
	  `submenu_title_transform` tinyint(1) unsigned NULL,

	  PRIMARY KEY (`id_submenu`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_submenu_row` (
	  `id_row` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_posvegamenu_item` int(10) unsigned NOT NULL,
	  `class` varchar(255) NULL,
	  `position` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	  PRIMARY KEY (`id_row`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';
	
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_submenu_column` (
	  `id_posvegamenu_submenu_column` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_row` int(10) unsigned NOT NULL,
	  `width` varchar(255) NULL,
	  `class` varchar(64) NULL,
	  `type_link` int(10) unsigned NULL,
	  `link` varchar(64) NULL,
	  `position` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `active_mobile` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	  `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	  PRIMARY KEY (`id_posvegamenu_submenu_column`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_submenu_column_lang` (
	  `id_posvegamenu_submenu_column` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `title` varchar(64) NULL,
	  `custom_link` varchar(64) NULL,
	  `id_lang` int(10) unsigned NOT NULL,
	  PRIMARY KEY (`id_posvegamenu_submenu_column`,`id_lang`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_submenu_item` (
    `id_posvegamenu_submenu_item` int(11) NOT NULL AUTO_INCREMENT,
    `id_posvegamenu_submenu_column` int(11) unsigned NOT NULL,
	`type_link` int(10) unsigned NULL,
	`category_tree` varchar(64) NULL,
	`ps_link` varchar(64) NULL,	
	`id_product` int(10) unsigned DEFAULT NULL,
	`id_manufacturer` int(10) unsigned DEFAULT NULL,
	`position` int(10) unsigned NOT NULL DEFAULT \'0\',
	`active_mobile` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	`active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
    PRIMARY KEY  (`id_posvegamenu_submenu_item`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'posvegamenu_submenu_item_lang` (
	  `id_posvegamenu_submenu_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_lang` int(10) unsigned NOT NULL,
	  `customlink_title` varchar(64) NULL,
	  `customlink_link` varchar(64) NULL,
	  `htmlcontent` text NULL,
	  `image` varchar(255) NULL,
	  `image_link` varchar(255) NULL,
	  PRIMARY KEY (`id_posvegamenu_submenu_item`, `id_lang`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';

foreach ($sql as $query)
	if (Db::getInstance()->execute($query) == false)
		return false;
