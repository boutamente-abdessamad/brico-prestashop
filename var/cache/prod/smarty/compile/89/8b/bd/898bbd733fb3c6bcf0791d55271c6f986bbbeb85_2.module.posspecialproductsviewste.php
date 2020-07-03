<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:13:26
  from 'module:posspecialproductsviewste' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe78260c58a9_15890598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '898bbd733fb3c6bcf0791d55271c6f986bbbeb85' => 
    array (
      0 => 'module:posspecialproductsviewste',
      1 => 1593472238,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/customize/button-cart.tpl' => 4,
    'file:catalog/_partials/variant-links.tpl' => 4,
  ),
),false)) {
function content_5efe78260c58a9_15890598 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<div class="pos-special-products " 
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
	<div class="pos_title">
		<?php if ($_smarty_tpl->tpl_vars['title']->value) {?>
			 <h2>
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

			</h2>
		<?php }?>		
		<?php if ($_smarty_tpl->tpl_vars['desc']->value) {?>
		<div class="desc_title">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['desc']->value, ENT_QUOTES, 'UTF-8');?>
 
		</div> 
		<?php }?>
	</div>

	<?php $_smarty_tpl->_assignInScope('rows', $_smarty_tpl->tpl_vars['slider_options']->value['rows']);?>
		<div class="row pos_content">
			<div class="special-item owl-carousel">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, NULL, 'myLoop', array (
  'index' => true,
  'first' => true,
  'iteration' => true,
  'last' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['total'];
?>
				<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['index'] : null)%$_smarty_tpl->tpl_vars['rows']->value == 0 || (isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['first'] : null)) {?>
				<div class="item-product">
				<?php }?>						
				
				 <!-- style products default -->
				 <?php if ($_smarty_tpl->tpl_vars['postheme']->value['grid_type'] == 0) {?>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19064886045efe7825de26e1_76674153', 'product_miniature_item');
?>

				 <!-- end style products default --> 
				 
				 <!-- style products default type 1 -->
				<?php } elseif ($_smarty_tpl->tpl_vars['postheme']->value['grid_type'] == 1) {?>
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1853549095efe7825e6e3d8_47936624', 'product_miniature_item');
?>

				 <!-- end style products default type 1 -->
				 
				  <!-- style products default type 2 -->
				<?php } elseif ($_smarty_tpl->tpl_vars['postheme']->value['grid_type'] == 2) {?>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10421528535efe7825ef39a8_97467996', 'product_miniature_item');
?>

				 <!-- end style products default type 2 -->
				 
				 <!-- style products default type 3 -->
				<?php } elseif ($_smarty_tpl->tpl_vars['postheme']->value['grid_type'] == 3) {?>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5564777455efe782603ccf2_36196090', 'product_miniature_item');
?>


				<?php }?>
				 <!-- end style products default type 3 --> 
				<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['iteration'] : null)%$_smarty_tpl->tpl_vars['rows']->value == 0 || (isset($_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_myLoop']->value['last'] : null)) {?>
				</div>
				<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
</div>

<?php }
/* {block 'product_thumbnail'} */
class Block_8799743065efe7825de6331_81769340 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
							  <img class="first-image "
							  src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
" 
								alt = "<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover']['legend'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');
}?>"
								data-full-size-image-url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
"
							  >
							   <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"rotatorImg",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
	
							</a>
						  <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'quick_view'} */
class Block_9261486115efe7825e09c77_56419715 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

									<a class="quick_view" href="#" data-link-action="quickview" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
">
									 <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
									</a>
									<?php
}
}
/* {/block 'quick_view'} */
/* {block 'product_price_and_shipping'} */
class Block_20094885195efe7825e0eb54_24416000 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping-top">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
									  <span class="discount-percentage discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'amount') {?>
									  <span class="discount-amount discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_amount_to_display'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php }?>
								  <?php }?>
								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_flags'} */
class Block_14181592815efe7825e1ce73_15419403 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<ul class="product-flag">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
								<li class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
							<?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_reviews'} */
class Block_15021064185efe7825e2b9e5_82082749 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="hook-reviews">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</div>
							<?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_name'} */
