<?php
/* Smarty version 3.1.33, created on 2020-07-27 14:32:59
  from 'C:\wamp6\www\prestashop\modules\ppbrandslider\views\templates\hook\displayHome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1ed78b3badb6_64279168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f5a9a0a81a28ba39a2d73d026b5fb6e1e26890a' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\modules\\ppbrandslider\\views\\templates\\hook\\displayHome.tpl',
      1 => 1595676628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1ed78b3badb6_64279168 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['show_arrows']->value == 0) {?>
<style type="text/css">
	.nbs-flexisel-nav-left, .nbs-flexisel-nav-right {
		display: none ;
	}
</style>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['enable_brand_slider']->value) {?>
<h1 class="marq" > Nos Marques </h1>
<ul id="logo-slider"> 
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['manufacturers']->value, 'manufacturer', false, NULL, 'manufacturer_list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->value) {
?>
	<li>
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']), ENT_QUOTES, 'UTF-8');?>
">
		<img src="/prestashop/img/m/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'], ENT_QUOTES, 'UTF-8');?>
.jpg"></a>
	</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<?php }?>


<?php }
}
