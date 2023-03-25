<?php

namespace Kathamo\App\Controllers\Middleware;

class Auth
{
	public function handle()
	{
		print_r('Auth middleware called...');
	}
}
