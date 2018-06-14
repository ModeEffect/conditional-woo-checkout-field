<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/* Settings Page */

// Hook for adding admin menus
add_action('admin_menu', 'oizuled_conditional_woo_checkout_fields');

// action function for above hook
function oizuled_conditional_woo_checkout_fields() {
    // Add a new submenu under WooCommerce:
    add_submenu_page( 'woocommerce', 'Conditional Field', 'Conditional Field', 'manage_options', 'wc-conditional-field', 'conditional_fields_page' );
}

add_action('admin_init', 'register_oizuled_conditional_fields_settings');
function activate_conditional_fields() {
	add_option('oizuled_conditional_fields_pid', '');
	add_option('oizuled_conditional_fields_title', '');
	add_option('oizuled_conditional_fields_type', 'text');
	add_option('oizuled_conditional_fields_label', '');
	add_option('oizuled_conditional_fields_placeholder', '');
	add_option('oizuled_conditional_fields_class', '');
	add_option('oizuled_conditional_fields_required', 'yes');
	add_option('oizuled_conditional_fields_requiredtext', '');
	add_option('oizuled_conditional_fields_options', '');
	add_option('oizuled_conditional_fields_addemail', 'yes');
	add_option('oizuled_conditional_fields_addinvoice', 'yes');
}

function deactive_conditional_fields() {
	delete_option('oizuled_conditional_fields_pid');
	delete_option('oizuled_conditional_fields_title');
	delete_option('oizuled_conditional_fields_type');
	delete_option('oizuled_conditional_fields_label');
	delete_option('oizuled_conditional_fields_placeholder');
	delete_option('oizuled_conditional_fields_class');
	delete_option('oizuled_conditional_fields_required');
	delete_option('oizuled_conditional_fields_requiredtext');
	delete_option('oizuled_conditional_fields_options');
	delete_option('oizuled_conditional_fields_addemail');
	delete_option('oizuled_conditional_fields_addinvoice');
}

register_activation_hook(__FILE__, 'activate_conditional_fields');
register_deactivation_hook(__FILE__, 'deactive_conditional_fields');

function register_oizuled_conditional_fields_settings() {
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_pid');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_title');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_type');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_label');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_placeholder');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_class');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_required');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_requiredtext');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_options');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_addemail');
	register_setting( 'oizuled_conditional_fields_option-group', 'oizuled_conditional_fields_addinvoice');
}

/**
 * Display the page content for custom field settings
 **/
function conditional_fields_page() {
	include( CWCF_PLUGIN_DIR . '/includes/options.php' );
}