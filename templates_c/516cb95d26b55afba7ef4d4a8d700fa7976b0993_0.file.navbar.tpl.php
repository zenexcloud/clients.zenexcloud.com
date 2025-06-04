<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:30:30
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/includes/navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683aa2068887d7_29738970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '516cb95d26b55afba7ef4d4a8d700fa7976b0993' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/includes/navbar.tpl',
      1 => 1726854018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683aa2068887d7_29738970 (Smarty_Internal_Template $_smarty_tpl) {
?><ul id="nav" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['navigation_layout_theme'] == 'top') {?> class="navbar-nav mr-auto top-bar-nav-active"<?php } else { ?>class="side-bar-nav-active"<?php }?>>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navbar']->value, 'item');
$_smarty_tpl->tpl_vars['item']->index = -1;
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['item']->index++;
$_smarty_tpl->tpl_vars['item']->first = !$_smarty_tpl->tpl_vars['item']->index;
$__foreach_item_5_saved = $_smarty_tpl->tpl_vars['item'];
?>
    <li menuItemName="<?php echo $_smarty_tpl->tpl_vars['item']->value->getName();?>
" class="d-block<?php if ($_smarty_tpl->tpl_vars['item']->first) {?> no-collapse<?php }
if ($_smarty_tpl->tpl_vars['item']->value->hasChildren()) {?> dropdown no-collapse<?php }
if ($_smarty_tpl->tpl_vars['item']->value->getClass()) {?> <?php echo $_smarty_tpl->tpl_vars['item']->value->getClass();
}?> <?php if ($_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['item']->value->getName()]['menu_class'] != '') {
echo $_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['item']->value->getName()]['menu_class'];
}?>" id="<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
">
        <a class="<?php if (!(isset($_smarty_tpl->tpl_vars['rightDrop']->value)) || !$_smarty_tpl->tpl_vars['rightDrop']->value) {?>pr-4<?php }
if ($_smarty_tpl->tpl_vars['item']->value->hasChildren()) {?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"<?php } else { ?>" href="<?php echo $_smarty_tpl->tpl_vars['item']->value->getUri();?>
"<?php }
if ($_smarty_tpl->tpl_vars['item']->value->getAttribute('target')) {?> target="<?php echo $_smarty_tpl->tpl_vars['item']->value->getAttribute('target');?>
"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['item']->value->hasIcon()) {?><i class="<?php echo $_smarty_tpl->tpl_vars['item']->value->getIcon();?>
"></i>&nbsp;<?php }?>
            <?php echo $_smarty_tpl->tpl_vars['item']->value->getLabel();?>

            <?php if ($_smarty_tpl->tpl_vars['item']->value->hasChildren()) {?><i class="fal fa-angle-down"></i><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value->hasBadge()) {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['item']->value->getBadge();?>
</span><?php }?>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['item']->value->hasChildren()) {?>
            <ul class="dropdown-menu<?php if ((isset($_smarty_tpl->tpl_vars['rightDrop']->value)) && $_smarty_tpl->tpl_vars['rightDrop']->value) {?> dropdown-menu-right<?php }?>">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value->getChildren(), 'childItem');
$_smarty_tpl->tpl_vars['childItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['childItem']->value) {
$_smarty_tpl->tpl_vars['childItem']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['childItem']->value->getClass() && in_array($_smarty_tpl->tpl_vars['childItem']->value->getClass(),array('dropdown-divider','nav-divider'))) {?>
                        <div class="dropdown-divider"></div>
                    <?php } else { ?>
                        <li menuItemName="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getName();?>
" class="<?php if ($_smarty_tpl->tpl_vars['childItem']->value->getClass()) {?> <?php echo $_smarty_tpl->tpl_vars['childItem']->value->getClass();
}?> <?php if ($_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['menu_class'] != '') {
echo $_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['menu_class'];
}?>" id="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getId();?>
">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getUri();?>
" class="dropdown-item px-2 py-0"<?php if ($_smarty_tpl->tpl_vars['childItem']->value->getAttribute('target')) {?> target="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getAttribute('target');?>
"<?php }?>>
                                <?php if ($_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['icon'] != '' && !(isset($_smarty_tpl->tpl_vars['rightDrop']->value)) && !$_smarty_tpl->tpl_vars['rightDrop']->value) {?>
                                    <div class="navigation-icons-theme">
                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['icon_type'] == '0') {?>
                                            <i class="<?php echo $_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['icon'];?>
"></i>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['icon_type'] == '1') {?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/menu_icon/<?php echo $_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['icon'];?>
"></i>
                                        <?php }?>
                                    </div>
                                <?php } else { ?>
                                    <?php if ($_smarty_tpl->tpl_vars['childItem']->value->hasIcon()) {?>
                                        <div class="navigation-icons-theme">
                                            <i class="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getIcon();?>
"></i>
                                        </div>
                                    <?php }?>
                                <?php }?>
                                <div class="navigation-label-theme">
                                    <span class="nav-bar-label"><?php echo $_smarty_tpl->tpl_vars['childItem']->value->getLabel();?>
</span>
                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['badge'] != '' && !(isset($_smarty_tpl->tpl_vars['rightDrop']->value)) && !$_smarty_tpl->tpl_vars['rightDrop']->value) {?>
                                        <span class="badge"><?php echo $_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['badge'];?>
</span>
                                    <?php } else { ?>
                                        <?php if ($_smarty_tpl->tpl_vars['childItem']->value->hasBadge()) {?><span class="badge"><?php echo $_smarty_tpl->tpl_vars['childItem']->value->getBadge();?>
</span><?php }?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['label_short_desc'] != '' && !(isset($_smarty_tpl->tpl_vars['rightDrop']->value)) && !$_smarty_tpl->tpl_vars['rightDrop']->value) {?>
                                        <p class="top-menu-short-desc-theme"><?php echo $_smarty_tpl->tpl_vars['cloudx_menu_extra_data']->value[$_smarty_tpl->tpl_vars['childItem']->value->getName()]['label_short_desc'];?>
</p>
                                    <?php }?>
                                </div>
                            </a>
                        </li>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        <?php }?>
    </li>
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!(isset($_smarty_tpl->tpl_vars['rightDrop']->value)) || !$_smarty_tpl->tpl_vars['rightDrop']->value) {?>
    <li class="d-none dropdown collapsable-dropdown">
        <a class="dropdown-toggle more-menu-nav" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'more'),$_smarty_tpl ) );?>
 <i class="fal fa-angle-down"></i>
        </a>
        <ul class="collapsable-dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenu"></ul>
    </li>
<?php }?>
</ul>


<?php }
}
