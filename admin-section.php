<?php
// Register needed settings
function register_oc_settings() {
	register_setting( 'oc_client_group', 'serverRendering' );
	register_setting( 'oc_client_group', 'includeOcClient' );
}
add_action( 'admin_init', 'register_oc_settings' );

// Adding admin menu
add_action( 'admin_menu', 'oc_client_plugin_menu' );

// Menu link
function oc_client_plugin_menu() {
	add_options_page( 'WP oc-client options', 'WP oc-client', 'manage_options', 'oc-client-page', 'oc_client_options' );
}

// Rendering options page
function oc_client_options() {
	if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    ?>
	<div class="wrap">
        <h1>WP oc-client</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'oc_client_group' ); ?>
            <?php do_settings_sections( 'oc_client_group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Server rendering</th>
                    <td><input type="text" name="serverRendering" value="<?php echo esc_attr( get_option('serverRendering') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Include oc-client script tag</th>
                    <td><input type="checkbox" name="includeOcClient" <?php echo get_option('includeOcClient') == 'on' ? 'checked' : '' ?> /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
	</div>
    <?php
}
