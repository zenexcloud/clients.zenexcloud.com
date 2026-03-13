<?php

namespace MetricsCube\Service;

use MetricsCube\Models\Accounts;
use MetricsCube\Models\CancelRequests;
use MetricsCube\Models\Clients;
use MetricsCube\Models\Orders;
use MetricsCube\Models\TicketLog;
use MetricsCube\Models\Tickets;
use MetricsCube\Models\Upgrades;

/**
 *
 */
class AdminWidgetService
{
	/**
	 * @param string $timeRange
	 * @return array
	 */
	public static function getData($timeRange = 'today', $data = [])
	{
		$response = [
			'activity'  => FALSE,
			'reports'   => self::getReportsData($timeRange),
			'timeRange' => $timeRange,
			'url'       => [
				'activity'  => Connection::getUrl('/reports/segmentation/activity'),
				'dashboard' => Connection::getUrl('/live')
			]
		];
		return $response;
	}

	/**
	 * @param $timeRange
	 * @return array[]
	 */
	private static function getReportsData($timeRange = 'today')
	{
		$timeRanges = [
			'today'     => [
				'from' => date('Y-m-d 00:00:00'),
				'to'   => date('Y-m-d 23:59:59')
			],
			'week'      => [
				'from' => date('Y-m-d 00:00:00', strtotime('monday this week')),
				'to'   => date('Y-m-d 23:59:59', strtotime('sunday this week'))
			],
			'month'     => [
				'from' => date('Y-m-1 00:00:00'),
				'to'   => date('Y-m-t 23:59:59')
			],
			'lastDay'   => [
				'from' => date('Y-m-d H:i:s', strtotime('-1 day')),
				'to'   => date('Y-m-d H:i:s')
			],
			'lastWeek'  => [
				'from' => date('Y-m-d H:i:s', strtotime('-7 days')),
				'to'   => date('Y-m-d H:i:s')
			],
			'lastMonth' => [
				'from' => date('Y-m-d H:i:s', strtotime('-30 days')),
				'to'   => date('Y-m-d H:i:s')
			]
		];
		if (!in_array($timeRange, array_keys($timeRanges))) {
			$timeRange = 'today';
		}
		return [
			'newClients'     => [
				'data'  => Clients::whereBetween('datecreated', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->count(),
				'label' => 'New Customers',
				'icon'  => 'newClients',
				'url'   => FALSE,
			],
			'newOrders'      => [
				'data'  => Orders::whereBetween('date', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->count(),
				'label' => 'New Orders',
				'icon'  => 'newOrders',
				'url'   => FALSE,
			],
			'ordersAccepted' => [
				'data'  => Orders::where('status', 'active')->whereBetween('date', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->count(),
				'label' => 'Orders Accepted',
				'icon'  => 'ordersAccepted',
				'url'   => FALSE,
			],
			'renewals'       => [
				'data'  => FALSE,
				'label' => 'Renewals',
				'icon'  => 'renewals',
				'url'   => FALSE,
			],
			'upgrades'       => [
				'data'  => Upgrades::whereBetween('date', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->count(),
				'label' => 'Upgrades',
				'icon'  => 'upgrades',
				'url'   => FALSE,
			],
			'transactions'   => [
				'data'  => Accounts::whereBetween('date', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->count(),
				'label' => 'Transactions',
				'icon'  => 'transactions',
				'url'   => FALSE,
			],
			'openedTickets'  => [
				'data'  => Tickets::whereBetween('date', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->count(),
				'label' => 'Opened Tickets',
				'icon'  => 'openedTickets',
				'url'   => FALSE,
			],
			'closedTickets'  => [
				'data'  => TicketLog::whereBetween('date', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->where('action', 'like', '%Closed%')->count(),
				'label' => 'Closed Tickets',
				'icon'  => 'closedTickets',
				'url'   => FALSE,
			],
			'cancelRequests' => [
				'data'  => CancelRequests::whereBetween('date', [$timeRanges[$timeRange]['from'], $timeRanges[$timeRange]['to']])->count(),
				'label' => 'Cancel Requests',
				'icon'  => 'cancelRequests',
				'url'   => FALSE,
			]
		];
	}
}