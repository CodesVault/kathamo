<?php
/**
 * @package kathamo
 *
 * Plugin Name: Kathamo
 * Plugin URI:
 * Description: A Framework For WordPress plugin development.
 * Version: 1.0.0
 * Author: CodesVault
 * Author URI: https://github.com/CodesVault
 * License: GPLv2 or later
 * Text Domain: kathamo
 */

use Kathamo\App\Core\Core;

if ( ! defined( 'ABSPATH' ) ) die();

define( 'KATHAMO_FILE', __FILE__ );

require_once __DIR__ . '/configs/bootstrap.php';

if ( file_exists( KATHAMO_DIR_PATH . '/vendor/autoload.php' ) ) {
	require_once KATHAMO_DIR_PATH . '/vendor/autoload.php';
}

Core::getInstance();
