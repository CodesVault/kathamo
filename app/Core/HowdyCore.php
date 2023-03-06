<?php

namespace Howdy\Core;

use Howdy\Core\Lib\SingleTon;

/**
 * Main Class for plugin
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
final class HowdyCore
{
	use SingleTon;

	public function __construct()
	{
		$this->load();
	}

	private function load()
	{
		if (class_exists('ProBootManager')) {
			return ProBootManager::getInstance()->run();
		}
		BootManager::getInstance()->run();
	}
}
