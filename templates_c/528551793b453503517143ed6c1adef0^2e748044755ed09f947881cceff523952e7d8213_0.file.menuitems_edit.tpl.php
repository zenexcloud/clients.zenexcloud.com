<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:20:49
  from '/home/zenexcloud/public_html/modules/addons/menumanager/templates/menuitems_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a9fc1351973_78115480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e748044755ed09f947881cceff523952e7d8213' => 
    array (
      0 => '/home/zenexcloud/public_html/modules/addons/menumanager/templates/menuitems_edit.tpl',
      1 => 1748692982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a9fc1351973_78115480 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-lg-12"><?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value;?>
</div>
</div>

<div class="clear-line-10"></div>

<form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=doedititem" method="post" autocomplete="off">
<input type="hidden" name="itemid" value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['id'];?>
">
<input type="hidden" name="groupid" value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['groupid'];?>
">
<input type="hidden" name="parentid" value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['parentid'];?>
">
<input type="hidden" name="translationrecords" value="<?php echo $_smarty_tpl->tpl_vars['itemtranslationrecords']->value;?>
">
<div class="row">
    <div class="col-lg-8">
        <div class="menumanager-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a>
                </li>
                <li role="presentation">
                    <a href="#translations" aria-controls="translations" role="tab" data-toggle="tab">Translations</a>
                </li>
                <li role="presentation">
                    <a href="#attributes" aria-controls="attributes" role="tab" data-toggle="tab">Attributes</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="general">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['title'];?>
" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="accesslevel">Status</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="accesslevel" id="accesslevel" class="form-control input-sm">
                                    <optgroup label="Common:">
                                        <option value="1"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '1') {?> selected<?php }?>>Always enabled</option>
                                        <option value="0"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '0') {?> selected<?php }?>>Always disabled</option>
                                        <option value="2"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '2') {?> selected<?php }?>>Enabled for visitors only</option>
                                        <option value="3"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '3') {?> selected<?php }?>>Enabled for clients only</option>
                                        <option value="14"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '14') {?> selected<?php }?>>Enabled for Affiliates only</option>
                                    </optgroup>
                                    <optgroup label="Enabled for clients if they have:">
                                        <option value="4"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '4') {?> selected<?php }?>>Active Product(s)</option>
                                        <option value="5"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '5') {?> selected<?php }?>>Overdue Invoice(s)</option>
                                        <option value="6"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '6') {?> selected<?php }?>>Active Ticket(s)</option>
                                        <option value="7"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '7') {?> selected<?php }?>>Active Domain(s)</option>
                                    </optgroup>
                                    <optgroup label="Enabled if one of this settings is available:">
                                        <option value="8"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '8') {?> selected<?php }?>>Manage Credit Cards</option>
                                        <option value="9"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '9') {?> selected<?php }?>>Add Funds</option>
                                        <option value="10"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '10') {?> selected<?php }?>>Mass Pay</option>
                                        <option value="11"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '11') {?> selected<?php }?>>Domain Registration</option>
                                        <option value="12"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '12') {?> selected<?php }?>>Domain Transfer</option>
                                        <option value="13"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '13') {?> selected<?php }?>>Affiliates</option>
                                    </optgroup>
                                    <option value="15"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] == '15') {?> selected<?php }?>>Client is in on of the selected groups</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="client-groups-div" class="form-group"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['accesslevel'] != '15') {?>style="display:none"<?php }?>>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="clientgroups">Client Groups</label>
                                <select name="clientgroups[]" id="clientgroups" class="form-control" multiple>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientgroups']->value, 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['group']->value['id'],$_smarty_tpl->tpl_vars['selectedclientgroups']->value)) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['group']->value['groupname'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                                <div class="help-block small">Click <kbd>CTRL</kbd> + <kbd>Click</kbd> to select multiple groups.<br>if no groups selected it will be considered "Enabled for clients only" without restrictions.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target">Target URL</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select name="urltype" id="urltype" class="form-control input-sm">
                                        <option value="clientarea-off"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Core URL Available To Anyone</option>
                                        <option value="clientarea-on"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Core URL Available To Logged-in Clients Only</option>
                                        <option value="support"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'support') {?> selected<?php }?>>Support Department</option>
                                        <option value="customurl"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'customurl') {?> selected<?php }?>>External/Custom URL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select name="clientarea-off" id="clientarea-off" class="form-control input-sm" style="display:<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?>block<?php } else { ?>none<?php }?>;">
                                        <option value="index.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'index.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Portal Home</option>
                                        <option value="downloads.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'downloads.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Downloads</option>
                                        <option value="knowledgebase.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'knowledgebase.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Knowledgebase</option>
                                        <option value="domainchecker.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'domainchecker.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Domain Checker</option>
                                        <option value="cart.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'cart.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Order</option>
                                        <option value="announcements.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'announcements.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Announcements</option>
                                        <option value="submitticket.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'submitticket.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Open New Ticket</option>
                                        <option value="affiliates.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'affiliates.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Affiliates</option>
                                        <option value="contact.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'contact.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Contact Us</option>
                                        <option value="login.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'login.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Login Page</option>
                                        <option value="register.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'register.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Register Account</option>
                                        <option value="pwreset.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'pwreset.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Forgot Password</option>
                                        <option value="cart.php?a=add&domain=register"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'cart.php?a=add&domain=register' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Register a New Domain</option>
                                        <option value="cart.php?a=add&domain=transfer"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'cart.php?a=add&domain=transfer' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>Transfer Domains to Us</option>
                                        <option value="cart.php?a=view"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'cart.php?a=view' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-off') {?> selected<?php }?>>View Cart</option>
                                    </select>
                                    
                                    <select name="clientarea-on" id="clientarea-on" class="form-control input-sm" style="display:<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?>block<?php } else { ?>none<?php }?>;">
                                        <option value="clientarea.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Client Summary</option>
                                        <option value="networkissues.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'networkissues.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Network Issues</option>
                                        <option value="serverstatus.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'serverstatus.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Servers Status</option>
                                        <option value="supporttickets.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'supporttickets.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Support Tickets</option>
                                        <option value="clientarea.php?action=products"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=products' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>My Services</option>
                                        <option value="cart.php?gid=addons"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'cart.php?gid=addons' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>View Available Addons</option>
                                        <option value="clientarea.php?action=domains"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=domains' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>My Domain</option>
                                        <option value="cart.php?gid=renewals"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'cart.php?gid=renewals' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Renew Domains</option>
                                        <option value="clientarea.php?action=invoices"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=invoices' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>My Invoices</option>
                                        <option value="clientarea.php?action=creditcard"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=creditcard' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Manage Credit Card</option>
                                        <option value="clientarea.php?action=addfunds"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=addfunds' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Add Funds</option>
                                        <option value="clientarea.php?action=quotes"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=quotes' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>My Quotes</option>
                                        <option value="clientarea.php?action=masspay&all=true"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=masspay&all=true' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Mass Payment</option>
                                        <option value="clientarea.php?action=details"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=details' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Edit Account Details</option>
                                        <option value="clientarea.php?action=contacts"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=contacts' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Contacts/Sub-Accounts</option>
                                        <option value="clientarea.php?action=emails"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=emails' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Email History</option>
                                        <option value="clientarea.php?action=changepw"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=changepw' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Change Password</option>
                                        <option value="clientarea.php?action=security"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'clientarea.php?action=security' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Security Settings</option>
                                        <option value="logout.php"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == 'logout.php' && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'clientarea-on') {?> selected<?php }?>>Logout</option>
                                    </select>
                                    
                                    <select name="support" id="support" class="form-control input-sm" style="display:<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'support') {?>block<?php } else { ?>none<?php }?>;">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supportdepartments']->value, 'department');
