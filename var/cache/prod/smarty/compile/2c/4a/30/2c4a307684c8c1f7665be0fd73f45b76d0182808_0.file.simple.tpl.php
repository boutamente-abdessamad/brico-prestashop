<?php
/* Smarty version 3.1.33, created on 2020-07-03 02:01:47
  from 'C:\wamp64\www\prestashop\modules\poslogo\views\templates\admin\helpers\uploader\simple.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe837b9f0061_13913851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c4a307684c8c1f7665be0fd73f45b76d0182808' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\poslogo\\views\\templates\\admin\\helpers\\uploader\\simple.tpl',
      1 => 1593472237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe837b9f0061_13913851 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['files']->value) && count($_smarty_tpl->tpl_vars['files']->value) > 0) {?>
	<?php $_smarty_tpl->_assignInScope('show_thumbnail', false);?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['files']->value, 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
		<?php if (isset($_smarty_tpl->tpl_vars['file']->value['image']) && $_smarty_tpl->tpl_vars['file']->value['type'] == 'image') {?>
			<?php $_smarty_tpl->_assignInScope('show_thumbnail', true);?>
		<?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['show_thumbnail']->value) {?>
<div class="form-group">
	<div class="col-lg-12" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-images-thumbnails">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['files']->value, 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
		<?php if (isset($_smarty_tpl->tpl_vars['file']->value['image']) && $_smarty_tpl->tpl_vars['file']->value['type'] == 'image') {?>
		<div>
			<?php echo $_smarty_tpl->tpl_vars['file']->value['image'];?>

			<?php if (isset($_smarty_tpl->tpl_vars['file']->value['size'])) {?><p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'File size'),$_smarty_tpl ) );?>
 <?php echo $_smarty_tpl->tpl_vars['file']->value['size'];?>
kb</p><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['file']->value['delete_url'])) {?>
			<p>
				<a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['file']->value['delete_url'];?>
">
					<i class="icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete'),$_smarty_tpl ) );?>

				</a>
			</p>
			<?php }?>
		</div>
		<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
</div>
<?php }
}
if (isset($_smarty_tpl->tpl_vars['max_files']->value) && count($_smarty_tpl->tpl_vars['files']->value) >= $_smarty_tpl->tpl_vars['max_files']->value) {?>
<div class="row">
	<div class="alert alert-warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You have reached the limit (%s) of files to upload, please remove files to continue uploading','sprintf'=>$_smarty_tpl->tpl_vars['max_files']->value),$_smarty_tpl ) );?>
</div>
</div>
<?php } else { ?>
<div class="form-group">
	<div class="col-sm-6">
		<input id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="file" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['multiple']->value) && $_smarty_tpl->tpl_vars['multiple']->value) {?> multiple="multiple"<?php }?> class="hide" />
		<div class="dummyfile input-group">
			<span class="input-group-addon"><i class="icon-file"></i></span>
			<input id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name" type="text" name="filename" readonly />
			<span class="input-group-btn">
				<button id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
					<i class="icon-folder-open"></i> <?php if (isset($_smarty_tpl->tpl_vars['multiple']->value) && $_smarty_tpl->tpl_vars['multiple']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add files'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add file'),$_smarty_tpl ) );
}?>
				</button>
				<?php if ((!isset($_smarty_tpl->tpl_vars['multiple']->value) || !$_smarty_tpl->tpl_vars['multiple']->value) && isset($_smarty_tpl->tpl_vars['files']->value) && count($_smarty_tpl->tpl_vars['files']->value) == 1 && isset($_smarty_tpl->tpl_vars['files']->value[0]['download_url'])) {?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['files']->value[0]['download_url'];?>
">
					<button type="button" class="btn btn-default">
						<i class="icon-cloud-download"></i>
						<?php if (isset($_smarty_tpl->tpl_vars['size']->value)) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download current file (%skb)','sprintf'=>$_smarty_tpl->tpl_vars['size']->value),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download current file'),$_smarty_tpl ) );
}?>
					</button>
				</a>
				<?php }?>
			</span>
		</div>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
<?php if (isset($_smarty_tpl->tpl_vars['multiple']->value) && isset($_smarty_tpl->tpl_vars['max_files']->value)) {?>
	var <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_max_files = <?php echo count($_smarty_tpl->tpl_vars['max_files']->value-$_smarty_tpl->tpl_vars['files']->value);?>
;
<?php }?>

	$(document).ready(function(){
		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-selectbutton').click(function(e) {
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').trigger('click');
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').click(function(e) {
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').trigger('click');
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').on('dragenter', function(e) {
			e.stopPropagation();
			e.preventDefault();
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').on('dragover', function(e) {
			e.stopPropagation();
			e.preventDefault();
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').on('drop', function(e) {
			e.preventDefault();
			var files = e.originalEvent.dataTransfer.files;
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
')[0].files = files;
			$(this).val(files[0].name);
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').change(function(e) {
			if ($(this)[0].files !== undefined)
			{
				var files = $(this)[0].files;
				var name  = '';

				$.each(files, function(index, value) {
					name += value.name+', ';
				});

				$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').val(name.slice(0, -2));
			}
			else // Internet Explorer 9 Compatibility
			{
				var name = $(this).val().split(/[\\/]/);
				$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').val(name[name.length-1]);
			}
		});

		if (typeof <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_max_files !== 'undefined')
		{
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').closest('form').on('submit', function(e) {
				if ($('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
')[0].files.length > <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_max_files) {
					e.preventDefault();
					alert('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>sprintf('You can upload a maximum of %s files',$_smarty_tpl->tpl_vars['max_files']->value)),$_smarty_tpl ) );?>
');
				}
			});
		}
	});
<?php echo '</script'; ?>
>
<?php }
}
}
