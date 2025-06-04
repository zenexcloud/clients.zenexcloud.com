<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Wordpress Hosting');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('wordpress-hosting.php', 'Wordpress Hosting');
$ca->initPage();
$ca->setTemplate('custom_file/wordpress-hosting');
$ca->assign("cloudx_theme_page",true);
$ca->output();