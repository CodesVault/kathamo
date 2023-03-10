<?php

namespace Howdy\App\Controllers\Middleware;

/**
 * Auth middleware.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.8
 */
class Auth
{
	public function handle()
	{
		print_r('Auth middleware called...');
	}
}
