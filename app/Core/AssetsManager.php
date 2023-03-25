<?php

namespace Kathamo\App\Core;

use Kathamo\App\Core\Lib\SingleTon;

/**
 * Assets Service Provider.
 * it registers all assets of the plugin.
 */
class AssetsManager
{
	use SingleTon;

	private $extension_prefix = '.min';
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
			$this->extension_prefix = '';
		}
	}

	public function admin_scripts()
	{
		wp_enqueue_style(
			kathamo_prefix( 'admin-css' ),
			kathamo_asset_url( "/admin/css/admin{$this->extension_prefix}.css" ),
			[],
			$this->configs['plugin_version']
		);

		wp_enqueue_script(
			kathamo_prefix( 'admin-js' ),
			kathamo_asset_url( "/admin/js/admin{$this->extension_prefix}.js" ),
			[],
			$this->configs['plugin_version'],
			true
		);
	}

	public function public_scripts()
	{
		wp_enqueue_style(
			kathamo_prefix( 'public-css' ),
			kathamo_asset_url( "/public/css/public{$this->extension_prefix}.css" ),
			[],
			$this->configs['plugin_version'],
		);

		wp_enqueue_script(
			kathamo_prefix( 'public-js' ),
			kathamo_asset_url( "/public/js/public{$this->extension_prefix}.js" ),
			[],
			$this->configs['plugin_version'],
			true
		);
	}
}
