<?php
/* Smarty version 3.1.48, created on 2025-05-31 05:08:12
  from '/home/zenexcloud/public_html/templates/cloudx/custom_file/common_price_file/plan-section-layout-with-billcycle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a8ebc2e85f7_33383092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9deb6fb005940fbce930894e7280456b175bff28' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/custom_file/common_price_file/plan-section-layout-with-billcycle.tpl',
      1 => 1726854010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a8ebc2e85f7_33383092 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value) {?>
<section class="hosting-plans-wrp pricing-section-layout-1">
   <div class="container">
    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['status'] == 'success') {?>
        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['result_count'] > 0) {?>
            <div class="titlebar">
                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_simpleTransparentPricingWithCycle'];?>
</h2>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_simpleTransparentPricingDesWithCycle'];?>
</p>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['product_cycles_count'] > 0) {?>
                <div class="serv-maintabs">
                    <ul class="nav nav-tabs" id="changeCyclePlanSections">
                        <?php $_smarty_tpl->_assignInScope('counter', 0);?> 
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cloudx_product_data']->value['product_cycles'], 'cloudx_product_cycle', false, 'kCycle');
$_smarty_tpl->tpl_vars['cloudx_product_cycle']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kCycle']->value => $_smarty_tpl->tpl_vars['cloudx_product_cycle']->value) {
$_smarty_tpl->tpl_vars['cloudx_product_cycle']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['kCycle']->value != 'onetime' && $_smarty_tpl->tpl_vars['kCycle']->value != 'free') {?>
                                <?php $_smarty_tpl->_assignInScope('billCyx', $_smarty_tpl->tpl_vars['LANG']->value[$_smarty_tpl->tpl_vars['cloudx_product_cycle']->value]);?>                       
                                <li class="nav-item" role="presentation" onClick="wgsProductPlanBillingCycleChange(this,'<?php echo $_smarty_tpl->tpl_vars['kCycle']->value;?>
');">
                                    <button class="nav-link button-billing-cycle <?php if ($_smarty_tpl->tpl_vars['counter']->value == '0') {?>active<?php }?>" id="plan1-<?php echo $_smarty_tpl->tpl_vars['kCycle']->value;?>
-tab" type="button"><?php echo $_smarty_tpl->tpl_vars['billCyx']->value;?>
</button>
                                </li>
                            <?php }?>
                            <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            <?php }?>
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
                                    <div class="plan-price-section price-sec-ly-1">
                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'onetime') {?>
                                            <div class="pricing-min-main onetime">
                                                <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'];?>
</span>
                                            </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'free') {?>
                                            <div class="pricing-min-main freeaccount">
                                                <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermfreeaccount'];?>
</span>
                                            </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'recurring') {?>
                                            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['monthly'] > 0) {?>
                                                <div class="pricing-min-main monthly w-hidden">
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                    <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>
</span>
                                                </div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['quarterly'] > 0) {?>
                                                <div class="pricing-min-main quarterly w-hidden">
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                    <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['quarterly'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>
</span>
                                                </div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['semiannually'] > 0) {?>
                                                <div class="pricing-min-main semiannually w-hidden">
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                    <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['semiannually'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>
</span>
                                                </div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['annually'] > 0) {?>
                                                <div class="pricing-min-main annually w-hidden">
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                    <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['annually'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>
</span>
                                                </div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['biennially'] > 0) {?>
                                                <div class="pricing-min-main biennially w-hidden">
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                    <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['biennially'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>
</span>
                                                </div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['triennially'] > 0) {?>
                                                <div class="pricing-min-main triennially w-hidden">
                                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-ly-1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                                    <span class="product-min-price product-price-ly-1"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['triennially'];?>
</span><span class="product-bill-cycle bill-cycle-ly-1">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>
</span>
                                                </div>
                                            <?php }?>
                                        <?php }?>
                                    </div>  
                                </div>
                                <div class="plan-include">
                                    <?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['description'];?>

                                    <div class="product_url_section">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['product_url'];?>
" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxcloudxregister_now'];?>
</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
            <?php echo '<script'; ?>
>
                jQuery(document).ready(function(){
                    if(jQuery("#changeCyclePlanSections").length > 0){
                       jQuery("#changeCyclePlanSections").find("li").eq(0).trigger('click');
                    }
                });
            <?php echo '</script'; ?>
>  
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
