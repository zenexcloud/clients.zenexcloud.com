<?php

namespace MetricsCube\Requests;

use MetricsCube\Exceptions\PublicKeyException;
use MetricsCube\Models\MetricsCubeEvents;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Connection;

/**
 *
 */
class API extends Request
{
	/**
	 * @var array
	 */
	private $REQUEST;
	/**
	 * @var array
	 */
	private $POST;

	/**
	 * @param array $REQUEST
	 * @param array $POST
	 * @throws \Exception
	 */
	public function __construct(array $REQUEST, array $POST)
	{
		parent::__construct();
		$this->REQUEST = $REQUEST;
		$this->POST = $POST;
	}

	/**
	 * @param $models
	 * @return void
	 */
	public function prepareResponse($models = [])
	{
		if (isset($this->POST['testConnection'])) {
			$this->responseData = ['localTime' => time(), 'incomingTime' => $this->POST['testConnection']];
		}
		if (isset($this->POST['action'])) {
			switch ($this->POST['action']) {
				case 'getConnectorDetails':
					$this->responseData = Connection::systemDetails([], TRUE);
					break;
				case 'getModelChecksum':
				case 'getModelCount':
				case 'getModelData':
					parent::prepareResponse($this->POST['models']);
					break;
				case 'getEvents':
					$this->responseData = (new MetricsCubeEvents())->orderBy('id')->limit(Configuration::getInstance()->get('EventsLimit'))->get()->toArray();
					break;
				case 'cleanEvents':
					if (isset($this->POST['list']) && is_array($this->POST['list']) && count($this->POST['list']) > 0) {
						MetricsCubeEvents::whereIn('id', $this->POST['list'])->delete();
					} else {
						MetricsCubeEvents::delete();
					}
					$this->responseData = ['status' => TRUE];
					break;
				default:
					break;
			}
		}
	}

	/**
	 * @throws \MetricsCube\Exceptions\PublicKeyException
	 */
	public function encryptResponse()
	{
		$response = ['data' => '', 'key' => ''];
		$publicKeyFilePath = METRICSCUBE . DS . 'resources' . DS . 'keys' . DS . 'public_key.php';
		if (!file_exists($publicKeyFilePath)) {
			throw new PublicKeyException('Public key file not found!');
		}
		require_once $publicKeyFilePath;
		if (!isset($publicKey)) {
			throw new PublicKeyException('Public key not exist!');
		}
		$dataToCrypt = $this->prepareBase64($this->responseData);
		$keyToCrypt = sha1(microtime(TRUE));
		$response['data'] = openssl_encrypt($dataToCrypt, 'AES-256-CBC', $keyToCrypt);
		openssl_public_encrypt($keyToCrypt, $encryptedKeyToCrypt, $publicKey);
		$response['key'] = $encryptedKeyToCrypt;
		$response['method'] = 'json';
		$this->responseData = $response;
	}

	public function returnResult()
	{
		echo base64_encode(serialize($this->responseData));
	}
}