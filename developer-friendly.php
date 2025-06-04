<?php
use WHMCS\ClientArea;
define('CLIENTAREA', true);
require __DIR__ . '/init.php';
$ca = new ClientArea();
$ca->setPageTitle('Developer Friendly');
$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('developer-friendly.php', 'Developer Friendly');
$ca->initPage();
$ca->setTemplate('custom_file/developer-friendly');
$ca->assign("cloudx_theme_page",true);
$ca->output();
