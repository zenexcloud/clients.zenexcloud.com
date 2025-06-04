<?php
/* Smarty version 3.1.48, created on 2025-06-01 13:13:50
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/password-reset-change-prompt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c520eac3338_98406520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40b3d3452a7c5d8798838b17e79e75bc15b535c8' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/password-reset-change-prompt.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683c520eac3338_98406520 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwresetenternewpw'),$_smarty_tpl ) );?>
</p>

<form class="using-password-strength" method="POST" action="<?php echo routePath('password-reset-change-perform');?>
">
    <input type="hidden" name="answer" id="answer" value="<?php echo $_smarty_tpl->tpl_vars['securityAnswer']->value;?>
" />

    <div id="newPassword1" class="form-group has-feedback">
        <label class="control-label" for="inputNewPassword1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'newpassword'),$_smarty_tpl ) );?>
</label>
        <input type="password" name="newpw" id="inputNewPassword1" class="form-control" autocomplete="off" />
    </div>

    <div id="newPassword2" class="form-group has-feedback">
        <label class="control-label" for="inputNewPassword2"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'confirmnewpassword'),$_smarty_tpl ) );?>
</label>
        <input type="password" name="confirmpw" id="inputNewPassword2" class="form-control" autocomplete="off" />
        <div id="inputNewPassword2Msg"></div>
    </div>

    <div class="form-group">
        <label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pwstrength'),$_smarty_tpl ) );?>
</label>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pwstrength.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>

    <div class="form-group">
        <div class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareasavechanges'),$_smarty_tpl ) );?>
" />
            <input class="btn btn-default" type="reset" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancel'),$_smarty_tpl ) );?>
" />
        </div>
    </div>

</form>
<?php }
}
