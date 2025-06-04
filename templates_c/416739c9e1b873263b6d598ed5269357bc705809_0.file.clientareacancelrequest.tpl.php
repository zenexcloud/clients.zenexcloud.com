<?php
/* Smarty version 3.1.48, created on 2025-06-02 16:07:07
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/twenty-one/clientareacancelrequest.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683dcc2bd01645_88065905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '416739c9e1b873263b6d598ed5269357bc705809' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/twenty-one/clientareacancelrequest.tpl',
      1 => 1746641212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683dcc2bd01645_88065905 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['invalid']->value) {?>

    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancelinvalid'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_prefixVariable1,'textcenter'=>true), 0, true);
?>
    <p class="text-center">
        <a href="clientarea.php?action=productdetails&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareabacklink'),$_smarty_tpl ) );?>
</a>
    </p>

<?php } elseif ($_smarty_tpl->tpl_vars['requested']->value) {?>

    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancelconfirmation'),$_smarty_tpl ) );
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_prefixVariable2,'textcenter'=>true), 0, true);
?>

    <p class="text-center">
        <a href="clientarea.php?action=productdetails&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareabacklink'),$_smarty_tpl ) );?>
</a>
    </p>

<?php } else { ?>

    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancelreasonrequired'),$_smarty_tpl ) );
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>"<li>".$_prefixVariable3."</li>"), 0, true);
?>
    <?php }?>

    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancelproduct'),$_smarty_tpl ) );
$_prefixVariable4=ob_get_clean();
ob_start();
if ($_smarty_tpl->tpl_vars['domain']->value) {
echo " (";
echo (string)$_smarty_tpl->tpl_vars['domain']->value;
echo ")";
}
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'textcenter'=>true,'msg'=>$_prefixVariable4.": <strong>".((string)$_smarty_tpl->tpl_vars['groupname']->value)." - ".((string)$_smarty_tpl->tpl_vars['productname']->value)."</strong>".$_prefixVariable5), 0, true);
?>

    <div class="card">
        <div class="card-body">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="form-stacked">
                <input type="hidden" name="sub" value="submit" />

                <fieldset>
                    <div class="form-group">
                        <label for="cancellationreason"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancelreason'),$_smarty_tpl ) );?>
</label>
                    <textarea name="cancellationreason" id="cancellationreason" class="form-control fullwidth" rows="6"></textarea>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['domainid']->value) {?>
                        <div class="alert alert-warning">
                            <p><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancelrequestdomain'),$_smarty_tpl ) );?>
</strong></p>
                            <p><?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancelrequestdomaindesc'),$_smarty_tpl ) );
$_prefixVariable6=ob_get_clean();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_prefixVariable6,$_smarty_tpl->tpl_vars['domainnextduedate']->value,$_smarty_tpl->tpl_vars['domainprice']->value,$_smarty_tpl->tpl_vars['domainregperiod']->value ));?>
</p>
                            <label class="form-check text-center">
                                <input type="checkbox" class="form-check-input" name="canceldomain" id="canceldomain" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancelrequestdomainconfirm'),$_smarty_tpl ) );?>

                            </label>
                        </div>
                    <?php }?>

                    <div class="form-group text-center">
                        <label class="col-form-label" for="type"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancellationtype'),$_smarty_tpl ) );?>
</label>
                        <span class="d-inline-block">
                            <select name="type" id="type" class="form-control">
                                <option value="Immediate"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancellationimmediate'),$_smarty_tpl ) );?>
</option>
                                <option value="End of Billing Period"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancellationendofbillingperiod'),$_smarty_tpl ) );?>
</option>
                            </select>
                        </span>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-danger">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareacancelrequestbutton'),$_smarty_tpl ) );?>

                        </button>
                        <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancel'),$_smarty_tpl ) );?>
</a>
                    </div>
                </fieldset>

            </form>

        </div>
    </div>

<?php }
}
}
