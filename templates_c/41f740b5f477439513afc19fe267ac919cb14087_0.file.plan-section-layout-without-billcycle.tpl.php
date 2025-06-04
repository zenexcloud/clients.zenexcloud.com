<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:30:30
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/common_price_file/plan-section-layout-without-billcycle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683aa206932621_91982165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41f740b5f477439513afc19fe267ac919cb14087' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/common_price_file/plan-section-layout-without-billcycle.tpl',
      1 => 1726854010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683aa206932621_91982165 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value) {?>
    <section class="hosting-plans-wrp pricing-section-layout-3">
        <div class="container">
            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['status'] == 'success') {?>
                <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['result_count'] > 0) {?>
                    <div class="titlebar">
                        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_simpleTransparentPricing'];?>
</h2>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_simpleTransparentPricingDes'];?>
</p>
                    </div>
                    <div class="plans-row <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['result_count'] < 4) {?>product_boxes_without_slider<?php }?>">
                        <div class="row" <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['result_count'] > 3) {?> id="pricing-section-slider"<?php }?>>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cloudx_product_data']->value['products_array'], 'cloudx_product_prices');
$_smarty_tpl->tpl_vars['cloudx_product_prices']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cloudx_product_prices']->value) {
$_smarty_tpl->tpl_vars['cloudx_product_prices']->do_else = false;
?>
                                <div class="col-md-4 col-sm-12">
                                    <div class="plan-block <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_popular_label'] > 0) {?>populer-box<?php }?>">
                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_popular_label'] > 0) {?><label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_popular_label_layout_3'];?>
</label><?php }?>
                                        <div class="plan-plat">
                                            <h3><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['name'];?>
</h3>
                                            <div class="plan-price-section price-sec-ly-3">
                                                <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'onetime') {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                        <span class="product-min-price product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'];?>
</span>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'free') {?>
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                    <span class="product-min-price product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermfreeaccount'];?>
</span>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'recurring') {?>
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['monthly'] > 0) {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                        <span class="product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>
</span>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['quarterly'] > 0) {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                        <span class="product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['quarterly'];?>
</span><span class="bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>
</span>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['semiannually'] > 0) {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                        <span class="product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['semiannually'];?>
</span><span class="bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>
</span>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['annually'] > 0) {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                        <span class="product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['annually'];?>
</span><span class="bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>
</span>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['biennially'] > 0) {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                        <span class="product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['biennially'];?>
</span><span class="bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>
</span>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['triennially'] > 0) {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                        <span class="product-price-ly-3"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['triennially'];?>
</span><span class="bill-cycle-ly-3">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>
</span>
                                                    <?php }?>
                                                <?php }?>
                                            </div>  
                                        </div>
                                        <div class="plan-include">
                                            <?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['description'];?>

                                            <a href="<?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['product_url'];?>
" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxcloudxregister_now'];?>
</a>                                    
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                <?php }?>
            <?php } else { ?>
                <div class="titlebar">
                    <h2><?php echo $_smarty_tpl->tpl_vars['cloudx_product_data']->value['status'];?>
</h2>
                </div>
            <?php }?>
        </div>
    </section>
<?php }
}
}
