<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Email Security');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('email-security.php', 'Email Security');
$ca->initPage();
$ca->setTemplate('custom_file/email-security');
$ca->assign("cloudx_theme_page",true);
$ca->output();