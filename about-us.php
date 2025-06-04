<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('About Us');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('about-us.php', 'About Us');
$ca->initPage();
$ca->setTemplate('custom_file/about-us');
$ca->assign("cloudx_theme_page",true);
$ca->output();