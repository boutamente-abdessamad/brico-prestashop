<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:23:31
  from 'C:\wamp64\www\prestashop\modules\posvegamenu\views\templates\admin\menu_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7a83994a37_22126413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34726a5c495161c85b33341c94ef3673cc8f1260' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\posvegamenu\\views\\templates\\admin\\menu_item.tpl',
      1 => 1593472238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe7a83994a37_22126413 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="module_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&amp;configure=posvegamenu&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::getAdminTokenLite('AdminModules'),'html','UTF-8' ));?>
" method="post" enctype="multipart/form-data" novalidate="">
<div class="panel"><h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Menu Item','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</h3>
	<div class="form-wrapper" id="menuContent" >
		<div class="form-group">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Title','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['id_language']->value) {?>style="display:none"<?php }?>>
					<?php }?>
					<div class="col-lg-6">
					<input type="text" class="title" id="title_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="title_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php if ((($_smarty_tpl->tpl_vars['menu']->value->title[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])] !== null ))) {
echo $_smarty_tpl->tpl_vars['menu']->value->title[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])];
} else { ?>menu title<?php }?>"/>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);javascript:changeLangInfor(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						</div>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<p class="help-block" style="clear:both;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'>>> If use Prestashop link and want to use Prestashop title, leave it empty.','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</p>
			</div>
		</div>
		<div class="form-group lab-type-link">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Type Link','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<select id="type_link" name="type_link" class="form-control fixed-width-xl" data-default="0">
	                <option value="0" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 0) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PrestaShop Link','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
	                <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 1) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Custom Link','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
	                <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 2) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'None','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
	            </select>
			</div>
		</div>
		
		<div class="form-group custom_link">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Custom link','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['id_language']->value) {?>style="display:none"<?php }?>>
					<?php }?>
					<div class="col-lg-6">
					<input type="text" id="custom_link_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="custom_link_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php if ((($_smarty_tpl->tpl_vars['menu']->value->custom_link[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])] !== null ))) {
echo $_smarty_tpl->tpl_vars['menu']->value->custom_link[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])];
} else { ?>#<?php }?>"/>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);javascript:changeLangInfor(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						</div>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		<div class="form-group ps_link">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PrestaShop Link','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<select class="form-control fixed-width-xl" name="link" id="link">
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['all_options']->value,'quotes','UTF-8' ));?>

				</select>
				<?php echo '<script'; ?>
 type="text/javascript">
					$(document).ready(function(){
						$("#link").val('<?php echo $_smarty_tpl->tpl_vars['menu']->value->link;?>
');
					});
				<?php echo '</script'; ?>
>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sub Title','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['id_language']->value) {?>style="display:none"<?php }?>>
					<?php }?>
					<div class="col-lg-6">
					<input type="text" class="subtitle" id="subtitle_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="subtitle_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])]) {
echo $_smarty_tpl->tpl_vars['menu']->value->subtitle[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])];
}?>"/>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);javascript:changeLangInfor(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						</div>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		<div class="form-group lab-type-icon">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use icon','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<select id="type_icon" name="type_icon" class="form-control fixed-width-xl" data-default="0">
	                <option value="0" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 0) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
	                <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 1) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Font-Awesome Icon','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
	                <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 2) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image Icon','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
	            </select>
			</div>
		</div>
		
		<div class="form-group lab-fw-icon">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Font-Awesome Icon','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<input type="text" class="icon_class fixed-width-xl" id="icon_class" name="icon_class" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->icon_class,'html','UTF-8' ));?>
