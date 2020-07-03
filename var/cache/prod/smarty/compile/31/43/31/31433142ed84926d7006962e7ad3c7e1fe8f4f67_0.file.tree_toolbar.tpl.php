<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:52:30
  from 'C:\wamp64\www\prestashop\admin158uvqu32\themes\default\template\helpers\tree\tree_toolbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe814e4a68a5_20056694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31433142ed84926d7006962e7ad3c7e1fe8f4f67' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\admin158uvqu32\\themes\\default\\template\\helpers\\tree\\tree_toolbar.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe814e4a68a5_20056694 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-actions pull-right">
	<?php if (isset($_smarty_tpl->tpl_vars['actions']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
?>
		<?php echo $_smarty_tpl->tpl_vars['action']->value->render();?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
</div>
<?php }
}
