<?php
/* Smarty version 3.1.48, created on 2025-06-01 04:23:47
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683bd5d3f377b8_95252138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1748751827,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683bd5d3f377b8_95252138 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,



    Thank you for purchasing <?php echo $_smarty_tpl->tpl_vars['service_product_name']->value;?>
 from Open-Xchange.
    Your email service has been set up and is ready for you to begin creating email accounts.



<?php if ($_smarty_tpl->tpl_vars['configuration_required']->value) {?>

    Required Action
    To begin using Open-Xchange mail services, you must modify the MX records for your domain to the following:
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['required_mx_records']->value, 'mx_priority', false, 'mx_host');
$_smarty_tpl->tpl_vars['mx_priority']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mx_host']->value => $_smarty_tpl->tpl_vars['mx_priority']->value) {
$_smarty_tpl->tpl_vars['mx_priority']->do_else = false;
echo $_smarty_tpl->tpl_vars['mx_host']->value;?>
 with a recommended priority of <?php echo $_smarty_tpl->tpl_vars['mx_priority']->value;?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    The following SPF record is also recommended:
    <?php echo $_smarty_tpl->tpl_vars['required_spf_record']->value;?>




<?php }?>

    To create, edit and administer your email addresses and passwords, please visit the "Email User Management" pages in your
    <?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['service_id']->value;?>
.



You can access OX App Suite via <?php echo $_smarty_tpl->tpl_vars['webmail_link']->value;?>
.



    Mobile Access
    To configure and sync email and PIM data on your mobile device, please refer to the "Connect Your Device" Wizard in App Suite.
    You can find it under your profile icon in the top right-hand corner of your App Suite Webmail interface.
    You can also download the App Suite Mobile App here: 
    https://apps.apple.com/us/app/ox-mail-by-open-xchange/id1385582725 or
    https://play.google.com/store/apps/details?id=com.openxchange.mobile.oxmail



<?php if ($_smarty_tpl->tpl_vars['migration_tool_url']->value) {?>

    Migrations
    OX App Suite has a quick and easy self-service migration tool to help you move your users.
    You can find it here: <?php echo $_smarty_tpl->tpl_vars['migration_tool_url']->value;?>




<?php }?>
If you have any questions, please contact our <?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
submitticket.php.


Thank you for choosing us as your trusted service provider.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}
