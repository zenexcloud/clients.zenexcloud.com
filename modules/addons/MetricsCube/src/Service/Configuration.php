<?php

namespace MetricsCube\Service;

use MetricsCube\Actions\Config as AddonConfig;
use WHMCS\Database\Capsule;

/**
 * Class Configuration
 * @package MetricsCube\Service
 */
class Configuration
{
	/**
	 * @var string
	 */
	public static $table = 'tblconfiguration';

	/**
	 * @var string
	 */
	private static $prefix = 'MetricsCube';

	/**
	 * @var Configuration
	 */
	private static $_instance = null;

	/**
	 * @var array
	 */
	public $default = [
		'AppKey'                     => FALSE,
		'AppKeyFileChecked'          => FALSE,
		'LastSynchronizationTime'    => FALSE,
		'ConnKey'                    => FALSE,
		'SynchronizationTime'        => FALSE,
		'Token'                      => FALSE,
		'UserDetails'                => 'on',
		'UserTracking'               => 'on',
		'InstantDataSynchronization' => 'on',
		'EventToken'                 => FALSE,
		'FirstConfiguration'         => TRUE,
		'DebugMode'                  => FALSE,
		'Error'                      => FALSE,
		'EventsLimit'                => 100,
		'UserWidgetPopup'            => 'on',
		'UserTags'                   => 'on',
		'StatisticsWidget'           => 'on',
		'UserWidgetProfile'          => 'on',
		'UserWidgetServiceDetails'   => 'on',
		'MainMenuLink'               => 'on'
	];

	/**
	 * @var array
	 */
	private $config;

	/**
	 * Configuration constructor.
	 */
	private function __construct()
	{
		$this->load();
	}

	/**
	 *
	 */
	private function load()
	{
		foreach (Capsule::table(self::$table)->where('setting', 'like', self::$prefix . '%')->get() as $config) {
			$this->config[str_replace(self::$prefix, '', $config->setting)] = $config->value;
		}
		foreach ($this->default as $defaultKey => $defaultValue) {
			if (!isset($this->config[$defaultKey])) {
				$this->config[$defaultKey] = $defaultValue;
			}
		}
	}

	/**
	 * @return Configuration|null
	 */
	public function deleteAll()
	{
		Capsule::table(self::$table)->where('setting', 'like', self::$prefix . '%')->delete();
		$this->load();
		return self::$_instance;
	}

	/**
	 * @param string $config
	 * @return Configuration|null
	 */
	public function delete($config)
	{
		Capsule::table(self::$table)->where('setting', 'like', self::$prefix . $config)->delete();
		if (isset($this->config[$config])) {
			unset($this->config[$config]);
		}
		return self::$_instance;
	}

	/**
	 * @return Configuration|null
	 */
	public static function getInstance()
	{
		if (self::$_instance == null) {
			self::$_instance = new Self;
		}
		return self::$_instance;
	}

	/**
	 * @param string $config
	 * @param string $default
	 * @return mixed|string
	 */
	public function get($config = '', $default = null)
	{
		if (isset($this->config[$config])) {
			return $this->config[$config];
		}
		if (is_null($default)) {
			return isset($this->default[$config]) ? $this->default[$config] : '';
		} else {
			return $default;
		}
	}

	/**
	 * @return array
	 */
	public function all()
	{
		return $this->config;
	}

	/**
	 * @param string $config
	 * @param string $value
	 * @return Configuration|null
	 */
	public function set($config, $value)
	{
		$configRow = Capsule::table(self::$table)->where('setting', self::$prefix . $config)->first();
		if (isset($configRow->value)) {
			Capsule::table(self::$table)->where('setting', self::$prefix . $config)->update(['value' => $value]);
		} else {
			Capsule::table(self::$table)->insert(['value' => $value, 'setting' => self::$prefix . $config]);
		}
		$this->config[$config] = $value;
		return self::$_instance;
	}

	/**
	 *
	 */
	public function __clone()
	{
	}

	/**
	 *
	 */
	public function __wakeup()
	{
	}

	/**
	 *
	 */
	public function __destruct()
	{
		self::$_instance = null;
	}

	/**
	 * @param $key
	 * @return array|mixed
	 */
	public static function config($key)
	{
		return AddonConfig::config($key);
	}

	/**
	 * @param $config
	 * @return array|mixed
	 */
	public static function getSystem($config)
	{
		$result = Capsule::table(self::$table)->where('setting', $config)->first();
		if (is_null($result)) {
			return '';
		}
		return $result->value;
	}
}