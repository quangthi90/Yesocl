<?php
// Version
define('VERSION', '1.5.3');

// Configuration
require_once('config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// Application Classes
require_once(DIR_SYSTEM . 'library/customer.php');
// require_once(DIR_SYSTEM . 'library/facebook/facebook.php');

// Rename Document for linux
// include ('libs/renameFolder.php');

require_once(DIR_DATABASE . 'doctrine.php');

// Registry
$registry = new Registry();

// Loader
$loader = new Loader($registry);
$registry->set('load', $loader);

// Config
$config = new Config();
$registry->set('config', $config);

// Database 
$db = new Doctrine($registry);
$registry->set('db', $db);
$registry->set('dm', $db->getDm());
$registry->set('client', $db->getClient());
		
// Settings
$settings = $db->getDm()->getRepository( 'Document\Setting\Config' )->findAll();

foreach ($settings as $setting) {
	if ( $setting ) {
		$config->set( $setting->getKey(), $setting->getValue() );
	}
}
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

// Request
$request = new Request();
$registry->set('request', $request);

// Twig
require_once DIR_SYSTEM . 'library/Twig/Autoloader.php';
Twig_Autoloader::register();
$twig_loader = new Twig_Loader_Filesystem(DIR_TEMPLATE);
$twig_loader->addPath(DIR_TEMPLATE, 'template');
$twig = new Twig_Environment($twig_loader, array(
    'cache' => DIR_SYSTEM . '/Twig',
    'auto_reload' => true
	));
$twig->addExtension(new Twig_Extension_StringLoader());
$twig->addExtension(new Twig_Extensions_Extension_I18n());
$twig->addExtension(new Twig_Extensions_Extension_Intl());

// Multi languages
if ( isset($request->cookie['language']) ){
	$sLangFile = DIR_LANGUAGE . 'locale/' . $request->cookie['language'] . '/LC_MESSAGES/' . $request->cookie['language'] . '.po';
	if ( is_file($sLangFile) ){
		$lang = $request->cookie['language'];
	}else{
		$lang = 'vi_VN';
	}
}else{
	$lang = 'vi_VN';
	setcookie('language', $lang, time() + 60 * 60 * 24 * 30, '/', $request->server['HTTP_HOST']);
}

// load dynamic locale file name
$locale = $lang;
$locales_root = DIR_LANGUAGE . "locale";
$domain = $lang;

// activate the locale setting
setlocale(LC_ALL, $locale);
setlocale(LC_TIME, $locale);
putenv("LANG=$locale");

$filename = "$locales_root/$locale/LC_MESSAGES/$domain.mo";
$mtime = filemtime($filename);
$filename_new = "$locales_root/$locale/LC_MESSAGES/cache/{$domain}_{$mtime}.mo"; 

if (!file_exists($filename_new)) {  // check if we have created it before
      // if not, create it now, by copying the original
      copy($filename,$filename_new);
}

$domain_new = "cache/{$domain}_{$mtime}";
bindtextdomain($domain_new,$locales_root);
textdomain($domain_new);

// Language	
$language = new Language('english');
$language->load('english');	
$registry->set('language', $language); 

// Url
$url = new Url($config->get('config_url'), $config->get('config_use_ssl') ? $config->get('config_ssl') : $config->get('config_url'));	
$registry->set('url', $url);

// Pusher
$pusher = new Pusher(PUSHER_APP_KEY, PUSHER_APP_SECRET, PUSHER_APP_ID);
$registry->set('pusher', $pusher);

// Log 
// $log = new Log($config->get('config_error_filename'));
$log = new Log('error.txt');
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
	
	// if ($config->get('config_error_log')) {
		$log->write('PHP ' . $error . ':  ' . $errstr . ' in ' . $errfile . ' on line ' . $errline);
	// }

	return true;
}
	
// Error Handler
set_error_handler('error_handler');
 
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

// Document
$registry->set('document', new Document()); 

// facebook
// $fb_setting = array(
// 	'appId' => FB_API_ID,
// 	'secret' => FB_API_SECRET,
// 	'cookie' => false,
// 	);
// $facebook = new Facebook( $fb_setting );
// $registry->set( 'facebook', $facebook );		

// Customer
$customer = new Customer($registry);
$registry->set('customer', $customer);
$customer->updateLiveToken();

//  Encryption
$registry->set('encryption', new Encryption($config->get('config_encryption')));

// Custom twig extension
require_once DIR_APPLICATION . 'extension/loader.php';
$extension = new ExtensionLoader( $twig, $registry );
$registry->set('extension', $extension);
$registry->set('twig', $twig);
		
// Front Controller 
$controller = new Front($registry);

// Maintenance Mode
$controller->addPreAction(new Action('common/maintenance'));

// SEO URL's
$controller->addPreAction(new Action('common/seo_url'));

// Router
if ( isset($request->get['route']) ){
	$action = new Action($request->get['route']);
}else{
	if ( $customer->isLogged() ){
		$action = new Action('common/home');
	}else{
		$action = new Action('welcome/home');
	}
}

// Dispatch
$controller->dispatch($action, new Action('error/not_found'));

// Output
$response->output();
?>