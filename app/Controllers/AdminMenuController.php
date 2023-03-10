<?php

namespace Howdy\App\Controllers;

use Howdy\App\Core\Lib\SingleTon;
use Howdy\App\Services\AdminMenuService;

/**
 * Admin pages Controller
 * Provides functionality for plugin dashboar pages.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class AdminMenuController extends BaseController
{
	use SingleTon;

	public function register()
	{
		add_action( 'admin_menu', [ $this, 'addAdminMenu' ] );
	}

	public function addAdminMenu()
	{
		add_menu_page(
			__( 'Howdy', 'howdy' ),
			__( 'Howdy', 'howdy' ),
			'manage_options',
			'howdy-wp',
			[ $this, 'renderAdminMenu' ],
			'dashicons-admin-generic',
			40
		);
	}

	public function renderAdminMenu()
	{
		// $this->middleware( 'auth' );

		$menu_data = AdminMenuService::getInstance();
		$data      = $menu_data->getData();
		$this->render( '/admin/admin-menu.php', $data );
	}
}
