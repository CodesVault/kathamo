<?php

namespace Howdy\Providers;

use Howdy\Helpers\SingleTon;
use Howdy\Providers\Provider;

/**
 * Main Service Provider that registers all the services
 * 
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class HowdyServiceProvider implements Provider
{
	use SingleTon;

    // list of all the service providers
    protected function providers()
    {
        return [
			EventListenerServiceProvider::class,
            AdminServiceProvider::class,
			PublicServiceProvider::class,
        ];
    }

    // register all the services
    public function register()
    {
        foreach ( $this->providers() as $class ) {
            ($class::getInstance())->register();
        }
    }
}
