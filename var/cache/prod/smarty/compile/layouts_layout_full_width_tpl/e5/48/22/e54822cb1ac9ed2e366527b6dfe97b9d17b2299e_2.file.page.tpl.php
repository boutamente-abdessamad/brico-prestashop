<?php
/* Smarty version 3.1.33, created on 2020-06-30 00:11:47
  from 'C:\wamp64\www\prestashop\themes\theme_madina1\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa753339f188_15698243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e54822cb1ac9ed2e366527b6dfe97b9d17b2299e' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\theme_madina1\\templates\\page.tpl',
      1 => 1593472241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efa753339f188_15698243 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16849282965efa7533361f22_21710827', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_14332164145efa7533364916_13939289 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_17515133795efa75333631d3_12993673 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14332164145efa7533364916_13939289', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_11519419715efa7533394328_78150878 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_8280515415efa7533397183_17683430 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_10180535365efa75333925f2_93699094 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11519419715efa7533394328_78150878', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8280515415efa7533397183_17683430', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_20359641555efa753339c7a2_81415236 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_16813267995efa753339b0e2_95760296 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20359641555efa753339c7a2_81415236', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_16849282965efa7533361f22_21710827 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16849282965efa7533361f22_21710827',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_17515133795efa75333631d3_12993673',
  ),
  'page_title' => 
  array (
    0 => 'Block_14332164145efa7533364916_13939289',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_10180535365efa75333925f2_93699094',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_11519419715efa7533394328_78150878',
  ),
  'page_content' => 
  array (
    0 => 'Block_8280515415efa7533397183_17683430',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_16813267995efa753339b0e2_95760296',
  ),
  'page_footer' => 
  array (
    0 => 'Block_20359641555efa753339c7a2_81415236',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17515133795efa75333631d3_12993673', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10180535365efa75333925f2_93699094', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16813267995efa753339b0e2_95760296', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
