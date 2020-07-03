<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:34:43
  from 'C:\wamp64\www\prestashop\modules\posfeaturedproducts\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7d2312da84_09707950',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e72c9392c97f959b41531a90fbfa0f6c6a999225' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\posfeaturedproducts\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1593472237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe7d2312da84_09707950 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14820300385efe7d230618f3_27603222', "field");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "field"} */
class Block_14820300385efe7d230618f3_27603222 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_14820300385efe7d230618f3_27603222',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'file_lang') {?>
		<div class="col-lg-9">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
				<?php }?>
				<div class="form-group">
					<div class="col-lg-6">
						<input id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" class="hide" />
						<div class="dummyfile input-group">
							<span class="input-group-addon"><i class="icon-file"></i></span>
							<input id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-name" type="text" class="disabled" name="filename" readonly />
						<span class="input-group-btn">
								<button id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
									<i class="icon-folder-open"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose a file','mod'=>'blockbanner'),$_smarty_tpl ) );?>

								</button>
							</span>
						</div>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
);" tabindex="-1"><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</a></li>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
				</div>
				<div class="form-group">
					<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']]) && $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']] != '') {?>
					<div id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-images-thumbnails" class="col-lg-12">
						<img src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
img/<?php echo $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']];?>
" class="img-thumbnail"/>
					</div>
					<?php }?>
				</div>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					</div>
				<?php }?>
				<?php echo '<script'; ?>
>
				$(document).ready(function(){
					$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-selectbutton').click(function(e){
						$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
').trigger('click');
					});
					$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
').change(function(e){
						var val = $(this).val();
						var file = val.split(/[\\/]/);
						$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-name').val(file[file.length-1]);
					});
				});
			<?php echo '</script'; ?>
>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php if (isset($_smarty_tpl->tpl_vars['input']->value['desc']) && !empty($_smarty_tpl->tpl_vars['input']->value['desc'])) {?>
				<p class="help-block">
					<?php echo $_smarty_tpl->tpl_vars['input']->value['desc'];?>

				</p>
			<?php }?>
		</div>
	<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'selectlist') {?>
		<div class="row"><div class="col-lg-6">
		<div id="category-block">
			<div class="panel" style="max-height: 300px; overflow: auto; background: #f5f5f5;">
				<ul class="cattree tree">
						<?php echo $_smarty_tpl->tpl_vars['options']->value;?>

				</ul>
			</div>
		</div>
        </div> </div>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function(){
				$('#category-block ul.tree').hide();
				$('#category-block ul.tree.cattree').show(); 
				<?php if (isset($_smarty_tpl->tpl_vars['selected_categories']->value)) {?>
					<?php $_smarty_tpl->_assignInScope('imploded_selected_categories', implode('","',$_smarty_tpl->tpl_vars['selected_categories']->value));?>					
					var selected_categories = new Array("<?php echo $_smarty_tpl->tpl_vars['imploded_selected_categories']->value;?>
");
					$('#category-block').find(':input').each(function(){
						if ($.inArray($(this).val(), selected_categories) != -1)
						{
							$(this).prop("checked", true);
							$(this).parent().addClass("tree-selected");
							$(this).parents('ul.tree').each(function(){
								$(this).show();
								$(this).prev().find('.icon-folder-close').removeClass('icon-folder-close').addClass('icon-folder-open');
							});
						};
						$(this).on("click", function(){
							var test= $(this).parent();						
							if (test.hasClass("tree-selected")){
								test.removeClass("tree-selected");
							}else{
								test.addClass("tree-selected");
							}
						})
					});
				<?php }?>
				
				$("#category-block .tree-folder-name i").each(function(){
					$(this).on("click", function(){
						if($(this).hasClass('icon-folder-close')){
							$(this).removeClass('icon-folder-close');
							$(this).addClass('icon-folder-open');	
						}else{
							$(this).removeClass('icon-folder-open');
							$(this).addClass('icon-folder-close');
						}
						$(this).parent().parent().children("ul.tree").slideToggle();
					})
				});
				$("#category-block .tree-folder-name label").each(function(){
					$(this).on("click", function(){
						if($(this).parent().find('i').hasClass('icon-folder-close')){
							$(this).parent().find('i').removeClass('icon-folder-close');
							$(this).parent().find('i').addClass('icon-folder-open');	
						}else{
							$(this).parent().find('i').removeClass('icon-folder-open');
							$(this).parent().find('i').addClass('icon-folder-close');
						}
						$(this).parent().parent().children("ul.tree").slideToggle();
						
					})
				})
				
			});
		<?php echo '</script'; ?>
>
	<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'imagecate') {?>
		<div class="row"><div class="col-lg-6">
		<select>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['selected_categories']->value, 'selected_category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['selected_category']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</select>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['selected_categories']->value, 'selected_category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['selected_category']->value) {
?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
				<?php }?>
				<div class="form-group">
					<div class="col-lg-6">
						<input id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
" type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
" class="hide" />
						<div class="dummyfile input-group">
							<span class="input-group-addon"><i class="icon-file"></i></span>
							<input id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
-name" type="text" class="disabled" name="filename" readonly />
							<span class="input-group-btn">
								<button id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
									<i class="icon-folder-open"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose a file','mod'=>'blockbanner'),$_smarty_tpl ) );?>

								</button>
							</span>
						</div>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
);" tabindex="-1"><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</a></li>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
				</div>
				<div class="form-group">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['test']->value, 'test1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['test1']->value) {
?>
						<?php if ($_smarty_tpl->tpl_vars['test1']->value[0]['id_category'] == $_smarty_tpl->tpl_vars['selected_category']->value) {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
img/<?php echo $_smarty_tpl->tpl_vars['test1']->value[0]['image'];?>
" class="img-thumbnail"/>
						<?php }?>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					</div>
				<?php }?>
				<?php echo '<script'; ?>
>
					$(document).ready(function(){
						$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
-selectbutton').click(function(e){
							$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
').trigger('click');
						});
						$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
').change(function(e){
							var val = $(this).val();
							var file = val.split(/[\\/]/);
							$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
_<?php echo $_smarty_tpl->tpl_vars['selected_category']->value;?>
-name').val(file[file.length-1]);
						});
					});
				<?php echo '</script'; ?>
>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div> </div>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function(){
				
				
			});
		<?php echo '</script'; ?>
>
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
