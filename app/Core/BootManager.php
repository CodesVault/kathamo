<?php

namespace Kathamo\App\Core;

use Kathamo\App\Controllers\AdminMenuController;
use Kathamo\App\Core\Lib\SingleTon;
use Kathamo\App\Services\ActivationService;
use Kathamo\App\Services\DeactivationService;

class BootManager
{
	use SingleTon;

	protected $registerList = [];

	public function __construct()
	{
		$this->setRegisterList();
	}

	/**
	 * Load controller or service which need to register hooks initially when the plugin is loaded.
	 *
	 * @return false|void
	 */
	public function run()
	{
		if ( empty( $this->registerList ) ) {
			return false;
		}

		foreach ( $this->registerList as $class ) {
			$class::getInstance()->register();
		}
	}

	/**
	 * List of all those classes which need to register hooks.
	 *
	 * @return array
	 */
	protected function registerList()
	{
		return array(
			ActivationService::class,
			DeactivationService::class,
			AssetsManager::class,
			AdminMenuController::class,
		);
	}

	/**
	 * Set the array list of controllers & servicess which will be loaded initially.
	 *
	 * @return void
	 */
	protected function setRegisterList()
	{
		$this->registerList = $this->registerList();
	}
}
