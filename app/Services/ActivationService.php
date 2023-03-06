<?php

namespace Howdy\Services;

use Howdy\Core\Lib\SingleTon;

/**
 * Plugin Activation Service.
 * Provides functionality for plugin activation event.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.4
 */
class ActivationService
{
	use SingleTon;

	public function register()
	{
		// activation event handler
		\register_activation_hook(
			HOWDY_FILE,
			[ __CLASS__, 'activate' ]
		);
	}

	public static function activate()
	{
		// do something
	}
}
