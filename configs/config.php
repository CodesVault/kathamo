<?php

/**
 * Configurations for the plugin
 *
 * @package kathamo
 */
return array(
	'plugin_prefix'		=> 'kathamo',
	'plugin_slug'		=> 'kathamo',
	'namaspace_root'	=> 'Kathamo',
	'plugin_version'	=> '1.0.0',
	'plugin_name'		=> 'Kathamo',
	'dev_mode'			=> false,
	'root_dir'			=> dirname(__DIR__),
	'middlewares'		=> [
		'auth'	=> Kathamo\App\Controllers\Middleware\Auth::class,
	],
);
