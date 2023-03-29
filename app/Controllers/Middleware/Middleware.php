<?php

namespace Kathamo\App\Controllers\Middleware;

class Middleware
{
	public static function resolve($key)
	{
		$middleware = kathamo_get_config('middlewares');
		if ( empty( $middleware[$key] ) ) {
			throw new \Exception("No middleware found for key '{$key}'");
		}

		$middleware = $middleware[$key];
		return (new $middleware)->handle();
	}
}
