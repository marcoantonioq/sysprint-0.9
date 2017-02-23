<?php
	date_default_timezone_set('America/Sao_Paulo');
	Configure::write('debug',0);

	Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
	));

	Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
	));
	Configure::write('App.encoding', 'UTF-8');
 // * 	Routing.prefixes = array('admin', 'manager');
	Configure::write('Routing.prefixes', array('app'));
	// Configure::write('Routing.prefixes',array('admin'));

	//Configure::write('Cache.disable', true);
	//Configure::write('Cache.check', true);
	//Configure::write('Cache.viewPrefix', 'prefix');
	Configure::write('Session', array(
		'defaults' => 'php'
	));
	Configure::write('Security.salt', 'DYhG93asdfJfIxfs2guVoUubWwvniR2G0FgaD5mi');
	Configure::write('Security.cipherSeed', '768512349657453542496749683621');
	//Configure::write('Asset.timestamp', true);


$engine = 'File';
$duration = '+999 days';
if (Configure::read('debug') > 0) {
	$duration = '+10 seconds';
}
// Prefix each application on the same server with a different string, to avoid Memcache and APC conflicts.
$prefix = 'myapp_';
Cache::config('_cake_core_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));

Cache::config('_cake_model_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));

ini_set('upload_max_filesize', '40M');
ini_set('post_max_size', '40M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);
