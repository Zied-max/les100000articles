<?php
/* Smarty version 3.1.33, created on 2020-07-27 14:32:57
  from 'C:\wamp6\www\prestashop\modules\baproductscarousel\views\templates\front\js.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1ed789092550_51518914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33d48fd0acd8c5c63500efad49a3bea41479fa2d' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\modules\\baproductscarousel\\views\\templates\\front\\js.tpl',
      1 => 1595570931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1ed789092550_51518914 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/baproductscarousel/views/js/assets/owl.carousel.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
	$(document).ready(function($) {
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slidejs']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
		if (auto_play == 'true') {
			setInterval(checktime_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,1500);
			function checktime_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
() {
				if (!$('.template_slide:hover')) {
					if(!$('body').hasClass('modal-open')) {
						$('.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
').trigger('play.owl.autoplay');
					}
					else {
						$('.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
').trigger('stop.owl.autoplay');
					}
				}
			}
		}
		$('.fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
').owlCarousel({
			animateOut: 'slideOutDown',
			animateIn: 'flipInX',
			autoplayHoverPause:true,
			loop: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['loops'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
			autoplay:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['auto_play'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
			margin: 10,
			nav :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['nav'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
			dots :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['dots'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
			navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['item_mobile'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
					nav :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['nav'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
					dots :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['dots'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
				},
				600:{
					items:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['item_tablet'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
					nav :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['nav'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
					dots :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['dots'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
				},
				1000:{
					items:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['item_desktop'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
					nav :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['nav'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
					dots :<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['dots'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
				}
			}
		});
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	});
<?php echo '</script'; ?>
><?php }
}
