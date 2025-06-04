<?php
/* Smarty version 3.1.48, created on 2025-05-30 09:05:43
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/six/password-reset-email-prompt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683974e7d38bd2_72402127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6ba14795ba2e458dccf05773cc0539bf12363fa' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/six/password-reset-email-prompt.tpl',
      1 => 1746641212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683974e7d38bd2_72402127 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwresetemailneeded'];?>
</p>

<form method="post" action="<?php echo routePath('password-reset-validate-email');?>
" role="form">
    <input type="hidden" name="action" value="reset" />

    <div class="form-group">
        <label for="inputEmail"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginemail'];?>
</label>
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['enteremail'];?>
" autofocus>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['captcha']->value->isEnabled()) {?>
        <div class="text-center margin-bottom">
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
    <?php }?>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary<?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);?>
">
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwresetsubmit'];?>

        </button>
    </div>

</form>
<?php }
}
