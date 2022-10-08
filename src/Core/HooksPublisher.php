<?php

namespace Howdy\Core;

use Howdy\Controllers\AdminMenuController;
use Howdy\Core\Lib\SingleTon;
use Howdy\Services\ActivationService;
use Howdy\Services\DeactivationService;

/**
 * WP action/filter hooks publisher.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.4
 */
class HooksPublisher
{
	use SingleTon;

	public function publish()
	{
		// list of all those classes which need to register hooks.
		$class_list = [
			ActivationService::class,
			DeactivationService::class,
			AssetsManager::class,
			AdminMenuController::class,
		];

		// if a controller or service need to register hooks all the time.
		foreach ( $class_list as $class ) {
			$class::getInstance()->register();
		}
	}
}
