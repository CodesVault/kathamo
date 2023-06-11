<?php

namespace Kathamo\App\Core;

use Kathamo\App\Core\Lib\SingleTon;

class AssetsManager
{
	use SingleTon;

	private $version = '';
	private $configs = [];

	public function register()
	{
		$this->configs = kathamo_get_config();

		$this->before_register_assets();
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'public_scripts' ] );
	}

	private function before_register_assets()
	{
		if ( $this->configs['dev_mode'] ) {
			return $this->version = time();
		}
		$this->version = $this->configs['plugin_version'];
	}

	public function admin_scripts()
	{
		wp_enqueue_style(
			kathamo_prefix( 'admin-css' ),
			kathamo_asset_url( "/dist/admin.css" ),
			[],
			$this->version
		);

		wp_enqueue_script(
			kathamo_prefix( 'admin-js' ),
			kathamo_asset_url( "/dist/admin.js" ),
			[],
			$this->version,
			true
		);
	}

	public function public_scripts()
	{
		wp_enqueue_style(
			kathamo_prefix( 'public-css' ),
			kathamo_asset_url( "/dist/public.css" ),
			[],
			$this->version
		);

		wp_enqueue_script(
			kathamo_prefix( 'public-js' ),
			kathamo_asset_url( "/dist/public.js" ),
			[],
			$this->version,
			true
		);
	}
}
