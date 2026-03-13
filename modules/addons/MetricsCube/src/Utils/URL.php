<?php

namespace MetricsCube\Utils;

class URL {

    public static function generateWithParams($params, $blackList = [], $preserveCurrent = true) {
        if (isset($_POST['action']) && $_POST['action'] == 'module-settings') {
            $params['id']     = $_POST['id'];
            $params['action'] = 'edit';
        }
        if ($preserveCurrent) {
            foreach ($_GET as $k => $v) {
                if (!isset($params[$k])) {
                    $params[$k] = $v;
                }
            }
        }

        if (!empty($blackList)) {
            foreach ($blackList as $k) {
                if (isset($params[$k])) {
                    unset($params[$k]);
                }
            }
        }
        return sprintf('%s?%s', $_SERVER['SCRIPT_NAME'], http_build_query($params));
    }

}
