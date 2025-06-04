<?php
/* Smarty version 3.1.48, created on 2025-06-04 10:13:35
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/includes/captcha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_68401c4f372c36_70229644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdb4ed47af62c3a768cb624c353856b1be4f6ce0' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/includes/captcha.tpl',
      1 => 1749023655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68401c4f372c36_70229644 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['captcha']->value->isEnabled() && $_smarty_tpl->tpl_vars['captcha']->value->isEnabledForForm($_smarty_tpl->tpl_vars['captchaForm']->value)) {?>
    <div class="text-center<?php if ($_smarty_tpl->tpl_vars['containerClass']->value) {
echo $_smarty_tpl->tpl_vars['containerClass']->value;
} else { ?> row justify-content-center<?php }?> captcha-cloudx-theme">
        <?php if ($_smarty_tpl->tpl_vars['templatefile']->value == 'homepage') {?>
            <div class="domainchecker-homepage-captcha">
        <?php }?>

       <?php if ($_smarty_tpl->tpl_vars['captcha']->value->recaptcha->isEnabled() && !$_smarty_tpl->tpl_vars['captcha']->value->recaptcha->isInvisible()) {?>
            <div id="google-recaptcha-domainchecker" class="form-group recaptcha-container mx-auto" data-action="<?php echo $_smarty_tpl->tpl_vars['captchaForm']->value;?>
"></div>
        <?php } elseif (!$_smarty_tpl->tpl_vars['captcha']->value->recaptcha->isEnabled()) {?>
            <div class="col-md-12">
                <div id="default-captcha-domainchecker" class="<?php if ($_smarty_tpl->tpl_vars['filename']->value == 'domainchecker') {?>input-group input-group-box <?php }?>row pb-3">
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"captchaverify"),$_smarty_tpl ) );?>
</p>
                    <div class="captcha-main-section">
                        <div class="captchaimage">
                            <img id="inputCaptchaImage" data-src="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
includes/verifyimage.php" src="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
includes/verifyimage.php" align="middle" />
                        </div>
                        <div class="captcha-default-theme">
                            <input id="inputCaptcha" type="text" name="code" maxlength="6" class="form-control <?php if ($_smarty_tpl->tpl_vars['filename']->value == 'register') {?>float-left<?php }?>"
                                data-toggle="tooltip" data-placement="right" data-trigger="manual" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.required'),$_smarty_tpl ) );?>
"/>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['templatefile']->value == 'homepage') {?>
            </div>
        <?php }?>
    </div>
<?php }
}
}
