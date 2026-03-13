<?php

namespace MetricsCube\Service;

use Exception;
use MetricsCube\Actions\Config;
use WHMCS\Database\Capsule;
use function MCmsg;

/**
 * Class Connection
 * @package MetricsCube\Service
 */
class Connection
{
	/** @var string $apiUrl */
	public static $apiUrl = 'https://api.metricscube.io';
	/** @var string $appUrl */
	public static $appUrl = 'metricscube.io';

	/**
	 * @param string $url
	 * @return string
	 * @throws Exception
	 */
	public static function getIndividualApiUrl($url = '')
	{
		$config = Configuration::getInstance()->all();
		if (!isset($config['AppKey']) || strlen($config['AppKey']) == 0) {
			throw new Exception('MetricsCube Application key not found!');
		}
		if (!isset($config['ConnKey']) || strlen($config['ConnKey']) == 0) {
			throw new Exception('MetricsCube Connector key not found!');
		}
		return sprintf('%s/api/connector/%s/%s/whmcs/%s', trim(self::$apiUrl, '/'), $config['MetricsCubeConnKey'], $config['MetricsCubeAppKey'], trim($url, '/'));
	}

	public static function getUrl($url = '')
	{
		return sprintf('%s/%s', trim(self::getApiUrl(), '/'), trim($url, '/'));
	}

	/**
	 * @return string
	 */
	public static function getApiUrl()
	{
		if (isset($_SERVER['HTTP_RESPONSE_URL'])) {
			$responseUrl = rtrim($_SERVER['HTTP_RESPONSE_URL'], '/');
			$appUrl = sprintf('.%s', ltrim(rtrim(self::$appUrl, '/'), '.'));
			if (substr($responseUrl, -strlen($appUrl)) === $appUrl) {
				return $responseUrl;
			}
		}
		$apiUrlPath = METRICSCUBE . DS . 'endpoint.php';
		if (file_exists($apiUrlPath)) {
			include($apiUrlPath);
			if (isset($apiUrl)) {
				$responseUrl = rtrim($apiUrl, '/');
				$appUrl = sprintf('.%s', ltrim(rtrim(self::$appUrl, '/'), '.'));
				if (substr($responseUrl, -strlen($appUrl)) === $appUrl) {
					return $responseUrl;
				}
			}
		}
		return self::$apiUrl;
	}

