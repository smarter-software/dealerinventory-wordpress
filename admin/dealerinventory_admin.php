<?php

if(empty(get_option('dealerinventory_client_key'))) {
//	add_action( 'admin_notices', array( $this, 'display_admin_register_notice' ) );

//	add_settings_error( 'dealerinventory_messages', 'dealerinventory_message', __( 'DealerInventory Plugin Requires a Client Key', 'dealerinventory' ), 'updated' );

	// todo: find a way to add a global warning
}

add_action( 'admin_menu', 'dealerinventory_admin_menu_hook' );
function dealerinventory_admin_menu_hook() {;
	add_menu_page(
		'Dealer Inventory Settings',
		'Dealer Inventory',
		'manage_options',
		'dealerinventory',
		function() { include (plugin_dir_path(__FILE__) . 'view.php'); },
		'data:image/svg+xml;base64,'.base64_encode('<svg width="2048" height="1792" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg"><path d="M480 1088q0-66-47-113t-113-47-113 47-47 113 47 113 113 47 113-47 47-113zm36-320h1016l-89-357q-2-8-14-17.5t-21-9.5h-768q-9 0-21 9.5t-14 17.5zm1372 320q0-66-47-113t-113-47-113 47-47 113 47 113 113 47 113-47 47-113zm160-96v384q0 14-9 23t-23 9h-96v128q0 80-56 136t-136 56-136-56-56-136v-128h-1024v128q0 80-56 136t-136 56-136-56-56-136v-128h-96q-14 0-23-9t-9-23v-384q0-93 65.5-158.5t158.5-65.5h28l105-419q23-94 104-157.5t179-63.5h768q98 0 179 63.5t104 157.5l105 419h28q93 0 158.5 65.5t65.5 158.5z" fill="#fff"/></svg>'),
		59
	);
}

add_action( 'admin_init', 'register_dealerinventory_settings' );
function register_dealerinventory_settings()
{
	register_setting('dealerinventory-group', 'dealerinventory_client_key', [
		'type' => 'string',
		'description' => 'Your DealerInventory.app Client Key',
		'sanitize_callback' => 'trim',
	]);

	add_settings_section(
		'dealerinventory-settings',
		null,
		null,
		'dealerinventory'
	);


	add_settings_field(
		'dealerinventory_client_key',
		'Client Key',
		'dealerinventory_admin_client_key_html',
		'dealerinventory',
		'dealerinventory-settings'
	);
}

function dealerinventory_admin_client_key_html()
{
	$value = get_option('dealerinventory_client_key');

	printf( '<input type="text" id="title" name="dealerinventory_client_key" value="%s" />', $value);
}