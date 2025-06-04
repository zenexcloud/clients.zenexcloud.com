<section class="login-wrapper">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="login-img">
               <img src="{$WEB_ROOT}/templates/{$template}/images/forgot-img.svg" alt="">
            </div>
         </div>
         <div class="col-md-6 col-sm-12">
            {if $errorMessage}
            {include file="$template/includes/alert.tpl" type="error" msg=$errorMessage textcenter=true}
            {/if}
            <div class="login-frm forgot-frm">
               <h1>{lang key='pwreset'}</h1>
               <h6>{lang key='pwresetemailneeded'}</h6>
               <form method="post" action="{routePath('password-reset-validate-email')}" role="form">
                  <input type="hidden" name="action" value="reset" />
                  <div class="form-group">
                     <input type="text" name="email" id="inputEmail" placeholder="name@example.com" class="form-control" autofocus>
                     <span>{$LANG.registerEmailId_pwd}</span>
                  </div>
                  {if $captcha->isEnabled()}
                  <div class="text-center margin-bottom">
                     {include file="$template/includes/captcha.tpl"}
                  </div>
                  {/if}
                  <button type="submit" class="btn-main {$captcha->getButtonClass($captchaForm)}">{lang key='pwresetsubmit'}</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>