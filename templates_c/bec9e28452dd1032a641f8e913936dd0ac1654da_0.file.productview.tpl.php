<?php
/* Smarty version 3.1.48, created on 2025-05-31 04:15:47
  from '/home/zenexcloud/public_html/modules/servers/spanel/templates/productview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a827310dab8_38988463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bec9e28452dd1032a641f8e913936dd0ac1654da' => 
    array (
      0 => '/home/zenexcloud/public_html/modules/servers/spanel/templates/productview.tpl',
      1 => 1737488800,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a827310dab8_38988463 (Smarty_Internal_Template $_smarty_tpl) {
?><link href="modules/servers/spanel/templates/assets/icons-font.css" rel="stylesheet" />
<link href="modules/servers/spanel/templates/assets/style.css" rel="stylesheet" />

<div id="spanelhome">

	<div class="row">

		<?php if ($_smarty_tpl->tpl_vars['error']->value || $_smarty_tpl->tpl_vars['suspendreason']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger text-center" role="alert">
				<?php if ($_smarty_tpl->tpl_vars['suspendreason']->value) {?>
					<?php echo $_smarty_tpl->tpl_vars['spanel']->value->translate('suspendstatustext',$_smarty_tpl->tpl_vars['suspendreason']->value);?>

				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
					<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<br/>
				<?php }?>
			</div>
		</div>
		<?php }?>

		<div class="col-md-<?php if ($_smarty_tpl->tpl_vars['showSpanel']->value) {?>8<?php } else { ?>12<?php }?>">

			<div class="panel panel-default card mb-3">

				<div class="panel-heading card-header">
					<h3 class="panel-title card-title m-0"><?php echo $_smarty_tpl->tpl_vars['spanel']->value->translate('servicetitle');?>
</h3>
				</div>
				<div class="panel-body card-body serviceinfo">
			
					<div class="col-md-12">
						<p><strong><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['product']->value;?>
</strong></p>
						<p><a href="http://<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
" target="_blank">www.<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
</a> ( <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 )&nbsp;
						<?php if ($_smarty_tpl->tpl_vars['domainId']->value) {?>
							<a href="clientarea.php?action=domaindetails&id=<?php echo $_smarty_tpl->tpl_vars['domainId']->value;?>
" class="btn btn-default btn-sm" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['managedomain'];?>
</a>
						<?php }?>
						</p>
					</div>

					<?php if ($_smarty_tpl->tpl_vars['dedicatedip']->value) {?>
					<div class="col-md-12">
						<p><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'IP address'),$_smarty_tpl ) );?>
</strong><br/>
						<?php echo $_smarty_tpl->tpl_vars['dedicatedip']->value;?>
</p>
					</div>
					<?php }?>

					<div class="col-md-12">
						<p><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderbillingcycle'];?>
</strong><br/>
						<?php if ($_smarty_tpl->tpl_vars['billingcycle']->value != $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'] && $_smarty_tpl->tpl_vars['billingcycle']->value != $_smarty_tpl->tpl_vars['LANG']->value['orderfree']) {?>
							<?php echo $_smarty_tpl->tpl_vars['spanel']->value->translate('billingcycletext',$_smarty_tpl->tpl_vars['recurringamount']->value,$_smarty_tpl->tpl_vars['billingcycle']->value,$_smarty_tpl->tpl_vars['paymentmethod']->value);?>

						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['billingcycle']->value;?>

						<?php }?>
						</p>
					</div>

					<div class="col-md-12">
						<p><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingnextduedate'];?>
</strong><br/>
						<?php echo $_smarty_tpl->tpl_vars['nextduedate']->value;?>

						<?php if ($_smarty_tpl->tpl_vars['renewfunctionality']->value) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['renewfunctionality']->value['link'];?>
" class="btn btn-default btn-sm"><?php echo $_smarty_tpl->tpl_vars['renewfunctionality']->value['text'];?>
</a>
						<?php }?>
						</p>
					</div>

					<?php if ($_smarty_tpl->tpl_vars['configurableoptions']->value) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configurableoptions']->value, 'configoption');
$_smarty_tpl->tpl_vars['configoption']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['configoption']->value) {
$_smarty_tpl->tpl_vars['configoption']->do_else = false;
?>
					<div class="col-md-12">
						<p><strong><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</strong><br/>
						<?php if ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 3) {
if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {
echo $_smarty_tpl->tpl_vars['LANG']->value['yes'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['no'];
}
} elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 4) {
echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];?>
 x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedoption'];
} else {
echo $_smarty_tpl->tpl_vars['configoption']->value['selectedoption'];
}?>
					</div>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'field');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
					<div class="col-md-12">
						<p><strong><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
</strong><br/>
						<?php if (empty($_smarty_tpl->tpl_vars['field']->value['value'])) {?>
							<?php echo $_smarty_tpl->tpl_vars['LANG']->value['blankCustomField'];?>

						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>

						<?php }?>
						</p>
					</div>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['availableAddonProducts']->value) {?>
					<div class="col-md-12">
						<p><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'addonsExtras'),$_smarty_tpl ) );?>
</strong><br/>

						<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/cart.php?a=add" class="form-inline">
							<input type="hidden" name="serviceid" value="<?php echo $_smarty_tpl->tpl_vars['serviceid']->value;?>
" />
							<select name="aid" class="form-control custom-select w-50 input-sm form-control-sm mr-2">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['availableAddonProducts']->value, 'addonName', false, 'addonId');
$_smarty_tpl->tpl_vars['addonName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['addonId']->value => $_smarty_tpl->tpl_vars['addonName']->value) {
$_smarty_tpl->tpl_vars['addonName']->do_else = false;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['addonId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['addonName']->value;?>
</option>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</select><br/><br/>
							<button type="submit" class="btn btn-default btn-sm mt-1">
								<i class="fas fa-shopping-cart"></i>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'purchaseActivate'),$_smarty_tpl ) );?>

							</button>
						</form>
						
						</p>
					</div>
					<?php }?>

				</div>
			</div>

			<?php if ($_smarty_tpl->tpl_vars['showSpanel']->value) {?>
			
			<div class="panel card panel-default mb-3">
				<div class="panel-heading card-header">
					<h3 class="panel-title card-title m-0">
						<?php if ($_smarty_tpl->tpl_vars['spanelbranding']->value == 'branded') {?>
							<?php echo $_smarty_tpl->tpl_vars['spanel']->value->translate('brandedactionstitle');?>

						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['spanel']->value->translate('unbrandedactionstitle');?>

						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['showSpanel']->value) {?>
							&nbsp;&nbsp;<a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['serviceid']->value;?>
&dosinglesignon=1<?php if (!$_smarty_tpl->tpl_vars['isspanelhosting']->value) {?>&adminlogin=1<?php }?>" class="btn btn-default btn-sm logintopanel" target="_blank">
								<?php if ($_smarty_tpl->tpl_vars['spanelbranding']->value == 'branded') {?><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgMjQyLjEzIDI0MC45MyI+CiAgPGRlZnM+CiAgICA8c3R5bGU+CiAgICAgIC5jbHMtMSB7CiAgICAgICAgZmlsbDogIzAzOWJlNTsKICAgICAgfQoKICAgICAgLmNscy0yIHsKICAgICAgICBmaWxsOiAjMzk0ZTc1OwogICAgICB9CiAgICA8L3N0eWxlPgogIDwvZGVmcz4KICA8cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik0yMjYuNzUsOTAuNGwtMjMuMjgsOC41NGMtLjczLjI3LTEuMjcuOS0xLjQzLDEuNjYtMTIuMzIsNTguMDUtMzcuNDYsOTQuNjItNzYuNDIsMTExLjQtMS44OC45MS0zLjY4LDEuMzQtNS40OCwxLjM0LS42NiwwLTEuMzMtLjA2LTItLjE5LS40Mi0uMDgtLjg1LS4wNi0xLjI0LjA4bC03LjgyLDIuODgtMjEuMTYsNy42OGMtMS43OS42NS0yLjAzLDMuMDgtLjQxLDQuMDgsOS44OSw2LjA4LDIwLjY3LDEwLjYxLDMyLjE0LDEyLjkzbC41NS4xMi41NS0uMTRjMzQuOTEtOC4xOCw2Mi44Ny0zMS41Niw4My4xNS02OS40NSwxMS44NC0yMi4xNSwyMC43My00OS4yNywyNS44OC03OC40Mi4zLTEuNzItMS4zOS0zLjEyLTMuMDItMi41MloiLz4KICA8cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik02LjksNjEuNzZjMi4yMSwxNi4wMiw0LjU1LDM3LjQ1LDkuNzIsNTcuNDgsMi4yOCw4Ljc3LDQuMTMsMTUuMzYsNi40LDIyLC40MSwxLjIxLDEuNzMsMS44NSwyLjkzLDEuNDFsMjAuMS03LjMxYzEuMTctLjQzLDEuNzctMS43MSwxLjM1LTIuODktMS45My01LjQxLTMuMTUtOS40OS00Ljc3LTE1LjQyLTEuMzQtNC44My0yLjU1LTkuODUtMy42OC0xNS4wMi0uMjItMS4wNC0uNDUtMi4wNy0uNjUtMy4xMi0yLjAyLTkuODEtMy42OC0yMC4yLTQuOTgtMzEuMjVsLS4xNC0xLjIzYy0uNzQtNi44NS0uNzUtNi45OSw1LjI0LTkuMjgsOC4zMS0zLjE1LDkwLjMxLTM0LjQ1LDExMi43MS00MywxLjk2LS43NSwxLjk0LTMuNTItLjAzLTQuMjVDMTM0LjY1LDMuODIsMTIzLjM0LDAsMTIwLjM1LDBjLTUuMTcsMC0zNC43NywxMS4yMy03Mi45NCwyNS45MS05LjE0LDMuNTMtMTcuMDUsNi41Ny0yMy4wMyw4LjgybC0xLjAzLjM4Yy0xNy41LDYuNTgtMTguMzQsNy44NS0xNi40NiwyNi40OCwwLC4wNiwwLC4xMiwwLC4xOFoiLz4KICA8cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik01NS4xMywxNTAuOWwxMjYuMDItNDQuMThjMS4yNC0uNDQsMi40Ny43LDIuMTMsMS45N2wtLjkyLDMuNDdjLTEuMjEsNS4zNi0yLjU4LDEwLjUyLTQuMDcsMTUuNjktLjYsMi4wNy0yLjE2LDMuNzUtNC4xOCw0LjUybC0xNDEuNTcsNTQuMjJjLTIuMzMuODktMy45OSwyLjk3LTQuMzgsNS40M2wtLjg2LDUuNTRjLS40NCwyLjgzLDIuMzQsNS4wNiw1LjAxLDQuMDJsMTI5LjIyLTUwLjJjMy4zNi0xLjI5LDYuMzgsMi40Nyw0LjQ0LDUuNTEtNS42MSw4LjcyLTExLjg5LDE2LjM3LTE4Ljg5LDIyLjk0LTQuMzYsNC4xLTkuNTIsNy4zLTE1LjE0LDkuMzlMOS4zMywyMzMuOThjLTQuOTYsMS44My0xMC4wNS0yLjM2LTkuMjQtNy41OGw0LjY0LTMwLDMuNy0yMy45NmMuMzktMi40NywyLjA3LTQuNTQsNC4zOS01LjQzbDQyLjE1LTE2LjA0LjE2LS4wNloiLz4KICA8cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik0yNDIuMDQsOWwtNy4zOSw0Ny43MmMtMS4wNCw2Ljg3LTUuNzMsMTIuNjMtMTIuMjUsMTUuMDdsLTEzLjg4LDUuMjEtMTQyLjIsNTEuMTdjLTIuMDYuNzQtNC4zMi0uMzYtNC45OS0yLjQ0LTEuMTYtMy42MS0yLjg3LTkuMDEtMy44Ny0xMi42Ny0uMTktLjY5LS4zOC0xLjM4LS41Ny0yLjA4LS41Mi0xLjk0LjUyLTMuOTUsMi40LTQuNjVsMTQ5Ljg2LTU1LjIyYzIuMzYtLjg4LDQuMDgtMi45Niw0LjQ2LTUuNDdsMS4wOS03Yy4zNy0yLjQ3LTIuMDUtNC40Ni00LjM4LTMuNTZMNTcuMzgsOTMuMDljLTIuMjQuODUtNC43Mi0uNTEtNS4xNy0yLjg3LTEuMDktNS43NS0yLjA3LTExLjctMi45My0xNy44Ni0uMjUtMS44Ljc5LTMuNTQsMi41LTQuMTdMMjMyLjc3LDEuNDRjNC45OC0xLjg1LDEwLjA5LDIuMzQsOS4yNyw3LjU3WiIvPgo8L3N2Zz4=" /><?php }
echo $_smarty_tpl->tpl_vars['spanel']->value->translate($_smarty_tpl->tpl_vars['logintospanellabel']->value);?>

							</a>&nbsp;
						<?php }?>
					</h3>
				</div>
				<div class="panel-body card-body">

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['spanelicons']->value, 'icon');
$_smarty_tpl->tpl_vars['icon']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['icon']->value) {
$_smarty_tpl->tpl_vars['icon']->do_else = false;
?>

						<div class="col-12 col-md-12 col-lg-6 px-2">
							<a href="clientarea.php?action=productdetails&amp;id=<?php echo $_smarty_tpl->tpl_vars['serviceid']->value;?>
&amp;dosinglesignon=1&amp;page=<?php echo $_smarty_tpl->tpl_vars['icon']->value['link'];?>
" target="_blank" class="justify-content-center justify-content-md-start align-items-center --sp-color-primary-2 fw-500 my-3 w-100 word-break-word menu-link text-capitalize " title="<?php echo $_smarty_tpl->tpl_vars['icon']->value['label'];?>
">
								<span class="icon squircle align-items-center justify-content-center me-lg-2 mb-2 mb-lg-0 <?php echo $_smarty_tpl->tpl_vars['icon']->value['color'];?>
">
									<span class="icon-sp-uh-<?php echo $_smarty_tpl->tpl_vars['icon']->value['icon'];?>
 --sp-color-greys-3 fs-3"></span>
								</span>
								<span class="text-lg-start mt-md-2 mt-lg-0 --sp-color-greys-3 ellipsis-lg menu-link-text"><?php echo $_smarty_tpl->tpl_vars['icon']->value['label'];?>
</span>
							</a>
						</div>

					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

				</div>
			</div>

			<?php }?>

		</div>

		<?php if ($_smarty_tpl->tpl_vars['showSpanel']->value) {?>

		<div class="col-md-4">

			<div class="panel card panel-default mb-3">
				<div class="panel-heading card-header">
					<h3 class="panel-title card-title m-0"><?php echo $_smarty_tpl->tpl_vars['spanel']->value->translate('usagestatstitle');?>
</h3>
				</div>
				<div class="panel-body card-body serviceinfo">

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usagestats']->value, 'usage');
$_smarty_tpl->tpl_vars['usage']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['usage']->value) {
$_smarty_tpl->tpl_vars['usage']->do_else = false;
?>
					<div class="col-md-12">
						<p><strong><?php echo $_smarty_tpl->tpl_vars['usage']->value['label'];?>
</strong><br/>
						
						<?php if ($_smarty_tpl->tpl_vars['usage']->value['usage'] !== false) {?>
							<?php echo $_smarty_tpl->tpl_vars['usage']->value['usage'];
echo $_smarty_tpl->tpl_vars['usage']->value['usage_sign'];?>
 / 
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['usage']->value['limit'] === false) {?>
							<?php echo $_smarty_tpl->tpl_vars['spanel']->value->translate('unlimitedtext');?>

						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['usage']->value['limit'];
echo $_smarty_tpl->tpl_vars['usage']->value['usage_sign'];?>

						<?php }?>
						
						</p>
						<?php if ($_smarty_tpl->tpl_vars['usage']->value['limit'] !== false && $_smarty_tpl->tpl_vars['usage']->value['limit'] != 0 && $_smarty_tpl->tpl_vars['usage']->value['usage'] !== false) {?>
							<div class="progress progress-lg my-2 border">
								<div class="progress-bar --sp-bg-success-2 <?php if ($_smarty_tpl->tpl_vars['usage']->value['percent'] >= 80 && $_smarty_tpl->tpl_vars['usage']->value['percent'] < 92) {?>--sp-bg-warning-2<?php }?> <?php if ($_smarty_tpl->tpl_vars['usage']->value['percent'] >= 92) {?>--sp-bg-danger-2<?php }?> fw-bold text-end px-2 rounded" style="width: <?php echo $_smarty_tpl->tpl_vars['usage']->value['percent'];?>
%;" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['usage']->value['percent'];?>
" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['usage']->value['percent'];?>
%"></div>
							</div>
						<?php }?>
					</div>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

				</div>
			</div>

		</div>

		<?php }?>


	</div>

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hookOutput']->value, 'output');
$_smarty_tpl->tpl_vars['output']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['output']->value) {
$_smarty_tpl->tpl_vars['output']->do_else = false;
?>
		<div>
			<?php echo $_smarty_tpl->tpl_vars['output']->value;?>

		</div>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</div><?php }
}
