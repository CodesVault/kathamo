<?php

namespace Kathamo\App\Controllers;

use Kathamo\App\Core\Lib\SingleTon;
use Kathamo\App\Services\AdminMenuService;

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
			__( 'Kathamo', 'kathamo' ),
			__( 'Kathamo', 'kathamo' ),
			'manage_options',
			'kathamo-wp',
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
