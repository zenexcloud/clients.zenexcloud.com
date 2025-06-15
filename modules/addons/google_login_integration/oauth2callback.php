<?php

require_once '../../../init.php';
require_once ROOTDIR . '/includes/functions.php';
require_once ROOTDIR . '/includes/clientfunctions.php';

use WHMCS\Database\Capsule;
use WHMCS\Config\Setting;

$systemUrl = Setting::getValue('SystemURL');
$config = getAddonConfig(); // Fetch module settings from DB

$clientID = $config['ClientID'] ?? '';
$clientSecret = $config['ClientSecret'] ?? '';
$redirectUri = $systemUrl . $config['RedirectURI'] ?? '';

// Validate required config
if (empty($clientID) || empty($clientSecret) || empty($redirectUri)) {
    die("Google OAuth configuration is missing. Please configure in WHMCS Admin.");
}

if (isset($_GET['code'])) {
    $tokenUrl = "https://oauth2.googleapis.com/token";
    $postData = [
        'code' => $_GET['code'],
        'client_id' => $clientID,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    $accessToken = $data['access_token'] ?? null;

    if (!$accessToken) {
        die("Failed to obtain access token.");
    }

    $userinfo = getUserInfo($accessToken);

    $email = $userinfo['email'] ?? '';
    $firstname = $userinfo['given_name'] ?? 'GoogleUser';
    $lastname = $userinfo['family_name'] ?? '-';

    if (empty($email)) {
        die("No email address returned from Google.");
    }

    // Check if user exists
    $checkClient = localAPI('GetClients', ['search' => $email]);
    $isNewClient = false;

    if ($checkClient['totalresults'] > 0) {
        $clientId = $checkClient['clients']['client'][0]['id'];
        logActivity("Google Login Successful for Existing Client: {$email}");
    } else {
        // User doesn't exist, register them
        $generatedPassword = generateClientPW(12);

        $addClient = localAPI('AddClient', [
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'     => $email,
            'address1'  => 'Not Provided',
            'city'      => 'Not Provided',
            'state'     => 'Not Provided',
            'postcode'  => '00000',
            'country'   => 'US',
            'phonenumber' => '0000000000',
            'password2'   => $generatedPassword,
            'noemail'     => true
        ]);

        if ($addClient['result'] === 'success') {
            $clientId = $addClient['clientid'];
            logActivity("Google Login - New Client Created for {$email}");
            $isNewClient = true;
        } else {
            die("Client creation failed: " . $addClient['message']);
        }
    }

    // ✅ Generate SSO Token (works for both new & existing clients)
    $sso = localAPI('CreateSsoToken', [
        'client_id' => $clientId,
    ]);

    if ($sso['result'] !== 'success') {
        die("SSO Token generation failed: " . $sso['message']);
    }

    header("Location: " . $sso['redirect_url']);
    exit;
}

function getUserInfo($accessToken)
{
    $url = 'https://www.googleapis.com/oauth2/v2/userinfo';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer {$accessToken}"
    ]);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        die("cURL error: " . curl_error($ch));
    }

    curl_close($ch);

    return json_decode($response, true);
}

function getAddonConfig($moduleName = 'google_login_integration') {
    return Capsule::table('tbladdonmodules')
        ->where('module', $moduleName)
        ->pluck('value', 'setting')
        ->toArray();
}
