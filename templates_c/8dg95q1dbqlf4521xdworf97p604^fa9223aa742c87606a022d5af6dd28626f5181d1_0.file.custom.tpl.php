<?php
/* Smarty version 3.1.48, created on 2025-05-31 06:23:23
  from '/home/zenexcloud/public_html/modules/addons/menumanager/clientarea/custom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683aa05b315342_34313213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa9223aa742c87606a022d5af6dd28626f5181d1' => 
    array (
      0 => '/home/zenexcloud/public_html/modules/addons/menumanager/clientarea/custom.tpl',
      1 => 1748692982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683aa05b315342_34313213 (Smarty_Internal_Template $_smarty_tpl) {
?><ul<?php if ($_smarty_tpl->tpl_vars['group']->value['css_class']) {?> class="<?php echo $_smarty_tpl->tpl_vars['group']->value['css_class'];?>
"<?php }
if ($_smarty_tpl->tpl_vars['group']->value['css_id']) {?> id="<?php echo $_smarty_tpl->tpl_vars['group']->value['css_id'];?>
"<?php }?>>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <li<?php if ($_smarty_tpl->tpl_vars['item']->value['css_id']) {?> id="<?php echo $_smarty_tpl->tpl_vars['item']->value['css_id'];?>
"<?php }
if ($_smarty_tpl->tpl_vars['item']->value['css_class']) {?> class="<?php echo $_smarty_tpl->tpl_vars['item']->value['css_class'];?>
"<?php }?>>
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['fullurl'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['item']->value['targetwindow'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['attributes']) {?> <?php echo $_smarty_tpl->tpl_vars['item']->value['attributes'];
}?>>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['css_icon']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['item']->value['css_icon'];?>
"></i>&nbsp;<?php }?>
            <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

            <?php if ($_smarty_tpl->tpl_vars['item']->value['badge'] !== "none") {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['item']->value['badge'];?>
</span><?php }?>
        </a>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'level2');
$_smarty_tpl->tpl_vars['level2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['level2']->value) {
$_smarty_tpl->tpl_vars['level2']->do_else = false;
?>
            <li<?php if ($_smarty_tpl->tpl_vars['level2']->value['css_id']) {?> id="<?php echo $_smarty_tpl->tpl_vars['level2']->value['css_id'];?>
"<?php }
if ($_smarty_tpl->tpl_vars['level2']->value['css_class']) {?> class="<?php echo $_smarty_tpl->tpl_vars['level2']->value['css_class'];?>
"<?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['level2']->value['fullurl'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['level2']->value['targetwindow'];?>
"<?php if ($_smarty_tpl->tpl_vars['level2']->value['attributes']) {?> <?php echo $_smarty_tpl->tpl_vars['level2']->value['attributes'];
}?>>
                    <?php if ($_smarty_tpl->tpl_vars['level2']->value['css_icon']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['level2']->value['css_icon'];?>
"></i>&nbsp;<?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['level2']->value['title'];?>

                    <?php if ($_smarty_tpl->tpl_vars['level2']->value['badge'] !== "none") {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['level2']->value['badge'];?>
</span><?php }?>
                </a>
                                <?php if ($_smarty_tpl->tpl_vars['level2']->value['children']) {?>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level2']->value['children'], 'level3');
$_smarty_tpl->tpl_vars['level3']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['level3']->value) {
$_smarty_tpl->tpl_vars['level3']->do_else = false;
?>
                    <li<?php if ($_smarty_tpl->tpl_vars['level3']->value['css_id']) {?> id="<?php echo $_smarty_tpl->tpl_vars['level3']->value['css_id'];?>
"<?php }
if ($_smarty_tpl->tpl_vars['level3']->value['css_class']) {?> class="<?php echo $_smarty_tpl->tpl_vars['level3']->value['css_class'];?>
"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['level3']->value['fullurl'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['level3']->value['targetwindow'];?>
"<?php if ($_smarty_tpl->tpl_vars['level3']->value['attributes']) {?> <?php echo $_smarty_tpl->tpl_vars['level3']->value['attributes'];
}?>>
                            <?php if ($_smarty_tpl->tpl_vars['level3']->value['css_icon']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['level3']->value['css_icon'];?>
"></i>&nbsp;<?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['level3']->value['title'];?>

                            <?php if ($_smarty_tpl->tpl_vars['level3']->value['badge'] !== "none") {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['level3']->value['badge'];?>
</span><?php }?>
                        </a>
                                                <?php if ($_smarty_tpl->tpl_vars['level3']->value['children']) {?>
                        <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level3']->value['children'], 'level4');
$_smarty_tpl->tpl_vars['level4']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['level4']->value) {
$_smarty_tpl->tpl_vars['level4']->do_else = false;
?>
                            <li<?php if ($_smarty_tpl->tpl_vars['level4']->value['css_id']) {?> id="<?php echo $_smarty_tpl->tpl_vars['level4']->value['css_id'];?>
"<?php }
if ($_smarty_tpl->tpl_vars['level4']->value['css_class']) {?> class="<?php echo $_smarty_tpl->tpl_vars['level4']->value['css_class'];?>
"<?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['level4']->value['fullurl'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['level4']->value['targetwindow'];?>
"<?php if ($_smarty_tpl->tpl_vars['level4']->value['attributes']) {?> <?php echo $_smarty_tpl->tpl_vars['level4']->value['attributes'];
}?>>
                                    <?php if ($_smarty_tpl->tpl_vars['level4']->value['css_icon']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['level4']->value['css_icon'];?>
"></i>&nbsp;<?php }?>
                                    <?php echo $_smarty_tpl->tpl_vars['level4']->value['title'];?>

                                    <?php if ($_smarty_tpl->tpl_vars['level4']->value['badge'] !== "none") {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['level4']->value['badge'];?>
</span><?php }?>
                                </a>
                            </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                        <?php }?>
                    </li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
                <?php }?>
            </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <?php }?>
    </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul><?php }
}
