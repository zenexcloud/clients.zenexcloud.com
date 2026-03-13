<?php

if (!defined('WHMCS'))
	die('You cannot access this file directly.');

/** @var string $metricscubeHooks */
$metricscubeHooks = '../modules/addons/MetricsCube/hooks.php';
if (file_exists($metricscubeHooks)) {
	include_once($metricscubeHooks);
}

