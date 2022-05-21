<?php
/**
 * @package howdy
 * 
 * Plugin Name: Howdy
 * Plugin URI: 
 * Description: A wordpress starter plugin.
 * Version: 0.0.2
 * Author: CodesVault
 * Author URI: https://github.com/CodesVault
 * License: GPLv2 or later
 * Text Domain: howdy
 */

use Howdy\Providers\HowdyServiceProvider;

if ( ! defined( 'ABSPATH' ) ) die();

define( 'HOWDY', 'howdy' );
define( 'HOWDY_VERSION', '0.0.2' );
define( 'HOWDY_FILE', __FILE__ );
define( 'HOWDY_DIR_PATH', plugin_dir_path( HOWDY_FILE ) );
define( 'HOWDY_PLUGIN_URL', plugins_url( '/', HOWDY_FILE ) );

if ( file_exists( HOWDY_DIR_PATH . '/vendor/autoload.php' ) ) {
    require_once HOWDY_DIR_PATH . '/vendor/autoload.php';
}
require_once HOWDY_DIR_PATH . '/bootstrap.php';

(HowdyServiceProvider::getInstance())->register();
