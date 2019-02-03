<?php

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Setup the Whoops container.
 *
 * From KnowTheCode\UpDevTools
 * @link "https://github.com/KnowTheCode/UpDevTools"
 * @author Tonya Mork
 */
function setup_whoops() {

	if ( ! is_debug() ) {
		return;
	}

	if ( ! is_italystrap_debug() ) {
		return;
	}

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
Kint\Kint::$enabled_mode = is_debug();
