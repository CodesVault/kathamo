<?php
/**
 * @package howdy
 *
 * Plugin Name: Howdy
 * Plugin URI:
 * Description: A WordPress starter plugin.
 * Version: 0.0.8
 * Author: CodesVault
 * Author URI: https://github.com/CodesVault
 * License: GPLv2 or later
 * Text Domain: howdy
 */

use Howdy\App\Core\HowdyCore;

if ( ! defined( 'ABSPATH' ) ) die();

define( 'HOWDY_FILE', __FILE__ );
require_once __DIR__ . '/Configs/bootstrap.php';

// autoload thirdparty libraries.
if ( file_exists( HOWDY_DIR_PATH . '/vendor/autoload.php' ) ) {
	require_once HOWDY_DIR_PATH . '/vendor/autoload.php';
}

// autoload plugin's classes.
require_once HOWDY_DIR_PATH . '/Configs/autoloader.php';

HowdyCore::getInstance();
