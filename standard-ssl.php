<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Standard SSL');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('standard-ssl.php', 'Standard SSL');
$ca->initPage();
$ca->setTemplate('custom_file/standard-ssl');
$ca->assign("cloudx_theme_page",true);
$ca->output();