<?php
/* Smarty version 3.1.48, created on 2025-06-01 08:36:52
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/account-paymentmethods-manage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c1124b776b4_41256602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8afa7a525b09ef67c03819108507faa6b0d8f826' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/account-paymentmethods-manage.tpl',
      1 => 1726854006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683c1124b776b4_41256602 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>
<div class="payment-method-add-card">
<div class="card">
    <div class="card-body">

        <h3 class="card-title">
            <?php if ($_smarty_tpl->tpl_vars['editMode']->value) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.editPaymentMethod'),$_smarty_tpl ) );?>

            <?php } else { ?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.addPaymentMethod'),$_smarty_tpl ) );?>

            <?php }?>
        </h3>

        <form id="frmManagePaymentMethod" class="frm-credit-card-input" role="form" method="post" action="<?php if ($_smarty_tpl->tpl_vars['editMode']->value) {
echo routePath('account-paymentmethods-save',$_smarty_tpl->tpl_vars['payMethod']->value->id);
} else {
echo routePath('account-paymentmethods-add');
}?>">
            <div class="alert alert-warning text-center gateway-errors assisted-cc-input-feedback w-hidden">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.invalidCardDetails'),$_smarty_tpl ) );?>

            </div>

            <div class="form-group row">
                <label for="inputPaymentMethodType" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.type'),$_smarty_tpl ) );?>
</label>
                <div class="col-md-8">
                    <?php if ($_smarty_tpl->tpl_vars['enabledTypes']->value['tokenGateways']) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tokenGateways']->value, 'tokenGateway');
$_smarty_tpl->tpl_vars['tokenGateway']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tokenGateway']->value) {
$_smarty_tpl->tpl_vars['tokenGateway']->do_else = false;
?>
                            <label class="form-check form-check-inline">
                                <input type="radio" class="icheck-button" name="type" value="token_<?php echo $_smarty_tpl->tpl_vars['tokenGateway']->value;?>
" data-tokenised="true" data-gateway="<?php echo $_smarty_tpl->tpl_vars['tokenGateway']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['editMode']->value && $_smarty_tpl->tpl_vars['payMethod']->value->isCreditCard() && $_smarty_tpl->tpl_vars['payMethod']->value->gateway_name == $_smarty_tpl->tpl_vars['tokenGateway']->value) {?> checked<?php }
if ($_smarty_tpl->tpl_vars['editMode']->value) {?> disabled<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['gatewayDisplayNames']->value[$_smarty_tpl->tpl_vars['tokenGateway']->value];?>

                            </label>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['enabledTypes']->value['localCreditCard']) {?>
                        <label class="form-check form-check-inline">
                            <input type="radio" class="icheck-button" name="type" value="localcard"<?php if (($_smarty_tpl->tpl_vars['editMode']->value && $_smarty_tpl->tpl_vars['payMethod']->value->isCreditCard() && !$_smarty_tpl->tpl_vars['payMethod']->value->isTokenised()) || (!$_smarty_tpl->tpl_vars['editMode']->value && $_smarty_tpl->tpl_vars['paymentMethodType']->value != 'bankacct')) {?> checked<?php }
if ($_smarty_tpl->tpl_vars['editMode']->value) {?> disabled<?php }?>>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.creditCard'),$_smarty_tpl ) );?>

                        </label>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['enabledTypes']->value['bankAccount']) {?>
                        <label class="form-check form-check-inline">
                            <input type="radio" class="icheck-button" name="type" value="bankacct"<?php if (($_smarty_tpl->tpl_vars['editMode']->value && !$_smarty_tpl->tpl_vars['payMethod']->value->isCreditCard()) || ($_smarty_tpl->tpl_vars['paymentMethodType']->value == 'bankacct')) {?> checked<?php }
if ($_smarty_tpl->tpl_vars['editMode']->value) {?> disabled<?php }?>>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.bankAccount'),$_smarty_tpl ) );?>

                        </label>
                    <?php }?>
                </div>
            </div>
            <div class="fieldgroup-auxfields<?php if ($_smarty_tpl->tpl_vars['remoteUpdate']->value) {?> w-hidden<?php }?>">
                <div class="form-group row">
                    <label for="inputDescription" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.description'),$_smarty_tpl ) );?>
</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputDescription" name="description" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['payMethod']->value->description;?>
">
                            <div class="input-group-append">
                                <span class="input-group-text text-muted">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.optional'),$_smarty_tpl ) );?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fieldgroup-loading w-hidden">
                <div class="p-4 text-center">
                    <i class="fas fa-spinner fa-spin"></i>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pleasewait'),$_smarty_tpl ) );?>

                </div>
            </div>
            <div id="paymentGatewayInput"></div>
            <div class="fieldgroup-creditcard<?php if ($_smarty_tpl->tpl_vars['editMode']->value && !$_smarty_tpl->tpl_vars['payMethod']->value->isCreditCard() || $_smarty_tpl->tpl_vars['paymentMethodType']->value == 'bankacct' || $_smarty_tpl->tpl_vars['remoteUpdate']->value) {?> w-hidden<?php }?>">
                <div class="cc-details">
                    <div class="form-group row">
                        <label for="inputCardNumber" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'creditcardcardnumber'),$_smarty_tpl ) );?>
</label>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="tel" class="form-control cc-number-field <?php echo strtolower($_smarty_tpl->tpl_vars['creditCard']->value->getCardType());?>
" id="inputCardNumber" name="ccnumber" autocomplete="cc-number" value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getMaskedCardNumber();?>
"<?php if (!$_smarty_tpl->tpl_vars['creditCardNumberFieldEnabled']->value) {?> disabled<?php }?> aria-describedby="cc-type" data-message-unsupported="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.unsupportedCardType'),$_smarty_tpl ) );?>
" data-message-invalid="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.cardNumberNotValid'),$_smarty_tpl ) );?>
" data-supported-cards="<?php echo $_smarty_tpl->tpl_vars['supportedCardTypes']->value;?>
">
                                </div>
                            </div>
                            <span class="field-error-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.cardNumberNotValid'),$_smarty_tpl ) );?>
</span>
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['startDateEnabled']->value) {?>
                        <div class="form-group row">
                            <label for="inputCardStart" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'creditcardcardstart'),$_smarty_tpl ) );?>
</label>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="tel" class="form-control" id="inputCardStart" name="ccstart" autocomplete="off" value="<?php if ($_smarty_tpl->tpl_vars['creditCard']->value->getStartDate()) {
echo $_smarty_tpl->tpl_vars['creditCard']->value->getStartDate()->format('m / y');
}?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    <div class="form-group row">
                        <label for="inputCardExpiry" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'creditcardcardexpires'),$_smarty_tpl ) );?>
</label>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="tel" class="form-control" id="inputCardExpiry" name="ccexpiry" autocomplete="cc-exp" value="<?php if ($_smarty_tpl->tpl_vars['creditCard']->value->getExpiryDate()) {
echo $_smarty_tpl->tpl_vars['creditCard']->value->getExpiryDate()->format('m / y');
}?>"<?php if (!$_smarty_tpl->tpl_vars['creditCardExpiryFieldEnabled']->value) {?> disabled<?php }?>>
                                </div>
                            </div>
                            <span class="field-error-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.expiryDateNotValid'),$_smarty_tpl ) );?>
</span>
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['issueNumberEnabled']->value) {?>
                        <div class="form-group row">
                            <label for="inputCardIssue" class="col-md-4 col-12 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'creditcardcardissuenum'),$_smarty_tpl ) );?>
</label>
                            <div class="col-sm-2 col-4">
                                <input type="tel" class="form-control" id="inputCardIssue" name="ccissuenum" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getIssueNumber();?>
">
                            </div>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['creditCardCvcFieldEnabled']->value) {?>
                        <div class="form-group row">
                            <label for="inputCardCvc" class="col-md-4 col-12 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'creditcardcvvnumber'),$_smarty_tpl ) );?>
</label>
                            <div class="col-md-8">
                                <input type="tel" class="form-control input-inline input-inline-100" id="inputCardCvc" name="cardcvv" autocomplete="off">
                                <button id="cvvWhereLink" type="button" class="btn btn-link" data-toggle="popover" data-content="<img src='<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_IMG']->value;?>
/ccv.gif' width='210'>">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'creditcardcvvwhere'),$_smarty_tpl ) );?>

                                </button>
                                <div class="clearfix"></div>
                                <span class="field-error-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.cvcNumberNotValid'),$_smarty_tpl ) );?>
</span>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="fieldgroup-bankaccount<?php if ($_smarty_tpl->tpl_vars['remoteUpdate']->value || ($_smarty_tpl->tpl_vars['editMode']->value && $_smarty_tpl->tpl_vars['payMethod']->value->isCreditCard()) || ($_smarty_tpl->tpl_vars['paymentMethodType']->value != 'bankacct' && !$_smarty_tpl->tpl_vars['editMode']->value)) {?> w-hidden<?php }?>">
                <div class="form-group row">
                    <label for="inputBankAcctType" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.accountType'),$_smarty_tpl ) );?>
</label>
                    <div class="col-md-8">
                        <label class="form-check form-check-inline">
                            <input type="radio" class="icheck-button" name="bankaccttype" id="inputBankAcctType" value="Checking"<?php if (!$_smarty_tpl->tpl_vars['bankAccount']->value->getAccountType() || $_smarty_tpl->tpl_vars['bankAccount']->value->getAccountType() == 'Checking') {?> checked<?php }?>>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.checking'),$_smarty_tpl ) );?>

                        </label>
                        <label class="form-check form-check-inline">
                            <input type="radio" class="icheck-button" name="bankaccttype" value="Savings"<?php if ($_smarty_tpl->tpl_vars['bankAccount']->value->getAccountType() == 'Savings') {?> checked<?php }?>>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.savings'),$_smarty_tpl ) );?>

                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputBankAcctHolderName" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.accountHolderName'),$_smarty_tpl ) );?>
</label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control" id="inputBankAcctHolderName" name="bankacctholdername" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['bankAccount']->value->getAccountHolderName();?>
">
                        <span class="field-error-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.fieldRequired'),$_smarty_tpl ) );?>
</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputBankName" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.bankName'),$_smarty_tpl ) );?>
</label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control" id="inputBankName" name="bankname" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['bankAccount']->value->getBankName();?>
">
                        <span class="field-error-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.fieldRequired'),$_smarty_tpl ) );?>
</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputBankRoutingNum" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.sortCodeRoutingNumber'),$_smarty_tpl ) );?>
</label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control" id="inputBankRoutingNum" name="bankroutingnum" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['bankAccount']->value->getRoutingNumber();?>
">
                        <span class="field-error-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.routingNumberNotValid'),$_smarty_tpl ) );?>
</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputBankAcctNum" class="col-md-4 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.accountNumber'),$_smarty_tpl ) );?>
</label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control" id="inputBankAcctNum" name="bankacctnum" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['bankAccount']->value->getAccountNumber();?>
">
                        <span class="field-error-msg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.accountNumberNotValid'),$_smarty_tpl ) );?>
</span>
                    </div>
                </div>
            </div>
            <div class="fieldgroup-auxfields<?php if ($_smarty_tpl->tpl_vars['remoteUpdate']->value) {?> w-hidden<?php }?>">
                <div class="form-group row">
                    <label for="inputBillingAddress" class="col-md-4 col-12 control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'billingAddress'),$_smarty_tpl ) );?>
</label>
                    <div class="col-md-8">
                        <div id="billingContactsContainer">
                            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/account-paymentmethods-billing-contacts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        </div>
                        <br>
                        <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalBillingAddress"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.addNewAddress'),$_smarty_tpl ) );?>
</a>
                    </div>
                </div>
                <div class="form-group row submit-container">
                    <div class="col-md-8 offset-sm-4">
                        <button type="submit" name="submit" id="btnSubmit" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareasavechanges'),$_smarty_tpl ) );?>
</button>
                        <a href="<?php echo routePath('account-paymentmethods');?>
" class="btn btn-default"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancel'),$_smarty_tpl ) );?>
</a>
                    </div>
                </div>
            </div>
            <input type="hidden" name="billing_name" id="inputBillingName" value="">
            <input type="hidden" name="billing_address_1" id="inputBillingAddress1" value="">
            <input type="hidden" name="billing_address_2" id="inputBillingAddress2" value="">
            <input type="hidden" name="billing_city" id="inputBillingCity" value="">
            <input type="hidden" name="billing_state" id="inputBillingState" value="">
            <input type="hidden" name="billing_postcode" id="inputBillingPostcode" value="">
            <input type="hidden" name="billing_country" id="inputBillingCountry" value="">
        </form>

        <div class="fieldgroup-remoteinput<?php if (($_smarty_tpl->tpl_vars['editMode']->value && !$_smarty_tpl->tpl_vars['remoteUpdate']->value) || !$_smarty_tpl->tpl_vars['editMode']->value) {?> w-hidden<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['remoteUpdate']->value) {?>
                <div id="tokenGatewayRemoteUpdateOutput" class="text-center"><?php echo $_smarty_tpl->tpl_vars['remoteUpdate']->value;?>
</div>
            <?php } else { ?>
                <div id="tokenGatewayRemoteInputOutput" class="text-center" align="center"></div>
                <div class="text-center">
                    <iframe name="ccframe" class="auth3d-area" width="90%" height="600" scrolling="auto" src="about:blank"></iframe>
                </div>
            <?php }?>
        </div>

    </div>
</div>

<div class="modal fade" id="modalBillingAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="billingContactForm" action="<?php echo routePath('account-paymentmethods-billing-contacts-create');?>
" data-role="json-form">
                <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
" />
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethodsManage.addNewBillingAddress'),$_smarty_tpl ) );?>
</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputFirstName" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareafirstname'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="firstname" id="inputFirstName" value="<?php echo $_smarty_tpl->tpl_vars['contactfirstname']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputLastName" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientarealastname'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="lastname" id="inputLastName" value="<?php echo $_smarty_tpl->tpl_vars['contactlastname']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputCompanyName"
                                       class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacompanyname'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="companyname" id="inputCompanyName"
                                       value="<?php echo $_smarty_tpl->tpl_vars['contactcompanyname']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputPhone" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareaphonenumber'),$_smarty_tpl ) );?>
</label>
                                <input type="tel" name="phonenumber" id="inputPhone" value="<?php echo $_smarty_tpl->tpl_vars['contactphonenumber']->value;?>
"
                                       class="form-control">
                            </div>

                            <?php if ($_smarty_tpl->tpl_vars['showTaxIdField']->value) {?>
                                <div class="form-group">
                                    <label for="inputTaxId" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>$_smarty_tpl->tpl_vars['taxIdLabel']->value),$_smarty_tpl ) );?>
</label>
                                    <input type="text" name="tax_id" id="inputTaxId" class="form-control"
                                           value="<?php echo $_smarty_tpl->tpl_vars['contactTaxId']->value;?>
">
                                </div>
                            <?php }?>

                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="inputAddress1" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareaaddress1'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="address1" id="inputAddress1" value="<?php echo $_smarty_tpl->tpl_vars['contactaddress1']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareaaddress2'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="address2" id="inputAddress2" value="<?php echo $_smarty_tpl->tpl_vars['contactaddress2']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputCity" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacity'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="city" id="inputCity" value="<?php echo $_smarty_tpl->tpl_vars['contactcity']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputState" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareastate'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="state" id="inputState" value="<?php echo $_smarty_tpl->tpl_vars['contactstate']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputPostcode" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareapostcode'),$_smarty_tpl ) );?>
</label>
                                <input type="text" name="postcode" id="inputPostcode" value="<?php echo $_smarty_tpl->tpl_vars['contactpostcode']->value;?>
"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="inputCountry"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacountry'),$_smarty_tpl ) );?>
</label>
                                <select class="form-control custom-select" name="country" id="inputCountry">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'countryName', false, 'countryCode');
$_smarty_tpl->tpl_vars['countryName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['countryCode']->value => $_smarty_tpl->tpl_vars['countryName']->value) {
$_smarty_tpl->tpl_vars['countryName']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['countryCode']->value;?>
"<?php if (($_smarty_tpl->tpl_vars['countryCode']->value == $_smarty_tpl->tpl_vars['clientCountry']->value)) {?> selected="selected"<?php }?>>
                                            <?php echo $_smarty_tpl->tpl_vars['countryName']->value;?>

                                        </option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.close'),$_smarty_tpl ) );?>
</button>
                    <button type="submit" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.saveChanges'),$_smarty_tpl ) );?>
</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="paymentmethod" id="inputPaymentMethod" value="">
<div id="tokenGatewayAssistedOutput"></div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/jquery.payment.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var paymentInitSingleton = new Map;
    jQuery(document).ready(function() {
        var ccNumberFieldEnabled = '<?php echo $_smarty_tpl->tpl_vars['creditCardNumberFieldEnabled']->value;?>
',
            ccExpiryFieldEnabled = '<?php echo $_smarty_tpl->tpl_vars['creditCardExpiryFieldEnabled']->value;?>
',
            ccCvcFieldEnabled = '<?php echo $_smarty_tpl->tpl_vars['creditCardCvcFieldEnabled']->value;?>
',
            ccForm = jQuery('.frm-credit-card-input');

        ccForm.find('#inputCardNumber').payment('formatCardNumber');
        ccForm.find('#inputCardStart').payment('formatCardExpiry');
        ccForm.find('#inputCardExpiry').payment('formatCardExpiry');
        ccForm.find('#inputCardCvc').payment('formatCardCVC');
        ccForm.find('#inputCardIssue').payment('restrictNumeric');
        ccForm.find('#inputBankRoutingNum').payment('restrictNumeric');
        ccForm.find('#inputBankAcctNum').payment('restrictNumeric');

        var reloadBillingContacts = function (selectContactId) {
            WHMCS.http.jqClient.get({
                url: "<?php echo routePath('account-paymentmethods-billing-contacts',$_smarty_tpl->tpl_vars['payMethod']->value->id);?>
",
                data: {
                    'contact_id': selectContactId ? selectContactId : 0
                },
                success: function(response) {
                    jQuery('#billingContactsContainer').html(response);
                }
            });
        };
        var whmcsPaymentModuleMetadata = {
            _source: 'payment-method-add',
        };

        jQuery(document).on('click', '.frm-credit-card-input button[type="submit"]', function(e) {
            ccForm.find('.form-group').removeClass('has-error');
            ccForm.find('.field-error-msg').hide();

            var checkedInput = jQuery('input[name="type"]:checked', ccForm);

            if (checkedInput.val() === 'bankacct') {
                if (!jQuery('#inputBankAcctHolderName').val()) {
                    jQuery('#inputBankAcctHolderName').showInputError();
                    e.preventDefault();
                }
                if (!jQuery('#inputBankName').val()) {
                    jQuery('#inputBankName').showInputError();
                    e.preventDefault();
                }
                if (!jQuery('#inputBankRoutingNum').val()) {
                    jQuery('#inputBankRoutingNum').showInputError();
                    e.preventDefault();
                }
                if (!jQuery('#inputBankAcctNum').val()) {
                    jQuery('#inputBankAcctNum').showInputError();
                    e.preventDefault();
                }
            } else if (checkedInput.val() === 'localcard') {
                var cardType = $.payment.cardType(ccForm.find('#inputCardNumber').val()),
                    cardNumber = ccForm.find('#inputCardNumber');
                if (
                    ccNumberFieldEnabled
                    && (!$.payment.validateCardNumber(cardNumber.val()) || cardNumber.hasClass('unsupported'))
                ) {
                    var error = cardNumber.data('message-invalid');
                    if (cardNumber.hasClass('unsupported')) {
                        error = cardNumber.data('message-unsupported');
                    }
                    ccForm.find('#inputCardNumber').setInputError(error).showInputError();
                    e.preventDefault();
                }
                if (
                    ccExpiryFieldEnabled
                    && !$.payment.validateCardExpiry(ccForm.find('#inputCardExpiry').payment('cardExpiryVal'))
                ) {
                    ccForm.find('#inputCardExpiry').showInputError();
                    e.preventDefault();
                }
                if (
                    ccCvcFieldEnabled
                    && !$.payment.validateCardCVC(ccForm.find('#inputCardCvc').val(), cardType)
                ) {
                    ccForm.find('#inputCardCvc').showInputError();
                    e.preventDefault();
                }
            }
            WHMCS.payment.event.addPayMethodFormSubmit(
                {...whmcsPaymentModuleMetadata, ...{event: e}},
                WHMCS.payment.event.previouslySelected?.module,
                jQuery(this)
            );
        });

        jQuery('input[name="type"]').on('ifChecked', function(e) {
            var element = jQuery(this);
            var module = element.data('gateway');
            WHMCS.payment.event.gatewayUnselected(whmcsPaymentModuleMetadata);
            WHMCS.payment.display.errorClear();
            jQuery('.fieldgroup-creditcard').hide();
            jQuery('.fieldgroup-bankaccount').hide();
            jQuery('.fieldgroup-remoteinput').hide();
            jQuery('.fieldgroup-auxfields').hide();
            jQuery('.fieldgroup-loading').show();
            jQuery('#tokenGatewayAssistedOutput').html('');
            if (element.data('tokenised') === true) {
                jQuery('#inputPaymentMethod').val(module);
                WHMCS.http.jqClient.jsonPost({
                    url: "<?php echo routePath('account-paymentmethods-inittoken');?>
",
                    data: 'gateway=' + module,
                    success: function(response) {
                        jQuery('.fieldgroup-loading').hide();
                        if (response.remoteInputForm) {
                            jQuery('#tokenGatewayRemoteInputOutput').html(response.remoteInputForm);
                            jQuery('#tokenGatewayRemoteInputOutput').find('form:first').attr('target', 'ccframe');
                            setTimeout("autoSubmitFormByContainer('tokenGatewayRemoteInputOutput')", 1000);
                            jQuery('.fieldgroup-remoteinput').show();
                        } else if (response.assistedOutput) {
                            jQuery('.fieldgroup-creditcard').show('fast', function () {
                                jQuery('#tokenGatewayAssistedOutput').html(response.assistedOutput);
                                if (!paymentInitSingleton.has(module)) {
                                    WHMCS.payment.event.gatewayInit(whmcsPaymentModuleMetadata, module, element);
                                    WHMCS.payment.event.gatewayOptionInit(whmcsPaymentModuleMetadata, module, element);
                                    paymentInitSingleton.set(module, true);
                                }
                                WHMCS.payment.event.gatewaySelected(whmcsPaymentModuleMetadata, module, element);
                            });
                            jQuery('.fieldgroup-auxfields').show();
                        } else if (response.gatewayType === 'Bank') {
                            jQuery('.fieldgroup-loading').hide();
                            jQuery('.fieldgroup-bankaccount').show();
                            jQuery('.fieldgroup-auxfields').show();
                        } else {
                            jQuery('.fieldgroup-creditcard').show();
                            jQuery('.fieldgroup-auxfields').show();
                        }
                    },
                });
            } else if (element.val() === 'bankacct') {
                jQuery('.fieldgroup-loading').hide();
                jQuery('.fieldgroup-bankaccount').show();
                jQuery('.fieldgroup-auxfields').show();
            } else {
                jQuery('.fieldgroup-loading').hide();
                jQuery('.fieldgroup-creditcard').show();
                jQuery('.fieldgroup-auxfields').show();
            }
        });
        jQuery('input[name="billingcontact"]').on('ifChecked', function(e) {
            var contact = jQuery('.billing-contact-' + jQuery(this).val());
            jQuery('#inputBillingName').val(contact.find('.name').html());
            jQuery('#inputBillingAddress1').val(contact.find('.address1').html());
            jQuery('#inputBillingAddress2').val(contact.find('.address2').html());
            jQuery('#inputBillingCity').val(contact.find('.city').html());
            jQuery('#inputBillingState').val(contact.find('.state').html());
            jQuery('#inputBillingPostcode').val(contact.find('.postcode').html());
            jQuery('#inputBillingCountry').val(contact.find('.country').html());
        });

        if (jQuery('input[name="type"]:checked', ccForm).length === 0) {
            jQuery('input[name="type"]', ccForm).first().parents('label').trigger('click');
        }

        jQuery('#billingContactForm')
            .data('on-success', function(data) {
                jQuery('#modalBillingAddress').modal('hide');
                reloadBillingContacts(data.id);
            });
    });
<?php echo '</script'; ?>
><?php }
}
