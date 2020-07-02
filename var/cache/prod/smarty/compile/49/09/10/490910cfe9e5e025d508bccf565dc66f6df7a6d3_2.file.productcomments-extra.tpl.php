<?php
/* Smarty version 3.1.33, created on 2020-07-01 23:13:07
  from 'C:\wamp64\www\prestashop\modules\productcomments\productcomments-extra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efd0a73c5d1c9_77667968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '490910cfe9e5e025d508bccf565dc66f6df7a6d3' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\productcomments\\productcomments-extra.tpl',
      1 => 1593472239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efd0a73c5d1c9_77667968 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php if (((($_smarty_tpl->tpl_vars['nbComments_extra']->value == 0 && $_smarty_tpl->tpl_vars['too_early']->value == false && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value)) || ($_smarty_tpl->tpl_vars['nbComments_extra']->value != 0)))) {?>
<div id="product_comments_block_extra" class="no-print" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
	<?php if ($_smarty_tpl->tpl_vars['nbComments_extra']->value != 0) {?>
		<div class="comments_note clearfix">
			<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Rating','mod'=>'productcomments'),$_smarty_tpl ) );?>
&nbsp;</span>
			<div class="star_content clearfix">
				<?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= 5; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> 
					<?php if ($_smarty_tpl->tpl_vars['averageTotal_extra']->value <= (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
						<div class="star"></div>
					<?php } else { ?>
						<div class="star star_on"></div>
					<?php }?>
				<?php
}
}
?>
				<meta itemprop="worstRating" content = "0" />
				<meta itemprop="ratingValue" content = "<?php if (isset($_smarty_tpl->tpl_vars['ratings']->value['avg'])) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( round($_smarty_tpl->tpl_vars['ratings']->value['avg'],1),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( round($_smarty_tpl->tpl_vars['averageTotal_extra']->value,1),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>" />
				<meta itemprop="bestRating" content = "5" />
			</div>
		</div> <!-- .comments_note -->
	<?php }?>

	<ul class="comments_advices">
		<?php if ($_smarty_tpl->tpl_vars['nbComments_extra']->value != 0) {?>
			<li>
				<a href="#idTab5" class="reviews" >
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read reviews','mod'=>'productcomments'),$_smarty_tpl ) );?>
 (<span itemprop="reviewCount"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nbComments_extra']->value, ENT_QUOTES, 'UTF-8');?>
</span>)
				</a>
			</li>
		<?php }?>
		<?php if (($_smarty_tpl->tpl_vars['too_early']->value == false && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
			<li>
				<a class="open-comment-form">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write a review','mod'=>'productcomments'),$_smarty_tpl ) );?>

				</a>
			</li>
		<?php }?>
	</ul>
</div>
<?php }?>
<!--  /Module ProductComments -->
<?php }
}
