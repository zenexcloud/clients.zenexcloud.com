<?php

namespace WHMCS\Module\Registrar\dynadot;

use Exception;
use WHMCS\Config\Setting;

class Domains
{

    // dynadot registrar module download link
    const DOWNLOAD_LINK = "https://marketplace.whmcs.com/product/6353-dynadot-domain-registrar-whmcs";

    /**
     * Get latest version.
     * @return string
     */
    public static function getLatestVersion()
    {
        $latestVersion = null;
        try {
            $response = Api::sendRequest("check_version" . '/' . Api::COMMAND_GET_WHMCS_MODULE_VERSION, array('key' => 'whmcs'));
            $getWhmcsModuleVersionResponse = $response->GetWhmcsModuleVersionResponse;
            if ($getWhmcsModuleVersionResponse->Status === 'success') {
                $getWhmcsModuleVersionContent = $getWhmcsModuleVersionResponse->GetWhmcsModuleVersionContent;
                $latestVersion = $getWhmcsModuleVersionContent->Version;
            }
        } catch (Exception $e) {
        }
        return $latestVersion;
    }

    /**
     * Get current version.
     * @return string
     */
    public static function getCurrentVersion()
    {
        $fileName = dirname(__DIR__) . "/version.json";
        $contents = json_decode(file_get_contents($fileName));
        // current version
        return $contents->version;
    }

    /**
     * Get domain name.
     * @param $params
     * @return string
     */
    public static function getDomainName($params)
    {
        $isIdn = $params['is_idn'];
        if ($isIdn) {
            // idn domain
            return $params['domain_punycode'];
        } else {
            $keyword = $params['sld'];
            $tld = $params['tld'];
            return $keyword . '.' . $tld;
        }
    }

    /**
     * Check domain status.
     * @param $key
     * @param $domain
     * @return array
     */
    public static function checkDomainStatus($key, $domain)
    {
        $data = array(
            'key' => $key,
            'domains' => $domain
        );
        try {
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_DOMAIN_CHECK, $data);
            $domainCheckResponse = $response->DomainCheckResponse;
            if ($domainCheckResponse->Status === 'success') {
                $checkResult = $domainCheckResponse->DomainCheckResults[0];
                return array(
                    'success' => true,
                    'available' => $checkResult->domainStatus === 'available',
                    'premiumDomain' => $checkResult->isPremiumDomain,
                );
            } else {
                return array('error' => $domainCheckResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Set domain lock.
     * @param $key
     * @param $domain
     * @param $lockStatus
     * @return array
     */
    public static function setDomainLock($key, $domain, $lockStatus)
    {
        // build data
        $data = array(
            'key' => $key,
            'domain' => $domain
        );
        try {
            if ($lockStatus == 'locked') {
                // lock
                $lockResponse = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_LOCK_DOMAIN, $data);
                $lockDomainResponse = $lockResponse->LockDomainResponse;
                $lockDomainError = $lockDomainResponse->Error;
                if ($lockDomainResponse->Status === 'success'
                    || strpos($lockDomainError, 'already')) {
                    return array('success' => true);
                } else {
                    return array('error' => $lockDomainError);
                }
            } else {
                // unlock
                $unLockResponse = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_UNLOCK_DOMAIN, $data);
                $unlockDomainResponse = $unLockResponse->UnlockDomainResponse;
                $unlockDomainError = $unlockDomainResponse->Error;
                if ($unlockDomainResponse->Status === 'success'
                    || strpos($unlockDomainError, 'already')) {
                    return array('success' => true);
                } else {
                    return array('error' => $unlockDomainError);
                }
            }
        } catch (Exception $e) {
            return array(
                'error' => $e->getMessage(),
            );
        }
    }

    /**
     * Set domain privacy.
     * @param $key
     * @param $domain
     * @param $enable
     * @return array
     */
    public static function setDomainPrivacy($key, $domain, $enable)
    {
        // build data
        $data = array(
            'key' => $key,
            'domain' => $domain,
            'option' => $enable ? 'full' : 'off'
        );
        try {
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_SET_PRIVACY, $data);
            $setPrivacyResponse = $response->SetPrivacyResponse;
            if ($setPrivacyResponse->Status === 'success') {
                return array('success' => true);
            } else {
                return array('error' => $setPrivacyResponse->Error);
            }
        } catch (Exception $e) {
            return array(
                'error' => $e->getMessage(),
            );
        }
    }

