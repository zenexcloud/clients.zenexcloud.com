<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:27:36
  from '/home/zenexcloud/public_html/modules/addons/menumanager/templates/menuitems.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683aa158a4c193_58578821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e80b2b751faf8cde1fdc05a6569ba528bc28616' => 
    array (
      0 => '/home/zenexcloud/public_html/modules/addons/menumanager/templates/menuitems.tpl',
      1 => 1748692982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683aa158a4c193_58578821 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'parsemenuchildren' => 
  array (
    'compiled_filepath' => '/home/zenexcloud/public_html/templates_c/528551793b453503517143ed6c1adef0^2e80b2b751faf8cde1fdc05a6569ba528bc28616_0.file.menuitems.tpl.php',
    'uid' => '2e80b2b751faf8cde1fdc05a6569ba528bc28616',
    'call_name' => 'smarty_template_function_parsemenuchildren_1073400001683aa158a30241_18836444',
  ),
));
?><div class="row">
    <div class="col-lg-10"><?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value;?>
</div>
    <div class="col-lg-2">
        <a href="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=additem&groupid=<?php echo $_smarty_tpl->tpl_vars['groupinfo']->value['id'];?>
" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i> New Menu Item</a>
    </div>
</div>

<div class="clear-line-20"></div>

<div class="row">
    <div class="col-lg-12">
        
        
        
                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'parsemenuchildren', array('menuitems'=>$_smarty_tpl->tpl_vars['items']->value,'menuid'=>"sortable-menu",'menuclass'=>"menu-items-list sortable"), true);?>

        
                <?php if ($_smarty_tpl->tpl_vars['countitems']->value == '0') {?>
        <p class="text-center">No Menu Items In This Group Created Yet.</p>
        <?php }?>
        
</div>
</div>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
<div id="DeleteItem_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="modal fade modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=deleteitem&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&groupid=<?php echo $_smarty_tpl->tpl_vars['item']->value['groupid'];?>
" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete "<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this item "<b><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</b>"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-danger">Delete Menu Item</button>
            </div>
            </form>
        </div>
    </div>
</div>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'level2');
$_smarty_tpl->tpl_vars['level2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['level2']->value) {
$_smarty_tpl->tpl_vars['level2']->do_else = false;
?>
    <div id="DeleteItem_<?php echo $_smarty_tpl->tpl_vars['level2']->value['id'];?>
" class="modal fade modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=deleteitem&id=<?php echo $_smarty_tpl->tpl_vars['level2']->value['id'];?>
&groupid=<?php echo $_smarty_tpl->tpl_vars['item']->value['groupid'];?>
" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete "<?php echo $_smarty_tpl->tpl_vars['level2']->value['title'];?>
"</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item "<b><?php echo $_smarty_tpl->tpl_vars['level2']->value['title'];?>
</b>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-danger">Delete Menu Item</button>
                </div>
                </form>
            </div>
        </div>
    </div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level2']->value['children'], 'level3');
$_smarty_tpl->tpl_vars['level3']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['level3']->value) {
$_smarty_tpl->tpl_vars['level3']->do_else = false;
?>
        <div id="DeleteItem_<?php echo $_smarty_tpl->tpl_vars['level3']->value['id'];?>
" class="modal fade modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=deleteitem&id=<?php echo $_smarty_tpl->tpl_vars['level3']->value['id'];?>
&groupid=<?php echo $_smarty_tpl->tpl_vars['item']->value['groupid'];?>
" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete "<?php echo $_smarty_tpl->tpl_vars['level3']->value['title'];?>
"</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this item "<b><?php echo $_smarty_tpl->tpl_vars['level3']->value['title'];?>
</b>"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-danger">Delete Menu Item</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level3']->value['children'], 'level4');
$_smarty_tpl->tpl_vars['level4']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['level4']->value) {
$_smarty_tpl->tpl_vars['level4']->do_else = false;
?>
            <div id="DeleteItem_<?php echo $_smarty_tpl->tpl_vars['level4']->value['id'];?>
" class="modal fade modal-delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=deleteitem&id=<?php echo $_smarty_tpl->tpl_vars['level4']->value['id'];?>
&groupid=<?php echo $_smarty_tpl->tpl_vars['item']->value['groupid'];?>
" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete "<?php echo $_smarty_tpl->tpl_vars['level4']->value['title'];?>
"</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this item "<b><?php echo $_smarty_tpl->tpl_vars['level4']->value['title'];?>
</b>"?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-danger">Delete Menu Item</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




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
/* smarty_template_function_parsemenuchildren_1073400001683aa158a30241_18836444 */
if (!function_exists('smarty_template_function_parsemenuchildren_1073400001683aa158a30241_18836444')) {
function smarty_template_function_parsemenuchildren_1073400001683aa158a30241_18836444(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('menuitems'=>$_smarty_tpl->tpl_vars['items']->value), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/zenexcloud/public_html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>

        <ol<?php if ($_smarty_tpl->tpl_vars['menuid']->value != '') {?> id="<?php echo $_smarty_tpl->tpl_vars['menuid']->value;?>
"<?php }
if ($_smarty_tpl->tpl_vars['menuclass']->value != '') {?> class="<?php echo $_smarty_tpl->tpl_vars['menuclass']->value;?>
"<?php }?>>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuitems']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <li id="list_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                <div class="menu-item">
                    <div class="text-left pull-left">
                        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</span>
                    </div>
                    <div class="row pull-right">
                        <div class="col-lg-9 text-left">
                            <span class="text-mute" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['fullurl'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['urltype'] != 'customurl') {?>../<?php }
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['fullurl'],60);?>

                            </span>
                        </div>
                        <div class="col-lg-1 text-center">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['accesslevel'] == '1') {?>
                            <span data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['accesslevelexplain'];?>
"><i class="fa fa-circle always-on"></i></span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['accesslevel'] == '0') {?>
                            <span data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['accesslevelexplain'];?>
"><i class="fa fa-circle always-off"></i></span>
                            <?php } else { ?>
                            <span data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['accesslevelexplain'];?>
"><i class="fa fa-circle condition-apply"></i></span>
                            <?php }?>
                        </div>
                        <div class="col-lg-2 text-center">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['modurl']->value;?>
&action=edititem&itemid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-sm btn-warning" title="Update Menu Item"><i class="fa fa-pencil"></i></a>
                            <a href="#DeleteItem_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-toggle="modal" class="btn btn-sm btn-danger" title="Delete Menu Item"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                
                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'parsemenuchildren', array('menuitems'=>$_smarty_tpl->tpl_vars['item']->value['children'],'menuid'=>'','menuclass'=>''), true);?>

            
            </li>            
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
        <?php
}}
/*/ smarty_template_function_parsemenuchildren_1073400001683aa158a30241_18836444 */
}
