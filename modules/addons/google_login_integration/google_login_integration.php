<?php
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function google_login_integration_config()
{
    return [
        'name' => 'Google Login Integration',
        'description' => 'Integrate Google OAuth2 for seamless client authentication and registration.',
        'version' => '1.0.0',
        'author' => 'Sheraz H.',
        'language' => 'english',
        'fields' => [
            'ClientID' => [
                'FriendlyName' => 'Google Client ID',
                'Type' => 'text',
                'Size' => '50',
                'Description' => 'Enter your Google API OAuth 2.0 Client ID',
            ],
            'ClientSecret' => [
                'FriendlyName' => 'Google Client Secret',
                'Type' => 'password',
                'Size' => '50',
                'Description' => 'Enter your Google API OAuth 2.0 Client Secret',
            ],
            'RedirectURI' => [
                'FriendlyName' => 'OAuth Redirect URI',
                'Type' => 'text',
                'Size' => '70',
                'Default' => WHMCS\Utility\Environment\WebHelper::getBaseUrl() . '/modules/addons/google_login_integration/oauth2callback.php',
                'Description' => 'Set this URI in your Google Console OAuth2 configuration.',
            ],
        ],
    ];
}

function google_login_integration_activate()
{
    return [
        'status' => 'success',
        'description' => 'Google Login module activated successfully.',
    ];
}

function google_login_integration_deactivate()
{
    return [
        'status' => 'success',
        'description' => 'Google Login module deactivated successfully.',
    ];
}

function google_login_integration_upgrade($vars)
{
    // Example upgrade logic for future versions
    $currentVersion = $vars['version'];
    if (version_compare($currentVersion, '1.1.0', '<')) {
        // Perform upgrade tasks here
    }
}

function google_login_integration_output($vars)
{
    echo "<h2>Google Login Integration Module</h2>";
    echo "<p>Status: <strong>Installed Successfully</strong></p>";
    echo "<p>Configure the settings under <strong>Setup » Addon Modules » Google Login Integration</strong>.</p>";
}
