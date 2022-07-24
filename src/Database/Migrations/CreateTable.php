<?php

namespace Howdy\Database\Migrations;

use Howdy\Core\SingleTon;

/**
 * Main Class for plugin
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
class CreateTable
{
    use SingleTon;

    public function migrate($table_name, $sql)
    {
        $this->create($table_name, $sql);
    }

    protected function create($table_name, $sql)
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $sql_query = $sql . ' ' . $charsetCollate;
        $table_name = $wpdb->prefix . $table_name;

        if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) == $table_name ) {
            return;
        }
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql_query );
    }
}
