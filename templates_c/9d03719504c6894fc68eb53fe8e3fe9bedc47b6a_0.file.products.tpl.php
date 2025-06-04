<?php
/* Smarty version 3.1.48, created on 2025-06-01 08:57:51
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/orderforms/cloudx_cart/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c160fc6d033_50596800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d03719504c6894fc68eb53fe8e3fe9bedc47b6a' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/orderforms/cloudx_cart/products.tpl',
      1 => 1726854020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/common.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories-collapsed.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/recommendations-modal.tpl' => 1,
  ),
),false)) {
function content_683c160fc6d033_50596800 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<div id="order-standard_cart" class="cloudx_cart_body">
    <div class="row">
        <div class="cart-sidebar sidebar">
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <div class="cart-body">

            <div class="header-lined">
                <h1 class="font-size-36">
                    <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['headline']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['headline'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['name'];?>

                    <?php }?>
                </h1>
                <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['tagline']) {?>
                    <p><?php echo $_smarty_tpl->tpl_vars['productGroup']->value['tagline'];?>
</p>
                <?php }?>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                <div class="alert alert-danger">
                    <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

                </div>
            <?php } elseif (!$_smarty_tpl->tpl_vars['productGroup']->value) {?>
                <div class="alert alert-info">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.selectCategory'),$_smarty_tpl ) );?>

                </div>
            <?php }?>
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <div class="products" id="products">
                <div class="row row-eq-height">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'key');
$_smarty_tpl->tpl_vars['product']->iteration = 0;
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_smarty_tpl->tpl_vars['product']->iteration++;
$__foreach_product_0_saved = $_smarty_tpl->tpl_vars['product'];
?>
                        <?php $_smarty_tpl->_assignInScope('idPrefix', $_smarty_tpl->tpl_vars['product']->value['bid'] ? (("bundle").($_smarty_tpl->tpl_vars['product']->value['bid'])) : (("product").($_smarty_tpl->tpl_vars['product']->value['pid'])));?>
                    <div class="col-md-4">
                        <div class="product clearfix" id="<?php echo $_smarty_tpl->tpl_vars['idPrefix']->value;?>
">
                            <header>
                                <span id="<?php echo $_smarty_tpl->tpl_vars['idPrefix']->value;?>
-name"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</span>
                                <?php if ($_smarty_tpl->tpl_vars['product']->value['stockControlEnabled']) {?>
                                    <span class="qty">
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value['qty'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderavailable'];?>

                                    </span>
                                <?php }?>
                                <div class="product-pricing" id="<?php echo $_smarty_tpl->tpl_vars['idPrefix']->value;?>
-price">
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundledeal'];?>
<br />
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['displayprice']) {?>
                                            <span class="price"><?php echo $_smarty_tpl->tpl_vars['product']->value['displayprice'];?>
</span>
                                        <?php }?>
                                    <?php } else { ?>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['hasconfigoptions']) {?>
                                           <span class="starting-from"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
</span>                           
                                        <?php }?>
                                        <span class="price"><?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['price'];?>
</span>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "monthly") {?>
                                            <small class="billing-cycle-p-list"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>
</small>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "quarterly") {?>
                                            <small class="billing-cycle-p-list"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>
</small>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "semiannually") {?>
                                            <small class="billing-cycle-p-list"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>
</small>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "annually") {?>
                                            <small class="billing-cycle-p-list"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>
</small>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "biennially") {?>
                                            <small class="billing-cycle-p-list"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>
</small>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "triennially") {?>
                                            <small class="billing-cycle-p-list"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>
</small>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['setupFee']) {?>
                                            <small class="p-setup-fee"><?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['setupFee']->toPrefixed();?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersetupfee'];?>
</small>
                                        <?php }?>
                                    <?php }?>
                                </div>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['productUrl'];?>
" class="btn btn-success btn-sm btn-order-now" id="<?php echo $_smarty_tpl->tpl_vars['idPrefix']->value;?>
-order-button"<?php if ($_smarty_tpl->tpl_vars['product']->value['hasRecommendations']) {?> data-has-recommendations="1"<?php }?>>
                                    <i class="fas fa-shopping-cart"></i>
                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>

                                </a>
                            </header>
                            <div class="product-desc">
                                <?php if ($_smarty_tpl->tpl_vars['product']->value['featuresdesc']) {?>
                                    <p id="<?php echo $_smarty_tpl->tpl_vars['idPrefix']->value;?>
-description">
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value['featuresdesc'];?>

                                    </p>
                                <?php }?>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['features'], 'value', false, 'feature');
$_smarty_tpl->tpl_vars['value']->iteration = 0;
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['value']->iteration++;
$__foreach_value_1_saved = $_smarty_tpl->tpl_vars['value'];
?>
                                        <li id="<?php echo $_smarty_tpl->tpl_vars['idPrefix']->value;?>
-feature<?php echo $_smarty_tpl->tpl_vars['value']->iteration;?>
">
                                            <span class="feature-value"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span>
                                            <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>

                                        </li>
                                    <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['product']->iteration%3 == 0) {?>
                </div>
                <div class="row row-eq-height">
                    <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/recommendations-modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
