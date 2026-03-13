<?php

use MetricsCube\Helpers\AddonHelper;
use MetricsCube\Service\Hooks;
use MetricsCube\Utils\Util;
use MetricsCube\View\ViewHelper;
use WHMCS\Database\Capsule;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
if (!defined('WHMCS'))
	die('You cannot access this file directly.');

$addons = \WHMCS\Database\Capsule::table('tblconfiguration')
	->where('setting', 'ActiveAddonModules')
	->where('value', 'like', '%MetricsCube%')
	->first();
if (!is_null($addons)) {
	try {
		Hooks::register();
	} catch (Exception $exception) {

	}
	try {
		Hooks::registerAdditional();
	} catch (Exception $exception) {
	}
	if (isset($_SESSION['adminid']) && Hooks::checkAdminPerms($_SESSION['adminid'])) {
		add_hook('AdminAreaPage', 1, function ($vars) {
			$vars = Hooks::registerAdminAreaPage($vars);
			if (isset($vars['filename']) && $vars['filename'] == 'index') {
				return Hooks::registerAdminHomeWidgetsScript($vars);
			}
			if (isset($vars['filename']) && $vars['filename'] == 'clientsservices') {
				return Hooks::registerAdminClientServicesTab($vars);
			}
			if (isset($vars['filename']) && $vars['filename'] == 'clientsdomains') {
				return Hooks::registerAdminClientDomainsTab($vars);
			}
			return $vars;
		});
		add_hook('AdminAreaHeadOutput', 1, function ($vars) {
			return Hooks::registerAdminAreaHeadOutput($vars);
		});
		add_hook('AdminHomeWidgets', 1, function () {
			return Hooks::registerAdminHomeWidgets();
		});

		add_hook('AdminAreaClientSummaryPage', 1, function ($vars) {
			return Hooks::registerAdminAreaClientSummaryPage($vars['userid']);
		});
	}
}
try {
	Hooks::MC_Requests();
	add_hook('AdminAreaHeadOutput', 1, function ($vars) {
		if (isset($vars['filename']) && in_array($vars['filename'], ['configaddonmods'])) {
			if (!AddonHelper::isActive() && !isset($_COOKIE['METRICSCUBE_WELCOME_POPUP'])) {
				$helper = new ViewHelper();
				$mcVars = json_encode([
					'animation'      => $helper->img('auto-install-gif.mp4'),
					'ajaxUrl'        => $helper->url('addonmodules.php?module=MetricsCube', []),
					'activateAction' => 'invitation_welcome_activate',
					'abortAction'    => 'invitation_welcome_later'
				], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				Util::setWelcomeCookie('METRICSCUBE_WELCOME_POPUP', 72);
				return <<<HTML
<script type="text/javascript">
	window.mcVars = {$mcVars};
</script>
<script type="text/javascript" src="../modules/addons/MetricsCube/assets/js/welcomeModal.js"></script>
HTML;
			}
		}
	});
} catch (Exception $exception) {

}
