<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('sPanel Hosting');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('spanel-hosting.php', 'sPanel Hosting');
$ca->initPage();
$ca->setTemplate('custom_file/spanel-hosting');
$ca->assign("cloudx_theme_page",true);
$ca->output();