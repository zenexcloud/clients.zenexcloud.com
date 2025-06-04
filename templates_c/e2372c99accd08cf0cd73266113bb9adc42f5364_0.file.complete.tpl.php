<?php
/* Smarty version 3.1.48, created on 2025-06-01 11:58:24
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/orderforms/cloudx_cart/complete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c406049b6a9_97036866',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2372c99accd08cf0cd73266113bb9adc42f5364' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/orderforms/cloudx_cart/complete.tpl',
      1 => 1726854020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/common.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories-collapsed.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/includes/product-recommendations.tpl' => 1,
  ),
),false)) {
function content_683c406049b6a9_97036866 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<div id="order-standard_cart" class="cloudx_cart_body">

    <div class="row">
        <div class="cart-sidebar">
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <div class="cart-body">
            <div class="header-lined">
                <h1 class="font-size-36"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderconfirmation'];?>
</h1>
            </div>
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderreceived'];?>
</p>

            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-info order-confirmation">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernumberis'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['ordernumber']->value;?>
</span>
                    </div>
                </div>
            </div>

            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderfinalinstructions'];?>
</p>

            <?php if ($_smarty_tpl->tpl_vars['expressCheckoutInfo']->value) {?>
                <div class="alert alert-info text-center">
                    <?php echo $_smarty_tpl->tpl_vars['expressCheckoutInfo']->value;?>

                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['expressCheckoutError']->value) {?>
                <div class="alert alert-danger text-center">
                    <?php echo $_smarty_tpl->tpl_vars['expressCheckoutError']->value;?>

                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['invoiceid']->value && !$_smarty_tpl->tpl_vars['ispaid']->value) {?>
                <div class="alert alert-warning text-center">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordercompletebutnotpaid'];?>

                    <br /><br />
                    <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/viewinvoice.php?id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>
" target="_blank" class="alert-link">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicenumber'];
echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>

                    </a>
                </div>
            <?php }?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['addons_html']->value, 'addon_html');
$_smarty_tpl->tpl_vars['addon_html']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['addon_html']->value) {
$_smarty_tpl->tpl_vars['addon_html']->do_else = false;
?>
                <div class="order-confirmation-addon-output">
                    <?php echo $_smarty_tpl->tpl_vars['addon_html']->value;?>

                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            <?php if ($_smarty_tpl->tpl_vars['ispaid']->value) {?>
                <!-- Enter any HTML code which should be displayed when a user has completed checkout here -->
                <!-- Common uses of this include conversion and affiliate tracking scripts -->
            <?php }?>

            <div class="text-center">
                <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/clientarea.php" class="btn btn-default complete-page-btn">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['continueToClientArea'];?>

                    &nbsp;<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['hasRecommendations']->value) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/includes/product-recommendations.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php }?>
        </div>
    </div>
</div>
<?php }
}
