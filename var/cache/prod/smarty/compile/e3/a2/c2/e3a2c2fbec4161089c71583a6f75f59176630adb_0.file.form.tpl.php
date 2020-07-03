<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:34:17
  from 'C:\wamp64\www\prestashop\modules\posrotatorimg\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7d095e0348_36013700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3a2c2fbec4161089c71583a6f75f59176630adb' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\posrotatorimg\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1593472237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe7d095e0348_36013700 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5938996115efe7d09519449_35388316', "field");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "description"} */
class Block_217455225efe7d095c7508_92332548 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['desc']) && !empty($_smarty_tpl->tpl_vars['input']->value['desc'])) {?>
				<p class="help-block">
					<?php if (is_array($_smarty_tpl->tpl_vars['input']->value['desc'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['desc'], 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
							<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)) {?>
								<span id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>
</span><br />
							<?php } else { ?>
								<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
<br />
							<?php }?>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php } else { ?>
						<?php echo $_smarty_tpl->tpl_vars['input']->value['desc'];?>

					<?php }?>
				</p>
			<?php }?>
		<?php
}
}
/* {/block "description"} */
/* {block "field"} */
class Block_5938996115efe7d09519449_35388316 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_5938996115efe7d09519449_35388316',
  ),
  'description' => 
  array (
    0 => 'Block_217455225efe7d095c7508_92332548',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'text') {?>											
	<div class="col-lg-<?php if (isset($_smarty_tpl->tpl_vars['input']->value['col'])) {
echo intval($_smarty_tpl->tpl_vars['input']->value['col']);
} else { ?>9<?php }
if (!isset($_smarty_tpl->tpl_vars['input']->value['label'])) {?> col-lg-offset-3<?php }?>">			
		<?php if (isset($_smarty_tpl->tpl_vars['input']->value['lang']) && $_smarty_tpl->tpl_vars['input']->value['lang']) {?>
		
		<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxchar']) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
		<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function(){
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
			countDown($("#<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>"), $("#<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];
}?>_counter"));
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		});
		<?php echo '</script'; ?>
>
		<?php }?>
		
		<?php } else { ?>
			
			<?php $_smarty_tpl->_assignInScope('value_text', $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]);?>
			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxchar']) || isset($_smarty_tpl->tpl_vars['input']->value['prefix']) || isset($_smarty_tpl->tpl_vars['input']->value['suffix'])) {?>
			<div class="input-group<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>">
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxchar']) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
			<span id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_counter" class="input-group-addon"><span class="text-count-down"><?php echo intval($_smarty_tpl->tpl_vars['input']->value['maxchar']);?>
</span></span>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['prefix'])) {?>
			<span class="input-group-addon">
			  <?php echo $_smarty_tpl->tpl_vars['input']->value['prefix'];?>

			</span>
			<?php }?>
			<input type="text"
				name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
				id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"
				value="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['string_format']) && $_smarty_tpl->tpl_vars['input']->value['string_format']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value),'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value_text']->value,'html','UTF-8' ));
}?>"
				class="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>"
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['size'])) {?> size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxchar']) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?> data-maxchar="<?php echo intval($_smarty_tpl->tpl_vars['input']->value['maxchar']);?>
"<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxlength']) && $_smarty_tpl->tpl_vars['input']->value['maxlength']) {?> maxlength="<?php echo intval($_smarty_tpl->tpl_vars['input']->value['maxlength']);?>
"<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['readonly']) && $_smarty_tpl->tpl_vars['input']->value['readonly']) {?> readonly="readonly"<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled']) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?> disabled="disabled"<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['autocomplete']) && !$_smarty_tpl->tpl_vars['input']->value['autocomplete']) {?> autocomplete="off"<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['required']) && $_smarty_tpl->tpl_vars['input']->value['required']) {?> required="required" <?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['input']->value['placeholder']) && $_smarty_tpl->tpl_vars['input']->value['placeholder']) {?> placeholder="<?php echo $_smarty_tpl->tpl_vars['input']->value['placeholder'];?>
"<?php }?>
				/>
			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['suffix'])) {?>
			<span class="input-group-addon">
			  <?php echo $_smarty_tpl->tpl_vars['input']->value['suffix'];?>

			</span>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxchar']) || isset($_smarty_tpl->tpl_vars['input']->value['prefix']) || isset($_smarty_tpl->tpl_vars['input']->value['suffix'])) {?>
			</div>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxchar']) && $_smarty_tpl->tpl_vars['input']->value['maxchar']) {?>
			<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function(){
				countDown($("#<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"), $("#<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>_counter"));
			});
			<?php echo '</script'; ?>
>
			<?php }?>
		<?php }?>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_217455225efe7d095c7508_92332548', "description", $this->tplIndex);
?>

		<?php echo '<script'; ?>
 type="text/javascript">
			var handle_font_style = function(){
					
				$('#image-box').removeClass();
			    var animation_style = $('#posrotatorimg_animation').val();
			    var animation_time = $('#posrotatorimg_time').val();
			    var animation1 = "an1";
			    var animation2 = "an2";
			    var animation3 = "an3";
			    var animation4 = "an4";
			    var animation5 = "an5";
			    var animation6 = "an6";
			    var animation7 = "an7";
			    var animation8 = "an8";
			    var animation9 = "an9";
			    var animation10 = "an10";
			    var animation11 = "an11";
			    var style;
			   switch(animation_style){
			        case "1":
			            style = animation1;
			            break;
			        case "2":
			            style = animation2;
			            break;
			        case "3":
			            style = animation3;   
			            break;
			        case "4":
			            style = animation4;   
			            break;
			        case "5":
			            style = animation5;   
			            break;
			        case "6":
			            style = animation6;
			            break;   
			        case "7":
			            style = animation7; 
			            break;  
			        case "8":
			            style = animation8; 
			            break;  
			        case "9":
			            style = animation9;  
			            break; 
			        case "10":
			            style = animation11; 
			            break;
			        case "11":
			            style = animation10; 
			            break;  

			   };
			   $('#image-box').addClass(style);
			    
			};
		<?php echo '</script'; ?>
>
	</div>
									
	<?php } else { ?>
		<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

	<?php }?>

<?php
}
}
/* {/block "field"} */
}
