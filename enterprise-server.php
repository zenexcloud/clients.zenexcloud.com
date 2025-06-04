<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Enterprise Servers');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('enterprise-server.php', 'Enterprise Servers');
$ca->initPage();
$ca->setTemplate('custom_file/enterprise-server');
$ca->assign("cloudx_theme_page",true);
$ca->output();