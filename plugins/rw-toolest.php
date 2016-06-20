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
		, 'buddypress'
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

function rw_fix_correct_theme_textdomain_dir() {
	
	$locale = get_locale();
	
	$domains = array (
		  'boss'
		, 'social-learner'
		
	) ;
	
	foreach ($domains as $domain ){
		if ( $loaded = load_theme_textdomain( $domain, trailingslashit( WP_LANG_DIR ) .'themes/' . $domain . '-' . $locale . '.mo' , true) ) {
			return $loaded;
		} else {
			load_theme_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
		}	
	}
}
add_action( 'after_setup_theme', 'rw_fix_correct_theme_textdomain_dir' );
