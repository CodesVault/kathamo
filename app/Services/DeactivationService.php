<?php

namespace Howdy\Services;

use Howdy\Core\Lib\SingleTon;

/**
 * Plugin Deactivation Service.
 * Provides functionality for plugin deactivation event.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.4
 */
class DeactivationService
{
	use SingleTon;

	public function register()
	{
		// deactivation event handler
		\register_deactivation_hook(
			HOWDY_FILE,
			[ __CLASS__, 'deactivate' ]
		);
	}

	public static function deactivate()
	{
		// do something
	}
}
