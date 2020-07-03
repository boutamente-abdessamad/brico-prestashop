<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:13:27
  from 'module:pscontactinfonav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7827b75e53_05641900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0eb2119957cbc13b240126b3ccd8fac8f109f1e2' => 
    array (
      0 => 'module:pscontactinfonav.tpl',
      1 => 1593472241,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe7827b75e53_05641900 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="_desktop_contact_link">
  <div class="contact-link">
	<?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['phone']) {?>
	<div class="data phone">
		<a href="tel:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['phone'], ENT_QUOTES, 'UTF-8');?>
"><i class="icon-call-in"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['phone'], ENT_QUOTES, 'UTF-8');?>
</a> 
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['email']) {?>
	<div class="data email">
	 <a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['email'], ENT_QUOTES, 'UTF-8');?>
"><i class="icon-envelope"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['email'], ENT_QUOTES, 'UTF-8');?>
</a>
	</div>
	<?php }?>
  </div>
</div>
<?php }
}
