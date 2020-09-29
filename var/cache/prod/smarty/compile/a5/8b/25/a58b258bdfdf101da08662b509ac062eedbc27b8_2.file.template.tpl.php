<?php
/* Smarty version 3.1.33, created on 2020-07-27 14:32:58
  from 'C:\wamp6\www\prestashop\modules\baproductscarousel\views\templates\front\template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1ed78a241fa3_76930745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a58b258bdfdf101da08662b509ac062eedbc27b8' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\modules\\baproductscarousel\\views\\templates\\front\\template.tpl',
      1 => 1595570931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1ed78a241fa3_76930745 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style type="text/css" media="screen">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['showsc']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 > .owl-nav > .owl-prev, 
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 > .owl-nav > .owl-next {
			background: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['background_arrow'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_color_arrow'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
			font-size: 18px;
			margin-top: -30px;
			position: absolute;
			top: 42%;
			text-align: center;
			line-height: 39px;
			border:1px solid #fff;
			width: 40px;
			height: 40px;
		}
		.template_slide .fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
_title .page-title-categoryslider{
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		}
		.template_slide .fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
_title .page-title-categoryslider:after{
			background-color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .owl-nav .owl-prev:hover, 
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .owl-nav .owl-next:hover {
			background: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['background_arrow_hover'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .whislist_casour{
			background: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['background_button'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
			color:#<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
			border: 1px solid #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .ad_info_pro h4 a:hover{
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .whislist_casour>a{
			background: transparent !important;
			color:#<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .whislist_casour:hover,.compare_check,.compare_check a{
			background: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['background_button_hover'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color_hover'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
			transition: all 0.4s ease-in-out 0s;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .whislist_casour:hover a{
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color_hover'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .ad_info_pro h4 a{
			font-size: 13px;
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .add_to_carsou .ajax_add_to_cart_button:hover{
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['background_button'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
		}
		.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 .add_to_carsou .ajax_add_to_cart_button{
			background:#<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['text_button_color'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
			color: #<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['background_button'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
		}
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</style><?php }
}
