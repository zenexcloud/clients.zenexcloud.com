<?php
/* Smarty version 3.1.48, created on 2025-06-01 04:23:47
  from 'mailMessage:message' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683bd5d3f31d17_59080666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '652e3de8ff57f412acf7c0a8dadc70dc1a7637b6' => 
    array (
      0 => 'mailMessage:message',
      1 => 1748751827,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683bd5d3f31d17_59080666 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <style type="text/css">
            [EmailCSS]
        </style>
    </head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <table border="0" cellpadding="0" cellspacing="0" id="templateContainer">
                            <tr>
                                <td align="center" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
                                        <tr>
                                            <td valign="top" class="headerContent">
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['company_domain']->value;?>
">
                                                    <?php if ($_smarty_tpl->tpl_vars['company_logo_url']->value) {?>
                                                        <img src="<?php echo $_smarty_tpl->tpl_vars['company_logo_url']->value;?>
" style="max-width:600px;padding:20px 20px 0 20px" id="headerImage" alt="<?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
" />
                                                    <?php } else { ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>

                                                    <?php }?>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody">
                                        <tr>
                                            <td valign="top" class="bodyContent">
<!-- message header end --><p>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,</p>
<p>
    Thank you for purchasing <?php echo $_smarty_tpl->tpl_vars['service_product_name']->value;?>
 from Open-Xchange.<br>
    Your email service has been set up and is ready for you to begin creating email accounts.
</p>
<?php if ($_smarty_tpl->tpl_vars['configuration_required']->value) {?>
<p>
    <strong>Required Action</strong><br>
    To begin using Open-Xchange mail services, you must modify the MX records for your domain to the following:<br>
<pre><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['required_mx_records']->value, 'mx_priority', false, 'mx_host');
$_smarty_tpl->tpl_vars['mx_priority']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mx_host']->value => $_smarty_tpl->tpl_vars['mx_priority']->value) {
$_smarty_tpl->tpl_vars['mx_priority']->do_else = false;
echo $_smarty_tpl->tpl_vars['mx_host']->value;?>
 with a recommended priority of <?php echo $_smarty_tpl->tpl_vars['mx_priority']->value;?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></pre>
    The following SPF record is also recommended:
    <pre><?php echo $_smarty_tpl->tpl_vars['required_spf_record']->value;?>
</pre>
</p>
<?php }?>
<p>
    To create, edit and administer your email addresses and passwords, please visit the "Email User Management" pages in your
    <a href="<?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['service_id']->value;?>
">client area</a>.
</p>
<p>You can access OX App Suite via <a href="<?php echo $_smarty_tpl->tpl_vars['webmail_link']->value;?>
">the OX App Suite Cloud portal</a>.</p>
<p>
    <strong>Mobile Access</strong><br>
    To configure and sync email and PIM data on your mobile device, please refer to the "Connect Your Device" Wizard in App Suite.
    You can find it under your profile icon in the top right-hand corner of your App Suite Webmail interface.<br>
    You can also download the App Suite Mobile App here: <br>
    <a href="https://apps.apple.com/us/app/ox-mail-by-open-xchange/id1385582725">iOS</a> or
    <a href="https://play.google.com/store/apps/details?id=com.openxchange.mobile.oxmail">Android</a>
</p>
<?php if ($_smarty_tpl->tpl_vars['migration_tool_url']->value) {?>
<p>
    <strong>Migrations</strong><br>
    OX App Suite has a quick and easy self-service migration tool to help you move your users.
    You can find it here: <a href="<?php echo $_smarty_tpl->tpl_vars['migration_tool_url']->value;?>
">Migration Tool</a><br>
</p>
<?php }?>
<p>If you have any questions, please contact our <a href="<?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
submitticket.php">support team</a>.</p>
<p>Thank you for choosing us as your trusted service provider.</p>
<p><?php echo $_smarty_tpl->tpl_vars['signature']->value;?>
</p><!-- message footer start -->
</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                                        <tr>
                                            <td valign="top" class="footerContent">
                                                 <a href="<?php echo $_smarty_tpl->tpl_vars['company_domain']->value;?>
">visit our website</a>
                                                <span class="hide-mobile"> | </span>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
">log in to your account</a>
                                                <span class="hide-mobile"> | </span>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
submitticket.php">get support</a> <br />
                                                Copyright © <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
, All rights reserved.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html><?php }
}
