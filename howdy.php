<?php
/**
 * @package howdy
 *
 * Plugin Name: Howdy
 * Plugin URI:
 * Description: A WordPress starter plugin.
 * Version: 0.0.5
 * Author: CodesVault
 * Author URI: https://github.com/CodesVault
 * License: GPLv2 or later
 * Text Domain: howdy
 */

use Howdy\Core\HowdyCore;

if ( ! defined( 'ABSPATH' ) ) die();

define( 'HOWDY', 'howdy' );
define( 'HOWDY_VERSION', '0.0.5' );
define( 'HOWDY_FILE', __FILE__ );
define( 'HOWDY_DIR_PATH', plugin_dir_path( HOWDY_FILE ) );
define( 'HOWDY_PLUGIN_URL', plugins_url( '/', HOWDY_FILE ) );
define( 'HOWDY_DEV_MODE', false );

if ( file_exists( HOWDY_DIR_PATH . '/vendor/autoload.php' ) ) {
	require_once HOWDY_DIR_PATH . '/vendor/autoload.php';
}
require_once HOWDY_DIR_PATH . '/src/Core/bootstrap.php';

HowdyCore::getInstance();
