<?php

namespace MetricsCube\Actions;

class Config
{

	public static function config($key = FALSE)
	{
		$config = [
			'name'        => 'MetricsCube Connector',
			'description' => 'Synchronize your data with <a target="__blank" href="https://metricscube.io">MetricsCube</a>  and gain a deep insight into your business with instant access to detailed performance reports. <br/> For more info visit our <a style="color:#4169E1;" href="https://www.docs.modulesgarden.com/MetricsCube_Connector_For_WHMCS">Wiki</a>. <script type="text/javascript"> $(document).ready(function(){ $("td > a[name=MetricsCube]").prepend("<img width=\"20px\" height=\"20px\" src=\"../modules/addons/MetricsCube/assets/img/icon.svg\">"); }); </script>',
			'author'      => '<a target="__blank" href="https://metricscube.io">MetricsCube.io</a>',
			'language'    => 'english',
			'version'     => '3.3.0',
			'source'      => 'mg_bundle',
			'fields'      => []
		];
		if ($key !== FALSE && isset($config[$key])) {
			return $config[$key];
		}
		return $config;
	}

}
