<?php

namespace MetricsCube\View;

use MetricsCube\Helpers\AddonHelper;
use MetricsCube\Utils\URL;
use WHMCS\Database\Capsule;
use const DS;
use const METRICSCUBE;

class ViewHelper
{

	const MODULE_ADDON = METRICSCUBE;
	protected $whmcsUrl = FALSE;
	protected $module = self::MODULE_ADDON;

	public function __construct($module = null)
	{
		if (!empty($module)) {
			$this->module = $module;
		}
	}

	public function getAdminEmail()
	{
		$adminEmail = '';
		if (isset($_SESSION['adminid'])) {
			$admin = Capsule::table('tbladmins')->where('id', (int)$_SESSION['adminid'])->first();
			$adminEmail = $admin->email;
		}
		return $adminEmail;
	}

	public function img($filename)
	{
		return $this->getAssetsPath('img', $filename);
	}

	private function getAssetsPath($dir, $filename)
	{
		$relativePath = str_replace(ROOTDIR, '', $this->module);
		return $this->getWhmcsUrl() . $relativePath . DS . 'assets' . DS . $dir . DS . $filename;
	}

	protected function getWhmcsUrl()
	{
		if ($this->whmcsUrl == FALSE) {
			$this->whmcsUrl = AddonHelper::getSystemUrl();
		}
		return $this->whmcsUrl;
	}

	public function script($filename)
	{
		return $this->getAssetsPath('js', $filename);
	}

	public function style($filename)
	{
		return $this->getAssetsPath('css', $filename);
	}

	public function url($computed, array $params = [])
	{
		$exploded = explode('@', $computed);
		$params['module'] = 'MetricsCube';
		if (count($exploded) > 1) {
			$params['controller'] = $exploded[0];
			$params['action'] = $exploded[1];
		} else {
			$params['controller'] = $computed;
			$params['action'] = 'index';
		}
		return URL::generateWithParams($params, null, FALSE);
	}

}