    /**
     * Set nameserver.
     * @param $key
     * @param $domain
     * @param $nameservers
     * @return array
     */
    public static function setNameserver($key, $domain, $nameservers)
    {
        // update nameserver
        $updateNameServerData = array(
            'key' => $key,
            'domain' => $domain
        );
        $size = count($nameservers);
        for ($i = 0; $i < $size; $i++) {
            $updateNameServerData['ns' . $i] = $nameservers[$i];
        }
        try {
            $setResponse = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_SET_NS, $updateNameServerData);
            $setNsResponse = $setResponse->SetNsResponse;
            if ($setNsResponse->Status === 'success') {
                return array('success' => true);
            } else {
                return array('error' => $setNsResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Update a contact.
     * @param $key
     * @param $domain
     * @param $registrantContactId
     * @param $adminContactId
     * @param $technicalContactId
     * @param $billingContactId
     * @return array
     */
    public static function setContact($key, $domain, $registrantContactId, $adminContactId, $technicalContactId, $billingContactId)
    {
        $data = array(
            'key' => $key,
            'domain' => $domain,
            'registrant_contact' => $registrantContactId,
            'admin_contact' => $adminContactId,
            'technical_contact' => $technicalContactId,
            'billing_contact' => $billingContactId,
        );
        try {
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_SET_WHOIS, $data);
            $setWhoisResponse = $response->SetWhoisResponse;
            if ($setWhoisResponse->Status === 'success') {
                return array('success' => true);
            } else {
                return array('error' => $setWhoisResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Get contact details by contactId.
     * @param $key
     * @param $contactId
     * @return array
     * @throws Exception
     */
    public static function getContact($key, $contactId)
    {
        $data = array(
            'key' => $key,
            'contact_id' => $contactId
        );
        try {
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_GET_CONTACT, $data);
            $getContactResponse = $response->GetContactResponse;
            if ($getContactResponse->Status === 'success') {
                $result = $getContactResponse->GetContact;
                $nameArray = explode(' ', $result->Name, 2);
                $result = array(
                    'First Name' => $nameArray[0],
                    'Last Name' => $nameArray[1],
                    'Company Name' => $result->Organization,
                    'Email Address' => $result->Email,
                    'Address 1' => $result->Address1,
                    'Address 2' => $result->Address2,
                    'City' => $result->City,
                    'State' => $result->State,
                    'Postcode' => $result->ZipCode,
                    'Country' => $result->Country,
                    'Phone Number' => $result->PhoneNum,
                );
            } else {
                throw new Exception($getContactResponse->Error);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return $result;
    }

    /**
     * Get a domain information.
     * @param $key
     * @param $domainName
     * @return mixed
     * @throws Exception
     */
    public static function getDomainInfo($key, $domainName)
    {
        // build data
        $data = array(
            'key' => $key,
            'domain' => $domainName
        );
        try {
            return Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_DOMAIN_INFO, $data);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Split domain array.
     * @param $data
     * @return array
     */
    public static function splitDomainArray($data)
    {
        $num = 50;
        $array = array();
        if (empty($data)) {
            return $array;
        }
        $count = count($data) / $num;
        if (!is_int($count)) {
            $count = ceil($count);
        } else {
            $count = $count + 1;
        }
        for ($i = 0; $i < $count; ++$i) {
            $arraySlice = array_slice($data, $i * $num, $num);
            if (empty($arraySlice)) {
                continue;
            }
            $array[] = $arraySlice;
            unset($arraySlice);
        }
        return $array;
    }

    /**
     * @param $key
     * @param $contactId
     * @param $inputContactData
     * @return array
     */
    public static function editContact($key, $contactId, $inputContactData)
    {
        $phoneNumber = explode('.', $inputContactData['Phone Number'], 2)[1];
        $data = array(
            'organization' => $inputContactData['Company Name'],
            'name' => $inputContactData['First Name'] . ' ' . $inputContactData['Last Name'],
            'email' => $inputContactData['Email Address'],
            'phonenum' => $phoneNumber,
            'phonecc' => $inputContactData['Phone Country Code'],
            'address1' => $inputContactData['Address 1'],
            'address2' => $inputContactData['Address 2'],
            'city' => $inputContactData['City'],
            'state' => $inputContactData['State'],
            'zip' => $inputContactData['Postcode'],
            'country' => $inputContactData['Country']
        );
        $data['key'] = $key;
        $data['contact_id'] = $contactId;
        try {
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_EDIT_CONTACT, $data);
            $editContactResponse = $response->EditContactResponse;
            $error = $editContactResponse->Error;
            if ($editContactResponse->Status === 'success'
                || strpos($error, 'changes')) {
                return array('success' => true);
            } else {
                return array('error' => $error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Create contact.
     * @param $apiKey
     * @param $data
     * @return array
     */
    public static function creatContactId($apiKey, $data)
    {
        // create contact
        try {
            $data['key'] = $apiKey;
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_CREATE_CONTACT, $data);
            $createContactResponse = $response->CreateContactResponse;
            if ($createContactResponse->Status === 'success') {
                $apiContactId = $createContactResponse->CreateContactContent->ContactId;
                return array(
                    'success' => true,
                    'contactId' => $apiContactId
                );
            } else {
                return array('error' => $createContactResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Set domain DNS.
     * @param $apiKey
     * @param $domainName
     * @param $mainRecordTypes
     * @param $mainRecordAddresses
     * @param $mainExtends
     * @param $subDnsNames
     * @param $subRecordTypes
     * @param $subRecordAddresses
     * @param $subExtends
     * @return array
     */
    public static function setDNS($apiKey, $domainName, $mainRecordTypes, $mainRecordAddresses, $mainExtends, $subDnsNames, $subRecordTypes, $subRecordAddresses, $subExtends)
    {
        try {
            $data = array();
            // main
            for ($i = 0; $i < 20; $i++) {
                $recordType = $mainRecordTypes[$i];
                $recordAddress = $mainRecordAddresses[$i];
                $extend = $mainExtends[$i];
                if ($recordType != null && $recordAddress != null) {
                    if ($recordType == "forward" || $recordType == "mx"
                        || $recordType == "stealth" || $recordType == "email") {
                        if ($extend == "N/A" || $extend == null) {
                            continue;
                        }
                        $data['main_recordx' . $i] = $extend;
                    }
                    $data['main_record_type' . $i] = $recordType;
                    $data['main_record' . $i] = $recordAddress;
                }
            }
            //sub
            for ($i = 0; $i < 50; $i++) {
                $subDnsName = $subDnsNames[$i];
                $recordType = $subRecordTypes[$i];
                $recordAddress = $subRecordAddresses[$i];
                $extend = $subExtends[$i];
                if ($recordType != null && $recordAddress != null) {
                    if ($recordType == "forward" || $recordType == "mx"
                        || $recordType == "stealth" || $recordType == "email") {
                        if ($extend == "N/A" || $extend == null) {
                            continue;
                        }
                        $data['sub_recordx' . $i] = $extend;
                    }
                    $data['subdomain' . $i] = $subDnsName;
                    $data['sub_record_type' . $i] = $recordType;
                    $data['sub_record' . $i] = $recordAddress;
                }
            }
            $data['key'] = $apiKey;
            $data['domain'] = $domainName;
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_SET_DNS, $data);
            $setDnsResponse = $response->SetDnsResponse;
            if ($setDnsResponse->Status === "success") {
                return array('success' => true);
            } else {
                return array('error' => $setDnsResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Get domain DNS.
     * @param $apiKey
     * @param $domainName
     * @return array
     */
    public static function getDNS($apiKey, $domainName)
    {
        try {
            $data = array(
                'key' => $apiKey,
                'domain' => $domainName
            );
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_GET_DNS, $data);
            $getDnsResponse = $response->GetDnsResponse;
            if ($getDnsResponse->Status === "success") {
                $nameServerSettings = $getDnsResponse->GetDns->NameServerSettings;
                $type = $nameServerSettings->Type;
                $info = array();
                if ($type == "Dynadot DNS") {
                    // main
                    $mainRecords = array();
                    $mainDomains = $nameServerSettings->MainDomains;
                    foreach ($mainDomains as $mainDomain) {
                        $recordType = $mainDomain->RecordType;
                        if ($recordType == "Email Forward" || $recordType == "Email") {
                            continue;
                        }
                        $dnsRecord = array();
                        $dnsRecord["recordType"] = $recordType;
                        $dnsRecord["recordAddress"] = $mainDomain->Value;
                        $value2 = $mainDomain->Value2;
                        $dnsRecord["extend"] = $value2 == null ? "N/A" : $value2;
                        $mainRecords[] = $dnsRecord;
                    }
                    $info['mainRecords'] = $mainRecords;
                    // sub
                    $subRecords = array();
                    $subDomains = $nameServerSettings->SubDomains;
                    foreach ($subDomains as $subDomain) {
                        $recordType = $subDomain->RecordType;
                        if ($recordType == "Email Forward" || $recordType == "Email") {
                            continue;
                        }
                        $dnsRecord = array();
                        $dnsRecord["subName"] = $subDomain->Subhost;
                        $dnsRecord["subRecordType"] = $subDomain->RecordType;
                        $dnsRecord["subRecordAddress"] = $subDomain->Value;
                        $value2 = $subDomain->Value2;
                        $dnsRecord["subExtend"] = $value2 == null ? "N/A" : $value2;
                        $subRecords[] = $dnsRecord;
                    }
                    $info['subRecords'] = $subRecords;
                }
                $info["success"] = true;
                return $info;
            } else {
                return array('error' => $getDnsResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Set domain email forwarding.
     * @param $apiKey
     * @param $domainName
     * @param $emailArray
     * @param $aliasArray
     * @return array
     */
    public static function setEmailforwarding($apiKey, $domainName, $emailArray, $aliasArray)
    {
        try {
            $data = array();
            for ($i = 0; $i < 10; $i++) {
                $email = $emailArray[$i];
                $alias = $aliasArray[$i];
                if ($email != null && $alias != null) {
                    $data['username' . $i] = $alias;
                    $data['exist_email' . $i] = $email;
                }
            }
            if (count($data) == 0) {
                // empty, not set
                $data['forward_type'] = 'donot';
            } else {
                $data['forward_type'] = 'forward';
            }
            $data['key'] = $apiKey;
            $data['domain'] = $domainName;
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_SET_EMAIL_FORWARD, $data);
            $setEmailForwardingResponse = $response->SetEmailForwardingResponse;
            if ($setEmailForwardingResponse->Status === "success") {
                return array('success' => true);
            } else {
                return array('error' => $setEmailForwardingResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /**
     * Get domain email forwarding.
     * @param $apiKey
     * @param $domainName
     * @return array
     */
    public static function getEmailforwarding($apiKey, $domainName)
    {
        try {
            $data = array(
                'key' => $apiKey,
                'domain' => $domainName
            );
            $response = Api::sendRequest(__FUNCTION__ . '/' . Api::COMMAND_DOMAIN_INFO, $data);
            $domainInfoResponse = $response->DomainInfoResponse;
            if ($domainInfoResponse->Status === "success") {
                $info = array();
                $emailForwarding = $domainInfoResponse->DomainInfo->NameServerSettings->EmailForwarding;
                if ($emailForwarding->Type == "forward") {
                    // main
                    $records = array();
                    $aliases = $emailForwarding->Aliases;
                    foreach ($aliases as $alias) {
                        $record = array();
                        $record["email"] = $alias->ToEmail;
                        $record["alias"] = $alias->User;
                        $records[] = $record;
                    }
                    $info['records'] = $records;
                }
                $info["success"] = true;
                return $info;
            } else {
                return array('error' => $domainInfoResponse->Error);
            }
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

}