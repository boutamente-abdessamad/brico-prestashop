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

class PosMegamenuSubmenuItemClass extends ObjectModel
{
	const TABLE_NAME = 'posmegamenu_submenu_item';

	public $id_posmegamenu_submenu_column;
	public $type_link;
	public $category_tree;
	public $ps_link;
	public $id_product;
	public $id_manufacturer;
	public $customlink_title;
	public $customlink_link;
	public $htmlcontent;
	public $image;
	public $image_link;
	public $position;
	public $active_mobile;
	public $active;

	public static $definition = array(
		'table' => 'posmegamenu_submenu_item',
		'primary' => 'id_posmegamenu_submenu_item',
		'multilang' => true,
		'fields' => array(
			'id_posmegamenu_submenu_column' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'type_link' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'size' => 255),
			'category_tree' =>	array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 255),
			'ps_link' =>	array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 255),
			'id_product' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'size' => 255),
			'id_manufacturer' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'size' => 255),
			'customlink_title' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
			'customlink_link' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
			'image' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
			'image_link' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString'),
			'htmlcontent' =>	array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'position' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'active_mobile' =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'active' =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true)
		)
	);

	public	function __construct($id_posmegamenu_submenu_item = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_posmegamenu_submenu_item, $id_lang);	
	}

	public function add($autodate = true, $null_values = false)
	{
		$res = parent::add($autodate, $null_values);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$res &= parent::delete();
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