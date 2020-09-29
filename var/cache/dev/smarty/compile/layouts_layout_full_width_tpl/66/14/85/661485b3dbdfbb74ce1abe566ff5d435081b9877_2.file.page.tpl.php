<?php
/* Smarty version 3.1.33, created on 2020-09-28 16:48:02
  from 'C:\wamp6\www\prestashop\themes\classic\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f7205b2b851a1_73224898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '661485b3dbdfbb74ce1abe566ff5d435081b9877' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\themes\\classic\\templates\\page.tpl',
      1 => 1595943414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7205b2b851a1_73224898 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16685993695f7205b2a8f121_79943092', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_9140880655f7205b2aa2b31_73440988 extends Smarty_Internal_Block
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
class Block_2477775915f7205b2a979f0_99238953 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9140880655f7205b2aa2b31_73440988', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_14993572295f7205b2b4bf47_57775943 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_1024841885f7205b2b56d28_18291558 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_1303872355f7205b2b442f4_87544037 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14993572295f7205b2b4bf47_57775943', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1024841885f7205b2b56d28_18291558', 'page_content', $this->tplIndex);
?>

      </section>
            



    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_5675046515f7205b2b6f291_00434339 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_1732439075f7205b2b677e4_14518918 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5675046515f7205b2b6f291_00434339', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_16685993695f7205b2a8f121_79943092 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16685993695f7205b2a8f121_79943092',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_2477775915f7205b2a979f0_99238953',
  ),
  'page_title' => 
  array (
    0 => 'Block_9140880655f7205b2aa2b31_73440988',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_1303872355f7205b2b442f4_87544037',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_14993572295f7205b2b4bf47_57775943',
  ),
  'page_content' => 
  array (
    0 => 'Block_1024841885f7205b2b56d28_18291558',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_1732439075f7205b2b677e4_14518918',
  ),
  'page_footer' => 
  array (
    0 => 'Block_5675046515f7205b2b6f291_00434339',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2477775915f7205b2a979f0_99238953', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1303872355f7205b2b442f4_87544037', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1732439075f7205b2b677e4_14518918', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
