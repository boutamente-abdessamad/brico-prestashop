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

include_once('../../config/config.inc.php');
include_once('../../init.php');
include_once('posmegamenu.php');

$home_menu = new Posmegamenu();
$menus = array();

if (!Tools::isSubmit('secure_key') || Tools::getValue('secure_key') != $home_menu->secure_key || !Tools::getValue('action'))
	die(1);

if (Tools::getValue('action') == 'updateMenusPosition' && Tools::getValue('menu'))
{
	$menus = Tools::getValue('menu');
	foreach ($menus as $position => $id_menu)
		Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'posmegamenu_item` SET `position` = '.(int)$position.'
			WHERE `id_posmegamenu_item` = '.(int)$id_menu
		);
	$home_menu->clearCache();
}
if (Tools::getValue('action') == 'updateMenusItemPosition' && Tools::getValue('menuitem'))
{
	$menu_items = Tools::getValue('menuitem');
	foreach ($menu_items as $position => $id_menuitem)
		Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'posmegamenu_submenu_item` SET `position` = '.(int)$position.'
			WHERE `id_posmegamenu_submenu_item` = '.(int)$id_menuitem);
	$home_menu->clearCache();
}

if (Tools::getValue('action') == 'updateColumnsPosition' && Tools::getValue('col'))
{
	$col_items = Tools::getValue('col');

	foreach ($col_items as $position => $id_col)
		Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'posmegamenu_submenu_column` SET `position` = '.(int)$position.'
			WHERE `id_posmegamenu_submenu_column` = '.(int)$id_col
		);
	$home_menu->clearCache();
}
if (Tools::getValue('action') == 'updateRowsPosition' && Tools::getValue('col'))
{
	$row_items = Tools::getValue('col');
	foreach ($row_items as $position => $id_row)
		Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'posmegamenu_submenu_row` SET `position` = '.(int)$position.'
			WHERE `id_row` = '.(int)$id_row
		);
	$home_menu->clearCache();
}