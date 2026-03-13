<?php

use MetricsCube\Exceptions\TestConnectionException;
use MetricsCube\Requests\WebHooks;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'init.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
try {
	$webHook = new WebHooks();
	$webHook->updateTimeAndMethod();
	$webHook->checkRequest()->prepareRequest();
	if ($webHook->verifyToken()) {
		$models = $_POST;
		unset($models['token']);
		if (isset($models['qindex'])) {
			$webHook->setIndex($models['qindex']);
			unset($models['qindex']);
		}
		$webHook->prepareResponse($models)->sendResponse();
	}
	$webHook->updateTimeAndMethod();
} catch (TestConnectionException $testExc) {
	echo $testExc->getMessage();
} catch (Exception $exc) {
	$webHook->registerException($exc);
}
$webHook->finishRequest();
exit();
