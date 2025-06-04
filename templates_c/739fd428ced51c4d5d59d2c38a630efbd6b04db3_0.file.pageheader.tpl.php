<?php
/* Smarty version 3.1.48, created on 2025-05-29 10:52:59
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/six/includes/pageheader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_68383c8b338954_16053454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '739fd428ced51c4d5d59d2c38a630efbd6b04db3' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/six/includes/pageheader.tpl',
      1 => 1746641212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68383c8b338954_16053454 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="header-lined">
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;
if ($_smarty_tpl->tpl_vars['desc']->value) {?> <small><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</small><?php }?></h1>
    <?php if ($_smarty_tpl->tpl_vars['showbreadcrumb']->value) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
</div>
<?php }
}
