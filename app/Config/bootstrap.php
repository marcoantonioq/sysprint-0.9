<?php
Cache::config('default', array(
    'engine' => 'File',
    'duration' => '+0 minutes',
    'path' => CACHE
));

Cache::config('short', array(
    'engine' => 'File',
    'duration' => '+0 minutes',
    'path' => CACHE.'short'. DS,
    'prefix' => 'cake_short_'
));

Cache::config('brief', array(
    'engine' => 'File',
    'duration' => '+0 minutes',
    'path' => CACHE.'brief'. DS,
    'prefix' => 'cake_minutes_'
));

Cache::config('hours', array(
    'engine' => 'File',
    'duration' => '+0 hours',
    'path' => CACHE.'hours'. DS,
    'prefix' => 'cake_hours_'
));

Cache::config('day', array(
    'engine' => 'File',
    'duration' => '+0 day',
    'path' => CACHE.'day'. DS,
    'prefix' => 'cake_day_'
));

Cache::config('week', array(
    'engine' => 'File',
    'duration' => '+0 week',
    'path' => CACHE.'week'. DS,
    'prefix' => 'cake_week_'
));

/**
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */


Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

Configure::load('app', 'default', false);