$_smarty_tpl->tpl_vars['department']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['department']->value) {
$_smarty_tpl->tpl_vars['department']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['department']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['url'] == $_smarty_tpl->tpl_vars['department']->value['id'] && $_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'support') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['department']->value['name'];?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                    
                                    <input type="text" name="customurl" id="customurl" class="form-control input-sm" placeholder="Specify anything here to be used as the URL.." <?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'customurl') {?>value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['url'];?>
"<?php }?> style="display:<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['urltype'] == 'customurl') {?>block<?php } else { ?>none<?php }?>;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="translations">
                    <div class="clear-line-20"></div>
                    <div class="panel-group" id="translationpanels" role="tablist" aria-multiselectable="true">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                        <input type="hidden" name="translation_languages[]" value="<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
">
                        <div class="panel panel-<?php if ($_smarty_tpl->tpl_vars['itemtranslations']->value['title'][$_smarty_tpl->tpl_vars['language']->value] != '') {?>info<?php } else { ?>default<?php }?>">
                            <div class="panel-heading" role="tab" id="heading_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#translationpanels" href="#<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" aria-expanded="true" aria-controls="<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
">
                                        <i class="fa fa-plus"></i> <?php echo ucfirst($_smarty_tpl->tpl_vars['language']->value);?>

                                    </a>
                                </h4>
                            </div>
                            <div id="<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
