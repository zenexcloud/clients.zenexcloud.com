<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:07:10
  from '/home/zenexcloud/public_html/templates/cloudx/supportticketsubmit-stepone.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a9c8e9932f8_11288920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '614520a93c85f5b7bae6b5a146615c65e8d81b38' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/supportticketsubmit-stepone.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a9c8e9932f8_11288920 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card sub-ticket">
    <div class="card-body extra-padding">
		<div class="row">
		<div class="w-100 mb-4">
            <h3 class="card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"createNewSupportRequest"),$_smarty_tpl ) );?>
</h3>
            <p class="text-muted mb-0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsheader'),$_smarty_tpl ) );?>
</p>
		</div>
		</div>
		<div class="row cs-ticket">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'department', false, 'num');
$_smarty_tpl->tpl_vars['department']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['department']->value) {
$_smarty_tpl->tpl_vars['department']->do_else = false;
?>
				<div class="col-md-4">
					<div class="ticket-div-cloudx">
						<div class="ticket-top-cont">
							<a href="<?php echo $_SERVER['PHP_SELF'];?>
?step=2&amp;deptid=<?php echo $_smarty_tpl->tpl_vars['department']->value['id'];?>
">
								<i class="fas fa-envelope"></i>
								<h5>&nbsp;<?php echo $_smarty_tpl->tpl_vars['department']->value['name'];?>
</h5>
							</a>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['department']->value['description']) {?>
							<p class="text-muted"><?php echo $_smarty_tpl->tpl_vars['department']->value['description'];?>
</p>
						<?php }?>
					</div>
				</div>
			<?php
}
if ($_smarty_tpl->tpl_vars['department']->do_else) {
?>
				<div class="col-sm-10 offset-sm-1">
					<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'nosupportdepartments'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_prefixVariable1,'textcenter'=>true), 0, true);
?>
				</div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
    </div>
</div>
<?php }
}
