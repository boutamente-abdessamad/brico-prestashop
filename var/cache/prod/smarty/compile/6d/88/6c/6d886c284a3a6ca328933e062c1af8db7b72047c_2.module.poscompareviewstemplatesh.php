<?php
/* Smarty version 3.1.33, created on 2020-06-30 00:11:49
  from 'module:poscompareviewstemplatesh' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa7535d53d59_90614234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d886c284a3a6ca328933e062c1af8db7b72047c' => 
    array (
      0 => 'module:poscompareviewstemplatesh',
      1 => 1593472237,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efa7535d53d59_90614234 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="poscompare-notification" class="">
    <div class="notification-inner">
        <span class="notification-title"><i class="fa fa-check" aria-hidden="true"></i>  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product added to compare.','mod'=>'poscompare'),$_smarty_tpl ) );?>
</span>
    </div>
</div><?php }
}
