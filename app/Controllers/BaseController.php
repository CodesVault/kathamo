<?php

namespace Kathamo\App\Controllers;

use Kathamo\Framework\Lib\Controller;

class BaseController extends Controller
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
			return kathamo_render_view_template( $file_path, $data );
		}
		ob_start();
		kathamo_render_view_template( $file_path, $data );
		return ob_get_clean();
	}
}
