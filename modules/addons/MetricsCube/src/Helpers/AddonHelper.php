<?php

namespace MetricsCube\Helpers;

use Exception;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Connection;
use WHMCS\Database\Capsule;
use function MCmsg;

/**
 * Class AddonHelper
 * @package MetricsCube\Helpers
 */
class AddonHelper
{
	public static function activateAddon()
	{
		$metricsCubePath = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'MetricsCube.php');
		if ($metricsCubePath && file_exists($metricsCubePath)) {
			$normalizedPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $metricsCubePath);
			$includedFiles = array_map('realpath', get_included_files());
			if (!in_array($normalizedPath, $includedFiles, TRUE)) {
				include_once $normalizedPath;
			}
		} else {
			throw new Exception('MetricsCube.php not found at expected path: ' . __DIR__ . '/../../MetricsCube.php');
		}
		$response = call_user_func('MetricsCube_activate');
		if (!$response || is_array($response) && ($response["status"] == "success" || $response["status"] == "info")) {
			$addons = Capsule::table('tblconfiguration')->where('setting', 'ActiveAddonModules')->first();
			if (isset($addons->value)) {
				if (strpos($addons->value, 'MetricsCube') === FALSE) {
					if (strlen($addons->value) > 0) {
						Capsule::table('tblconfiguration')->where('setting', 'ActiveAddonModules')->update(['value' => $addons->value . ',MetricsCube']);
					} else {
						Capsule::table('tblconfiguration')->where('setting', 'ActiveAddonModules')->update(['value' => 'MetricsCube']);
					}
				}
			} else {
				Capsule::table('tblconfiguration')->insert(['setting' => 'ActiveAddonModules', 'value' => 'MetricsCube']);
			}
			$hooks = Capsule::table('tblconfiguration')->where('setting', 'AddonModulesHooks')->first();
			if (isset($hooks->value)) {
				if (strpos($hooks->value, 'MetricsCube') === FALSE) {
					if (strlen($hooks->value) > 0) {
						Capsule::table('tblconfiguration')->where('setting', 'AddonModulesHooks')->update(['value' => $addons->value . ',MetricsCube']);
					} else {
						Capsule::table('tblconfiguration')->where('setting', 'AddonModulesHooks')->update(['value' => 'MetricsCube']);
					}
				}
			} else {
				Capsule::table('tblconfiguration')->insert(['setting' => 'AddonModulesHooks', 'value' => 'MetricsCube']);
			}
			Capsule::table('tblconfiguration')->where('setting', 'MetricsCubeConnKey')->delete();
			Capsule::table('tblconfiguration')->where('setting', 'MetricsCubeSyncMethod')->delete();
			Capsule::table('tblconfiguration')->where('setting', 'MetricsCubeError')->delete();
			Capsule::table('tblconfiguration')->where('setting', 'MCLastSynchronizationTime')->delete();
			$groups = Capsule::table('tbladminroles')->get();
			$addonPerms = Capsule::table('tblconfiguration')->where('setting', 'AddonModulesPerms')->first();
			if (isset($addonPerms->value)) {
				$addonPerms = unserialize($addonPerms->value);
				foreach ($groups as $group) {
					if (!isset($addonPerms[$group->id])) {
						$addonPerms[$group->id] = [];
					}
					if (!isset($addonPerms[$group->id]['MetricsCube'])) {
						$addonPerms[$group->id]['MetricsCube'] = 'MetricsCube Connector';
					}
				}
				Capsule::table('tblconfiguration')->where('setting', 'AddonModulesPerms')->update(['value' => serialize($addonPerms)]);
			} else {
				$addonPerms = [];
				foreach ($groups as $group) {
					$addonPerms[$group->id] = [
						'MetricsCube' => 'MetricsCube Connector'
					];
				}
				Capsule::table('tblconfiguration')->insert(['setting' => 'AddonModulesPerms', 'value' => serialize($addonPerms)]);
			}
			$addonAccess = Capsule::table('tbladdonmodules')->where('setting', 'access')->where('module', 'MetricsCube')->first();
			$groupIds = [];
			foreach ($groups as $group) {
				$groupIds[] = $group->id;
			}
			if (isset($addonAccess->value)) {
				Capsule::table('tbladdonmodules')->where('setting', 'access')->where('module', 'MetricsCube')->update(['value' => implode(',', $groupIds)]);
			} else {
				Capsule::table('tbladdonmodules')->insert(['setting' => 'access', 'module' => 'MetricsCube', 'value' => implode(',', $groupIds)]);
			}
		}
	}

	public static function activateWidgets()
	{
	}

	public static function buildAddonPermissions()
	{
		$groups = Capsule::table('tbladminroles')->get();
		$addonPerms = Capsule::table('tblconfiguration')->where('setting', 'AddonModulesPerms')->first();
		if (isset($addonPerms->value)) {
			$addonPerms = unserialize($addonPerms->value);
			foreach ($groups as $group) {
				if (!isset($addonPerms[$group->id])) {
					$addonPerms[$group->id] = [];
				}
				if (!isset($addonPerms[$group->id]['MetricsCube'])) {
					$addonPerms[$group->id]['MetricsCube'] = 'MetricsCube Connector';
				}
			}
			Capsule::table('tblconfiguration')->where('setting', 'AddonModulesPerms')->update(['value' => serialize($addonPerms)]);
		} else {
			$addonPerms = [];
			foreach ($groups as $group) {
				$addonPerms[$group->id] = [
					'MetricsCube' => 'MetricsCube Connector'
				];
			}
			Capsule::table('tblconfiguration')->insert(['setting' => 'AddonModulesPerms', 'value' => serialize($addonPerms)]);
		}
		$addonAccess = Capsule::table('tbladdonmodules')->where('setting', 'access')->where('module', 'MetricsCube')->first();
		$groupIds = [];
		foreach ($groups as $group) {
			$groupIds[] = $group->id;
		}
		if (isset($addonAccess->value)) {
			Capsule::table('tbladdonmodules')->where('setting', 'access')->where('module', 'MetricsCube')->update(['value' => implode(',', $groupIds)]);
		} else {
			Capsule::table('tbladdonmodules')->insert(['setting' => 'access', 'module' => 'MetricsCube', 'value' => implode(',', $groupIds)]);
		}
	}

	/**
	 * @return string
	 */
	public static function getSystemUrl()
	{
		return $GLOBALS['CONFIG']['SystemURL'] ? $GLOBALS['CONFIG']['SystemURL'] : $_SERVER['HTTP_HOST'];
	}

	/**
	 * @throws Exception
	 */
	public static function initWHMCS()
	{
		$whmcsDir = self::dirname(__DIR__, 5);
		if (file_exists($whmcsDir . DIRECTORY_SEPARATOR . 'init.php')) {
			require_once($whmcsDir . DIRECTORY_SEPARATOR . 'init.php');
		} else {
			throw new Exception(sprintf(MCmsg()->error(9), $whmcsDir));
		}
	}

	/**
	 * @param     $path
	 * @param int $count
	 * @return string
	 */
	public static function dirname($path, $count = 1)
	{
		if ($count > 1) {
			return dirname(self::dirname($path, --$count));
		} else {
			return dirname($path);
		}
	}

	/**
	 * @return bool
	 */
	public static function isActive()
	{
		$count = Capsule::table(Configuration::$table)->where('setting', 'ActiveAddonModules')->where('value', 'like', '%MetricsCube%')->count();
		if ($count > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public static function registerAccount($params)
	{
		return Connection::send('/api/accounts/register', $params);
	}

	public static function setWidgetsOrder($adminid)
	{
		try {
			$widget = 'MetricsCube\Widgets\QuickStatistics';
			if (class_exists('\WHMCS\User\Admin')) {
				$admin = \WHMCS\User\Admin::find((int)$adminid);
				if ($admin && isset($admin->widgetOrder)) {
					$widgets = $admin->widgetOrder;
					$flipped = array_flip($widgets);
					if (isset($flipped[$widget])) {
						unset($flipped[$widget]);
					}
					$widgets = array_flip($flipped);
					array_unshift($widgets, $widget);
					$admin->widgetOrder = $widgets;
					$admin->save();
				}
			}
		} catch (Exception $exception) {

		}
	}

	/**
	 * @throws Exception
	 */
	public static function verifyRequirements()
	{
		if (!class_exists('WHMCS\Database\Capsule')) {
			throw new Exception(MCmsg()->error(1));
		}
		if (!extension_loaded('curl')) {
			throw new Exception(MCmsg()->error(2));
		}
	}

}
