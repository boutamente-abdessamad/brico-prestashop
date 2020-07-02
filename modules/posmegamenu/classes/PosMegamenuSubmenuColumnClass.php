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

class PosMegamenuSubmenuColumnClass extends ObjectModel
{
	const TABLE_NAME = 'posmegamenu_submenu_column';
	public $id_row;
	public $width;
	public $type_link;
	public $link;
	public $class;
	public $position;
	public $active_mobile;
	public $active;
	public $title;
	public $custom_link;

	public static $definition = array(
		'table' => 'posmegamenu_submenu_column',
		'primary' => 'id_posmegamenu_submenu_column',
		'multilang' => true,
		'fields' => array(
			'id_row' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'width' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 255),
			'type_link' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'size' => 255),
			'link' =>	array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'class' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 255),
			'position' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'active_mobile' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'active' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),

			'title' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
			'custom_link' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
		)
	);

	public	function __construct($id_posmegamenu_submenu_column = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_posmegamenu_submenu_column, $id_lang, $id_shop);
	}

	public function add($autodate = true, $null_values = false)
	{
		$res = parent::add($autodate, $null_values);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$menu_items = $this->getMenuItemByIdColum($this->id);
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
		$res &= parent::delete();
		return $res;
	}
	
	public function getMenuItemByIdColum($id_column)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT mi.*
			FROM '._DB_PREFIX_.'posmegamenu_submenu_item mi
			WHERE mi.`id_posmegamenu_submenu_column` = '.$id_column.' ORDER BY mi.id_posmegamenu_submenu_item');
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