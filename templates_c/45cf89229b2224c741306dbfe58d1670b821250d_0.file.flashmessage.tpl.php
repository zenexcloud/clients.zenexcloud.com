<?php
/* Smarty version 3.1.48, created on 2025-05-31 08:23:09
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/twenty-one/includes/flashmessage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683abc6d3d62b6_78756490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45cf89229b2224c741306dbfe58d1670b821250d' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/twenty-one/includes/flashmessage.tpl',
      1 => 1746641212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683abc6d3d62b6_78756490 (Smarty_Internal_Template $_smarty_tpl) {
$_prefixVariable1 = get_flash_message();
$_smarty_tpl->_assignInScope('message', $_prefixVariable1);
if ($_prefixVariable1) {?>
    <div class="alert alert-<?php if ($_smarty_tpl->tpl_vars['message']->value['type'] == "error") {?>danger<?php } elseif ($_smarty_tpl->tpl_vars['message']->value['type'] == 'success') {?>success<?php } elseif ($_smarty_tpl->tpl_vars['message']->value['type'] == 'warning') {?>warning<?php } else { ?>info<?php }
if ((isset($_smarty_tpl->tpl_vars['align']->value))) {?> text-<?php echo $_smarty_tpl->tpl_vars['align']->value;
}?>">
        <?php echo $_smarty_tpl->tpl_vars['message']->value['text'];?>

    </div>
<?php }
}
}