">
                                <div class="panel-body">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="translation_title[<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
]" class="col-sm-2 control-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="translation_title[<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
]" class="form-control" id="translation_title[<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['itemtranslations']->value['title'][$_smarty_tpl->tpl_vars['language']->value];?>
" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="attributes">
                    <button type="button" class="btn btn-sm btn-info pull-right add-attribute-form" onclick="addAttribute();"><i class="fa fa-plus"></i> Add More</button>
                    <div class="clear"></div>
                    <div id="attributes-wrap">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['attributes']->value, 'attribute');
$_smarty_tpl->tpl_vars['attribute']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->do_else = false;
?>
                        <div class="row attributeform">
                            <div class="col-lg-4">
                                <input type="text" name="attrnames[]" value="<?php echo $_smarty_tpl->tpl_vars['attribute']->value['name'];?>
" class="form-control input-sm" placeholder="Name">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="attrvalues[]" value="<?php echo $_smarty_tpl->tpl_vars['attribute']->value['value'];?>
" class="form-control input-sm" placeholder="Value">
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-sm btn-danger delete-attribute-form" onclick="deleteAttribute(this);"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <?php
}
if ($_smarty_tpl->tpl_vars['attribute']->do_else) {
?>
                        <div class="row attributeform">
                            <div class="col-lg-4">
                                <input type="text" name="attrnames[]" value="" class="form-control input-sm" placeholder="Name">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="attrvalues[]" value="" class="form-control input-sm" placeholder="Value">
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-sm btn-danger delete-attribute-form" onclick="deleteAttribute(this);"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <div class="clear-line-20"></div>
                    <div class="alert alert-warning">
                    <small class="help-block">Use this section to define additional attributes for example <code> data-itemid="120" </code> or <code> id="menuitemid" </code>, this attributes will be added to <code>&lt;a&gt;</code>.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-lg-offset-1">
        <div class="panel-group" id="extraoptions" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingInformation">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#extraoptions" href="#information" aria-expanded="true" aria-controls="information">
                            Information
                        </a>
                    </h4>
                </div>
                <div id="information" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingInformation">
                    <div class="panel-body">
                        <small><b>Created:</b> <?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['datecreate'];?>
</small>
                        <small><b>Updated:</b> <?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['datemodify'];?>
</small>
                        <small><b>Translations:</b> <?php echo $_smarty_tpl->tpl_vars['totaltranslations']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['totallanguages']->value;?>
)</small>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTargetWindow">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#extraoptions" href="#targetwindow" aria-expanded="true" aria-controls="targetwindow">
                            Target Window
                        </a>
                    </h4>
                </div>
                <div id="targetwindow" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTargetWindow">
                    <div class="panel-body">
                        <small class="help-block">When someone click on that item URL, it will:</small>
                        <label class="label-radio">
                            <input type="radio" name="targetwindow" value="_self"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['targetwindow'] == '_self') {?> checked<?php }?>>
                            <span>Open in the same Tab/Window</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="targetwindow" value="_blank"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['targetwindow'] == '_blank') {?> checked<?php }?>>
                            <span>Open in new Tab/Window</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingBadge">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#extraoptions" href="#badge" aria-expanded="true" aria-controls="badge">
                            Badge
                        </a>
                    </h4>
                </div>
                <div id="badge" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBadge">
                    <div class="panel-body">
                        <small class="help-block">You can show the number of Unpaid invoices as an example to draw attention:</small>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="totalservices"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'totalservices') {?> checked<?php }?>>
                            <span>Total Products/Services</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="activeservices"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'activeservices') {?> checked<?php }?>>
                            <span>Active Products/Services</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="totaldomains"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'totaldomains') {?> checked<?php }?>>
                            <span>Total Domains</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="activedomains"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'activedomains') {?> checked<?php }?>>
                            <span>Active Domains</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="dueinvoices"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'dueinvoices') {?> checked<?php }?>>
                            <span>Due Invoices</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="overdueinvoices"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'overdueinvoices') {?> checked<?php }?>>
                            <span>Overdue Invoices</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="activetickets"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'activetickets') {?> checked<?php }?>>
                            <span>Active Tickets</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="creditbalance"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'creditbalance') {?> checked<?php }?>>
                            <span>Credit Balance</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="shoppingcartitems"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'shoppingcartitems') {?> checked<?php }?>>
                            <span>Shopping Cart Items</span>
                        </label>
                        <label class="label-radio">
                            <input type="radio" name="badge" value="none"<?php if ($_smarty_tpl->tpl_vars['iteminfo']->value['badge'] == 'none') {?> checked<?php }?>>
                            <span>None</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingCSS">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#extraoptions" href="#css" aria-expanded="true" aria-controls="css">
                            CSS
                        </a>
                    </h4>
                </div>
                <div id="css" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCSS">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="css_class">Class</label>
                            <input type="text" name="css_class" id="css_class" value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['css_class'];?>