class Block_760231285efe7825e2e963_52504884 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <h3 itemprop="name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="product_name <?php if ($_smarty_tpl->tpl_vars['postheme']->value['name_length'] == 0) {?>one_line<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],50,'...' )), ENT_QUOTES, 'UTF-8');?>
</a></h3> 
							<?php
}
}
/* {/block 'product_name'} */
/* {block 'product_price_and_shipping'} */
class Block_7220408415efe7825e3ba52_01364639 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl ) );?>


									<span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regular price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
									<span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php }?>

								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl ) );?>


								  <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
								  <span itemprop="price" class="price <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>price-sale<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'unit_price'),$_smarty_tpl ) );?>


								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'weight'),$_smarty_tpl ) );?>

								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_description_short'} */
class Block_11734312445efe7825e5d720_63764268 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="product-desc" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
							<?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_variants'} */
class Block_11933027585efe7825e65407_01325789 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, true);
?>
							<?php }?>
							<?php
}
}
/* {/block 'product_variants'} */
/* {block 'product_miniature_item'} */
class Block_19064886045efe7825de26e1_76674153 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_19064886045efe7825de26e1_76674153',
  ),
  'product_thumbnail' => 
  array (
    0 => 'Block_8799743065efe7825de6331_81769340',
  ),
  'quick_view' => 
  array (
    0 => 'Block_9261486115efe7825e09c77_56419715',
  ),
  'product_price_and_shipping' => 
  array (
    0 => 'Block_20094885195efe7825e0eb54_24416000',
    1 => 'Block_7220408415efe7825e3ba52_01364639',
  ),
  'product_flags' => 
  array (
    0 => 'Block_14181592815efe7825e1ce73_15419403',
  ),
  'product_reviews' => 
  array (
    0 => 'Block_15021064185efe7825e2b9e5_82082749',
  ),
  'product_name' => 
  array (
    0 => 'Block_760231285efe7825e2e963_52504884',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_11734312445efe7825e5d720_63764268',
  ),
  'product_variants' => 
  array (
    0 => 'Block_11933027585efe7825e65407_01325789',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<article class="style_product_default product-miniature js-product-miniature item_in" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
						<div class="img_block">
						  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8799743065efe7825de6331_81769340', 'product_thumbnail', $this->tplIndex);
?>

							<ul class="add-to-links">
								<li class="cart">
									<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
								</li>
								<li>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</li>
								<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListCompare'),$_smarty_tpl ) );
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('displayProductListCompare', $_prefixVariable5);?>
								<?php if ($_smarty_tpl->tpl_vars['displayProductListCompare']->value) {?>
								<li class="compare">	
									 <a href="#" class="poscompare-add compare-button js-poscompare-add"  data-id_product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
"   onclick="posCompare.addCompare($(this),<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></a>
								</li>
								 <?php }?>
								<li class="quick-view">
									<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9261486115efe7825e09c77_56419715', 'quick_view', $this->tplIndex);
?>

								</li>
							</ul> 
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20094885195efe7825e0eb54_24416000', 'product_price_and_shipping', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14181592815efe7825e1ce73_15419403', 'product_flags', $this->tplIndex);
?>

						</div>
						<div class="product_desc">
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['id_manufacturer'])) {?>
							 <div class="manufacturer"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'manufacturer','id'=>$_smarty_tpl->tpl_vars['product']->value['id_manufacturer']),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars(Manufacturer::getnamebyid($_smarty_tpl->tpl_vars['product']->value['id_manufacturer']), ENT_QUOTES, 'UTF-8');?>
</a></div>
							<?php }?>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15021064185efe7825e2b9e5_82082749', 'product_reviews', $this->tplIndex);
?>
 
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_760231285efe7825e2e963_52504884', 'product_name', $this->tplIndex);
?>

						
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7220408415efe7825e3ba52_01364639', 'product_price_and_shipping', $this->tplIndex);
?>

							<div class="availability"> 
						   <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity'] > 0) {?>
								<div class="availability-list in-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In Stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div>

						   <?php } else { ?>

								<div class="availability-list out-of-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Out of stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div> 
							<?php }?>
							</div>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11734312445efe7825e5d720_63764268', 'product_description_short', $this->tplIndex);
?>

							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'timecountdown','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 
								<span id="future_date_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_category_default'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
								class="id_countdown"></span>
							<div class="clearfix"></div>
							<div class="variant-links">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11933027585efe7825e65407_01325789', 'product_variants', $this->tplIndex);
