<!doctype html>
<html lang="en">
<head>
    <meta charset="{$charset}" />
    {if !empty($cloudx_theme_settings.fav_icon)}
        <link rel="shortcut icon" href="{$cloudx_theme_settings.fav_icon}" type="image/x-icon">
        <link rel="icon" href="{$cloudx_theme_settings.fav_icon}" type="image/x-icon">
    {else}
        <link rel="shortcut icon" href="{$WEB_ROOT}/templates/{$template}/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="{$WEB_ROOT}/templates/{$template}/images/favicon.ico" type="image/x-icon">
    {/if}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
		{if $kbarticle.title}{$kbarticle.title} - {/if}{$pagetitle} - {$companyname}
	</title>	
    {include file="$template/includes/head.tpl"}
    {$headoutput}
</head>
<body class="primary-bg-color body-cloudx {if $templatefile == 'clientregister'}cloudx-register-page{/if} {if $LANG.locale == 'ar_AR' || $LANG.locale == 'fa_IR' || $LANG.locale == 'he_IL'} body-rtl {/if} {if $cloudx_theme_settings.enable_sticky_header eq 'on'} sticky-header-body{/if}" data-phone-cc-input="{$phoneNumberInputStyle}">
    {if $captcha}{$captcha->getMarkup()}{/if}
    {$headeroutput}
    {if $loggedin}
        <div class="header-topbar">
            <div class="container-fluid">
                <div class="right-topbar-content">
                    <div class="input-group active-client" role="group">
                        <div class="input-group-prepend d-none d-md-inline">
                            <span class="input-group-text">{lang key='loggedInAs'}:</span>
                        </div>
                        <div class="btn-group">
                            <a href="{$WEB_ROOT}/clientarea.php?action=details" class="btn btn-active-client">
                                <span>
                                    {if $client.companyname}
                                        {$client.companyname}
                                    {else}
                                        {$client.fullName}
                                    {/if}
                                </span>
                            </a>
                            <a href="{routePath('user-accounts')}" class="btn" data-toggle="tooltip" data-placement="bottom" title="Switch Account">
                                <i class="fad fa-random"></i>
                            </a>
                            {if $adminMasqueradingAsClient || $adminLoggedIn}
                                <a href="{$WEB_ROOT}/logout.php?returntoadmin=1" class="btn btn-return-to-admin" data-toggle="tooltip" data-placement="bottom" title="{if $adminMasqueradingAsClient}{lang key='adminmasqueradingasclient'} {lang key='logoutandreturntoadminarea'}{else}{lang key='adminloggedin'} {lang key='returntoadminarea'}{/if}">
                                    <i class="fas fa-redo-alt"></i>
                                    <span class="d-none d-md-inline-block">{lang key="admin.returnToAdmin"}</span>
                                </a>
                            {/if}
                        </div>
                    </div>
                    <div class="notification-client-right">
                        <button type="button" class="btn" data-toggle="popover" id="accountNotifications" data-placement="bottom">
                            <img src="{$WEB_ROOT}/templates/{$template}/images/notification-bell.svg" class="notification-drop-area{if count($clientAlerts) > 0} have-notification{/if}">
                            {if count($clientAlerts) > 0}
                                <span class="notification-count">{count($clientAlerts)}</span>
                            {else}
                                <span class="notification-count">0</span>
                            {/if}
                        </button>
                        <div id="accountNotificationsContent" class="w-hidden">
                            <ul class="client-alerts">
                            {foreach $clientAlerts as $alert}
                                <li>
                                    <a href="{$alert->getLink()}">
                                        <i class="fas fa-fw fa-{if $alert->getSeverity() == 'danger'}exclamation-circle{elseif $alert->getSeverity() == 'warning'}exclamation-triangle{elseif $alert->getSeverity() == 'info'}info-circle{else}check-circle{/if}"></i>
                                        <div class="message">{$alert->getMessage()}</div>
                                    </a>
                                </li>
                            {foreachelse}
                                <li class="none">
                                    {lang key='notificationsnone'}
                                </li>
                            {/foreach}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/if}
    <header class="{if $cloudx_theme_settings.navigation_layout_theme eq 'top'} top-header-active-theme{else} side-header-menu-active-theme{/if} {if $cloudx_theme_settings.enable_sticky_header eq 'on'}sticky-header-enabled{/if}"  {if $cloudx_theme_settings.enable_sticky_header eq 'on'} id="header-top-sticky" {/if}>
        <div class="container">
            {if $cloudx_theme_settings.navigation_layout_theme eq 'top'}               
                <div class="top-nav-main-sec-header">
                    <div class="top-nav-mobile-toggle" onclick="toggleCloudxTopNav(this);">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div> 
                    <div class="nav-top-left-section">
                        <div class="nav-logo-section">
                            <a class="navbar-brand" href="{if $cloudx_theme_settings.header_logo_link neq ''}{$cloudx_theme_settings.header_logo_link}{else}{$systemurl}{/if}" {if $cloudx_theme_settings.header_logo_link_target eq 'on'}target="_blank"{/if}>
                                {if !empty($cloudx_theme_settings.header_logo)}
                                    <img src="{$cloudx_theme_settings.header_logo}" alt="{$companyname}" {if $cloudx_theme_settings.header_logo_height neq ''}height="{$cloudx_theme_settings.header_logo_height}"{/if} {if $cloudx_theme_settings.header_logo_width neq ''}width="{$cloudx_theme_settings.header_logo_width}" {/if}>
                                {else}
                                    <img src="{$WEB_ROOT}/templates/{$template}/images/Cloudxlogo.svg" alt="{$companyname}" {if $cloudx_theme_settings.header_logo_height neq ''}height="{$cloudx_theme_settings.header_logo_height}"{/if} {if $cloudx_theme_settings.header_logo_width neq ''}width="{$cloudx_theme_settings.header_logo_width}" {/if}>
                                {/if}
                            </a>
                        </div>
                        <div class="nav-primary-top-nav-section">
                            {include file="$template/includes/navbar.tpl" navbar=$primaryNavbar}
                            {if $languagechangeenabled && count($locales) > 1 || $currencies}
                                <ul class="view-currency-top-mobile-menu">
                                    <li class="lang-li-top-mobile">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                            <div class="d-inline-block align-middle">
                                                <div class="iti-flag {if $activeLocale.countryCode === '001'}us{else}{$activeLocale.countryCode|lower}{/if}"></div>
                                            </div>
                                            {$activeLocale.localisedName}
                                        </button>  
                                    </li>
                                </ul> 
                            {/if}
                        </div>
                    </div>
                    <div class="nav-top-right-section">
                        <ul class="right-sec-top-br">
                            <li class="single-side-rght">                                   
                                {if $languagechangeenabled && count($locales) > 1 || $currencies}
                                    <ul class="view-currency-top">
                                        <li class="lang-li-top">
                                            <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                                <div class="d-inline-block align-middle">
                                                    <div class="iti-flag {if $activeLocale.countryCode === '001'}us{else}{$activeLocale.countryCode|lower}{/if}"></div>
                                                </div>
                                                {$activeLocale.localisedName}
                                            </button>  
                                        </li>
                                    </ul> 
                                {/if}
                                {include file="$template/includes/navbar.tpl" navbar=$secondaryNavbar rightDrop=true}
                                <ul class="view-cart-top">
                                    <li class="nav-item ml-3">
                                        <a class="btn nav-link cart-btn" href="{$WEB_ROOT}/cart.php?a=view">
                                            <i class="far fa-shopping-cart fa-fw"></i>
                                            <span class="badge badge-info">{$cartitemcount}</span>
                                            <span class="sr-only">{lang key="carttitle"}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>                
            {else}
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="bar-brand" href="javascript:void(0);"><i class="fal fa-bars"></i></a>
                    <a class="navbar-brand" href="{if $cloudx_theme_settings.header_logo_link neq ''}{$cloudx_theme_settings.header_logo_link}{else}{$systemurl}{/if}" {if $cloudx_theme_settings.header_logo_link_target eq 'on'}target="_blank"{/if}>
                        {if !empty($cloudx_theme_settings.header_logo)}
                            <img src="{$cloudx_theme_settings.header_logo}" alt="{$companyname}" {if $cloudx_theme_settings.header_logo_height neq ''}height="{$cloudx_theme_settings.header_logo_height}"{/if} {if $cloudx_theme_settings.header_logo_width neq ''}width="{$cloudx_theme_settings.header_logo_width}" {/if}>
                        {else}
                            <img src="{$WEB_ROOT}/templates/{$template}/images/Cloudxlogo.svg" alt="{$companyname}" {if $cloudx_theme_settings.header_logo_height neq ''}height="{$cloudx_theme_settings.header_logo_height}"{/if} {if $cloudx_theme_settings.header_logo_width neq ''}width="{$cloudx_theme_settings.header_logo_width}" {/if}>
                        {/if}
                    </a>
                    <ul class="nav-cnts">
                        {if $cloudx_theme_settings.disable_header_phone_number neq 'on'}
                            <li class="navcntsbx">
                                <a href="{if $cloudx_theme_settings.phone neq ''}tel:+{$cloudx_theme_settings.country_code}{$cloudx_theme_settings.phone}{else}#{/if}">
                                    <h4><span>{$LANG.cloudxcallus}</span> {if $cloudx_theme_settings.phone neq ''}(+{$cloudx_theme_settings.country_code}) {$cloudx_theme_settings.phone}{else}{$LANG.cloudxHeaderphonenumber}{/if} </h4>
                                </a>
                            </li>
                        {/if}
                        {if $cloudx_theme_settings.disable_header_email neq 'on'}
                            <li class="navcntsbx">
                                <a href="mailto:{if $cloudx_theme_settings.email_address neq ''}{$cloudx_theme_settings.email_address}{else}{$cloudx_email_company}{/if}">
                                    <h4><span>{$LANG.cloudxmailus}</span> {if $cloudx_theme_settings.email_address neq ''}{$cloudx_theme_settings.email_address}{else}{$cloudx_email_company}{/if}</h4>
                                </a>
                            </li>
                        {/if}
                        <li><a href="{$WEB_ROOT}/cart.php?a=view" class="nav-btns"><img src="{$WEB_ROOT}/templates/{$template}/images/ic2.svg" alt=""><span class="badge badge-info">{$cartitemcount}</span></a></a></li>
                        {if $loggedin}
                            {include file="$template/includes/navbar.tpl" navbar=$secondaryNavbar rightDrop=true}
                        {else}
                            <li class="navact"><a href="{$WEB_ROOT}/clientarea.php" class="nav-btns"><img src="{$WEB_ROOT}/templates/{$template}/images/ic1.svg" alt=""></a></li>
                        {/if}
                    </ul>
                </nav>
            {/if}
        </div>
    </header>
    {if $cloudx_theme_settings.navigation_layout_theme neq 'top'}
        <aside class="sidebar side-menu-bar-cloudx">
            <a href="javascript:void(0);" class="close-btn"><i class="fal fa-times-circle"></i></a>
            {include file="$template/includes/navbar.tpl" navbar=$primaryNavbar}
            {if $languagechangeenabled && count($locales) > 1 || $currencies}
                <div class = "language-container">
                    <ul class="navbar-nav">
                        <li class="currency-lang-list">
                            <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                {$activeCurrency.prefix} {$activeCurrency.code}
                            </button>          
                            <button type="button" class="btn" data-toggle="modal" data-target="#modalChooseLanguage">
                                <div class="d-inline-block align-middle">
                                    <div class="iti-flag {if $activeLocale.countryCode === '001'}us{else}{$activeLocale.countryCode|lower}{/if}"></div>
                                </div>
                                {$activeLocale.localisedName}
                            </button>
                        </li>                       
                    </ul>
                </div>
            {/if}
        </aside>
    {/if}
	{if $templatefile != 'homepage'  && $templatefile != 'login'  && $templatefile != 'clientregister' && $templatefile != 'password-reset-container' && !$skipbreadcrumbBody}
		<nav class="master-breadcrumb {if $cloudx_theme_page}cloudx-page-breadcrumb{/if}" aria-label="breadcrumb">
			<div class="container">
				{include file="$template/includes/breadcrumb.tpl"}
			</div>
		</nav>
	{/if}
    {include file="$template/includes/network-issues-notifications.tpl"}
    {if !$cloudx_theme_page &&  $templatefile != 'homepage'}
        {include file="$template/includes/verifyemail.tpl"}
    {/if}
	{if $templatefile != 'homepage'}
    <section id="main-body" {if $templatefile != 'homepage' && $templatefile != 'login'  && $templatefile != 'clientregister' && $templatefile != 'contact' && $templatefile != 'password-reset-container'}class="body-background-cloudx {if $cloudx_theme_page}cloudx-custom-page-called{/if}{if $inShoppingCart} in_shopping_cart{/if} {$cloudx_market_connect} padd-40"{/if}>
        <div class="{if !$skipMainBodyContainer && !$cloudx_theme_page}container{else}body-container-skippped{/if}">
            <div class="{if !$skipMainBodyContainer && !$cloudx_theme_page}row{else}body-row-skippped{/if}">
            {if !$inShoppingCart && ($primarySidebar->hasChildren() || $secondarySidebar->hasChildren()) && $templatefile != 'clientregister'}
                <div class="col-lg-4 col-xl-3">
                    <div class="sidebar">
                        {include file="$template/includes/sidebar.tpl" sidebar=$primarySidebar}
                    </div>
                    {if !$inShoppingCart && $secondarySidebar->hasChildren()}
                        <div class="d-none d-lg-block sidebar">
                            {include file="$template/includes/sidebar.tpl" sidebar=$secondarySidebar}
                        </div>
                    {/if}
                </div>
            {/if}
            {if !$cloudx_theme_page}
            <div class="{if !$inShoppingCart && ($primarySidebar->hasChildren() || $secondarySidebar->hasChildren()) && $templatefile != 'clientregister' && $templatefile != 'password-reset-container'}col-lg-8 col-xl-9{else}{if !$skipMainBodyContainer}col-12{/if}{/if} primary-content">
            {/if}
	{/if}
			