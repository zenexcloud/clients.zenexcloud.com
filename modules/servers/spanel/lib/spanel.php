<?php

namespace WHMCS\Module\Server\spanel;
use WHMCS\Database\Capsule;

class Spanel{

	public $serverData, $rawParamsData, $rawResponse, $response, $error;
	public $language;
	private $version = '20250305';
	private $custominifilename = 'custom.ini';
	private $visitorIp = false;

	function __construct( $params = [] ){
		if( $params ){
			$this->setParams( $params );
		}

		if( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['REMOTE_ADDR'] != $_SERVER['HTTP_X_FORWARDED_FOR'] ){
			$this->visitorIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else if( !empty($_SERVER['REMOTE_ADDR']) ){
			$this->visitorIp = $_SERVER['REMOTE_ADDR'];
		}
	}

	public function setService( $serviceid ){
		$service = new \WHMCS\Module\Server();
		$service->setServiceId( $serviceid );
		$params = $service->buildParams();
		$this->setParams( $params );
		return $this;
	}

	public function setParams( array $params ){
		$keys = [ 'serverhostname', 'serverip', 'serverusername', 'serveraccesshash', 'serverhttpprefix' ];
		$this->serverData = array_intersect_key( $params, array_flip($keys) );
		$this->rawParamsData = $params;
		return $this;
	}

	public function getServiceParams(){
		if( count($this->serverData) == 5 ){
			return [];
		}

		$server = Capsule::table('tblservers')->where('type','spanel')->where('active', '1')->first();
		$this->serverData = [
			'serverhostname' => $this->serverData['serverhostname'] ?? $server->hostname,
			'serverip' => $this->serverData['serverip'] ?? $server->ipaddress,
			'serverusername' => $this->serverData['serverusername'] ?? $server->username,
			'serveraccesshash' => $this->serverData['serveraccesshash'] ?? $server->accesshash,
			'serverhttpprefix' => $this->serverData['serverhttpprefix'] ?? ( $server->secure == 'on' ? 'https' : 'http' )
		];

		return $this;
	}

	private function api( $endpoint, $requestData = [] ){

		$this->getServiceParams();

		$requestData['action'] = $endpoint;
		$requestData['token'] = $this->serverData['serveraccesshash'];

		// when secure is enabled, check if the hostname resolves and use the hostname. If the hostname doesnt resolve, fallback to http, as curl cant connect because of the SSL warning.
		$hostname = $this->serverData['serverip'];
		if( $this->serverData['serverhttpprefix'] == 'https' ){
			$hostnameIP = gethostbyname($this->serverData['serverhostname']);
			//if( $hostnameIP == $this->serverData['serverip'] ){
			if( preg_match('/^([\d]{1,3}).([\d]{1,3}).([\d]{1,3}).([\d]{1,3})$/', $hostnameIP) ){
				$hostname = $this->serverData['serverhostname'];
			}else{
				$this->serverData['serverhttpprefix'] = 'http';
				$this->logger( 'warning', 'API connection reverted to HTTP instead of HTTPS', 'Reported hostname IP is '.$hostnameIP );
			}
		}

		$endpointUrl = $this->serverData['serverhttpprefix'].'://'.$hostname.'/'.$this->serverData['serverusername'].'/api.php';

		// report the module version for stats and troubleshooting
		$headers = [ 'spanelserverversion: '.$this->version ];

		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $endpointUrl);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt( $ch, CURLOPT_POST, true);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($requestData));

		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt( $ch, CURLOPT_TIMEOUT, 120);
		curl_setopt( $ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); // fallback to http 1.1 due to issues with http2 communication with some web servers
		$this->rawResponse = curl_exec( $ch );
		$this->error = trim(curl_error($ch));

		$supportedErrors = [
			'HTTP/2 stream 0 was not closed cleanly: PROTOCOL_ERROR (err 1)',
			'Peer reports incompatible or unsupported protocol version.'
		];

		// http/2 fix.
		if( $this->error ){
			logModuleCall('spanel', $requestData['action'], "Error:\n".$this->error, "CURL raw output:\n".$this->rawResponse);
			if( in_array($this->error, $supportedErrors) ){
				switch($this->error){
					case $supportedErrors[0]:
						curl_setopt( $ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
						break;
					case $supportedErrors[1]:
						curl_setopt( $ch, CURLOPT_SSLVERSION, 7);
						break;
				}
				$this->rawResponse = curl_exec( $ch );
				$this->error = trim(curl_error($ch));
			}
		}

		curl_close($ch);

		$this->response = @json_decode($this->rawResponse,true);
		if( json_last_error() ){
			$this->response = '';
			$this->error = 'Unable to decode API response: '.json_last_error_msg();
		}

		$this->logger( [ $endpointUrl, $requestData ], [ $this->rawResponse, $this->response, $this->error ], [ $requestData['token'] ] );

		return $this;
	}

