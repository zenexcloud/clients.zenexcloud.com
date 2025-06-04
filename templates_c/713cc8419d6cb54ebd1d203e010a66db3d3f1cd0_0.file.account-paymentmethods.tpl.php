<?php
/* Smarty version 3.1.48, created on 2025-06-01 08:36:47
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/account-paymentmethods.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c111f1a86c5_92701817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '713cc8419d6cb54ebd1d203e010a66db3d3f1cd0' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/account-paymentmethods.tpl',
      1 => 1726854006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683c111f1a86c5_92701817 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="payment-methods-cloudx">
<?php if ($_smarty_tpl->tpl_vars['createSuccess']->value) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.addedSuccess'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>"<i class='fas fa-check fa-fw'></i> ".$_prefixVariable1), 0, true);
} elseif ($_smarty_tpl->tpl_vars['createFailed']->value) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.addFailed'),$_smarty_tpl ) );
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>"<i class='fas fa-times fa-fw'></i> ".$_prefixVariable2), 0, true);
} elseif ($_smarty_tpl->tpl_vars['saveSuccess']->value) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.updateSuccess'),$_smarty_tpl ) );
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>"<i class='fas fa-check fa-fw'></i> ".$_prefixVariable3), 0, true);
} elseif ($_smarty_tpl->tpl_vars['saveFailed']->value) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.saveFailed'),$_smarty_tpl ) );
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>"<i class='fas fa-check fa-fw'></i> ".$_prefixVariable4), 0, true);
} elseif ($_smarty_tpl->tpl_vars['setDefaultResult']->value === true) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.defaultUpdateSuccess'),$_smarty_tpl ) );
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>"<i class='fas fa-check fa-fw'></i> ".$_prefixVariable5), 0, true);
} elseif ($_smarty_tpl->tpl_vars['setDefaultResult']->value === false) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.defaultUpdateFailed'),$_smarty_tpl ) );
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>"<i class='fas fa-times fa-fw'></i> ".$_prefixVariable6), 0, true);
} elseif ($_smarty_tpl->tpl_vars['deleteResult']->value === true) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.deleteSuccess'),$_smarty_tpl ) );
$_prefixVariable7=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>"<i class='fas fa-check fa-fw'></i> ".$_prefixVariable7), 0, true);
} elseif ($_smarty_tpl->tpl_vars['deleteResult']->value === false) {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.deleteFailed'),$_smarty_tpl ) );
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>"<i class='fas fa-times fa-fw'></i> ".$_prefixVariable8), 0, true);
}?>

<div class="card">
    <div class="card-body">

        <h3 class="card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.title'),$_smarty_tpl ) );?>
</h3>
        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.intro'),$_smarty_tpl ) );?>
</p>

        <p>
            <?php if ($_smarty_tpl->tpl_vars['allowCreditCard']->value) {?>
                <a href="<?php echo routePath('account-paymentmethods-add');?>
" class="btn btn-primary" data-role="add-new-credit-card">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.addNewCC'),$_smarty_tpl ) );?>

                </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['allowBankDetails']->value) {?>
                <a href="<?php echo routePathWithQuery('account-paymentmethods-add',null,'type=bankacct');?>
" class="btn btn-default">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.addNewBank'),$_smarty_tpl ) );?>

                </a>
            <?php }?>
        </p>
		<div class="section-above-p-method">
			<table class="table table-striped" id="payMethodList">
				<tr>
					<th></th>
					<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.name'),$_smarty_tpl ) );?>
</th>
					<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.description'),$_smarty_tpl ) );?>
</th>
					<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.status'),$_smarty_tpl ) );?>
</th>
					<th colspan="2"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.actions'),$_smarty_tpl ) );?>
</th>
				</tr>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['client']->value->payMethods->validateGateways(), 'payMethod');
$_smarty_tpl->tpl_vars['payMethod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['payMethod']->value) {
$_smarty_tpl->tpl_vars['payMethod']->do_else = false;
?>
					<tr>
						<td>
							<i class="<?php echo $_smarty_tpl->tpl_vars['payMethod']->value->getFontAwesomeIcon();?>
"></i>
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['payMethod']->value->payment->getDisplayName();?>
</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['payMethod']->value->description) {?>
								<?php echo $_smarty_tpl->tpl_vars['payMethod']->value->description;?>

							<?php } else { ?>
								-
							<?php }?>
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['payMethod']->value->getStatus();
if ($_smarty_tpl->tpl_vars['payMethod']->value->isDefaultPayMethod()) {?> - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.default'),$_smarty_tpl ) );
}?></td>
						<td>
							<a href="<?php echo routePath('account-paymentmethods-setdefault',$_smarty_tpl->tpl_vars['payMethod']->value->id);?>
" class="btn btn-sm btn-default btn-set-default<?php if ($_smarty_tpl->tpl_vars['payMethod']->value->isDefaultPayMethod() || $_smarty_tpl->tpl_vars['payMethod']->value->isExpired()) {?> disabled<?php }?>">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.setAsDefault'),$_smarty_tpl ) );?>

							</a>
							<a href="<?php echo routePath('account-paymentmethods-view',$_smarty_tpl->tpl_vars['payMethod']->value->id);?>
" class="btn btn-sm btn-default<?php if ($_smarty_tpl->tpl_vars['payMethod']->value->getType() == 'RemoteBankAccount') {?> disabled<?php }?> btn-edit-cloudx" data-role="edit-payment-method">
								<i class="fas fa-pencil"></i>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.edit'),$_smarty_tpl ) );?>

							</a>
							<?php if ($_smarty_tpl->tpl_vars['allowDelete']->value) {?>
								<a href="<?php echo routePath('account-paymentmethods-delete',$_smarty_tpl->tpl_vars['payMethod']->value->id);?>
" class="btn btn-sm btn-default btn-delete">
									<i class="fas fa-trash"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.delete'),$_smarty_tpl ) );?>

								</a>
							<?php }?>
						</td>
					</tr>
				<?php
}
if ($_smarty_tpl->tpl_vars['payMethod']->do_else) {
?>
					<tr>
						<td colspan="6" align="center">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.noPaymentMethodsCreated'),$_smarty_tpl ) );?>

						</td>
					</tr>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</table>
		</div>
    </div>
</div>

<form method="post" action="" id="frmDeletePaymentMethod">
<div class="modal fade" id="modalPaymentMethodDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.areYouSure'),$_smarty_tpl ) );?>
</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'paymentMethods.deletePaymentMethodConfirm'),$_smarty_tpl ) );?>
</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'no'),$_smarty_tpl ) );?>
</button>
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'yes'),$_smarty_tpl ) );?>
</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
<form method="post" action="" id="frmSetDefaultPaymentMethod"></form>

<?php echo '<script'; ?>
>
    jQuery(document).ready(function() {
        jQuery('.btn-set-default').click(function(e) {
            e.preventDefault();
            jQuery('#frmSetDefaultPaymentMethod')
                .attr('action', jQuery(this).attr('href'))
                .submit();
        });
        jQuery('.btn-delete').click(function(e) {
            e.preventDefault();
            jQuery('#frmDeletePaymentMethod')
                .attr('action', jQuery(this).attr('href'));
            jQuery('#modalPaymentMethodDeleteConfirmation').modal('show');
        });
    });
<?php echo '</script'; ?>
>
<?php }
}
