<?php

namespace MetricsCube\Controller\Admin;

use MetricsCube\Controller\AbstractController;
use WHMCS\Database\Capsule;

class ElementsController extends AbstractController
{
	public function __construct()
	{
		parent::__construct();
		$this->smarty->template_dir = METRICSCUBE . DS . 'views' . DS;
	}

	public function AdminAreaClientSummaryTab($userID)
	{
		$this->smarty->assign('userID', $userID);
		return $this->smarty->fetch('adminarea' . DS . 'widgets' . DS . 'adminClientSummaryTab.tpl');
	}

}