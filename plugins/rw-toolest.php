<?php
/*
Plugin Name: RW_Toolset
*/

function rw_fix_correct_plugin_textdomain_dir() {
	
	$locale = get_locale();
	
	$domains = array (
		  'bp-docs'
		, 'bp-group-hierarchy'
		, 'bbpvotes'
	) ;
	
	foreach ($domains as $domain ){
		if ( $loaded = load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) .'plugins/' . $domain . '-' . $locale . '.mo' , true) ) {
			return $loaded;
		} else {
			load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
		}	
	}
}
add_action( 'plugins_loaded', 'rw_fix_correct_plugin_textdomain_dir' );
