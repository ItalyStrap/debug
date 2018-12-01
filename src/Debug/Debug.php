<?php
/**
 * Asset_Queued API
 *
 * Debug all Asset_Queued
 *
 * @link www.italystrap.com
 * @since 2.4.0
 *
 * @package ItalyStrap
 */

namespace ItalyStrap\Debug;

/**
 * Debug
 */
class Debug {

	/**
	 * Is debug active
	 *
	 * @return bool Return true if WP_DEBUG is active
	 */
	public static function is_debug() {
		return (bool) defined( 'WP_DEBUG' ) && WP_DEBUG;
	}

	/**
	 * Is Beta version
	 *
	 * @return bool Return true if SCRIPT_DEBUG is active
	 */
	public static function is_script_debug() {
		return (bool) defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
	}

	/**
	 * Write to log file
	 *
	 * @param  string $value [description]
	 * @return string        [description]
	 */
	public static function log( $log ) {
	
		if ( ! self::is_debug() ) {
			return;
		}

		error_log( print_r( $log, true ) );

		// if ( is_array( $log ) || is_object( $log ) ) {
		//  error_log( print_r( $log, true ) );
		// } else {
		//  error_log( $log );
		// }
	
	}

	/**
	 * Write to log file
	 *
	 * @param  string $value [description]
	 * @return string        [description]
	 */
	public static function d( $log ) {
	
		echo "<pre>";
		print_r( $value );
		echo "</pre>";

		self::log( $value );
	}

	/**
	 * Write to log file
	 *
	 * @param  string $value [description]
	 * @return string        [description]
	 */
	public static function ddd( $log ) {

		echo "<pre>";
		print_r( $value );
		echo "</pre>";

		self::log( $value );

		die();
	}
}
