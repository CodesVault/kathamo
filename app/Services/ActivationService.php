<?php

namespace Kathamo\App\Services;

use Kathamo\App\Core\Lib\SingleTon;

class ActivationService
{
	use SingleTon;

	public function register()
	{
		// activation event handler
		\register_activation_hook(
			KATHAMO_FILE,
			[ __CLASS__, 'activate' ]
		);
	}

	public static function activate()
	{
		// do something
	}
}
