<?php

/**
 * Dynadot Registrar Module
 */

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

use WHMCS\Carbon;
use WHMCS\Domain\Registrar\Domain;
use WHMCS\Domain\TopLevel\ImportItem;
use WHMCS\Domains\DomainLookup\ResultsList;
use WHMCS\Domains\DomainLookup\SearchResult;
use WHMCS\Exception\Module\InvalidConfiguration;
use WHMCS\Module\Registrar\dynadot\Api;
use WHMCS\Module\Registrar\dynadot\Domains;

/**
 * Define module related metadata.
 * @return array
 */
function dynadot_MetaData()
{
    return array(
        "DisplayName" => "Dynadot",
        "APIVersion" => "1.1",
    );
}

/**
 * Define registrar configuration options.
 * @return array
 */
function dynadot_getConfigArray()
{
    return array(
        "FriendlyName" => array(
            "Type" => "System",
            "Value" => "Dynadot Registrar Module for WHMCS",
        ),
        "Description" => array(
            "Type" => "System",
            "Value" => "Don't have a Dynadot Account yet? Get one here: <a target='_blank' href='https://www.dynadot.com/create_account.html'>www.dynadot.com</a>",
        ),
        "ApiKey" => array(
            "FriendlyName" => "API Key",
            "Type" => "password",
            "Description" => "Enter your Dynadot API Key here",
        ),
        "Username" => array(
            "FriendlyName" => "Username",
            "Type" => "text",
            "Description" => "Enter your Dynadot Reseller Account Username here",
        ),
        "Coupon" => array(
            "FriendlyName" => "Coupon",
            "Type" => "textarea",
            "Description" => "Enter your Dynadot Coupons, one coupon per line (Split by new line).
            Only the first valid coupon will be used for the order. If no valid coupon found for the order, the order will be processed without any coupon.",
        ),
    );
}

/**
 * Check api key and username.
 * @param $params
 * @return void
 * @throws InvalidConfiguration
 */
function dynadot_config_validate($params)
{
    $validApiKey = false;
    $validUsername = false;
    $apiKey = $params['ApiKey'];
    $userName = $params['Username'];
    $coupon = $params['Coupon'];
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_WHMCS_ACTIVATE, array(
            'key' => $apiKey,
            'username' => $userName,
            'coupon' => $coupon));
        $whmcsActiveResponse = $response->WhmcsActivateResponse;
        if ($whmcsActiveResponse->Status === "error") {
           throw new InvalidConfiguration($whmcsActiveResponse-> Error);
        }
    } catch (Exception $e) {
        throw new InvalidConfiguration($e->getMessage());
    }
}

/**
 * Register a domain.
 * @param $params
 * @return array
 * @throws Exception
 */
