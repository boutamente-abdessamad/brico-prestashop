<?php
/* Smarty version 3.1.33, created on 2020-06-30 20:32:13
  from 'C:\wamp64\www\prestashop\modules\ps_themecusto\views\templates\admin\controllers\advanced\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efb933d07e319_08092673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b29ada03dd5d53e482ede123b1bc1860691505b' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\ps_themecusto\\views\\templates\\admin\\controllers\\advanced\\index.tpl',
      1 => 1555321005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./elem/modal.tpl' => 1,
  ),
),false)) {
function content_5efb933d07e319_08092673 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="psthemecusto">
    <div class="panel col-lg-12">
        <div class="panel-heading">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Advanced Customization','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

        </div>
        <div class="row">
            <div class="col-ld-12">
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can edit your theme sheet by using the Parent/Child theme feature','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
:</p>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['is_ps_ready']->value) {?>
            <div class="alert alert-warning" role="alert">
                <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Advanced use only.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</b>
                <p class="alert-text">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Support team might not be able to assist you on issues created by your own child theme.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

                </p>
            </div>
            <?php }?>
            <div class="col-ld-12 steps">
                <div class="col-lg-3">
                    <div class="col-lg-12 center-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['images']->value;?>
download.png"/>
                    </div>
                    <b>1 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download your current theme','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</b>
                    <div class="col-lg-12">
                        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You picked a theme but still want to bring some specific adjustments? Get a child theme, it will allow you to keep the parts you want and customize the others!','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-push-1">
                    <div class="col-lg-12 center-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['images']->value;?>
edit.png"/>
                    </div>
                    <b>2 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit your child theme','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</b>
                    <div class="col-lg-12">
                        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Once the child theme created, next step is simple: apply the changes you want within the desired files, it will handle the customization part while keeping the parent theme’s look and functionality.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-push-2">
                    <div class="col-lg-12 center-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['images']->value;?>
reupload.png"/>
                    </div>
                    <b>3 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload your child theme','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</b>
                    <div class="col-lg-12">
                        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'As you only bring modification to the child theme, you can upgrade the parent theme easily, without losing your customization.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-buttons">
            <div class="col-lg-3">
                <div class="alert alert-danger download_child_theme_error" role="alert">
                    <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'An error occurred','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</b>
                    <p class="alert-text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please check that you have the rights to write to the folders /app/cache/ and /themes/','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
                </div>
                <div class="btn btn-primary btn-lg btn-block" rel="noopener" id="download_child_theme">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download theme','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

                </div>
                <div class="btn btn-primary btn-lg btn-block js-loader" rel="noopener" >
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Downloading','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
<div class="loader"></div>
                </div>
            </div>
            <div class="col-lg-3 col-lg-push-1">
                <a href="https://devdocs.prestashop.com/1.7/themes/reference/template_inheritance/parent_child_feature/" class="link-child btn btn-outline-secondary btn-lg btn-block" rel="noopener" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'How to use parents/child themes','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
 <i class="icon-external-link"></i></a>
            </div>
            <div class="col-lg-3 col-lg-push-2">
                <a href="#" class="btn btn-primary btn-lg btn-block" rel="noopener" data-toggle="modal" data-target="#upload-child-modal" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload child theme','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</a>
            </div>
        </div>
        <div class="alert alert-info col-lg-12" role="alert">
            <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Information','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</b>
            <?php if ($_smarty_tpl->tpl_vars['is_ps_ready']->value) {?>
                <p class="alert-text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'By using this method you can only override the CSS of your theme.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
            <?php } else { ?>
                <p class="alert-text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'By using this method you can override the CSS and html of your theme, and add analytics tags.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
            <?php }?>
            <p class="alert-text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Once uploaded, the child theme will be available in your Theme & Logo section','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:./elem/modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div><?php }
}
