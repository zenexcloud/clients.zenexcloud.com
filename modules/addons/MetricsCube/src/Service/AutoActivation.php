<?php

namespace MetricsCube\Service;

class AutoActivation
{
	public static function checkPromocode($params)
	{
		$promoCodeFilePath = METRICSCUBE . DS . 'promocode.php';
		if (file_exists($promoCodeFilePath)) {
			include($promoCodeFilePath);
			if (isset($MCPromoCode) && strlen($MCPromoCode) > 0) {
				$params['promocode'] = $MCPromoCode;
			}
		}
		return $params;
	}
}