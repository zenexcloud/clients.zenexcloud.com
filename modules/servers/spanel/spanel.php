<?php

use WHMCS\Database\Capsule;
use WHMCS\Module\Server\spanel\spanel;
use WHMCS\ClientArea;

function spanel_MetaData()
{
    return [
		'DisplayName' => 'SPanel',
		'APIVersion' => '1.1',
        'ServiceSingleSignOnLabel' => 'Login to SPanel',
        'AdminSingleSignOnLabel' => 'Login to SPanel Admin',
		'RequiresServer' => true,
	];
}

function spanel_ConfigOptions()
{
    return [
        "package" => [
            "FriendlyName" => "Select Package",
            "Type" => "text",
            "Loader" => "spanel_loadPackages",
			'SimpleMode' => true
        ],
        "branding" => [
            "FriendlyName" => "White Label",
            "Type" => "dropdown",
            'Options' => [
                'branded' => 'Show SPanel Branding',
                'unbranded' => 'Hide SPanel Branding',
            ],
			'SimpleMode' => true
        ],
    ];
}

function spanel_loadPackages(array $params)
{
	$spanel = new Spanel( $params );
	return $spanel->listpackages();
}

function spanel_CreateAccount(array $params)
{
	$spanel = new Spanel( $params );
	return $spanel->createaccount()->formatWhmcsResponse();
}

function spanel_TerminateAccount(array $params)
{
	$spanel = new Spanel( $params );
	return $spanel->terminateaccount()->formatWhmcsResponse();
}

function spanel_SuspendAccount(array $params)
{
	$spanel = new Spanel( $params );
	return $spanel->suspendaccount()->formatWhmcsResponse();
}

function spanel_UnsuspendAccount(array $params)
{
	$spanel = new Spanel( $params );
	return $spanel->unsuspendaccount()->formatWhmcsResponse();
}


function spanel_ChangePackage(array $params)
{
	$spanel = new Spanel( $params );
	return $spanel->changepackage()->formatWhmcsResponse();
}

function spanel_ChangePassword(array $params)
{
	$spanel = new Spanel( $params );
	return $spanel->changepassword()->formatWhmcsResponse();
}

function spanel_TestConnection($params)
{
	$spanel = new Spanel( $params );
	$spanel->testconnection();

	if( $spanel->error ){
		return [ 'success' => false, 'error' => $spanel->error ];
	}

	return [ 'success' => true, 'error' => '' ];
}

function spanel_ServiceSingleSignOn($params)
{

	$spanel = new Spanel( $params );
	if( $params['type'] == 'reselleraccount' ){
		$response = $spanel->getAdminSSO()->resultArray();
	}else{
		$response = $spanel->getClientSSO( $_GET['page'] ?? '' )->resultArray();
	}

	$redirectUrl = ( $response['result'] == 'success' ? $response['data']['url'] : '' );

	return [
		'success' => ( $response['result'] == 'success' ),
		'redirectTo' => $redirectUrl,
		'error' => $spanel->formatWhmcsResponse()
	];
}

function spanel_AdminSingleSignOn($params)
{
	$spanel = new Spanel( $params );

	$response = $spanel->getAdminSSO()->resultArray();

	$redirectUrl = ( $response['result'] == 'success' ? $response['data']['url'] : '' );

	return [
		'success' => ( $response['result'] == 'success' ),
		'redirectTo' => $redirectUrl,
		'error' => $spanel->formatWhmcsResponse()
	];
}

function spanel_ClientArea(array $params)
{

    try {
		$requestedAction = $_REQUEST['customAction'] ?? '';
		$templateFile = 'productview.tpl';
		$pageVariables = [];

		$spanel = new Spanel( $params );
		$serviceid = $params['serviceid'] ?? false ;

		$pageVariables['spanel'] = $spanel;
		$pageVariables['systemStatus'] = $params['status'] ?? 'Cancelled';
		$pageVariables['spanelicons'] = $spanel->fetchAvailableIcons();
		$pageVariables['spanelbranding'] = Spanel::getProductBranding( $serviceid );
		$pageVariables['usagestats'] = $spanel->getUsageStats();
		$pageVariables['spanelservicetype'] = $params['type']; // hostingaccount
		$pageVariables['isspanelhosting'] = ( $params['type'] == 'hostingaccount' );
		$pageVariables['showSpanel'] = ( $pageVariables['systemStatus'] == 'Active' && $pageVariables['isspanelhosting'] ? true : false );
		$pageVariables['logintospanellabel'] = $pageVariables['spanelbranding'].( $params['type'] == 'hostingaccount' ? 'logintospanel' : 'logintospaneladmin' );
		$pageVariables['renewfunctionality'] = $params['templatevars']['renewfunctionality'] ?? false;

		/*
		$pageVariables['debug'][] = $accountData;
		$pageVariables['debug'][] = $pageVariables['usagestats'];
		*/

    } catch (\Exception $e) {
        // Record the error in WHMCS's module log.
		$spanel->logger( $e->getMessage(), $e->getTraceAsString() );
		$templateFile = 'error.tpl';
		$pageVariables['criticalerror'] = $e->getMessage();
    }

	return [
		'tabOverviewReplacementTemplate' => 'templates/'.$templateFile,
		'templateVariables' => $pageVariables,
	];
}

?>