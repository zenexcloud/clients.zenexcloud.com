<?php
/* Smarty version 3.1.48, created on 2025-06-01 12:42:44
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/twenty-one/supportticketsubmit-confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683c4ac4c41829_71214040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b633ec2573a64665f80462989e7e7c69ded0bee0' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/twenty-one/supportticketsubmit-confirm.tpl',
      1 => 1746641212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683c4ac4c41829_71214040 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
    <div class="card-body extra-padding">

        <h3 class="card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"createNewSupportRequest"),$_smarty_tpl ) );?>
</h3>

        <div class="alert alert-success text-center">
            <strong>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsticketcreated'),$_smarty_tpl ) );?>

                <a id="ticket-number" href="viewticket.php?tid=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
&amp;c=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" class="alert-link">#<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
</a>
            </strong>
        </div>

        <div class="row">
            <div class="col-10 offset-1">
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsticketcreateddesc'),$_smarty_tpl ) );?>
</p>
            </div>
        </div>

        <br />

        <p class="text-center">
            <a href="viewticket.php?tid=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
&amp;c=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" class="btn btn-default">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'continue'),$_smarty_tpl ) );?>

                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </p>

    </div>
</div>
<?php }
}
