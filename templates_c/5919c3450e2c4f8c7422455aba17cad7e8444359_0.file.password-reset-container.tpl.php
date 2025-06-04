<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:05:09
  from '/home/zenexcloud/public_html/templates/cloudx/password-reset-container.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a9c1565a7b9_10725157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5919c3450e2c4f8c7422455aba17cad7e8444359' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/password-reset-container.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a9c1565a7b9_10725157 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['innerTemplate']->value) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'noPasswordResetWhenLoggedIn'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_prefixVariable1,'textcenter'=>true), 0, true);
} else { ?>
    <?php if ($_smarty_tpl->tpl_vars['successMessage']->value) {?>
    <section class="password-wrapper-forgot">
        <div class="row justify-content-center">
            <div class="card mw-540 mb-4 mt-4">
                <div class="card-body px-md-5 py-5">
                    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['successTitle']->value,'textcenter'=>true), 0, true);
?>
                    <p><?php echo $_smarty_tpl->tpl_vars['successMessage']->value;?>
</p>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['innerTemplate']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/password-reset-".((string)$_smarty_tpl->tpl_vars['innerTemplate']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>
    <?php }
}
}
}