?>

							</div>
						
						</div>
					</article>
				<?php
}
}
/* {/block 'product_miniature_item'} */
/* {block 'product_thumbnail'} */
class Block_15729614495efe7825e71f02_16767046 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
							  <img class="first-image "
								src = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
" 
								alt = "<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover']['legend'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');
}?>"
								data-full-size-image-url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
"
							  >
							   <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"rotatorImg",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
	
							</a>
						  <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'quick_view'} */
class Block_18002183525efe7825e90f13_13436111 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

									<a class="quick_view" href="#" data-link-action="quickview" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
">
									 <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
									</a>
									<?php
}
}
/* {/block 'quick_view'} */
/* {block 'product_price_and_shipping'} */
class Block_1168059825efe7825e95094_57664841 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping-top">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
									  <span class="discount-percentage discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'amount') {?>
									  <span class="discount-amount discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_amount_to_display'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php }?>
								  <?php }?>
								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_flags'} */
class Block_8367731275efe7825ea1e68_78641098 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<ul class="product-flag">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
								<li class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
							<?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_reviews'} */
class Block_19490633615efe7825eb37a2_37125298 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="hook-reviews">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</div>
							<?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_name'} */
class Block_7138098655efe7825eb7208_56052001 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<h3 itemprop="name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="product_name <?php if ($_smarty_tpl->tpl_vars['postheme']->value['name_length'] == 0) {?>one_line<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],50,'...' )), ENT_QUOTES, 'UTF-8');?>
</a></h3>
							<?php
}
}
/* {/block 'product_name'} */
/* {block 'product_price_and_shipping'} */
class Block_2674329295efe7825ec2b18_74407256 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl ) );?>


									<span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regular price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
									<span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php }?>

								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl ) );?>


								  <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
								  <span itemprop="price" class="price <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>price-sale<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'unit_price'),$_smarty_tpl ) );?>


								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'weight'),$_smarty_tpl ) );?>

								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_description_short'} */
class Block_19247342485efe7825ee35f9_05928504 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="product-desc" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
							<?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_variants'} */
class Block_9520299255efe7825eeaa02_46390008 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, true);
?>
							<?php }?>
							<?php
}
}
/* {/block 'product_variants'} */
/* {block 'product_miniature_item'} */
class Block_1853549095efe7825e6e3d8_47936624 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_1853549095efe7825e6e3d8_47936624',
  ),
  'product_thumbnail' => 
  array (
    0 => 'Block_15729614495efe7825e71f02_16767046',
  ),
  'quick_view' => 
  array (
    0 => 'Block_18002183525efe7825e90f13_13436111',
  ),
  'product_price_and_shipping' => 
  array (
    0 => 'Block_1168059825efe7825e95094_57664841',
    1 => 'Block_2674329295efe7825ec2b18_74407256',
  ),
  'product_flags' => 
  array (
    0 => 'Block_8367731275efe7825ea1e68_78641098',
  ),
  'product_reviews' => 
  array (
    0 => 'Block_19490633615efe7825eb37a2_37125298',
  ),
  'product_name' => 
  array (
    0 => 'Block_7138098655efe7825eb7208_56052001',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_19247342485efe7825ee35f9_05928504',
  ),
  'product_variants' => 
  array (
    0 => 'Block_9520299255efe7825eeaa02_46390008',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<article class="product-miniature js-product-miniature style_product1" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
						<div class="img_block">
						  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15729614495efe7825e71f02_16767046', 'product_thumbnail', $this->tplIndex);
?>

							<ul class="add-to-links">
								<li>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</li>
								<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListCompare'),$_smarty_tpl ) );
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('displayProductListCompare', $_prefixVariable6);?>
								<?php if ($_smarty_tpl->tpl_vars['displayProductListCompare']->value) {?>
								<li class="compare">	
									 <a href="#" class="poscompare-add compare-button js-poscompare-add"  data-id_product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
"   onclick="posCompare.addCompare($(this),<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></a>
								</li>
								 <?php }?>
								<li class="quick-view">
									<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18002183525efe7825e90f13_13436111', 'quick_view', $this->tplIndex);
?>

								</li>
								
							</ul> 
							
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1168059825efe7825e95094_57664841', 'product_price_and_shipping', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8367731275efe7825ea1e68_78641098', 'product_flags', $this->tplIndex);
?>

						</div>
						<div class="product_desc">
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['id_manufacturer'])) {?>
							 <div class="manufacturer"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'manufacturer','id'=>$_smarty_tpl->tpl_vars['product']->value['id_manufacturer']),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars(Manufacturer::getnamebyid($_smarty_tpl->tpl_vars['product']->value['id_manufacturer']), ENT_QUOTES, 'UTF-8');?>
