<?php

namespace Howdy\Core\Lib;

/**
 * Handle HTTP requests
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class HttpKernel
{
	private static $base_url  = 'https://bdapis.herokuapp.com/';
	private static $namespace = 'api/';
	private static $version   = 'v1.1/';

	/**
	 * Create API URL with Base URL, Namespace, Version and Route
	 *
	 * @param string $route
	 * @return string
	 */
	private static function get_url( $route )
	{
		return static::$base_url . static::$namespace . static::$version . $route;
	}

	/**
	 * POST request
	 *
	 * @param (string) $route
	 * @param (array)  $args
	 * @return \Howdy\Helpers\Response
	 */
	public static function post($route, $args = [])
	{
		$default   = [];
		$arguments = array_merge( $default, $args );
		$url       = static::get_url( $route );

		$res = \wp_remote_post( $url, $arguments );
		return new Response( $res );
	}

	/**
	 * GET request
	 *
	 * @param (string) $route
	 * @param (array)  $args
	 * @return \Howdy\Helpers\Response
	 */
	public static function get($route, $args = [])
	{
		$default   = [];
		$arguments = array_merge( $default, $args );
		$url       = static::get_url( $route );

		$res = \wp_remote_get( $url, $arguments );
		return new Response( $res );
	}

}
