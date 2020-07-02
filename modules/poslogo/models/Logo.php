<?php
class Logo extends ObjectModel
{
 	/** @var string Name */
	public $title;
        public $description;
        public $image;
        public $link;
        public $porder;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'pos_logo',
		'primary' => 'id_pos_logo',
		'fields' => array(
                    'title' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => false, 'size' => 265),
                    'description' => array('type' => self::TYPE_HTML, 'lang' => false, 'validate' => 'isString', 'size' => 3999999999999),
                    'image' => array('type' => self::TYPE_STRING, 'lang' => false, 'validate' => 'isString', 'required' => false, 'size' => 3999999999),
                    'link' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => false, 'size' => 265),
                    'porder' =>           array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => false),
                ),
	);
}