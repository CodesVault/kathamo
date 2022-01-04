<?php

namespace Howdy\Providers;

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
    // list of all the service providers
    protected function providers()
    {
        return [
            AdminServiceProvider::class,
        ];
    }

    // register all the services
    public function register()
    {
        foreach ( $this->providers() as $class ) {
            (new $class)->register();
        }
    }
}
