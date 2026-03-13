<?php

namespace MetricsCube\Service;

use Exception;
use MetricsCube\Helpers\CurrencyHelper;
use MetricsCube\Helpers\TimeHelper;
use MetricsCube\Models\Clients;
use MetricsCube\Modules\Billing\Services\Currency;
use WHMCS\Database\Capsule;
use WHMCS\Config\Setting;

/**
 *
 */
class UserService
{
	public static function getMasterUserStatus($userID)
	{
		$client = Capsule::table('tblclients')->where('id', $userID)->first();
		if (isset($client->status) && $client->status == 'Active') {
			return [
				[
					'name'        => 'Active',
					'safeName'    => 'active',
					'description' => ''
				]
			];
		}
		return [
			[
				'name'        => 'Inactive',
				'safeName'    => 'inactive',
				'description' => ''
			]
		];
	}

	public static function getAdminLink($url = '')
	{
		return sprintf('%s://%s%s/%s', (empty($_SERVER['HTTPS']) ? 'http' : 'https'), $_SERVER['HTTP_HOST'], dirname($_SERVER['PHP_SELF']), ltrim($url, '/'));
	}

	/**
	 * @param $userID
	 * @return array
	 */
	public static function getUserDetails($userID)
	{
		$client = Capsule::table('tblclients')->where('id', $userID)->first();
		$address = '';
		if (strlen($client->address1) > 0) {
			$address .= sprintf('%s, ', $client->address1);
		}
		if (strlen($client->address2) > 0) {
			$address .= sprintf('%s, ', $client->address2);
		}
		if (strlen($client->postcode) > 0) {
			$address .= sprintf('%s, ', $client->postcode);
		}
		if (strlen($client->city) > 0) {
			$address .= sprintf('%s, ', $client->city);
		}
		if (strlen($client->state) > 0) {
			$address .= sprintf('%s, ', $client->state);
		}
		if (strlen($client->country) > 0) {
			$address .= sprintf('%s', $client->country);
		}
		return [
			'activity'       => FALSE,
			'comments'       => FALSE,
			'details'        => [
				'address'     => $address,
				'avatar'      => sprintf('https://www.gravatar.com/avatar/%s?s=80&r=g&d=identicon', md5(strtolower(trim($client->email)))),
				'brands'      => FALSE,
				'companyname' => $client->companyname,
				'email'       => $client->email,
				'name'        => sprintf('%s %s', $client->firstname, $client->lastname),
				'phonenumber' => $client->phonenumber,
				'newStatus'   => self::getUserStatus($userID)
			],
			'income'         => self::getUserIncome($userID),
			'services'       => self::getAllClientServices($userID),
			'settings'       => FALSE,
			'summaryURL'     => FALSE,
			'tags'           => FALSE,
			'tags_available' => FALSE,
			'tags_colors'    => FALSE,
			'tickets'        => self::geClientTickets($userID)
		];
	}

