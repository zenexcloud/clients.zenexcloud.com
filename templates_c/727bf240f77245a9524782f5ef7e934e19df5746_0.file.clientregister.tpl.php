<?php
/* Smarty version 3.1.48, created on 2025-05-31 08:28:53
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/clientregister.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683abdc5090ca4_86673918',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '727bf240f77245a9524782f5ef7e934e19df5746' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/clientregister.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683abdc5090ca4_86673918 (Smarty_Internal_Template $_smarty_tpl) {
if (in_array('state',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>
    <?php echo '<script'; ?>
>
        var statesTab = 10,
            stateNotRequired = true;
    <?php echo '</script'; ?>
>
<?php }?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/PasswordStrength.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    window.langPasswordStrength = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwstrength'),$_smarty_tpl ) );?>
";
    window.langPasswordWeak = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwstrengthweak'),$_smarty_tpl ) );?>
";
    window.langPasswordModerate = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwstrengthmoderate'),$_smarty_tpl ) );?>
";
    window.langPasswordStrong = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwstrengthstrong'),$_smarty_tpl ) );?>
";
    jQuery(document).ready(function() {
        jQuery("#inputNewPassword1").keyup(registerFormPasswordStrengthFeedback);
    });
<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['registrationDisabled']->value) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'registerCreateAccount'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'registerCreateAccountOrder'),$_smarty_tpl ) );
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>((((($_prefixVariable1).(' <strong><a href="')).(((string)$_smarty_tpl->tpl_vars['WEB_ROOT']->value))).('/cart.php" class="alert-link">')).($_prefixVariable2)).('</a></strong>')), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value), 0, true);
}?>

<?php if (!$_smarty_tpl->tpl_vars['registrationDisabled']->value) {?>
<section class="register-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="left-side-register-ac">
                    <div class="titlebar">
                        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['registerAccount'];?>
</h2>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['createCloudGMaccount'];?>
</p>
                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/linkedaccounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('linkContext'=>"registration"), 0, true);
?>
                    </div>
                    <div class="titlebar login-sec-rg-page">
                        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['alreadyregistered'];?>
</h2>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahomelogin'];?>
</p>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/login.php" class="reg-login-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginbutton'];?>
</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="register-form">
                    <form method="post" class="using-password-strength" action="<?php echo $_SERVER['PHP_SELF'];?>
" role="form" name="orderfrm" id="frmCheckout">
                        <input type="hidden" name="register" value="true"/>
                        <div class="form-title">
                            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.personalInformation'),$_smarty_tpl ) );?>
</h2>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="firstname" id="inputFirstName" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.firstName'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientfirstname']->value;?>
" <?php if (!in_array('firstname',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="lastname" id="inputLastName" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.lastName'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientlastname']->value;?>
" <?php if (!in_array('lastname',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?>>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.emailAddress'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientemail']->value;?>
">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="tel" name="phonenumber" id="inputPhone" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.phoneNumber'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientphonenumber']->value;?>
">
                                </div>
                            </div>
                        </div>

                        <div class="form-title">
                            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.billingAddress'),$_smarty_tpl ) );?>
</h2>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="companyname" id="inputCompanyName" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.companyName'),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.optional'),$_smarty_tpl ) );?>
)" value="<?php echo $_smarty_tpl->tpl_vars['clientcompanyname']->value;?>
">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="address1" id="inputAddress1" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.streetAddress'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientaddress1']->value;?>
"  <?php if (!in_array('address1',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?>>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="address2" id="inputAddress2" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.streetAddress2'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientaddress2']->value;?>
">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="city" id="inputCity" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.city'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientcity']->value;?>
"  <?php if (!in_array('city',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?>>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="state" id="state" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.state'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientstate']->value;?>
"  <?php if (!in_array('state',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?>>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="postcode" id="inputPostcode" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.postcode'),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientpostcode']->value;?>
" <?php if (!in_array('postcode',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?>>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <select name="country" id="inputCountry" class="form-control">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientcountries']->value, 'countryName', false, 'countryCode');
$_smarty_tpl->tpl_vars['countryName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['countryCode']->value => $_smarty_tpl->tpl_vars['countryName']->value) {
$_smarty_tpl->tpl_vars['countryName']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['countryCode']->value;?>
"<?php if ((!$_smarty_tpl->tpl_vars['clientcountry']->value && $_smarty_tpl->tpl_vars['countryCode']->value == $_smarty_tpl->tpl_vars['defaultCountry']->value) || ($_smarty_tpl->tpl_vars['countryCode']->value == $_smarty_tpl->tpl_vars['clientcountry']->value)) {?> selected="selected"<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['countryName']->value;?>

                                            </option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['showTaxIdField']->value) {?>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="tax_id" id="inputTaxId" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['taxLabel']->value;?>
 (<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.optional'),$_smarty_tpl ) );?>
)" value="<?php echo $_smarty_tpl->tpl_vars['clientTaxId']->value;?>
">
                                </div>
                            </div>
                            <?php }?>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['customfields']->value || $_smarty_tpl->tpl_vars['currencies']->value) {?>
                            <div class="form-title">
                                <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderadditionalrequiredinfo'),$_smarty_tpl ) );?>
 <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.requiredField'),$_smarty_tpl ) );?>
</span></h2>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield');
$_smarty_tpl->tpl_vars['customfield']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->do_else = false;
?>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['customfield']->value['required'];?>
</label>
                                            <div class="form-control">
                                                <?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>

                                            <?php if ($_smarty_tpl->tpl_vars['customfield']->value['description']) {?>
                                                <span class="field-help-text"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>
</span>
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['currencies']->value) {?>
                                <div class="row form-row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select id="inputCurrency" name="currency" class="form-control">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'curr');
$_smarty_tpl->tpl_vars['curr']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['curr']->value) {
$_smarty_tpl->tpl_vars['curr']->do_else = false;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['curr']->value['id'];?>
"<?php if (!$_POST['currency'] && $_smarty_tpl->tpl_vars['curr']->value['default'] || $_POST['currency'] == $_smarty_tpl->tpl_vars['curr']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['curr']->value['code'];?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <div id="containerNewUserSecurity" <?php if ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value && !$_smarty_tpl->tpl_vars['securityquestions']->value) {?> class="w-hidden"<?php }?>>
                            <div class="form-title">
                                <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.accountSecurity'),$_smarty_tpl ) );?>
</h2>
                            </div>
                            <div id="containerPassword" class="<?php if ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value && $_smarty_tpl->tpl_vars['securityquestions']->value) {?> hidden<?php }?>">
                                <div id="passwdFeedback" class="alert alert-info text-center col-sm-12 w-hidden"></div>
                                <div class="row form-row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="password" name="password" id="inputNewPassword1" data-error-threshold="<?php echo $_smarty_tpl->tpl_vars['pwStrengthErrorThreshold']->value;?>
" data-warning-threshold="<?php echo $_smarty_tpl->tpl_vars['pwStrengthWarningThreshold']->value;?>
" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareapassword'),$_smarty_tpl ) );?>
" autocomplete="off"<?php if ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"<?php }?>>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="password" name="password2" id="inputNewPassword2" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareaconfirmpassword'),$_smarty_tpl ) );?>
" autocomplete="off"<?php if ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"<?php }?>>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="generate-box">
                                            <button type="button" class="btn btn-default btn-sm btn-sm-block generate-password" data-targetfields="inputNewPassword1,inputNewPassword2">
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'generatePassword.btnLabel'),$_smarty_tpl ) );?>

                                            </button>
                                            <div class="password-strength-meter">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success bg-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="passwordStrengthMeterBar">
                                                    </div>
                                                </div>
                                                <p class="text-center small text-muted" id="passwordStrengthTextLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwstrength'),$_smarty_tpl ) );?>
: <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwstrengthenter'),$_smarty_tpl ) );?>
</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>             
                        <?php if ($_smarty_tpl->tpl_vars['securityquestions']->value) {?>
                            <div class="row security-questions">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="securityqid" id="inputSecurityQId" class="form-control">
                                            <option value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareasecurityquestion'),$_smarty_tpl ) );?>
</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['securityquestions']->value, 'question');
$_smarty_tpl->tpl_vars['question']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->do_else = false;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['question']->value['id'] == $_smarty_tpl->tpl_vars['securityqid']->value) {?> selected<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['question']->value['question'];?>

                                                </option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="securityqans" id="inputSecurityQAns" class=" form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareasecurityanswer'),$_smarty_tpl ) );?>
" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['showMarketingEmailOptIn']->value) {?>
                            <div class="form-title">
                                <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'emailMarketing.joinOurMailingList'),$_smarty_tpl ) );?>
</h2>
                            </div>
                            <div class="form-switch">
                                <input type="checkbox" id="switch" name="marketingoptin" value="1"<?php if ($_smarty_tpl->tpl_vars['marketingEmailOptIn']->value) {?> checked<?php }?> class="no-icheck toggle-switch-success" data-size="small" data-on-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'yes'),$_smarty_tpl ) );?>
" data-off-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'no'),$_smarty_tpl ) );?>
">
                                <span><?php echo $_smarty_tpl->tpl_vars['marketingEmailOptInMessage']->value;?>
</span>
                            </div>
                        <?php }?>
                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        <?php if ($_smarty_tpl->tpl_vars['accepttos']->value) {?>
                            <p class="text-center">
                                <label class="form-check">
                                    <input type="checkbox" name="accepttos" class="form-check-input accepttos">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'ordertosagreement'),$_smarty_tpl ) );?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['tosurl']->value;?>
" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'ordertos'),$_smarty_tpl ) );?>
</a>
                                </label>
                            </p>
                        <?php }?>
                    </div>
                    <input class="btn-main<?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);?>
" type="submit" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientregistertitle'),$_smarty_tpl ) );?>
"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
}
}
