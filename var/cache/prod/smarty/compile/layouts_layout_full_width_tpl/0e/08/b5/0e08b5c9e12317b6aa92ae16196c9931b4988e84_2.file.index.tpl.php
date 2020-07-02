<?php
/* Smarty version 3.1.33, created on 2020-06-30 00:11:47
  from 'C:\wamp64\www\prestashop\themes\theme_madina1\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa75332ec810_17099604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e08b5c9e12317b6aa92ae16196c9931b4988e84' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\theme_madina1\\templates\\index.tpl',
      1 => 1593472241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efa75332ec810_17099604 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19007001535efa75332e3a29_41937881', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_17983555885efa75332e5789_93614074 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_17622528595efa75332e8c01_97083927 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_2274070205efa75332e7703_67344063 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17622528595efa75332e8c01_97083927', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_19007001535efa75332e3a29_41937881 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_19007001535efa75332e3a29_41937881',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_17983555885efa75332e5789_93614074',
  ),
  'page_content' => 
  array (
    0 => 'Block_2274070205efa75332e7703_67344063',
  ),
  'hook_home' => 
  array (
    0 => 'Block_17622528595efa75332e8c01_97083927',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17983555885efa75332e5789_93614074', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2274070205efa75332e7703_67344063', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
