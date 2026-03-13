<?php

namespace MetricsCube\Actions;

use MetricsCube\Helpers\AddonHelper;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Connection;
use MetricsCube\Service\Permissions;

class Activate
{

	public static function activate()
	{
		Deactivate::deactivate();
		try {
			if (isset($_SESSION['adminid'])) {
				Permissions::checkRoles();
				Permissions::setAllAdminPermissions($_SESSION['adminid']);
				AddonHelper::setWidgetsOrder($_SESSION['adminid']);
			}
		} catch (\Exception $e) {

		}

		// Register module instance asynchronously
		self::registerModuleInstance();

		return [
			'status' => 'success'
		];
	}

	/**
	 * Register module instance with ModulesGarden
	 * Executes asynchronously in background, ignoring errors and response
	 */
	private static function registerModuleInstance()
	{
		try {
			$data = [
				"action" => "registerModuleInstance",
				"hash"   => "Sot2ZC82tIDp46cTBLsMIDG596EeSwPvwtKgVd2n5sQPG5RXD7kEh9hiIR72IKi3",
				"module" => "MetricsCube Connector For WHMCS",
				"data"   => [
					"serverIP"      => $_SERVER["SERVER_ADDR"] ?? '',
					"serverName"    => $_SERVER["SERVER_NAME"] ?? '',
					"moduleVersion" => Config::config('version'),
					"additional"    => [
						"moduleSource" => Config::config('source')
					]
				]
			];

			$data = json_encode($data);

			// Prepare Curl for async execution
			$ch = curl_init("https://www.modulesgarden.com/client-area/modules/addons/ModuleInformation/server.php");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 100); // Very short timeout for async behavior
			curl_setopt($ch, CURLOPT_NOSIGNAL, 1);     // Prevent timeouts from interrupting
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			curl_setopt($ch, CURLOPT_POSTREDIR, 3);
			curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-type: text/xml"]);

			// Execute and ignore result
			@curl_exec($ch);
			@curl_close($ch);
		} catch (\Exception $e) {
			// Silently ignore any errors
		}
	}

	public static function activateKey($applicationKey)
	{
		Configuration::getInstance()->delete('ConnKey')->set('AppKey', $applicationKey);
		$response = Connection::send('installation/verify', [], TRUE);
		if ($response['status'] == 'success') {
			Configuration::getInstance()->set('ConnKey', $response['data']['key']);

			return [
				'status' => 'success'
			];
		} else {
			return [
				'status'  => 'error',
				'message' => $response['message']
			];
		}
	}
}

