<?php
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
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class PosCateList extends ObjectModel
{
	public $id_category;
	public $description;
	public $image;
	public $active;
	public $position;
	public $id_shop;
	public $list_subcategories;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'poslistcategories_items',
		'primary' => 'id_poslistcategories_items',
		'multilang' => true,
		'fields' => array(
			'active' =>			array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'position' =>		array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'id_category' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'list_subcategories' =>	array('type' => self::TYPE_STRING, 'validate' => 'isString'),

			// Lang fields
			'description' =>	array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 4000),
			'image' =>			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 255),
		)
	);

	public	function __construct($id_item = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_item, $id_lang, $id_shop);
	}

	public function add($autodate = true, $null_values = false)
	{
		$context = Context::getContext();
		$id_shop = $context->shop->id;

		$res = parent::add($autodate, $null_values);
		$res &= Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'poslistcategories` (`id_shop`, `id_poslistcategories_items`)
			VALUES('.(int)$id_shop.', '.(int)$this->id.')'
		);
		return $res;
	}

	public function delete()
	{
		$res = true;

		$images = $this->image;
		foreach ($images as $image)
		{
			if (preg_match('/sample/', $image) === 0)
				if ($image && file_exists(dirname(__FILE__).'/images/'.$image))
					$res &= @unlink(dirname(__FILE__).'/images/'.$image);
		}

		$res &= $this->reOrderPositions();

		$res &= Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'poslistcategories`
			WHERE `id_poslistcategories_items` = '.(int)$this->id
		);

		$res &= parent::delete();
		return $res;
	}

	public function reOrderPositions()
	{
		$id_item = $this->id;
		$context = Context::getContext();
		$id_shop = $context->shop->id;

		$max = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT MAX(pci.`position`) as position
			FROM `'._DB_PREFIX_.'poslistcategories_items` pci, `'._DB_PREFIX_.'poslistcategories` pc
			WHERE pci.`id_poslistcategories_items` = pc.`id_poslistcategories_items` AND pc.`id_shop` = '.(int)$id_shop
		);

		if ((int)$max == (int)$id_item)
			return true;

		$rows = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pci.`position` as position, pci.`id_poslistcategories_items` as id_item
			FROM `'._DB_PREFIX_.'poslistcategories_items` pci
			LEFT JOIN `'._DB_PREFIX_.'poslistcategories` pc ON (pci.`id_poslistcategories_items` = pc.`id_poslistcategories_items`)
			WHERE pc.`id_shop` = '.(int)$id_shop.' AND pci.`position` > '.(int)$this->position
		);

		foreach ($rows as $row)
		{
			$current_slide = new PosCateList($row['id_item']);
			--$current_slide->position;
			$current_slide->update();
			unset($current_slide);
		}

		return true;
	}

	public static function getAssociatedIdsShop($id_item)
	{
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pc.`id_shop`
			FROM `'._DB_PREFIX_.'poslistcategories` pc
			WHERE pc.`id_poslistcategories_items` = '.(int)$id_item
		);

		if (!is_array($result))
			return false;

		$return = array();

		foreach ($result as $id_shop)
			$return[] = (int)$id_shop['id_shop'];

		return $return;
	}

}
