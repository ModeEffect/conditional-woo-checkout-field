<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'conditional_checkout_field_process');
 
function conditional_checkout_field_process() {
	$pid = get_option('oizuled_conditional_fields_pid');
	$check_in_cart = conditional_product_in_cart($pid);
    // Check if the field is required and set, if not then show an error message.
    if ( $check_in_cart == true && get_option('oizuled_conditional_fields_required') == 'yes' && !$_POST['conditional_field'] ) {
			wc_add_notice( __( get_option('oizuled_conditional_fields_requiredtext') ), 'error' );
	}
}

/**
 * Update the order meta with custom field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'conditional_checkout_field_update_order_meta' );
 
function conditional_checkout_field_update_order_meta( $order_id ) {
    if ( !empty( $_POST['conditional_field'] ) ) {
        update_post_meta( $order_id, get_option('oizuled_conditional_fields_title'), sanitize_text_field( $_POST['conditional_field'] ) );
    }
}

/**
 * Add the field to order emails
 **/
add_action( 'woocommerce_email_after_order_table', 'conditional_order_meta_keys', 15, 2 );

function conditional_order_meta_keys($order) {
	if (get_option('oizuled_conditional_fields_addemail') == 'yes') {
		if (get_post_meta( $order->id, get_option('oizuled_conditional_fields_title'), true )) {
			echo '<br /><strong>' . get_option('oizuled_conditional_fields_title') . ':</strong><br />' . get_post_meta( $order->id, get_option('oizuled_conditional_fields_title'), true );
		}
	}
}

/**
 * Add the field to the order details
 **/
add_action( 'woocommerce_order_details_after_order_table', 'conditional_order_details_invoice' );
function conditional_order_details_invoice($order) {
	if (get_option('oizuled_conditional_fields_addinvoice') == 'yes') {
		echo "<p><strong>" . get_option('oizuled_conditional_fields_title') . ":</strong><br />" . get_post_meta( $order->id, get_option('oizuled_conditional_fields_title'), true ) . "</p>";
	}
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'name_display_admin_order_meta', 10, 1 );
 
function name_display_admin_order_meta($order){
echo '<ul>';
    if (get_post_meta( $order->id, get_option('oizuled_conditional_fields_title'), true )) {
		echo '<li><strong>' . get_option('oizuled_conditional_fields_title') . ':</strong><br />' . get_post_meta( $order->id, get_option('oizuled_conditional_fields_title'), true ) . '</li>';
	}
echo '</ul>';
}