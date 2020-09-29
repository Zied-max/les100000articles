<?php
/* Smarty version 3.1.33, created on 2020-09-28 17:28:49
  from 'C:\wamp6\www\prestashop\modules\ppbrandslider\views\templates\hook\displayAfterProductThumbs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f720f41b64082_13937855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cc231796cd85cbdce18e4ed6024cacc39aed8d2' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\modules\\ppbrandslider\\views\\templates\\hook\\displayAfterProductThumbs.tpl',
      1 => 1595577721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f720f41b64082_13937855 (Smarty_Internal_Template $_smarty_tpl) {
?><h5><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Manufacturer:','mod'=>'ppbrandslider'),$_smarty_tpl ) );?>
</h5>
<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_ps_url'], ENT_QUOTES, 'UTF-8');?>
/m/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_manufacturer'], ENT_QUOTES, 'UTF-8');?>
.jpg" width="100px" ><?php }
}
