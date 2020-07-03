<?php
/* Smarty version 3.1.33, created on 2020-07-03 01:28:34
  from 'C:\wamp64\www\prestashop\modules\posstaticblocks\views\templates\admin\linkwidget\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe7bb2830440_69826321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '046a3906d5f3b2bd9e5750eec729057232202070' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\posstaticblocks\\views\\templates\\admin\\linkwidget\\helpers\\form\\form.tpl',
      1 => 1593472238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe7bb2830440_69826321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17392160325efe7bb27b37d6_86016234', "label");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14181782105efe7bb27bbd11_86983680', "legend");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3747484215efe7bb27f12f6_05580462', "input_row");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "label"} */
class Block_17392160325efe7bb27b37d6_86016234 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'label' => 
  array (
    0 => 'Block_17392160325efe7bb27b37d6_86016234',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'link_blocks') {?>

    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block "label"} */
/* {block "legend"} */
class Block_14181782105efe7bb27bbd11_86983680 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'legend' => 
  array (
    0 => 'Block_14181782105efe7bb27bbd11_86983680',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>
        <?php if (isset($_smarty_tpl->tpl_vars['field']->value['image'])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['field']->value['image'];?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['title'],'html','UTF-8' ));?>
" /><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['field']->value['icon'])) {?><i class="<?php echo $_smarty_tpl->tpl_vars['field']->value['icon'];?>
"></i><?php }?>
        <?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>

        <span class="panel-heading-action">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['toolbar_btn']->value, 'btn', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['btn']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['k']->value != 'modules-list' && $_smarty_tpl->tpl_vars['k']->value != 'back') {?>
                    <a id="desc-<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
-<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['imgclass'])) {
echo $_smarty_tpl->tpl_vars['btn']->value['imgclass'];
} else {
echo $_smarty_tpl->tpl_vars['k']->value;
}?>" class="list-toolbar-btn" <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['href'])) {?>href="<?php echo $_smarty_tpl->tpl_vars['btn']->value['href'];?>
"<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['target']) && $_smarty_tpl->tpl_vars['btn']->value['target']) {?>target="_blank"<?php }
if (isset($_smarty_tpl->tpl_vars['btn']->value['js']) && $_smarty_tpl->tpl_vars['btn']->value['js']) {?>onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }?>>
                        <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['btn']->value['desc']),$_smarty_tpl ) );?>
" data-html="true">
                            <i class="process-icon-<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['imgclass'])) {
echo $_smarty_tpl->tpl_vars['btn']->value['imgclass'];
} else {
echo $_smarty_tpl->tpl_vars['k']->value;
}?> <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['class'])) {
echo $_smarty_tpl->tpl_vars['btn']->value['class'];
}?>" ></i>
                        </span>
                    </a>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </span>
    </h3>
