<?php

define( 'HOWDY', 'howdy' );
define( 'HOWDY_VERSION', '0.0.7' );
define( 'HOWDY_DIR_PATH', plugin_dir_path( HOWDY_FILE ) );
define( 'HOWDY_PLUGIN_URL', plugins_url( '/', HOWDY_FILE ) );
define( 'HOWDY_DEV_MODE', false );


if ( ! function_exists( 'howdy_get_config' ) ) {
	/**
	 * get configs.
	 *
	 * @param string $name - plugin name.
	 *
	 * @package howdy
	 * @author  CodesVault, Keramot UL Islam <sourav926>
	 * @since   0.0.7
	 */
	function howdy_get_config($name = '')
	{
		$configs = require_once HOWDY_DIR_PATH . '/Configs/config.php';
		if ( $name ) {
			return isset($configs[$name]) ? $configs[$name] : false;
		}
		return $configs;
	}
}

if ( ! function_exists( 'howdy_prefix' ) ) {
	/**
	 * Add prefix for the given string.
	 *
	 * @param string $name - plugin name.
	 *
	 * @package howdy
	 * @author  CodesVault, Keramot UL Islam <sourav926>
	 * @since   0.0.1
	 */
	function howdy_prefix($name)
	{
		return HOWDY . "-" . $name;
	}
}

if ( ! function_exists( 'howdy_url' ) ) {
	/**
	 * Add prefix for the given string.
	 *
	 * @param  string $path
	 *
	 * @package howdy
	 * @author  CodesVault, Keramot UL Islam <sourav926>
	 * @since   0.0.1
	 */
	function howdy_url($path)
	{
		return HOWDY_PLUGIN_URL . $path;
	}
}

if ( ! function_exists( 'howdy_asset_url' ) ) {
	/**
	 * Add prefix for the given string.
	 *
	 * @param  string $path
	 *
	 * @package howdy
	 * @author  CodesVault, Keramot UL Islam <sourav926>
	 * @since   0.0.1
	 */
	function howdy_asset_url($path)
	{
		return howdy_url( "assets" . $path );
	}
}

if ( ! function_exists( 'howdy_wp_ajax' ) ) {
	/**
	 * Wrapper function for wp_ajax_* and wp_ajax_nopriv_*
	 *
	 * @param  string $action - action name
	 * @param string $callback - callback method name
	 * @param bool   $public - is this a public ajax action
	 *
	 * @package howdy
	 * @author  CodesVault, Keramot UL Islam <sourav926>
	 * @since   0.0.1
	 */
	function howdy_wp_ajax($action, $callback, $public = false)
	{
		add_action( 'wp_ajax_' . $action, $callback );
		if ( $public ) {
			add_action( 'wp_ajax_nopriv_' . $action, $callback );
		}
	}
}

if ( ! function_exists( 'howdy_render_template' ) ) {
	/**
	 * Require a Template file.
	 *
	 * @param  string $file_path
	 * @param array  $data
	 *
	 * @package howdy
	 * @author  CodesVault, Keramot UL Islam <sourav926>
	 * @since   0.0.1
	 *
	 * @throws \Exception - if file not found throw exception
	 * @throws \Exception - if data is not array throw exception
	 */
	function howdy_render_template($file_path, $data = array())
	{
		$file = HOWDY_DIR_PATH . "app" . $file_path;
		if ( ! file_exists( $file ) ) {
			throw new \Exception( "File not found" );
		}
		if ( ! is_array( $data ) ) {
			throw new \Exception( "Expected array as data" );
		}
		extract( $data, EXTR_PREFIX_SAME, 'howdy' );	// @phpcs:ignore

		return require_once $file;
	}
}

if ( ! function_exists( 'howdy_render_view_template' ) ) {
	/**
	 * Require a View template file.
	 *
	 * @param  string $file_path
	 * @param array  $data
	 *
	 * @package howdy
	 * @author  CodesVault, Keramot UL Islam <sourav926>
	 * @since   0.0.1
	 */
	function howdy_render_view_template($file_path, $data = array())
	{
		return howdy_render_template( "/Views" . $file_path, $data );
	}
}