function dynadot_RegisterDomain($params)
{
    $apiKey = $params['ApiKey'];
    $userId = $params['userid'];
    $coupon = $params['Coupon'];
    // domain addon purchase status
    // $enableDnsManagement = (bool)$params['dnsmanagement'];
    // $enableEmailForwarding = (bool)$params['emailforwarding'];
    $enableIdProtection = (bool)$params['idprotection'];
    // registration parameters
    $domainName = Domains::getDomainName($params);
    $duration = $params['regperiod'];
    $apiRegisterData = array(
        'key' => $apiKey,
        'domain' => $domainName,
        'duration' => $duration,
        'customer_id' => $userId,
        'coupon' => $coupon,
        // 'dns_management' => $enableDnsManagement,
        // 'email_forwarding' => $enableEmailForwarding,
        'privacy' => $enableIdProtection ? 'on' : 'off'
    );
    // premium domain parameters
    $premiumDomainsEnabled = (bool)$params['premiumEnabled'];
    $premiumDomainsCost = $params['premiumCost'];
    if ($premiumDomainsEnabled && $premiumDomainsCost) {
        // check domain status
        $checkDomainResult = Domains::checkDomainStatus($apiKey, $domainName);
        if (!$checkDomainResult['success']) {
            return array('error' => $checkDomainResult['error']);
        }
        // check availability
        if (!$checkDomainResult['available']) {
            return array('error' => 'Sorry, the domain is not available');
        }
        // add premium domain parameter
        if ($checkDomainResult['premiumDomain']) {
            $apiRegisterData['premium'] = '1';
        }
    }

    // registrant contact
    $registrantContact = array(
        'organization' => $params["companyname"],
        'name' => $params["fullname"],
        'email' => $params["email"],
        'phonenum' => $params["phonenumber"],
        'phonecc' => $params["phonecc"],
        'address1' => $params["address1"],
        'address2' => $params["address2"],
        'city' => $params["city"],
        'state' => $params["fullstate"],
        'zip' => $params["postcode"],
        'country' => $params["countrycode"]
    );

    $registrantContactResult = Domains::creatContactId($apiKey, $registrantContact);
    if (!$registrantContactResult['success']) {
        return array('error' => $registrantContactResult['error']);
    }
    $registrantContactId = $registrantContactResult['contactId'];

    $apiRegisterData['registrant_contact'] = $registrantContactId;
    $apiRegisterData['admin_contact'] = $registrantContactId;
    $apiRegisterData['technical_contact'] = $registrantContactId;
    $apiRegisterData['billing_contact'] = $registrantContactId;

    // nameserver
    $nameserverArray = array();
    for ($i = 0; $i < 5; $i++) {
        $nameserver = $params['ns' . ($i + 1)];
        if (empty($nameserver)) {
            continue;
        }
        $nameserverArray[] = $nameserver;
    }
    $apiRegisterData['name_servers'] = implode(',', $nameserverArray);

    // register domain
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_REGISTER, $apiRegisterData);
        $registerResponse = $response->RegisterResponse;
        if ($registerResponse->Status === 'success') {
            return array('success' => true);
        } else {
            $error = $registerResponse->Error;
            if (!empty($error)) {
                return array('error' => $error);
            } else {
                return array('error' => 'Registration failed, Status: ' . $registerResponse->Status);
            }
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage()
        );
    }
}

/**
 * Initiate domain transfer.
 * @param $params
 * @return array
 */
function dynadot_TransferDomain($params)
{
    $apiKey = $params['ApiKey'];
    $userId = $params['userid'];
    $eppCode = $params['eppcode'];
    $coupon = $params['Coupon'];
    // domain addon purchase status
    // $enableDnsManagement = (bool)$params['dnsmanagement'];
    // $enableEmailForwarding = (bool)$params['emailforwarding'];
    $enableIdProtection = (bool)$params['idprotection'];
    // transfer parameters
    $domainName = Domains::getDomainName($params);
    $transferData = array(
        'key' => $apiKey,
        'domain' => $domainName,
        'auth' => $eppCode,
        'customer_id' => $userId,
        'coupon' => $coupon,
        // 'dns_management' => $enableDnsManagement,
        // 'email_forwarding' => $enableEmailForwarding,
        'privacy' => $enableIdProtection ? 'on' : 'off'
    );
    // premium domain parameters
    $premiumDomainsEnabled = (bool)$params['premiumEnabled'];
    $premiumDomainsCost = $params['premiumCost'];
    if ($premiumDomainsEnabled && $premiumDomainsCost) {
        // check domain status
        $checkDomainResult = Domains::checkDomainStatus($apiKey, $domainName);
        if (!$checkDomainResult['success']) {
            return array('error' => $checkDomainResult['error']);
        }
        // add premium domain parameter
        if ($checkDomainResult['premiumDomain']) {
            $transferData['premium'] = '1';
        }
    }
    // registrant contact
    $registrantContact = array(
        'organization' => $params["companyname"],
        'name' => $params["fullname"],
        'email' => $params["email"],
        'phonenum' => $params["phonenumber"],
        'phonecc' => $params["phonecc"],
        'address1' => $params["address1"],
        'address2' => $params["address2"],
        'city' => $params["city"],
        'state' => $params["fullstate"],
        'zip' => $params["postcode"],
        'country' => $params["countrycode"]
    );

    $registrantContactResult = Domains::creatContactId($apiKey, $registrantContact);
    if (!$registrantContactResult['success']) {
        return array('error' => $registrantContactResult['error']);
    }
    $registrantContactId = $registrantContactResult['contactId'];

    $transferData['registrant_contact'] = $registrantContactId;
    $transferData['admin_contact'] = $registrantContactId;
    $transferData['technical_contact'] = $registrantContactId;
    $transferData['billing_contact'] = $registrantContactId;

    // nameserver
    $nameserverArray = array();
    for ($i = 0; $i < 5; $i++) {
        $nameserver = $params['ns' . ($i + 1)];
        if (empty($nameserver)) {
            continue;
        }
        $nameserverArray[] = $nameserver;
    }
    $transferData['name_servers'] = implode(',', $nameserverArray);

    // transfer domain
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_TRANSFER, $transferData);
        $transferResponse = $response->TransferResponse;
        if ($transferResponse->Status === 'order created') {
            return array('success' => true);
        } else {
            $error = $transferResponse->Error;
            if (!empty($error)) {
                return array('error' => $error);
            } else {
                return array('error' => 'Transfer failed, Status: ' . $transferResponse->Status);
            }
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage()
        );
    }
}