	/**
	 * @param       $url
	 * @param array $params
	 * @param bool  $details
	 * @return array|mixed
	 */
	public static function send($url, $params = [], $details = FALSE)
	{

		try {
			$url = sprintf('%s/%s', trim(self::getApiUrl(), '/'), trim($url, '/'));
			$dataToSend = self::systemDetails($params, $details);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_POST           => TRUE,
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL            => $url,
				CURLOPT_TIMEOUT        => 30,
				CURLOPT_SSL_VERIFYPEER => 1,
				CURLOPT_USERAGENT      => 'MetricsCubeWHMCSConnector',
				CURLOPT_HTTPHEADER     => [
					'Accept: application/json',
					'X-Addon-Name: MetricsCube-WHMCS',
					'X-Addon-Version: ' . Config::config('version'),
				],
				CURLOPT_SSL_VERIFYHOST => 2,
				CURLOPT_POSTFIELDS     => http_build_query($dataToSend)
			]);
			$response = curl_exec($curl);
			if (curl_error($curl)) {
				$errorMessage = curl_error($curl);
				curl_close($curl);
				throw new Exception(sprintf(MCmsg()->error(3), $errorMessage, $url));
			}
			curl_close($curl);
			$jsonData = json_decode($response, TRUE);
			if (!is_array($jsonData) || !isset($jsonData['status']) || ($jsonData['status'] == 'error' && !isset($jsonData['message']))) {
				throw new Exception(sprintf(MCmsg()->error(4), $url, $url));
			}
			if (isset($jsonData['status']) && in_array($jsonData['status'], ['success', 'warning'])) {
				return $jsonData;
			}
			if ($jsonData['status'] == 'error' && isset($jsonData['message'])) {
				throw new Exception($jsonData['message']);
			}
			throw new Exception(sprintf(MCmsg()->error(4), $url, $url));
		} catch (Exception $exc) {
			return [
				'status'  => 'error',
				'message' => $exc->getMessage()
			];
		}
	}

	/**
	 * @param array $params
	 * @return array
	 */
	public static function systemDetails($params = [], $details = FALSE)
	{
		$server = [];
		$config = Configuration::getInstance();
		$variables = ['HTTP_HOST', 'HTTP_X_FORWARDED_FOR', 'SERVER_SOFTWARE', 'SERVER_NAME', 'SERVER_ADDR', 'REMOTE_ADDR', 'DOCUMENT_ROOT', 'REQUEST_SCHEME', 'SCRIPT_FILENAME'];
		foreach ($variables as $variable) {
			if (isset($_SERVER[$variable])) {
				$server[$variable] = $_SERVER[$variable];
			}
		}
		if (isset($_POST['clientTime']) && is_array($_POST['clientTime'])) {
			$params['clientTime'] = $_POST['clientTime'];
		}
		if (isset($_SESSION) && isset($_SESSION['adminid'])) {
			$params['admin_id'] = intval($_SESSION['adminid']);
			try {
				$params['admin_name'] = (array)Capsule::table('tbladmins')
					->select('firstname')
					->addSelect('lastname')
					->addSelect('email')
					->where('id', $params['admin_id'])->first();
			} catch (Exception $exception) {
			}
		}
		$server['METRICSCUBE_INSTALLER_VERSION'] = $config->config('version');
		$server['METRICSCUBE_VERSION'] = $config->config('version');
		$server['CONNECTOR_TYPE'] = 'WHMCS';
		if (isset($params['METRICSCUBE_APP_KEY'])) {
			$appKey = $params['METRICSCUBE_APP_KEY'];
		} else {
			$appKey = $config->get('AppKey');
		}
		if ($appKey !== FALSE) {
			$server['METRICSCUBE_APP_KEY'] = $appKey;
		}
		if (isset($params['METRICSCUBE_CONNECTOR_KEY'])) {
			$connKey = $params['METRICSCUBE_CONNECTOR_KEY'];
		} else {
			$connKey = $config->get('ConnKey');
		}
		if ($connKey !== FALSE) {
			$server['METRICSCUBE_CONNECTOR_KEY'] = $connKey;
		}
		$params = self::checkAddonSource($params);
		if (!$details) {
			return array_merge($server, $params);
		}
		$variables = ['HTTP_HOST', 'HTTP_X_FORWARDED_FOR', 'SERVER_SOFTWARE', 'SERVER_NAME', 'SERVER_ADDR', 'REMOTE_ADDR', 'DOCUMENT_ROOT', 'REQUEST_SCHEME', 'SCRIPT_FILENAME'];
		foreach ($variables as $variable) {
			if (isset($_SERVER[$variable])) {
				$server[$variable] = $_SERVER[$variable];
			}
		}
		$server['METRICSCUBE_VERSION'] = $config->config('version');
		$server['METRICSCUBE_USER_DETAILS'] = $config->get('UserDetails') == 'on';
		$server['METRICSCUBE_USER_TRACKING'] = $config->get('UserTracking') == 'on';
		$server['METRICSCUBE_LIVE_DATA'] = $config->get('InstantDataSynchronization') == 'on';
		$server['ZIP_SUPPORTED'] = class_exists('ZipArchive');
		$server['CURL_SUPPORTED'] = function_exists('curl_version');

		$server['PHP_VERSION'] = phpversion();
		$server['PHP_TIMEZONE'] = @date_default_timezone_get();
		$server['PHP_TIMEZONE_DIFF'] = round(date('Z') / 3600, 2);
		$server['PHP_FORMAT_TIME'] = date('Y-m-d H:i:s');
		$server['PHP_MICROTIME'] = microtime();
		$server['PHP_TIME'] = time();
		$server['PHP_GMT_TIME'] = gmdate('Y-m-d H:i:s');
		if (defined('WHMCS_LICENSE_DOMAIN')) {
			$server['WHMCS_LICENSE_DOMAIN'] = WHMCS_LICENSE_DOMAIN;
		}
		if (defined('WHMCS_LICENSE_IP')) {
			$server['WHMCS_LICENSE_IP'] = WHMCS_LICENSE_IP;
		}
		if (defined('WHMCS_LICENSE_DIR')) {
			$server['WHMCS_LICENSE_DIR'] = WHMCS_LICENSE_DIR;
		}
		if (defined('ROOTDIR')) {
			$server['WHMCS_ROOTDIR'] = ROOTDIR;
		}
		if (defined('WHMCS')) {
			$server['WHMCS'] = WHMCS;
		}
		$whmcsConfig = [];
		foreach (Capsule::table('tblconfiguration')->whereIn('setting', ['Version', 'CompanyName', 'LogoURL', 'SystemURL', 'DailyCronExecutionHour', 'DateFormat'])->get() as $config) {
			$whmcsConfig[$config->setting] = $config->value;
		}
		if (isset($whmcsConfig['Version'])) {
			$server['WHMCS_VERSION'] = $whmcsConfig['Version'];
		} else {
			$server['WHMCS_VERSION'] = 'undefined';
		}
		if (isset($whmcsConfig['CompanyName'])) {
			$server['WHMCS_COMPANY_NAME'] = $whmcsConfig['CompanyName'];
		}
		if (isset($whmcsConfig['LogoURL'])) {
			$server['WHMCS_LOGO_URL'] = $whmcsConfig['LogoURL'];
		}
		if (isset($whmcsConfig['SystemURL'])) {
			$server['WHMCS_SYSTEM_URL'] = $whmcsConfig['SystemURL'];
		}
		if (isset($whmcsConfig['DateFormat'])) {
			$server['WHMCS_DATE_FORMAT'] = $whmcsConfig['DateFormat'];
		}
		try {
			$server['WHMCS_APP_SYSTEM_URL'] = \App::getSystemURL();
			$server['WHMCS_APP_ADMIN_PATH'] = \App::get_admin_folder_name();
		} catch (Exception $exception) {

		}
		if (isset($whmcsConfig['DailyCronExecutionHour'])) {
			$server['WHMCS_DAILY_CRON_EXECUTION_TIME'] = $whmcsConfig['DailyCronExecutionHour'];
		}
		return array_merge($server, $params);
	}

	public static function get($url, $params = [])
	{
		try {
			$url = sprintf('%s/%s', trim(self::getApiUrl(), '/'), trim($url, '/'));
			$dataToSend = self::systemDetails($params);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_POST           => TRUE,
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL            => $url,
				CURLOPT_TIMEOUT        => 30,
				CURLOPT_SSL_VERIFYPEER => 1,
				CURLOPT_USERAGENT      => 'MetricsCubeWHMCSConnector',
				CURLOPT_HTTPHEADER     => [
					'Accept: application/json',
					'X-Addon-Name: MetricsCube-WHMCS',
					'X-Addon-Version: ' . Config::config('version'),
				],
				CURLOPT_SSL_VERIFYHOST => 2,
				CURLOPT_POSTFIELDS     => http_build_query($dataToSend)
			]);
			$response = curl_exec($curl);
			if (curl_error($curl)) {
				$errorMessage = curl_error($curl);
				curl_close($curl);
				throw new Exception(sprintf(MCmsg()->error(13), $errorMessage, $url));
			}
			curl_close($curl);
			$jsonData = json_decode($response, TRUE);
			if (!is_array($jsonData)) {
				throw new Exception(sprintf(MCmsg()->error(14), $url, $url));
			}
			return $jsonData;
		} catch (Exception $exc) {
			return [
				'status'  => 'error',
				'message' => $exc->getMessage()
			];
		}
	}

	public static function checkAddonSource($params)
	{
		$params['addon_source'] = Config::config('source');
		return $params;
	}

}
