<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:23:27
  from 'C:\wamp64\www\prestashop\modules\posvegamenu\views\templates\admin\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7a7f4c3151_58946345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8269ac31ae26f820a2d09c01430ef003b4488111' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\posvegamenu\\views\\templates\\admin\\list.tpl',
      1 => 1593472238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe7a7f4c3151_58946345 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel" id="posvegamenu-list">
	<h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Menu List','mod'=>'posvegamenu'),$_smarty_tpl ) );?>

	<span class="panel-heading-action">
		
	</span>
	</h3>
	<div id="menuContent">
		<div id="menus">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info_menus']->value, 'info_menu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['info_menu']->value) {
?>
				<div id="menu_<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_posvegamenu_item']);?>
" class="panel">
					<div class="row">
						<div class="col-md-1"><i class="icon icon-arrows" style="font-size:16px; line-height:32px;"></i></div>
						<div class="col-md-2">
							<h4 class="pull-left">#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_menu']->value['id_posvegamenu_item'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-2">
							<h4 class="pull-left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_menu']->value['title'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-7">	
							<div class="btn-group-action pull-right">
								<?php if ($_smarty_tpl->tpl_vars['info_menu']->value['submenu_type'] == 0) {?>
									<a class="btn btn-default"
										href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=posvegamenu&id_posvegamenu_item=<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_posvegamenu_item']);?>
&buildMenu=1">
										<i class="icon-layer"></i>
										<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Build SubMenu','mod'=>'posvegamenu'),$_smarty_tpl ) );?>

									</a>
								<?php }?>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=posvegamenu&id_posvegamenu_item=<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_posvegamenu_item']);?>
&editMenu=1">
									<i class="icon-edit"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'posvegamenu'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=posvegamenu&delete_id_menu=<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_posvegamenu_item']);?>
">
									<i class="icon-trash"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'posvegamenu'),$_smarty_tpl ) );?>

								</a>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_menu']->value['status'],'quotes','UTF-8' ));?>

							</div>
						</div>
					</div>
				</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		<a id="desc-product-new" class="" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=posvegamenu&addMenu=1">
			<i class="process-icon-new "></i><span title="" class="label-tooltip" data-html="true"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new item','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</span>
		</a>
	</div>	
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function() {
			var $myMenus = $("#menus");
			$myMenus.sortable({
				opacity: 0.6,
				cursor: "move",
				start: function(){
					$(this).css('background','#f1f1f1');
				},
				stop: function(){
					$(this).css('background','#ffffff');
				},
				update: function() {
					var order = $(this).sortable("serialize") + "&action=updateMenusPosition";
					$.post("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url_base']->value,'html','UTF-8' ));?>
modules/posvegamenu/ajax_posvegamenu.php?secure_key=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['secure_key']->value,'html','UTF-8' ));?>
", order);
					}
				});
			$myMenus.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});
		});
	<?php echo '</script'; ?>
>
</div>
<div class="panel" id="posvegamenu-config">
	<h3><i class="icon-cog"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Menu settings','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</h3>
	<form id="module_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&amp;configure=posvegamenu&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::getAdminTokenLite('AdminModules'),'html','UTF-8' ));?>
" method="post" enctype="multipart/form-data" novalidate="">
		<div class="form-group">
			<label class="control-label col-lg-2"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Heading title','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-10">
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
					<input type="text" class="title" id="posvegamenu_title_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="posvegamenu_title_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_title'][$_smarty_tpl->tpl_vars['language']->value['id_lang']];?>
"/>
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
		<div class="form-group">
            <label class="control-label col-lg-2" for="posvegamenu_bg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Background type','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-10">
                <select id="posvegamenu_bg" name="posvegamenu_bg" class="form-control fixed-width-xl">
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 1) {?>selected="selected"<?php }?>>None</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 2) {?>selected="selected"<?php }?>>Color</option>
                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 3) {?>selected="selected"<?php }?>>Image</option>
                </select>
            </div>
        </div>
        <div class="form-group bg-type-color <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 1 || $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 3) {?>hidden<?php }?>">
            <label class="control-label col-lg-2" for="posvegamenu_bg_color"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Background color','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-10">
                <div class="input-group fixed-width-xl">
                    <input data-hex="true" class="color mColorPickerInput mColorPicker" name="posvegamenu_bg_color" value="<?php echo $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg_color'];?>
