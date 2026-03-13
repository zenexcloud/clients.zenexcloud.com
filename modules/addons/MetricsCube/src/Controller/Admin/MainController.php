<?php

namespace MetricsCube\Controller\Admin;

use MetricsCube\Actions\Deactivate;
use MetricsCube\Controller\AbstractController;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Connection;
use MetricsCube\Service\Permissions;
use MetricsCube\Utils\Util;
use MetricsCube\View\ViewHelper;
use const DS;
use const METRICSCUBE;

/**
 * Class MainController
 * @package MetricsCube\Controller\Admin
 */
class MainController extends AbstractController
{
	/**
	 * @return array|void
	 */
	public function connectedAction()
	{
		$config = Configuration::getInstance();
		$connKey = $config->get('ConnKey');
		if ($connKey === FALSE) {
			return parent::redirect((new ViewHelper())->url('Main@index'));
		}
		$logFilePathDir = METRICSCUBE . DS . 'logs' . DS;
		$logFilePath = $logFilePathDir . 'mclog.log.php';
		if (file_exists($logFilePath) && is_readable($logFilePath)) {
			$logs = TRUE;
		} else {
			$logs = FALSE;
		}
		$lastSyncTime = Configuration::getInstance()->get('LastSynchronizationTime');
		if ($lastSyncTime === FALSE) {
			$lastSyncTime = '2 second ago';
		} else {
			$lastSyncTimeDiff = round((time() - $lastSyncTime) / 3600, 1);
			$lastSyncTime = Util::timeDiff(time(), $lastSyncTime - 2) . ' ago';
		}
		$errors = Configuration::getInstance()->get('Error');
		if ($errors !== FALSE) {
			$errors = $this->prepareError($errors);
		}
		$domain = rtrim(Configuration::getSystem('SystemURL'), '/') . DS . 'modules' . DS . 'addons' . DS . 'MetricsCube' . DS . 'connector.php';
		if (isset($lastSyncTimeDiff) && $lastSyncTimeDiff > 24) {
			$warning = TRUE;
		} else {
			$warning = FALSE;
		}
		$userDetails = $config->get('UserDetails') == 'on';
		$userTracking = $config->get('UserTracking') == 'on';
		$instantDataSynchronization = $config->get('InstantDataSynchronization') == 'on';
		$connectorUserWidgetPopup = $config->get('UserWidgetPopup') == 'on';
		$connectorUserTags = $config->get('UserTags') == 'on';
		$connectorStatisticsWidget = $config->get('StatisticsWidget') == 'on';
		$connectorUserWidgetProfile = $config->get('UserWidgetProfile') == 'on';
		$connectorUserWidgetServiceDetails = $config->get('UserWidgetServiceDetails') == 'on';
		$connectorMainMenuLink = $config->get('MainMenuLink') == 'on';
		Permissions::checkRoles();
		$permissions = Permissions::getPermissions();
		return compact('logs', 'lastSyncTime', 'errors', 'warning',
			'logFilePath',
			'logFilePathDir',
			'domain',
			'permissions',
			'userTracking',
			'userDetails',
			'instantDataSynchronization',
			'instantDataSynchronization',
			'connectorUserWidgetPopup',
			'connectorUserTags',
			'connectorStatisticsWidget',
			'connectorUserWidgetProfile',
			'connectorUserWidgetServiceDetails',
			'connectorMainMenuLink');
	}

