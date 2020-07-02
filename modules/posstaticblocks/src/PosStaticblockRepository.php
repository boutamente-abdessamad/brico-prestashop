<?php

use Symfony\Component\Translation\TranslatorInterface as Translator;

class PosStaticblockRepository
{
    private $db;
    private $shop;
    private $db_prefix;
    private $translator;

    public function __construct(Db $db, Shop $shop, Translator $translator)
    {
        $this->db = $db;
        $this->shop = $shop;
        $this->db_prefix = $db->getPrefix();
        $this->translator = $translator;
    }

    public function createTables()
    {
        $engine = _MYSQL_ENGINE_;
        $success = true;
        $this->dropTables();

        $queries = [
            "CREATE TABLE IF NOT EXISTS `{$this->db_prefix}pos_staticblock`(
    			`id_pos_staticblock` int(10) unsigned NOT NULL auto_increment,
    			`id_hook` int(1) unsigned DEFAULT NULL,
    			`position` int(10) unsigned NOT NULL default '0',
                `name` varchar(40) NOT NULL default '',
    			`active` int(1) unsigned DEFAULT '1',
    			PRIMARY KEY (`id_pos_staticblock`)
            ) ENGINE=$engine DEFAULT CHARSET=utf8",
            "CREATE TABLE IF NOT EXISTS `{$this->db_prefix}pos_staticblock_lang`(
    			`id_pos_staticblock` int(10) unsigned NOT NULL,
    			`id_lang` int(10) unsigned NOT NULL,
    			`content` text default NULL,
    			PRIMARY KEY (`id_pos_staticblock`, `id_lang`)
            ) ENGINE=$engine DEFAULT CHARSET=utf8",
            "CREATE TABLE IF NOT EXISTS `{$this->db_prefix}pos_staticblock_shop` (
    			`id_pos_staticblock` int(10) NOT NULL,
    			`id_shop` int(10) NOT NULL,
    			PRIMARY KEY (`id_pos_staticblock`, `id_shop`)
            ) ENGINE=$engine DEFAULT CHARSET=utf8"
        ];

        foreach ($queries as $query) {
            $success &= $this->db->execute($query);
        }

        return $success;
    }

    public function dropTables()
    {
        $sql = "DROP TABLE IF EXISTS
			`{$this->db_prefix}pos_staticblock`,
			`{$this->db_prefix}pos_staticblock_lang`,
			`{$this->db_prefix}pos_staticblock_shop`";

        return $this->db->execute($sql);
    }

    public function getCMSBlocksSortedByHook($id_shop = null, $id_lang = null)
    {
        $id_lang = (int) (($id_lang) ?: Context::getContext()->language->id);
        $id_shop = (int) (($id_shop) ?: Context::getContext()->shop->id);

        $sql = 'SELECT
                bc.`id_pos_staticblock`,
                bc.`name` as block_name,
                bc.`id_hook`,
                bc.`active`,
                h.`name` as hook_name,
                h.`title` as hook_title,
                h.`description` as hook_description,
                bc.`position`
            FROM `'.$this->db_prefix.'pos_staticblock` bc
                INNER JOIN `'.$this->db_prefix.'pos_staticblock_lang` bcl
                    ON (bc.`id_pos_staticblock` = bcl.`id_pos_staticblock`)
                LEFT JOIN `'.$this->db_prefix.'pos_staticblock_shop` pss   
                    ON (pss.`id_pos_staticblock` = bcl.`id_pos_staticblock`)
                LEFT JOIN `'.$this->db_prefix.'hook` h
                    ON (bc.`id_hook` = h.`id_hook`)
            WHERE bcl.`id_lang` = '.$id_lang.' AND pss.`id_shop` = '.$id_shop.'
            ORDER BY bc.`position`';

        $blocks = $this->db->executeS($sql);

        $orderedBlocks = array();
        foreach ($blocks as $block) {
            if (!isset($orderedBlocks[$block['id_hook']])) {
                $id_hook = ($block['id_hook']) ?: 'not_hooked';
                $orderedBlocks[$id_hook] = array(
                    'id_hook' => $block['id_hook'],
                    'hook_name' => $block['hook_name'],
                    'hook_title' => $block['hook_title'],
                    'hook_description' => $block['hook_description'],
                    'blocks' => array(),
                );
            }
        }

        foreach ($blocks as $block) {
            $id_hook = ($block['id_hook']) ?: 'not_hooked';
            unset($block['id_hook']);
            unset($block['hook_name']);
            unset($block['hook_title']);
            unset($block['hook_description']);
            $orderedBlocks[$id_hook]['blocks'][] = $block;
        }

        return $orderedBlocks;
    }

    public function getDisplayHooksForHelper()
    {
        $sql = "SELECT h.id_hook as id, h.name as name
                FROM {$this->db_prefix}hook h
                WHERE (lower(h.`name`) LIKE 'display%')
                ORDER BY h.name ASC
            ";
        $hooks = $this->db->executeS($sql);

        foreach ($hooks as $key => $hook) {
            if (preg_match('/admin/i', $hook['name'])
                || preg_match('/backoffice/i', $hook['name'])) {
                unset($hooks[$key]);
            }
        }
        return $hooks;
    }

    public function getByIdHook($id_hook)
    {
        $id_lang = (int)Context::getContext()->language->id;
        $id_shop = (int)Context::getContext()->shop->id;

        $id_hook = (int) $id_hook;
        $cmsBlock = array();
        $sql = "SELECT sb.`id_pos_staticblock`, sbl.`content`
                    FROM {$this->db_prefix}pos_staticblock sb
                    LEFT JOIN {$this->db_prefix}pos_staticblock_lang sbl
                    ON sb.`id_pos_staticblock` = sbl.`id_pos_staticblock`
                    LEFT JOIN {$this->db_prefix}pos_staticblock_shop sbs
                    ON sb.`id_pos_staticblock` = sbs.`id_pos_staticblock`
                    WHERE `id_hook` = $id_hook
                    AND sb.`active` = 1
                    AND sbl.`id_lang` = $id_lang
                    AND sbs.`id_shop` = $id_shop
                    ORDER by sb.`position`
                ";
        $cmsBlock = $this->db->executeS($sql);

        return $cmsBlock;
    }

    public function getCountByIdHook($id_hook)
    {
        $id_hook = (int) $id_hook;

        $sql = "SELECT COUNT(*) FROM {$this->db_prefix}pos_staticblock
                    WHERE `id_hook` = $id_hook";

        return $this->db->getValue($sql);
    }

    public function createOrUpdateStaticblock(&$id_pos_staticblock, $id_hook)
    {
        $success = true;
        $id_shop = (int) Context::getContext()->shop->id;

        if (empty($id_pos_staticblock)) {
            $query = 'INSERT INTO `'._DB_PREFIX_.'pos_staticblock` (`id_hook`, `position`, `name`,`active`)
                SELECT ' . $id_hook . ', MAX(`position`) + 1, \''.Tools::getValue('name').'\', '.Tools::getValue('active').' FROM '._DB_PREFIX_.'pos_staticblock WHERE id_hook = ' . $id_hook;
              
            $success &= Db::getInstance()->execute($query);
            $id_pos_staticblock = (int) Db::getInstance()->Insert_ID();

            if (!empty($success) && !empty($id_pos_staticblock)) {
                $languages = Language::getLanguages(true, Context::getContext()->shop->id);

                if (!empty($languages)) {
                    $query = 'INSERT INTO `' . _DB_PREFIX_ . 'pos_staticblock_lang` (`id_pos_staticblock`, `id_lang`, `content`) VALUES ';

                    foreach ($languages as $lang) {
                        $query .= '(' . $id_pos_staticblock . ',' . (int)$lang['id_lang'] . ',\'' . Tools::getValue('content_'.(int)$lang['id_lang']) . '\'),';
                    }

                    $success &= Db::getInstance()->execute(rtrim($query, ','));
                }

                $query = 'INSERT INTO `' . _DB_PREFIX_ . 'pos_staticblock_shop` (`id_pos_staticblock`, `id_shop`) VALUES ';
                $query .= '(' . $id_pos_staticblock . ',' . $id_shop . ');';
                $success &= Db::getInstance()->execute($query);
            }
            
        } else {
            $query = 'UPDATE `'._DB_PREFIX_.'pos_staticblock` 
                    SET `name` = \''.Tools::getValue('name').'\', `id_hook` = '.$id_hook.' , `active` = '.Tools::getValue('active').'
                    WHERE `id_pos_staticblock` = '.$id_pos_staticblock;

            $success &= Db::getInstance()->execute($query);

            if (!empty($success) && !empty($id_pos_staticblock)) {
                $languages = Language::getLanguages(true, Context::getContext()->shop->id);

                if (!empty($languages)) {
                    foreach ($languages as $lang) {
                        $query = 'UPDATE `' . _DB_PREFIX_ . 'pos_staticblock_lang` 
                                SET `content` = \''.Tools::getValue('content_'.(int)$lang['id_lang']).'\'
                                WHERE `id_pos_staticblock` = '.$id_pos_staticblock.' AND `id_lang` = '.(int)$lang['id_lang'];
                        $success &= Db::getInstance()->execute($query);
                    }
                }
                
            }

        }

        return $success;
    }
}
