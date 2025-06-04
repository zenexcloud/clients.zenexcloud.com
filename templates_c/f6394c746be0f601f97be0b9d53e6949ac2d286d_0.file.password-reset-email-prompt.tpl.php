<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:05:09
  from '/home/zenexcloud/public_html/templates/cloudx/password-reset-email-prompt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a9c15667598_50460702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6394c746be0f601f97be0b9d53e6949ac2d286d' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/password-reset-email-prompt.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a9c15667598_50460702 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="login-wrapper">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="login-img">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/forgot-img.svg" alt="">
            </div>
         </div>
         <div class="col-md-6 col-sm-12">
            <?php if ($_smarty_tpl->tpl_vars['errorMessage']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['errorMessage']->value,'textcenter'=>true), 0, true);
?>
            <?php }?>
            <div class="login-frm forgot-frm">
               <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwreset'),$_smarty_tpl ) );?>
</h1>
               <h6><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwresetemailneeded'),$_smarty_tpl ) );?>
</h6>
               <form method="post" action="<?php echo routePath('password-reset-validate-email');?>
" role="form">
                  <input type="hidden" name="action" value="reset" />
                  <div class="form-group">
                     <input type="text" name="email" id="inputEmail" placeholder="name@example.com" class="form-control" autofocus>
                     <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['registerEmailId_pwd'];?>
</span>
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['captcha']->value->isEnabled()) {?>
                  <div class="text-center margin-bottom">
                     <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                  </div>
                  <?php }?>
                  <button type="submit" class="btn-main <?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwresetsubmit'),$_smarty_tpl ) );?>
</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section><?php }
}
