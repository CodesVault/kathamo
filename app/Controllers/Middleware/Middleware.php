<?php

namespace Kathamo\App\Controllers\Middleware;

use Exception;

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
