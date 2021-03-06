<?php
/*
Plugin Name: Debug
Description: Classes and functions for handling debugging
Plugin URI: https://italystrap.com
Author: Enea Overclokk
Author URI: https://italystrap.com
Version: 10.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

/*

    Copyright (C) Year  Enea Overclokk  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require( __DIR__ . '/vendor/autoload.php' );

/**
 * debug_example
 * @todo Maybe interesting https://stackify.com/php-try-catch-php-exception-tutorial/
 */
function debug_example() {

//    debug( 'Example', 'Another example' );
//    debug( ['key' => 'value'], [ 'ddd', 'esdf' ] );
//	$obj = new stdClass();
//	$obj->test = 'test';




//    debug($obj);
//    d( 'Example' );
//    d( ['key' => 'value'] );

}

add_action( 'wp_footer', 'debug_example' );

//
// Use:
// if ( ! is_debug() ) {
    // Kint::enabled( false );
// }
// In your plugin to disable Kint in prouction env
