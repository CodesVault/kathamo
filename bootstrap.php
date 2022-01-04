<?php

spl_autoload_register( function ($class) {
    $arr = explode( "\\", $class );

    $namespace_root = ucfirst( HOWDY );
    if ( $arr[0] != $namespace_root ) return;
    array_shift( $arr );

    $file = __DIR__ . '/src/' . implode( '/', $arr ) . '.php';
    require_once $file;
} );
