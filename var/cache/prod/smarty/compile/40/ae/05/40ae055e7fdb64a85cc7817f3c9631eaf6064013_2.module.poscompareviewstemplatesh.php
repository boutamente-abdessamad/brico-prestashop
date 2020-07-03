<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:13:25
  from 'module:poscompareviewstemplatesh' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7825a7bb30_87871923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40ae055e7fdb64a85cc7817f3c9631eaf6064013' => 
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
function content_5efe7825a7bb30_87871923 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="_desktop_compare">
	<div class="compare_top">
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content_dir']->value, ENT_QUOTES, 'UTF-8');?>
module/poscompare/comparePage">
			<i class="icon-shuffle"></i><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compare','mod'=>'poscompare'),$_smarty_tpl ) );?>
 (<span
						id="poscompare-nb"></span>)</span>
		</a>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
var baseDir ='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content_dir']->value, ENT_QUOTES, 'UTF-8');?>
'; 
<?php echo '</script'; ?>
>
<?php }
}
