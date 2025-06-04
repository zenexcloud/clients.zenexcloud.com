<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('cPanel Hosting');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('cpanel-hosting.php', 'cPanel Hosting');
$ca->initPage();
$ca->setTemplate('custom_file/cpanel-hosting');
$ca->assign("cloudx_theme_page",true);
$ca->output();