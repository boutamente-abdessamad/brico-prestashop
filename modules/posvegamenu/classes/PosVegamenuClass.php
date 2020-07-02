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

class PosVegamenuClass extends ObjectModel
{
	const TABLE_NAME = 'posvegamenu_item';

	public $type_link;
	public $link;
	public $type_icon;
	public $icon;
	public $icon_class;
	public $submenu_type;
	public $item_class;
	public $new_window;
	public $position;
	public $active;
	//style
	public $item_bg_color;
	public $item_bg_colorh;
	public $item_color;
	public $item_colorh;
	public $item_fontsize;
	public $item_lineheight;
	public $item_transform;
	public $subtitle_bg_color;
	public $subtitle_color;
	public $subtitle_fontsize;
	public $subtitle_lineheight;
	public $subtitle_transform;
	//language
	public $title;
	public $custom_link;
	public $subtitle;

	public static $definition = array(
		'table' => 'posvegamenu_item',
		'primary' => 'id_posvegamenu_item',
		'multilang' => true,
		'multishop' => true,
		'fields' => array(
			'type_link' => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt', 'required' => true, 'size' => 255),
			'link' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'type_icon' => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'icon' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'icon_class' => array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml'),
			'submenu_type' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'item_class' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'new_window' => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'position' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'active' =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'item_bg_color' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'item_bg_colorh' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'item_color' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'item_colorh' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'item_fontsize' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'item_lineheight' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'item_transform' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'subtitle_bg_color' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'subtitle_color' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
			'subtitle_fontsize' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'subtitle_lineheight' => array('type' => self::TYPE_STRING, 'validate' => 'isunsignedInt'),
			'subtitle_transform' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

			'title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
			'custom_link' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
			'subtitle' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
		)
	);
	

	public	function __construct($id_posvegamenu_item = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_posvegamenu_item, $id_lang, $id_shop);
	}

	public function add($autodate = true, $null_values = false)
	{
		$context = Context::getContext();
		$id_shop = $context->shop->id;

		$res = parent::add($autodate, $null_values);
		$res &= Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'posvegamenu_item_shop` (`id_shop`, `id_posvegamenu_item`)
			VALUES('.(int)$id_shop.', '.(int)$this->id.')'
		);
		$res &= Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'posvegamenu_submenu` (`id_submenu`,`id_posvegamenu_item`, `active`)
			VALUES('.(int)$this->id.','.(int)$this->id.', 1)'
		);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$icon = $this->icon;
		if (preg_match('/sample/', $icon) === 0)
			if ($icon && file_exists(_PS_MODULE_DIR_.'posvegamenu/views/img/icons/'.$icon))
				$res &= @unlink(_PS_MODULE_DIR_.'posvegamenu/views/img/icons/'.$icon);
		
		$row_items = $this->getRowByMenu($this->id);
		if (count($row_items) > 0)
		{
			foreach ($row_items as $row_item)
			{
				$column_items = $this->getColumByRow($row_item['id_row']);
				if (count($column_items) > 0)
				{
					foreach ($column_items as $column_item)
					{
						$res &= $this->deleteMenuItem($column_item['id_posvegamenu_submenu_column']);
						$res &= $this->deleteColumnItem($column_item['id_posvegamenu_submenu_column']);
					}
				}
				$res &= $this->deleteRowItem($row_item['id_row']);
			}
		}
		$res &= $this->deleteSubmenu($this->id);
		$res &= Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'posvegamenu_item_shop`
			WHERE `id_posvegamenu_item` = '.$this->id
		);
		$res &= parent::delete();
		return $res;
	}
	public function deleteSubmenu($id)
	{
		$res = true;
		$res &= Db::getInstance()->execute('
				DELETE FROM `'._DB_PREFIX_.'posvegamenu_submenu`
				WHERE `id_posvegamenu_item` = '.$id
			);
		return $res;
	}
	public function getRowByMenu($id_menu)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT mr.*
			FROM '._DB_PREFIX_.'posvegamenu_submenu_row mr
			WHERE mr.`id_posvegamenu_item` = '.$id_menu);
	}
	public function getColumByRow($id_row)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT mc.*
			FROM '._DB_PREFIX_.'posvegamenu_submenu_column mc
			WHERE mc.`id_row` = '.$id_row);
	}
	
	public function deleteMenuItem($id_col)
	{
		$res = true;
		$menu_items = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT mi.*
			FROM '._DB_PREFIX_.'posvegamenu_submenu_item mi
			WHERE mi.`id_posvegamenu_submenu_item` = '.$id_col.' ORDER BY mi.id_posvegamenu_submenu_item');
		
		if (isset ($menu_items) && count($menu_items) > 0)
		{
			foreach ($menu_items as $menu_item)
			{
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'posvegamenu_submenu_item_lang`
					WHERE `id_posvegamenu_submenu_item` = '.$menu_item['id_posvegamenu_submenu_item']
				);
				
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'posvegamenu_submenu_item`
					WHERE `id_posvegamenu_submenu_item` = '.$menu_item['id_posvegamenu_submenu_item']
				);
			}
		}
		return $res;
	}
	
	public function deleteColumnItem($id_col)
	{
		$res = true;
		$res &= Db::getInstance()->execute('
				DELETE FROM `'._DB_PREFIX_.'posvegamenu_submenu_column`
				WHERE `id_posvegamenu_submenu_column` = '.$id_col
			);
		return $res;
	}
	
	public function deleteRowItem($id_row)
	{
		$res = true;
		
		$res &= Db::getInstance()->execute('
				DELETE FROM `'._DB_PREFIX_.'posvegamenu_submenu_row`
				WHERE `id_row` = '.$id_row
			);
		return $res;
	}
	
	
	public static function getMenus()
	{
		$id_shop = (int)Context::getContext()->shop->id;
		$id_lang = (int)Context::getContext()->language->id;
		$kq = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pi.*, pl.*
			FROM '._DB_PREFIX_.'posvegamenu_item pi
			LEFT JOIN `'._DB_PREFIX_.'posvegamenu_item_lang` pl ON pl.`id_posvegamenu_item` = pi.`id_posvegamenu_item`
			LEFT JOIN `'._DB_PREFIX_.'posvegamenu_item_shop` ps ON ps.`id_posvegamenu_item` = pi.`id_posvegamenu_item`
			WHERE pi.active = 1 AND ps.id_shop = '.$id_shop.' AND pl.id_lang='.$id_lang.' ORDER BY pi.position ASC, pi.id_posvegamenu_item ASC');
		return $kq;
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