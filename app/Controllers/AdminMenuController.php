<?php

namespace Kathamo\App\Controllers;

use Kathamo\App\Core\Lib\SingleTon;
use Kathamo\App\Services\AdminMenuService;
use Kathamo\Framework\Lib\Http\Request;

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
			'kathamo-adminmenu-slug',
			[ $this, 'renderAdminMenu' ],
			'dashicons-admin-generic',
			40
		);
	}

	public function renderAdminMenu()
	{
		// $this->middleware( 'auth' );

		// $validate = $this->validate( [
		// 	'page' => 'stringOnly',
		// ] );

		// $res = Request::get( 'https://jsonplaceholder.typicode.com/posts/1' );
		// dump($validate->getData(), $res->getBody(), 'Response from jsonplaceholder');

		$menu_data = AdminMenuService::getInstance();
		$data      = $menu_data->getData();
		$this->render( '/admin/admin-menu.php', $data );
	}
}
