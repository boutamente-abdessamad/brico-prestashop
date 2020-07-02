<?php
/* Smarty version 3.1.33, created on 2020-06-30 20:32:13
  from 'C:\wamp64\www\prestashop\modules\ps_themecusto\views\templates\admin\controllers\advanced\elem\modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efb933d365f54_20841255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bce1785339955ee950d228aed869db0acc5575c2' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\ps_themecusto\\views\\templates\\admin\\controllers\\advanced\\elem\\modal.tpl',
      1 => 1555321005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efb933d365f54_20841255 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade" id="upload-child-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title module-modal-title" id="exampleModalLongTitle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload child theme','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" class="dropzone dz-clickable" id="importDropzone">
                            <div class="loader"></div>
                            <div class="module-import-start">
                                <i class="module-import-start-icon material-icons">cloud_upload</i><br>
                                <p class="module-import-start-main-text">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Drop your child theme archive here or','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
 <a href="#" class="module-import-start-select-manual"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'select file','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</a>
                                </p>
                                <p class="module-import-start-footer-text">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please upload one file at a time, .zip. Your child theme will be installed right after that.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

                                </p>
                            </div>
                            <div class="module-import-failure">
                                <i class="module-import-failure-icon material-icons">error</i><br>
                                <p class="module-import-failure-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Oops... Upload failed.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</p>
                                <a href="#" class="module-import-failure-details-action"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'What happened?','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</a>
                                <div class="module-import-failure-details"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'An error has occurred.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</div>
                                <p>
                                    <a class="module-import-failure-retry btn btn-tertiary" href="#"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Try again','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</a>
                                </p>
                            </div>
                            <div class="module-import-success">
                                <i class="module-import-success-icon material-icons">done</i><br>
                                <p class="module-import-success-msg"></p>
                            </div>
                            <input type="hidden" name="action" value="UploadChildTheme" />
                            <div class="dz-default dz-message"><span></span></div><input name="childthemefile" type="file" class="dz-hidden-input" accept=".zip" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
