<?php

namespace MetricsCube\Service;

use Exception;
use MetricsCube\Controller\Admin\ElementsController;
use MetricsCube\Database\Migrator;
use MetricsCube\Helpers\AddonHelper;
use MetricsCube\Models\Clients;
use MetricsCube\Models\InvoiceItems;
use MetricsCube\Models\MetricsCubeEvents;
use MetricsCube\Models\Upgrades;
use MetricsCube\Utils\Util;
use MetricsCube\View\ViewHelper;
use MetricsCube\Widgets\QuickStatistics;
use Smarty;
use WHMCS\Database\Capsule;

/**
 * Class Hooks
 * @package MetricsCube\Service
 */
class Hooks
{

	/**
	 * @throws \Exception
	 */
	public static function MC_Requests()
	{
		if (isset($_POST['module']) && $_POST['module'] == 'MetricsCube' && isset($_POST['moduleAction']) && strpos($_POST['moduleAction'], 'invitation_') === 0) {
			$response = [];
			switch ($_POST['moduleAction']) {
				case 'invitation_activateAddon':
					try {
						AddonHelper::activateAddon();
						$response['status'] = 'success';
						$response['next_action'] = 'mc_registerAccount';
					} catch (Exception $exception) {
						$response = ['status' => 'error', 'message' => $exception->getMessage()];
					}
					break;
				case 'invitation_registerAccount':
					$params = AutoActivation::checkPromocode(['email' => $_POST['email'] ?? '', 'password' => $_POST['password'] ?? '', 'privacy' => $_POST['privacy'] ?? '', 'generate_app_key' => 'whmcs']);
					$response = AddonHelper::registerAccount($params);
					if ($response['status'] == 'success') {
						$config = Configuration::getInstance();
						if (isset($response['key']) && !empty($response['key'])) {
							$config->set('AppKey', $response['key']);
						}
						$response['next_action'] = 'mc_redirectAndActivate';
					}
					break;
				case 'invitation_welcome_activate':
					try {
						$migration = new Migrator(dirname(__DIR__, 2));
						$migration->runMigrationsUp();
						AddonHelper::activateAddon();
						if (isset($_SESSION['adminid'])) {
							Permissions::checkRoles();
							Permissions::setAllAdminPermissions($_SESSION['adminid']);
							AddonHelper::setWidgetsOrder($_SESSION['adminid']);
						}
						$response['status'] = 'success';
						$response['redirect'] = Util::getAdminUrl();
					} catch (\Throwable $exception) {
						$response = ['status' => 'error', 'message' => $exception->getMessage()];
					}
					break;
				case 'invitation_welcome_later':
					try {
						$response['status'] = 'success';
						\MetricsCube\Utils\Util::setWelcomeCookie('METRICSCUBE_WELCOME_POPUP', 72);
					} catch (\Throwable $exception) {
						$response = ['status' => 'error', 'message' => $exception->getMessage()];
					}
					break;
			}
			header('Content-Type: application/json; charset=utf-8');
			ob_clean();
			echo json_encode($response);
			exit();
		}
	}

