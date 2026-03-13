<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

if (isset($_REQUEST['ajax'])) {
	return (new \MetricsCube\Controller\Admin\AJAXController())->renderOutput();
}


/**
 * @return array|mixed
 */
if (!function_exists('MetricsCube_config')) {
	function MetricsCube_config()
	{
		return MetricsCube\Actions\Config::config();
	}
}

/**
 * @return array
 * @throws Exception
 */
if (!function_exists('MetricsCube_activate')) {
	function MetricsCube_activate()
	{
		$migration = new \MetricsCube\Database\Migrator(__DIR__);
		$migration->runMigrationsUp();
		return \MetricsCube\Actions\Activate::activate();
	}
}
/**
 * @return array
 * @throws Exception
 */
if (!function_exists('MetricsCube_deactivate')) {
	function MetricsCube_deactivate()
	{
		$migration = new \MetricsCube\Database\Migrator(__DIR__);
		$migration->runMigrationsDown();
		return \MetricsCube\Actions\Deactivate::deactivate();
	}
}
/**
 * @param $params
 * @return mixed
 */
if (!function_exists('MetricsCube_output')) {
	function MetricsCube_output($params)
	{
		return \MetricsCube\Controller\Admin\MainController::render()->adminArea();
	}
}
/**
 * @param $params
 * @throws Exception
 */
if (!function_exists('MetricsCube_upgrade')) {
	function MetricsCube_upgrade($params)
	{
		$migration = new \MetricsCube\Database\Migrator(__DIR__);
		$migration->runMigrationsUp($params);
	}
}