<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Privacy Policy');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('privacy-notice.php', 'Privacy Policy');
$ca->initPage();
$ca->setTemplate('custom_file/privacy-notice');
$ca->assign("cloudx_theme_page",true);
$ca->output();