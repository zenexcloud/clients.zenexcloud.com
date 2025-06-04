<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Plesk Hosting');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('plesk-hosting.php', 'Plesk Hosting');
$ca->initPage();
$ca->setTemplate('custom_file/plesk-hosting');
$ca->assign("cloudx_theme_page",true);
$ca->output();