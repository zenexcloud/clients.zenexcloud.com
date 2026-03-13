<?php

namespace MetricsCube\Requests;

use Exception;
use MetricsCube\Helpers\AddonHelper;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Connection;
use MetricsCube\Utils\Logs;
use ReflectionClass;

/**
 * Class Request
 * @package MetricsCube\Requests
 */
abstract class Request
{
	/** @var float|string $startTime */
	protected $startTime;
	/** @var float|string $endTime */
	protected $endTime;
	/** @var string $requestToken */
	protected $requestToken = '';
	/** @var Logs $logger */
	protected $logger;
	/** @var array $models */
	protected $models;
	/** @var array $responseData */
	protected $responseData;
	/** @var int $qIndex */
	protected $qIndex = 0;

	/**
	 * Request constructor.
	 * @throws Exception
	 */
	public function __construct()
	{
		AddonHelper::initWHMCS();
		$this->startTime = microtime(TRUE);
		$this->logger = new Logs((new ReflectionClass($this))->getShortName());
		$this->logger->info('Script started on ' . $this->startTime);
	}

	/**
	 * @param int $qIndex
	 */
	public function setIndex($qIndex = 0)
	{
		$this->qIndex = $qIndex;
	}

	/**
	 *
	 */
	public function prepareRequest()
	{
		$this->logger->info(sprintf('%s %s', 'Request was initiated from:', $this->getClientIp()));
		$this->logger->info(sprintf('%s %s', 'Request initiated with params:', print_r($_POST, TRUE)));
	}

	/**
	 * @return string
	 */
	private function getClientIp()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	/**
	 *
	 */
	public function finishRequest()
	{
		$this->endTime = microtime(TRUE);
		$executionTime = ($this->endTime - $this->startTime);
		$this->logger->info(sprintf('Script finished on : %s (Total run: %s)', $this->startTime, $executionTime));
	}

	/**
	 * @param $exc
	 */
	public function registerException($exc)
	{
		$this->logger->warning(sprintf('An exception occurred: %s (line: %s), file %s', $exc->getMessage(), $exc->getLine(), $exc->getFile()));
	}

	/**
	 * @param array $models
	 * @return $this
	 */
	public function prepareResponse($models = [])
	{
		$this->responseData = [];
		foreach ($models as $modelName => $conditions) {
			$modelNameSpace = sprintf('\%s\%s\%s', 'MetricsCube', 'Models', $modelName);
			if (class_exists($modelNameSpace)) {
				try {
					$modelObject = (new $modelNameSpace());
					if (isset($conditions['count'])) {
						$result = $modelObject->calcCount($conditions);
					}
					if (isset($conditions['action']) && $conditions['action'] == 'checksum') {
						$result = $modelObject->calcCheckSum($conditions);
					}
					if (isset($conditions['action']) && $conditions['action'] == 'download') {
						$result = $modelObject->makeDownload($conditions);
					}
					if (isset($result)) {
						$this->responseData[$modelName] = [
							'status' => 1,
							'qindex' => $this->qIndex,
							'data'   => $result
						];
						continue;
					}
					if (isset($conditions['conditions'])) {
						$modelObject = $modelObject->conditions(unserialize(base64_decode($conditions['conditions'])));
					}
					if (isset($conditions['offset']) && !isset($conditions['count'])) {
						$modelObject = $modelObject->offset((int)$conditions['offset']);
					}
					if (isset($conditions['limit']) && !isset($conditions['count'])) {
						$modelObject = $modelObject->limit((int)$conditions['limit']);
					}
					$modelObject = $modelObject->addOrder(isset($conditions['order']) ? $conditions['order'] : FALSE);
					$result = $modelObject->get()->toArray();
					$this->responseData[$modelName] = [
						'status' => 1,
						'qindex' => $this->qIndex,
						'data'   => $result
					];
				} catch (Exception $exc) {
					$this->responseData[$modelName] = [
						'status' => 0,
						'qindex' => $this->qIndex,
						'msg'    => $exc->getMessage()
					];
				}
			} else {
				$this->responseData[$modelName] = [
					'status' => 0,
					'qindex' => $this->qIndex,
					'msg'    => $modelName . ' model not found!'
				];
			}
		}
		return $this;
	}

	/**
	 * @param bool   $finished
	 * @param string $url
	 * @return array|mixed
	 */
	public function sendResponse($finished = FALSE, $url = 'jobs/result')
	{
		$toSend = $this->prepareBase64($this->responseData);
		$encoder = 'BASE_JSON';
		$response = Connection::send($url, ['TOKEN' => $this->requestToken, 'qindex' => $this->qIndex, 'DATAENCODER' => $encoder, 'DATA' => $finished === TRUE ? 'FINISHED' : $toSend]);
		if (Configuration::getInstance()->get('DebugMode')) {
			$this->logger->info(sprintf('Response: %s', print_r($response, TRUE)));
		}
		return $response;
	}

	/**
	 * @param array $data
	 * @return array|bool|string
	 */
	public function convertToUTF($data = [])
	{
		if (is_string($data)) {
			return utf8_encode($data);
		} else if (is_array($data)) {
			$ret = [];
			foreach ($data as $i => $d) {
				$ret[$i] = $this->convertToUTF($d);
			}
			return $ret;
		} else if (is_object($data)) {
			foreach ($data as $i => $d) {
				$data->$i = $this->convertToUTF($d);
			}
			return $data;
		} else {
			return $data;
		}
	}

	/**
	 *
	 */
	public function updateTimeAndMethod()
	{
		Configuration::getInstance()->set('LastSynchronizationTime', time())->delete('Error');
	}

	/**
	 * @param $data
	 * @return string
	 */
	public function prepareBase64($data)
	{
		$toSend = base64_encode(json_encode($data));
		if (is_null($toSend) || json_last_error() != 0) {
			$toSend = base64_encode(json_encode($this->convertToUTF($this->responseData)));
		}
		return $toSend;
	}

}
