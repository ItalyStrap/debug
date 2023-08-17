<?php
/**
 * Helpers for debuggind purpose.
 *
 * @link https://italystrap.com
 *
 * @package ItalyStrap
 */

use ItalyStrap\Debug\Debug;

if ( ! function_exists( 'is_debug' ) ) {
	/**
	 * Is Beta version
	 *
	 * @return bool Return true if ITALYSTRAP_BETA version is declared
	 */
	function is_debug() {
		return Debug::is_debug();
	}
}

if ( ! function_exists( 'is_script_debug' ) ) {
	/**
	 * Is Beta version
	 *
	 * @return bool Return true if ITALYSTRAP_BETA version is declared
	 */
	function is_script_debug() {
		return Debug::is_script_debug();
	}
}

if ( ! function_exists( 'is_italystrap_debug' ) ) {
	/**
	 * Print debug output on debug.log file
	 *
	 * @param mixed $log The input value.
	 * @return
	 */
	function is_italystrap_debug() {
		return Debug::is_italystrap_debug();
	}
}

if ( ! function_exists( 'debug' ) ) {
	/**
	 * Print debug output on debug.log file
	 *
	 * @param mixed $log The input value.
	 */
	function debug( ...$logs ) {
		Debug::log( ...$logs );
	}
}

if ( ! function_exists( 'dlog' ) ) {
	/**
	 * Print debug output on debug.log file
	 *
	 * @param mixed $log The input value.
	 */
	function dlog( ...$logs ) {
		Debug::log( ...$logs );
	}
}

if ( ! function_exists( 'wlog' ) ) {
    function wlog( ...$logs ) {
        Debug::wlog( ...$logs );
    }
}

if ( ! function_exists( 'lazyd' ) && \function_exists('add_action') ) {
    /**
     * Print debug output on debug.log file
     *
     * @param mixed $log The input value.
     */
    function lazyd(...$args): void {
        \add_action('shutdown', static function () use ($args) {
            \d(...$args);
        });
    }
}
