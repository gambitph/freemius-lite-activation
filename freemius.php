// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( plugin_dir_path( __FILE__ ) . 'src/freemius.php' );

/**
 * ==============================================================================
 * Initialize licensing. START
 * ==============================================================================
 */

if ( ! function_exists( 'fla_f' ) ) {
	function fla_f() {
		return FLA_Freemius::get_instance( [
			'plugin_id' => '123456', // Replace with your actual plugin ID.
			'slug' => 'plugin-slug', // Replace with your actual plugin slug.
			'option_name' => 'wpi_activation_data', // The option name where activation data is stored.
			'plugin_main_file' => __FILE__, // The main plugin file.
		] );
	}

	add_action( 'init', function() {
		FLA_Freemius_Admin::get_instance( fla_f(), [
			'show_plan' => true,
			'labels' => [
				'popup_title' => __( 'Plugin Premium License', 'my-plugin-domain' ),
				'popup_description' => __( 'Having an activated license key will allow you to enable plan-specific features, receive premium plugin updates and premium support.', 'my-plugin-domain' ),
				'license_key_field_label' => __( 'License Key', 'my-plugin-domain' ),
				'license_key_field_help' => __( 'Paste in your license key here. If you changed plans while having a license key active, you may need to deactivate and re-activate it to update your plugin capabilities.', 'my-plugin-domain' ),
				'activate_license' => __( 'Activate License Key', 'my-plugin-domain' ),
				'manage_license' => __( 'Manage License Key', 'my-plugin-domain' ),
				'activate_button' => __( 'Activate License', 'my-plugin-domain' ),
				'deactivate_button' => __( 'Deactivate License', 'my-plugin-domain' ),
				'sync_button' => __( 'Sync License', 'my-plugin-domain' ),
				'invalid_nonce' => __( 'Invalid nonce', 'my-plugin-domain' ),
				'deactiation_success' => __( 'License deactivated successfully', 'my-plugin-domain' ),
				'activation_success' => __( 'License activated successfully', 'my-plugin-domain' ),
				'sync_success' => __( 'License plan synced successfully', 'my-plugin-domain' ),
				'no_license_key' => __( 'No license key provided', 'my-plugin-domain' ),
			]
		] );
	} );
}

/**
 * ==============================================================================
 * Initialize licensing. END
 * ==============================================================================
 */

fla_f();