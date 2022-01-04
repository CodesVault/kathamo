<?php

namespace Howdy\Providers;

use Howdy\Providers\Provider;

/**
 * Main Service Provider that registers all the services
 * 
 * @package     howdy
 * @author      Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class HowdyServiceProvider implements Provider
{
    public function register()
    {
        print_r( "Howdy WP..." );
    }
}
