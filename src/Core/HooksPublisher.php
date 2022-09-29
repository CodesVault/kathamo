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
        // activation event handler
        \register_activation_hook(
            HOWDY_FILE,
            [ ActivationService::class, 'activate' ]
        );

        // deactivation event handler
        \register_deactivation_hook(
            HOWDY_FILE,
            [ DeactivationService::class, 'deactivate' ]
        );

		// enqueue plugins assets
		AssetsManager::getInstance()->register();

		// load admin menu page
		AdminMenuController::getInstance()->register();
    }
}
