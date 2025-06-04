<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Terms & Conditions');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('tos.php', 'Terms & Conditions');
$ca->initPage();
$ca->setTemplate('custom_file/terms-of-use');
$ca->assign("cloudx_theme_page",true);
$ca->output();