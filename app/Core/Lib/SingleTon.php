<?php

namespace Kathamo\App\Core\Lib;

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
