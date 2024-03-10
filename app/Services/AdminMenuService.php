<?php

namespace Kathamo\App\Services;

use Kathamo\Framework\Lib\Service;
use Kathamo\App\Core\Lib\SingleTon;

class AdminMenuService extends Service
{
	use SingleTon;

	public function getData()
	{
		return [
			'plugin_name' => 'Kathamo',
			'developed'   => 'Author',
			'author_name' => 'CodesVault',
			'author_link' => 'https://github.com/CodesVault',
		];
	}
}
