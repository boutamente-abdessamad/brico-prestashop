<?php
/* Smarty version 3.1.33, created on 2020-07-01 23:13:12
  from 'C:\wamp64\www\prestashop\modules\productcomments\productcomments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efd0a784122e3_83414710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4c8be6048b3413bb46a3a156390aa10c5719eec' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\productcomments\\productcomments.tpl',
      1 => 1593472239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efd0a784122e3_83414710 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
   var productcomments_controller_url = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productcomments_controller_url']->value, ENT_QUOTES, 'UTF-8');?>
';
   var confirm_report_message = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure that you want to report this comment?','mod'=>'productcomments','js'=>1),$_smarty_tpl ) );?>
';
   var secure_key = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['secure_key']->value, ENT_QUOTES, 'UTF-8');?>
';
   var productcomments_url_rewrite = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productcomments_url_rewriting_activated']->value, ENT_QUOTES, 'UTF-8');?>
';
   var productcomment_added = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your comment has been added!','mod'=>'productcomments','js'=>1),$_smarty_tpl ) );?>
';
   var productcomment_added_moderation = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your comment has been submitted and will be available once approved by a moderator.','mod'=>'productcomments','js'=>1),$_smarty_tpl ) );?>
';
   var productcomment_title = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New comment','mod'=>'productcomments','js'=>1),$_smarty_tpl ) );?>
';
   var productcomment_ok = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'OK','mod'=>'productcomments','js'=>1),$_smarty_tpl ) );?>
';
   var moderation_active = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['moderation_active']->value, ENT_QUOTES, 'UTF-8');?>
;
<?php echo '</script'; ?>
>
<div id="product_comments_block_tab"> 
  <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
  <?php if ($_smarty_tpl->tpl_vars['comment']->value['content']) {?>
  <div class="comment clearfix">
	 <div class="comment_author">
		<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Grade','mod'=>'productcomments'),$_smarty_tpl ) );?>
&nbsp</span>
		<div class="star_content clearfix">
		   <?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= 5; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
		   <?php if ($_smarty_tpl->tpl_vars['comment']->value['grade'] <= (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
		   <div class="star"></div>
		   <?php } else { ?>
		   <div class="star star_on"></div>
		   <?php }?>
		   <?php
}
}
?>
		</div>
		<div class="comment_author_infos">
		   <strong><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['customer_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</strong>
		   <em><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['date_add'],'html','UTF-8' )),'full'=>0),$_smarty_tpl ) );?>
</em>
		</div>
	 </div>
	 <div class="comment_details">
		<h4 class="title_block"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h4>
		<p><?php echo htmlspecialchars(nl2br(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['content'],'html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</p>
		<ul>
		   <?php if ($_smarty_tpl->tpl_vars['comment']->value['total_advice'] > 0) {?>
		   <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%1$d out of %2$d people found this review useful.','sprintf'=>array($_smarty_tpl->tpl_vars['comment']->value['total_useful'],$_smarty_tpl->tpl_vars['comment']->value['total_advice']),'mod'=>'productcomments'),$_smarty_tpl ) );?>
</li>
		   <?php }?>
		   <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
		   <?php if (!$_smarty_tpl->tpl_vars['comment']->value['customer_advice']) {?>
		   <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Was this comment useful to you?','mod'=>'productcomments'),$_smarty_tpl ) );?>
<button class="usefulness_btn" data-is-usefull="1" data-id-product-comment="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['id_product_comment'], ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'yes','mod'=>'productcomments'),$_smarty_tpl ) );?>
</button><button class="usefulness_btn" data-is-usefull="0" data-id-product-comment="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['id_product_comment'], ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'no','mod'=>'productcomments'),$_smarty_tpl ) );?>
</button></li>
		   <?php }?>
		   <?php if (!$_smarty_tpl->tpl_vars['comment']->value['customer_report']) {?>
		   <li><span class="report_btn" data-id-product-comment="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['id_product_comment'], ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Report abuse','mod'=>'productcomments'),$_smarty_tpl ) );?>
</span></li>
		   <?php }?>
		   <?php }?>
		</ul>
	 </div>
  </div>
  <?php }?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php if ((!$_smarty_tpl->tpl_vars['too_early']->value && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
  <p class="align_center">
	 <a id="new_comment_tab_btn" class="open-comment-form btn btn-secondary" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','mod'=>'productcomments'),$_smarty_tpl ) );?>
 !</a>
  </p>
  <?php }?>
  <?php } else { ?>
  <?php if ((!$_smarty_tpl->tpl_vars['too_early']->value && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
  <p class="align_center">
	 <a id="new_comment_tab_btn" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Be the first to write your review','mod'=>'productcomments'),$_smarty_tpl ) );?>
 !</a>
  </p>
  <?php } else { ?>
  <p class="align_center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No customer reviews for the moment.','mod'=>'productcomments'),$_smarty_tpl ) );?>
</p>
  <?php }?>
  <?php }?>	
</div>
<?php if (isset($_smarty_tpl->tpl_vars['product_tab']->value) && $_smarty_tpl->tpl_vars['product_tab']->value) {?>
<div class="container">
   <!-- Trigger the modal with a button -->
   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-body">
               <div id="new_comment_form">
                  <form id="id_new_comment_form" action="#">
                     <h2 class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','mod'=>'productcomments'),$_smarty_tpl ) );?>
</h2>
					 <div class="row">
						 <?php if (isset($_smarty_tpl->tpl_vars['product_tab']->value) && $_smarty_tpl->tpl_vars['product_tab']->value) {?>
						 <div class="product clearfix col-xs-12 col-sm-6">
							<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productcomment_cover_image']->value, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product_tab']->value->name,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
							<div class="product_desc">
							   <p class="product_name"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_tab']->value->name, ENT_QUOTES, 'UTF-8');?>
</strong></p>
							</div>
						 </div>
						 <?php }?>
						 <div class="new_comment_form_content col-xs-12 col-sm-6">
							<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','mod'=>'productcomments'),$_smarty_tpl ) );?>
</h2>
							<div id="new_comment_form_error" class="error" style="display:none;padding:15px 25px">
							   <ul></ul>
							</div>
							<?php if (count($_smarty_tpl->tpl_vars['criterions']->value) > 0) {?>
							<ul id="criterions_list">
							   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['criterions']->value, 'criterion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['criterion']->value) {
?>
							   <li>
								  <label><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</label>
								  <div class="star_content">
									 <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="1" />
									 <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="2" />
									 <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="3" />
									 <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="4" />
									 <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="5" checked="checked" />
								  </div>
								  <div class="clearfix"></div>
							   </li>
							   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
							<?php }?>
							<label for="comment_title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Title for your review','mod'=>'productcomments'),$_smarty_tpl ) );?>
<sup class="required">*</sup></label>
							<input id="comment_title" name="title" type="text" value=""/>
							<label for="content"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your review','mod'=>'productcomments'),$_smarty_tpl ) );?>
<sup class="required">*</sup></label>
							<textarea id="content" name="content"></textarea>
							<?php if ($_smarty_tpl->tpl_vars['allow_guests']->value == true && !$_smarty_tpl->tpl_vars['logged']->value) {?>
							<label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your name','mod'=>'productcomments'),$_smarty_tpl ) );?>
<sup class="required">*</sup></label>
							<input id="commentCustomerName" name="customer_name" type="text" value=""/>
							<?php }?>
							<div id="new_comment_form_footer">
							   <input id="id_product_comment_send" name="id_product" type="hidden" value='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_product_comment_form']->value, ENT_QUOTES, 'UTF-8');?>
' />
							   <p class="fl required" style="margin-bottom:10px;"><sup>*</sup> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Required fields','mod'=>'productcomments'),$_smarty_tpl ) );?>
</p>
							   <p class="fr">
								  <button id="submitNewMessage" class ="btn btn-secondary" name="submitMessage" type="submit"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Send','mod'=>'productcomments'),$_smarty_tpl ) );?>
</button>
								  &nbsp;
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'or','mod'=>'productcomments'),$_smarty_tpl ) );?>
&nbsp;
							   <button type="button" class="closefb btn btn-secondary" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'productcomments'),$_smarty_tpl ) );?>
</span>
								</button>
							   </p>
							   <div class="clearfix"></div>
							</div>
						 </div>
					    </div>
                  </form>
                  <!-- /end new_comment_form_content -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="result_comment" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your comment is submitted','mod'=>'productcomments'),$_smarty_tpl ) );?>
</h2>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End fancybox -->
<?php }
}
}
