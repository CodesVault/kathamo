<?php

namespace Kathamo\App\Services;

use Kathamo\App\Core\Lib\SingleTon;

/**
 * Plugin Activation Service.
 * Provides functionality for plugin activation event.
 */
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
