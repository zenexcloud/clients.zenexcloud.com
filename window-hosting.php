<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Window Hosting');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('window-hosting.php', 'Window Hosting');
$ca->initPage();
$ca->setTemplate('custom_file/window-hosting');
$ca->assign("cloudx_theme_page",true);
$ca->output();