</a></div>
							<?php }?>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19490633615efe7825eb37a2_37125298', 'product_reviews', $this->tplIndex);
?>
 
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7138098655efe7825eb7208_56052001', 'product_name', $this->tplIndex);
?>

						
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2674329295efe7825ec2b18_74407256', 'product_price_and_shipping', $this->tplIndex);
?>

							<div class="cart">
								<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
							</div>
							<div class="availability"> 
						   <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity'] > 0) {?>
								<div class="availability-list in-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In Stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div>

						   <?php } else { ?>

								<div class="availability-list out-of-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Out of stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div> 
							<?php }?>
							</div>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19247342485efe7825ee35f9_05928504', 'product_description_short', $this->tplIndex);
?>

							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'timecountdown','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 
							<span id="future_date_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_category_default'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
							class="id_countdown"></span>
							<div class="clearfix"></div>
							<div class="variant-links">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9520299255efe7825eeaa02_46390008', 'product_variants', $this->tplIndex);
?>

							</div>
						
						</div>
					</article>
				<?php
}
}
/* {/block 'product_miniature_item'} */
/* {block 'product_thumbnail'} */
class Block_20124052135efe7825ef7504_15893098 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
							  <img class="first-image"
								src = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
								alt = "<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover']['legend'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');
}?>"
								data-full-size-image-url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
"
							  >
							   <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"rotatorImg",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
	
							</a>
						  <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'quick_view'} */
class Block_7069251955efe7825f1a460_77403134 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

									<a class="quick_view" href="#" data-link-action="quickview" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
">
									 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

									</a>
									<?php
}
}
/* {/block 'quick_view'} */
/* {block 'product_price_and_shipping'} */
class Block_18050970165efe7825f204e8_43983541 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping-top">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
									  <span class="discount-percentage discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'amount') {?>
									  <span class="discount-amount discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_amount_to_display'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php }?>
								  <?php }?>
								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_flags'} */
class Block_15487204845efe7825f2d356_98696149 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<ul class="product-flag">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
								<li class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
							<?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_reviews'} */
class Block_16915315155efe7825f3bd93_50249283 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="hook-reviews">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</div>
							<?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_name'} */
class Block_5481575805efe7825f408a9_24101190 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<h3 itemprop="name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="product_name <?php if ($_smarty_tpl->tpl_vars['postheme']->value['name_length'] == 0) {?>one_line<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],50,'...' )), ENT_QUOTES, 'UTF-8');?>
</a></h3>
							<?php
}
}
/* {/block 'product_name'} */
/* {block 'product_price_and_shipping'} */
class Block_20043930195efe782600b1d2_11759790 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl ) );?>


									<span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regular price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
									<span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php }?>

								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl ) );?>


								  <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
								  <span itemprop="price" class="price <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>price-sale<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'unit_price'),$_smarty_tpl ) );?>


								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'weight'),$_smarty_tpl ) );?>

								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_description_short'} */
class Block_10230795175efe782602b4a5_81903881 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="product-desc" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
							<?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_variants'} */
