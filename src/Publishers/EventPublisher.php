<?php

namespace Howdy\Publishers;

use Howdy\Controllers\AdminMenuController;
use Howdy\Publishers\Activation;
use Howdy\Publishers\Deactivation;
use Howdy\Core\SingleTon;

/**
 * Event Listener.
 * Register and handle events.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.3
 */
class EventPublisher
{
	use SingleTon;

    public function register()
    {
        // activation event listener
        register_activation_hook(
            HOWDY_FILE,
            [ Activation::class, 'activate' ]
        );

        // deactivation event listener
        register_deactivation_hook(
            HOWDY_FILE,
            [ Deactivation::class, 'deactivate' ]
        );

        add_action( 'admin_menu', [ AdminMenuController::getInstance(), 'addAdminMenu' ] );
    }
}
