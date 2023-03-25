<?php

namespace Kathamo\App\Services;

use Kathamo\App\Core\Lib\SingleTon;

class DeactivationService
{
	use SingleTon;

	public function register()
	{
		// deactivation event handler
		\register_deactivation_hook(
			KATHAMO_FILE,
			[ __CLASS__, 'deactivate' ]
		);
	}

	public static function deactivate()
	{
		// do something
	}
}
