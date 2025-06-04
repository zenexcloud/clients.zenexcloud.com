<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Microsoft 365 Business');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('microsoft-365-business.php', 'Microsoft 365 Business');
$ca->initPage();
$ca->setTemplate('custom_file/microsoft-365-business');
$ca->assign("cloudx_theme_page",true);
$ca->output();