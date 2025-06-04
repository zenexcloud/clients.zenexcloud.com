<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Vps Servers');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('vps-servers.php', 'Vps Servers');
$ca->initPage();
$ca->setTemplate('custom_file/vps-servers');
$ca->assign("cloudx_theme_page",true);
$ca->output();