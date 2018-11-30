<?php
/**
 * File for debuggind purpose.
 *
 * It is loaded only if WP_DEBUG is defined && true
 *
 * @link https://ttalystrap.com
 *
 * @package ItalyStrap
 */

if ( ! function_exists( 'is_debug' ) ) {
	/**
	 * Is Beta version
	 *
	 * @return bool Return true if ITALYSTRAP_BETA version is declared
	 */
	function is_debug() {
		return (bool) defined( 'WP_DEBUG' ) && WP_DEBUG;
	}
}

if ( ! function_exists( 'is_script_debug' ) ) {
	/**
	 * Is Beta version
	 *
	 * @return bool Return true if ITALYSTRAP_BETA version is declared
	 */
	function is_script_debug() {
		return (bool) defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
	}
}

if ( ! function_exists( 'debug' ) ) {
	/**
	 * Print debug output on debug.log file
	 *
	 * @param mixed $log The input value.
	 */
	function debug( $log ) {
		if ( ! is_debug() ) {
			return;
		}

		error_log( print_r( $log, true ) );

		// if ( is_array( $log ) || is_object( $log ) ) {
		//  error_log( print_r( $log, true ) );
		// } else {
		//  error_log( $log );
		// }
	}
}

if ( ! function_exists( 'd' ) ) {
	function d( $value = '' ) {
		add_action( 'plugins_loaded', function () use ( $value ) {
			if ( ! function_exists( 'd' ) ) {

				echo "<pre>";
				print_r( $value );
				echo "</pre>";

				debug( $value );

				return;
			}
			\d( $value );
		});
	
	}
}

if ( ! function_exists( 'ddd' ) ) {
	function ddd( $value = '' ) {
		add_action( 'plugins_loaded', function () use ( $value ) {
			if ( ! function_exists( 'd' ) ) {

				echo "<pre>";
				print_r( $value );
				echo "</pre>";

				debug( $value );

				die();
			}
			\ddd( $value );
		});
	}
}
