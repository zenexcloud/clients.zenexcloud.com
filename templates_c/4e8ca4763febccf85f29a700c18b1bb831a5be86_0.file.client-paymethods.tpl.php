<?php
/* Smarty version 3.1.48, created on 2025-05-29 10:53:10
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/admin/templates/blend/client-paymethods.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_68383c9657c9f5_00311280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e8ca4763febccf85f29a700c18b1bb831a5be86' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/admin/templates/blend/client-paymethods.tpl',
      1 => 1746641210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68383c9657c9f5_00311280 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    function reloadTablePayMethods() {
        WHMCS.http.jqClient.post(
            '<?php echo routePath('admin-client-paymethods-html-rows',$_smarty_tpl->tpl_vars['client']->value['id']);?>
',
            {
                token: csrfToken
            },
            function(data) {
                jQuery('#tablePayMethods').html(data.body);
            },
            'json'
    );
    }
<?php echo '</script'; ?>
>
<div class="clientssummarybox">
    <div class="title">Pay Methods</div>
    <table id="tablePayMethods" class="clientssummarystats" cellspacing="0" cellpadding="2">
        <?php echo $_smarty_tpl->tpl_vars['payMethodRows']->value;?>

    </table>
    <ul>
        <?php if ($_smarty_tpl->tpl_vars['addNewCardUrl']->value) {?>
            <li id="liAddCcPayMethod">
                <a id="btnAddCcPayMethod"
                   href="<?php echo $_smarty_tpl->tpl_vars['addNewCardUrl']->value;?>
"
                   data-modal-title="Add Pay Method - Credit Card"
                   data-btn-submit-id="btnSave"
                   data-btn-submit-label="Save"
                   onclick="return false;"
                   class="open-modal">
                    <img src="images/icons/add.png" border="0" align="absmiddle"/>
                    Add Credit Card
                </a>
            </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['addNewBankAccountUrl']->value) {?>
            <li id="liAddBankAccountPayMethod">
                <a id="btnAddBankAccountPayMethod"
                   href="<?php echo $_smarty_tpl->tpl_vars['addNewBankAccountUrl']->value;?>
"
                   data-modal-title="Add Pay Method - Bank Account"
                   data-btn-submit-id="btnSave"
                   data-btn-submit-label="Save"
                   onclick="return false;"
                   class="open-modal">
                    <img src="images/icons/add.png" border="0" align="absmiddle"/>
                    Add Bank Account
                </a>
            </li>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['addNewCardUrl']->value && !$_smarty_tpl->tpl_vars['addNewBankAccountUrl']->value) {?>
            <li>
                <a id="btnNoGateways"
                   role="button"
                   data-toggle="tooltip"
                   data-container="body"
                   data-placement="right auto"
                   data-trigger="hover"
                   class="disabled"
                   title="You must activate at least one merchant gateway before you can add a credit card. For local card storage without a payment gateway, use the Offline Credit Card gateway."
                >
                    <img src="images/icons/add.png" border="0" align="absmiddle"/>
                    Add Credit Card
                </a>
            </li>
        <?php }?>
    </ul>
</div>
<?php }
}
