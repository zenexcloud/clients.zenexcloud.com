<?php

use WHMCS\Database\Capsule;
use WHMCS\Module\AbstractWidget;
use WHMCS\Module\Registrar\dynadot\Domains;
use WHMCS\View\Menu\Item as MenuItem;

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

add_hook('AdminHomeWidgets', 1, function () {
    return new VersionWidget();
});

/**
 * Added registration and renewal period reminder for AI Tld on TLD price setting page
 */
add_hook('AdminAreaFooterOutput', 1, function ($vars) {
    if (isset($vars['filename']) && $vars['filename'] === 'configdomains') {
        return <<<HTML
<script type="text/javascript">
function showAiTldRemind() {
    const aiTldRow = $("input[data-tld='.ai']").closest("tr");
    if (aiTldRow.find("select#registrarsDropDown").find("option:selected").text().trim() === 'Dynadot') {
        aiTldRow.after(
            '<tr id="dynadot-ai-remind"><td colspan="11" style="padding: 6px 5px;background-color: #f2d4ce; color: #c00; border: 1px solid #ae432e;border-radius: 5px;">' +
            'Reminder: .AI domain registrations and renewals require a minimum of 2 years. Orders with less than 2 years will not be accepted.' +
            '</td></tr>'
        )
    } else {
        $("#dynadot-ai-remind").remove();
    }
}
    
$(document).ready(function() {
    showAiTldRemind();
    $("input[data-tld='.ai']").closest("tr").find("select#registrarsDropDown").change(showAiTldRemind)
})
</script>
HTML;
    }
});

/**
 * Replace the management buttons of the DNS host record management product and the management buttons of the email forwarding product
 * in the plug-in with forwarding links of the custom DNS management page and the custom email forwarding page respectively
 */
add_hook('ClientAreaFooterOutput', 1, function ($vars) {
    if ($vars['templatefile'] == 'clientareadomaindetails' && isset($_REQUEST['id'])) {
        $domainId = (int)$_REQUEST['id'];
        $domain = Capsule::table('tbldomains')
            ->where('id', $domainId)
            ->first();

        if (!$domain || $domain->registrar !== 'dynadot') {
            return '';
        }

        return <<<HTML
<script>
$(document).ready(function() {
        $("#tabAddons a[href*='action=domaindns']").attr('data-dynadot-href', "dynadot-dns-management");
        $("#tabAddons a[href*='action=domainemailforwarding']").attr('data-dynadot-href', "dynadot-email-forwarding");
        $("#tabAddons a[href*='action=domaindns'], #tabAddons a[href*='action=domainemailforwarding']").removeAttr('href');
       
        $("#tabAddons a[data-dynadot-href='dynadot-dns-management']").on('click', function() {
            event.preventDefault();
            $(".sidebar .panel-actions a[menuitemname='Dns Management']").click();
        });
        
        $("#tabAddons a[data-dynadot-href='dynadot-email-forwarding']").on('click', function() {
            event.preventDefault();
            $(".sidebar .panel-actions a[menuitemname='Email Forwarding']").click();
        });
});
</script>
HTML;
    }
    return '';
});

/**
 * Remove DNS and Email Forwarding menu items if the domain registrar is dynadot
 * Since we have added custom buttons to point to Dynadot's DNS and Email Forwarding features, we need to hide these two menu items.
 */
add_hook('ClientAreaPrimarySidebar', 1, function (MenuItem $primarySidebar) {
    $domainId = $_REQUEST['id'] ?? $_REQUEST['domainid'] ?? null;
    if (!$domainId) {
        return;
    }

    try {
        $domain = Capsule::table('tbldomains')
            ->where('id', $domainId)
            ->first();

        if (!$domain || $domain->registrar !== 'dynadot') {
            return;
        }

        $domainDetailsMenu = $primarySidebar->getChild('Domain Details Management');
        if (!$domainDetailsMenu) {
            return;
        }

        $itemsToRemove = [
            'Manage DNS Host Records',
            'Manage Email Forwarding'
        ];

        foreach ($itemsToRemove as $itemName) {
            $menuItem = $domainDetailsMenu->getChild($itemName);
            if ($menuItem) {
                $domainDetailsMenu->removeChild($itemName);
            }
        }

    } catch (Exception $e) {
        logModuleCall('dynadot', 'HookError', $e->getMessage(), '', '');
    }
});

/**
 * Check the registration or renewal period of AI domain name before checking out
 */
add_hook('ShoppingCartValidateCheckout', 1, function () {
    try {
        $invalidDomains = [];
        if (!empty($_SESSION['cart']['domains'])) {
            $cartDomains = $_SESSION['cart']['domains'];
            foreach ($cartDomains as $domainInfo) {
                $domain = $domainInfo['domain'] ?? '';
                $dotCount = substr_count($domain, '.');
                if ($dotCount >= 2) {
                    $parts = explode('.', $domain);
                    $tld = $parts[$dotCount - 1] . '.' . $parts[$dotCount];
                } else {
                    $tld = substr(strrchr($domain, '.'), 1) ?: $domain;
                }

                $registrar = Capsule::table('tbldomainpricing')
                    ->where('extension', '.' . $tld)
                    ->value('autoreg');

                if ($registrar !== 'dynadot') {
                    continue;
                }

                $regPeriod = $domainInfo['regperiod'] ?? 0;
                if ($regPeriod < 2 && stripos($domain, '.ai') !== false) {
                    $invalidDomains[] = ['type' => 'register', 'domain' => $domain, 'registerPeriod' => $regPeriod];
                }
            }
        }

        if (!empty($_SESSION['cart']['renewalsByType']['domains'])) {
            $renewalsDomains = $_SESSION['cart']['renewalsByType']['domains'];
            foreach (array_keys($renewalsDomains) as $key) {
                $result = localAPI('GetClientsDomains', ['domainid' => $key]);
                $domain = $result['domains']['domain'][0];
                $registrar = $domain['registrar'] ?? '';
                if ($registrar !== 'dynadot') {
                    continue;
                }

                if ($renewalsDomains[$key] < 2 && stripos($domain['domainname'], '.ai') !== false) {
                    $invalidDomains[] = ['type' => 'renewal', 'domain' => $domain[0]['domainname'], 'renewPeriod' => $renewalsDomains[$key]];
                }
            }
        }

        if (!empty($invalidDomains)) {
            $errorMessages = [];
            foreach ($invalidDomains as $domainData) {
                if ($domainData['type'] === 'register') {
                    $msg = sprintf("The selected duration of {<strong>%d</strong>} year(s) is not allowed for .ai domains. The minimum registration duration for .ai domains is 2 years.",
                        $domainData['registerPeriod']
                    );
                } elseif ($domainData['type'] === 'renewal')
                    $msg = sprintf("The selected duration of {<strong>%d</strong>} year(s) is not allowed for .ai domains. The minimum renewal duration for .ai domains is 2 years.",
                        $domainData['renewPeriod']
                    );
                $errorMessages[] = $msg;
            }

            return [
                'message' => implode("<br>", $errorMessages),
            ];
        }
    } catch (Exception $e) {
        logModuleCall('dynadot', 'HookError', $e->getMessage(), '', '');
        return [
            'status' => 'error',
            'message' => 'Domain verification system error, please contact customer service for assistance.'
        ];
    }

    return [];
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