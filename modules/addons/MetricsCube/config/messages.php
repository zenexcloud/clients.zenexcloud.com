<?php

return [
	'errors'   => [
		1  => 'MCWHC001|The MetricsCube Connector cannot operate because the script cannot find WHMCS\Database\Capsule class. It is a required class included by default in WHMCS from version 6.3. You are probably using an incompatible with MetricsCube version of WHMCS.|Please make sure that you are using WHMCS V6.3 or later to proceed.',
		2  => 'MCWHC002|The script cannot find cURL library, which is required by the MetricsCube Connector to work.|Please install the cURL library before using this module. <a href="https://stackoverflow.com/questions/38800606">https://stackoverflow.com/questions/38800606</a>',
		3  => 'MCWHC003|The script cannot connect to MetricsCube server: %s. There is a chance that MetricsCube server may be temporarily down. It is also possible that you have restrictive firewall rules that block the connection.|Please try again in a few minutes and make sure that your server can connect to %s.',
		4  => 'MCWHC004|The MetricsCube server: %s is responding with an incorrect data format. There is a chance that MetricsCube server may be temporarily down or there is some maintenance in progress. It is also possible that you have restrictive firewall rules that block the connection.|Please try again in a few minutes and make sure that your server can connect to %s.',
		5  => 'MCWHC005|The script %s has not been executed in a CLI mode which is required for the script to run properly (CLI does not have any timeout limitation, which may break synchronization of bigger data sent to MetricsCube).|Please open your command line and run <pre>php %s</pre> command to execute this script in a CLI mode.',
		6  => 'MCWHC006|The Application Key is not found in MetricsCube Connector configuration.|Please enter the Application Key first in the MetricsCube Connector module configuration and try to start the first synchronization again.',
		7  => 'MCWHC007|MetricsCube Connector cannot be activated. It may be caused by missing/outdated files of the MetricsCube Connector. There is a chance that MetricsCube server may be temporarily down or there is some maintenance in progress. It is also possible that you have restrictive firewall rules that block the connection.|Please try again in a few minutes and make sure that your server can connect to %s. Please also make sure that you have copied properly all the MetricsCube Connector files to your WHMCS instance. You may try to upload all the files again. If you have used Quick Installation Method to install the module, please try again with the Standard Installation Method.',
		8  => 'MCWHC008|An error occurred: %s (line: %s, file: %s)|',
		9  => 'MCWHC009|The MetricsCube Connector cannot find the WHMCS files in %s directory. Most probably it has been copied to the wrong place.|Please make sure that you have uploaded MetricsCube Connector files to the addons directory of your WHMCS (e.g. /var/www/domain.com/whmcs/modules/addons/MetricsCube)',
		13 => 'The script cannot connect to MetricsCube server: %s. There is a chance that MetricsCube server may be temporarily down. It is also possible that you have restrictive firewall rules that block the connection. Please try again in a few minutes and make sure that your server can connect to %s.',
		14 => 'The MetricsCube server: %s is responding with an incorrect data format. There is a chance that MetricsCube server may be temporarily down or there is some maintenance in progress. It is also possible that you have restrictive firewall rules that block the connection. Please try again in a few minutes and make sure that your server can connect to %s.',
	],
	'warnings' => [
		1 => 'The Application Key cannot be empty!',
		2 => 'The requested token has not been found or is invalid, the script cannot continue working!',
		3 => 'The script %s cannot run in a CLI mode.',
		4 => 'Not allowed request method detected: %s',
	],
	'messages' => [
		1 => 'An error occurred %s %s</a> <a class="lu-btn lu-btn--sm lu-btn--danger lu-btn--outline" href="mailto:support@metricscube.io"><span class="lu-btn__text">Contact Support</span></a>',
		2 => 'Are you still getting this error?',
		3 => 'Still not working?',
		4 => 'Contact our support at <a href="mailto:support@metricscube.io">support@metricscube.io</a>',
		5 => 'How to solve it?',
		6 => '<a class="lu-btn lu-btn--sm lu-btn--danger" style="margin-left: auto;" target="_blank" href="%s"><span class="lu-btn__text">Troubleshooting Tips</span> '
	]
];










































