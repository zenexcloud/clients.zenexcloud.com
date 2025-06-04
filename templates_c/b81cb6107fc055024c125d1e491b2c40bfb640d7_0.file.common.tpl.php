<?php
/* Smarty version 3.1.48, created on 2025-06-04 10:13:31
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/orderforms/cloudx_cart/common.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_68401c4b163fa0_47952240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b81cb6107fc055024c125d1e491b2c40bfb640d7' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/orderforms/cloudx_cart/common.tpl',
      1 => 1749023655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68401c4b163fa0_47952240 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'all.min.css'),$_smarty_tpl ) );?>
?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
" />
<?php $_block_plugin7 = isset($_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0] : null;
if (!is_callable(array($_block_plugin7, 'assetExists'))) {
throw new SmartyException('block tag \'assetExists\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('assetExists', array('file'=>"custom.css"));
$_block_repeat=true;
echo $_block_plugin7::assetExists(array('file'=>"custom.css"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['__assetPath__']->value;?>
?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
" />
<?php $_block_repeat=false;
echo $_block_plugin7::assetExists(array('file'=>"custom.css"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
$_block_plugin8 = isset($_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0] : null;
if (!is_callable(array($_block_plugin8, 'assetExists'))) {
throw new SmartyException('block tag \'assetExists\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('assetExists', array('file'=>"cloudx_cart.css"));
$_block_repeat=true;
echo $_block_plugin8::assetExists(array('file'=>"cloudx_cart.css"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['__assetPath__']->value;?>
" />
<?php $_block_repeat=false;
echo $_block_plugin8::assetExists(array('file'=>"cloudx_cart.css"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
$_block_plugin9 = isset($_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0] : null;
if (!is_callable(array($_block_plugin9, 'assetExists'))) {
throw new SmartyException('block tag \'assetExists\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('assetExists', array('file'=>"cloudx_cart_responsive.css"));
$_block_repeat=true;
echo $_block_plugin9::assetExists(array('file'=>"cloudx_cart_responsive.css"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['__assetPath__']->value;?>
" />
<?php $_block_repeat=false;
echo $_block_plugin9::assetExists(array('file'=>"cloudx_cart_responsive.css"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
if ($_smarty_tpl->tpl_vars['LANG']->value['locale'] == "ar_AR" || $_smarty_tpl->tpl_vars['LANG']->value['locale'] == "fa_IR" || $_smarty_tpl->tpl_vars['LANG']->value['locale'] == "he_IL") {?>
    <?php $_block_plugin10 = isset($_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0] : null;
if (!is_callable(array($_block_plugin10, 'assetExists'))) {
throw new SmartyException('block tag \'assetExists\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('assetExists', array('file'=>"rtl_cloudx_cart.css"));
$_block_repeat=true;
echo $_block_plugin10::assetExists(array('file'=>"rtl_cloudx_cart.css"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['__assetPath__']->value;?>
" rel="stylesheet" type="text/css">
    <?php $_block_repeat=false;
echo $_block_plugin10::assetExists(array('file'=>"rtl_cloudx_cart.css"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
    <?php $_block_plugin11 = isset($_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0] : null;
if (!is_callable(array($_block_plugin11, 'assetExists'))) {
throw new SmartyException('block tag \'assetExists\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('assetExists', array('file'=>"rtl_cloudx_cart_responsive.css"));
$_block_repeat=true;
echo $_block_plugin11::assetExists(array('file'=>"rtl_cloudx_cart_responsive.css"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['__assetPath__']->value;?>
" rel="stylesheet" type="text/css">
    <?php $_block_repeat=false;
echo $_block_plugin11::assetExists(array('file'=>"rtl_cloudx_cart_responsive.css"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
}
echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'scripts.min.js'),$_smarty_tpl ) );?>
?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'cloudx_cart.js'),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
><?php }
}