	public function logger( $request = [], $response = [], $replace = [] ){
		$parentFunction = debug_backtrace( !DEBUG_BACKTRACE_PROVIDE_OBJECT | DEBUG_BACKTRACE_IGNORE_ARGS, 2 )[1]['function'];
		logModuleCall('spanel', $parentFunction, $request, $response, '' , $replace);
	}

	public function formatWhmcsResponse(){

		if( $this->error ){
			return $this->error;
		}

		if( $this->response && $this->response['result'] == 'error' ){
			return implode( ', ', $this->response['message'] );
		}

		return 'success';
	}

	public function resultArray(){
		return $this->response;
	}

	// ACTION FUNCTIONS

	public function listpackages(){

		try{

			$this->api( 'accounts/listpackages' );

			if( !$this->response['data'] ){ throw new \Exception( $this->formatWhmcsResponse() ); }
			$packages = [];
			foreach( $this->response['data'] as $package ){
				$packages[$package['packagename']] = ucfirst($package['packagename']);
			}

		}catch (\Exception $e){
			$this->error = $e->getMessage();
			$packages = [];
		}

		return $packages;
	}

	public function createaccount(){

		try{

			if( empty($this->rawParamsData['domain']) ){ throw new \Exception('Invalid or missing domain name'); }
			if( empty($this->rawParamsData['username']) ){ throw new \Exception('Invalid or missing username'); }
			if( empty($this->rawParamsData['password']) ){ throw new \Exception('Missing password'); }
			if( empty($this->rawParamsData['configoption1']) ){ throw new \Exception('Missing package name'); }

			$callData = [
			  'domain' => $this->rawParamsData['domain'],
			  'username' => $this->rawParamsData['username'],
			  'password' => $this->rawParamsData['password'],
			  'package' => $this->rawParamsData['configoption1'],
			];

			$this->api( 'accounts/wwwacct', $callData);

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function suspendaccount(){

		try{

			if( empty($this->rawParamsData['username']) ){ throw new \Exception('Invalid or missing username'); }

			$callData = [
			  'username' => $this->rawParamsData['username'],
			  'reason' => $this->rawParamsData['suspendreason']
			];

			$this->api( 'accounts/suspendaccount', $callData);

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function unsuspendaccount(){

		try{

			if( empty($this->rawParamsData['username']) ){ throw new \Exception('Invalid or missing username'); }

			$callData = [
			  'username' => $this->rawParamsData['username'],
			];

			$this->api( 'accounts/unsuspendaccount', $callData);

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function terminateaccount(){

		try{

			if( empty($this->rawParamsData['username']) ){ throw new \Exception('Invalid or missing username'); }

			$callData = [
				'username' => $this->rawParamsData['username']
			];

			$this->api( 'accounts/terminateaccount', $callData);

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function changepackage(){

		try{

			if( empty($this->rawParamsData['username']) ){ throw new \Exception('Invalid or missing username'); }
			if( empty($this->rawParamsData['configoption1']) ){ throw new \Exception('Invalid or missing package'); }

			$callData = [
				'username' => $this->rawParamsData['username'],
				'packages' => $this->rawParamsData['configoption1'],
			];

			$this->api( 'accounts/changequota', $callData);

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function changepassword(){

		try{
			if( empty($this->rawParamsData['username']) ){ throw new \Exception('Invalid or missing username'); }
			if( empty($this->rawParamsData['password']) ){ throw new \Exception('Invalid or missing password'); }

			$callData = [
				'username' => $this->rawParamsData['username'],
				'password' => $this->rawParamsData['password'],
			];

			$this->api( 'accounts/changeuserpassword', $callData);

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function getClientSSO( $redirectPage = '' ){

		try{

			if( !empty($this->rawParamsData['status']) && $this->rawParamsData['status'] != 'Active' ){ throw new \Exception('Operation prohibited by service status'); }

			$callData = [
				'username' => $this->rawParamsData['username'],
				'role' => 'user',
				'ip' => $this->visitorIp,
			];

			if( $this->getIniSetting('disable_sso_ipcheck') || !preg_match('/([\d]{1,3}\.){3}([\d]{1,3})/', $this->visitorIp) ){
				$callData['ip'] = false;
			}

			if( !empty($redirectPage) ){
				$availablePages = array_column( Spanel::fetchAvailableIcons(), 'link' );
				$availablePages = array_map("strtolower", $availablePages);
				$redirectPage = strtolower($redirectPage);
				if( !in_array($redirectPage, $availablePages) ){ throw new \Exception('Unsupported redirect page provided'); }
				$callData['redirect'] = $redirectPage;
			}

			$this->api( 'base/sso', $callData );

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function getAdminSSO(){

		try{

			if( !empty($this->rawParamsData['status']) && $this->rawParamsData['status'] != 'Active' ){ throw new \Exception('Operation prohibited by service status'); }

			$rawAvailableAdmins = $this->fetchAdminsList()->response;
			$availableAdmins = ( $rawAvailableAdmins['result'] == 'success' ? array_column($rawAvailableAdmins['data'], 'user') : [] );
			if( empty($availableAdmins) ){ throw new \Exception('Unable to load admins list'); }

			$username = ( !empty($this->rawParamsData['username']) ? $this->rawParamsData['username'] : $availableAdmins[0] );
			if( !in_array($username, $availableAdmins) ){ throw new \Exception('Admin user doesnt exist'); }

			$callData = [
				'username' => $username,
				'role' => 'admin',
				'ip' => $this->visitorIp,
			];

			if( $this->getIniSetting('disable_sso_ipcheck') || !preg_match('/([\d]{1,3}\.){3}([\d]{1,3})/', $this->visitorIp) ){
				$callData['ip'] = false;
			}

			$this->api( 'base/sso', $callData );

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function testconnection(){

		try{

			$this->api( 'toolbox/apicheck' );

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function fetchAccountData(){

		try{

			$callData = [
				'accountuser' => $this->rawParamsData['username']
			];

			$this->api( 'accounts/listaccounts', $callData);

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function fetchAdminsList(){

		try{

			$this->api( 'admin/listadminusers' );

		}catch (\Exception $e){
			$this->error = $e->getMessage();
		}

		return $this;
	}

	public function fetchAvailableIcons(){

		$icons = [
			[ 'icon' => 'filemanager', 'label' => $this->translate('icons.filemanager'), 'link' => 'file/filemanager', 'color' => 'files' ],
			[ 'icon' => 'emailaccounts', 'label' => $this->translate('icons.emailaccounts'), 'link' => 'email/accounts', 'color' => 'emails' ],
			[ 'icon' => 'mysqldatabases', 'label' => $this->translate('icons.mysqldatabases'), 'link' => 'mysql/databases', 'color' => 'mysql' ],
			[ 'icon' => 'phpmyadmin', 'label' => $this->translate('icons.phpmyadmin'), 'link' => 'ajax/mysql/getPhpMyAdmin/get', 'color' => 'mysql' ],
			[ 'icon' => 'sshield', 'label' => $this->translate('icons.sshield'), 'link' => 'tool/sshield', 'color' => 'tools' ],
			[ 'icon' => 'wordpress', 'label' => $this->translate('icons.wpmanager'), 'link' => 'software/wpmanager', 'color' => 'software' ],
			[ 'icon' => 'addons', 'label' => $this->translate('icons.domains'), 'link' => 'domain/domains', 'color' => 'domains' ],
			[ 'icon' => 'dns', 'label' => $this->translate('icons.dnseditor'), 'link' => 'domain/dnseditor', 'color' => 'domains' ],
		];

		return $icons;
	}

	public static function getProductBranding( $serviceid ){

		if( !is_numeric($serviceid) || empty($serviceid) ){ return 'branded'; }

		$service = new \WHMCS\Module\Server();
		$service->setServiceId( $serviceid );
		$params = $service->buildParams();

		$brandingStatus = $params['configoption2'];

		if( !in_array($brandingStatus, ['branded','unbranded']) ){ $brandingStatus = 'branded'; }

		return $brandingStatus;
	}

	public function getLanguage(){

		$systemLanguage = \WHMCS\Config\Setting::getValue("Language"); // english
		$clientLanguage = $this->rawParamsData['clientsdetails']['language'] ?? false ;
		$sessionLanguage = $_SESSION['Language'] ?? '';
		$languageDir = __DIR__.'/../lang/';

		$clientLanguage = strtolower($clientLanguage);
		$systemLanguage = strtolower($systemLanguage);
		$sessionLanguage = strtolower($sessionLanguage);

		$languageFilePath = function( $language ) use($languageDir){
			return $languageDir.$language.'.php';
		};

		if( !empty($sessionLanguage) && file_exists($languageFilePath($sessionLanguage)) ){
			$selectedLanguage = $sessionLanguage;
		}else if( $clientLanguage && file_exists($languageFilePath($clientLanguage)) ){
			$selectedLanguage = $clientLanguage;
		}else if( $systemLanguage && file_exists($languageFilePath($systemLanguage)) ){
			$selectedLanguage = $systemLanguage;
		}else{
			$selectedLanguage = 'english';
			if( !file_exists($languageFilePath($selectedLanguage)) ){ throw new \Exception('Unable to load language file'); }
		}

		include( $languageFilePath($selectedLanguage) );

		if( $lang && is_array($lang) && !empty($lang) ){
			$this->language = $lang;
		}

		return $lang;
	}

	function getIniSetting( $settingName = null ){
		$fullFilePath = __DIR__.'/../'.$this->custominifilename;
		if( !file_exists($fullFilePath) ){ return null; }
		$iniArray = parse_ini_file($fullFilePath, false, INI_SCANNER_RAW);

		if( $settingName === null ){
			return $iniArray;
		}

		return $iniArray[$settingName] ?? null;
	}

	function translate(){
		$arguments = func_get_args();
		$retrieveKey = $arguments[0];
		unset($arguments[0]);
		$arguments = array_values($arguments);
		if( !$this->language ){ $this->getLanguage(); }
		$languageArray = explode('.', $retrieveKey);

		try{

			$finalLanguageString = $this->language;
			foreach( $languageArray as $langaugeArrayKey ){
				if( !array_key_exists($langaugeArrayKey, $finalLanguageString) ){ throw new \Exception($retrieveKey);  }

				$finalLanguageString = $finalLanguageString[$langaugeArrayKey];
			}

			if( !is_string($finalLanguageString) ){
				throw new \Exception($retrieveKey);
			}

			$finalLanguageString = vsprintf($finalLanguageString, $arguments);

		} catch (\Exception $e) {
			$finalLanguageString = '--'.$e->getMessage().'--';
		}

		return $finalLanguageString;
	}

	function getUsageStats(){

		$rawAccountData = $this->fetchAccountData()->resultArray();
		$accountData = $rawAccountData['data'][0];

		$stats = [];

		// STATS
		$stats[] = [ 'label' => $this->translate('stats.diskusage'), 'limit' => $accountData['disklimit'], 'usage' => $accountData['disk'], 'usage_sign' => ' MB' ];
		$stats[] = [ 'label' => $this->translate('stats.inodesusage'), 'limit' => $accountData['inodeslimit'], 'usage' => $accountData['inodes'] ];
		$stats[] = [ 'label' => $this->translate('stats.addondomains'), 'limit' => $accountData['domainslimit'], 'usage' => $accountData['numaddons'] ];
		$stats[] = [ 'label' => $this->translate('stats.subdomains'), 'limit' => false, 'usage' => $accountData['numsubdomains'] ];
		$stats[] = [ 'label' => $this->translate('stats.mysqldatabases'), 'limit' => $accountData['databaseslimit'], 'usage' => $accountData['numdatabases'] ];
		$stats[] = [ 'label' => $this->translate('stats.emailaccounts'), 'limit' => $accountData['emailslimit'], 'usage' => $accountData['numemails'] ];
		$stats[] = [ 'label' => $this->translate('stats.ftpaccounts'), 'limit' => false, 'usage' => $accountData['numftpaccts'] ];

		// Apply additional changes.
		foreach( $stats as $usageidx => $usage ){

			$stats[$usageidx]['limit'] = ( strtolower($usage['limit']) == 'unlimited' ? false : $usage['limit'] );

			if( ( is_numeric($usage['limit']) && $usage['limit'] > 0 ) && ( is_numeric($usage['usage']) && $usage['usage'] > 0 ) ){
				$stats[$usageidx]['percent'] =  ( round( $usage['usage'] / $usage['limit'] , 2) * 100 );
			}

			$stats[$usageidx]['usage_sign'] = $usage['usage_sign'] ?? '';
		}

		return $stats;
	}
}



?>