	/**
	 * @param $adminID
	 * @return bool
	 */
	public static function checkAdminPerms($adminID)
	{
		$roleID = Capsule::table('tbladmins')->where('id', $adminID)->first();
		if (isset($roleID->roleid)) {
			$access = Capsule::table('tbladminperms')->where('roleid', $roleID->roleid)->where('permid', 46)->first();
			if (isset($access->id)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * @return void
	 */
	public static function register()
	{
		if (Configuration::getInstance()->get('InstantDataSynchronization') == 'on') {
			foreach (self::getHooksList() as $hook) {
				add_hook($hook['name'], 1, function ($vars) use ($hook) {
					$modelNamespace = '\MetricsCube\Models\\';
					$data = [];
					foreach ($hook['models'] as $model => $records) {
						$class = $modelNamespace . $model;
						$models = [];
						foreach ($records as $hookVar => $column) {
							if (is_callable($column)) {
								$callResult = call_user_func($column, $vars);
								$column = $callResult[0];
								$operator = $callResult[1];
								$value = $callResult[2];
								if ($operator == 'IN') {
									if (!empty($value)) {
										$models[] = (new $class)->whereIn($column, $value)->get()->toArray();
									}
								} else {
									$models[] = (new $class)->where($column, $operator, $value)->get()->toArray();
								}
							} else if (is_array($vars[$hookVar])) {
								if (!empty($vars[$hookVar])) {
									$models[] = (new $class)->whereIn($column, $vars[$hookVar])->get()->toArray();
								}
							} else {
								$models[] = (new $class)->where($column, $vars[$hookVar])->get()->toArray();
							}
						}
						if (!empty($models)) {
							$data[$model] = call_user_func_array('array_merge', $models);
						}
					}
					if (!empty($data)) {
						$name = !empty($hook['eventName']) ? $hook['eventName'] : $hook['name'];
						$event = new MetricsCubeEvents();
						$event->hook = $name;
						$event->data = $data;
						$event->date = gmdate('Y-m-d H:i:s');
						$event->created_at = date('Y-m-d H:i:s');
						$event->save();
					}
				});
			}
		}

	}

	/**
	 * @return array
	 */
	public static function getHooksList()
	{
		return [
			[
				'name'   => 'AddInvoiceLateFee',
				'models' => [
					'Invoices'     => ['invoiceid' => 'id'],
					'InvoiceItems' => ['invoiceid' => 'invoiceid'],
				]
			],
			[
				'name'   => 'AddInvoicePayment',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
					'Accounts' => ['invoiceid' => 'invoiceid'],
				]
			],
			[
				'name'   => 'AddTransaction',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
					'Accounts' => ['invoiceid' => 'invoiceid'],
				]
			],
			[
				'name'   => 'CancelAndRefundOrder',
				'models' => [
					'Orders' => ['orderid' => 'id'],
				]
			],
			[
				'name'   => 'InvoiceCancelled',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
				]
			],
			[
				'name'   => 'InvoiceChangeGateway',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
				]
			],
			[
				'name'   => 'InvoiceCreated',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
				]
			],
			[
				'name'   => 'InvoicePaid',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
				]
			],
			[
				'name'   => 'InvoiceRefunded',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
				]
			],
			[
				'name'   => 'InvoiceSplit',
				'models' => [
					'Invoices'     => ['originalinvoiceid' => 'id', 'newinvoiceid' => 'id'],
					'InvoiceItems' => ['originalinvoiceid' => 'invoiceid', 'newinvoiceid' => 'invoiceid'],
				]
			],
			[
				'name'   => 'InvoiceUnpaid',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
				]
			],
			[
				'name'   => 'ManualRefund',
				'models' => [
					'Accounts' => ['transid' => 'id'],
				]
			],
			[
				'name'   => 'UpdateInvoiceTotal',
				'models' => [
					'Invoices' => ['invoiceid' => 'id'],
				]
			],
			[
				'name'   => 'AcceptOrder',
				'models' => [
					'Orders' => ['orderid' => 'id'],
				]
			],
			[
				'name'   => 'AfterShoppingCartCheckout',
				'models' => [
					'Orders'        => ['OrderID' => 'id'],
					'Hostings'      => ['ServiceIDs' => 'id'],
					'HostingAddons' => ['AddonIDs' => 'id'],
					'Domains'       => ['DomainIDs' => 'id', 'RenewalIDs' => 'id'],
					'Invoices'      => ['InvoiceID' => 'id'],
					'InvoiceItems'  => ['InvoiceID' => 'invoiceid'],
				]
			],
			[
				'name'   => 'CancelOrder',
				'models' => [
					'Orders' => ['orderid' => 'id'],
				]
			],
			[
				'name'   => 'DeleteOrder',
				'models' => [
					'Orders' => ['orderid' => 'id'],
				]
			],
			[
				'name'   => 'FraudOrder',
				'models' => [
					'Orders' => ['orderid' => 'id'],
				]
			],
			[
				'name'   => 'OrderPaid',
				'models' => [
					'Orders' => ['orderid' => 'id'],
				]
			],
			[
				'name'   => 'PendingOrder',
				'models' => [
					'Orders' => ['orderid' => 'id'],
				]
			],
			[
				'name'   => 'CancellationRequest',
				'models' => [
					'CancelRequests' => ['relid' => 'relid'],
					'Hostings'       => ['relid' => 'id'],
				]
			],
			[
				'name'   => 'ServiceDelete',
				'models' => [
					'Hostings' => ['serviceid' => 'id'],
				]
			],
			[
				'name'   => 'ServiceEdit',
				'models' => [
					'Hostings' => ['serviceid' => 'id'],
				]
			],
			[
				'name'   => 'AfterModuleChangePackage',
				'models' => [
					'Hostings' => [
						function ($vars) {
							return ['id', '=', $vars['params']['serviceid']];
						}
					],
				]
			],
			[
				'name'   => 'AfterModuleCreate',
				'models' => [
					'Hostings' => [
						function ($vars) {
							return ['id', '=', $vars['params']['serviceid']];
						}
					],
				]
			],
			[
				'name'   => 'AfterModuleSuspend',
				'models' => [
					'Hostings' => [
						function ($vars) {
							return ['id', '=', $vars['params']['serviceid']];
						}
					],
				]
			],
			[
				'name'   => 'AfterModuleTerminate',
				'models' => [
					'Hostings' => [
						function ($vars) {
							return ['id', '=', $vars['params']['serviceid']];
						}
					],
				]
			],
			[
				'name'   => 'AfterModuleUnsuspend',
				'models' => [
					'Hostings' => [
						function ($vars) {
							return ['id', '=', $vars['params']['serviceid']];
						}
					],
				]
			],
			[
				'name'   => 'DomainDelete',
				'models' => [
					'Domains' => ['domainid' => 'id'],
				]
			],
			[
				'name'   => 'DomainEdit',
				'models' => [
					'Domains' => ['domainid' => 'id'],
				]
			],
			[
				'name'   => 'DomainTransferCompleted',
				'models' => [
					'Domains' => ['domainid' => 'id'],
				]
			],
			[
				'name'   => 'AfterRegistrarRegistration',
				'models' => [
					'Domains' => [
						function ($vars) {
							return ['id', '=', $vars['params']['domainid']];
						}
					],
				]
			],
			[
				'name'   => 'AfterRegistrarRenewal',
				'models' => [
					'Domains' => [
						function ($vars) {
							return ['id', '=', $vars['params']['domainid']];
						}
					],
				]
			],
			[
				'name'   => 'AfterRegistrarTransfer',
				'models' => [
					'Domains' => [
						function ($vars) {
							return ['id', '=', $vars['params']['domainid']];
						}
					],
				]
			],
			[
				'name'   => 'AddonActivated',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonAdd',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonCancelled',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonDeleted',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonEdit',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonRenewal',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonSuspended',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonTerminated',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AddonUnsuspended',
				'models' => [
					'HostingAddons' => ['id' => 'id'],
				]
			],
			[
				'name'   => 'AfterAddonUpgrade',
				'models' => [
					'Upgrades' => ['upgradeid' => 'id'],
				]
			],
			[
				'name'   => 'ProductAddonDelete',
				'models' => [
					'Addons' => ['addonid' => 'id'],
				]
			],
			[
				'name'   => 'AfterClientMerge',
				'models' => [
					'Clients' => ['toUserID' => 'id', 'fromUserID' => 'id'],
				]
			],
			[
				'name'   => 'ClientAdd',
				'models' => [
					'Clients' => ['userid' => 'id'],
				]
			],
			[
				'name'   => 'ClientClose',
				'models' => [
					'Clients' => ['userid' => 'id'],
				]
			],
			[
				'name'   => 'ClientDelete',
				'models' => [
					'Clients' => ['userid' => 'id'],
				]
			],
			[
				'name'   => 'ClientEdit',
				'models' => [
					'Clients' => ['userid' => 'id'],
				]
			],
			[
				'name'   => 'AfterProductUpgrade',
				'models' => [
					'Upgrades' => ['upgradeid' => 'id'],
					'Hostings' => [
						function ($vars) {
							$relid = (new Upgrades)->where('id', $vars['upgradeid'])->first()->relid;
							return ['id', '=', $relid];
						}
					],
				]
			],
			[
				'name'   => 'ProductDelete',
				'models' => [
					'Products' => ['pid' => 'id'],
				]
			],
			[
				'name'   => 'ProductEdit',
				'models' => [
					'Products' => ['pid' => 'id'],
				]
			],
			[
				'name'   => 'TicketAdminReply',
				'models' => [
					'TicketReplies' => ['replyid' => 'id'],
				]
			],
			[
				'name'   => 'TicketClose',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketDelete',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketDeleteReply',
				'models' => [
					'TicketReplies' => ['replyid' => 'id'],
				]
			],
			[
				'name'   => 'TicketDepartmentChange',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketFlagged',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketOpen',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketOpenAdmin',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketPriorityChange',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketStatusChange',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketSubjectChange',
				'models' => [
					'Tickets' => ['ticketid' => 'id'],
				]
			],
			[
				'name'   => 'TicketUserReply',
				'models' => [
					'TicketReplies' => ['replyid' => 'id'],
				]
			],
			[
				'name'   => 'ClientAreaRegister',
				'models' => [
					'Clients' => ['userid' => 'id'],
				]
			],
			[
				'name'   => 'AfterConfigOptionsUpgrade',
				'models' => [
					'Upgrades' => ['upgradeid' => 'id'],
				]
			],
			[
				'name'      => 'InvoicePaid',
				'eventName' => 'Renewal',
				'models'    => [
					'InvoiceItems' => [
						function ($vars) {
							$renewals = [];
							$items = (new InvoiceItems)->where('invoiceid', $vars['invoiceid'])->get();
							foreach ($items as $item) {
								switch ($item->type) {
									case 'Domain':
										$renewals[] = $item->id;
										break;
									case 'Hosting':
										$previous = (new InvoiceItems)
											->where('type', 'Hosting')
											->where('relid', $item->relid)
											->where('invoiceid', '<', $item->invoiceid)
											->count();
										if ($previous > 0) {
											$renewals[] = $item->id;
										}
										break;
									case 'Addon':
										$previous = (new InvoiceItems)
											->where('type', 'Addon')
											->where('relid', $item->relid)
											->where('invoiceid', '<', $item->invoiceid)
											->count();
										if ($previous > 0) {
											$renewals[] = $item->id;
										}
										break;
								}
							}
							return ['id', 'IN', $renewals];
						}
					],
				]
			],
			[
				'name'      => 'EmailPreSend',
				'eventName' => 'PaymentFailed',
				'models'    => [
					'Invoices' => [
						function ($vars) {
							if (!in_array($vars['messagename'], ["Credit Card Payment Failed", "Direct Debit Payment Failed"])) {
								return ['id', 'IN', ''];
							}
							return ['id', '=', $vars['relid']];
						}
					],
				]
			]
		];
	}

	/**
	 * @return void
	 */
	public static function registerAdditional()
	{
		if (Configuration::getInstance()->get('UserTracking') == 'on') {
			add_hook('ClientAreaFooterOutput', 1, function ($vars) {
				$token = Configuration::getInstance()->get('ConnKey', '');
				if (empty($token)) {
					return '';
				}
				$hash = '';
				if (!empty($_SESSION['uid'])) {
					$user = Clients::where('id', $_SESSION['uid'])->first();
					if (!is_null($user)) {
						$hash = $user->email_hash;
					}
				}
				$token = sha1($token);
				$url = Connection::getApiUrl();
				return <<<MCS
<script type="text/javascript">
window.addEventListener("load", function () {
    var t = "{$token}";
    var h = "{$hash}";
    var tit = document.title;
    var url = "{$url}/s?" + 
              "t=" + encodeURIComponent(t) +
              "&tit=" + encodeURIComponent(tit) +
              "&h=" + encodeURIComponent(h) +
              "&s=" + encodeURIComponent(window.location.href);
    if (navigator.sendBeacon) {
        var data = new Blob([], { type: "application/x-www-form-urlencoded" });
        navigator.sendBeacon(url, data);
        return;
	}
    if (window.fetch) {
        fetch(url, { method: "GET", keepalive: true, credentials: "include" }).catch(()=>{});
        return;
    }
    var img = new Image();
    img.src = url + "&_=" + Math.random();
})
</script>
MCS;
			});
		}
	}

	/**
	 * @param $userID
	 * @return bool|string|void
	 */
	public static function registerAdminAreaClientSummaryPage($userID)
	{
		if (Configuration::getInstance()->get('UserWidgetProfile') == 'on') {
			return (new ElementsController())->AdminAreaClientSummaryTab($userID);
		}
	}

	/**
	 * @param $vars
	 * @return string
	 */
	public static function registerAdminAreaHeadOutput($vars)
	{
		$return = '';
		$connKey = FALSE;
		if (strlen(Configuration::getInstance()->get('ConnKey')) > 0) {
			$connKey = TRUE;
		}
		if ($connKey === FALSE) {
			$return .= <<<HTML
<script type="text/javascript" src="../modules/addons/MetricsCube/assets/js/mainMenuLinkNotConnected.js"></script>
HTML;
		}
		if (Configuration::getInstance()->get('MainMenuLink') == 'on' && $connKey) {
			$return .= <<<HTML
<script type="text/javascript" src="../modules/addons/MetricsCube/assets/js/mainMenuLink.js"></script>
HTML;
		}
		$return .= <<<HTML
<script type="text/javascript" src="../modules/addons/MetricsCube/assets/js/registerAdminAreaPageHook.js"></script>
HTML;
		$adminURL = rtrim(Util::getAdminUrl(), '/') . '/';
		$url      = rtrim(Util::getSystemUrl(), '/') . '/';
		$return .= <<<HTML
<script type="text/javascript">
window.MCWhmcsAdminUrl = '{$adminURL}';
window.MCWhmcsUrl = '{$url}';
</script>
HTML;
		return $return;
	}

	public static function registerAdminAreaPage($vars)
	{
		$permissions = [];
		try {
			$permissions = Permissions::loadAdminPermissions($vars['adminid']);
		} catch (Exception $exception) {

		}
		$settings = Configuration::getInstance()->all();
		$vars['MetricsCubePermissions'] = $permissions;
		$vars['MetricsCubeSettings'] = $settings;
		$JSONPermissions = json_encode($permissions);
		$JSONSettings = json_encode($settings);
		$vars['jscode'] .= <<<EOMC

window.MCPermissions = {$JSONPermissions};

window.MCSettings = {$JSONSettings};

EOMC;
		return $vars;
	}

	/**
	 * @param $vars
	 * @return array
	 */
	public static function registerAdminClientDomainsTab($vars)
	{
		if (Configuration::getInstance()->get('UserWidgetServiceDetails') == 'on') {
			$userID = null;
			if (isset($_GET['userid'])) {
				$userID = (int)$_GET['userid'];
			}
			$domainID = null;
			if (isset($_GET['domainid']) || isset($_GET['id'])) {
				$domainID = isset($_GET['domainid']) ? (int)$_GET['domainid'] : (int)$_GET['id'];
			}
			if (is_null($userID) && is_null($domainID)) {
				return $vars;
			}
			if (is_null($domainID)) {
				$domain = Capsule::table('tbldomains')->where('userid', $userID)->orderBy('domain', 'ASC')->first();
				if (is_null($domain)) {
					return $vars;
				}
				$domainID = $domain->id;
			}
			$vars['jquerycode'] .= str_replace(['{clientID}', '{domainID}'], [$userID, $domainID], file_get_contents(METRICSCUBE . DS . 'assets' . DS . 'js' . DS . 'adminClientDomainsTab.js'));
		}
		return $vars;
	}

	/**
	 * @param $vars
	 * @return array
	 */
	public static function registerAdminClientServicesTab($vars)
	{
		if (Configuration::getInstance()->get('UserWidgetServiceDetails') == 'on') {
			$userID = null;
			$serviceID = null;
			if (isset($_GET['userid'])) {
				$userID = (int)$_GET['userid'];
			}
			if (isset($_GET['productselect']) || isset($_GET['id'])) {
				$serviceID = isset($_GET['productselect']) ? $_GET['productselect'] : $_GET['id'];
			}
			if (is_null($userID) && is_null($serviceID)) {
				return $vars;
			}
			if (!is_null($serviceID)) {
				if (substr($serviceID, 0, 1) == "a") {
					$aid = (int)substr($serviceID, 1);
				} else {
					$id = (int)$serviceID;
				}
			}
			if (isset($id)) {
				$serviceID = $id;
			} elseif (isset($aid)) {
				$addon = Capsule::table('tblhostingaddons')->where('userid', $userID)->where('id', $aid)->first();
				if (is_null($addon)) {
					return $vars;
				}
				$serviceID = $addon->hostingid;
			} else {
				$service = Capsule::table('tblhosting')->where('userid', $userID)->orderBy('domain', 'ASC')->first();
				if (is_null($service)) {
					return $vars;
				}
				$serviceID = $service->id;
			}
			$vars['jquerycode'] .= str_replace(['{clientID}', '{serviceID}'], [$userID, $serviceID], file_get_contents(METRICSCUBE . DS . 'assets' . DS . 'js' . DS . 'adminClientServicesTab.js'));
		}
		return $vars;
	}

	/**
	 * @return QuickStatistics|void
	 */
	public static function registerAdminHomeWidgets()
	{
		if (Configuration::getInstance()->get('StatisticsWidget') == 'on') {
			if (class_exists('\WHMCS\Module\AbstractWidget')) {
				return new QuickStatistics();
			} else {
				$title = "MetricsCube Analitycs";
				$path = sprintf('%s%s%s%s%s%s%s%s%s', METRICSCUBE, DS, 'views', DS, 'adminarea', DS, 'widgets', DS, 'dashboardWidget.tpl');
				if (file_exists($path)) {
					return ['title' => $title, 'content' => file_get_contents($path)];
				}
			}

		}
	}

	public static function registerAdminHomeWidgetsScript(array $vars)
	{
		if (Configuration::getInstance()->get('StatisticsWidget') == 'on') {
			$vars['jquerycode'] .= file_get_contents(METRICSCUBE . DS . 'assets' . DS . 'js' . DS . 'adminAreaDashboardWidget.js');
		}
		return $vars;
	}

}