	/**
	 * @param $userID
	 * @param $serviceID
	 * @return array
	 */
	public static function getUserServiceDetails($userID, $serviceID)
	{
		$details = self::getUserDetails($userID);
		$service = Capsule::table('tblhosting')->where('id', $serviceID)->first();
		$details['serviceID'] = $serviceID;
		$details['serviceMRR'] = FALSE;
		$details['serviceIncome'] = self::getUserServiceTotalIncome($userID, $serviceID);
		$details['serviceActiveSince']['diff'] = TimeHelper::getTimeDiffFormatted($service->regdate);
		$details['serviceActiveSince']['formattedDate'] = TimeHelper::formatForAdmin($service->regdate);
		$domain = Capsule::table('tbldomains')->where('domain', $service->domain)->where('userid', $userID)->first();
		if (is_null($domain)) {
			$details['serviceAssignedDomain'] = FALSE;
		} else {
			$details['serviceAssignedDomain'] = [
				'status'     => $domain->status,
				'domainLink' => sprintf('clientsdomains.php?userid=%s&domainid=%s', $userID, $domain->id),
				'domain'     => $domain->domain
			];
		}
		$services = Capsule::table('tblhosting')
			->where('userid', $userID)
			->where('domain', $domain->domain)
			->where('tblhosting.id', '<>', $serviceID)
			->join('tblproducts', 'tblhosting.packageid', '=', 'tblproducts.id')
			->join('tblproductgroups', 'tblproducts.gid', '=', 'tblproductgroups.id')
			->select('tblhosting.id as serviceid')
			->addSelect('tblproducts.name as productName')
			->addSelect('tblproductgroups.name as productGroupName')
			->addSelect('tblhosting.domainstatus as domainstatus')
			->addSelect('tblhosting.regdate as regdate')
			->get();
		if (is_null($services)) {
			$details['serviceRelatedServices'] = FALSE;
		} else {
			foreach ($services as $service) {
				$details['serviceRelatedServices'][] = [
					'status'           => $service->domainstatus,
					'id'               => $service->serviceid,
					'link'             => sprintf('clientsservices.php?userid=%s&id=%s', $userID, $service->serviceid),
					'regFormattedDate' => TimeHelper::formatForAdmin($service->regdate),
					'productName'      => $service->productName,
					'productGroupName' => $service->productGroupName
				];
			}
		}
		return $details;
	}

	/**
	 * @param $userID
	 * @param $domainID
	 * @return array
	 */
	public static function getUserDomainDetails($userID, $domainID)
	{
		$details = self::getUserDetails($userID);
		$domain = Capsule::table('tbldomains')->where('id', $domainID)->where('userid', $userID)->first();
		$details['domainID'] = $domainID;
		$details['domainMRR'] = FALSE;
		$details['domainName'] = $domain->domain;
		$details['domainIncome'] = self::getUserDomainTotalIncome($userID, $domainID);
		$details['domainActiveSince']['diff'] = TimeHelper::getTimeDiffFormatted($domain->registrationdate);
		$details['domainActiveSince']['formattedDate'] = TimeHelper::formatForAdmin($domain->registrationdate);
		$services = Capsule::table('tblhosting')
			->where('userid', $userID)
			->where('domain', $domain->domain)
			->join('tblproducts', 'tblhosting.packageid', '=', 'tblproducts.id')
			->join('tblproductgroups', 'tblproducts.gid', '=', 'tblproductgroups.id')
			->select('tblhosting.id as serviceid')
			->addSelect('tblproducts.name as productName')
			->addSelect('tblproductgroups.name as productGroupName')
			->addSelect('tblhosting.domainstatus as domainstatus')
			->addSelect('tblhosting.regdate as regdate')
			->get();
		if (is_null($services)) {
			$details['domainRelatedServices'] = FALSE;
		} else {
			foreach ($services as $service) {
				$details['domainRelatedServices'][] = [
					'status'           => $service->domainstatus,
					'id'               => $service->serviceid,
					'link'             => sprintf('clientsservices.php?userid=%s&id=%s', $userID, $service->serviceid),
					'regFormattedDate' => TimeHelper::formatForAdmin($service->regdate),
					'productName'      => $service->productName,
					'productGroupName' => $service->productGroupName
				];
			}
		}
		return $details;
	}

	/**
	 * @param $userID
	 * @return array[]
	 */
	public static function getUserStatus($userID)
	{
		$activeService = Capsule::table('tblhosting')->where('userid', $userID)->where('domainstatus', 'Active')->first();
		if (!is_null($activeService)) {
			return [
				[
					'name'        => 'Active',
					'safeName'    => 'active',
					'description' => ''
				]
			];
		}
		$activeService = Capsule::table('tbldomains')->where('userid', $userID)->where('status', 'Active')->first();
		if (!is_null($activeService)) {
			return [
				[
					'name'        => 'Active',
					'safeName'    => 'active',
					'description' => ''
				]
			];
		}
		return [
			[
				'name'        => 'Inactive',
				'safeName'    => 'inactive',
				'description' => ''
			]
		];
	}

