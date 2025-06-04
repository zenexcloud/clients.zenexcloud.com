<?php
/* Smarty version 3.1.48, created on 2025-05-31 04:02:52
  from '/home/zenexcloud/public_html/templates/cloudx/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a7f6c6fb6f0_72579000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4699f6a78f965597e1f3ce62d7d0f79dc241c334' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/header.tpl',
      1 => 1736361118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a7f6c6fb6f0_72579000 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
" />
    <?php if (!empty($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['fav_icon'])) {?>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['fav_icon'];?>
" type="image/x-icon">
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['fav_icon'];?>
" type="image/x-icon">
    <?php } else { ?>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/favicon.ico" type="image/x-icon">
    <?php }?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
		<?php if ($_smarty_tpl->tpl_vars['kbarticle']->value['title']) {
echo $_smarty_tpl->tpl_vars['kbarticle']->value['title'];?>
 - <?php }
echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>

	</title>	
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php echo $_smarty_tpl->tpl_vars['headoutput']->value;?>

</head>
<body class="primary-bg-color body-cloudx <?php if ($_smarty_tpl->tpl_vars['templatefile']->value == 'clientregister') {?>cloudx-register-page<?php }?> <?php if ($_smarty_tpl->tpl_vars['LANG']->value['locale'] == 'ar_AR' || $_smarty_tpl->tpl_vars['LANG']->value['locale'] == 'fa_IR' || $_smarty_tpl->tpl_vars['LANG']->value['locale'] == 'he_IL') {?> body-rtl <?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['enable_sticky_header'] == 'on') {?> sticky-header-body<?php }?>" data-phone-cc-input="<?php echo $_smarty_tpl->tpl_vars['phoneNumberInputStyle']->value;?>
">
    <?php if ($_smarty_tpl->tpl_vars['captcha']->value) {
echo $_smarty_tpl->tpl_vars['captcha']->value->getMarkup();
}?>
    <?php echo $_smarty_tpl->tpl_vars['headeroutput']->value;?>

    <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
        <div class="header-topbar">
            <div class="container-fluid">
                <div class="right-topbar-content">
                    <div class="input-group active-client" role="group">
                        <div class="input-group-prepend d-none d-md-inline">
                            <span class="input-group-text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'loggedInAs'),$_smarty_tpl ) );?>
:</span>
                        </div>
                        <div class="btn-group">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/clientarea.php?action=details" class="btn btn-active-client">
                                <span>
                                    <?php if ($_smarty_tpl->tpl_vars['client']->value['companyname']) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['client']->value['companyname'];?>

                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['client']->value['fullName'];?>

                                    <?php }?>
                                </span>
                            </a>
                            <a href="<?php echo routePath('user-accounts');?>
" class="btn" data-toggle="tooltip" data-placement="bottom" title="Switch Account">
                                <i class="fad fa-random"></i>
                            </a>
                            <?php if ($_smarty_tpl->tpl_vars['adminMasqueradingAsClient']->value || $_smarty_tpl->tpl_vars['adminLoggedIn']->value) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/logout.php?returntoadmin=1" class="btn btn-return-to-admin" data-toggle="tooltip" data-placement="bottom" title="<?php if ($_smarty_tpl->tpl_vars['adminMasqueradingAsClient']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'adminmasqueradingasclient'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'logoutandreturntoadminarea'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'adminloggedin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'returntoadminarea'),$_smarty_tpl ) );
}?>">
                                    <i class="fas fa-redo-alt"></i>
                                    <span class="d-none d-md-inline-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"admin.returnToAdmin"),$_smarty_tpl ) );?>
</span>
                                </a>
                            <?php }?>
                        </div>
                    </div>
                    <div class="notification-client-right">
                        <button type="button" class="btn" data-toggle="popover" id="accountNotifications" data-placement="bottom">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/notification-bell.svg" class="notification-drop-area<?php if (count($_smarty_tpl->tpl_vars['clientAlerts']->value) > 0) {?> have-notification<?php }?>">
                            <?php if (count($_smarty_tpl->tpl_vars['clientAlerts']->value) > 0) {?>
                                <span class="notification-count"><?php echo count($_smarty_tpl->tpl_vars['clientAlerts']->value);?>
</span>
                            <?php } else { ?>
                                <span class="notification-count">0</span>
                            <?php }?>
                        </button>
                        <div id="accountNotificationsContent" class="w-hidden">
                            <ul class="client-alerts">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientAlerts']->value, 'alert');
$_smarty_tpl->tpl_vars['alert']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['alert']->value) {
$_smarty_tpl->tpl_vars['alert']->do_else = false;
?>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['alert']->value->getLink();?>
">
                                        <i class="fas fa-fw fa-<?php if ($_smarty_tpl->tpl_vars['alert']->value->getSeverity() == 'danger') {?>exclamation-circle<?php } elseif ($_smarty_tpl->tpl_vars['alert']->value->getSeverity() == 'warning') {?>exclamation-triangle<?php } elseif ($_smarty_tpl->tpl_vars['alert']->value->getSeverity() == 'info') {?>info-circle<?php } else { ?>check-circle<?php }?>"></i>
                                        <div class="message"><?php echo $_smarty_tpl->tpl_vars['alert']->value->getMessage();?>
</div>
                                    </a>
                                </li>
                            <?php
}
if ($_smarty_tpl->tpl_vars['alert']->do_else) {
?>
                                <li class="none">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'notificationsnone'),$_smarty_tpl ) );?>

                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <header class="<?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['navigation_layout_theme'] == 'top') {?> top-header-active-theme<?php } else { ?> side-header-menu-active-theme<?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['enable_sticky_header'] == 'on') {?>sticky-header-enabled<?php }?>"  <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['enable_sticky_header'] == 'on') {?> id="header-top-sticky" <?php }?>>
        <div class="container">
            <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['navigation_layout_theme'] == 'top') {?>               
                <div class="top-nav-main-sec-header">
                    <div class="top-nav-mobile-toggle" onclick="toggleCloudxTopNav(this);">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div> 
                    <div class="nav-top-left-section">
                        <div class="nav-logo-section">
                            <a class="navbar-brand" href="<?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_link'] != '') {
echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_link'];
} else {
echo $_smarty_tpl->tpl_vars['systemurl']->value;
}?>" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_link_target'] == 'on') {?>target="_blank"<?php }?>>
                                <?php if (!empty($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo'])) {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'] != '') {?>height="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'];?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'] != '') {?>width="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'];?>
" <?php }?>>
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/Cloudxlogo.svg" alt="<?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'] != '') {?>height="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'];?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'] != '') {?>width="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'];?>
" <?php }?>>
                                <?php }?>
                            </a>
                        </div>
                        <div class="nav-primary-top-nav-section">
                            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['primaryNavbar']->value), 0, true);
?>
                            <?php if ($_smarty_tpl->tpl_vars['languagechangeenabled']->value && count($_smarty_tpl->tpl_vars['locales']->value) > 1 || $_smarty_tpl->tpl_vars['currencies']->value) {?>
                                <ul class="view-currency-top-mobile-menu">
                                    <li class="currency-li-top-mobile">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                            <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['code'];?>

                                        </button>
                                    </li>
                                    <li class="lang-li-top-mobile">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                            <div class="d-inline-block align-middle">
                                                <div class="iti-flag <?php if ($_smarty_tpl->tpl_vars['activeLocale']->value['countryCode'] === '001') {?>us<?php } else {
echo mb_strtolower($_smarty_tpl->tpl_vars['activeLocale']->value['countryCode'], 'UTF-8');
}?>"></div>
                                            </div>
                                            <?php echo $_smarty_tpl->tpl_vars['activeLocale']->value['localisedName'];?>

                                        </button>  
                                    </li>
                                </ul> 
                            <?php }?>
                        </div>
                    </div>
                    <div class="nav-top-right-section">
                        <ul class="right-sec-top-br">
                            <li class="single-side-rght">                                   
                                <?php if ($_smarty_tpl->tpl_vars['languagechangeenabled']->value && count($_smarty_tpl->tpl_vars['locales']->value) > 1 || $_smarty_tpl->tpl_vars['currencies']->value) {?>
                                    <ul class="view-currency-top">
                                        <li class="currency-li-top">
                                            <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                                <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['code'];?>

                                            </button>
                                        </li>
                                        <li class="lang-li-top">
                                            <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                                <div class="d-inline-block align-middle">
                                                    <div class="iti-flag <?php if ($_smarty_tpl->tpl_vars['activeLocale']->value['countryCode'] === '001') {?>us<?php } else {
echo mb_strtolower($_smarty_tpl->tpl_vars['activeLocale']->value['countryCode'], 'UTF-8');
}?>"></div>
                                                </div>
                                                <?php echo $_smarty_tpl->tpl_vars['activeLocale']->value['localisedName'];?>

                                            </button>  
                                        </li>
                                    </ul> 
                                <?php }?>
                                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['secondaryNavbar']->value,'rightDrop'=>true), 0, true);
?>
                                <ul class="view-cart-top">
                                    <li class="nav-item ml-3">
                                        <a class="btn nav-link cart-btn" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/cart.php?a=view">
                                            <i class="far fa-shopping-cart fa-fw"></i>
                                            <span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['cartitemcount']->value;?>
</span>
                                            <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"carttitle"),$_smarty_tpl ) );?>
</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>                
            <?php } else { ?>
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="bar-brand" href="javascript:void(0);"><i class="fal fa-bars"></i></a>
                    <a class="navbar-brand" href="<?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_link'] != '') {
echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_link'];
} else {
echo $_smarty_tpl->tpl_vars['systemurl']->value;
}?>" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_link_target'] == 'on') {?>target="_blank"<?php }?>>
                        <?php if (!empty($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo'])) {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'] != '') {?>height="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'];?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'] != '') {?>width="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'];?>
" <?php }?>>
                        <?php } else { ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/Cloudxlogo.svg" alt="<?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'] != '') {?>height="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_height'];?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'] != '') {?>width="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['header_logo_width'];?>
" <?php }?>>
                        <?php }?>
                    </a>
                    <ul class="nav-cnts">
                        <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['disable_header_phone_number'] != 'on') {?>
                            <li class="navcntsbx">
                                <a href="<?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['phone'] != '') {?>tel:+<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['country_code'];
echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['phone'];
} else { ?>#<?php }?>">
                                    <h4><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxcallus'];?>
</span> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['phone'] != '') {?>(+<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['country_code'];?>
) <?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['phone'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxHeaderphonenumber'];
}?> </h4>
                                </a>
                            </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['disable_header_email'] != 'on') {?>
                            <li class="navcntsbx">
                                <a href="mailto:<?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['email_address'] != '') {
echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['email_address'];
} else {
echo $_smarty_tpl->tpl_vars['cloudx_email_company']->value;
}?>">
                                    <h4><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxmailus'];?>
</span> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['email_address'] != '') {
echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['email_address'];
} else {
echo $_smarty_tpl->tpl_vars['cloudx_email_company']->value;
}?></h4>
                                </a>
                            </li>
                        <?php }?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/cart.php?a=view" class="nav-btns"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/ic2.svg" alt=""><span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['cartitemcount']->value;?>
</span></a></a></li>
                        <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
                            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['secondaryNavbar']->value,'rightDrop'=>true), 0, true);
?>
                        <?php } else { ?>
                            <li class="navact"><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/clientarea.php" class="nav-btns"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/ic1.svg" alt=""></a></li>
                        <?php }?>
                    </ul>
                </nav>
            <?php }?>
        </div>
    </header>
    <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['navigation_layout_theme'] != 'top') {?>
        <aside class="sidebar side-menu-bar-cloudx">
            <a href="javascript:void(0);" class="close-btn"><i class="fal fa-times-circle"></i></a>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['primaryNavbar']->value), 0, true);
?>
            <?php if ($_smarty_tpl->tpl_vars['languagechangeenabled']->value && count($_smarty_tpl->tpl_vars['locales']->value) > 1 || $_smarty_tpl->tpl_vars['currencies']->value) {?>
                <div class = "language-container">
                    <ul class="navbar-nav">
                        <li class="currency-lang-list">
                            <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['code'];?>

                            </button>          
                            <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                <div class="d-inline-block align-middle">
                                    <div class="iti-flag <?php if ($_smarty_tpl->tpl_vars['activeLocale']->value['countryCode'] === '001') {?>us<?php } else {
echo mb_strtolower($_smarty_tpl->tpl_vars['activeLocale']->value['countryCode'], 'UTF-8');
}?>"></div>
                                </div>
                                <?php echo $_smarty_tpl->tpl_vars['activeLocale']->value['localisedName'];?>

                            </button>
                        </li>                       
                    </ul>
                </div>
            <?php }?>
        </aside>
    <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['templatefile']->value != 'homepage' && $_smarty_tpl->tpl_vars['templatefile']->value != 'login' && $_smarty_tpl->tpl_vars['templatefile']->value != 'clientregister' && $_smarty_tpl->tpl_vars['templatefile']->value != 'password-reset-container' && !$_smarty_tpl->tpl_vars['skipbreadcrumbBody']->value) {?>
		<nav class="master-breadcrumb <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_page']->value) {?>cloudx-page-breadcrumb<?php }?>" aria-label="breadcrumb">
			<div class="container">
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
			</div>
		</nav>
	<?php }?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/network-issues-notifications.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php if (!$_smarty_tpl->tpl_vars['cloudx_theme_page']->value && $_smarty_tpl->tpl_vars['templatefile']->value != 'homepage') {?>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/verifyemail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['templatefile']->value != 'homepage') {?>
    <section id="main-body" <?php if ($_smarty_tpl->tpl_vars['templatefile']->value != 'homepage' && $_smarty_tpl->tpl_vars['templatefile']->value != 'login' && $_smarty_tpl->tpl_vars['templatefile']->value != 'clientregister' && $_smarty_tpl->tpl_vars['templatefile']->value != 'contact' && $_smarty_tpl->tpl_vars['templatefile']->value != 'password-reset-container') {?>class="body-background-cloudx <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_page']->value) {?>cloudx-custom-page-called<?php }
if ($_smarty_tpl->tpl_vars['inShoppingCart']->value) {?> in_shopping_cart<?php }?> <?php echo $_smarty_tpl->tpl_vars['cloudx_market_connect']->value;?>
 padd-40"<?php }?>>
        <div class="<?php if (!$_smarty_tpl->tpl_vars['skipMainBodyContainer']->value && !$_smarty_tpl->tpl_vars['cloudx_theme_page']->value) {?>container<?php } else { ?>body-container-skippped<?php }?>">
            <div class="<?php if (!$_smarty_tpl->tpl_vars['skipMainBodyContainer']->value && !$_smarty_tpl->tpl_vars['cloudx_theme_page']->value) {?>row<?php } else { ?>body-row-skippped<?php }?>">
            <?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value && ($_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren() || $_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren()) && $_smarty_tpl->tpl_vars['templatefile']->value != 'clientregister') {?>
                <div class="col-lg-4 col-xl-3">
                    <div class="sidebar">
                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sidebar'=>$_smarty_tpl->tpl_vars['primarySidebar']->value), 0, true);
?>
                    </div>
                    <?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value && $_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren()) {?>
                        <div class="d-none d-lg-block sidebar">
                            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sidebar'=>$_smarty_tpl->tpl_vars['secondarySidebar']->value), 0, true);
?>
                        </div>
                    <?php }?>
                </div>
            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['cloudx_theme_page']->value) {?>
            <div class="<?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value && ($_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren() || $_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren()) && $_smarty_tpl->tpl_vars['templatefile']->value != 'clientregister' && $_smarty_tpl->tpl_vars['templatefile']->value != 'password-reset-container') {?>col-lg-8 col-xl-9<?php } else {
if (!$_smarty_tpl->tpl_vars['skipMainBodyContainer']->value) {?>col-12<?php }
}?> primary-content">
            <?php }?>
	<?php }?>
			<?php }
}
