{if in_array('state', $optionalFields)}
    <script>
        var statesTab = 10,
            stateNotRequired = true;
    </script>
{/if}

<script src="{$BASE_PATH_JS}/StatesDropdown.js"></script>
<script src="{$BASE_PATH_JS}/PasswordStrength.js"></script>
<script>
    window.langPasswordStrength = "{lang key='pwstrength'}";
    window.langPasswordWeak = "{lang key='pwstrengthweak'}";
    window.langPasswordModerate = "{lang key='pwstrengthmoderate'}";
    window.langPasswordStrong = "{lang key='pwstrengthstrong'}";
    jQuery(document).ready(function() {
        jQuery("#inputNewPassword1").keyup(registerFormPasswordStrengthFeedback);
    });
</script>
{if $registrationDisabled}
    {include file="$template/includes/alert.tpl" type="error" msg="{lang key='registerCreateAccount'}"|cat:' <strong><a href="'|cat:"$WEB_ROOT"|cat:'/cart.php" class="alert-link">'|cat:"{lang key='registerCreateAccountOrder'}"|cat:'</a></strong>'}
{/if}

{if $errormessage}
    {include file="$template/includes/alert.tpl" type="error" errorshtml=$errormessage}
{/if}

{if !$registrationDisabled}
<section class="register-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="left-side-register-ac">
                    <div class="titlebar">
                        <h2>{$LANG.registerAccount}</h2>
                        <p>{$LANG.createCloudGMaccount}</p>
                        {include file="$template/includes/linkedaccounts.tpl" linkContext="registration"}
                    </div>
                    <div class="titlebar login-sec-rg-page">
                        <h2>{$LANG.alreadyregistered}</h2>
                        <p>{$LANG.clientareahomelogin}</p>
                        <a href="{$WEB_ROOT}/login.php" class="reg-login-btn">{$LANG.loginbutton}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="register-form">
                    <form method="post" class="using-password-strength" action="{$smarty.server.PHP_SELF}" role="form" name="orderfrm" id="frmCheckout">
                        <input type="hidden" name="register" value="true"/>
                        <div class="form-title">
                            <h2>{lang key='orderForm.personalInformation'}</h2>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="firstname" id="inputFirstName" class="form-control" placeholder="{lang key='orderForm.firstName'}" value="{$clientfirstname}" {if !in_array('firstname', $optionalFields)}required{/if} autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="lastname" id="inputLastName" class="form-control" placeholder="{lang key='orderForm.lastName'}" value="{$clientlastname}" {if !in_array('lastname', $optionalFields)}required{/if}>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="{lang key='orderForm.emailAddress'}" value="{$clientemail}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="tel" name="phonenumber" id="inputPhone" class="form-control" placeholder="{lang key='orderForm.phoneNumber'}" value="{$clientphonenumber}">
                                </div>
                            </div>
                        </div>

                        <div class="form-title">
                            <h2>{lang key='orderForm.billingAddress'}</h2>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="companyname" id="inputCompanyName" class="form-control" placeholder="{lang key='orderForm.companyName'} ({lang key='orderForm.optional'})" value="{$clientcompanyname}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="address1" id="inputAddress1" class="form-control" placeholder="{lang key='orderForm.streetAddress'}" value="{$clientaddress1}"  {if !in_array('address1', $optionalFields)}required{/if}>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="address2" id="inputAddress2" class="form-control" placeholder="{lang key='orderForm.streetAddress2'}" value="{$clientaddress2}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="city" id="inputCity" class="form-control" placeholder="{lang key='orderForm.city'}" value="{$clientcity}"  {if !in_array('city', $optionalFields)}required{/if}>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="state" id="state" class="form-control" placeholder="{lang key='orderForm.state'}" value="{$clientstate}"  {if !in_array('state', $optionalFields)}required{/if}>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="postcode" id="inputPostcode" class="form-control" placeholder="{lang key='orderForm.postcode'}" value="{$clientpostcode}" {if !in_array('postcode', $optionalFields)}required{/if}>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <select name="country" id="inputCountry" class="form-control">
                                        {foreach $clientcountries as $countryCode => $countryName}
                                            <option value="{$countryCode}"{if (!$clientcountry && $countryCode eq $defaultCountry) || ($countryCode eq $clientcountry)} selected="selected"{/if}>
                                                {$countryName}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            {if $showTaxIdField}
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="tax_id" id="inputTaxId" class="form-control" placeholder="{$taxLabel} ({lang key='orderForm.optional'})" value="{$clientTaxId}">
                                </div>
                            </div>
                            {/if}
                        </div>

                        {if $customfields || $currencies}
                            <div class="form-title">
                                <h2>{lang key='orderadditionalrequiredinfo'} <span>{lang key='orderForm.requiredField'}</span></h2>
                            </div>
                            {if $customfields}
                                {foreach $customfields as $customfield}
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="customfield{$customfield.id}">{$customfield.name} {$customfield.required}</label>
                                            <div class="form-control">
                                                {$customfield.input}
                                            {if $customfield.description}
                                                <span class="field-help-text">{$customfield.description}</span>
                                            {/if}
                                            </div>
                                        </div>
                                    </div>
                                {/foreach}
                            {/if}
                            {if $currencies}
                                <div class="row form-row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select id="inputCurrency" name="currency" class="form-control">
                                                {foreach $currencies as $curr}
                                                    <option value="{$curr.id}"{if !$smarty.post.currency && $curr.default || $smarty.post.currency eq $curr.id } selected{/if}>{$curr.code}</option>
                                                {/foreach}                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        {/if}
                        <div id="containerNewUserSecurity" {if $remote_auth_prelinked && !$securityquestions } class="w-hidden"{/if}>
                            <div class="form-title">
                                <h2>{lang key='orderForm.accountSecurity'}</h2>
                            </div>
                            <div id="containerPassword" class="{if $remote_auth_prelinked && $securityquestions} hidden{/if}">
                                <div id="passwdFeedback" class="alert alert-info text-center col-sm-12 w-hidden"></div>
                                <div class="row form-row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="password" name="password" id="inputNewPassword1" data-error-threshold="{$pwStrengthErrorThreshold}" data-warning-threshold="{$pwStrengthWarningThreshold}" class="form-control" placeholder="{lang key='clientareapassword'}" autocomplete="off"{if $remote_auth_prelinked} value="{$password}"{/if}>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="password" name="password2" id="inputNewPassword2" class="form-control" placeholder="{lang key='clientareaconfirmpassword'}" autocomplete="off"{if $remote_auth_prelinked} value="{$password}"{/if}>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="generate-box">
                                            <button type="button" class="btn btn-default btn-sm btn-sm-block generate-password" data-targetfields="inputNewPassword1,inputNewPassword2">
                                                {lang key='generatePassword.btnLabel'}
                                            </button>
                                            <div class="password-strength-meter">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success bg-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="passwordStrengthMeterBar">
                                                    </div>
                                                </div>
                                                <p class="text-center small text-muted" id="passwordStrengthTextLabel">{lang key='pwstrength'}: {lang key='pwstrengthenter'}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>             
                        {if $securityquestions}
                            <div class="row security-questions">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="securityqid" id="inputSecurityQId" class="form-control">
                                            <option value="">{lang key='clientareasecurityquestion'}</option>
                                            {foreach $securityquestions as $question}
                                                <option value="{$question.id}"{if $question.id eq $securityqid} selected{/if}>
                                                    {$question.question}
                                                </option>
                                            {/foreach}
                                        </select>                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="securityqans" id="inputSecurityQAns" class=" form-control" placeholder="{lang key='clientareasecurityanswer'}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        {/if}
                        {if $showMarketingEmailOptIn}
                            <div class="form-title">
                                <h2>{lang key='emailMarketing.joinOurMailingList'}</h2>
                            </div>
                            <div class="form-switch">
                                <input type="checkbox" id="switch" name="marketingoptin" value="1"{if $marketingEmailOptIn} checked{/if} class="no-icheck toggle-switch-success" data-size="small" data-on-text="{lang key='yes'}" data-off-text="{lang key='no'}">
                                <span>{$marketingEmailOptInMessage}</span>
                            </div>
                        {/if}
                        {include file="$template/includes/captcha.tpl"}
                        {if $accepttos}
                            <p class="text-center">
                                <label class="form-check">
                                    <input type="checkbox" name="accepttos" class="form-check-input accepttos">
                                    {lang key='ordertosagreement'} <a href="{$tosurl}" target="_blank">{lang key='ordertos'}</a>
                                </label>
                            </p>
                        {/if}
                    </div>
                    <input class="btn-main{$captcha->getButtonClass($captchaForm)}" type="submit" value="{lang key='clientregistertitle'}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
{/if}
