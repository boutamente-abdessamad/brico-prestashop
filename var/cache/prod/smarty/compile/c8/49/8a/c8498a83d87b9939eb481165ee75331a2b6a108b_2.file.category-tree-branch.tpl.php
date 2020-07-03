<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:13:27
  from 'C:\wamp64\www\prestashop\modules\possearchproducts\views\templates\front\category-tree-branch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7827c8fb17_08716785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8498a83d87b9939eb481165ee75331a2b6a108b' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\possearchproducts\\views\\templates\\front\\category-tree-branch.tpl',
      1 => 1593472238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/possearchproducts/views/templates/front/category-tree-branch.tpl' => 2,
  ),
),false)) {
function content_5efe7827c8fb17_08716785 (Smarty_Internal_Template $_smarty_tpl) {
?>
<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
	<?php if (!$_smarty_tpl->tpl_vars['main']->value) {
echo htmlspecialchars(str_repeat('- ',(2*$_smarty_tpl->tpl_vars['node']->value['currentDepth'])), ENT_QUOTES, 'UTF-8');
}?> <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['node']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

</option>
<?php if (count($_smarty_tpl->tpl_vars['node']->value['children']) > 0) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['node']->value['children'], 'child', false, NULL, 'categoryTreeBranch', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
				<?php $_smarty_tpl->_subTemplateRender("file:modules/possearchproducts/views/templates/front/category-tree-branch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'main'=>false), 0, true);
?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
