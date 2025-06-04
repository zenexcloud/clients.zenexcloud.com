<?php
/* Smarty version 3.1.48, created on 2025-05-31 04:03:33
  from '/home/zenexcloud/public_html/templates/twenty-one/includes/verifyemail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a7f956314e3_47542920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '736831db9d18459276eaec2d87a988dcf36374de' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/twenty-one/includes/verifyemail.tpl',
      1 => 1746641212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a7f956314e3_47542920 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['showEmailVerificationBanner']->value) {?>
    <div class="verification-banner email-verification">
        <div class="container">
            <div class="row">
                <div class="col-2 col-sm-1 order-3">
                    <button id="btnEmailVerificationClose" type="button" class="btn close" data-uri="<?php echo routePath('dismiss-email-verification');?>
"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="col-10 col-sm-7 col-md-8 order-1">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span class="text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'verifyEmailAddress'),$_smarty_tpl ) );?>
</span>
                </div>
                <div class="col-12 col-sm-4 col-md-3 order-sm-2 order-md-last">
                    <button id="btnResendVerificationEmail" class="btn btn-default btn-sm btn-block btn-resend-verify-email btn-action" data-email-sent="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'emailSent'),$_smarty_tpl ) );?>
" data-error-msg="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'error'),$_smarty_tpl ) );?>
" data-uri="<?php echo routePath('user-email-verification-resend');?>
">
                        <span class="loader w-hidden"><i class="fa fa-spinner fa-spin"></i></span>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'resendEmail'),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
        </div>
    </div>
<?php }
}
}
