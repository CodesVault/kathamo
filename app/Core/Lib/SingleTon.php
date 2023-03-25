<?php

namespace Kathamo\App\Core\Lib;

/**
 * Singletone trait.
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
