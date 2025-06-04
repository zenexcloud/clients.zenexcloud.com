
{if $cloudx_theme_settings.enable_default_invoice_page eq 'on'}
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="{$charset}" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{$companyname} - {$pagetitle}</title>
      <link href="{assetPath file='all.min.css'}?v={$versionHash}" rel="stylesheet">
      <link href="{assetPath file='theme.min.css'}?v={$versionHash}" rel="stylesheet">
      <link href="{$WEB_ROOT}/assets/css/fontawesome-all.min.css" rel="stylesheet">
      <link href="{assetPath file='invoice.min.css'}?v={$versionHash}" rel="stylesheet">
      <script>var whmcsBaseUrl = "{$WEB_ROOT}";</script>
      <script src="{assetPath file='scripts.min.js'}?v={$versionHash}"></script>
   </head>
   <body>
      <div class="container-fluid invoice-container">
         {if $invalidInvoiceIdRequested}
         {include file="$template/includes/panel.tpl" type="danger" headerTitle="{lang key='error'}" bodyContent="{lang key='invoiceserror'}" bodyTextCenter=true}
         {else}
         <div class="row invoice-header">
            <div class="col-12 col-sm-6 justify-content-sm-between text-center text-sm-left invoice-col">
               {if $logo}
               <p><img src="{$logo}" title="{$companyname}" /></p>
               {else}
               <h2>{$companyname}</h2>
               {/if}
               <h3>{$pagetitle}</h3>
            </div>
            <div class="col-12 col-sm-6 invoice-col text-center">
               <div class="invoice-status">
                  {if $status eq "Draft"}
                  <span class="draft">{lang key='invoicesdraft'}</span>
                  {elseif $status eq "Unpaid"}
                  <span class="unpaid">{lang key='invoicesunpaid'}</span>
                  {elseif $status eq "Paid"}
                  <span class="paid">{lang key='invoicespaid'}</span>
                  {elseif $status eq "Refunded"}
                  <span class="refunded">{lang key='invoicesrefunded'}</span>
                  {elseif $status eq "Cancelled"}
                  <span class="cancelled">{lang key='invoicescancelled'}</span>
                  {elseif $status eq "Collections"}
                  <span class="collections">{lang key='invoicescollections'}</span>
                  {elseif $status eq "Payment Pending"}
                  <span class="paid">{lang key='invoicesPaymentPending'}</span>
                  {/if}
               </div>
               {if $status eq "Unpaid" || $status eq "Draft"}
               <div class="small-text">
                  {lang key='invoicesdatedue'}: {$datedue}
               </div>
               <div class="payment-btn-container d-print-none" align="center">
                  {$paymentbutton}
               </div>
               {/if}
            </div>
         </div>
         <hr>
         {if $paymentSuccessAwaitingNotification}
         {include file="$template/includes/panel.tpl" type="success" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicePaymentSuccessAwaitingNotify'}" bodyTextCenter=true}
         {elseif $paymentSuccess}
         {include file="$template/includes/panel.tpl" type="success" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicepaymentsuccessconfirmation'}" bodyTextCenter=true}
         {elseif $paymentInititated}
         {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicePaymentInitiated'}" bodyTextCenter=true}
         {elseif $pendingReview}
         {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicepaymentpendingreview'}" bodyTextCenter=true}
         {elseif $paymentFailed}
         {include file="$template/includes/panel.tpl" type="danger" headerTitle="{lang key='error'}" bodyContent="{lang key='invoicepaymentfailedconfirmation'}" bodyTextCenter=true}
         {elseif $offlineReview}
         {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='success'}" bodyContent="{lang key='invoiceofflinepaid'}" bodyTextCenter=true}
         {/if}
         <div class="row justify-content-sm-between">
            <div class="col-12 col-sm-6 order-sm-last text-sm-right invoice-col right">
               <strong>{lang key='invoicespayto'}</strong>
               <address class="small-text">
                  {$payto}
                  {if $taxCode}<br />{$taxIdLabel}: {$taxCode}{/if}
               </address>
            </div>
            <div class="col-12 col-sm-6 invoice-col">
               <strong>{lang key='invoicesinvoicedto'}</strong>
               <address class="small-text">
                  {if $clientsdetails.companyname}{$clientsdetails.companyname}<br />{/if}
                  {$clientsdetails.firstname} {$clientsdetails.lastname}<br />
                  {$clientsdetails.address1}, {$clientsdetails.address2}<br />
                  {$clientsdetails.city}, {$clientsdetails.state}, {$clientsdetails.postcode}<br />
                  {$clientsdetails.country}
                  {if $clientsdetails.tax_id}
                  <br />{$taxIdLabel}: {$clientsdetails.tax_id}
                  {/if}
                  {if $customfields}
                  <br /><br />
                  {foreach $customfields as $customfield}
                  {$customfield.fieldname}: {$customfield.value}<br />
                  {/foreach}
                  {/if}
               </address>
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-sm-6 order-sm-last text-sm-right invoice-col right">
               <strong>{lang key='paymentmethod'}</strong><br>
               <span class="small-text float-sm-right" data-role="paymethod-info">
                  {if $status eq "Unpaid" && $allowchangegateway}
                  <form method="post" action="{$smarty.server.PHP_SELF}?id={$invoiceid}" class="form-inline">
                     {$tokenInput}
                     <select name="gateway" class="custom-select" onchange="submit()">
                     {foreach $availableGateways as $gatewayModule => $gatewayName}
                     <option value="{$gatewayModule}"{if $gatewayModule == $selectedGateway} selected="selected"{/if}>{$gatewayName}</option>
                     {/foreach}
                     </select>
                  </form>
                  {else}
                  {$paymentmethod}{if $paymethoddisplayname} ({$paymethoddisplayname}){/if}
                  {/if}
               </span>
               <br /><br />
            </div>
            <div class="col-12 col-sm-6 invoice-col">
               <strong>{lang key='invoicesdatecreated'}</strong><br>
               <span class="small-text">
               {$date}<br><br>
               </span>
            </div>
         </div>
         <br />
         {if $manualapplycredit}
         <div class="card mb-3">
            <div class="card-header bg-success text-white">
               <h3 class="card-subtitle"><strong>{lang key='invoiceaddcreditapply'}</strong></h3>
            </div>
            <div class="card-body">
               <form method="post" action="{$smarty.server.PHP_SELF}?id={$invoiceid}">
                  <input type="hidden" name="applycredit" value="true" />
                  {lang key='invoiceaddcreditdesc1'} <strong>{$totalcredit}</strong>. {lang key='invoiceaddcreditdesc2'}. {lang key='invoiceaddcreditamount'}:
                  <div class="row">
                     <div class="col-8 offset-2 col-sm-4 offset-sm-4">
                        <div class="input-group">
                           <input type="text" name="creditamount" value="{$creditamount}" class="form-control" />
                           <div class="input-group-append">
                              <button type="submit" class="btn btn-success" id="btnInvoiceAddCreditApply">
                              {lang key='invoiceaddcreditapply'}
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         {/if}
         {if $notes}
         {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='invoicesnotes'}" bodyContent=$notes}
         {/if}
         <div class="card bg-default">
            <div class="card-header">
               <h3 class="card-title mb-0 font-size-24"><strong>{lang key='invoicelineitems'}</strong></h3>
            </div>
            <div class="table-responsive">
               <table class="table table-sm">
                  <thead>
                     <tr>
                        <td><strong>{lang key='invoicesdescription'}</strong></td>
                        <td width="20%" class="text-center"><strong>{lang key='invoicesamount'}</strong></td>
                     </tr>
                  </thead>
                  <tbody>
                     {foreach $invoiceitems as $item}
                     <tr>
                        <td>{$item.description}{if $item.taxed eq "true"} *{/if}</td>
                        <td class="text-center">{$item.amount}</td>
                     </tr>
                     {/foreach}
                     <tr>
                        <td class="total-row text-right"><strong>{lang key='invoicessubtotal'}</strong></td>
                        <td class="total-row text-center">{$subtotal}</td>
                     </tr>
                     {if $taxname}
                     <tr>
                        <td class="total-row text-right"><strong>{$taxrate}% {$taxname}</strong></td>
                        <td class="total-row text-center">{$tax}</td>
                     </tr>
                     {/if}
                     {if $taxname2}
                     <tr>
                        <td class="total-row text-right"><strong>{$taxrate2}% {$taxname2}</strong></td>
                        <td class="total-row text-center">{$tax2}</td>
                     </tr>
                     {/if}
                     <tr>
                        <td class="total-row text-right"><strong>{lang key='invoicescredit'}</strong></td>
                        <td class="total-row text-center">{$credit}</td>
                     </tr>
                     <tr>
                        <td class="total-row text-right"><strong>{lang key='invoicestotal'}</strong></td>
                        <td class="total-row text-center">{$total}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         {if $taxrate}
         <p>* {lang key='invoicestaxindicator'}</p>
         {/if}
         <div class="transactions-container small-text">
            <div class="table-responsive">
               <table class="table table-sm">
                  <thead>
                     <tr>
                        <td class="text-center"><strong>{lang key='invoicestransdate'}</strong></td>
                        <td class="text-center"><strong>{lang key='invoicestransgateway'}</strong></td>
                        <td class="text-center"><strong>{lang key='invoicestransid'}</strong></td>
                        <td class="text-center"><strong>{lang key='invoicestransamount'}</strong></td>
                     </tr>
                  </thead>
                  <tbody>
                     {foreach $transactions as $transaction}
                     <tr>
                        <td class="text-center">{$transaction.date}</td>
                        <td class="text-center">{$transaction.gateway}</td>
                        <td class="text-center">{$transaction.transid}</td>
                        <td class="text-center">{$transaction.amount}</td>
                     </tr>
                     {foreachelse}
                     <tr>
                        <td class="text-center" colspan="4">{lang key='invoicestransnonefound'}</td>
                     </tr>
                     {/foreach}
                     <tr>
                        <td class="text-right" colspan="3"><strong>{lang key='invoicesbalance'}</strong></td>
                        <td class="text-center">{$balance}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="float-right btn-group btn-group-sm d-print-none">
            <a href="javascript:window.print()" class="btn btn-default"><i class="fas fa-print"></i> {lang key='print'}</a>
            <a href="dl.php?type=i&amp;id={$invoiceid}" class="btn btn-default"><i class="fas fa-download"></i> {lang key='invoicesdownload'}</a>
         </div>
         {/if}
      </div>
      <p class="text-center d-print-none"><a href="clientarea.php?action=invoices">{lang key='invoicesbacktoclientarea'}</a></p>
      <div id="fullpage-overlay" class="w-hidden">
         <div class="outer-wrapper">
            <div class="inner-wrapper">
               <img src="{$WEB_ROOT}/assets/img/overlay-spinner.svg" alt="">
               <br>
               <span class="msg"></span>
            </div>
         </div>
      </div>
   </body>
</html>
{else}
    {include file="$template/header.tpl"}
    <div class="invoice-wrapper">
        <div class="container-fluid">
            <div class="row">
                {if $invalidInvoiceIdRequested}
                    <div class="col-md-12">
                        <div class="invoice-alert-box">
                            {include file="$template/includes/panel.tpl" type="danger" headerTitle="{lang key='error'}" bodyContent="{lang key='invoiceserror'}" bodyTextCenter=true}
                        </div>
                    </div>
                {else}
                    <div class="col-md-9">
                        <div class="invoice-inner-left">
                            <div class="invoice-all-messages">
                                {if $paymentSuccessAwaitingNotification}
                                    {include file="$template/includes/panel.tpl" type="success" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicePaymentSuccessAwaitingNotify'}" bodyTextCenter=true}
                                {elseif $paymentSuccess}
                                    {include file="$template/includes/panel.tpl" type="success" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicepaymentsuccessconfirmation'}" bodyTextCenter=true}
                                {elseif $paymentInititated}
                                    {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicePaymentInitiated'}" bodyTextCenter=true}
                                {elseif $pendingReview}
                                    {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='success'}" bodyContent="{lang key='invoicepaymentpendingreview'}" bodyTextCenter=true}
                                {elseif $paymentFailed}
                                    {include file="$template/includes/panel.tpl" type="danger" headerTitle="{lang key='error'}" bodyContent="{lang key='invoicepaymentfailedconfirmation'}" bodyTextCenter=true}
                                {elseif $offlineReview}
                                    {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='success'}" bodyContent="{lang key='invoiceofflinepaid'}" bodyTextCenter=true}
                                {/if}
                            </div>
                            <div class="upper-invoice-head-section">
                                {if $status eq "Draft"}
                                    <span class="invoice-state draft">{lang key='invoicesdraft'}</span>
                                {elseif $status eq "Unpaid"}
                                    <span class="invoice-state unpaid">{lang key='invoicesunpaid'}</span>
                                {elseif $status eq "Paid"}
                                    <span class="invoice-state paid">{lang key='invoicespaid'}</span>
                                {elseif $status eq "Refunded"}
                                    <span class="invoice-state refunded">{lang key='invoicesrefunded'}</span>
                                {elseif $status eq "Cancelled"}
                                    <span class="invoice-state cancelled">{lang key='invoicescancelled'}</span>
                                {elseif $status eq "Collections"}
                                    <span class="invoice-state collections">{lang key='invoicescollections'}</span>
                                {elseif $status eq "Payment Pending"}
                                    <span class="invoice-state paid">{lang key='invoicesPaymentPending'}</span>
                                {/if}
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="invoice-status">
                                            <span class="invoice-number">{$pagetitle}</span>
                                        </div>                                         
                                    </div>
                                    <div class="col-md-5">
                                        <ul class="invoice-date-section">
                                            <li>
                                                <span class="label-left-sec-invoice">{lang key='invoicesdatecreated'}</span>
                                                <span class="label-right-sec-invoice">{$date|date_format:"%d-%m-%Y"}</span>
                                            </li>
                                            {if $status eq "Unpaid" || $status eq "Draft"}
                                                <li>
                                                    <span class="label-left-sec-invoice">{lang key='invoicesdatedue'}</span>
                                                    <span class="label-right-sec-invoice">{$datedue|date_format:"%d-%m-%Y"}</span>
                                                </li>
                                            {/if}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-pay-to-section">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="invoice-payto-section">
                                            <h3 class="head-pay-to">{lang key='invoicespayto'}:</h3>
                                            <address class="small-text">
                                                {$payto}
                                                {if $taxCode}<br />{$taxIdLabel}: {$taxCode}{/if}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="invoice-payto-section">
                                            <h3 class="head-pay-to">{lang key='invoicesinvoicedto'}:</h3>
                                            <address class="small-text">
                                                {if $clientsdetails.companyname}{$clientsdetails.companyname}<br />{/if}
                                                {$clientsdetails.firstname} {$clientsdetails.lastname}<br />
                                                {$clientsdetails.address1}, {$clientsdetails.address2}<br />
                                                {$clientsdetails.city}, {$clientsdetails.state}, {$clientsdetails.postcode}<br />
                                                {$clientsdetails.country}
                                                {if $clientsdetails.tax_id}
                                                    <br />{$taxIdLabel}: {$clientsdetails.tax_id}
                                                {/if}
                                                {if $customfields}
                                                <div class="custom-field-invoice">
                                                    {foreach $customfields as $customfield}
                                                    {$customfield.fieldname}: {$customfield.value}<br />
                                                    {/foreach}
                                                </div>
                                                {/if}
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-item-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="iteam-heading-tbl">{lang key='invoicelineitems'}</h3>
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <td><strong>{lang key='invoicesdescription'}</strong></td>
                                                    <td width="20%" class="text-center"><strong>{lang key='invoicesamount'}</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {foreach $invoiceitems as $item}
                                                    <tr>
                                                        <td>{$item.description}{if $item.taxed eq "true"} *{/if}</td>
                                                        <td class="text-center">{$item.amount}</td>
                                                    </tr>
                                                {/foreach}
                                                <tr class="sub-total-row">
                                                    <td class="total-row text-right"><strong>{lang key='invoicessubtotal'}</strong></td>
                                                    <td class="total-row text-center">{$subtotal}</td>
                                                </tr>
                                                {if $taxname}
                                                    <tr>
                                                        <td class="total-row text-right"><strong>{$taxrate}% {$taxname}</strong></td>
                                                        <td class="total-row text-center">{$tax}</td>
                                                    </tr>
                                                {/if}
                                                {if $taxname2}
                                                    <tr>
                                                        <td class="total-row text-right"><strong>{$taxrate2}% {$taxname2}</strong></td>
                                                        <td class="total-row text-center">{$tax2}</td>
                                                    </tr>
                                                {/if}
                                                <tr>
                                                    <td class="total-row text-right"><strong>{lang key='invoicescredit'}</strong></td>
                                                    <td class="total-row text-center">{$credit}</td>
                                                </tr>
                                                <tr class="total-row-inv">
                                                    <td class="total-row text-right"><strong>{lang key='invoicestotal'}</strong></td>
                                                    <td class="total-row text-center">{$total}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        {if $taxrate}
                                            <p>* {lang key='invoicestaxindicator'}</p>
                                        {/if}                                       
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-transaction-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="iteam-heading-tbl">{lang key='invoicestransactions'}</h3>
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <td class="text-center"><strong>{lang key='invoicestransdate'}</strong></td>
                                                        <td class="text-center"><strong>{lang key='invoicestransgateway'}</strong></td>
                                                        <td class="text-center"><strong>{lang key='invoicestransid'}</strong></td>
                                                        <td class="text-center"><strong>{lang key='invoicestransamount'}</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach $transactions as $transaction}
                                                        <tr>
                                                            <td class="text-center">{$transaction.date}</td>
                                                            <td class="text-center">{$transaction.gateway}</td>
                                                            <td class="text-center">{$transaction.transid}</td>
                                                            <td class="text-center">{$transaction.amount}</td>
                                                        </tr>
                                                    {foreachelse}
                                                        <tr>
                                                            <td class="text-center" colspan="4">{lang key='invoicestransnonefound'}</td>
                                                        </tr>
                                                    {/foreach}
                                                    <tr class="inv-balance-row">
                                                        <td class="text-right" colspan="3"><strong>{lang key='invoicesbalance'}</strong></td>
                                                        <td class="text-center">{$balance}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {if $notes}
                                <div class="invoice-note-section">
                                    {include file="$template/includes/panel.tpl" type="info" headerTitle="{lang key='invoicesnotes'}" bodyContent=$notes}
                                </div>
                            {/if}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="invoice-inner-right">
                            {if $status eq "Unpaid"}
                                <div class="invoice-right-first-section">                                
                                    <div class="total-amount-section">
                                        <span class="due-amount-heading">
                                            {lang key='invoicestotaldue'}	
                                        </span>
                                        <span class="due-amount-total">
                                            {$total}
                                        </span>
                                    </div>
                                    {if $status eq "Unpaid" && $allowchangegateway}
                                        <div class="payment-gateway-section">
                                            <h3>{lang key='paymentmethod'}</h3>
                                            <form method="post" action="{$smarty.server.PHP_SELF}?id={$invoiceid}" class="form-inline">
                                                {$tokenInput}
                                                <select name="gateway" class="form-control select-inline" onchange="submit()">
                                                    {foreach $availableGateways as $gatewayModule => $gatewayName}
                                                        <option value="{$gatewayModule}"{if $gatewayModule == $selectedGateway} selected="selected"{/if}>{$gatewayName}</option>
                                                    {/foreach}
                                                </select>
                                            </form>
                                        </div>
                                    {else}
                                        {$paymentmethod}{if $paymethoddisplayname} ({$paymethoddisplayname}){/if}
                                    {/if}
                                    <div class="payment-method-button">
                                        {$paymentbutton}
                                    </div>
                                </div>
                            {/if}
                            {if $manualapplycredit}
                                <div class="mannual-credit-section">
                                    <h2>{lang key='invoiceaddcreditapply'}</h2>
                                    <form method="post" action="{$smarty.server.PHP_SELF}?id={$invoiceid}">
                                        <input type="hidden" name="applycredit" value="true" />
                                        {lang key='invoiceaddcreditdesc1'} <strong>{$totalcredit}</strong>. {lang key='invoiceaddcreditdesc2'}. {lang key='invoiceaddcreditamount'}:
                                        <input type="text" name="creditamount" value="{$creditamount}" class="form-control" />
                                        <button type="submit" class="btn wgs_custom-btn" id="btnInvoiceAddCreditApply">
                                            {lang key='invoiceaddcreditapply'}
                                        </button>
                                    </form>
                                </div>
                            {/if}
                            <div class="invoice-actions">
                                <h3 class="actions-invoice">{lang key='actions'}</h3>
                                <a href="javascript:window.print()" class="btn w-hidden"><i class="fas fa-print"></i> {lang key='print'}</a>
                                <a href="dl.php?type=i&amp;id={$invoiceid}" class="btn down-btn"><i class="fas fa-arrow-alt-to-bottom"></i> {lang key='invoicesdownload'}</a>
                                <a href="clientarea.php?action=invoices" class="btn previous-page-link">{lang key='invoicesbacktoclientarea'}</a>                            
                            </div>
                        </div>                
                    </div>
                {/if}
            </div>
        </div>
    </div>    
{/if}