	/**
	 * @param $userID
	 * @return string
	 */
	public static function getUserTotalIncome($userID)
	{
		$accountsSum = Capsule::table('tblaccounts')
			->where('tblaccounts.userid', $userID)
			->sum('tblaccounts.amountin');
		return CurrencyHelper::formatByClient($accountsSum, $userID);
	}

	/**
	 * @param $userID
	 * @return string
	 */
	public static function getUserSumOfPaid($userID)
	{
		$invoicesTotal = Capsule::table('tblinvoices')
			->where('tblinvoices.userid', $userID)
			->where('tblinvoices.status', 'Paid')
			->sum(function ($row) {
				return $row->total + $row->credit;
			});
		return CurrencyHelper::formatByClient($invoicesTotal, $userID);
	}

	/**
	 * @param $userID
	 * @return string
	 */
	public static function getUserSumOfUnpaid($userID)
	{
		$invoicesTotal = Capsule::table('tblinvoices')
			->where('tblinvoices.userid', $userID)
			->where('tblinvoices.status', 'Unpaid')
			->sum('tblinvoices.total');
		return CurrencyHelper::formatByClient($invoicesTotal, $userID);
	}

	/**
	 * @param $userID
	 * @return string
	 */
	public static function getUserCreditBalance($userID)
	{
		$creditsAmount = Capsule::table('tblcredit')
			->where('tblcredit.clientid', $userID)
			->sum('tblcredit.amount');
		return CurrencyHelper::formatByClient($creditsAmount, $userID);
	}

	/**
	 * @param $userID
	 * @param $serviceID
	 * @return string
	 */
	public static function getUserServiceTotalIncome($userID, $serviceID)
	{
		$invoiceItems = Capsule::table('tblinvoiceitems')
			->join('tblinvoices', 'tblinvoiceitems.invoiceid', '=', 'tblinvoices.id')
			->where('tblinvoiceitems.relid', $serviceID)
			->whereIn('tblinvoiceitems.type', ['Hosting', 'Setup'])
			->where('tblinvoices.status', 'Paid')
			->sum('tblinvoiceitems.amount');
		return CurrencyHelper::formatByClient($invoiceItems, $userID);
	}

	/**
	 * @param $userID
	 * @param $domainID
	 * @return string
	 */
	public static function getUserDomainTotalIncome($userID, $domainID)
	{
		$invoiceItems = Capsule::table('tblinvoiceitems')
			->join('tblinvoices', 'tblinvoiceitems.invoiceid', '=', 'tblinvoices.id')
			->where('tblinvoiceitems.relid', $domainID)
			->where('tblinvoiceitems.type', 'like', 'Domain%')
			->where('tblinvoices.status', 'Paid')
			->sum('tblinvoiceitems.amount');
		return CurrencyHelper::formatByClient($invoiceItems, $userID);
	}

