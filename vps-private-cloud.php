<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('VPS Private Cloud');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('vps-private-cloud.php', 'VPS Private Cloud');
$ca->initPage();
$ca->setTemplate('custom_file/vps-private-cloud');
$ca->assign("cloudx_theme_page",true);
$ca->output();