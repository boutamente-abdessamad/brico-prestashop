<?php
/* Smarty version 3.1.33, created on 2020-06-30 21:21:48
  from 'module:posstaticfooterviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efb9edc99b1b9_62947218',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de0905da7bec54667ca447ad41282d3dac240189' => 
    array (
      0 => 'module:posstaticfooterviewstempl',
      1 => 1593472238,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efb9edc99b1b9_62947218 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['footerBlocks']->value, 'footerBlock');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['footerBlock']->value) {
?>
<div class="col-md-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['width'], ENT_QUOTES, 'UTF-8');?>
 links footer_block">
<?php if ($_smarty_tpl->tpl_vars['footerBlock']->value['active_title'] == 1) {?>
	<h3 class=" hidden-sm-down"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h3>
	<div class="title clearfix hidden-md-up" data-target="#footer_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['id'], ENT_QUOTES, 'UTF-8');?>
" data-toggle="collapse">
		<h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h3>
		<span class="float-xs-right">
			<span class="navbar-toggler collapse-icons">
				<i class="material-icons add">keyboard_arrow_down</i>
				<i class="material-icons remove">keyboard_arrow_up</i>
			</span>
		</span>
	</div>
  <?php if ($_smarty_tpl->tpl_vars['footerBlock']->value['type_content'] == 0) {?>
    <ul id="footer_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="collapse footer_list">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['footerBlock']->value['links'], 'link');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
?>
	
        <li>
          <a
            id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['id'], ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
            class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['class'], ENT_QUOTES, 'UTF-8');?>
"
            href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
            title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['description'], ENT_QUOTES, 'UTF-8');?>
"
            <?php if (!empty($_smarty_tpl->tpl_vars['link']->value['target'])) {?> target="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['target'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>
          >
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['title'], ENT_QUOTES, 'UTF-8');?>

          </a>
        </li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
  <?php } else { ?>
   <div id="footer_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="collapse footer_list">
    <?php echo $_smarty_tpl->tpl_vars['footerBlock']->value['html_content'];?>

    <?php if ($_smarty_tpl->tpl_vars['footerBlock']->value['module_content']) {?>
      <?php echo $_smarty_tpl->tpl_vars['footerBlock']->value['module_content'];?>

    <?php }?>
	</div>	
  <?php }
} else { ?>
  <?php if ($_smarty_tpl->tpl_vars['footerBlock']->value['type_content'] == 0) {?>
    <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['footerBlock']->value['links'], 'link');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
?>
        <li>
          <a
            id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['id'], ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['footerBlock']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
            class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['class'], ENT_QUOTES, 'UTF-8');?>
"
            href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
            title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['description'], ENT_QUOTES, 'UTF-8');?>
"
            <?php if (!empty($_smarty_tpl->tpl_vars['link']->value['target'])) {?> target="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['target'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>
          >
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['title'], ENT_QUOTES, 'UTF-8');?>

          </a>
        </li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
  <?php } else { ?>
    <?php echo $_smarty_tpl->tpl_vars['footerBlock']->value['html_content'];?>

    <?php if ($_smarty_tpl->tpl_vars['footerBlock']->value['module_content']) {?>
      <?php echo $_smarty_tpl->tpl_vars['footerBlock']->value['module_content'];?>

    <?php }?>
  <?php }
}?>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
