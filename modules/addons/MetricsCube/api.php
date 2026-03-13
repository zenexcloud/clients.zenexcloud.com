<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	exit();
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'init.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
try {
	$requestObject = new MetricsCube\Requests\API($_REQUEST, $_POST);
	$requestObject->updateTimeAndMethod();
	$requestObject->prepareResponse();
	$requestObject->encryptResponse();
	$requestObject->returnResult();
} catch (Throwable $exc) {
	if (isset($requestObject)) {
		$requestObject->registerException($exc);
	}
}
if (isset($requestObject)) {
	$requestObject->finishRequest();
}
exit();
