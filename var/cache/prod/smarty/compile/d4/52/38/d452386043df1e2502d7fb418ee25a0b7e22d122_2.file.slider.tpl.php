<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:13:28
  from 'C:\wamp64\www\prestashop\modules\posslideshows\views\templates\hook\slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe782880aaf1_40934080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd452386043df1e2502d7fb418ee25a0b7e22d122' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\posslideshows\\views\\templates\\hook\\slider.tpl',
      1 => 1593472238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe782880aaf1_40934080 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['homeslider']->value['slides']) {?>
<div class="slideshow_container" data-speed="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['speed'], ENT_QUOTES, 'UTF-8');?>
" data-time="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['time'], ENT_QUOTES, 'UTF-8');?>
" data-nav="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['nav'], ENT_QUOTES, 'UTF-8');?>
" data-pag="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['pag'], ENT_QUOTES, 'UTF-8');?>
" data-pausehover="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['pause_on_hover'], ENT_QUOTES, 'UTF-8');?>
">
	<div class="pos-slideshow">
		<div class="flexslider ma-nivoslider">
			<div class="pos-loading"><span></span><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['first_load_image'], ENT_QUOTES, 'UTF-8');?>
" alt="" /></div>
			<div id="pos-slideshow-home" class="slides">
				
				<?php $_smarty_tpl->_assignInScope('count', 0);?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['homeslider']->value['slides'], 'slide', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['slide']->value) {
?>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8');?>
" ><img style="display:none" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
"  data-thumb="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
"  alt="" title="#htmlcaption<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['id_slide'], ENT_QUOTES, 'UTF-8');?>
"  /> </a>
			   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['homeslider']->value['show_caption'] != 0) {?>
				<?php $_smarty_tpl->_assignInScope('count_id', 0);?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['homeslider']->value['slides'], 'slide', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['slide']->value) {
?>
					<div id="htmlcaption<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['id_slide'], ENT_QUOTES, 'UTF-8');?>
" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['time'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
								-moz-animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['time'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
								-ms-animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['time'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
								animation: myfirst <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeslider']->value['time'], ENT_QUOTES, 'UTF-8');?>
ms ease-in-out;
							
							">
							</div>
							<?php if ($_smarty_tpl->tpl_vars['slide']->value['cap_position'] == 1) {?>
								<?php $_smarty_tpl->_assignInScope('position_slide', 'position_left');?>
							<?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['cap_position'] == 2) {?>
								<?php $_smarty_tpl->_assignInScope('position_slide', 'position_center');?>					
							<?php } else { ?>
								<?php $_smarty_tpl->_assignInScope('position_slide', 'position_right');?> 
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['slide']->value['description']) {?>
							<div class="banner7-des">
								<div class="container">
									<div class="desc_slideshow desc_slideshow_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_id']->value, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['position_slide']->value, ENT_QUOTES, 'UTF-8');?>
">
									<div class="info">
										<?php $_smarty_tpl->_assignInScope('count_transition', 0);?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slide']->value['description'], 'description');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['description']->value) {
?>
											<?php if ($_smarty_tpl->tpl_vars['description']->value['animation'] == 0) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'bounceIn');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 1) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'bounceInDown');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 2) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'bounceInLeft');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 3) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'bounceInRight');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 4) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'bounceInUp');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 5) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'fadeIn');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 6) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'fadeInDown');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 7) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'fadeInLeft');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 8) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'fadeInRight');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 9) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'fadeInUp');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 10) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'zoomIn');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 11) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'zoomInDown');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 12) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'zoomInLeft');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 13) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'zoomInRight');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 14) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'zoomInUp');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 15) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'rotateIn');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 16) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'rotateInDownLeft');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 17) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'rotateInDownRight');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 18) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'rotateInUpLeft');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 19) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'rotateInUpRight');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 20) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'pulse');?>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 21) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'flipInX');?>	
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['animation'] == 22) {?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'jackInTheBox');?>
											<?php } else { ?>
												<?php $_smarty_tpl->_assignInScope('animation_class', 'rollIn');?> 
											<?php }?>
											
											<?php if ($_smarty_tpl->tpl_vars['description']->value['display'] == 0) {?>
												<h2 data-animation="animated <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['animation_class']->value, ENT_QUOTES, 'UTF-8');?>
 " class="transition_slide_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_transition']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h2>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['display'] == 1) {?>
												<h3 data-animation="animated <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['animation_class']->value, ENT_QUOTES, 'UTF-8');?>
 " class="transition_slide_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_transition']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h3>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['display'] == 2) {?>
												<h4 data-animation="animated <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['animation_class']->value, ENT_QUOTES, 'UTF-8');?>
 " class="transition_slide_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_transition']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h4>
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['display'] == 3) {?>
												<h5 data-animation="animated <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['animation_class']->value, ENT_QUOTES, 'UTF-8');?>
 " class="transition_slide_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_transition']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h5>											
											<?php } elseif ($_smarty_tpl->tpl_vars['description']->value['display'] == 4) {?>
												<p data-animation="animated <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['animation_class']->value, ENT_QUOTES, 'UTF-8');?>
 " class="transition_slide_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_transition']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value['title'], ENT_QUOTES, 'UTF-8');?>
</p>
											<?php } else { ?>
												<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8');?>
" data-animation="animated <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['animation_class']->value, ENT_QUOTES, 'UTF-8');?>
" class="readmore transition_slide_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_transition']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a>
											<?php }?>
									
											<?php $_smarty_tpl->_assignInScope('count_transition', $_smarty_tpl->tpl_vars['count_transition']->value+1);?>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
									</div>
								</div> 
							</div>
							<?php }?>
					</div>
					<?php $_smarty_tpl->_assignInScope('count_id', $_smarty_tpl->tpl_vars['count_id']->value+1);?>
				 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			 <?php }?>
		</div>
	</div>
</div>

<?php }?>
 <?php echo '<script'; ?>
 type="text/javascript">
 $(document).ready(function() {
	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	//Variables on page load 
	var $myCarousel = $('.ma-nivoslider'),
		$firstAnimatingElems = $myCarousel.find('.nivo-caption').find("[data-animation ^= 'animated']");
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);

});
<?php echo '</script'; ?>
><?php }
}