" id="posvegamenu_bg_color" type="color">
                </div>
            </div>
        </div>
        <div class="form-group bg-type-image <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 1 || $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 2) {?>hidden<?php }?>">
            <label class="control-label col-lg-2" for="submenu_bg_image"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image source','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-10">
                <div class="col-lg-7">
                    <input type="text" id="posvegamenu_bg_image" name="posvegamenu_bg_image" value="<?php echo $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg_image'];?>
"/>
                    <a href="filemanager/dialog.php?type=1&field_id=posvegamenu_bg_image" class="btn btn-default iframe-column-upload"  data-input-name="posvegamenu_bg_image" type="button"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select image','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
 <i class="icon-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="form-group bg-type-image <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 1 || $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg'] == 2) {?>hidden<?php }?>">
            <label class="control-label col-lg-2" for="posvegamenu_bg_repeat"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Background repeat','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-10">
                <select id="posvegamenu_bg_repeat" name="posvegamenu_bg_repeat" class="form-control fixed-width-xl">
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg_repeat'] == 1) {?>selected="selected"<?php }?>>No repeat</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg_repeat'] == 2) {?>selected="selected"<?php }?>>Repeat X</option>
                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg_repeat'] == 3) {?>selected="selected"<?php }?>>Repeat Y</option>
                    <option value="4" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_bg_repeat'] == 4) {?>selected="selected"<?php }?>>Repeat XY</option>
                </select>
            </div>
        </div>
        <div class="form-group bg-type-image">
            <label class="control-label col-lg-2" for="posvegamenu_sub_animation"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Submenu animation','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-10">
                <select id="posvegamenu_sub_animation" name="posvegamenu_sub_animation" class="form-control fixed-width-xl">
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_sub_animation'] == 1) {?>selected="selected"<?php }?>>No animation</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_sub_animation'] == 2) {?>selected="selected"<?php }?>>Slidedown</option>
                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_sub_animation'] == 3) {?>selected="selected"<?php }?>>Slideup</option>
                    <option value="4" <?php if ($_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_sub_animation'] == 4) {?>selected="selected"<?php }?>>Slideleft</option>
                </select>
            </div>
        </div>
        
		<div class="form-group">
            <label class="control-label col-lg-2" for="posvegamenu_css"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Custom CSS','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-10">
                <textarea class="textarea-autosize"  name="posvegamenu_css" value="<?php echo $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_css'];?>
" id="posvegamenu_css" style="min-height: 200px;"><?php echo $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_css'];?>
</textarea>
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-lg-2" for="posvegamenu_more_less"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Catalog number displayed','mod'=>'posvegamenu'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-10">
                <input type="text"  name="posvegamenu_more_less" value="<?php echo $_smarty_tpl->tpl_vars['menu_config']->value['posvegamenu_more_less'];?>
" id="posvegamenu_more_less"/>
            </div>
        </div>
        <div class="panel-footer">
			<button type="submit" value="1" id="module_form_submit_btn" name="submitMenu" class="btn btn-default pull-right">
				<i class="process-icon-save"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'posvegamenu'),$_smarty_tpl ) );?>

			</button>
		</div>
	</form>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function(){
			$('#posvegamenu_bg').change(function(){
	            posmenuChangeType();
	        });
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
		})
		function posmenuChangeType(){
	        var val = $('#posvegamenu_bg').val();
	        switch(val){
	            case "1": // link
	                $('.bg-type-color, .bg-type-image').addClass('hidden');
	                break;

	            case "2": // integration
	                $('.bg-type-image').addClass('hidden');
	                $('.bg-type-color').removeClass('hidden');
	                break;

	            case "3": // js
	                $('.bg-type-color').addClass('hidden');
	                $('.bg-type-image').removeClass('hidden');
	                break;
	        }
	    }
	<?php echo '</script'; ?>
>
</div><?php }
}
