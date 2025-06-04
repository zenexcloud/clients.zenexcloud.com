<?php

use WHMCS\Database\Capsule;
use WHMCS\Module\Server\spanel\spanel;

add_hook('ClientAreaPageProductDetails', 1, 'hook_spanelSsoSidebar');

function hook_spanelSsoSidebar( $params ){

	$serviceid = $params['serviceid'];
	$domain = $params['domain'];
	$module = $params['module'];
	$type = $params['producttype'];
	$action = $params['action'];
	$status = $params['systemStatus'];

	if( $action != 'productdetails' || $module != 'spanel' ){ return []; }

	$spanel = new Spanel( $params );

	$branding = Spanel::getProductBranding( $serviceid );

	$primarySidebar = $params['primarySidebar'];

    // determine if we are on a page containing My Services Actions
    if ( !is_null($primarySidebar->getChild('Service Details Actions')) ) {
        $customSidebar = $primarySidebar->getChild('Service Details Actions');

		if( $branding == 'branded' ){
			$spanelResellerLabel = $spanel->translate('brandedlogintospaneladmin');
			$spanelLabel = $spanel->translate('brandedlogintospanel');
		}else{
			$spanelResellerLabel = $spanel->translate('unbrandedlogintospaneladmin');
			$spanelLabel = $spanel->translate('unbrandedlogintospanel');
		}

		$singleSignOnLink = 'clientarea.php?action=productdetails&id='.$serviceid.'&dosinglesignon=1';

		// Shared/Reseller SSO
		$spanelmenuitem = $customSidebar->addChild(
			( $type == 'reselleraccount' ? $spanelResellerLabel : $spanelLabel ),
			[ 'uri' => $singleSignOnLink.( $type == 'reselleraccount' ? '&adminlogin=1' : '' ), 'icon'  => 'fa-user-alt', 'order' => 0 ]
			)->setAttributes([ 'target' => '_blank' ]);

		if( $status != 'Active' ){ $spanelmenuitem->disable(); }

		if( $type != 'reselleraccount' ){
			// Webmail link
			$webmailmenuitem = $customSidebar->addChild( 'Login to Webmail', [ 'uri' => 'https://'.$domain.'/webmail', 'icon'  => 'fa-envelope', 'order' => 0, ] )->setAttributes([ 'target' => '_blank' ]);
			if( $status != 'Active' ){ $webmailmenuitem->disable(); }
		}
    }

}


?>