<?php
}
}
/* {/block "legend"} */
/* {block "input_row"} */
class Block_3747484215efe7bb27f12f6_05580462 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_row' => 
  array (
    0 => 'Block_3747484215efe7bb27f12f6_05580462',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'link_blocks') {?>
        <div class="row">
            <?php echo '<script'; ?>
 type="text/javascript">
                var come_from = '<?php echo $_smarty_tpl->tpl_vars['name_controller']->value;?>
';
                var token = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
';
                var alternate = 1;
            <?php echo '</script'; ?>
>
            <a id="inline" href="#data" style="position: absolute;right: 30px;z-index: 10;top:10px;font-size: 13px;"><i class="material-icons" style="font-size:14px;">place</i> Click to view theme's hooks position.</a>
            <div style="display:none"><div id="data"><img src="<?php echo __PS_BASE_URI__;?>
/modules/posstaticblocks/hooks.jpg"/></div></div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'link_blocks_position', false, 'key', 'blocksLoop', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['link_blocks_position']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_blocksLoop']->value['index']++;
?>
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading" style="color:#22aac5;">
                            <?php echo $_smarty_tpl->tpl_vars['link_blocks_position']->value['hook_name'];?>

                             <small style="color:#555;"><?php echo $_smarty_tpl->tpl_vars['link_blocks_position']->value['hook_title'];?>
</small>
                        </div>
                        <table class="table tableDnD cms" id="link_block_<?php echo $_smarty_tpl->tpl_vars['key']->value%2;?>
">
                            <thead>
                                <tr class="nodrag nodrop">
                                    <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ID','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                                    <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Position','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                                    <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name of the block','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                                    <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Active','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link_blocks_position']->value['blocks'], 'link_block');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['link_block']->value) {
?>
                                    <tr class="<?php if ($_smarty_tpl->tpl_vars['key']->value%2) {?>alt_row<?php } else { ?>not_alt_row<?php }?> row_hover" id="tr_<?php echo $_smarty_tpl->tpl_vars['key']->value%2;?>
_<?php echo $_smarty_tpl->tpl_vars['link_block']->value['id_pos_staticblock'];?>
_<?php echo $_smarty_tpl->tpl_vars['link_block']->value['position'];?>
">
                                        <td><?php echo $_smarty_tpl->tpl_vars['link_block']->value['id_pos_staticblock'];?>
</td>
                                        <td class="center pointer dragHandle" id="td_<?php echo $_smarty_tpl->tpl_vars['key']->value%2;?>
_<?php echo $_smarty_tpl->tpl_vars['link_block']->value['id_pos_staticblock'];?>
">
                                            <div class="dragGroup">
                                                <div class="positions">
                                                    <?php echo $_smarty_tpl->tpl_vars['link_block']->value['position']+1;?>

                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['link_block']->value['block_name'];?>
</td>
                                        <td>
                                        <?php if ($_smarty_tpl->tpl_vars['link_block']->value['active']) {?>
                                        <a class="btn btn-success" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_url']->value,'html','UTF-8' ));?>
&configure=<?php echo $_smarty_tpl->tpl_vars['configure_name']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&changeStatus&id_pos_staticblock=<?php echo $_smarty_tpl->tpl_vars['link_block']->value['id_pos_staticblock'];?>
" title=""><i class="icon-check"></i></a>
                                        <?php } else { ?>
                                        <a class="btn btn-danger" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_url']->value,'html','UTF-8' ));?>
&configure=<?php echo $_smarty_tpl->tpl_vars['configure_name']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&changeStatus&id_pos_staticblock=<?php echo $_smarty_tpl->tpl_vars['link_block']->value['id_pos_staticblock'];?>
" title=""><i class="icon-remove"></i></a>
                                        <?php }?>
                                        </td>
                                        <td>
                                            <div class="btn-group-action">
                                                <div class="btn-group pull-right">
                                                    <a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&amp;edit<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
&amp;id_pos_staticblock=<?php echo (int)$_smarty_tpl->tpl_vars['link_block']->value['id_pos_staticblock'];?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
">
                                                        <i class="icon-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>

                                                    </a>
                                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-caret-down"></i>&nbsp;
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&amp;delete<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
&amp;id_pos_staticblock=<?php echo (int)$_smarty_tpl->tpl_vars['link_block']->value['id_pos_staticblock'];?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
">
                                                            <i class="icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>

                                                        </a>
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
						
                    </div>
                </div>
                <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_blocksLoop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_blocksLoop']->value['index'] : null)%2) {?><div class="clearfix"></div><?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php echo '<script'; ?>
 type="text/javascript">
            $(document).ready(function(){
                $("#inline").fancybox({
                    'transitionIn'  :   'elastic',
                    'transitionOut' :   'elastic',
                    'speedIn'       :   600, 
                    'speedOut'      :   200, 
                    'overlayShow'   :   false,
                    'width'         : 600,
                    'height'        : 'auto',
                });
				
            });
        <?php echo '</script'; ?>
>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block "input_row"} */
}
