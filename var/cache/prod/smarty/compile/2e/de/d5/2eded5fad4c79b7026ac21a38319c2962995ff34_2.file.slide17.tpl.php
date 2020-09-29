<?php
/* Smarty version 3.1.33, created on 2020-07-27 14:32:57
  from 'C:\wamp6\www\prestashop\modules\baproductscarousel\views\templates\front\slide17.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1ed7898e8102_81774763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2eded5fad4c79b7026ac21a38319c2962995ff34' => 
    array (
      0 => 'C:\\wamp6\\www\\prestashop\\modules\\baproductscarousel\\views\\templates\\front\\slide17.tpl',
      1 => 1595570931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1ed7898e8102_81774763 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('checkhihi', "hien");
if ($_smarty_tpl->tpl_vars['embe']->value == 1) {?>
	<?php if (count($_smarty_tpl->tpl_vars['shows']->value) > 0) {?>
		<div class="template_slide">
			<?php if ($_smarty_tpl->tpl_vars['title']->value == 1) {?>
				<div class="page-top fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_sl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
_title">
					<div class="page-title-categoryslider">
						<span><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['names']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
					</div> 
				</div>
			<?php }?>
			<div style="width: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sizeslide']->value->sliw,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;height: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sizeslide']->value->slih,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="fadeOut_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_sl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 owl-carousel owl-theme saddd">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shows']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
					<?php if (Product::getQuantity($_smarty_tpl->tpl_vars['item']->value['id_product']) <= 0 && $_smarty_tpl->tpl_vars['cstock']->value == 1) {?>
						<?php $_smarty_tpl->_assignInScope('checkhihi', 'an');?>
					<?php } else { ?>
						<?php $_smarty_tpl->_assignInScope('checkhihi', 'hien');?>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['checkhihi']->value == 'hien') {?>
						<?php $_smarty_tpl->_assignInScope('ks', Category::getCategoryInformations(array($_smarty_tpl->tpl_vars['item']->value['id_category_default'])));?>
						<?php $_smarty_tpl->_assignInScope('im', Product::getCover($_smarty_tpl->tpl_vars['item']->value['id_product']));?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ks']->value, 'item1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->value) {
?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['im']->value, 'item2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
?>
								<div style="" class="item slier_item">
									<div class="js-product-miniature" data-id-product="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['cache_default_attribute'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
										<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( BaProductsCarousel::getUrlFix(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'htmlall','UTF-8' ))),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="">
											<img style="margin:auto;" class="img-responsive" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( BaProductsCarousel::getImgFix($_smarty_tpl->tpl_vars['item']->value['id_product'],$_smarty_tpl->tpl_vars['sizeslide']->value->sizeimg),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="">
										</a>
										<?php $_smarty_tpl->_assignInScope('cur', Currency::getCurrency($_smarty_tpl->tpl_vars['id_currency']->value));?>
										<?php ob_start();
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['price'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('lb3', round($_prefixVariable1*$_smarty_tpl->tpl_vars['item']->value['rate']/100+$_smarty_tpl->tpl_vars['item']->value['price'],2)*$_smarty_tpl->tpl_vars['cur']->value['conversion_rate']);?>
										<?php $_smarty_tpl->_assignInScope('lb4', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( round(Product::getPriceStatic($_smarty_tpl->tpl_vars['item']->value['id_product']),2),'htmlall','UTF-8' )));?>
										<?php if ($_smarty_tpl->tpl_vars['lb3']->value > $_smarty_tpl->tpl_vars['lb4']->value) {?>
											<span style="top: 10px;right: 19px;" class="pro_sale">-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( round(($_smarty_tpl->tpl_vars['lb3']->value-$_smarty_tpl->tpl_vars['lb4']->value)*100/$_smarty_tpl->tpl_vars['lb3']->value),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
%</span>
										<?php }?>
								    	<a class='quiss quick-view' rel="<?php echo htmlspecialchars(BaProductsCarousel::getUrlFix(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'htmlall','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" title="" data-link-action="quickview"><i class="fa fa-eye"></i></a>
										<div class="ad_info_pro">
											<h4><a href="<?php echo htmlspecialchars(BaProductsCarousel::getUrlFix(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'htmlall','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></h4>
											<?php if ($_smarty_tpl->tpl_vars['price']->value == 1) {?>
											    <span style="font-size: 1.1rem" class="price_pro"><?php echo htmlspecialchars(Tools::displayPrice(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lb4']->value,'htmlall','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</span>
											    <?php if ($_smarty_tpl->tpl_vars['lb3']->value !== $_smarty_tpl->tpl_vars['lb4']->value && $_smarty_tpl->tpl_vars['item']->value['price'] > 0) {?>
											    <span class="price_old"><?php echo htmlspecialchars(Tools::displayPrice(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lb3']->value,'htmlall','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</span>
											    <?php }?>
										    <?php }?>
										</div>
										<div style="text-align: center;margin-bottom: 7px;">
											<?php if ($_smarty_tpl->tpl_vars['checkratingst']->value == 1) {?>
												<?php $_smarty_tpl->_assignInScope('starra', BaProductsCarousel::getAverageGrade($_smarty_tpl->tpl_vars['item']->value['id_product']));?>
												<?php if ($_smarty_tpl->tpl_vars['starra']->value['grade'] > 0) {?>
													<span <?php if ($_smarty_tpl->tpl_vars['starra']->value['grade'] > 0) {?>style="color: orange;"<?php }?> class="fa fa-star"></span>
													<span <?php if ($_smarty_tpl->tpl_vars['starra']->value['grade'] > 1) {?>style="color: orange;"<?php }?> class="fa fa-star"></span>
													<span <?php if ($_smarty_tpl->tpl_vars['starra']->value['grade'] > 2) {?>style="color: orange;"<?php }?> class="fa fa-star"></span>
													<span <?php if ($_smarty_tpl->tpl_vars['starra']->value['grade'] > 3) {?>style="color: orange;"<?php }?> class="fa fa-star"></span>
													<span <?php if ($_smarty_tpl->tpl_vars['starra']->value['grade'] > 4) {?>style="color: orange;"<?php }?> class="fa fa-star"></span>
												<?php }?>
											<?php }?>
										</div>
										<div style="text-align: center;">
											<?php if ($_smarty_tpl->tpl_vars['addtocart']->value->addcart == 1) {?>
												<div class="add_to_carsou button-container" >
													<form action="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['urls']->value['pages']['cart'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" method="post" accept-charset="utf-8">
														<input type="hidden" name="id_product" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
														<input type="hidden" name="token" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
														<?php if (Product::getQuantity($_smarty_tpl->tpl_vars['item']->value['id_product']) <= 0) {?>
														<a  style="background: #C4C4C4 !important" class="ajax_add_to_cart_button add-to-cart" <?php if (Product::getQuantity($_smarty_tpl->tpl_vars['item']->value['id_product']) > 0) {?> data-button-action="add-to-cart"  rel="nofollow" title="<a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to cart','mod'=>'baproductscarousel'),$_smarty_tpl ) );?>
"  data-id-product="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
														<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Out of stock','mod'=>'baproductscarousel'),$_smarty_tpl ) );?>
</span>
														</a>
														<?php } else { ?>
														<button class="ajax_add_to_cart_button add-to-cart" <?php if (Product::getQuantity($_smarty_tpl->tpl_vars['item']->value['id_product']) > 0) {?> data-button-action="add-to-cart"  rel="nofollow" title="Add to cart"  data-id-product="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
														<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to cart','mod'=>'baproductscarousel'),$_smarty_tpl ) );?>
</span>
														</button>
														<?php }?>
													</form>
												</div>
											<?php }?>
										</div>
									</div>
								</div>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
	<?php }
}
}
}
