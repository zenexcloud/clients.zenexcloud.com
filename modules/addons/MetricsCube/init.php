<?php

$whmcsPath = dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'init.php';
if (file_exists($whmcsPath)) {
	require_once($whmcsPath);
} else {
	throw new Exception('WHMCS init.php file not found in path ' . $whmcsPath . ' !');
}
