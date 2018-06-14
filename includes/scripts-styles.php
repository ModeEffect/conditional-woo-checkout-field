<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function conditional_checkout_field_script_styles(){
	wp_register_style( 'cwcf-upgrade-css', CWCF_PLUGIN_URL . '/includes/css/cwcf-style.css' );
	wp_enqueue_style( 'cwcf-upgrade-css' );
	wp_enqueue_script( 'cwcf-help-toggle', CWCF_PLUGIN_URL . '/includes/js/help-toggle.js' );
}
add_action( 'admin_enqueue_scripts', 'conditional_checkout_field_script_styles' );