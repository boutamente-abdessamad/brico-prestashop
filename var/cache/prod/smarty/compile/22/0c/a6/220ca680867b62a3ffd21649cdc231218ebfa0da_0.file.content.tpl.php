<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:28:36
  from 'C:\wamp64\www\prestashop\admin158uvqu32\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7bb406c5b2_06649451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '220ca680867b62a3ffd21649cdc231218ebfa0da' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\admin158uvqu32\\themes\\default\\template\\content.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe7bb406c5b2_06649451 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
