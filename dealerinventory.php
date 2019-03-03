<?php
/**
 * Plugin Name: DealerInventory
 * Plugin URI:  https://dealerinventory.app
 * Description: Pull vehicles from your account on DealerInventory.app and display them on your WordPress website.
 * License:     GPL2
 */

register_activation_hook( __FILE__, 'dealerinventory_activation_hook' );
function dealerinventory_activation_hook()
{
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'dealerinventory_deactivation_hook' );
function dealerinventory_deactivation_hook()
{
	flush_rewrite_rules();
}

register_uninstall_hook(__FILE__, 'dealerinventory_uninstall_hook');
function dealerinventory_uninstall_hook()
{}

if(is_admin()){
	require_once( dirname( __FILE__ ) . '/admin/dealerinventory_admin.php');
}

if( !is_admin() ){
	global $wp_version;
	header( 'X-WP-Version: '.$wp_version );
    header( 'X-Client-Key: '.get_option('dealerinventory_client_key') );
}