<?php

namespace Howdy\App\Core;

use Howdy\App\Controllers\AdminMenuController;
use Howdy\App\Core\Lib\SingleTon;
use Howdy\App\Services\ActivationService;
use Howdy\App\Services\DeactivationService;

/**
 * WP action/filter hooks publisher.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.6
 */
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
