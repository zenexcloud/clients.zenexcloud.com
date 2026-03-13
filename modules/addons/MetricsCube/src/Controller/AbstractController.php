<?php

namespace MetricsCube\Controller;

use Exception;
use MetricsCube\Helpers\AddonHelper;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Permissions;
use MetricsCube\Utils\URL;
use MetricsCube\View\ViewHelper;
use Smarty;
use const DS;
use const METRICSCUBE;

/**
 * Class AbstractController
 * @package MetricsCube\Controller
 */
abstract class AbstractController
{
	/** @var Smarty $smarty */
	protected $smarty;
	/** @var */
	protected $template;
	/** @var string $templateType */
	protected $templateType = 'clientarea';
	/** @var array $variables */
	protected $variables;
	/** @var array|mixed $config */
	protected $config;
	/** @var string $controllerType */
	protected $controllerType = 'Client';
	/** @var string $controlerName */
	/** @var string $controlerName */
	protected $controlerName = 'Main';
	/** @var string $fullControlerName */
	protected $fullControlerName = 'Main';
	/** @var string $actionName */
	protected $actionName = 'index';
	/** @var */
	protected $fullActionName;
	/** @var string $helpCenterUrl */
	protected $helpCenterUrl = 'https://metricscube.io/help-center/common-problems/whmcs-connector/%s/';
	/** @var array $errors */
	private $errors = [];
	/**
	 * @var array
	 */
	public $permissions;

	/**
	 * @var array
	 */
	public $settings;

	/**
	 * @var string[]
	 */
	public $configOptions = [
		'userDetails'                       => 'UserDetails',
		'userTracking'                      => 'UserTracking',
		'instantDataSynchronization'        => 'InstantDataSynchronization',
		'connectorUserWidgetPopup'          => 'UserWidgetPopup',
		'connectorUserTags'                 => 'UserTags',
		'connectorStatisticsWidget'         => 'StatisticsWidget',
		'connectorUserWidgetProfile'        => 'UserWidgetProfile',
		'connectorUserWidgetServiceDetails' => 'UserWidgetServiceDetails',
		'connectorMainMenuLink'             => 'MainMenuLink'
	];

	/**
	 * @param array $params
	 * @return AbstractController
	 */
	public static function render($params = [])
	{
		$class = get_called_class();

		return new $class($params);
	}

	/**
	 * AbstractController constructor.
	 */
	public function __construct()
	{
		global $whmcs;
		$this->smarty = new Smarty();
		$this->smarty->caching = 0;
		$this->smarty->compile_check = TRUE;
		$this->smarty->force_compile = TRUE;
		$whmcsAppConfig = $whmcs->getApplicationConfig();
		$this->smarty->compile_dir = $whmcsAppConfig["templates_compiledir"];
		$configFilePath = METRICSCUBE . DS . 'resources' . DS . 'config' . DS . 'config.php';
		$this->config = file_exists($configFilePath) ? require $configFilePath : [];
		if (isset($_SESSION['adminid'])) {
			$this->permissions = Permissions::loadAdminPermissions($_SESSION['adminid']);
			$this->smarty->assign('MetricsCubePermissions', $this->permissions);
		}
		$this->settings = Configuration::getInstance()->all();
		$this->smarty->assign('MetricsCubeSettings', $this->settings);
		$this->smarty->assign('helper', new ViewHelper());
	}

	/**
	 * @return mixed
	 */
	public function adminArea()
	{
		$this->templateType = 'adminarea';
		$this->controllerType = 'Admin';
		try {
			AddonHelper::verifyRequirements();
			$this->setAction();
			$this->setTemplate();
		} catch (Exception $ex) {
			$this->template = 'adminarea/error.tpl';
			$this->smarty->assign('errors', $this->prepareError($ex->getMessage()));
		}

		return $this->renderTemplate();
	}

	/**
	 * @throws Exception
	 */
	protected function setTemplate()
	{
		$this->template = $this->templateType . DS . strtolower($this->controlerName) . DS . strtolower($this->actionName) . '.tpl';
		if (!file_exists(METRICSCUBE . DS . 'views' . DS . $this->template)) {
			throw new Exception('Template file ' . $this->template . ' not found!');
		}
	}

	/**
	 * @throws Exception
	 */
	protected function setAction()
	{
		if (isset($_GET['controller'])) {
			$this->controlerName = filter_input(INPUT_GET, 'controller');
		}
		$this->fullControlerName = 'MetricsCube\\Controller\\' . $this->controllerType . '\\' . $this->controlerName . 'Controller';
		if (!class_exists($this->fullControlerName)) {
			throw new Exception('Controller not found! - ' . $this->fullControlerName);
		}
		$controller = new $this->fullControlerName();
		if (isset($_GET['action'])) {
			$this->actionName = filter_input(INPUT_GET, 'action');
		}
		$this->fullActionName = $this->actionName . 'Action';
		if (!method_exists($controller, $this->fullActionName)) {
			throw new Exception('Action not found!');
		}
		$this->variables = $controller->{$this->fullActionName}();
	}

	/**
	 * @return mixed
	 */
	protected function renderTemplate()
	{
		$this->appendCommonParams();
		$this->smarty->template_dir = METRICSCUBE . DS . 'views' . DS;
		foreach ($this->variables as $key => $value) {
			$this->smarty->assign($key, $value);
		}
		if (isset($this->variables['render'])) {
			$name = basename($this->template);
			$this->template = str_replace($name, $this->variables['render'] . '.tpl', $this->template);
		}
		return $this->smarty->display($this->template);
	}

	/**
	 * @param string $url
	 */
	public static function redirect($url = '')
	{
		header("Location: " . $url);
		die();
	}

	/**
	 *
	 */
	private function appendCommonParams()
	{
		$this->variables['addonURL'] = URL::generateWithParams(['module' => 'MetricsCube'], null, FALSE);
		$this->variables['helper'] = new ViewHelper();
	}

	/**
	 * @param array $params
	 */
	protected function jsonResponse(array $params = [])
	{
		ob_clean();
		echo json_encode($params);
		exit();
	}

	/**
	 * @return string
	 */
	protected function getErrors()
	{
		$content = '';
		foreach ($this->errors as $title => $message) {
			$content .= <<<EOF
<div class="lu-alert__section">
    <div class="lu-alert__title lu-has-actions">
        {$title}
    </div>
    <div class="lu-alert__body">
        {$message}
    </div>
</div>
EOF;
		}
		return $content;
	}


	/**
	 * @param        $errorMessage
	 * @param string $applicationKey
	 * @return string
	 */
	protected function prepareError($errorMessage, $applicationKey = '')
	{
		$errors = explode('|', $errorMessage);
		if (isset($errors[2])) {
			$this->addError(sprintf(MCmsg()->message(1), '(' . $errors[0] . ')', $this->getHelpLink($errors[0])), $errors[1]);
			$this->addError(MCmsg()->message(5), $errors[2]);
		} else {
			$this->addError(sprintf(MCmsg()->message(1), '', ''), $errorMessage);
		}
		return $this->getErrors();
	}

	/**
	 * @param $title
	 * @param $message
	 */
	protected function addError($title, $message)
	{
		$this->errors[$title] = $message;
	}

	/**
	 * @return bool
	 */
	protected function hasErrors()
	{
		return count($this->errors) > 0 ? TRUE : FALSE;
	}

	/**
	 * @param $errorCode
	 * @return string
	 */
	protected function getHelpLink($errorCode)
	{
		$url = sprintf($this->helpCenterUrl, strtolower($errorCode));
		return sprintf(MCmsg()->message(6), $url);
	}

}
