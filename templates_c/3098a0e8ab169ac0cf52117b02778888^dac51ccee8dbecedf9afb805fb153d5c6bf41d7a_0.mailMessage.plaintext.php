<?php
/* Smarty version 3.1.48, created on 2025-06-01 14:22:14
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c62162d7349_04942003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1748787734,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683c62162d7349_04942003 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['ticket_message']->value;?>


----------------------------------------------
Ticket ID: #<?php echo $_smarty_tpl->tpl_vars['ticket_id']->value;?>

Subject: <?php echo $_smarty_tpl->tpl_vars['ticket_subject']->value;?>

Status: <?php echo $_smarty_tpl->tpl_vars['ticket_status']->value;?>

Ticket URL: <?php echo $_smarty_tpl->tpl_vars['ticket_link']->value;?>

----------------------------------------------<?php }
}
