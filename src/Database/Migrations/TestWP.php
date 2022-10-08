<?php

namespace Howdy\Database\Migrations;

use Howdy\Core\Lib\SingleTon;

/**
 * Main Class for DB migrations
 * Extend this class to create your own migrations.
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.3
 */
class TestWP extends MigrateCore
{
	use SingleTon;

	public function __construct()
	{
		// @phpcs:ignore
		// $this->migrate(
		// 	'test_wp',
		// 	'CREATE TABLE `test_wp` (
		//         `id` int(11) NOT NULL AUTO_INCREMENT,
		//         `name` varchar(255) NOT NULL,
		//         `email` varchar(255) NOT NULL,
		//         `created_at` datetime NOT NULL,
		//         `updated_at` datetime NOT NULL,
		//         PRIMARY KEY (`id`)
		//     )'
		// );
	}

}
