<?php

if ( ! current_user_can( 'manage_options' ) ) {
	return;
}

?>


<div class="wrap">

    <?php
    if ( isset( $_GET['settings-updated'] ) ) {
        // wordpress is weird. this is an example right from the docs
        add_settings_error( 'dealerinventory_messages', 'dealerinventory_message', __( 'Settings Saved', 'dealerinventory' ), 'updated' );
    }

    settings_errors( 'dealerinventory_messages' );
    ?>

    <a class="button button-link button-large" href="https://dealerinventory.app/dashboard"><span style="font-size: 18px"><i class="dashicons dashicons-admin-links dashicons-admin-appearance"></i> DealerInventory Dashboard</span></a>

    <h1>DealerInventory.app WordPress Settings</h1>

	<form action="options.php" method="post">
		<?php

        // output security fields for the registered setting "wporg_options"
		settings_fields( 'dealerinventory-group' );

		// output setting sections and their fields
		// (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'dealerinventory' );

        // output save settings button
		submit_button( 'Save Settings' );
		?>
	</form>
</div>