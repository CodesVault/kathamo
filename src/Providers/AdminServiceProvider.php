<?php

namespace Howdy\Providers;

use Howdy\Helpers\SingleTon;
use Howdy\Controllers\AdminMenuController;

/**
 * Admin Service Provider
 * It registers admin panel functionalities.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class AdminServiceProvider implements Provider
{
	use SingleTon;
	
    public function register()
    {
        (new AdminMenuController)->register();
    }
}