class Block_19513712025efe78260328b5_67468210 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, true);
?>
							<?php }?>
							<?php
}
}
/* {/block 'product_variants'} */
/* {block 'product_miniature_item'} */
class Block_10421528535efe7825ef39a8_97467996 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_10421528535efe7825ef39a8_97467996',
  ),
  'product_thumbnail' => 
  array (
    0 => 'Block_20124052135efe7825ef7504_15893098',
  ),
  'quick_view' => 
  array (
    0 => 'Block_7069251955efe7825f1a460_77403134',
  ),
  'product_price_and_shipping' => 
  array (
    0 => 'Block_18050970165efe7825f204e8_43983541',
    1 => 'Block_20043930195efe782600b1d2_11759790',
  ),
  'product_flags' => 
  array (
    0 => 'Block_15487204845efe7825f2d356_98696149',
  ),
  'product_reviews' => 
  array (
    0 => 'Block_16915315155efe7825f3bd93_50249283',
  ),
  'product_name' => 
  array (
    0 => 'Block_5481575805efe7825f408a9_24101190',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_10230795175efe782602b4a5_81903881',
  ),
  'product_variants' => 
  array (
    0 => 'Block_19513712025efe78260328b5_67468210',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<article class="product-miniature js-product-miniature style_product2" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
						<div class="img_block">
						  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20124052135efe7825ef7504_15893098', 'product_thumbnail', $this->tplIndex);
?>

							<ul class="add-to-links">
								<li>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</li>
								<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListCompare'),$_smarty_tpl ) );
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('displayProductListCompare', $_prefixVariable7);?>
								<?php if ($_smarty_tpl->tpl_vars['displayProductListCompare']->value) {?>
								<li class="compare">	
									 <a href="#" class="poscompare-add compare-button js-poscompare-add"  data-id_product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
"   onclick="posCompare.addCompare($(this),<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></a>
								</li>
								 <?php }?>
								<li class="quick-view">
									<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7069251955efe7825f1a460_77403134', 'quick_view', $this->tplIndex);
?>

								</li>
								<li class="cart"> 
									<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
								</li>
							</ul> 
						
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18050970165efe7825f204e8_43983541', 'product_price_and_shipping', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15487204845efe7825f2d356_98696149', 'product_flags', $this->tplIndex);
?>

						</div>
						<div class="product_desc">
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['id_manufacturer'])) {?>
							 <div class="manufacturer"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'manufacturer','id'=>$_smarty_tpl->tpl_vars['product']->value['id_manufacturer']),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars(Manufacturer::getnamebyid($_smarty_tpl->tpl_vars['product']->value['id_manufacturer']), ENT_QUOTES, 'UTF-8');?>
</a></div>
							<?php }?>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16915315155efe7825f3bd93_50249283', 'product_reviews', $this->tplIndex);
?>
 
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5481575805efe7825f408a9_24101190', 'product_name', $this->tplIndex);
?>

							
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20043930195efe782600b1d2_11759790', 'product_price_and_shipping', $this->tplIndex);
?>

							<div class="availability"> 
						   <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity'] > 0) {?>
								<div class="availability-list in-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In Stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div>

						   <?php } else { ?>

								<div class="availability-list out-of-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Out of stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div> 
							<?php }?>
							</div>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10230795175efe782602b4a5_81903881', 'product_description_short', $this->tplIndex);
?>

							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'timecountdown','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 
							<span id="future_date_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_category_default'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
							class="id_countdown"></span>
							<div class="clearfix"></div>
							<div class="variant-links">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19513712025efe78260328b5_67468210', 'product_variants', $this->tplIndex);
?>

							</div>
						
						</div>
					</article>
				<?php
}
}
/* {/block 'product_miniature_item'} */
/* {block 'product_thumbnail'} */
class Block_16799082925efe7826040fe6_28465620 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
							  <img class="first-image"
								src = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
" 
								alt = "<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover']['legend'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');
}?>"
								data-full-size-image-url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
"
							  >
							   <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"rotatorImg",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
	
							</a>
						  <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'quick_view'} */
class Block_18454917405efe7826060f50_24548566 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

									<a class="quick_view" href="#" data-link-action="quickview" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
">
									 <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
									</a>
									<?php
}
}
/* {/block 'quick_view'} */
/* {block 'product_price_and_shipping'} */
class Block_11421122505efe7826066660_33039580 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping-top">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
									  <span class="discount-percentage discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'amount') {?>
									  <span class="discount-amount discount-product"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_amount_to_display'], ENT_QUOTES, 'UTF-8');?>
</span>
									<?php }?>
								  <?php }?>
								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_flags'} */
class Block_21005802125efe7826073989_76738777 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<ul class="product-flag">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
								<li class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
							<?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_reviews'} */
class Block_6306080755efe7826083b76_33319090 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="hook-reviews">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</div>
							<?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_name'} */
