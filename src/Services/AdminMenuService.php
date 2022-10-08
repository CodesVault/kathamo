<?php

namespace Howdy\Services;

use Howdy\Core\Lib\SingleTon;

/**
 * Service class for admin menu.
 * Reuseble functionality & business logics provider.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.3
 */
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
