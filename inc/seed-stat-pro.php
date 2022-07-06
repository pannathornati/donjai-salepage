<?php
// FOR donjai STAT PRO PLUGIN
if( function_exists( 'run_donjai_Stat' ) ){

	add_action('donjai_end_entry_meta', 'donjai_add_stat');
	add_action('donjai_end_archive_meta', 'donjai_add_stat');

	function donjai_add_stat() {
		echo do_shortcode('[s_stat]');
	}
}