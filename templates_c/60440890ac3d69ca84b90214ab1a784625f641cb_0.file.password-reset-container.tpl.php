<?php
/* Smarty version 3.1.48, created on 2025-05-30 09:05:43
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/six/password-reset-container.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683974e7d35471_08089629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60440890ac3d69ca84b90214ab1a784625f641cb' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/six/password-reset-container.tpl',
      1 => 1746641212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683974e7d35471_08089629 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="logincontainer">
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['pwreset']), 0, true);
?>

    <?php if ($_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['innerTemplate']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['noPasswordResetWhenLoggedIn'],'textcenter'=>true), 0, true);
?>
    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['successMessage']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['successTitle']->value,'textcenter'=>true), 0, true);
?>
            <p><?php echo $_smarty_tpl->tpl_vars['successMessage']->value;?>
</p>
        <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['errorMessage']->value) {?>
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['errorMessage']->value,'textcenter'=>true), 0, true);
?>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['innerTemplate']->value) {?>
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/password-reset-".((string)$_smarty_tpl->tpl_vars['innerTemplate']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php }?>
        <?php }?>
    <?php }?>
</div>
<?php }
}
