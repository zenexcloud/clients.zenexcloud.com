<?php
/* Smarty version 3.1.48, created on 2025-05-29 10:59:55
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/modules/servers/VirtFusionDirect/templates/overview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_68383e2b2bfb38_06265962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1c8fb57b78ac2425a081d8d7467a702dc1a1f25' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/modules/servers/VirtFusionDirect/templates/overview.tpl',
      1 => 1655128361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68383e2b2bfb38_06265962 (Smarty_Internal_Template $_smarty_tpl) {
?><link href="<?php echo $_smarty_tpl->tpl_vars['systemURL']->value;?>
modules/servers/VirtFusionDirect/templates/css/module.css" rel="stylesheet"><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['systemURL']->value;?>
modules/servers/VirtFusionDirect/templates/js/module.js"><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['serviceStatus']->value == 'Active') {?><div class="panel card panel-default mb-3"><div class="panel-heading card-header"><h3 class="panel-title card-title m-0">Server Overview</h3></div><div class="panel-body card-body p-4"><div id="vf-server-info-loader-container"><div id="vf-server-info-loader" class="d-flex align-items-center justify-content-center"><div class="spinner-border"></div></div></div><?php echo '<script'; ?>
>vfServerData('<?php echo $_smarty_tpl->tpl_vars['serviceid']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['systemURL']->value;?>
');<?php echo '</script'; ?>
><div id="vf-server-info-error"><div class="alert alert-warning mb-0">Information unavailable. Try again later.</div></div><div id="vf-server-info" class="row mb-2"><div class="col-12"><div class="row"><div class="col-md-6"><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">Name:</div><div class="col-xs-8 col-8" id="vf-data-server-name"></div></div><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">Hostname:</div><div class="col-xs-8 col-8" id="vf-data-server-hostname"></div></div><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">Memory:</div><div class="col-xs-8 col-8" id="vf-data-server-memory"></div></div><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">CPU:</div><div class="col-xs-8 col-8" id="vf-data-server-cpu"></div></div></div><div class="col-md-6"><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">IPv4:</div><div class="col-xs-8 col-8" id="vf-data-server-ipv4"></div></div><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">IPv6:</div><div class="col-xs-8 col-8" id="vf-data-server-ipv6"></div></div><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">Storage:</div><div class="col-xs-8 col-8" id="vf-data-server-storage"></div></div><div class="row p-1"><div class="col-xs-4 col-4 text-right vf-bold">Traffic:</div><div class="col-xs-8 col-8" id="vf-data-server-traffic"></div></div></div></div></div></div></div></div><div class="panel card panel-default mb-3"><div class="panel-heading card-header"><h3 class="panel-title card-title m-0">Manage</h3></div><div class="panel-body card-body p-4"><div class="row"><div class="col-12"><div id="vf-login-error" class="alert alert-danger"></div><p>Manage your server via our dedicated control panel. You will be automatically authenticated and the control panel will open in a new window.</p><button id="vf-login-button" onclick="vfLoginAsServerOwner('<?php echo $_smarty_tpl->tpl_vars['serviceid']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['systemURL']->value;?>
',true)" type="button" class="btn btn-primary text-uppercase d-flex align-items-center"><div id="vf-login-button-spinner" class="spinner-border spinner-border-sm text-light vf-spinner-margin"></div>Open Control Panel</button></div><div class="col-12"><p class="mb-0 pt-3 vf-small">Having trouble opening the control panel in a new window? <a href="#" onclick="vfLoginAsServerOwner('<?php echo $_smarty_tpl->tpl_vars['serviceid']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['systemURL']->value;?>
',false)">Click here</a> to open in this window.</p></div><?php if ($_smarty_tpl->tpl_vars['serverHostname']->value) {?><div class="col-12"><hr><div id="vf-password-reset-error" class="alert alert-danger">Oops! Something went wrong. Try again later.</div><div id="vf-password-reset-success" class="alert alert-success"><div class="mb-2 font-weight-bold">Your new login credentials. These will only be displayed once.</div><div class="font-weight-bold">Email: <span class="font-weight-normal" id="vf-data-user-email"></span></div><div class="font-weight-bold">Password: <span class="font-weight-normal" id="vf-data-user-password"></span></div></div><p class="pt-0">Alternatively you may directly access the control panel at <a target="_blank" href="https://<?php echo $_smarty_tpl->tpl_vars['serverHostname']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['serverHostname']->value;?>
</a></p><button id="vf-password-reset-button" onclick="vfUserPasswordReset('<?php echo $_smarty_tpl->tpl_vars['serviceid']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['systemURL']->value;?>
',true)" type="button" class="btn btn-primary text-uppercase d-flex align-items-center"><div id="vf-password-reset-button-spinner" class="spinner-border spinner-border-sm text-light vf-spinner-margin"></div>Reset Login Credentials</button></div><?php }?></div></div></div><?php }?><div class="panel card panel-default mb-3"><div class="panel-heading card-header"><h3 class="panel-title card-title m-0">Billing Overview</h3></div><div class="panel-body card-body"><div class="row"><div class="col-lg-6"><div class="row p-2"><div class="col-xs-6 col-6 text-right vf-bold">Product:</div><div class="col-xs-6 col-6"><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['product']->value;?>
</div></div><div class="row p-2"><div class="col-xs-6 col-6 text-right vf-bold"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['recurringamount'];?>
:</div><div class="col-xs-6 col-6"><?php echo $_smarty_tpl->tpl_vars['recurringamount']->value;?>
</div></div><div class="row p-2"><div class="col-xs-6 col-6 text-right vf-bold"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderbillingcycle'];?>
:</div><div class="col-xs-6 col-6"><?php echo $_smarty_tpl->tpl_vars['billingcycle']->value;?>
</div></div></div><div class="col-lg-6"><div class="row p-2"><div class="col-xs-6 col-6 text-right vf-bold"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingregdate'];?>
:</div><div class="col-xs-6 col-6"><?php echo $_smarty_tpl->tpl_vars['regdate']->value;?>
</div></div><div class="row p-2"><div class="col-xs-6 col-6 text-right vf-bold"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingnextduedate'];?>
:</div><div class="col-xs-6 col-6"><?php echo $_smarty_tpl->tpl_vars['nextduedate']->value;?>
</div></div><div class="row p-2"><div class="col-xs-6 col-6 text-right vf-bold"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymentmethod'];?>
:</div><div class="col-xs-6 col-6"><?php echo $_smarty_tpl->tpl_vars['paymentmethod']->value;?>
</div></div></div></div></div></div><?php }
}
