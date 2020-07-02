<?php
/* Smarty version 3.1.33, created on 2020-06-30 00:11:47
  from 'module:postabcatesliderviewstemp' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa753319a700_93677010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2e0219d98a8a7b8c465f25e9a624c1e306ff92d' => 
    array (
      0 => 'module:postabcatesliderviewstemp',
      1 => 1593472241,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efa753319a700_93677010 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var baseDir ='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content_dir']->value, ENT_QUOTES, 'UTF-8');?>
';
<?php echo '</script'; ?>
> 
<div class="tab-category-container-slider"  
	data-items="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['number_item'], ENT_QUOTES, 'UTF-8');?>
" 
	data-speed="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['speed_slide'], ENT_QUOTES, 'UTF-8');?>
"
	data-autoplay="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['auto_play'], ENT_QUOTES, 'UTF-8');?>
"
	data-time="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['auto_time'], ENT_QUOTES, 'UTF-8');?>
"
	data-arrow="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['show_arrow'], ENT_QUOTES, 'UTF-8');?>
"
	data-pagination="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['show_pagination'], ENT_QUOTES, 'UTF-8');?>
"
	data-move="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['move'], ENT_QUOTES, 'UTF-8');?>
"
	data-pausehover="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['pausehover'], ENT_QUOTES, 'UTF-8');?>
"
	data-lg="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_lg'], ENT_QUOTES, 'UTF-8');?>
"
	data-md="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_md'], ENT_QUOTES, 'UTF-8');?>
"
	data-sm="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_sm'], ENT_QUOTES, 'UTF-8');?>
"
	data-xs="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_xs'], ENT_QUOTES, 'UTF-8');?>
"
	data-xxs="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_xxs'], ENT_QUOTES, 'UTF-8');?>
">
	<div class="tab-category">
		<div class="pos_title">
			<?php if ($_smarty_tpl->tpl_vars['title']->value) {?>
			<h2>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
</span>
			</h2>	
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['desc']->value) {?>
			<div class="desc_title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['desc']->value, ENT_QUOTES, 'UTF-8');?>
</div>
			<?php }?>
			<ul class="tab_cates  hidden-md-down"> 
			<?php $_smarty_tpl->_assignInScope('count', 0);?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productCates']->value, 'productCate', false, NULL, 'postabcateslider', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['productCate']->value) {
?>
					<li data-title="tabtitle_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['id'], ENT_QUOTES, 'UTF-8');?>
" data-cate_id ="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['id'], ENT_QUOTES, 'UTF-8');?>
" rel="tab_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['count']->value == 0) {?> class="active"  <?php }?> > 
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
					</li>
					<?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>	
			</ul>
			<div class="cate_mobile btn-group hidden-lg-up">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						
				  </button>
				  <ul class="tab_cates dropdown-menu">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productCates']->value, 'productCate', false, NULL, 'postabcateslider', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['productCate']->value) {
?>
					<li data-title="tabtitle_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['id'], ENT_QUOTES, 'UTF-8');?>
" data-cate_id ="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['id'], ENT_QUOTES, 'UTF-8');?>
" rel="tab_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['count']->value == 0) {?> class="active"  <?php }?> > 
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productCate']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
					</li>
					<?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				  </ul>
			</div>
		</div>
		
		
		<div class="row pos_content pos_content_product_cate">	

		</div>
	</div>	
</div>	

<?php }
}
