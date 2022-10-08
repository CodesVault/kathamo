<?php

namespace Howdy\Controllers;

/**
 * Base Controller.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class BaseController
{
	/**
	 * Register hooks callback
	 *
	 * @return void
	 */
	public function register()
	{}

	/**
	 * Render view file and pass data to the file.
	 *
	 * @param  string $file_path
	 * @param  array  $data
	 * @param  bool   $buffer
	 *
	 * @return mixed
	 */
	public function render( $file_path, $data = [], $buffer = false )
	{
		if ( ! $buffer ) {
			return howdy_render_view_template( $file_path, $data );
		}
		ob_start();
		howdy_render_view_template( $file_path, $data );
		return ob_get_clean();
	}
}
