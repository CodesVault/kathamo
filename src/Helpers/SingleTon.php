<?php

namespace Howdy\Helpers;

/**
 * Singletone trait.
 * 
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
trait SingleTon
{
	private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if ( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Prevent cloning of the instance
    protected function __clone() {}

    // Prevent serialization of the instance
    protected function __sleep() {}

    // Prevent deserialization of the instance
    protected function __wakeup() {}
}