/**
 * Renew a domain.
 * @param $params
 * @return array
 */
function dynadot_RenewDomain($params)
{
    $apiKey = $params['ApiKey'];
    // renew parameters
    $domainName = Domains::getDomainName($params);
    $duration = $params['regperiod'];
    $userId = $params['userid'];
    $coupon = $params['Coupon'];
    // domain addon purchase status
    // $enableDnsManagement = (bool)$params['dnsmanagement'];
    // $enableEmailForwarding = (bool)$params['emailforwarding'];
    // $enableIdProtection = (bool)$params['idprotection'];
    // build data.
    $data = array(
        'key' => $apiKey,
        'domain' => $domainName,
        'duration' => $duration,
        'customer_id' => $userId,
        'coupon' => $coupon,
        // 'dns_management' => $enableDnsManagement,
        // 'email_forwarding' => $enableEmailForwarding,
        // 'domain_privacy' => $enableIdProtection
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_RENEW, $data);
        $renewResponse = $response->RenewResponse;
        if ($renewResponse->Status === 'success') {
            return array('success' => true);
        } else {
            $error = $renewResponse->Error;
            if (!empty($error)) {
                return array('error' => $error);
            } else {
                return array('error' => 'Renew failed, Status: ' . $renewResponse->Status);
            }
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Fetch current nameservers.
 * @param $params
 * @return array
 */
function dynadot_GetNameservers($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // build data
    $data = array(
        'key' => $apiKey,
        'domain' => $domainName
    );
    $nameServerArray = array();
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_GET_NS, $data);
        $getNsResponse = $response->GetNsResponse;
        if ($getNsResponse->Status === 'success') {
            for ($i = 0; $i < 5; $i++) {
                $jsonKey = 'Host' . $i;
                $nameServer = $getNsResponse->NsContent->$jsonKey;
                $nameServerArray['ns' . ($i + 1)] = $nameServer;
            }
        } else {
            return array('error' => json_encode($response));
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
    return $nameServerArray;
}

/**
 * Save nameserver changes.
 * @param $params
 * @return array
 */
function dynadot_SaveNameservers($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    $nameservers = array();
    for ($i = 0; $i < 5; $i++) {
        $nameserver = $params['ns' . ($i + 1)];
        if (empty($nameserver)) {
            continue;
        }
        $nameservers[] = $nameserver;
    }
    try {
        $setNameserverResult = Domains::setNameserver($apiKey, $domainName, $nameservers);
        if (!$setNameserverResult['success']) {
            return array('error' => $setNameserverResult['error']);
        } else {
            return array('success' => true);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Get the current WHOIS Contact Information.
 * @param $params
 * @return array
 */
function dynadot_GetContactDetails($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    try {
        // get domain info
        $response = Domains::getDomainInfo($apiKey, $domainName);
        $domainInfoResponse = $response->DomainInfoResponse;
        if ($domainInfoResponse->Status === 'success') {
            $whois = $domainInfoResponse->DomainInfo->Whois;
            return array(
                'Registrant' => Domains::getContact($apiKey, $whois->Registrant->ContactId),
                'Technical' => Domains::getContact($apiKey, $whois->Technical->ContactId),
                'Billing' => Domains::getContact($apiKey, $whois->Billing->ContactId),
                'Admin' => Domains::getContact($apiKey, $whois->Admin->ContactId)
            );
        } else {
            return array('error' => $domainInfoResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Update the WHOIS Contact Information for a given domain.
 * @param $params
 * @return array
 */
function dynadot_SaveContactDetails($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // whois information
    $contactDetails = $params['contactdetails'];
    try {
        $registrant = $contactDetails['Registrant'];
        $admin = $contactDetails['Admin'];
        $technical = $contactDetails['Technical'];
        $billing = $contactDetails['Billing'];
        // get domain info
        $response = Domains::getDomainInfo($apiKey, $domainName);
        $domainInfoResponse = $response->DomainInfoResponse;
        if ($domainInfoResponse->Status === 'success') {
            $whois = $domainInfoResponse->DomainInfo->Whois;

            $registrantContactId = $whois->Registrant->ContactId;
            $adminContactId = $whois->Admin->ContactId;
            $technicalContactId = $whois->Technical->ContactId;
            $billingContactId = $whois->Billing->ContactId;

            $contactArray = array();
            $contactArray[$registrantContactId] = $registrant;
            $contactArray[$adminContactId] = $admin;
            $contactArray[$technicalContactId] = $technical;
            $contactArray[$billingContactId] = $billing;

            foreach ($contactArray as $contactId => $contactData) {
                $result = Domains::editContact($apiKey, $contactId, $contactData);
                if (!$result['success']) {
                    return array('error' => $result['error']);
                }
            }
            return array('success' => true);
        } else {
            return array('error' => $domainInfoResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Check Domains Availability.
 * @param $params
 * @return array|ResultsList
 */
function dynadot_CheckAvailability($params)
{
    $apiKey = $params['ApiKey'];
    $TLDs = $params['tldsToInclude'];
    $premiumDomainsEnabled = (bool)$params['premiumEnabled'];
    $domainArray = array();
    foreach ($TLDs as $TLD) {
        $domainArray[] = $params['sld'] . $TLD;
    }
    $results = new ResultsList();
    try {
        // build data
        $data = array('key' => $apiKey);
        foreach (Domains::splitDomainArray($domainArray) as $array) {
            $data['domains'] = implode(',', $array);
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_DOMAIN_CHECK, $data);
            $domainCheckResponse = $response->DomainCheckResponse;
            if ($domainCheckResponse->Status === 'success') {
                $domainCheckResults = $domainCheckResponse->DomainCheckResults;
                foreach ($domainCheckResults as $checkResult) {
                    $domainName = $checkResult->domainName;
                    list($resultDomain, $resultTld) = explode('.', $domainName, 2);
                    // instantiate a new domain search result object
                    $searchResult = new SearchResult($resultDomain, $resultTld);
                    // determine the appropriate status to return
                    $domainStatus = $checkResult->domainStatus;
                    if ($domainStatus == 'available') {
                        $status = SearchResult::STATUS_NOT_REGISTERED;
                    } elseif ($domainStatus == 'registered') {
                        $status = SearchResult::STATUS_REGISTERED;
                    } elseif ($domainStatus == 'reserved') {
                        $status = SearchResult::STATUS_RESERVED;
                    } else {
                        $status = SearchResult::STATUS_UNKNOWN;
                    }
                    $isPremiumDomain = $checkResult->isPremiumDomain;
                    if($isPremiumDomain && !$premiumDomainsEnabled && $domainStatus == 'available'){
                        $status = SearchResult::STATUS_RESERVED;
                    }
                    $searchResult->setStatus($status);
                    if ($isPremiumDomain) {
                        $searchResult->setPremiumDomain(true);
                        $searchResult->setPremiumCostPricing(
                            array(
                                'register' => $checkResult->premiumRegistrationPrice,
                                'renew' => $checkResult->premiumRenewPrice,
                                'CurrencyCode' => $checkResult->currency
                            )
                        );
                    }
                    // append to the search results list
                    $results->append($searchResult);
                }
            }
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
    return $results;
}

/**
 * Get registrar lock status.
 * @param $params
 * @return array|string
 */
function dynadot_GetRegistrarLock($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    try {
        // get domain info
        $response = Domains::getDomainInfo($apiKey, $domainName);
        $domainInfoResponse = $response->DomainInfoResponse;
        if ($domainInfoResponse->Status === 'success') {
            $lockStatus = $domainInfoResponse->DomainInfo->Locked;
            if ($lockStatus === 'no') {
                return 'unlocked';
            } else {
                return 'locked';
            }
        } else {
            return array('error' => json_encode($response));
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Set registrar lock status.
 * @param $params
 * @return array
 */
function dynadot_SaveRegistrarLock($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // lock status
    $lockStatus = $params['lockenabled'];
    return Domains::setDomainLock($apiKey, $domainName, $lockStatus);
}

/**
 * Get DNS Records for DNS Host Record Management.
 * @param $params
 * @return array
 */
function dynadot_GetDNS($params)
{
    return array(
        "vars" => array(
            "registrar" => $params['registrar']
        )
    );
}

/**
 * Update DNS Host Records.
 * @param $params
 * @return array
 */
function dynadot_SaveDNS($params)
{
    return array();
}

/**
 * Get Email Forwarding Setting.
 * @param $params
 * @return array
 */
function dynadot_GetEmailForwarding($params)
{
    return array(
        "vars" => array(
            "registrar" => $params['registrar']
        )
    );
}

/**
 * Update Email Forwarding Setting.
 * @param $params
 * @return array
 */
function dynadot_SaveEmailForwarding($params)
{
    return array();
}

/**
 * Enable/Disable ID Protection.
 * @param $params
 * @return array
 */
function dynadot_IDProtectToggle($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // id protection parameter
    $protectEnable = (bool)$params['protectenable'];
    return Domains::setDomainPrivacy($apiKey, $domainName, $protectEnable);
}

/**
 * Request EEP Code.
 * @param $params
 * @return array
 */
function dynadot_GetEPPCode($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // build data
    $data = array(
        'key' => $apiKey,
        'domain' => $domainName,
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_GET_TRANSFER_AUTH_CODE, $data);
        $getTransferAuthCodeResponse = $response->GetTransferAuthCodeResponse;
        if ($getTransferAuthCodeResponse->Status === 'success') {
            $authCode = $getTransferAuthCodeResponse->AuthCode;
            if ($authCode != null && $authCode != '') {
                // if epp code is returned, return it for display to the end user
                return array('eppcode' => $authCode);
            } else {
                // if epp code is not returned, it was sent by email, return success
                return array('success' => 'success');
            }
        } else {
            return array('error' => $getTransferAuthCodeResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Delete Domains.
 * @param $params
 * @return array
 */
function dynadot_RequestDelete($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // build data
    $data = array(
        'key' => $apiKey,
        'domain' => $domainName
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_DELETE, $data);
        $deleteResponse = $response->DeleteResponse;
        if ($deleteResponse->Status === 'success') {
            return array('success' => 'success');
        } else {
            return array('error' => $deleteResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Register a Nameserver.
 * @param $params
 * @return array
 */
function dynadot_RegisterNameserver($params)
{
    $apiKey = $params['ApiKey'];
    // nameserver parameters
    $nameserver = $params['nameserver'];
    $ipAddress = $params['ipaddress'];
    // build post data
    $data = array(
        'key' => $apiKey,
        'host' => $nameserver,
        'ip' => $ipAddress,
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_REGISTER_NS, $data);
        $registerNsResponse = $response->RegisterNsResponse;
        if ($registerNsResponse->Status === 'success') {
            return array('success' => 'success');
        } else {
            return array('error' => $registerNsResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Modify a Nameserver.
 * @param $params
 * @return array
 */
function dynadot_ModifyNameserver($params)
{
    $apiKey = $params['ApiKey'];
    // nameserver parameters
    $nameserver = $params['nameserver'];
    $newIpAddress = $params['newipaddress'];
    // build post data
    $data = array(
        'key' => $apiKey,
        'server_domain' => $nameserver,
        'ip0' => $newIpAddress
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_SET_NS_IP_BY_DOMAIN, $data);
        $setNsIpResponse = $response->SetNsIpResponse;
        if ($setNsIpResponse->Status === 'success') {
            return array('success' => 'success');
        } else {
            return array('error' => $setNsIpResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Delete a Nameserver.
 * @param $params
 * @return array
 */
function dynadot_DeleteNameserver($params)
{
    $apiKey = $params['ApiKey'];
    // nameserver parameters
    $nameserver = $params['nameserver'];
    // build post data
    $data = array(
        'key' => $apiKey,
        'server_domain' => $nameserver
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_DELETE_NS_BY_DOMAIN, $data);
        $deleteNsResponse = $response->DeleteNsResponse;
        if ($deleteNsResponse->Status === 'success') {
            return array('success' => 'success');
        } else {
            return array('error' => $deleteNsResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Domain Information.
 * @param $params
 * @return array|Domain
 */
function dynadot_GetDomainInformation($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    try {
        // get domain info
        $response = Domains::getDomainInfo($apiKey, $domainName);
        $domainInfoResponse = $response->DomainInfoResponse;
        if ($domainInfoResponse->Status === 'success') {
            $domainInfo = $domainInfoResponse->DomainInfo;
            // expiration time
            $timeFormat = 'Y-m-d H:i:s';
            $expirationTime = date($timeFormat, substr($domainInfo->Expiration, 0, 10));
            // nameservers
            $nameServerArray = array();
            $nameServers = $domainInfo->NameServerSettings->NameServers;
            if (is_array($nameServers)) {
                $count = count($nameServers);
                for ($i = 0; $i < $count; $i++) {
                    $nameServer = $nameServers[$i];
                    $nameServerArray['ns' . ($i + 1)] = $nameServer->ServerName;
                }
            }
            // domain status
            switch (strtolower($domainInfo->Status)) {
                case 'active':
                    $domainStatus = constant('\WHMCS\Domain\Registrar\Domain::STATUS_ACTIVE');
                    break;
                case 'expired':
                    $domainStatus = constant('\WHMCS\Domain\Registrar\Domain::STATUS_EXPIRED');
                    break;
                case 'deleted by cust':
                case 'deleted by admin':
                case 'deleted by registry':
                    $domainStatus = constant('\WHMCS\Domain\Registrar\Domain::STATUS_DELETED');
                    break;
                case 'transferaway':
                    $domainStatus = constant('\WHMCS\Domain\Registrar\Domain::STATUS_INACTIVE');
                    break;
            }
            // domain
            $domain = new Domain();
            $domain->setDomain($domainInfo->Name);
            $domain->setNameservers($nameServerArray);
            $domain->setTransferLock($domainInfo->Locked !== 'no');
            $domain->setExpiryDate(Carbon::createFromFormat($timeFormat, $expirationTime));
            if (!empty($domainStatus)) {
                $domain->setRegistrationStatus($domainStatus);
            }
            return $domain;
        } else {
            return array('error' => $domainInfoResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * TLD & Pricing Sync.
 * @param $params
 * @return ResultsList
 * @throws Exception
 */
function dynadot_GetTldPricing($params)
{
    $results = new ResultsList;
    $apiKey = $params['ApiKey'];
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_TLD_PRICE, array('key' => $apiKey));
        $tldPriceResponse = $response->TldPriceResponse;
        if ($tldPriceResponse->Status === "success") {
            $tldPriceArray = $tldPriceResponse->TldPrice;
            foreach ($tldPriceArray as $tldPrice) {
                $price = $tldPrice->Price;
                $gracePeriod = $tldPrice->GracePeriod;
                $renew = $price->Renew;
                $restore = $price->Restore;
                // all the set methods can be chained and utilised together.
                $item = (new ImportItem)
                    ->setExtension($tldPrice->Tld)
                    ->setRegisterPrice((float)$price->Register)
                    ->setRenewPrice((float)$renew)
                    ->setTransferPrice((float)$price->Transfer)
                    ->setGraceFeeDays((int)$gracePeriod->Renew)
                    ->setGraceFeePrice((float)$price->GraceFee)
                    ->setRedemptionFeeDays((int)$gracePeriod->Restore)
                    ->setRedemptionFeePrice((float)$restore - (float)$renew)
                    ->setCurrency($tldPriceResponse->Currency);
                $results[] = $item;
            }
        }
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
    return $results;
}

/**
 * Domain Syncing.
 * @param $params
 * @return array
 * @throws Exception
 */
function dynadot_Sync($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    try {
        // get domain info
        $response = Domains::getDomainInfo($apiKey, $domainName);
        $domainInfoResponse = $response->DomainInfoResponse;
        if ($domainInfoResponse->Status === 'success') {
            $domainInfo = $domainInfoResponse->DomainInfo;
            $domainStatus = $domainInfo->Status;
            if ($domainStatus === 'active') {
                return array(
                    'active' => true,
                    'expirydate' => date('Y-m-d H:i:s', substr($domainInfo->Expiration, 0, 10))
                );
            } else if ($domainStatus === 'cancelled') {
                return array(
                    'cancelled' => true
                );
            } else if ($domainStatus === 'transferredAway') {
                return array(
                    'transferredAway' => true
                );
            } else if ($domainStatus === 'expired') {
                return array(
                    'expired' => true,
                    'expirydate' => date('Y-m-d H:i:s', substr($domainInfo->Expiration, 0, 10))
                );
            } else {
                return array();
            }
        } else {
            return array('error' => $domainInfoResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Transfer Syncing.
 * @param $params
 * @return array
 * @throws Exception
 */
function dynadot_TransferSync($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // build data
    $data = array(
        'key' => $apiKey,
        'domain' => $domainName,
        'transfer_type' => 'in',
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_GET_TRANSFER_STATUS, $data);
        $getTransferStatusResponse = $response->GetTransferStatusResponse;
        if ($getTransferStatusResponse->Status === "success") {
            $transferList = $getTransferStatusResponse->TransferList;
            if (count($transferList) === 0) {
                // no status change, return empty array
                return array();
            }
            $transfer = $transferList[0];
            $transferStatus = $transfer->TransferStatus;
            if ($transferStatus === 'Transferred') {
                return array(
                    'completed' => true,
                    'expirydate' => date('Y-m-d H:i:s', substr($transfer->ExpirationDate, 0, 10))
                );
            } elseif ($transferStatus === 'Failed') {
                return array(
                    'failed' => true,
                    'reason' => $transfer->FailedReason
                );
            } else {
                // no status change, return empty array
                return array();
            }
        } else {
            return array('error' => $getTransferStatusResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Admin Custom Button Array.
 * @param $params
 * @return array
 */
function dynadot_AdminCustomButtonArray($params)
{
    return array(
        'Mark Contact As Verified' => 'MarkContactAsVerified',
    );
}

/**
 * Mark Contact As Verified.
 * @param $params
 * @return array
 */
function dynadot_MarkContactAsVerified($params)
{
    $apiKey = $params['ApiKey'];
    // domain parameters
    $domainName = Domains::getDomainName($params);
    // build data
    $data = array(
        'key' => $apiKey,
        'domain' => $domainName,
        'status' => 'verified',
    );
    try {
        $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_SET_WHOIS_CONTACT_VERIFICATION_STATUS, $data);
        $setWhoisContactVerificationStatusResponse = $response->SetWhoisContactVerificationStatusResponse;
        if ($setWhoisContactVerificationStatusResponse->Status === 'success') {
            return array(
                'success' => 'success',
                'message' => 'The contact verification status was successfully changed at the registrar'
            );
        } else {
            return array('error' => $setWhoisContactVerificationStatusResponse->Error);
        }
    } catch (Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

/**
 * Client Area Allowed Functions.
 * @return array
 */
function dynadot_ClientAreaAllowedFunctions($params)
{
    // domain addon purchase status
    $enableDnsManagement = (bool)$params['dnsmanagement'];
    $enableEmailForwarding = (bool)$params['emailforwarding'];
    // $enableIdProtection = (bool)$params['idprotection'];
    $functions = array();
    if ($enableDnsManagement) {
        $functions['Domain DNS Management'] = 'DnsManagement';
    }
    if ($enableEmailForwarding) {
        $functions['Domain Email Forwarding'] = 'EmailForwarding';
    }
    return $functions;
}

/**
 * Domain DNS Management.
 * @param $params
 * @return array
 */
function dynadot_DnsManagement($params)
{
    $apiKey = $params['ApiKey'];
    $domainName = Domains::getDomainName($params);
    if (isset($_REQUEST['submitType'])) {
        // main
        $mainRecordTypes = $_REQUEST['dnsRecordType'];
        $mainRecordAddresses = $_REQUEST['dnsRecordAddress'];
        $mainExtends = $_REQUEST['extend'];
        // sub
        $subDnsNames = $_REQUEST['subDnsName'];
        $subRecordTypes = $_REQUEST['subDnsRecordType'];
        $subRecordAddresses = $_REQUEST['subDnsRecordAddress'];
        $subExtends = $_REQUEST['subExtend'];
        $setDnsResult = Domains::setDNS($apiKey, $domainName,
            $mainRecordTypes, $mainRecordAddresses, $mainExtends,
            $subDnsNames, $subRecordTypes, $subRecordAddresses, $subExtends);
        if ($setDnsResult['success']) {
            $info['saveSuccess'] = true;
        } else {
            $info['saveSuccess'] = false;
            $info['saveError'] = $setDnsResult['error'];
        }
    }
    // get
    $getDnsResult = Domains::getDNS($apiKey, $domainName);
    if ($getDnsResult['success']) {
        $info['getSuccess'] = true;
        $info['mainRecords'] = $getDnsResult['mainRecords'];
        $info['subRecords'] = $getDnsResult['subRecords'];
    } else {
        $info['getSuccess'] = false;
        $info['getError'] = $getDnsResult['error'];
    }
    $data = http_build_query(array(
        'action' => 'domaindetails',
        'domainid' => $params['domainid'],
        'modop' => 'custom',
        'a' => 'DnsManagement',
    ));
    return array(
        'templatefile' => 'dnsmanagement',
        'breadcrumb' => array(
            'clientarea.php?' . $data => 'Domain DNS Management',
        ),
        'vars' => array(
            'saveSuccess' => $info['saveSuccess'],
            'saveError' => $info['saveError'],
            'getSuccess' => $info['getSuccess'],
            'getError' => $info['getError'],
            'mainRecords' => $info['mainRecords'],
            'subRecords' => $info['subRecords']
        )
    );
}

/**
 * Domain Email Forwarding.
 * @param $params
 * @return array
 */
function dynadot_EmailForwarding($params)
{
    $apiKey = $params['ApiKey'];
    $domainName = Domains::getDomainName($params);
    if (isset($_REQUEST['submitType'])) {
        if ($_REQUEST['recordType'] == "email") {
            $emailArray = $_REQUEST['email'];
            $aliasArray = $_REQUEST['alias'];
            $setEmailForwardingResult = Domains::setEmailforwarding($apiKey, $domainName, $emailArray, $aliasArray);
            if ($setEmailForwardingResult['success']) {
                $info['saveSuccess'] = true;
            } else {
                $info['saveSuccess'] = false;
                $info['saveError'] = $setEmailForwardingResult['error'];
            }
        }
    }
    // get
    $getEmailForwardingResult = Domains::getEmailforwarding($apiKey, $domainName);
    if ($getEmailForwardingResult['success']) {
        $info['getSuccess'] = true;
        $info['records'] = $getEmailForwardingResult['records'];
    } else {
        $info['getSuccess'] = false;
        $info['getError'] = $getEmailForwardingResult['error'];
    }
    $data = http_build_query(array(
        'action' => 'domaindetails',
        'domainid' => $params['domainid'],
        'modop' => 'custom',
        'a' => 'EmailForwarding',
    ));
    return array(
        'templatefile' => 'emailforwarding',
        'breadcrumb' => array(
            'clientarea.php?' . $data => 'Domain Email Forwarding',
        ),
        'vars' => array(
            'saveSuccess' => $info['saveSuccess'],
            'saveError' => $info['saveError'],
            'getSuccess' => $info['getSuccess'],
            'getError' => $info['getError'],
            'records' => $info['records']
        )
    );
}