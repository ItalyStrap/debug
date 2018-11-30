<?php

/**
 * Compat with UpDevTools from Tonya Mork
 */

/**
 * Print style for kint and pre wp-admin > pre
 */
function add_style_for_pre_tag_var_dump_and_kint_debugger() {
	echo '<style>.wp-admin > pre, .kint{margin-left: 170px;}</style>';
}
add_action( 'admin_head', 'add_style_for_pre_tag_var_dump_and_kint_debugger' );

/**
 * Rimuovo lo stile alla admin bar creato da UpDevTools
 */
remove_filter( 'get_user_option_admin_color', 'KnowTheCode\UpDevTools\Admin\set_local_development_admin_color_scheme', 5 );
remove_action( 'admin_head', __NAMESPACE__ . 'KnowTheCode\UpDevTools\Admin\render_admin_bar_css', 9999 );
remove_action( 'wp_head', __NAMESPACE__ . 'KnowTheCode\UpDevTools\Admin\render_admin_bar_css', 9999 );

/**
 * Per sicurezza ricarico lo stile predefinito
 */
add_filter( 'get_user_option_admin_color', function ( $color ) {
	return 'fresh';
}, 5 );
