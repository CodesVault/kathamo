<?php

define( 'KATHAMO_DIR_PATH', plugin_dir_path( KATHAMO_FILE ) );
define( 'KATHAMO_PLUGIN_URL', plugins_url( '/', KATHAMO_FILE ) );


if ( ! function_exists( 'kathamo_get_config' ) ) {
	/**
	 * get configs.
	 *
	 * @param string $name - plugin name.
	 *
	 * @return string
	 */
	function kathamo_get_config($name = '')
	{
		$configs = require KATHAMO_DIR_PATH . '/configs/config.php';
		if ( $name ) {
			return isset($configs[$name]) ? $configs[$name] : false;
		}
		return $configs;
	}
}

if ( ! function_exists( 'kathamo_prefix' ) ) {
	/**
	 * Add prefix for the given string.
	 *
	 * @param string $name - plugin name.
	 *
	 * @return string
	 */
	function kathamo_prefix($name)
	{
		return kathamo_get_config('plugin_slug') . "-" . $name;
	}
}

if ( ! function_exists( 'kathamo_url' ) ) {
	/**
	 * Add prefix for the given string.
	 *
	 * @param  string $path
	 *
	 * @return string
	 */
	function kathamo_url($path)
	{
		return KATHAMO_PLUGIN_URL . $path;
	}
}

if ( ! function_exists( 'kathamo_asset_url' ) ) {
	/**
	 * Add prefix for the given string.
	 *
	 * @param  string $path
	 *
	 * @return string
	 */
	function kathamo_asset_url($path)
	{
		return kathamo_url( "assets" . $path );
	}
}

if ( ! function_exists( 'kathamo_wp_ajax' ) ) {
	/**
	 * Wrapper function for wp_ajax_* and wp_ajax_nopriv_*
	 *
	 * @param  string $action - action name
	 * @param string $callback - callback method name
	 * @param bool   $public - is this a public ajax action
	 *
	 * @return mixed
	 */
	function kathamo_wp_ajax($action, $callback, $public = false)
	{
		add_action( 'wp_ajax_' . $action, $callback );
		if ( $public ) {
			add_action( 'wp_ajax_nopriv_' . $action, $callback );
		}
	}
}

if ( ! function_exists( 'kathamo_render_template' ) ) {
	/**
	 * Require a Template file.
	 *
	 * @param  string $file_path
	 * @param array  $data
	 *
	 * @return mixed
	 *
	 * @throws \Exception - if file not found throw exception
	 * @throws \Exception - if data is not array throw exception
	 */
	function kathamo_render_template($file_path, $data = array())
	{
		$file = KATHAMO_DIR_PATH . "app" . $file_path;
		if ( ! file_exists( $file ) ) {
			throw new \Exception( "File not found" );
		}
		if ( ! is_array( $data ) ) {
			throw new \Exception( "Expected array as data" );
		}
		extract( $data, EXTR_PREFIX_SAME, kathamo_get_config('plugin_prefix') );	// @phpcs:ignore

		return require_once $file;
	}
}

if ( ! function_exists( 'kathamo_render_view_template' ) ) {
	/**
	 * Require a View template file.
	 *
	 * @param  string $file_path
	 * @param array  $data
	 *
	 * @return mixed
	 */
	function kathamo_render_view_template($file_path, $data = array())
	{
		return kathamo_render_template( "/Views" . $file_path, $data );
	}
}