"/>
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Put class icon of Font-Awesome at :','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
 <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/">http://fortawesome.github.io/Font-Awesome/3.2.1/icons/.</a>ex: <span class="o-40">&lt;i class="</span>fab fa-angellist<span class="o-40">"&gt;&lt;/i&gt;</span></p>   
			</div>
		</div>
		<div class="form-group lab-img-icon">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image Icon','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
                <div class="col-lg-7">
                    <input type="text" id="icon_img" name="icon_img" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->icon) {
echo $_smarty_tpl->tpl_vars['menu']->value->icon;
}?>"/>
                    <a href="filemanager/dialog.php?type=1&field_id=icon_img" class="btn btn-default iframe-column-upload"  data-input-name="icon_img" type="button"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select image','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
 <i class="icon-angle-right"></i></a>
                    <?php if ($_smarty_tpl->tpl_vars['menu']->value->icon) {?><img src="<?php echo $_smarty_tpl->tpl_vars['menu']->value->icon;?>
" style="display: block; max-width: 200px;"/><?php }?>
                </div>
            </div>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-1" for=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Main link style','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-11">
			<div class="row">
				
				<div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="color"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Color','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="link_color" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->item_color) {
echo $_smarty_tpl->tpl_vars['menu']->value->item_color;
}?>" id="link_color" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="color_hover"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Color hover','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="color_hover" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->item_colorh) {
echo $_smarty_tpl->tpl_vars['menu']->value->item_colorh;
}?>" id="color_hover" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="fontsize"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Font size','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="fontsize" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->item_fontsize) {
echo $_smarty_tpl->tpl_vars['menu']->value->item_fontsize;
}?>" id="fontsize" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="lineheight"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Line height','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="lineheight" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->item_lineheight) {
echo $_smarty_tpl->tpl_vars['menu']->value->item_lineheight;
}?>" id="lineheight" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2" style="width: 20%;">
			        <label class="control-label col-lg-6" for="transform"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Text transform','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			        <div class="col-lg-6">
			            <select id="transform" name="transform" class="form-control" data-default="0">
			                <option value="0" <?php if ($_smarty_tpl->tpl_vars['menu']->value->item_transform == 0) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'none','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
			                <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu']->value->item_transform == 1) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'UPPERCASE','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
			                <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu']->value->item_transform == 2) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Capitalize','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
			            </select>
			        </div>
			    </div>
	            <div style="clear:both;"></div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="bgcolor"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Background color','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="bgcolor" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->item_bg_color) {
echo $_smarty_tpl->tpl_vars['menu']->value->item_bg_color;
}?>" id="bgcolor" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="bgcolor_hover"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Background hover','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="bgcolor_hover" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->item_bg_colorh) {
echo $_smarty_tpl->tpl_vars['menu']->value->item_bg_colorh;
}?>" id="bgcolor_hover" type="color">
	                    </div>
	                </div>
	            </div>
	            
	            
	            
		    </div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<div class="form-group">
		<label class="control-label col-lg-1" for=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Subtitle style','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-11">
			<div class="row">
				
				<div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="subtitle_color"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Color','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="subtitle_color" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle_color) {
echo $_smarty_tpl->tpl_vars['menu']->value->subtitle_color;
}?>" id="subtitle_color" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="subtitle_bgcolor"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Background color','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="subtitle_bgcolor" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle_bg_color) {
echo $_smarty_tpl->tpl_vars['menu']->value->subtitle_bg_color;
}?>" id="subtitle_bgcolor" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="subtitle_fontsize"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Font size','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="subtitle_fontsize" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle_fontsize) {
echo $_smarty_tpl->tpl_vars['menu']->value->subtitle_fontsize;
}?>" id="subtitle_fontsize" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="subtitle_lineheight"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Line height','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="subtitle_lineheight" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle_lineheight) {
echo $_smarty_tpl->tpl_vars['menu']->value->subtitle_lineheight;
}?>" id="subtitle_lineheight" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2" style="width: 20%;">
			        <label class="control-label col-lg-6" for="subtitle_transform"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Text transform','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			        <div class="col-lg-6">
			            <select id="subtitle_transform" name="subtitle_transform" class="form-control" data-default="0">
			                <option value="0" <?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle_transform == 0) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'none','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
			                <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle_transform == 1) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'UPPERCASE','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
			                <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle_transform == 2) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Capitalize','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
			            </select>
			        </div>
			    </div>
		    </div>
		</div>
	</div>
	<div class="form-group" id="item_type_form">
        <label class="control-label col-lg-3" for="submenu_type"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Submenu type','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
        <div class="col-lg-9">
            <select id="submenu_type" name="submenu_type" class="form-control fixed-width-lg" data-default="1">
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['menu']->value->submenu_type == 0) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mega','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu']->value->submenu_type == 1) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Flyout','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu']->value->submenu_type == 2) {?>selected="selected" <?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'None','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</option>
            </select>
            <p class="help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Flyout only is available when you select category in Type Link','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</p>
        </div>
    </div>
	<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add specific class','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-9">
			<input type="text" class="item_class" id="item_class" name="item_class" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->item_class) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->item_class,'html','UTF-8' ));
}?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New window','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-9">
			<span class="switch prestashop-switch fixed-width-lg">
				<input type="radio" name="new_window" id="new_window_on" value="1" <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->new_window) && $_smarty_tpl->tpl_vars['menu']->value->new_window != 0)) {?>checked="checked"<?php }?>>
				<label for="new_window_on">Yes</label>
				<input type="radio" name="new_window" id="new_window_off" value="0" <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->new_window) && $_smarty_tpl->tpl_vars['menu']->value->new_window == 0) || !$_smarty_tpl->tpl_vars['menu']->value->new_window) {?>checked="checked"<?php }?>>
				<label for="new_window_off">No</label>
				<a class="slide-button btn"></a>
			</span>	
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Active','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-9">
			<span class="switch prestashop-switch fixed-width-lg">
				<input type="radio" name="active" id="active_on" value="1" <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->active) && $_smarty_tpl->tpl_vars['menu']->value->active != 0) || !$_smarty_tpl->tpl_vars['menu']->value->active) {?>checked="checked"<?php }?>>
				<label for="active_on">Yes</label>
				<input type="radio" name="active" id="active_off" value="0" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value->active) && $_smarty_tpl->tpl_vars['menu']->value->active == 0) {?>checked="checked"<?php }?>>
				<label for="active_off">No</label>
				<a class="slide-button btn"></a>
			</span>	
		</div>
	</div>
	
	<div class="panel-footer">
		<input type="hidden" name="id_posvegamenu_item" id="id_posvegamenu_item" value="<?php if (isset($_smarty_tpl->tpl_vars['menu']->value->id)) {
