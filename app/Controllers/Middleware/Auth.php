<?php

namespace Kathamo\App\Controllers\Middleware;

/**
 * Auth middleware.
 */
class Auth
{
	public function handle()
	{
		print_r('Auth middleware called...');
	}
}
