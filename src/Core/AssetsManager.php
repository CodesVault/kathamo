<?php

namespace Howdy\Core;

use Howdy\Core\Lib\SingleTon;

/**
 * Assets Service Provider.
 * it registers all assets of the plugin.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class AssetsManager
{
	use SingleTon;

	private $extension_prefix = '.min';

	public function register()
	{
		$this->before_register_assets();
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'public_scripts' ] );
	}

	private function before_register_assets()
	{
		if ( \HOWDY_DEV_MODE ) {
			$this->extension_prefix = '';
		}
	}

	public function admin_scripts()
	{
		wp_enqueue_style(
			howdy_prefix( 'admin-css' ),
			howdy_asset_url( "admin/css/admin{$this->extension_prefix}.css" ),
			[],
			HOWDY_VERSION
		);

		wp_enqueue_script(
			howdy_prefix( 'admin-js' ),
			howdy_asset_url( "admin/js/admin{$this->extension_prefix}.js" ),
			[],
			HOWDY_VERSION,
			true
		);
	}

	public function public_scripts()
	{
		wp_enqueue_style(
			howdy_prefix( 'public-css' ),
			howdy_asset_url( "public/css/public{$this->extension_prefix}.css" ),
			[],
			HOWDY_VERSION,
		);

		wp_enqueue_script(
			howdy_prefix( 'public-js' ),
			howdy_asset_url( "public/js/public{$this->extension_prefix}.js" ),
			[],
			HOWDY_VERSION,
			true
		);
	}

}
