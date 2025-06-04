<?php
/* Smarty version 3.1.48, created on 2025-06-01 08:39:12
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/viewinvoice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c11b0259b15_47528701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c4bfaf3b8daeb3b40e36502f532017a3a67de07' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/viewinvoice.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683c11b0259b15_47528701 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/zenexcloud/public_html/billing.zenexcloud.com/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['enable_default_invoice_page'] == 'on') {?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>
      <link href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'all.min.css'),$_smarty_tpl ) );?>
?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
" rel="stylesheet">
      <link href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'theme.min.css'),$_smarty_tpl ) );?>
?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
" rel="stylesheet">
      <link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/css/fontawesome-all.min.css" rel="stylesheet">
      <link href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'invoice.min.css'),$_smarty_tpl ) );?>
?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
" rel="stylesheet">
      <?php echo '<script'; ?>
>var whmcsBaseUrl = "<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
";<?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'scripts.min.js'),$_smarty_tpl ) );?>
?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
"><?php echo '</script'; ?>
>
   </head>
   <body>
      <div class="container-fluid invoice-container">
         <?php if ($_smarty_tpl->tpl_vars['invalidInvoiceIdRequested']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'error'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceserror'),$_smarty_tpl ) );
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"danger",'headerTitle'=>$_prefixVariable1,'bodyContent'=>$_prefixVariable2,'bodyTextCenter'=>true), 0, true);
?>
         <?php } else { ?>
         <div class="row invoice-header">
            <div class="col-12 col-sm-6 justify-content-sm-between text-center text-sm-left invoice-col">
               <?php if ($_smarty_tpl->tpl_vars['logo']->value) {?>
               <p><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
" /></p>
               <?php } else { ?>
               <h2><?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
</h2>
               <?php }?>
               <h3><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</h3>
            </div>
            <div class="col-12 col-sm-6 invoice-col text-center">
               <div class="invoice-status">
                  <?php if ($_smarty_tpl->tpl_vars['status']->value == "Draft") {?>
                  <span class="draft"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdraft'),$_smarty_tpl ) );?>
</span>
                  <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Unpaid") {?>
                  <span class="unpaid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesunpaid'),$_smarty_tpl ) );?>
</span>
                  <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Paid") {?>
                  <span class="paid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicespaid'),$_smarty_tpl ) );?>
</span>
                  <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Refunded") {?>
                  <span class="refunded"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesrefunded'),$_smarty_tpl ) );?>
</span>
                  <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Cancelled") {?>
                  <span class="cancelled"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicescancelled'),$_smarty_tpl ) );?>
</span>
                  <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Collections") {?>
                  <span class="collections"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicescollections'),$_smarty_tpl ) );?>
</span>
                  <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Payment Pending") {?>
                  <span class="paid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesPaymentPending'),$_smarty_tpl ) );?>
</span>
                  <?php }?>
               </div>
               <?php if ($_smarty_tpl->tpl_vars['status']->value == "Unpaid" || $_smarty_tpl->tpl_vars['status']->value == "Draft") {?>
               <div class="small-text">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdatedue'),$_smarty_tpl ) );?>
: <?php echo $_smarty_tpl->tpl_vars['datedue']->value;?>

               </div>
               <div class="payment-btn-container d-print-none" align="center">
                  <?php echo $_smarty_tpl->tpl_vars['paymentbutton']->value;?>

               </div>
               <?php }?>
            </div>
         </div>
         <hr>
         <?php if ($_smarty_tpl->tpl_vars['paymentSuccessAwaitingNotification']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable3=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicePaymentSuccessAwaitingNotify'),$_smarty_tpl ) );
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'headerTitle'=>$_prefixVariable3,'bodyContent'=>$_prefixVariable4,'bodyTextCenter'=>true), 0, true);
?>
         <?php } elseif ($_smarty_tpl->tpl_vars['paymentSuccess']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable5=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicepaymentsuccessconfirmation'),$_smarty_tpl ) );
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'headerTitle'=>$_prefixVariable5,'bodyContent'=>$_prefixVariable6,'bodyTextCenter'=>true), 0, true);
?>
         <?php } elseif ($_smarty_tpl->tpl_vars['paymentInititated']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable7=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicePaymentInitiated'),$_smarty_tpl ) );
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable7,'bodyContent'=>$_prefixVariable8,'bodyTextCenter'=>true), 0, true);
?>
         <?php } elseif ($_smarty_tpl->tpl_vars['pendingReview']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable9=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicepaymentpendingreview'),$_smarty_tpl ) );
$_prefixVariable10=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable9,'bodyContent'=>$_prefixVariable10,'bodyTextCenter'=>true), 0, true);
?>
         <?php } elseif ($_smarty_tpl->tpl_vars['paymentFailed']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'error'),$_smarty_tpl ) );
$_prefixVariable11=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicepaymentfailedconfirmation'),$_smarty_tpl ) );
$_prefixVariable12=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"danger",'headerTitle'=>$_prefixVariable11,'bodyContent'=>$_prefixVariable12,'bodyTextCenter'=>true), 0, true);
?>
         <?php } elseif ($_smarty_tpl->tpl_vars['offlineReview']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable13=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceofflinepaid'),$_smarty_tpl ) );
$_prefixVariable14=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable13,'bodyContent'=>$_prefixVariable14,'bodyTextCenter'=>true), 0, true);
?>
         <?php }?>
         <div class="row justify-content-sm-between">
            <div class="col-12 col-sm-6 order-sm-last text-sm-right invoice-col right">
               <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicespayto'),$_smarty_tpl ) );?>
</strong>
               <address class="small-text">
                  <?php echo $_smarty_tpl->tpl_vars['payto']->value;?>

                  <?php if ($_smarty_tpl->tpl_vars['taxCode']->value) {?><br /><?php echo $_smarty_tpl->tpl_vars['taxIdLabel']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['taxCode']->value;
}?>
               </address>
            </div>
            <div class="col-12 col-sm-6 invoice-col">
               <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesinvoicedto'),$_smarty_tpl ) );?>
</strong>
               <address class="small-text">
                  <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['companyname']) {
echo $_smarty_tpl->tpl_vars['clientsdetails']->value['companyname'];?>
<br /><?php }?>
                  <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['lastname'];?>
<br />
                  <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address1'];?>
, <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address2'];?>
<br />
                  <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['state'];?>
, <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['postcode'];?>
<br />
                  <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['country'];?>

                  <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['tax_id']) {?>
                  <br /><?php echo $_smarty_tpl->tpl_vars['taxIdLabel']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['tax_id'];?>

                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                  <br /><br />
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield');
$_smarty_tpl->tpl_vars['customfield']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->do_else = false;
?>
                  <?php echo $_smarty_tpl->tpl_vars['customfield']->value['fieldname'];?>
: <?php echo $_smarty_tpl->tpl_vars['customfield']->value['value'];?>
<br />
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  <?php }?>
               </address>
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-sm-6 order-sm-last text-sm-right invoice-col right">
               <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentmethod'),$_smarty_tpl ) );?>
</strong><br>
               <span class="small-text float-sm-right" data-role="paymethod-info">
                  <?php if ($_smarty_tpl->tpl_vars['status']->value == "Unpaid" && $_smarty_tpl->tpl_vars['allowchangegateway']->value) {?>
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>
" class="form-inline">
                     <?php echo $_smarty_tpl->tpl_vars['tokenInput']->value;?>

                     <select name="gateway" class="custom-select" onchange="submit()">
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['availableGateways']->value, 'gatewayName', false, 'gatewayModule');
$_smarty_tpl->tpl_vars['gatewayName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gatewayModule']->value => $_smarty_tpl->tpl_vars['gatewayName']->value) {
$_smarty_tpl->tpl_vars['gatewayName']->do_else = false;
?>
                     <option value="<?php echo $_smarty_tpl->tpl_vars['gatewayModule']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['gatewayModule']->value == $_smarty_tpl->tpl_vars['selectedGateway']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['gatewayName']->value;?>
</option>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                     </select>
                  </form>
                  <?php } else { ?>
                  <?php echo $_smarty_tpl->tpl_vars['paymentmethod']->value;
if ($_smarty_tpl->tpl_vars['paymethoddisplayname']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['paymethoddisplayname']->value;?>
)<?php }?>
                  <?php }?>
               </span>
               <br /><br />
            </div>
            <div class="col-12 col-sm-6 invoice-col">
               <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdatecreated'),$_smarty_tpl ) );?>
</strong><br>
               <span class="small-text">
               <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
<br><br>
               </span>
            </div>
         </div>
         <br />
         <?php if ($_smarty_tpl->tpl_vars['manualapplycredit']->value) {?>
         <div class="card mb-3">
            <div class="card-header bg-success text-white">
               <h3 class="card-subtitle"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditapply'),$_smarty_tpl ) );?>
</strong></h3>
            </div>
            <div class="card-body">
               <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>
">
                  <input type="hidden" name="applycredit" value="true" />
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditdesc1'),$_smarty_tpl ) );?>
 <strong><?php echo $_smarty_tpl->tpl_vars['totalcredit']->value;?>
</strong>. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditdesc2'),$_smarty_tpl ) );?>
. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditamount'),$_smarty_tpl ) );?>
:
                  <div class="row">
                     <div class="col-8 offset-2 col-sm-4 offset-sm-4">
                        <div class="input-group">
                           <input type="text" name="creditamount" value="<?php echo $_smarty_tpl->tpl_vars['creditamount']->value;?>
" class="form-control" />
                           <div class="input-group-append">
                              <button type="submit" class="btn btn-success" id="btnInvoiceAddCreditApply">
                              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditapply'),$_smarty_tpl ) );?>

                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <?php }?>
         <?php if ($_smarty_tpl->tpl_vars['notes']->value) {?>
         <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesnotes'),$_smarty_tpl ) );
$_prefixVariable15=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable15,'bodyContent'=>$_smarty_tpl->tpl_vars['notes']->value), 0, true);
?>
         <?php }?>
         <div class="card bg-default">
            <div class="card-header">
               <h3 class="card-title mb-0 font-size-24"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicelineitems'),$_smarty_tpl ) );?>
</strong></h3>
            </div>
            <div class="table-responsive">
               <table class="table table-sm">
                  <thead>
                     <tr>
                        <td><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdescription'),$_smarty_tpl ) );?>
</strong></td>
                        <td width="20%" class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesamount'),$_smarty_tpl ) );?>
</strong></td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoiceitems']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                     <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];
if ($_smarty_tpl->tpl_vars['item']->value['taxed'] == "true") {?> *<?php }?></td>
                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
                     </tr>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                     <tr>
                        <td class="total-row text-right"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicessubtotal'),$_smarty_tpl ) );?>
</strong></td>
                        <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
                     </tr>
                     <?php if ($_smarty_tpl->tpl_vars['taxname']->value) {?>
                     <tr>
                        <td class="total-row text-right"><strong><?php echo $_smarty_tpl->tpl_vars['taxrate']->value;?>
% <?php echo $_smarty_tpl->tpl_vars['taxname']->value;?>
</strong></td>
                        <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['tax']->value;?>
</td>
                     </tr>
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['taxname2']->value) {?>
                     <tr>
                        <td class="total-row text-right"><strong><?php echo $_smarty_tpl->tpl_vars['taxrate2']->value;?>
% <?php echo $_smarty_tpl->tpl_vars['taxname2']->value;?>
</strong></td>
                        <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['tax2']->value;?>
</td>
                     </tr>
                     <?php }?>
                     <tr>
                        <td class="total-row text-right"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicescredit'),$_smarty_tpl ) );?>
</strong></td>
                        <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['credit']->value;?>
</td>
                     </tr>
                     <tr>
                        <td class="total-row text-right"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestotal'),$_smarty_tpl ) );?>
</strong></td>
                        <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <?php if ($_smarty_tpl->tpl_vars['taxrate']->value) {?>
         <p>* <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestaxindicator'),$_smarty_tpl ) );?>
</p>
         <?php }?>
         <div class="transactions-container small-text">
            <div class="table-responsive">
               <table class="table table-sm">
                  <thead>
                     <tr>
                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransdate'),$_smarty_tpl ) );?>
</strong></td>
                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransgateway'),$_smarty_tpl ) );?>
</strong></td>
                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransid'),$_smarty_tpl ) );?>
</strong></td>
                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransamount'),$_smarty_tpl ) );?>
</strong></td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transactions']->value, 'transaction');
$_smarty_tpl->tpl_vars['transaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['transaction']->value) {
$_smarty_tpl->tpl_vars['transaction']->do_else = false;
?>
                     <tr>
                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['date'];?>
</td>
                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['gateway'];?>
</td>
                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['transid'];?>
</td>
                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['amount'];?>
</td>
                     </tr>
                     <?php
}
if ($_smarty_tpl->tpl_vars['transaction']->do_else) {
?>
                     <tr>
                        <td class="text-center" colspan="4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransnonefound'),$_smarty_tpl ) );?>
</td>
                     </tr>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                     <tr>
                        <td class="text-right" colspan="3"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesbalance'),$_smarty_tpl ) );?>
</strong></td>
                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['balance']->value;?>
</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="float-right btn-group btn-group-sm d-print-none">
            <a href="javascript:window.print()" class="btn btn-default"><i class="fas fa-print"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'print'),$_smarty_tpl ) );?>
</a>
            <a href="dl.php?type=i&amp;id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>
" class="btn btn-default"><i class="fas fa-download"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdownload'),$_smarty_tpl ) );?>
</a>
         </div>
         <?php }?>
      </div>
      <p class="text-center d-print-none"><a href="clientarea.php?action=invoices"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesbacktoclientarea'),$_smarty_tpl ) );?>
</a></p>
      <div id="fullpage-overlay" class="w-hidden">
         <div class="outer-wrapper">
            <div class="inner-wrapper">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/overlay-spinner.svg" alt="">
               <br>
               <span class="msg"></span>
            </div>
         </div>
      </div>
   </body>
</html>
<?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <div class="invoice-wrapper">
        <div class="container-fluid">
            <div class="row">
                <?php if ($_smarty_tpl->tpl_vars['invalidInvoiceIdRequested']->value) {?>
                    <div class="col-md-12">
                        <div class="invoice-alert-box">
                            <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'error'),$_smarty_tpl ) );
$_prefixVariable16=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceserror'),$_smarty_tpl ) );
$_prefixVariable17=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"danger",'headerTitle'=>$_prefixVariable16,'bodyContent'=>$_prefixVariable17,'bodyTextCenter'=>true), 0, true);
?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-9">
                        <div class="invoice-inner-left">
                            <div class="invoice-all-messages">
                                <?php if ($_smarty_tpl->tpl_vars['paymentSuccessAwaitingNotification']->value) {?>
                                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable18=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicePaymentSuccessAwaitingNotify'),$_smarty_tpl ) );
$_prefixVariable19=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'headerTitle'=>$_prefixVariable18,'bodyContent'=>$_prefixVariable19,'bodyTextCenter'=>true), 0, true);
?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['paymentSuccess']->value) {?>
                                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable20=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicepaymentsuccessconfirmation'),$_smarty_tpl ) );
$_prefixVariable21=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'headerTitle'=>$_prefixVariable20,'bodyContent'=>$_prefixVariable21,'bodyTextCenter'=>true), 0, true);
?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['paymentInititated']->value) {?>
                                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable22=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicePaymentInitiated'),$_smarty_tpl ) );
$_prefixVariable23=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable22,'bodyContent'=>$_prefixVariable23,'bodyTextCenter'=>true), 0, true);
?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['pendingReview']->value) {?>
                                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable24=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicepaymentpendingreview'),$_smarty_tpl ) );
$_prefixVariable25=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable24,'bodyContent'=>$_prefixVariable25,'bodyTextCenter'=>true), 0, true);
?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['paymentFailed']->value) {?>
                                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'error'),$_smarty_tpl ) );
$_prefixVariable26=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicepaymentfailedconfirmation'),$_smarty_tpl ) );
$_prefixVariable27=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"danger",'headerTitle'=>$_prefixVariable26,'bodyContent'=>$_prefixVariable27,'bodyTextCenter'=>true), 0, true);
?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['offlineReview']->value) {?>
                                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'success'),$_smarty_tpl ) );
$_prefixVariable28=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceofflinepaid'),$_smarty_tpl ) );
$_prefixVariable29=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable28,'bodyContent'=>$_prefixVariable29,'bodyTextCenter'=>true), 0, true);
?>
                                <?php }?>
                            </div>
                            <div class="upper-invoice-head-section">
                                <?php if ($_smarty_tpl->tpl_vars['status']->value == "Draft") {?>
                                    <span class="invoice-state draft"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdraft'),$_smarty_tpl ) );?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Unpaid") {?>
                                    <span class="invoice-state unpaid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesunpaid'),$_smarty_tpl ) );?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Paid") {?>
                                    <span class="invoice-state paid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicespaid'),$_smarty_tpl ) );?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Refunded") {?>
                                    <span class="invoice-state refunded"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesrefunded'),$_smarty_tpl ) );?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Cancelled") {?>
                                    <span class="invoice-state cancelled"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicescancelled'),$_smarty_tpl ) );?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Collections") {?>
                                    <span class="invoice-state collections"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicescollections'),$_smarty_tpl ) );?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "Payment Pending") {?>
                                    <span class="invoice-state paid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesPaymentPending'),$_smarty_tpl ) );?>
</span>
                                <?php }?>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="invoice-status">
                                            <span class="invoice-number"><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</span>
                                        </div>                                         
                                    </div>
                                    <div class="col-md-5">
                                        <ul class="invoice-date-section">
                                            <li>
                                                <span class="label-left-sec-invoice"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdatecreated'),$_smarty_tpl ) );?>
</span>
                                                <span class="label-right-sec-invoice"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%d-%m-%Y");?>
</span>
                                            </li>
                                            <?php if ($_smarty_tpl->tpl_vars['status']->value == "Unpaid" || $_smarty_tpl->tpl_vars['status']->value == "Draft") {?>
                                                <li>
                                                    <span class="label-left-sec-invoice"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdatedue'),$_smarty_tpl ) );?>
</span>
                                                    <span class="label-right-sec-invoice"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datedue']->value,"%d-%m-%Y");?>
</span>
                                                </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-pay-to-section">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="invoice-payto-section">
                                            <h3 class="head-pay-to"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicespayto'),$_smarty_tpl ) );?>
:</h3>
                                            <address class="small-text">
                                                <?php echo $_smarty_tpl->tpl_vars['payto']->value;?>

                                                <?php if ($_smarty_tpl->tpl_vars['taxCode']->value) {?><br /><?php echo $_smarty_tpl->tpl_vars['taxIdLabel']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['taxCode']->value;
}?>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="invoice-payto-section">
                                            <h3 class="head-pay-to"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesinvoicedto'),$_smarty_tpl ) );?>
:</h3>
                                            <address class="small-text">
                                                <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['companyname']) {
echo $_smarty_tpl->tpl_vars['clientsdetails']->value['companyname'];?>
<br /><?php }?>
                                                <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['lastname'];?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address1'];?>
, <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address2'];?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['state'];?>
, <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['postcode'];?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['country'];?>

                                                <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['tax_id']) {?>
                                                    <br /><?php echo $_smarty_tpl->tpl_vars['taxIdLabel']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['tax_id'];?>

                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                                                <div class="custom-field-invoice">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield');
$_smarty_tpl->tpl_vars['customfield']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->do_else = false;
?>
                                                    <?php echo $_smarty_tpl->tpl_vars['customfield']->value['fieldname'];?>
: <?php echo $_smarty_tpl->tpl_vars['customfield']->value['value'];?>
<br />
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </div>
                                                <?php }?>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-item-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="iteam-heading-tbl"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicelineitems'),$_smarty_tpl ) );?>
</h3>
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <td><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdescription'),$_smarty_tpl ) );?>
</strong></td>
                                                    <td width="20%" class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesamount'),$_smarty_tpl ) );?>
</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoiceitems']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                                    <tr>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];
if ($_smarty_tpl->tpl_vars['item']->value['taxed'] == "true") {?> *<?php }?></td>
                                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
                                                    </tr>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                <tr class="sub-total-row">
                                                    <td class="total-row text-right"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicessubtotal'),$_smarty_tpl ) );?>
</strong></td>
                                                    <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
                                                </tr>
                                                <?php if ($_smarty_tpl->tpl_vars['taxname']->value) {?>
                                                    <tr>
                                                        <td class="total-row text-right"><strong><?php echo $_smarty_tpl->tpl_vars['taxrate']->value;?>
% <?php echo $_smarty_tpl->tpl_vars['taxname']->value;?>
</strong></td>
                                                        <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['tax']->value;?>
</td>
                                                    </tr>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['taxname2']->value) {?>
                                                    <tr>
                                                        <td class="total-row text-right"><strong><?php echo $_smarty_tpl->tpl_vars['taxrate2']->value;?>
% <?php echo $_smarty_tpl->tpl_vars['taxname2']->value;?>
</strong></td>
                                                        <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['tax2']->value;?>
</td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <td class="total-row text-right"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicescredit'),$_smarty_tpl ) );?>
</strong></td>
                                                    <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['credit']->value;?>
</td>
                                                </tr>
                                                <tr class="total-row-inv">
                                                    <td class="total-row text-right"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestotal'),$_smarty_tpl ) );?>
</strong></td>
                                                    <td class="total-row text-center"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['taxrate']->value) {?>
                                            <p>* <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestaxindicator'),$_smarty_tpl ) );?>
</p>
                                        <?php }?>                                       
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-transaction-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="iteam-heading-tbl"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransactions'),$_smarty_tpl ) );?>
</h3>
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransdate'),$_smarty_tpl ) );?>
</strong></td>
                                                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransgateway'),$_smarty_tpl ) );?>
</strong></td>
                                                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransid'),$_smarty_tpl ) );?>
</strong></td>
                                                        <td class="text-center"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransamount'),$_smarty_tpl ) );?>
</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transactions']->value, 'transaction');
$_smarty_tpl->tpl_vars['transaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['transaction']->value) {
$_smarty_tpl->tpl_vars['transaction']->do_else = false;
?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['date'];?>
</td>
                                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['gateway'];?>
</td>
                                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['transid'];?>
</td>
                                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['amount'];?>
</td>
                                                        </tr>
                                                    <?php
}
if ($_smarty_tpl->tpl_vars['transaction']->do_else) {
?>
                                                        <tr>
                                                            <td class="text-center" colspan="4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestransnonefound'),$_smarty_tpl ) );?>
</td>
                                                        </tr>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    <tr class="inv-balance-row">
                                                        <td class="text-right" colspan="3"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesbalance'),$_smarty_tpl ) );?>
</strong></td>
                                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['balance']->value;?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['notes']->value) {?>
                                <div class="invoice-note-section">
                                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesnotes'),$_smarty_tpl ) );
$_prefixVariable30=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'headerTitle'=>$_prefixVariable30,'bodyContent'=>$_smarty_tpl->tpl_vars['notes']->value), 0, true);
?>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="invoice-inner-right">
                            <?php if ($_smarty_tpl->tpl_vars['status']->value == "Unpaid") {?>
                                <div class="invoice-right-first-section">                                
                                    <div class="total-amount-section">
                                        <span class="due-amount-heading">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicestotaldue'),$_smarty_tpl ) );?>
	
                                        </span>
                                        <span class="due-amount-total">
                                            <?php echo $_smarty_tpl->tpl_vars['total']->value;?>

                                        </span>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['status']->value == "Unpaid" && $_smarty_tpl->tpl_vars['allowchangegateway']->value) {?>
                                        <div class="payment-gateway-section">
                                            <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentmethod'),$_smarty_tpl ) );?>
</h3>
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>
" class="form-inline">
                                                <?php echo $_smarty_tpl->tpl_vars['tokenInput']->value;?>

                                                <select name="gateway" class="form-control select-inline" onchange="submit()">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['availableGateways']->value, 'gatewayName', false, 'gatewayModule');
$_smarty_tpl->tpl_vars['gatewayName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gatewayModule']->value => $_smarty_tpl->tpl_vars['gatewayName']->value) {
$_smarty_tpl->tpl_vars['gatewayName']->do_else = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['gatewayModule']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['gatewayModule']->value == $_smarty_tpl->tpl_vars['selectedGateway']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['gatewayName']->value;?>
</option>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </form>
                                        </div>
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['paymentmethod']->value;
if ($_smarty_tpl->tpl_vars['paymethoddisplayname']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['paymethoddisplayname']->value;?>
)<?php }?>
                                    <?php }?>
                                    <div class="payment-method-button">
                                        <?php echo $_smarty_tpl->tpl_vars['paymentbutton']->value;?>

                                    </div>
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['manualapplycredit']->value) {?>
                                <div class="mannual-credit-section">
                                    <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditapply'),$_smarty_tpl ) );?>
</h2>
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>
">
                                        <input type="hidden" name="applycredit" value="true" />
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditdesc1'),$_smarty_tpl ) );?>
 <strong><?php echo $_smarty_tpl->tpl_vars['totalcredit']->value;?>
</strong>. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditdesc2'),$_smarty_tpl ) );?>
. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditamount'),$_smarty_tpl ) );?>
:
                                        <input type="text" name="creditamount" value="<?php echo $_smarty_tpl->tpl_vars['creditamount']->value;?>
" class="form-control" />
                                        <button type="submit" class="btn wgs_custom-btn" id="btnInvoiceAddCreditApply">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoiceaddcreditapply'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                </div>
                            <?php }?>
                            <div class="invoice-actions">
                                <h3 class="actions-invoice"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'actions'),$_smarty_tpl ) );?>
</h3>
                                <a href="javascript:window.print()" class="btn w-hidden"><i class="fas fa-print"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'print'),$_smarty_tpl ) );?>
</a>
                                <a href="dl.php?type=i&amp;id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;?>
" class="btn down-btn"><i class="fas fa-arrow-alt-to-bottom"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesdownload'),$_smarty_tpl ) );?>
</a>
                                <a href="clientarea.php?action=invoices" class="btn previous-page-link"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'invoicesbacktoclientarea'),$_smarty_tpl ) );?>
</a>                            
                            </div>
                        </div>                
                    </div>
                <?php }?>
            </div>
        </div>
    </div>    
<?php }
}
}