" placeholder="Specify class name(s).." class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label for="css_id">ID</label>
                            <input type="text" name="css_id" id="css_id" value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['css_id'];?>
" placeholder="Specify ID for this menu item.." class="form-control input-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingIcon">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#extraoptions" href="#icon" aria-expanded="true" aria-controls="icon">
                            Icon
                        </a>
                    </h4>
                </div>
                <div id="icon" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingIcon">
                    <div class="panel-body">
                        <small class="help-block">You can specify Icon class name here to be displayed in this item</small>
                        <input type="text" name="css_icon" id="css_icon" value="<?php echo $_smarty_tpl->tpl_vars['iteminfo']->value['css_icon'];?>
" class="form-control input-sm" placeholder="ex: fa fa-times">
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group btn-group-sm btn-group-two" role="group" aria-label="...">
            <button type="submit" name="save" value="save" class="btn btn-info">Save</button>
            <button type="submit" name="close" value="close" class="btn btn-primary">Save & Close</button>
        </div>
    </div>
</div>
</form>

<div id="attributesformsyntax" style="display:none;">
    <div class="row attributeform">
        <div class="col-lg-4">
            <input type="text" name="attrnames[]" class="form-control input-sm" placeholder="Name">
        </div>
        <div class="col-lg-4">
            <input type="text" name="attrvalues[]" class="form-control input-sm" placeholder="Value">
        </div>
        <div class="col-lg-1">
            <button type="button" class="btn btn-sm btn-danger delete-attribute-form" onclick="deleteAttribute(this);"><i class="fa fa-times"></i></button>
        </div>
    </div>
</div><?php }
}
