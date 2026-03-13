<?php

namespace MetricsCube\Widgets;

use MetricsCube\Service\Connection;

class QuickStatistics extends \WHMCS\Module\AbstractWidget
{
	protected $title = 'MetricsCube Analytics';

	protected $description = 'MetricsCube Quick Statistics Widget';

	protected $weight = 150;

	protected $columns = 1;

	protected $cache = FALSE;

	protected $cacheExpiry = 120;

	protected $requiredPermission = '';

	public function getData()
	{
		return [];
	}

	public function generateOutput($data)
	{
		$path = sprintf('%s%s%s%s%s%s%s%s%s', METRICSCUBE, DS, 'views', DS, 'adminarea', DS, 'widgets', DS, 'dashboardWidget.tpl');
		if (file_exists($path)) {
			return file_get_contents($path);
		}
		return FALSE;

	}
}