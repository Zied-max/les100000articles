<?php
/* Smarty version 3.1.33, created on 2020-09-28 17:09:29
  from 'C:\wamp6\www\prestashop\administration\themes\new-theme\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f720ab995a027_24203485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c542b102319274b7a033a296190e831f0f1095c' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\administration\\themes\\new-theme\\template\\content.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f720ab995a027_24203485 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