echo intval($_smarty_tpl->tpl_vars['menu']->value->id);
}?>"/>
		<button type="submit" value="1" id="module_form_submit_btn" name="submitMenuItem" class="btn btn-default pull-right">
			<i class="process-icon-save"></i> Save
		</button>
		<a href="index.php?controller=AdminModules&amp;configure=posvegamenu&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' ));?>
" class="btn btn-default">
		<i class="process-icon-back"></i> Back to list</a>
	</div>
	
</div>
</form>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
        $('#type_icon').change(function(){
            ItemChangeTypeIcon();
        });
        $('#type_link').change(function(){
            ItemChangeTypeLink();
        });
        ItemChangeTypeIcon();
        ItemChangeTypeLink();
        $('.iframe-column-upload').fancybox({  
            'width'     : 900,
            'height'    : 600,
            'type'      : 'iframe',
            'autoScale' : false,
            'autoDimensions': false,
             'fitToView' : false,
             'autoSize' : false,
             onUpdate : function(){ 
                 $('.fancybox-iframe').contents().find('a.link').data('field_id', $(this.element).data("input-name"));
                 $('.fancybox-iframe').contents().find('a.link').attr('data-field_id', $(this.element).data("input-name"));
                },
             afterShow: function(){
                 $('.fancybox-iframe').contents().find('a.link').data('field_id', $(this.element).data("input-name"));
                 $('.fancybox-iframe').contents().find('a.link').attr('data-field_id', $(this.element).data("input-name"));
            }
          });
    });

    function ItemChangeTypeIcon(){
        var val = $('#type_icon').val();
        switch(val){
            case "0": // none
                $('.lab-fw-icon,.lab-img-icon').addClass('hidden');
                break;

            case "1": // integration
                $('.lab-img-icon').addClass('hidden');
                $('.lab-fw-icon').removeClass('hidden');
                break;

            case "2": // js
                $('.lab-fw-icon').addClass('hidden');
                $('.lab-img-icon').removeClass('hidden');
                break;
        }
    }
    function ItemChangeTypeLink(){
        var val = $('#type_link').val();
        switch(val){
            case "0": // none
                $('.custom_link').addClass('hidden');
                $('.ps_link').removeClass('hidden');
                break;

            case "1": // integration
                $('.ps_link').addClass('hidden');
                $('.custom_link').removeClass('hidden');
                break;

            case "2": // js
                $('.ps_link, .custom_link').addClass('hidden');
                break;
        }
    }
<?php echo '</script'; ?>
>
<style>
	#menuContent > div.form-group {
		margin-bottom: 20px;
	} 
</style><?php }
}
