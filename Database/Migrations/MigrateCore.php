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
class MigrateCore
{
	use SingleTon;

	public function migrate($table_name, $sql)
	{
		$this->create( $table_name, $sql );
	}

	protected function create($table_name, $sql)
	{
		global $wpdb;
		if ( ! $wpdb ) return;

		$charset_collate = $wpdb->get_charset_collate();
		$sql_query       = $sql . ' ' . $charset_collate;
		$table_name      = $wpdb->prefix . $table_name;

		$old_table_name = $wpdb->get_var( $wpdb->prepare( "SHOW TABLES LIKE %s", $table_name ) );	// @phpcs:ignore
		if ( $old_table_name === $table_name ) {
			return;
		}
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		\dbDelta( $sql_query );
	}
}