	/**
	 * @param $userID
	 * @return array
	 */
	private static function getUserDomains($userID)
	{
		$domainsQuery = Capsule::table('tbldomains')
			->select('tbldomains.status as domainstatus')
			->addSelect('tbldomains.registrationdate as registrationdate')
			->addSelect('tbldomains.id as service_id')
			->addSelect('tbldomains.domain as domain')
			->where('tbldomains.userid', $userID)
			->orderBy('tbldomains.registrationdate', 'desc')->get();
		$domains = [];
		try {
			foreach ($domainsQuery as $domain) {
				$domain = (array)$domain;
				$domain['directUrl'] = sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('clientsdomains.php?userid=%s&domainid=%s"', $userID, $domain['service_id'])));
				$domain['whoisURL'] = sprintf('https://who.is/whois/%s', $domain['domain']);
				$domain['intoDNSURL'] = sprintf('https://intodns.com/%s', $domain['domain']);
				$domains[] = $domain;
			}
		} catch (Exception $exception) {
		}
		return [
			'list'   => $domains,
			'counts' => self::countByStatus($domains, 'domainstatus')
		];
	}

	/**
	 * @param $userID
	 * @return array
	 */
	private static function getUserServices($userID)
	{
		$servicesQuery = Capsule::table('tblhosting')
			->select('tblhosting.domainstatus as domainstatus')
			->addSelect('tblhosting.regdate as regdate')
			->addSelect('tblhosting.id as service_id')
			->addSelect('tblhosting.domain as domain')
			->addSelect('tblproducts.name as product_name')
			->where('tblhosting.userid', $userID)
			->join('tblproducts', 'tblhosting.packageid', '=', 'tblproducts.id')
			->orderBy('tblhosting.regdate', 'desc')->get();

		$addonsQuery = Capsule::table('tblhostingaddons')
			->select('tblhostingaddons.status as status')
			->addSelect('tblhostingaddons.regdate as regdate')
			->addSelect('tblhostingaddons.id as service_id')
			->addSelect('tblhosting.id as hosting_id')
			->addSelect('tblhostingaddons.status as status')
			->addSelect('tblhosting.domain as domain')
			->addSelect('tblhostingaddons.name as name')
			->addSelect('tbladdons.name as addonName')
			->join('tblhosting', 'tblhostingaddons.hostingid', '=', 'tblhosting.id')
			->leftJoin('tbladdons', 'tblhostingaddons.addonid', '=', 'tbladdons.id')
			->where('tblhosting.userid', $userID)
			->orderBy('tblhostingaddons.regdate', 'desc')->get();
		$serviceAddons = [];
		foreach ($addonsQuery as $addon) {
			if (!isset($serviceAddons[$addon->hosting_id])) {
				$serviceAddons[$addon->hosting_id] = [];
			}
			$addon = (array)$addon;
			$addon['name'] = (strlen($addon['name'] > 0)) ? $addon['name'] : $addon['addonName'];
			unset($addon['addonName']);
			$addon['directUrl'] = sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('clientsservices.php?userid=%s&id=%s&aid=%s"', $userID, $addon['hosting_id'], $addon['service_id'])));
			$serviceAddons[$addon['hosting_id']][] = $addon;
		}
		$services = [];
		try {
			foreach ($servicesQuery as $service) {
				$service = (array)$service;
				$service['directUrl'] = sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('clientsservices.php?userid=%s&id=%s"', $userID, $service['service_id'])));
				$service['whoisURL'] = sprintf('https://who.is/whois/%s', $service['domain']);
				$service['intoDNSURL'] = sprintf('https://intodns.com/%s', $service['domain']);
				if (isset($serviceAddons[$service['service_id']])) {
					$service['addons'] = $serviceAddons[$service['service_id']];
				} else {
					$service['addons'] = [];
				}
				$services[] = $service;
			}
		} catch (Exception $exception) {
		}


		return [
			'list'   => $services,
			'counts' => self::countByStatus($services, 'domainstatus')
		];
	}

	/**
	 * @param $userID
	 * @return array
	 */
	private static function getUserAddons($userID)
	{
		$addonsQuery = Capsule::table('tblhostingaddons')
			->select('tblhostingaddons.status as status')
			->addSelect('tblhostingaddons.regdate as regdate')
			->addSelect('tblhostingaddons.id as service_id')
			->addSelect('tblhosting.id as hosting_id')
			->addSelect('tblhostingaddons.status as status')
			->addSelect('tblhosting.domain as domain')
			->addSelect('tblhostingaddons.name as name')
			->addSelect('tbladdons.name as addonName')
			->join('tblhosting', 'tblhostingaddons.hostingid', '=', 'tblhosting.id')
			->leftJoin('tbladdons', 'tblhostingaddons.addonid', '=', 'tbladdons.id')
			->where('tblhosting.userid', $userID)
			->orderBy('tblhostingaddons.regdate', 'desc')->get();
		$addons = [];
		try {
			foreach ($addonsQuery as $addon) {
				$addon = (array)$addon;
				$addon['name'] = (strlen($addon['name'] > 0)) ? $addon['name'] : $addon['addonName'];
				unset($addon['addonName']);
				$addon['directUrl'] = sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('clientsservices.php?userid=%s&id=%s&aid=%s"', $userID, $addon['hosting_id'], $addon['service_id'])));
				$addons[] = $addon;
			}
		} catch (Exception $exception) {
		}
		return [
			'list'   => $addons,
			'counts' => self::countByStatus($addons, 'status')
		];
	}

	/**
	 * @param $userID
	 * @return array
	 */
	private static function geClientTickets($userID)
	{
		$ticketsQuery = Capsule::table('tbltickets')
			->select('tbltickets.id as tickets_id')
			->addSelect('tbltickets.title as topic')
			->addSelect('tbltickets.tid as tickets_tid')
			->addSelect('tbltickets.date as tickets_created')
			->addSelect('tbltickets.lastreply as tickets_last_reply')
			->addSelect('tbltickets.status as status')
			->where('tbltickets.userid', $userID)
			->orderBy('tbltickets.date', 'desc')->get();
		$opened = [];
		$closed = [];
		try {
			foreach ($ticketsQuery as $ticket) {
				$ticket = (array)$ticket;
				$ticket['directUrl'] = self::getAdminLink(sprintf('supporttickets.php?action=view&id=%s', $ticket['tickets_id']));
				if ($ticket['status'] == 'Closed') {
					$closed[] = (array)$ticket;
				} else {
					$opened[] = (array)$ticket;
				}
			}
		} catch (Exception $exception) {
		}
		return [
			'activeTicketsCount' => count($opened),
			'closedTicketsCount' => count($closed),
			'closedTickets'      => $closed,
			'activeTickets'      => $opened,
			'allTicketsURL'      => self::getAdminLink(sprintf('index.php?rp=/admin/client/%s/tickets', $userID))
		];
	}

	/**
	 * @param array  $services
	 * @param string $statusKeyName
	 * @return array
	 */
	private static function countByStatus($services, $statusKeyName)
	{
		$counts = [];
		foreach ($services as $service) {
			if (!isset($counts[$service[$statusKeyName]])) {
				$counts[$service[$statusKeyName]] = 0;
			}
			$counts[$service[$statusKeyName]]++;
		}
		return $counts;
	}

	/**
	 * @param $userID
	 * @return array
	 */
	private static function getAllClientServices($userID)
	{
		$services = self::getUserServices($userID);
		$domains = self::getUserDomains($userID);
		$addons = self::getUserAddons($userID);
		foreach ($services['list'] as $serviceKey => $service) {
			$serviceAddons = [];
			foreach ($addons['list'] as $addon) {
				if ($service->service_id == $addon->hosting_id) {
					$serviceAddons[] = $addon;
				}
			}
			$services['list'][$serviceKey]['addons'] = $serviceAddons;
		}
		return [
			'domains'  => $domains,
			'services' => $services,
			'addons'   => $addons
		];
	}

	/**
	 * @param $users
	 * @return array
	 */
	public static function getUsers($users)
	{
		$clients = [];
		if (count($users) > 0) {
			$clientsResult = Capsule::table('tblclients')
				->whereIn('id', $users)
				->select('id')
				->addSelect('firstname')
				->addSelect('lastname')
				->addSelect('companyname')
				->addSelect('email')
				->get();

			foreach ($clientsResult as $client) {
				$clients[$client->id] = (array)$client;
			}
		}
		return $clients;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public static function joinDataToTags($data)
	{
		$users = self::getUsers(array_keys($data));
		foreach ($data as $userID => $user) {
			$data[$userID]['details'] = $users[$userID] ?? [];
		}
		return $data;
	}

	/**
	 * @param $userID
	 * @return array{whmcsClientLink: string, whmcsLoginAsClientLink: string, whmcsLoginAsClientMethod: string, whmcsLoginAsClient: string, whmcsNewLoginAsClientLink: false}
	 */
	public static function getUserAutoLogin($userID)
	{
		$client = Capsule::table('tblclients')->where('id', $userID)->first();
		if (version_compare(Configuration::getSystem('Version'), '8.0.0') >= 0) {
			if (function_exists('routePath')) {
				$loginLink = routePath('admin-client-login', $_REQUEST['clientID']);
			} else {
				$loginLink = FALSE;
			}
			$loginMethod = 'new';
		} else {
			$loginLink = sprintf('target="_blank" href="../dologin.php?username=%s"', urlencode($client->email));
			$loginMethod = 'old';
		}
		return [
			'whmcsClientLink'           => sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('/clientssummary.php?userid=%s', $userID))),
			'whmcsLoginAsClientLink'    => $loginLink,
			'whmcsLoginAsClientMethod'  => $loginMethod,
			'whmcsLoginAsClient'        => sprintf('target="_blank" href="../dologin.php?username=%s"', urlencode($client->email)),
			'whmcsNewLoginAsClientLink' => FALSE,
			'status'                    => ['name' => $client->status, 'safeName' => strtolower($client->status), 'description' => '']
		];
	}

	/**
	 * @param $userID
	 * @return array
	 */
	public static function getUserRawData($userID)
	{
		try {
			$client = Clients::where('id', $userID)->first();
			if (!is_null($client)) {
				return json_decode(json_encode($client), TRUE);
			}
			return [];
		} catch (Exception $exception) {
			return [];
		}
	}

	/**
	 * @param $userID
	 * @return void
	 */
	private static function getUserSumOfCancelled($userID)
	{
	}

	private static function getUserIncome($userID)
	{
		$invoices = Capsule::table('tblinvoices')
			->select('tblinvoices.id as invoice_id')
			->addSelect('tblinvoices.status as status')
			->addSelect('tblinvoices.total as total')
			->addSelect('tblinvoices.credit as credit')
			->addSelect('tblcurrencies.code as code')
			->join('tblclients', 'tblinvoices.userid', '=', 'tblclients.id')
			->join('tblcurrencies', 'tblclients.currency', '=', 'tblcurrencies.id')
			->where('tblinvoices.userid', $userID)
			->get();

		$client = Capsule::table('tblclients')->where('id', $userID)->first();
		if ($client->currency > 0) {
			$currency = Capsule::table('tblcurrencies')->where('id', $client->currency)->first();
		}
		if (!isset($currency) || is_null($currency)) {
			$currency = Capsule::table('tblcurrencies')->where('default', 1)->first();
		}
		$paidInvoices = ['sum' => [], 'count' => 0];
		$unpaidInvoices = ['sum' => [], 'count' => 0];
		$cancelledInvoices = ['sum' => [], 'count' => 0];
		foreach ($invoices as $invoice) {
			if ($invoice->status == 'Paid') {
				$paidInvoices['count']++;
				if (!isset($paidInvoices['sum'][$invoice->code])) {
					$paidInvoices['sum'][$invoice->code]['total'] = 0;
					$paidInvoices['sum'][$invoice->code]['currency'] = CurrencyHelper::getCurrencyPrefixSuffixByCode($invoice->code);
				}
				$paidInvoices['sum'][$invoice->code]['total'] += ($invoice->total + $invoice->credit);
				$paidInvoices['sum'][$invoice->code]['total'] = number_format($paidInvoices['sum'][$invoice->code]['total'], 2);
			} else if ($invoice->status == 'Unpaid') {
				$unpaidInvoices['count']++;
				if (!isset($unpaidInvoices['sum'][$invoice->code])) {
					$unpaidInvoices['sum'][$invoice->code]['total'] = 0;
					$unpaidInvoices['sum'][$invoice->code]['currency'] = CurrencyHelper::getCurrencyPrefixSuffixByCode($invoice->code);
				}
				$unpaidInvoices['sum'][$invoice->code]['total'] += $invoice->total;
				$unpaidInvoices['sum'][$invoice->code]['total'] = number_format($unpaidInvoices['sum'][$invoice->code]['total'], 2);
			} else if ($invoice->status == 'Cancelled') {
				$cancelledInvoices['count']++;
				if (!isset($cancelledInvoices['sum'][$invoice->code])) {
					$cancelledInvoices['sum'][$invoice->code]['total'] = 0;
					$cancelledInvoices['sum'][$invoice->code]['currency'] = CurrencyHelper::getCurrencyPrefixSuffixByCode($invoice->code);
				}
				$cancelledInvoices['sum'][$invoice->code]['total'] += $invoice->total;
				$cancelledInvoices['sum'][$invoice->code]['total'] = number_format($cancelledInvoices['sum'][$invoice->code]['total'], 2);
			}
		}

		$accounts = Capsule::table('tblaccounts')
			->select('tblaccounts.amountin as total')
			->addSelect('tblcurrencies.code as code')
			->join('tblclients', 'tblaccounts.userid', '=', 'tblclients.id')
			->join('tblcurrencies', 'tblclients.currency', '=', 'tblcurrencies.id')
			->where('tblaccounts.userid', $userID)->get();

		$totalIncome = ['sum' => [], 'count' => 0];
		foreach ($accounts as $account) {
			$totalIncome['count']++;
			if (!isset($totalIncome['sum'][$account->code])) {
				$totalIncome['sum'][$account->code]['total'] = number_format(0, 2);
				$totalIncome['sum'][$account->code]['currency'] = CurrencyHelper::getCurrencyPrefixSuffixByCode($account->code);
			}
			$totalIncome['sum'][$account->code]['total'] += $account->total;
			$totalIncome['sum'][$account->code]['total'] = number_format($totalIncome['sum'][$account->code]['total'], 2);
		}
		if ($paidInvoices['count'] == 0) {
			$paidInvoices['sum'][$currency->code]['total'] = number_format(0, 2);
			$paidInvoices['sum'][$currency->code]['currency'] = ['prefix' => $currency->prefix, 'suffix' => $currency->suffix];
		}
		if ($unpaidInvoices['count'] == 0) {
			$unpaidInvoices['sum'][$currency->code]['total'] = number_format(0, 2);
			$unpaidInvoices['sum'][$currency->code]['currency'] = ['prefix' => $currency->prefix, 'suffix' => $currency->suffix];
		}
		if ($cancelledInvoices['count'] == 0) {
			$cancelledInvoices['sum'][$currency->code]['total'] = number_format(0, 2);
			$cancelledInvoices['sum'][$currency->code]['currency'] = ['prefix' => $currency->prefix, 'suffix' => $currency->suffix];
		}
		if ($totalIncome['count'] == 0) {
			$totalIncome['sum'][$currency->code]['total'] = number_format(0, 2);
			$totalIncome['sum'][$currency->code]['currency'] = ['prefix' => $currency->prefix, 'suffix' => $currency->suffix];
		}
		$creditBalance = 0;
		try {
			$creditBalance = Capsule::table('tblcredit')->where('tblcredit.clientid', $userID)->sum('amount');
		} catch (Exception $exception) {

		}
		return [
			'paidInvoices'            => $paidInvoices,
			'unpaidInvoices'          => $unpaidInvoices,
			'cancelledInvoices'       => $cancelledInvoices,
			'creditBalance'           => CurrencyHelper::formatByClient($creditBalance, $userID),
			'newCreditBalance'        => [
				'total'    => number_format($creditBalance, 2),
				'currency' => CurrencyHelper::getCurrencyPrefixSuffixByClient($userID)
			],
			'mrr'                     => FALSE,
			'newMrr'                  => [
				'total'    => FALSE,
				'currency' => CurrencyHelper::getCurrencyPrefixSuffixByClient($userID)
			],
			'totalIncome'             => $totalIncome,
			'whmcsPaidInvoicesLink'   => sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('/clientsinvoices.php?userid=%s', $userID))),
			'whmcsUnpaidInvoicesLink' => sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('/clientsinvoices.php?userid=%s', $userID))),
			'whmcsCreditsLink'        => sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('/clientscredits.php?userid=%s', $userID))),
			'whmcsTotalIncomeLink'    => sprintf('target="_blank" href="%s"', self::getAdminLink(sprintf('/clientssummary.php?userid=%s', $userID)))
		];
	}
}