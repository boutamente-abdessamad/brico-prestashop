<?php
/* Smarty version 3.1.33, created on 2020-06-30 00:11:48
  from 'module:possearchproductsviewstem' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa75348c9460_25859257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9d6ed9a65d832439eb2d2c1033bbc69dd9aac0c' => 
    array (
      0 => 'module:possearchproductsviewstem',
      1 => 1593472238,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:modules/possearchproducts/views/templates/front/category-tree-branch.tpl' => 1,
  ),
),false)) {
function content_5efa75348c9460_25859257 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- pos search module TOP -->
<div id="_desktop_search_category"> 
	<div id="pos_search_top">
		<form method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_controller_url']->value, ENT_QUOTES, 'UTF-8');?>
" id="searchbox" class="form-inline form_search <?php if ($_smarty_tpl->tpl_vars['cate_on']->value == 1) {?>show-categories<?php }?>"  data-search-controller-url="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url_search']->value,'html' )), ENT_QUOTES, 'UTF-8');?>
">
			<label for="pos_query_top"><!-- image on background --></label>
			<input type="hidden" name="controller" value="search">  
			<div class="pos_search form-group">
				 <?php if ($_smarty_tpl->tpl_vars['cate_on']->value == 1) {?>
					<select class="bootstrap-select" name="poscats">
						<option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All categories','mod'=>'possearchproducts'),$_smarty_tpl ) );?>
</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories_option']->value['children'], 'child', false, NULL, 'categories_option', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
								<?php $_smarty_tpl->_subTemplateRender("file:modules/possearchproducts/views/templates/front/category-tree-branch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'main'=>true), 0, true);
?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				<?php }?> 
			</div>
			<input type="text" name="s" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_string']->value, ENT_QUOTES, 'UTF-8');?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enter your search key ... ','mod'=>'possearchproducts'),$_smarty_tpl ) );?>
" id="pos_query_top" class="search_query form-control ac_input" >
			<button type="submit" class="btn btn-default search_submit">
				<i class="icon-magnifier"></i>
			</button>
		</form>
	</div>
</div>

<!-- /pos search module TOP -->
<?php }
}
