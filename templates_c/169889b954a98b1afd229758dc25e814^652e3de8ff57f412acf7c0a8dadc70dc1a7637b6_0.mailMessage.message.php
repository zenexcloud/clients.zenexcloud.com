<?php
/* Smarty version 3.1.48, created on 2025-06-01 14:16:26
  from 'mailMessage:message' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c60ba99bde2_03585673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '652e3de8ff57f412acf7c0a8dadc70dc1a7637b6' => 
    array (
      0 => 'mailMessage:message',
      1 => 1748787386,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683c60ba99bde2_03585673 (Smarty_Internal_Template $_smarty_tpl) {
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
<!-- message header end --><p>
Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,<br />
<br />
<strong>PLEASE PRINT THIS MESSAGE FOR YOUR RECORDS - PLEASE READ THIS EMAIL IN FULL.</strong>
</p>
<p>
We are pleased to tell you that the server you ordered has now been set up and is operational.
</p>
<p>
<strong>Server Details<br />
</strong>=============================
</p>
<p>
<?php echo $_smarty_tpl->tpl_vars['service_product_name']->value;?>

</p>
<p>
Main IP: <?php echo $_smarty_tpl->tpl_vars['service_dedicated_ip']->value;?>
<br />
Root pass: <?php echo $_smarty_tpl->tpl_vars['service_password']->value;?>

</p>
<p>
IP address allocation: <br />
<?php echo $_smarty_tpl->tpl_vars['service_assigned_ips']->value;?>

</p>
<p>
ServerName: <?php echo $_smarty_tpl->tpl_vars['service_domain']->value;?>

</p>
<p>
<strong>WHM Access<br />
</strong>=============================<br />
<a href="http://xxxxx:2086/">http://xxxxx:2086</a><br />
Username: root<br />
Password: <?php echo $_smarty_tpl->tpl_vars['service_password']->value;?>

</p>
<p>
<strong>Custom DNS Server Addresses</strong><br />
=============================<br />
The custom DNS addresses you should set for your domain to use are: <br />
Primary DNS: <?php echo $_smarty_tpl->tpl_vars['service_ns1']->value;?>
<br />
Secondary DNS: <?php echo $_smarty_tpl->tpl_vars['service_ns2']->value;?>

</p>
<p>
You will have to login to your registrar and find the area where you can specify both of your custom name server addresses.
</p>
<p>
After adding these custom nameservers to your domain registrar control panel, it will take 24 to 48 hours for your domain to delegate authority to your DNS server. Once this has taken effect, your DNS server has control over the DNS records for the domains which use your custom name server addresses. 
</p>
<p>
<strong>SSH Access Information<br />
</strong>=============================<br />
Main IP Address: xxxxxxxx<br />
Server Name: <?php echo $_smarty_tpl->tpl_vars['service_domain']->value;?>
<br />
Root Password: xxxxxxxx
</p>
<p>
You can access your server using a free simple SSH client program called Putty located at:<br />
<a href="http://www.securitytools.net/mirrors/putty/">http://www.securitytools.net/mirrors/putty/</a>
</p>
<p>
<strong>Support</strong><br />
=============================<br />
For any support needs, please open a ticket at <a href="<?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
</a>
</p>
<p>
Please include any necessary information to provide you with faster service, such as root password, domain names, and a description of the problem / or assistance needed. This will speed up the support time by allowing our administrators to immediately begin diagnosing the problem.
</p>
<p>
The manual for cPanel can be found here: <a href="http://www.cpanel.net/docs/cp/">http://www.cpanel.net/docs/cp/</a> <br />
For documentation on using WHM please see the following link: <a href="http://www.cpanel.net/docs/whm/index.html">http://www.cpanel.net/docs/whm/index.html</a>
</p>
<p>
=============================
</p>
<p>
If you need to move accounts to the server use: Transfers Copy an account from another server with account password
</p>
<p>
<a href="http://xxxxxxx:2086/scripts2/norootcopy">http://xxxxxxx:2086/scripts2/norootcopy</a>
</p>
<p>
Note the other server must use cpanel to move it.
</p>
<p>
=============================
</p>
<p>
<?php echo $_smarty_tpl->tpl_vars['signature']->value;?>

</p>
<!-- message footer start -->
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
