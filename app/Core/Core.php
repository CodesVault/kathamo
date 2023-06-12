<?php

namespace Kathamo\App\Core;

use Kathamo\App\Controllers\AdminMenuController;
use Kathamo\Framework\Lib\BootManager;
use Kathamo\App\Core\Lib\SingleTon;
use Kathamo\App\Services\ActivationService;
use Kathamo\App\Services\DeactivationService;

final class Core extends BootManager
{
	use SingleTon;

	protected function registerList()
	{
		$this->registerList = [
			ActivationService::class,
			DeactivationService::class,
			AssetsManager::class,
			AdminMenuController::class,
		];
	}
}