class Block_8520103415efe78260879b5_80625071 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<h3 itemprop="name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="product_name <?php if ($_smarty_tpl->tpl_vars['postheme']->value['name_length'] == 0) {?>one_line<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],50,'...' )), ENT_QUOTES, 'UTF-8');?>
</a></h3>
							<?php
}
}
/* {/block 'product_name'} */
/* {block 'product_price_and_shipping'} */
class Block_8738751385efe7826091163_30227416 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							  <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
								<div class="product-price-and-shipping">
								  <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl ) );?>


									<span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regular price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
									<span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php }?>

								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl ) );?>


								  <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
								  <span itemprop="price" class="price <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>price-sale<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'unit_price'),$_smarty_tpl ) );?>


								  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'weight'),$_smarty_tpl ) );?>

								</div>
							  <?php }?>
							<?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_description_short'} */
class Block_21286466565efe78260aed44_02704602 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

								<div class="product-desc" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
							<?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_variants'} */
class Block_6146076075efe78260b6062_84748203 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, true);
?>
							<?php }?>
							<?php
}
}
/* {/block 'product_variants'} */
/* {block 'product_miniature_item'} */
class Block_5564777455efe782603ccf2_36196090 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_5564777455efe782603ccf2_36196090',
  ),
  'product_thumbnail' => 
  array (
    0 => 'Block_16799082925efe7826040fe6_28465620',
  ),
  'quick_view' => 
  array (
    0 => 'Block_18454917405efe7826060f50_24548566',
  ),
  'product_price_and_shipping' => 
  array (
    0 => 'Block_11421122505efe7826066660_33039580',
    1 => 'Block_8738751385efe7826091163_30227416',
  ),
  'product_flags' => 
  array (
    0 => 'Block_21005802125efe7826073989_76738777',
  ),
  'product_reviews' => 
  array (
    0 => 'Block_6306080755efe7826083b76_33319090',
  ),
  'product_name' => 
  array (
    0 => 'Block_8520103415efe78260879b5_80625071',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_21286466565efe78260aed44_02704602',
  ),
  'product_variants' => 
  array (
    0 => 'Block_6146076075efe78260b6062_84748203',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<article class="product-miniature js-product-miniature style_product3" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
						<div class="img_block">
						  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16799082925efe7826040fe6_28465620', 'product_thumbnail', $this->tplIndex);
?>

							<ul class="add-to-links">
								<li>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

								</li>
								<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListCompare'),$_smarty_tpl ) );
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('displayProductListCompare', $_prefixVariable8);?>
								<?php if ($_smarty_tpl->tpl_vars['displayProductListCompare']->value) {?>
								<li class="compare">	
									 <a href="#" class="poscompare-add compare-button js-poscompare-add"  data-id_product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
"   onclick="posCompare.addCompare($(this),<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to compare','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></a>
								</li>
								 <?php }?>
								<li class="quick-view">
									<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18454917405efe7826060f50_24548566', 'quick_view', $this->tplIndex);
?>

								</li>
								<li class="cart">
									<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
								</li>
							</ul> 
							
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11421122505efe7826066660_33039580', 'product_price_and_shipping', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21005802125efe7826073989_76738777', 'product_flags', $this->tplIndex);
?>

						</div>
						<div class="product_desc">
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['id_manufacturer'])) {?>
							 <div class="manufacturer"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'manufacturer','id'=>$_smarty_tpl->tpl_vars['product']->value['id_manufacturer']),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars(Manufacturer::getnamebyid($_smarty_tpl->tpl_vars['product']->value['id_manufacturer']), ENT_QUOTES, 'UTF-8');?>
</a></div>
							<?php }?>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6306080755efe7826083b76_33319090', 'product_reviews', $this->tplIndex);
?>
 
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8520103415efe78260879b5_80625071', 'product_name', $this->tplIndex);
?>

						
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8738751385efe7826091163_30227416', 'product_price_and_shipping', $this->tplIndex);
?>

							<div class="availability"> 
						   <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity'] > 0) {?>
								<div class="availability-list in-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In Stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div>

						   <?php } else { ?>

								<div class="availability-list out-of-stock"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Availability','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
: <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Out of stock','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span></div> 
							<?php }?>
							</div>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21286466565efe78260aed44_02704602', 'product_description_short', $this->tplIndex);
?>

							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'timecountdown','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 
							<span id="future_date_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_category_default'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
							class="id_countdown"></span>
							<div class="clearfix"></div>
							<div class="variant-links">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6146076075efe78260b6062_84748203', 'product_variants', $this->tplIndex);
?>

							</div>
						
						</div>
					</article>
					<?php
}
}
/* {/block 'product_miniature_item'} */
}
