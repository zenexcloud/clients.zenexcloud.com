<?php

namespace MetricsCube\Controller\Admin;

use Exception;
use MetricsCube\Controller\AbstractController;
use MetricsCube\Service\AdminWidgetService;
use MetricsCube\Service\Connection;
use MetricsCube\Service\UserService;

/**
 * MetricsCube
 */
class AJAXController extends AbstractController
{
	/**
	 * @return string|null
	 */
	public function renderOutput()
	{
		$response = [
			'status'      => FALSE,
			'data'        => [],
			'content'     => FALSE,
			'permissions' => $this->permissions,
			'billing'     => FALSE,
			'settings'    => $this->settings
		];
		$result = [];
		$this->smarty->template_dir = METRICSCUBE . DS . 'views' . DS;
		try {
			if (function_exists('generateToken')) {
				$this->smarty->assign('csrfToken', generateToken('plain'));
			}
			$dataSource = 'remote';
			if (isset($_REQUEST['dataSource'])) {
				$dataSource = 'local';
			}
			if (isset($_REQUEST['clientID'])) {
				$this->smarty->assign('clientID', $_REQUEST['clientID']);
			}
			if (isset($_REQUEST['domainID'])) {
				$this->smarty->assign('domainID', $_REQUEST['domainID']);
			}
			if (isset($_REQUEST['serviceID'])) {
				$this->smarty->assign('serviceID', $_REQUEST['serviceID']);
			}
			switch ($_REQUEST['moduleAction']) {
				case 'getDashboardWidget':
					$timeRange = 'today';
					if (isset($_REQUEST['timeRange'])) {
						$timeRange = $_REQUEST['timeRange'];
					}
					$this->smarty->assign('timeRange', $timeRange);
					if ($dataSource == 'remote') {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_ADMIN_WIDGET_DATA', 'TIME_RANGE' => $timeRange], $response, $this->smarty);
						if ($result['status']) {
							$response['status'] = TRUE;
						} else {
							$result['data'] = AdminWidgetService::getData($timeRange, $result);
						}
					} else {
						$result['data'] = AdminWidgetService::getData($timeRange, $result);
					}
					foreach ($result['data'] as $key => $value) {
						$this->smarty->assign($key, $value);
					}
					$response['content'] = $this->smarty->fetch('adminarea' . DS . 'widgets' . DS . 'dashboardWidgetAjax.tpl');
					$response['dataRaw'] = $result['data'];
					$response['responseRawRaw'] = $result;
					break;
				case 'getRegistrationModal':
					$response['content'] = $this->smarty->fetch('adminarea' . DS . 'modals' . DS . 'connect-account.tpl');
					break;
				case 'getClientDetails':
					if ($dataSource == 'remote') {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_CLIENT_DETAILS', 'CLIENT_ID' => $_REQUEST['clientID']], $response, $this->smarty);
						if ($result['status']) {
							$response['status'] = TRUE;
						} else {
							$result['data'] = UserService::getUserDetails($_REQUEST['clientID']);
						}
					} else {
						$result['data'] = UserService::getUserDetails($_REQUEST['clientID']);
					}
					if (isset($result['data']['details']['newStatus'])) {
						$result['data']['details']['newStatus'] = UserService::getMasterUserStatus($_REQUEST['clientID']);
					}
					if (isset($result['data']['details'])) {
						$result['data']['details'] = array_merge($result['data']['details'] ?? [], UserService::getUserAutoLogin($_REQUEST['clientID']));
					}
					foreach ($result['data'] as $key => $value) {
						$this->smarty->assign($key, $value);
					}
					$response['content'] = $this->smarty->fetch('adminarea' . DS . 'widgets' . DS . 'dashboardClientPopupAjax.tpl');
					$response['dataRaw'] = $result['data'];
					$response['data'] = $result['data'];
					$response['responseRawRaw'] = $result;
					break;
				case 'getClientsTagsAndComments':
					if (isset($this->permissions['customer_details.tags_view']) && isset($this->permissions['customer_details.comments_view'])) {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_CLIENTS_TAGS_AND_COMMENTS', 'CLIENTS' => $_REQUEST['clients']], $response, $this->smarty);
					} else if (isset($this->permissions['customer_details.tags_view'])) {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_CLIENTS_TAGS_LIST', 'CLIENTS' => $_REQUEST['clients']], $response, $this->smarty);
					} else if (isset($this->permissions['customer_details.comments_view'])) {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_CLIENTS_COMMENTS_LIST', 'CLIENTS' => $_REQUEST['clients']], $response, $this->smarty);
					}
					if ($result['status']) {
						$response['status'] = TRUE;
						$result['data'] = UserService::joinDataToTags($result['data']);
						$response['data'] = $result['data'];
					}
					$response['responseRawRaw'] = $result;
					break;
				case 'getAdminClientServicesTab':
					$mrr = FALSE;
					$income = FALSE;
					if ($dataSource == 'remote') {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_SERVICE_SUMMARY', 'CLIENT_ID' => $_REQUEST['clientID'], 'SERVICE_ID' => $_REQUEST['serviceID']], $response, $this->smarty);
						if (isset($result['data']['mrr'])) {
							$mrr = $result['data']['mrr'];
						}
						if (isset($result['data']['income'])) {
							$income = $result['data']['income'];
						}
					}
					$result['data'] = UserService::getUserServiceDetails($_REQUEST['clientID'], $_REQUEST['serviceID']);
					if ($mrr !== FALSE) {
						$result['data']['serviceMRR'] = $mrr;
					}
					if ($income !== FALSE) {
						$result['data']['serviceIncome'] = $income;
					}
					if ($result['status']) {
						$response['status'] = TRUE;
					}
					foreach ($result['data'] as $key => $value) {
						$this->smarty->assign($key, $value);
					}
					$response['content'] = $this->smarty->fetch('adminarea' . DS . 'widgets' . DS . 'adminClientServicesTab.tpl');
					$response['dataRaw'] = $result['data'];
					$response['responseRawRaw'] = $result;
					break;
				case 'getAdminClientDomainsTab':
					$mrr = FALSE;
					$income = FALSE;
					if ($dataSource == 'remote') {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_DOMAIN_SUMMARY', 'CLIENT_ID' => $_REQUEST['clientID'], 'DOMAIN_ID' => $_REQUEST['domainID']], $response, $this->smarty);
						if (isset($result['data']['mrr'])) {
							$mrr = $result['data']['mrr'];
						}
						if (isset($result['data']['income'])) {
							$income = $result['data']['income'];
						}
					}
					$result['data'] = UserService::getUserDomainDetails($_REQUEST['clientID'], $_REQUEST['domainID']);
					if ($mrr !== FALSE) {
						$result['data']['domainMRR'] = $mrr;
					}
					if ($income !== FALSE) {
						$result['data']['domainIncome'] = $income;
					}
					if ($result['status']) {
						$response['status'] = TRUE;
					}
					foreach ($result['data'] as $key => $value) {
						$this->smarty->assign($key, $value);
					}
					$response['content'] = $this->smarty->fetch('adminarea' . DS . 'widgets' . DS . 'adminClientDomainsTab.tpl');
					$response['dataRaw'] = $result['data'];
					$response['responseRawRaw'] = $result;
					break;
				case 'getAdminClientSummaryTab':
					if ($dataSource == 'remote') {
						$result = self::getRemoteData(['METRICSCUBE_CONNECTOR_MODULE_ACTION' => $_REQUEST['moduleAction'], 'METRICSCUBE_CONNECTOR_ACTION' => 'GET_CLIENT_SUMMARY', 'CLIENT_ID' => $_REQUEST['clientID']], $response, $this->smarty);
						if ($result['status']) {
							$response['status'] = TRUE;
						} else {
							$result['data'] = UserService::getUserDetails($_REQUEST['clientID']);
						}
					} else {
						$result['data'] = UserService::getUserDetails($_REQUEST['clientID']);
					}
					if (isset($result['data']['details']['newStatus'])) {
						$result['data']['details']['newStatus'] = UserService::getMasterUserStatus($_REQUEST['clientID']);
					}
					if (isset($result['data']['details'])) {
						$result['data']['details'] = array_merge($result['data']['details'] ?? [], UserService::getUserAutoLogin($_REQUEST['clientID']));
					}
					foreach ($result['data'] as $key => $value) {
						$this->smarty->assign($key, $value);
					}
					$response['content'] = $this->smarty->fetch('adminarea' . DS . 'widgets' . DS . 'adminClientSummaryTabAjax.tpl');
					$response['dataRaw'] = $result['data'];
					$response['responseRawRaw'] = $result;
					break;
				case 'createTag':
					$response = self::runClientAttributesAction([
						'actionName' => 'createTag',
						'clientID'   => $_REQUEST['clientID'],
						'name'       => $_REQUEST['name'],
						'color'      => $_REQUEST['color']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'assignTag':
					$response = self::runClientAttributesAction([
						'actionName' => 'assignTag',
						'clientID'   => $_REQUEST['clientID'],
						'tag_id'     => $_REQUEST['tag_id']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'unassignTag':
					$response = self::runClientAttributesAction([
						'actionName' => 'unassignTag',
						'clientID'   => $_REQUEST['clientID'],
						'tag_id'     => $_REQUEST['tag_id']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'createComment':
					$response = self::runClientAttributesAction([
						'actionName' => 'createComment',
						'clientID'   => $_REQUEST['clientID'],
						'comment'    => $_REQUEST['comment']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'editComment':
					$response = self::runClientAttributesAction([
						'actionName' => 'editComment',
						'clientID'   => $_REQUEST['clientID'],
						'comment'    => $_REQUEST['comment'],
						'comment_id' => $_REQUEST['comment_id']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'removeComment':
					$response = self::runClientAttributesAction([
						'actionName' => 'removeComment',
						'clientID'   => $_REQUEST['clientID'],
						'comment_id' => $_REQUEST['comment_id']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'setClientSettings':
					$response = self::runClientAttributesAction([
						'actionName' => 'setClientSettings',
						'clientID'   => $_REQUEST['clientID'],
						'name'       => $_REQUEST['name'],
						'value'      => $_REQUEST['value']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'removeTag':
					$response = self::runClientAttributesAction([
						'actionName' => 'removeTag',
						'clientID'   => $_REQUEST['clientID'],
						'tag_id'     => $_REQUEST['tag_id']
					]);
					$response['responseRawRaw'] = $result;
					break;
				case 'editTag':
					$response = self::runClientAttributesAction([
						'actionName' => 'editTag',
						'clientID'   => $_REQUEST['clientID'],
						'name'       => $_REQUEST['name'],
						'color'      => $_REQUEST['color'],
						'tag_id'     => $_REQUEST['tag_id']
					]);
					$response['responseRawRaw'] = $result;
					break;
			}

		} catch (Exception $exception) {
			$response = [
				'status'  => FALSE,
				'message' => $exception->getMessage(),
				'data'    => FALSE,
				'type'    => 'error'
			];
		}

		return $this->jsonResponse($this->prepare($response, $result));
	}

	/**
	 * @param array $params
	 * @param array $responseData
	 * @param       $smartyObject
	 * @return array|void
	 */
	public static function getRemoteData(array $params = [], array &$responseData = [], $smartyObject = null)
	{
		try {
			if (isset($params['CLIENT_ID'])) {
				$params['CLIENT_DATA'] = UserService::getUserRawData($params['CLIENT_ID']);
			}
			$response = Connection::get('/api/connector/whmcs', $params);
			if (isset($response['data']['info'])) {
				$responseData['info'] = $response['data']['info'];
				if (is_object($smartyObject)) {
					$smartyObject->assign('info', $response['data']['info']);
				}
				unset($response['data']['info']);
			}
			if (isset($response['data']['application'])) {
				$responseData['application'] = $response['data']['application'];
				$smartyObject->assign('requestApplicationInfo', $response['data']['application']);
				unset($response['data']['application']);
			}
			if (isset($response['status'])) {
				if ($response['status'] == 'error') {
					$response = ['status' => FALSE, 'message' => isset($response['message']) ? $response['message'] : '', 'type' => 'error', 'data' => FALSE];
				} elseif ($response['status'] == 'success') {
					$response = ['status' => TRUE, 'data' => empty($response['data']) ? FALSE : $response['data']];
				}
			} else {
				$response = ['status' => FALSE, 'message' => isset($response['message']) ? $response['message'] : '', 'type' => 'error', 'data' => FALSE];
			}
			$response['requestStatus'] = $response['status'];
			$smartyObject->assign('requestStatus', $response['status']);
			if (isset($response['message'])) {
				$response['requestMessage'] = $response['message'];
				$smartyObject->assign('requestMessage', $response['message']);
			}
			if (isset($response['type'])) {
				$response['requestType'] = $response['type'];
				$smartyObject->assign('requestType', $response['type']);
			}
		} catch (Exception $exception) {
			$response = ['status' => FALSE, 'message' => $exception->getMessage(), 'type' => 'error', 'data' => FALSE];
		}
		return $response;

	}

	/**
	 * @param $actionName
	 * @param $params
	 * @return void
	 */
	private function runClientAttributesAction($params)
	{
		try {
			$response = Connection::send('/api/connector/whmcs', ['METRICSCUBE_CONNECTOR_ACTION' => 'CHANGE_CLIENT_ATTRIBUTES', 'CLIENT_ID' => $params['clientID'], 'PARAMS' => $params]);
			if (isset($response['status']) && $response['status'] == 'success') {
				return isset($response['data']) ? $response['data'] : [];
			}
			return $response;
		} catch (Exception $exception) {
			return ['status' => FALSE];
		}
	}

	/**
	 * @param $response
	 * @param $result
	 * @return array
	 */
	private function prepare($response, $result)
	{
		if (isset($result['requestStatus'])) {
			$response['requestStatus'] = $result['requestStatus'];
		}
		if (isset($result['requestMessage'])) {
			$response['requestMessage'] = $result['requestMessage'];
		}
		if (isset($result['requestType'])) {
			$response['requestType'] = $result['requestType'];
		}
		return $response;
	}
}