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
	 * Is ItalyStrap Dev Debug
	 *
	 * @return bool Return true if SCRIPT_DEBUG is active
	 */
	public static function is_italystrap_debug() {
		return (bool) defined( 'ITALYSTRAP_DEBUG' ) && ITALYSTRAP_DEBUG;
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

		if ( is_bool( $log ) ) {
			$log = $log ? 'true' : 'false';
		}

		/**
		 * __FILE__
		 * __LINE__
		 * https://stackoverflow.com/questions/1252529/get-code-line-and-file-thats-executing-the-current-function-in-php
		 */
		$bt = debug_backtrace();
		$caller = array_shift( $bt );

		error_log( print_r( $caller['file'] . ' Line: ' . $caller['line'], true ) );
		error_log( print_r( $log, true ) );

		// if ( is_array( $log ) || is_object( $log ) ) {
		//  error_log( print_r( $log, true ) );
		// } else {
		//  error_log( $log );
		// }

	}
}
