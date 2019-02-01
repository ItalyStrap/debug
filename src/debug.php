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
	function debug( $log ) {
		Debug::log( $log );
	}
}
