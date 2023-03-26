<?php
/**
 * @package howdy
 *
 * Plugin Name: Kathamo
 * Plugin URI:
 * Description: A Framework For WordPress plugin development.
 * Version: 0.0.8
 * Author: CodesVault
 * Author URI: https://github.com/CodesVault
 * License: GPLv2 or later
 * Text Domain: kathamo
 */

use Kathamo\App\Core\Core;

if ( ! defined( 'ABSPATH' ) ) die();

define( 'KATHAMO_FILE', __FILE__ );
require_once __DIR__ . '/Configs/bootstrap.php';

// autoload thirdparty libraries.
if ( file_exists( KATHAMO_DIR_PATH . '/vendor/autoload.php' ) ) {
	require_once KATHAMO_DIR_PATH . '/vendor/autoload.php';
}

// autoload plugin's classes.
require_once KATHAMO_DIR_PATH . '/Configs/autoloader.php';

Core::getInstance();
