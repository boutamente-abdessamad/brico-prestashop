<?php
/* Smarty version 3.1.33, created on 2020-07-01 23:13:07
  from 'C:\wamp64\www\prestashop\themes\theme_madina1\templates\catalog\_partials\product-cover-thumbnails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efd0a73261b86_70215903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57c5ffa21ddb9459c88aff30633699c6141ca269' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\theme_madina1\\templates\\catalog\\_partials\\product-cover-thumbnails.tpl',
      1 => 1593472241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efd0a73261b86_70215903 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if ($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'] == 0) {?>
	<div class="images-container">
	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17042070345efd0a730f10f1_44873485', 'product_cover');
?>


	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19774369495efd0a7313aa17_27937079', 'product_images');
?>

	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'] == 1) {?>
	<div class="images-container left_vertical"> 
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7116799015efd0a7316afa5_26546989', 'product_images');
?>

	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7933099665efd0a73193c81_06793051', 'product_cover');
?>

	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'] == 2) {?>
	<div class="images-container right_vertical"> 
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11434758585efd0a731e0062_55813314', 'product_images');
?>

	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10973641235efd0a73206c47_17362999', 'product_cover');
?>

	</div> 
<?php }?>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAfterProductThumbs'),$_smarty_tpl ) );?>


 <?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() {
	$('.images-container .slider-for').slick({
	   slidesToShow: 1,
	   slidesToScroll: 1,
	   focusOnSelect: true,
	   arrows: true, 
	   fade: true,
	   infinite: true,
	   lazyLoad: 'ondemand',
	   asNavFor: '.slider-nav'
	 });
	  if (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'], ENT_QUOTES, 'UTF-8');?>
 == 0) {
		 $('.images-container .slider-nav').slick({
		   slidesToShow: 4,
		   slidesToScroll: 1,
		   asNavFor: '.slider-for',
		   dots: false, 
		   arrows: true, 
		   infinite: true,
		   focusOnSelect: true
		 });
	 }else {
	 $('.images-container .slider-nav').slick({
	   slidesToShow: 4,
	   slidesToScroll: 1,
	   asNavFor: '.slider-for',
	   vertical:true,
	   dots: false, 
	   arrows: true, 
	   infinite: true,
	   focusOnSelect: true,
	   responsive: [
	   	{
		  breakpoint: 991,
		  settings: {
			slidesToShow: 2, 
			slidesToScroll: 1,
		  }
		},
		{
		  breakpoint: 767,
		  settings: {
			slidesToShow: 4, 
			slidesToScroll: 1,
		  }
		},
		{
		  breakpoint: 543,
		  settings: {
			slidesToShow: 3, 
			slidesToScroll: 1,
		  }
		},
		{
		  breakpoint: 399,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 1, 
		  }
		}
		]
	 });
	 }
	 
	 $('.images-container .slider-for').slickLightbox({
			src: 'src',
			itemSelector: '.thumb-item img'
	 });
	 	if($(window).width() >= 992) 
		{
			var $easyzoom = $('.images-container .easyzoom').easyZoom(); 
		}
	$(window).resize(function(){
		if($(window).width() >= 992)
		{
			 var $easyzoom = $('.images-container .easyzoom').easyZoom();  
			$('.easyzoom--overlay').addClass('easyzoom');
		}
		else
		{
			$('.easyzoom--overlay').removeClass('easyzoom'); 	
		}
	});
});
<?php echo '</script'; ?>
><?php }
/* {block 'product_flags'} */
class Block_10105538425efd0a730f5092_67954200 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<ul class="product-flag">
			  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
				<li class=" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
			  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		  <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_cover'} */
class Block_17042070345efd0a730f10f1_44873485 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_17042070345efd0a730f10f1_44873485',
  ),
  'product_flags' => 
  array (
    0 => 'Block_10105538425efd0a730f5092_67954200',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="product-view_content">
		  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10105538425efd0a730f5092_67954200', 'product_flags', $this->tplIndex);
?>

		<div class="product-cover slider-for">
		 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
		 <div class="thumb-item">
		  <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
		  <div class="easyzoom easyzoom--overlay">
		  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
		   <img class=""  style="width:100%;" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
		  </a>
		  </div>

		  <?php } else { ?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;">
		  <?php }?>
		   </div>
		 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		</div>
	  <?php
}
}
/* {/block 'product_cover'} */
/* {block 'product_images'} */
class Block_19774369495efd0a7313aa17_27937079 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_19774369495efd0a7313aa17_27937079',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		  <ul class="product-images slider-nav">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
			  <div class="thumb-container">
				<div>
				<img
				  class="thumb js-thumb <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] == $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
				  src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
				  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  width="100"
				  itemprop="image"
				>
				</div>
			  </div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		  </ul>

	  <?php
}
}
/* {/block 'product_images'} */
/* {block 'product_images'} */
class Block_7116799015efd0a7316afa5_26546989 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_7116799015efd0a7316afa5_26546989',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<ul class="product-images slider-nav">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
			<div class="thumb-container">
				<div>
				<img 
				  class="thumb js-thumb <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] == $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
				  src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
				  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  itemprop="image"
				>
				</div>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
		<?php
}
}
/* {/block 'product_images'} */
/* {block 'product_flags'} */
class Block_10533414045efd0a73196f29_22665057 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<ul class="product-flag">
			  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
				<li class=" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
			  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		  <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_cover'} */
class Block_7933099665efd0a73193c81_06793051 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_7933099665efd0a73193c81_06793051',
  ),
  'product_flags' => 
  array (
    0 => 'Block_10533414045efd0a73196f29_22665057',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	   <div class="product-view_content">
		  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10533414045efd0a73196f29_22665057', 'product_flags', $this->tplIndex);
?>

		<div class="product-cover slider-for">
		 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
		 <div class="thumb-item">
		  <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
		  <div class="easyzoom easyzoom--overlay">
		  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
		   <img class=""  style="width:100%;" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
		  </a>
		  </div>

		  <?php } else { ?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;">
		  <?php }?>
		   </div>
		 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		</div>
	  <?php
}
}
/* {/block 'product_cover'} */
/* {block 'product_images'} */
class Block_11434758585efd0a731e0062_55813314 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_11434758585efd0a731e0062_55813314',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<ul class="product-images slider-nav">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
			<div class="thumb-container">
				<div>
				<img 
				  class="thumb js-thumb <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] == $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
				  src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
				  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  itemprop="image"
				>
				</div>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
		<?php
}
}
/* {/block 'product_images'} */
/* {block 'product_flags'} */
class Block_5714897555efd0a73209b10_50740755 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<ul class="product-flag">
			  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
				<li class=" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
			  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		  <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_cover'} */
class Block_10973641235efd0a73206c47_17362999 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_10973641235efd0a73206c47_17362999',
  ),
  'product_flags' => 
  array (
    0 => 'Block_5714897555efd0a73209b10_50740755',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	   <div class="product-view_content">
		  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5714897555efd0a73209b10_50740755', 'product_flags', $this->tplIndex);
?>

		<div class="product-cover slider-for">
		 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
		 <div class="thumb-item">
		  <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
		  <div class="easyzoom easyzoom--overlay">
		  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
		   <img class=""  style="width:100%;" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
		  </a>
		  </div>

		  <?php } else { ?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;">
		  <?php }?>
		   </div>
		 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		</div>
	  <?php
}
}
/* {/block 'product_cover'} */
}
