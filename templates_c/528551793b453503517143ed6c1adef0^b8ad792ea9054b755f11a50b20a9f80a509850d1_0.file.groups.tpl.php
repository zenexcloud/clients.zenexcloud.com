<?php
/* Smarty version 3.1.48, created on 2025-06-02 05:52:09
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/modules/addons/menumanager/templates/groups.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683d3c09293a97_50555198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8ad792ea9054b755f11a50b20a9f80a509850d1' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/modules/addons/menumanager/templates/groups.tpl',
      1 => 1748692982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683d3c09293a97_50555198 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-lg-10"><?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value;?>
</div>
    <div class="col-lg-2">
        <a href="#AddGroup" data-toggle="modal" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i> New Group</a>
    </div>
</div>

<div class="clear-line-20"></div>

<ul class="list-group menu-group-list">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-6 text-left"><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</div>
            <div class="col-lg-2 text-center">
                <?php if ($_smarty_tpl->tpl_vars['group']->value['isprimary'] == 1) {?>
                <div class="label label-success">PRIMARY</div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['group']->value['issecondary'] == 1) {?>
                <div class="label label-success">SECONDARY</div>
                <?php }?>
            </div>
            <div class="col-lg-2 text-center">
                <a href="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=listitems&groupid=<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" class="btn btn-sm btn-info">Manage Menu Items</a>
            </div>
            <div class="col-lg-2 text-center">
                <button type="button" data-toggle="modal" data-target="#IntegrationCode_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" class="btn btn-sm btn-info" title="Integration Code"><i class="fa fa-code"></i></button>
                <a href="#UpdateGroup_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" data-toggle="modal" class="btn btn-sm btn-warning" title="Update Group"><i class="fa fa-pencil"></i></a>
                <a href="#DeleteGroup_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" data-toggle="modal" class="btn btn-sm btn-danger" title="Delete Group"><i class="fa fa-times"></i></a>
            </div>
        </div>
    </li>
    <?php
}
if ($_smarty_tpl->tpl_vars['group']->do_else) {
?>
    <li class="list-group-item text-center">No Groups Created Yet</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?>
<div id="DeleteGroup_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" class="modal fade modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=deletegroup&id=<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete "<?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
"</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this group "<b><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</b>"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-danger">Delete Group</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?>
<div id="UpdateGroup_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" class="modal fade modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=updategroup&id=<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update "<?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
"</h4>
            </div>
            <div class="modal-body">
                <div class="menumanager-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#groupmain_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" aria-controls="groupmain_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" role="tab" data-toggle="tab">General</a>
                        </li>
                        <li role="presentation">
                            <a href="#groupadvanced_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" aria-controls="groupadvanced_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" role="tab" data-toggle="tab">Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="groupmain_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">
                            <div class="form-group">
                                <label for="name_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">Group Name</label>
                                <input type="text" name="name" id="name_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
" placeholder="Enter Group Name..." class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="template_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">Template</label>
                                <select name="template" id="template_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" class="form-control">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compatibletemplates']->value, 'comtemp');
$_smarty_tpl->tpl_vars['comtemp']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comtemp']->value) {
$_smarty_tpl->tpl_vars['comtemp']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['comtemp']->value['short'];?>
"<?php if ($_smarty_tpl->tpl_vars['group']->value['template'] == $_smarty_tpl->tpl_vars['comtemp']->value['short']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['comtemp']->value['name'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                                <small class="help-block">Choose "Default" if you can't see your template name on the list.</small>
                            </div>
                            <div class="form-group">
                                <label>Set this menu as:</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="setas" id="setas_none" value="none"<?php if ($_smarty_tpl->tpl_vars['group']->value['isprimary'] == 0 && $_smarty_tpl->tpl_vars['group']->value['issecondary'] == 0) {?> checked<?php }?>>
                                        None
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="setas" id="setas" value="primary"<?php if ($_smarty_tpl->tpl_vars['group']->value['isprimary'] == 1) {?> checked<?php }?>>
                                        Primary Navbar
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="setas" id="setas_secondary" value="secondary"<?php if ($_smarty_tpl->tpl_vars['group']->value['issecondary'] == 1) {?> checked<?php }?>>
                                        Secondary Navbar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="groupadvanced_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">
                            <div class="form-group">
                                <label for="css_class_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">Class</label>
                                <input type="text" name="css_class" id="css_class_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['css_class'];?>
" placeholder="Use space to separate multiple classes.." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="css_activeclass_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">Active Menu Item Class</label>
                                <input type="text" name="css_activeclass" id="css_activeclass_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['css_activeclass'];?>
" placeholder="used for current/active menu item, commonly 'active'" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="css_id_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">ID</label>
                                <input type="text" name="css_id" id="css_id_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['css_id'];?>
" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-warning">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<div id="AddGroup" class="modal fade modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=addgroup" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New Group</h4>
            </div>
            <div class="modal-body">
                <div class="menumanager-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#groupmain" aria-controls="groupmain" role="tab" data-toggle="tab">General</a>
                        </li>
                        <li role="presentation">
                            <a href="#groupadvanced" aria-controls="groupadvanced" role="tab" data-toggle="tab">Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="groupmain">
                            <div class="form-group">
                                <label for="name">Group Name</label>
                                <input type="text" name="name" id="name" value="" placeholder="Enter Group Name..." class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="template">Template</label>
                                <select name="template" id="template" class="form-control">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compatibletemplates']->value, 'comtemp');
$_smarty_tpl->tpl_vars['comtemp']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comtemp']->value) {
$_smarty_tpl->tpl_vars['comtemp']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['comtemp']->value['short'];?>
"><?php echo $_smarty_tpl->tpl_vars['comtemp']->value['name'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                                <small class="help-block">Choose "Default" if you can't see your template name on the list.</small>
                            </div>
                            <div class="form-group">
                                <label for="installdefault">Install Default Menu</label>
                                <select name="installdefault" id="installdefault" class="form-control">
                                    <option value="none">None</option>
                                    <option value="primary">Install WHMCS Primary Navbar</option>
                                    <option value="secondary">Install WHMCS Secondary Navbar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Set this menu as:</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="setas" id="setas_none" value="none" checked>
                                        None
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="setas" id="setas" value="primary">
                                        Primary Navbar
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="setas" id="setas_secondary" value="secondary">
                                        Secondary Navbar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="groupadvanced">
                            <div class="form-group">
                                <label for="css_class">Class</label>
                                <input type="text" name="css_class" id="css_class" value="" placeholder="Use space to separate multiple classes.." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="css_activeclass">Active Menu Item Class</label>
                                <input type="text" name="css_activeclass" id="css_activeclass" value="active" placeholder="used for current/active menu item, commonly 'active'" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="css_id">ID</label>
                                <input type="text" name="css_id" id="css_id" value="" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Add Group</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?>
<div id="IntegrationCode_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
" class="modal fade modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
's Integration Code</h4>
            </div>
            <div class="modal-body">
                <div class="help-block">Place the following code where you need this menu to be displayed.</div>
                <pre>{$menumanager_<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
}</pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
