<?php
/* Smarty version 3.1.48, created on 2025-05-31 04:03:33
  from '/home/zenexcloud/public_html/templates/cloudx/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a7f95645474_68345257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c784782fd40347d36b644b584a57f4f332985a9' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/login.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a7f95645474_68345257 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="login-wrapper">
    <div class="container">
        <div class="row">
			<div class="col-md-12 col-sm-12">
			<div class="providerLinkingFeedback"></div>
			</div>
            <div class="col-md-6 col-sm-12">
                <div class="login-img">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/login-img.svg" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <div class="login-frm">
                    <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['welcomeToCloudGM'];?>
</h1>
                    <h6><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginCloudGMaccount'];?>
</h6>
                    <form method="post" action="<?php echo routePath('login-validate');?>
" class="login-form" role="form">
                        <div class="form-group">
                            <input type="email"  name="username" id="inputEmail" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareaemail'),$_smarty_tpl ) );?>
" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="inputPassword" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareapassword'),$_smarty_tpl ) );?>
" autocomplete="off"  class="form-control">
                        </div>
                        <div class="login-act">
                            <div class="remcheck">
                                <input type="checkbox" id="styled-checkbox-1" class="styled-checkbox" name="rememberme" />
                                <label for="styled-checkbox-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'loginrememberme'),$_smarty_tpl ) );?>
</label>
                            </div>
                            <a href="<?php echo routePath('password-reset-begin');?>
" class="fgtlinks"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'forgotpw'),$_smarty_tpl ) );?>
</a>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['captcha']->value->isEnabled()) {?>
                            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        <?php }?>
                        <button id="login" type="submit" class="btn-main <?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'loginbutton'),$_smarty_tpl ) );?>
</button>
                        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'userLogin.notRegistered'),$_smarty_tpl ) );?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/register.php"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'userLogin.createAccount'),$_smarty_tpl ) );?>
</a></p>
                    </form>
                    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/linkedaccounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('linkContext'=>"login",'customFeedback'=>true), 0, true);
?>
                </div>
            </div>
        </div>
    </div>
</section><?php }
}