	/**
	 * @return array|void
	 */
	public function indexAction()
	{
		$config = Configuration::getInstance();
		$connKey = $config->get('ConnKey');
		if ($connKey !== FALSE) {
			return parent::redirect((new ViewHelper())->url('Main@connected'));
		}
		if (file_exists(METRICSCUBE . DS . 'key.php')) {
			require_once METRICSCUBE . DS . 'key.php';
			if (isset($appKey)) {
				$config->set('AppKey', $appKey);
				@unlink(METRICSCUBE . DS . 'key.php');
			}
		}
		$errors = $config->get('Error');
		if ($errors !== FALSE) {
			$this->prepareError($errors);
			$errors = $this->getErrors();
		}
		$appKey = $config->get('AppKey', '');
		$firstConfiguration = $config->get('FirstConfiguration');
		$userDetails = $config->get('UserDetails') == 'on';
		$userTracking = $config->get('UserTracking') == 'on';
		$instantDataSynchronization = $config->get('InstantDataSynchronization') == 'on';

		$connectorUserWidgetPopup = $config->get('UserWidgetPopup') == 'on';
		$connectorUserTags = $config->get('UserTags') == 'on';
		$connectorStatisticsWidget = $config->get('StatisticsWidget') == 'on';
		$connectorUserWidgetProfile = $config->get('UserWidgetProfile') == 'on';
		$connectorUserWidgetServiceDetails = $config->get('UserWidgetServiceDetails') == 'on';
		$connectorMainMenuLink = $config->get('MainMenuLink') == 'on';
		$autoActivate = FALSE;
		if (isset($_GET['autoActivate'])) {
			$autoActivate = TRUE;
		}

		return compact('appKey', 'errors',
			'firstConfiguration',
			'userTracking',
			'userDetails',
			'instantDataSynchronization',
			'connectorUserWidgetPopup',
			'connectorUserTags',
			'connectorStatisticsWidget',
			'connectorUserWidgetProfile',
			'connectorUserWidgetServiceDetails',
			'connectorMainMenuLink',
			'autoActivate'
		);
	}

	/**
	 *
	 */
	public function logsAction()
	{
		$logFilePath = METRICSCUBE . DS . 'logs' . DS . 'mclog.log.php';
		if (file_exists($logFilePath)) {
			$logFileContent = file($logFilePath);
			unset($logFileContent[0]);
			header('Content-Disposition: attachment; filename=metricscube.log');
			echo(implode('', $logFileContent));
			exit;
		} else {
			echo 'Logs file does not exists!';
			die;
		}
	}

	/**
	 *
	 */
	public function reconnectAction()
	{
		Deactivate::deactivate();
		return parent::redirect((new ViewHelper())->url('Main@index'));
	}

	/**
	 * @return void
	 */
	public function saveACLAction()
	{
		try {
			Permissions::clean();
			Permissions::store($_POST);
			$this->jsonResponse(['status' => TRUE, 'message' => 'The permissions have been saved.']);
		} catch (\Exception $exception) {
			$this->jsonResponse(['status' => FALSE, 'message' => $exception->getMessage()]);
		}
	}

	/**
	 *
	 */
	public function saveAction()
	{
		$config = Configuration::getInstance();

		foreach ($this->configOptions as $optionKey => $optionName) {
			if (isset($_POST[$optionKey]) && $_POST[$optionKey] == 'true') {
				$config->set($optionName, 'on');
			} else {
				$config->set($optionName, 'off');
			}
		}
		$config->set('FirstConfiguration', TRUE);
		Connection::send('/api/connectors/whmcs/refresh');
		$this->jsonResponse(['status' => 'success']);
	}

	/**
	 *
	 */
	public function setConfigAction()
	{
		$redirectUrl = (new ViewHelper())->url('Main@index');
		if (!isset($_GET['setting']) || !isset($_GET['value'])) {
			return parent::redirect($redirectUrl);
		}
		$config = Configuration::getInstance();
		$setting = (string)filter_input(INPUT_GET, 'setting');
		$value = (string)filter_input(INPUT_GET, 'value');
		if (isset($config->default[$_GET['setting']])) {
			$from = $config->default[$_GET['setting']];
			$config->set($setting, $value);
			$msg = <<<EOL
Setting `{$setting}` changed from `{$from}` to `{$value}`.
<br>
<button onclick="location.href='{$redirectUrl}'" type="button">Back</button>
EOL;
			die($msg);
		}
		return parent::redirect($redirectUrl);
	}

}
