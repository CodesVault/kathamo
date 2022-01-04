<?php

namespace Howdy\Providers;

use Howdy\Controllers\ActivationController;
use Howdy\Controllers\DeactivationController;

/**
 * Event Listener Service Provider.
 * Does somethings when an event occers.
 * 
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class EventListenerServiceProvider implements Provider
{
    public function register()
    {
        // activation event listener
        register_activation_hook(
            HOWDY_FILE,
            [ ActivationController::class, 'activate' ]
        );

        // deactivation event listener
        register_deactivation_hook(
            HOWDY_FILE,
            [ DeactivationController::class, 'deactivate' ]
        );
    }
}
