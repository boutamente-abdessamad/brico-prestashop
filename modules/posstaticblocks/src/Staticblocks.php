<?php
/*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class Staticblocks extends ObjectModel
{
    public $id_pos_staticblock;
    public $name;
    public $id_hook;
    public $position;
    public $content;
    public $active;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'pos_staticblock',
        'primary' => 'id_pos_staticblock',
        'multilang' => true,
        'multishop' => true,
        'fields' => array(
            'name' =>       array('type' => self::TYPE_STRING,'lang' => false, 'required' => true, 'size' => 128),
            'id_hook' =>    array('type' => self::TYPE_INT,'lang' => false, 'validate' => 'isUnsignedInt', 'required' => true),
            'active' =>    array('type' => self::TYPE_INT,'lang' => false, 'validate' => 'isUnsignedInt', 'required' => true),
            'position' =>   array('type' => self::TYPE_INT,'lang' => false, 'validate' => 'isUnsignedInt', 'required' => true),
            'content' =>    array('type' => self::TYPE_HTML,'lang' => true, 'validate' => 'isCleanHtml', 'size' => 9999999),
        ),
    );
    public function __construct($id_pos_staticblock = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id_pos_staticblock, $id_lang, $id_shop);
    }
}
