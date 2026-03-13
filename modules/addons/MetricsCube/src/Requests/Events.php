<?php

namespace MetricsCube\Requests;

use Exception;
use MetricsCube\Helpers\Config;
use MetricsCube\Models\MetricsCubeEvents;
use MetricsCube\Service\Configuration;
use MetricsCube\Service\Connection;
use function MCmsg;

/**
 * Class Events
 * @package MetricsCube\Requests
 */
class Events extends Request
{

    /**
     * @return bool
     */
    public function enabled()
    {
        return Configuration::getInstance()->get('InstantDataSynchronization') == 'on';
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function verifyEventToken()
    {
        if (!isset($_POST['token']) || strlen($_POST['token']) <= 10) {
            throw new Exception(MCmsg()->warning(2));
        }
        $this->requestToken = (string)filter_input(INPUT_POST, 'token');
        $lastToken = Configuration::getInstance()->get('EventToken');
        if ($this->requestToken == $lastToken) {
            return TRUE;
        }
        if ($this->checkEventToken()) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function checkEventToken()
    {
        $result = Connection::send('jobs/events/verify', ['TOKEN' => $this->requestToken]);
        if ($result['status'] == 'success') {
            Configuration::getInstance()->set('EventToken', $this->requestToken);
            return TRUE;
        }
        throw new Exception(MCmsg()->warning(2));
    }

    public function prepareEvents()
    {
        $this->responseData = (new MetricsCubeEvents())->orderBy('id')->limit(Configuration::getInstance()->get('EventsLimit'))->get()->toArray();
        return $this;
    }

    public function cleanEvents()
    {
        if (!empty($this->responseData)) {
            MetricsCubeEvents::whereIn('id', array_column($this->responseData, 'id'))->delete();
        }
    }

}
