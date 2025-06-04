<section class="login-wrapper">
    <div class="container">
        <div class="row">
			<div class="col-md-12 col-sm-12">
			<div class="providerLinkingFeedback"></div>
			</div>
            <div class="col-md-6 col-sm-12">
                <div class="login-img">
                    <img src="{$WEB_ROOT}/templates/{$template}/images/login-img.svg" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                {include file="$template/includes/flashmessage.tpl"}
                <div class="login-frm">
                    <h1>{$LANG.welcomeToCloudGM}</h1>
                    <h6>{$LANG.loginCloudGMaccount}</h6>
                    <form method="post" action="{routePath('login-validate')}" class="login-form" role="form">
                        <div class="form-group">
                            <input type="email"  name="username" id="inputEmail" placeholder="{lang key='clientareaemail'}" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="inputPassword" placeholder="{lang key='clientareapassword'}" autocomplete="off"  class="form-control">
                        </div>
                        <div class="login-act">
                            <div class="remcheck">
                                <input type="checkbox" id="styled-checkbox-1" class="styled-checkbox" name="rememberme" />
                                <label for="styled-checkbox-1">{lang key='loginrememberme'}</label>
                            </div>
                            <a href="{routePath('password-reset-begin')}" class="fgtlinks">{lang key='forgotpw'}</a>
                        </div>
                        {if $captcha->isEnabled()}
                            {include file="$template/includes/captcha.tpl"}
                        {/if}
                        <button id="login" type="submit" class="btn-main {$captcha->getButtonClass($captchaForm)}">{lang key='loginbutton'}</button>
                        <p>{lang key='userLogin.notRegistered'} <a href="{$WEB_ROOT}/register.php">{lang key='userLogin.createAccount'}</a></p>
                    </form>
                    {include file="$template/includes/linkedaccounts.tpl" linkContext="login" customFeedback=true}
                </div>
            </div>
        </div>
    </div>
</section>