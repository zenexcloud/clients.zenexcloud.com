<?php

use WHMCS\Module\AbstractWidget;
use WHMCS\Module\Registrar\dynadot\Domains;

add_hook("AdminHomepage", 1, function () {
    $latestVersion = Domains::getLatestVersion();
    if ($latestVersion == null) {
        $latestVersion = "Unknown";
    }
    $currentVersion = Domains::getCurrentVersion();
    if ($currentVersion == null) {
        $currentVersion = "Unknown";
    }
    $needUpdate = version_compare($currentVersion, $latestVersion) === -1;
    $downloadLink = Domains::DOWNLOAD_LINK;
    if ($needUpdate) {
        return <<<EOF
        <div class="infobox">
        <strong><span class="title">Dynadot Registrar Module Update Available!</span></strong>
        <br>
        You can download the update from 
        <a href="$downloadLink" target="_blank" style="text-decoration: underline;">WHMCS Marketplace</a>
        </div>
EOF;
    } else {
        return "";
    }
});

add_hook('AfterRegistrarRegistration', 1, function ($vars) {
    $params = $vars['params'];
    // only for the dynadot registrar module
    if ($params['registrar'] == 'dynadot') {
        // registration parameters
        $apiKey = $params['ApiKey'];
    }
});

add_hook('ClientAreaPageDomainDNSManagement', 1, function ($vars) {
    $registrar = $vars['dnsrecords']['vars']['registrar'];
    if ($registrar == "dynadot") {
        $domainId = $vars['domainid'];
        $data = http_build_query(array(
            'action' => 'domaindetails',
            'domainid' => $domainId,
            'modop' => 'custom',
            'a' => 'DnsManagement',
        ));
        header("Location: clientarea.php?" . $data);
    }
});

add_hook('ClientAreaPageDomainEmailForwarding', 1, function ($vars) {
    $registrar = $vars['emailforwarders']['vars']['registrar'];
    if ($registrar == "dynadot") {
        $domainId = $vars['domainid'];
        $data = http_build_query(array(
            'action' => 'domaindetails',
            'domainid' => $domainId,
            'modop' => 'custom',
            'a' => 'EmailForwarding',
        ));
        header("Location: clientarea.php?" . $data);
    }
});

add_hook('AdminHomeWidgets', 1, function () {
    return new VersionWidget();
});

/**
 * Version Widget.
 */
class VersionWidget extends AbstractWidget
{
    protected $title = 'Dynadot Registrar Module Version';
    protected $description = 'dynadot registrar module version';
    protected $weight = 150;
    protected $columns = 1;
    protected $cache = true;
    protected $cacheExpiry = 1800;
    protected $requiredPermission = '';

    public function getData()
    {
        $latestVersion = Domains::getLatestVersion();
        if ($latestVersion == null) {
            $latestVersion = "Unknown";
        }
        $currentVersion = Domains::getCurrentVersion();
        if ($currentVersion == null) {
            $currentVersion = "Unknown";
        }
        return array(
            "currentVersion" => $currentVersion,
            "latestVersion" => $latestVersion
        );
    }

    public function generateOutput($data)
    {
        $currentVersion = $data["currentVersion"];
        $latestVersion = $data["latestVersion"];
        $needUpdate = version_compare($currentVersion, $latestVersion) === -1;
        if ($needUpdate) {
            $downloadContent = '<a href="' . Domains::DOWNLOAD_LINK . '" class="list-group-item list-group-item-success" target="_blank">Click here to update</a>';
        } else {
            $downloadContent = '';
        }
        return <<<EOF
             <div class="widget-content-padded">
                 <ul class="list-group">
                  <li class="list-group-item">Latest Version: <b>$latestVersion</b></li>
                  <li class="list-group-item">Current Version: <b>$currentVersion</b></li>
                  $downloadContent
                 </ul>
             </div>
EOF;
    }

}