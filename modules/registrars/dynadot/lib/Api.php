<?php

namespace WHMCS\Module\Registrar\dynadot;

use Exception;

class Api
{

    const API_URL = 'https://api.dynadot.com';

    // test url :
    // const API_URL = 'http://166.88.19.190:8889';

    // command
    const COMMAND_ACCOUNT_INFO = 'account_info';
    const COMMAND_REGISTER = 'register';
    const COMMAND_RENEW = 'renew';
    const COMMAND_TRANSFER = 'transfer';
    const COMMAND_GET_TRANSFER_STATUS = 'get_transfer_status';
    const COMMAND_TLD_PRICE = 'tld_price';
    const COMMAND_DOMAIN_INFO = 'domain_info';
    const COMMAND_DOMAIN_CHECK = 'domain_check';
    const COMMAND_SET_WHOIS = 'set_whois';
    const COMMAND_GET_CONTACT = 'get_contact';
    const COMMAND_CREATE_CONTACT = 'create_contact';
    const COMMAND_EDIT_CONTACT = 'edit_contact';
    const COMMAND_GET_NS = 'get_ns';
    const COMMAND_SET_NS = 'set_ns';
    const COMMAND_REGISTER_NS = 'register_ns';
    const COMMAND_SET_NS_IP_BY_DOMAIN = 'set_ns_ip_by_domain';
    const COMMAND_DELETE_NS_BY_DOMAIN = 'delete_ns_by_domain';
    const COMMAND_LOCK_DOMAIN = 'lock_domain';
    const COMMAND_UNLOCK_DOMAIN = 'unlock_domain';
    const COMMAND_SET_DNS = 'set_dns2';
    const COMMAND_GET_DNS = 'get_dns';
    const COMMAND_SET_EMAIL_FORWARD = 'set_email_forward';
    const COMMAND_GET_TRANSFER_AUTH_CODE = 'get_transfer_auth_code';
    const COMMAND_SET_PRIVACY = 'set_privacy';
    const COMMAND_DELETE = 'delete';
    const COMMAND_SET_WHOIS_CONTACT_VERIFICATION_STATUS = 'set_whois_contact_verification_status';
    const COMMAND_GET_WHMCS_MODULE_VERSION = 'get_whmcs_module_version';
    const COMMAND_WHMCS_ACTIVATE = 'whmcs_activate';

    /**
     * Send api request.
     * @param $action
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public static function sendRequest($action, $data)
    {
        list($actionDetail, $command) = explode('/', $action, 2);
        $data['from_whmcs'] = 1;
        $data['command'] = $command;
        $currentVersion = Domains::getCurrentVersion();
        if (empty($currentVersion)) {
            $currentVersion = "Unknown";
        }
        $data['module_version'] = $currentVersion;
        $request = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL . '/api3.json?' . $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception('Connection Error: ' . curl_errno($ch) . ' - ' . curl_error($ch));
        }
        curl_close($ch);
        $requestString = self::API_URL . '/api3.json?' . $request;
        $processedData = json_decode($responseData);

        // log
        logModuleCall('dynadot', $actionDetail, $requestString, $responseData, json_encode($processedData), array($data['key']));
        if ($processedData === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Bad response received from API');
        }
        if ($processedData->Response->ResponseCode === '-1') {
            throw new Exception($processedData->Response->Error);
        } else {
            return $processedData;
        }
    }

    /**
     * Simple Log for debug.
     * @param $request
     * @param $response
     * @return void
     */
    public static function simpleLogForDebug($request, $response)
    {
        logModuleCall('log', 'debug', $request, $response, null, null);
    }

}