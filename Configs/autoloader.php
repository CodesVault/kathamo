<?php

/**
 * Autoloader for classes
 *
 * @package howdy
 * @author  CodesVault, Keramot UL Islam <sourav926>
 * @since   0.0.1
 */
spl_autoload_register(
	function ($class) {
		$arr = explode( "\\", $class );
		array_shift( $arr );
		array_shift( $arr );

		$file = HOWDY_DIR_PATH . '/app/' . implode( '/', $arr ) . '.php';
		if ( ! file_exists( $file ) ) return;

		require_once $file;
	}
);

/**
 * Auto load migration files and run migrations.
 *
 * @package howdy
 * @author  CodesVault, Keramot UL Islam <sourav926>
 * @since   0.0.3
 */
$file_path = HOWDY_DIR_PATH . '/Database/Migrations/';
foreach ( new \DirectoryIterator( $file_path ) as $file_info ) {
	if ( $file_info->isDot() || $file_info->getExtension() !== 'php' ) continue;

	require_once $file_info->getPathname();
	$class_name = explode( '.', $file_info->getFilename() )[0];
	if ( 'MigrateCore' === $class_name ) continue;

	$class_name = '\Howdy\Database\Migrations\\' . $class_name;
	$class_name::getInstance();
	sleep( 1 );
}
