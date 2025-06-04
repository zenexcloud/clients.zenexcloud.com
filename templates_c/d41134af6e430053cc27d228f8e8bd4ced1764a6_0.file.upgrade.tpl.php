<?php
/* Smarty version 3.1.48, created on 2025-06-02 16:06:41
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/upgrade.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683dcc114b7899_47493828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd41134af6e430053cc27d228f8e8bd4ced1764a6' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/upgrade.tpl',
      1 => 1726856398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683dcc114b7899_47493828 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
    <div class="card-body product-upgrade-page">
        <?php if ($_smarty_tpl->tpl_vars['overdueinvoice']->value) {?>
            <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradeerroroverdueinvoice'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_prefixVariable1), 0, true);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['existingupgradeinvoice']->value) {?>
            <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradeexistingupgradeinvoice'),$_smarty_tpl ) );
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_prefixVariable2), 0, true);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['upgradenotavailable']->value) {?>
            <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradeNotPossible'),$_smarty_tpl ) );
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_prefixVariable3,'textcenter'=>true), 0, true);
?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['overdueinvoice']->value) {?>

            <p>
                <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareabacklink'),$_smarty_tpl ) );?>
</a>
            </p>

        <?php } elseif ($_smarty_tpl->tpl_vars['existingupgradeinvoice']->value) {?>

            <p>
                <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default btn-lg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareabacklink'),$_smarty_tpl ) );?>
</a>
                <a href="submitticket.php" class="btn btn-default btn-lg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'submitticketdescription'),$_smarty_tpl ) );?>
</a>
            </p>

        <?php } elseif ($_smarty_tpl->tpl_vars['upgradenotavailable']->value) {?>

            <p>
                <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default btn-lg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareabacklink'),$_smarty_tpl ) );?>
</a>
                <a href="submitticket.php" class="btn btn-default btn-lg"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'submitticketdescription'),$_smarty_tpl ) );?>
</a>
            </p>

        <?php } else { ?>

            <?php if ($_smarty_tpl->tpl_vars['type']->value == "package") {?>

                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradechoosepackage'),$_smarty_tpl ) );?>
</p>

                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradecurrentconfig'),$_smarty_tpl ) );?>
:<br/><strong><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['productname']->value;?>
</strong><?php if ($_smarty_tpl->tpl_vars['domain']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
)<?php }?></p>

                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradenewconfig'),$_smarty_tpl ) );?>
:</p>

                <table class="table table-striped">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upgradepackages']->value, 'upgradepackage');
$_smarty_tpl->tpl_vars['upgradepackage']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['upgradepackage']->value) {
$_smarty_tpl->tpl_vars['upgradepackage']->do_else = false;
?>
                        <tr>
                            <td>
                                <strong>
                                    <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['groupname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['name'];?>

                                </strong>
                                <br />
                                <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['description'];?>

                            </td>
                            <td width="300" class="text-center">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
                                    <input type="hidden" name="step" value="2">
                                    <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                    <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pid'];?>
">
                                    <div class="form-group">
                                        <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['type'] == "free") {?>
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderfree'),$_smarty_tpl ) );?>
<br />
                                            <input type="hidden" name="billingcycle" value="free">
                                        <?php } elseif ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['type'] == "onetime") {?>
                                            <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['onetime'];?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderpaymenttermonetime'),$_smarty_tpl ) );?>

                                            <input type="hidden" name="billingcycle" value="onetime">
                                        <?php } elseif ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['type'] == "recurring") {?>
                                            <select name="billingcycle" class="form-control custom-select">
                                                <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['monthly']) {?><option value="monthly"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['monthly'];?>
</option><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['quarterly']) {?><option value="quarterly"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['quarterly'];?>
</option><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['semiannually']) {?><option value="semiannually"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['semiannually'];?>
</option><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['annually']) {?><option value="annually"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['annually'];?>
</option><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['biennially']) {?><option value="biennially"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['biennially'];?>
</option><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['triennially']) {?><option value="triennially"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['triennially'];?>
</option><?php }?>
                                            </select>
                                        <?php }?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" id="btnUpgradeDowngradeChooseProduct">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradedowngradechooseproduct'),$_smarty_tpl ) );?>

                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>

            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "configoptions") {?>

                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradechooseconfigoptions'),$_smarty_tpl ) );?>
</p>

                <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value), 0, true);
?>
                <?php }?>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
                    <input type="hidden" name="step" value="2" />
                    <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradecurrentconfig'),$_smarty_tpl ) );?>
</th>
                            <th></th>
                            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradenewconfig'),$_smarty_tpl ) );?>
</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configoptions']->value, 'configoption');
$_smarty_tpl->tpl_vars['configoption']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['configoption']->value) {
$_smarty_tpl->tpl_vars['configoption']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 1 || $_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 2) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedname'];?>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 3) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'yes'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'no'),$_smarty_tpl ) );
}?>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 4) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];?>
 x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>

                                    <?php }?>
                                </td>
                                <td><i class="far fa-angle-double-right"></i></td>
                                <td>
                                    <div class="form-group">
                                        <?php if ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 1 || $_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 2) {?>
                                            <select name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" class="form-control custom-select">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configoption']->value['options'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['option']->value['selected'])) {?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
" selected><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'upgradenochange'),$_smarty_tpl ) );?>
</option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['nameonly'];?>
 <?php echo $_smarty_tpl->tpl_vars['option']->value['price'];?>
</option>
                                                    <?php }?>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 3) {?>
                                            <input type="checkbox" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" value="1"<?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {?> checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 4) {?>
                                            <div class="form-inline">
                                                <input type="text" class="form-control" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];?>
" size="5"><span class="pl-1"> x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>
</span>
                                            </div>
                                        <?php }?>
                                    </div>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>

                    <p class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'continue'),$_smarty_tpl ) );?>
 <i class="fas fa-arrow-right"></i>
                        </button>
                    </p>

                </form>
            <?php }?>
        <?php }?>
    </div>
</div><?php }
}
