<?php

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Load internal files
 *
 * @var array
 */
$files = [
	'debug.php',
	'compat.php',
];

foreach ( $files as $file ) {
    require_once( $file );
}

/**
 * Setup the Whoops container.
 *
 * From KnowTheCode\UpDevTools
 * @link "https://github.com/KnowTheCode/UpDevTools"
 * @author Tonya Mork
 */
function setup_whoops() {
	$whoops     = new Run();
	$error_page = new PrettyPageHandler();

	$error_page->setEditor( 'sublime' );
	$whoops->pushHandler( $error_page );
	$whoops->register();
}

setup_whoops();

/**
 * If is not debug active disable Kint
 * https://kint-php.github.io/kint/
 */
if ( ! is_debug() ) {
	Kint::enabled( false );
}
