<?php
/* Smarty version 3.1.33, created on 2020-09-28 17:07:30
  from 'C:\wamp6\www\prestashop\administration\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f720a42b565a3_24560628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca9b5e47caff4becd3f1b8838e71aaba065674ba' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\administration\\themes\\default\\template\\content.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f720a42b565a3_24560628 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
