<?php
// Version
define('VERSION', '1.5.3');

// Configuration
require_once('../config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// Registry
$registry = new Registry();

// Loader
$loader = new Loader($registry);
$registry->set('load', $loader);

// Config
$config = new Config();
$registry->set('config', $config);

$config->load( 'title' );
$config->load( 'user' );
$config->load( 'company' );
$config->load( 'group' );
$config->load( 'post' );
$config->load( 'comment' );
$config->load( 'branch' );
$config->load( 'common' );
$config->load( 'routing' );
$config->load( 'route' );
$config->load( 'ignore' );
$config->load( 'friend' );

// Doctrine
require_once(DIR_DATABASE . 'doctrine.php');
$db = new Doctrine($registry);
$registry->set('db', $db);
$registry->set('dm', $db->getDm());
$registry->set('client', $db->getClient());

// Customer
require_once(DIR_SYSTEM . 'library/customer.php');
$customer = new Customer($registry);
$registry->set('customer', $customer);

// Log 
$log = new Log($config->get('config_error_filename'));
$registry->set('log', $log);

function error_handler($errno, $errstr, $errfile, $errline) {
	global $log, $config;
	
	switch ($errno) {
		case E_NOTICE:
		case E_USER_NOTICE:
			$error = 'Notice';
			break;
		case E_WARNING:
		case E_USER_WARNING:
			$error = 'Warning';
			break;
		case E_ERROR:
		case E_USER_ERROR:
			$error = 'Fatal Error';
			break;
		default:
			$error = 'Unknown';
			break;
	}
		
	if ($config->get('config_error_display')) {
		echo '<b>' . $error . '</b>: ' . $errstr . ' in <b>' . $errfile . '</b> on line <b>' . $errline . '</b>';
	}
	
	if ($config->get('config_error_log')) {
		$log->write('PHP ' . $error . ':  ' . $errstr . ' in ' . $errfile . ' on line ' . $errline);
	}

	return true;
}
	
// Error Handler
set_error_handler('error_handler');

// Url
$url = new Url($config->get('config_url'), $config->get('config_use_ssl') ? $config->get('config_ssl') : $config->get('config_url'));	
$registry->set('url', $url);

// Request
$request = new Request();
$registry->set('request', $request);
 
// Response
$response = new Response();
$response->addHeader('Content-Type: text/html; charset=utf-8');
$response->setCompression($config->get('config_compression'));
$registry->set('response', $response); 
		
// Cache
$cache = new Cache();
$registry->set('cache', $cache); 

// Session
$session = new Session();
$registry->set('session', $session); 

// Language Detection
$languages = array();

$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$query = $db->query("SELECT * FROM " . DB_PREFIX . "language WHERE status = '1'"); 

foreach ($query->rows as $result) {
	$languages[$result['code']] = $result;
}

$detect = '';

if (isset($request->server['HTTP_ACCEPT_LANGUAGE']) && ($request->server['HTTP_ACCEPT_LANGUAGE'])) { 
	$browser_languages = explode(',', $request->server['HTTP_ACCEPT_LANGUAGE']);
	
	foreach ($browser_languages as $browser_language) {
		foreach ($languages as $key => $value) {
			if ($value['status']) {
				$locale = explode(',', $value['locale']);

				if (in_array($browser_language, $locale)) {
					$detect = $key;
				}
			}
		}
	}
}

if (isset($session->data['language']) && array_key_exists($session->data['language'], $languages) && $languages[$session->data['language']]['status']) {
	$code = $session->data['language'];
} elseif (isset($request->cookie['language']) && array_key_exists($request->cookie['language'], $languages) && $languages[$request->cookie['language']]['status']) {
	$code = $request->cookie['language'];
} elseif ($detect) {
	$code = $detect;
} else {
	$code = "en";
}

if (!isset($session->data['language']) || $session->data['language'] != $code) {
	$session->data['language'] = $code;
}

// if (!isset($request->cookie['language']) || $request->cookie['language'] != $code) {	  
// 	setcookie('language', $code, time() + 60 * 60 * 24 * 30, '/', $request->server['HTTP_HOST']);
// }

$config->set('config_language_id', $languages[$code]['language_id']);
$config->set('config_language', $languages[$code]['code']);

// Language	
$language = new Language($languages[$code]['directory']);
$language->load($languages[$code]['filename']);	
$registry->set('language', $language); 

// Document
$registry->set('document', new Document());

//  Encryption
$registry->set('encryption', new Encryption($config->get('config_encryption')));
		
// Front Controller 
$controller = new Front($registry);

// SEO URL's
$controller->addPreAction(new Action('api/seo_url'));

// Router
if ( isset($request->get['route']) ){
	$action = new Action($request->get['route']);
}else{
	$action = new Action('api/error');
}

// Dispatch
$controller->dispatch($action, new Action('api/error'));

// Output
$response->output();
?>