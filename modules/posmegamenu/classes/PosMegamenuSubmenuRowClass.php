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

class PosMegamenuSubmenuRowClass extends ObjectModel
{
	const TABLE_NAME = 'posmegamenu_submenu_row';
	public $id_posmegamenu_item;
	public $class;
	public $position;
	public $active;
	public static $definition = array(
		'table' => 'posmegamenu_submenu_row',
		'primary' => 'id_row',
		'fields' => array(
			'id_posmegamenu_item' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'class' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 255),
			'position' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'active' =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
		)
	);

	public	function __construct($id_row = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_row);
	}

	public function add($autodate = true, $null_values = false)
	{
		$res = parent::add($autodate, $null_values);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$column_items = $this->getColumByRow($this->id);
		if (count($column_items) > 0)
		{
			foreach ($column_items as $column_item)
			{
				$res &= $this->deleteSubmenuColumn($column_item['id_posmegamenu_submenu_column']);
				$res &= $this->deleteSubmenuItem($column_item['id_posmegamenu_submenu_column']);
			}
		}
		$res &= parent::delete();
		return $res;
	}
	
	public function getColumByRow($id_row)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT psc.*
			FROM '._DB_PREFIX_.'posmegamenu_submenu_column psc
			WHERE psc.`id_row` = '.$id_row);
	}
	
	public function deleteSubmenuItem($id_col)
	{
		$res = true;
		$menu_items = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT psi.*
			FROM '._DB_PREFIX_.'posmegamenu_submenu_item psi
			WHERE psi.`id_posmegamenu_submenu_column` = '.$id_col.' ORDER BY psi.id_posmegamenu_submenu_item');
		
		if (isset ($menu_items) && count($menu_items) > 0)
		{
			foreach ($menu_items as $menu_item)
			{
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'posmegamenu_submenu_item_lang`
					WHERE `id_posmegamenu_submenu_item` = '.$menu_item['id_posmegamenu_submenu_item']
				);
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'posmegamenu_submenu_item`
					WHERE `id_posmegamenu_submenu_item` = '.$menu_item['id_posmegamenu_submenu_item']
				);
			}
		}
		return $res;
	}
	public function deleteSubmenuColumn($id_col)
	{
		$res = true;
		$res &= Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'posmegamenu_submenu_column`
			WHERE `id_posmegamenu_submenu_column` = '.$id_col
		);
		$res &= Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'posmegamenu_submenu_column_lang`
			WHERE `id_posmegamenu_submenu_column` = '.$id_col
		);
		return $res;
	}
	public static function getLastPosition()
    {
        $sql = new DbQuery();
        $sql->select('position');
        $sql->from(self::TABLE_NAME);
        $sql->orderBy('position DESC');
        return Db::getInstance()->getValue($sql);
    }
}