<?php
/* Smarty version 3.1.48, created on 2025-05-31 08:26:38
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/common_price_file/plan-section-layout-dedicated-2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683abd3e27b758_01510770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2a74c8313aabe386db2df41cfe479b60c53387a' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/common_price_file/plan-section-layout-dedicated-2.tpl',
      1 => 1726854010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683abd3e27b758_01510770 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value) {?>
   <section class="dedicated-server-wrp dedicated-layout-2">
      <div class="container">
         <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['status'] == 'success') {?>
            <?php if ($_smarty_tpl->tpl_vars['cloudx_product_data']->value['result_count'] > 0) {?>
               <div class="titlebar">
                  <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_dedicated2_head'];?>
</h2>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_dedicated2_subhead'];?>
</p>
               </div>
               <div class="row">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cloudx_product_data']->value['products_array'], 'cloudx_product_prices');
$_smarty_tpl->tpl_vars['cloudx_product_prices']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cloudx_product_prices']->value) {
$_smarty_tpl->tpl_vars['cloudx_product_prices']->do_else = false;
?>
                     <div class="dedicated-2-main">
                        <span class="plan-name-dedicated"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['name'];?>
</span>
                        <div class="dedicated-inner-sec">
                           <div class="left-dedicated-sec">
                              <p>
                                 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_cpu_dedicated2'];?>
 <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['cpu_name'] != '0') {
echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['cpu_name'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_not_available'];
}?>/<?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['cpu_power'] != '0') {
echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['cpu_power'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_not_available'];
}?>
                              </p>
                              <p>
                                 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_ram_dedicated2'];?>
 <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['ram_data'] != '0') {
echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['ram_data'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_not_available'];
}?>
                              </p>
                              <p>
                                 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_disks_dedicated2'];?>
 <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['storage_data'] != '0') {
echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['storage_data'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_not_available'];
}?>
                              </p>
                              <p>
                                 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_bandwidth_dedicated2'];?>
 <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['bandwidth_data'] != '0') {
echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['bandwidth_data'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_not_available'];
}?>
                              </p>
                              <p>
                                 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_ip_add_dedicated2'];?>
 <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['ip_address'] != '0') {
echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['ip_address'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_not_available'];
}?>
                              </p>
                                 <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['server_location'] != '0') {?>
                                    <div class="server-location-flag dedicated-2-loc">
                                       <p class="s-l"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_sl_dedicated2'];?>

                                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['dedicated_page_data']['server_location'], 'locationData');
$_smarty_tpl->tpl_vars['locationData']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['locationData']->value) {
$_smarty_tpl->tpl_vars['locationData']->do_else = false;
?>
                                          <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/css/flags/blank.gif" class="flag flag-<?php echo $_smarty_tpl->tpl_vars['locationData']->value;?>
"/>
                                       <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                       </p>
                                    </div>
                                 <?php } else { ?>
                                    <p class="s-l">
                                       <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_sl_dedicated2'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_not_available'];?>

                                    </p>
                                 <?php }?>
                           </div>
                           <div class="right-dedicated-sec">
                              <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'onetime') {?>
                                 <div class="pricing-dedi-main ontime">
                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                    <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'];?>
</span>
                                 </div>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'free') {?>
                                 <div class="pricing-dedi-main freeaccount">
                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                    <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermfreeaccount'];?>
</span>
                                 </div>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['paytype'] == 'recurring') {?>
                                 <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['monthly'] > 0) {?>
                                    <div class="pricing-dedi-main monthly">
                                       <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                       <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['monthly'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>
</span>
                                    </div>
                                 <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['quarterly'] > 0) {?>
                                    <div class="pricing-dedi-main quarterly">
                                       <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                       <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['quarterly'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>
</span>
                                    </div>
                                 <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['semiannually'] > 0) {?>
                                    <div class="pricing-dedi-main semiannually">
                                       <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                       <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['semiannually'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>
</span>
                                    </div>
                                 <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['annually'] > 0) {?>
                                    <div class="pricing-dedi-main annually">
                                       <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                       <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['annually'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>
</span>
                                    </div>
                                 <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['biennially'] > 0) {?>
                                    <div class="pricing-dedi-main biennially">
                                       <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                       <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['biennially'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>
</span>
                                    </div>
                                 <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_raw']['triennially'] > 0) {?>
                                    <div class="pricing-dedi-main triennially">
                                       <?php if ($_smarty_tpl->tpl_vars['cloudx_product_prices']->value['has_config_option'] > 0) {?><span class="start-from-dedicated"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span><?php }?>
                                       <span class="product-min-price-dedi"><?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['pricing_formated']['triennially'];?>
</span><span class="product-bill-cycle-dedi">/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>
</span>
                                    </div>
                                 <?php }?>
                              <?php }?>
                              <div class="dedi-2-buy">
                                 <a href="<?php echo $_smarty_tpl->tpl_vars['cloudx_product_prices']->value['product_url'];?>
" class="dedicated-btn-buy"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_buy_now_button'];?>
</a>  
                              </div>                                        
                           </div>
                        </div>
                     </div>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
