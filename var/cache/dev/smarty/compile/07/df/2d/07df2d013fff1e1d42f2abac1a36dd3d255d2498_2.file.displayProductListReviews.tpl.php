<?php
/* Smarty version 3.1.33, created on 2020-09-28 16:48:02
  from 'C:\wamp6\www\prestashop\modules\ppbrandslider\views\templates\hook\displayProductListReviews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f7205b205e434_86706213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07df2d013fff1e1d42f2abac1a36dd3d255d2498' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\modules\\ppbrandslider\\views\\templates\\hook\\displayProductListReviews.tpl',
      1 => 1595577721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7205b205e434_86706213 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="brand-image">
	<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_ps_url'], ENT_QUOTES, 'UTF-8');?>
/m/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_manufacturer']->value, ENT_QUOTES, 'UTF-8');?>
.jpg" width="100px" height="50px">
</div>
	
<?php }
}
