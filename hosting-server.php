<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Hosting Server');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('hosting-server.php', 'Hosting Server');
$ca->initPage();
$ca->setTemplate('custom_file/hosting-server');
$ca->assign("cloudx_theme_page",true);
$ca->output();