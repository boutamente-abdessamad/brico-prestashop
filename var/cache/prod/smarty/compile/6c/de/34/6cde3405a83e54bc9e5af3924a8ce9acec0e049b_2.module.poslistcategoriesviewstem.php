<?php
/* Smarty version 3.1.33, created on 2020-06-30 00:11:49
  from 'module:poslistcategoriesviewstem' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa7535551797_49698983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cde3405a83e54bc9e5af3924a8ce9acec0e049b' => 
    array (
      0 => 'module:poslistcategoriesviewstem',
      1 => 1593472241,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efa7535551797_49698983 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="poslistcategories">
	<div class="pos_title">
		<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Popular Categories','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</h2>  
	</div>
	<div class="row pos_content">
		<div class="block_content owl-carousel">
		<?php $_smarty_tpl->_assignInScope('count', 0);?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category', false, NULL, 'myLoop', array (
  'index' => true,
  'first' => true,
  'iteration' => true,
  'last' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['total'];
?>
			<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index'] : null)%1 == 0 || (isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first'] : null)) {?>
			<div class="item-listcategories">
			<?php }?>	
				<div class="list-categories">
					<?php if ($_smarty_tpl->tpl_vars['category']->value['image']) {?>
					<div class="thumb-category">
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category']), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."poslistcategories/images/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['category']->value['image'],'htmlall','UTF-8' ))))), ENT_QUOTES, 'UTF-8');?>
" alt="" /></a>
						<div class="name_categories">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category']), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['category_name'], ENT_QUOTES, 'UTF-8');?>
</a>				
						</div>
					</div>
					<?php }?>
					<div class="desc-listcategoreis">				
						<div class="sub">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['list_subcategories'], 'subcategory');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subcategory']->value) {
?>
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcategory']->value['id_category']), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['category']->value['description']) {?>
						<div class="description-list">
							<div class="desc-content">
								<?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>

							</div>
								
						</div>
						<?php }?>
					</div>	
									
				</div>	
			<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration'] : null)%1 == 0 || (isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last'] : null)) {?>
			</div>
			<?php }?>			
			<?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>		
		</div>
	</div>	
</div>


<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() {
		var poslistcategories = $(".poslistcategories .block_content");
		poslistcategories.owlCarousel({
			autoplay :  <?php if ($_smarty_tpl->tpl_vars['slider_options']->value['auto_play']) {
if ($_smarty_tpl->tpl_vars['slider_options']->value['delay']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['delay'], ENT_QUOTES, 'UTF-8');
} else { ?>3000<?php }
} else { ?> false<?php }?>,
			smartSpeed : <?php if ($_smarty_tpl->tpl_vars['slider_options']->value['speed_slide']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['speed_slide'], ENT_QUOTES, 'UTF-8');
} else { ?>1000<?php }?>,
			nav : <?php if ($_smarty_tpl->tpl_vars['slider_options']->value['show_arrow']) {?> true <?php } else { ?> false <?php }?>,
			dots : <?php if ($_smarty_tpl->tpl_vars['slider_options']->value['show_pagination']) {?> true <?php } else { ?> false <?php }?>,
			responsive:{
				0:{
					items:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_xxs'], ENT_QUOTES, 'UTF-8');?>
,
				},
				360:{
					items:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_xs'], ENT_QUOTES, 'UTF-8');?>
,
				},
				576:{
					items:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_sm'], ENT_QUOTES, 'UTF-8');?>
,
	
				},
				768:{
					items:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_md'], ENT_QUOTES, 'UTF-8');?>
,
				},
				992:{
					items:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['items_lg'], ENT_QUOTES, 'UTF-8');?>
,
				},
				1200:{
					items:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider_options']->value['number_item'], ENT_QUOTES, 'UTF-8');?>
,
				}
			}
		});
		checkClasses();
		poslistcategories.on('translated.owl.carousel', function(event) {
			checkClasses();
		});

		function checkClasses(){
			var total = $('.poslistcategories .item-listcategories .owl-stage .owl-item.active').length;
			$('.poslistcategories ').each(function(){
				$(this).find('.owl-item').removeClass('firstActiveItem');
				$(this).find('.owl-item').removeClass('lastActiveItem');
				$(this).find('.owl-item.active').each(function(index){
					if (index === 0) { $(this).addClass('firstActiveItem'); }
					if (index === total - 1 && total>1) {
						$(this).addClass('lastActiveItem');
					}
				})  
			});
		}
	});
<?php echo '</script'; ?>
>
<?php }
}
