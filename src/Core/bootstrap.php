<?php

if ( ! function_exists( 'howdy_prefix' ) ) {
    /**
     * Add prefix for the given string.
     * 
     * @param  string $name
     * 
     * @package howdy
     * @author  CodesVault, Keramot UL Islam <sourav926>
     * @since   0.0.1
     */
    function howdy_prefix($name)
    {
        return HOWDY . "-" . $name;
    }
}

if ( ! function_exists( 'howdy_url' ) ) {
    /**
     * Add prefix for the given string.
     * 
     * @param  string $name
     * 
     * @package howdy
     * @author  CodesVault, Keramot UL Islam <sourav926>
     * @since   0.0.1
     */
    function howdy_url($path)
    {
        return HOWDY_PLUGIN_URL . $path;
    }
}

if ( ! function_exists( 'howdy_asset_url' ) ) {
    /**
     * Add prefix for the given string.
     * 
     * @param  string $name
     * 
     * @package howdy
     * @author  CodesVault, Keramot UL Islam <sourav926>
     * @since   0.0.1
     */
    function howdy_asset_url($path)
    {
        return howdy_url( "assets/" . $path );
    }
}

if ( ! function_exists( 'howdy_wp_ajax' ) ) {
    /**
     * Wrapper function for wp_ajax_* and wp_ajax_nopriv_*
     * 
     * @param  string $action - action name
     * @param string $method - callback method name
     * @param bool $public - is this a public ajax action
     * 
     * @package howdy
     * @author  CodesVault, Keramot UL Islam <sourav926>
     * @since   0.0.1
     */
    function howdy_wp_ajax($action, $callback, $public = false)
    {
        add_action( 'wp_ajax_' . $action, $callback );
        if ( $public ) {
            add_action( 'wp_ajax_nopriv_' . $action, $callback );
        }
    }
}

if ( ! function_exists( 'howdy_loadTemplate' ) ) {
    /**
     * Require a Template file.
     * 
     * @param  string $file_path
     * @param array $data
     * 
     * @package howdy
     * @author  CodesVault, Keramot UL Islam <sourav926>
     * @since   0.0.1
     */
    function howdy_loadTemplate($file_path, $data = [])
    {
        $file = HOWDY_DIR_PATH . "src/" . $file_path;
        if ( ! file_exists( $file ) ) {
            throw new \Exception( "File not found" );
        }
        if ( ! is_array( $data ) ) {
            throw new \Exception( "Expected array as data" );
        }
        extract( $data, EXTR_PREFIX_SAME, 'howdy' );

        return require_once $file;
    }
}

if ( ! function_exists( 'howdy_loadViewTemplate' ) ) {
    /**
     * Require a View template file.
     * 
     * @param  string $file_path
     * @param array $data
     * 
     * @package howdy
     * @author  CodesVault, Keramot UL Islam <sourav926>
     * @since   0.0.1
     */
    function howdy_loadViewTemplate($file_path, $data = [])
    {
        return howdy_loadTemplate( "Views/" . $file_path, $data );
    }
}

/**
 * Autoloader for classes
 *
 * @package howdy
 * @author  CodesVault, Keramot UL Islam <sourav926>
 * @since   0.0.1
 */
spl_autoload_register( function ($class) {
    $arr = explode( "\\", $class );

    $namespace_root = ucfirst( HOWDY );
    if ( $arr[0] != $namespace_root ) return;
    array_shift( $arr );

    $file = HOWDY_DIR_PATH . '/src/' . implode( '/', $arr ) . '.php';
    if ( ! file_exists( $file ) ) return;

    require_once $file;
} );

/**
 * Auto load migration files and run migrations.
 *
 * @package howdy
 * @author  CodesVault, Keramot UL Islam <sourav926>
 * @since   0.0.3
 */
$file_path = HOWDY_DIR_PATH . '/src/Database/Migrations/';
foreach ( new \DirectoryIterator( $file_path ) as $fileInfo ) {
    if ( $fileInfo->isDot() || $fileInfo->getExtension() !== 'php' ) continue;

    require_once $fileInfo->getPathname();
    $class_name = explode( '.', $fileInfo->getFilename() )[0];
    if ( $class_name === 'MigrateCore' ) continue;
    
    $class_name = '\Howdy\Database\Migrations\\' . $class_name;
    $class_name::getInstance();
    sleep(1);
}
