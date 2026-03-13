<?php

namespace MetricsCube\Requests;

use Exception;
use MetricsCube\Exceptions\TestConnectionException;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Connection;
use function MCmsg;

/**
 * Class WebHooks
 * @package MetricsCube\Requests
 */
class WebHooks extends Request
{
    /**
     * @return bool
     * @throws Exception
     */
    public function verifyToken()
    {
        if (!isset($_POST['token']) || strlen($_POST['token']) <= 10) {
            throw new Exception(MCmsg()->warning(2));
        }
        $this->requestToken = (string)filter_input(INPUT_POST, 'token');
        $lastToken = Configuration::getInstance()->get('Token');
        if ($this->requestToken == $lastToken) {
            return TRUE;
        }
        if ($this->checkToken()) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function checkToken()
    {
        $result = Connection::send('jobs/verify', ['TOKEN' => $this->requestToken]);
        if ($result['status'] == 'success') {
            Configuration::getInstance()->set('Token', $this->requestToken);
            return TRUE;
        }
        throw new Exception(MCmsg()->warning(2));
    }

    /**
     * @return $this
     * @throws TestConnectionException
     */
    public function checkRequest()
    {
        if (isset($_REQUEST['testConnection'])) {
            $this->logger->info('Test connection request detected: ' . print_r($_REQUEST, TRUE));
            throw new TestConnectionException($_REQUEST['testConnection']);
        }
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exception(sprintf(MCmsg()->warning(4), $_SERVER['REQUEST_METHOD']));
        }
        $applicationKey = Configuration::getInstance()->get('AppKey');
        $connectorKey = Configuration::getInstance()->get('ConnKey');
        if ($applicationKey === FALSE || $connectorKey === FALSE) {
            throw new Exception(MCmsg()->error(6));
        }
        return $this;
    }

}
