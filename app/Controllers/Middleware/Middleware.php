<?php

namespace Howdy\App\Controllers\Middleware;

use Exception;

/**
 * Middleware main class.
 * Map all middlewares with key and class name.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.8
 */
class Middleware
{
	const Map = [
		'auth'	=> Auth::class,
	];

	public static function resolve($key)
	{
		if ( empty( static::Map[$key] ) ) {
			throw new \Exception("No middleware found for key '{$key}'");
		}

		$middleware = static::Map[$key];
		return (new $middleware)->handle();
	}
}
