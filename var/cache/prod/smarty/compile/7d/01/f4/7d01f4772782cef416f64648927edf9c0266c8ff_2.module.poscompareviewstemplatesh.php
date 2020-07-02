<?php
/* Smarty version 3.1.33, created on 2020-07-01 23:13:11
  from 'module:poscompareviewstemplatesh' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efd0a772c8e27_02239197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d01f4772782cef416f64648927edf9c0266c8ff' => 
    array (
      0 => 'module:poscompareviewstemplatesh',
      1 => 1593472237,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efd0a772c8e27_02239197 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p class="panel-product-line panel-product-actions">
	<button href="#" class="poscompare-add compare-button js-poscompare-add"  data-id_product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value->id), ENT_QUOTES, 'UTF-8');?>
";   onclick="posCompare.addCompare($(this),<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value->id), ENT_QUOTES, 'UTF-8');?>
); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','mod'=>'poscompare'),$_smarty_tpl ) );?>
"><i class="icon-shuffle"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','mod'=>'poscompare'),$_smarty_tpl ) );?>
</button>  
</p>	
<?php }
}
