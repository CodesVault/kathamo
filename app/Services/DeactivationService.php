<?php

namespace Kathamo\App\Services;

use Kathamo\App\Core\Lib\SingleTon;

/**
 * Plugin Deactivation Service.
 * Provides functionality for plugin deactivation event.
 */
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
