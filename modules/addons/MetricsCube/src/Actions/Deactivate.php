<?php

namespace MetricsCube\Actions;

use MetricsCube\Service\Configuration;
use MetricsCube\Utils\Util;

/**
 * Class Deactivate
 * @package MetricsCube\Actions
 */
class Deactivate
{
    /**
     * @return array
     */
    public static function deactivate()
    {
        Configuration::getInstance()->deleteAll();
	    Util::setWelcomeCookie('METRICSCUBE_WELCOME_POPUP', 72);
        return [
            'status' => 'success'
        ];
    }

}
