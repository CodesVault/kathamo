<?php

namespace Kathamo\App\Core;

use Kathamo\App\Core\Lib\SingleTon;

final class Core
{
	use SingleTon;

	public function __construct()
	{
		$this->load();
	}

	private function load()
	{
		// if (class_exists('ProBootManager')) {
		// 	return ProBootManager::getInstance()->run();
		// }
		BootManager::getInstance()->run();
	}
}
