<?php

defined('METRICSCUBE') ? null : define('METRICSCUBE', __DIR__);
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

if (!function_exists('MetricsCubeAutoLoad')) {
	function MetricsCubeAutoLoad($className)
	{
		if (strpos($className, 'MetricsCube') === FALSE) {
			return;
		}
		$class = preg_replace('/MetricsCube/', '', $className, 1);
		$filename = __DIR__ . DS . 'src' . DS . ltrim(str_replace('\\', '/', $class), '/') . '.php';
		if (file_exists($filename)) {
			include_once($filename);
			if (class_exists($className)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	spl_autoload_register('MetricsCubeAutoLoad');
}

if (!function_exists('MCmsg')) {

	function MCmsg()
	{
		return new \MetricsCube\Helpers\Messages();
	}
}

$vendors = __DIR__ . DS . 'vendor' . DS . 'autoload.php';
if (file_exists($vendors)) {
	include_once($vendors);
}