<?php

namespace Kathamo\App\Services;

use Kathamo\App\Core\Lib\SingleTon;

class AdminMenuService
{
	use SingleTon;

	public function getData()
	{
		$data = [
			'plugin_name' => 'Howdy',
			'developed'   => 'Developed by',
			'author_name' => 'CodesVault',
			'author_link' => 'https://github.com/CodesVault',
		];
		return $data;
	}
}
