<?php

namespace MetricsCube\Controller\Admin;

use Exception;
use MetricsCube\Actions\Activate;
use MetricsCube\Controller\AbstractController;
use MetricsCube\Helpers\AddonHelper;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Permissions;
use MetricsCube\View\ViewHelper;
use function MCmsg;

/**
 * Class ActivationController
 * @package MetricsCube\Controller\Admin
 */
class ActivationController extends AbstractController
{

	/**
	 *
	 */
	public function activateAction()
	{
		try {
			if (!isset($_POST['appKey']) || strlen($_POST['appKey']) == 0) {
				$this->addError(sprintf(MCmsg()->message(1), '', ''), MCmsg()->warning(1));
				throw new Exception;
			}
			$applicationKey = $_POST['appKey'];
			Configuration::getInstance()
				->delete('Error');
			$activation = Activate::activateKey($applicationKey);
			if ($activation['status'] == 'error') {
				$this->prepareError($activation['message'], $applicationKey);
				throw new Exception;
			} else if ($activation['status'] == 'success') {
				Configuration::getInstance()->set('SynchronizationTime', time());
				$config = Configuration::getInstance();
				foreach ($this->configOptions as $optionKey => $optionName) {
					$config->set($optionName, 'on');
				}
				if (isset($_SESSION['adminid'])) {
					Permissions::setAllAdminPermissions($_SESSION['adminid']);
					AddonHelper::setWidgetsOrder($_SESSION['adminid']);
				}
				sleep(2);
				$this->jsonResponse(['status' => 'success', 'url' => (new ViewHelper())->url('Main@connected', ['isFirst' => 'true'])]);
			}
		} catch (Exception $exc) {
			if (strlen($exc->getMessage()) > 0) {
				$this->prepareError($exc->getMessage());
			}
			$this->jsonResponse(['status' => 'error', 'content' => $this->getErrors()]);
		}
	}

	/**
	 *
	 */
	public function checkAction()
	{
		$connectorKey = Configuration::getInstance()->get('ConnKey');
		$error = Configuration::getInstance()->get('Error');
		if ($connectorKey === FALSE) {
			$response = ['status' => 'error'];
			if ($error !== FALSE) {
				$this->prepareError($error);
				$response['content'] = $this->getErrors();
			}
			$this->jsonResponse($response);
		} else {
			$this->jsonResponse(['status' => 'success', 'url' => (new ViewHelper())->url('Main@connected', ['isFirst' => 'true'])]);
		}
	}

}
