<?php

namespace Howdy\Core\Lib;

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

	public static function getInstance()
	{
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
