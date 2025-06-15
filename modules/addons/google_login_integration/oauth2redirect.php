<?php
use WHMCS\Config\Setting;
use WHMCS\Database\Capsule;

require_once '../../../init.php';

$systemUrl = Setting::getValue('SystemURL');
$config = getAddonConfig(); // Fetch module settings from DB

$clientID = $config['ClientID'] ?? '';
$redirectUri = $systemUrl . $config['RedirectURI'] ?? '';

$googleLoginUrl = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
    'response_type' => 'code',
    'client_id' => $clientID,
    'redirect_uri' => $redirectUri,
    'scope' => 'email profile openid',
    'access_type' => 'online',
    'prompt' => 'consent',
]);


function getAddonConfig($moduleName = 'google_login_integration') {
    return Capsule::table('tbladdonmodules')
        ->where('module', $moduleName)
        ->pluck('value', 'setting')
        ->toArray();
}

header("Location: $googleLoginUrl");
exit;