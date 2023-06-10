<?php

namespace Kathamo\App\Controllers\Middleware;

use Kathamo\Framework\Lib\Middleware;

class Auth extends Middleware
{
	public function handle()
	{
		// dump($this->getRequestParams(), 'Auth middleware called...');
	}
}
