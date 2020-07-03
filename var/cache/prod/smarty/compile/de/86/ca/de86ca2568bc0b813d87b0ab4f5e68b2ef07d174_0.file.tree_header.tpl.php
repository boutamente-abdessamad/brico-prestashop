<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:52:30
  from 'C:\wamp64\www\prestashop\admin158uvqu32\themes\default\template\helpers\tree\tree_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe814e58f3d0_24813318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de86ca2568bc0b813d87b0ab4f5e68b2ef07d174' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\admin158uvqu32\\themes\\default\\template\\helpers\\tree\\tree_header.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe814e58f3d0_24813318 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl ) );
}?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {
echo $_smarty_tpl->tpl_vars['toolbar']->value;
}?>
</div>
<?php }
}
