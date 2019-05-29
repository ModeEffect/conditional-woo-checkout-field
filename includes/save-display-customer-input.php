<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'conditional_checkout_field_process');

function conditional_checkout_field_process() {
	$pid = cwcf_get_product_id();
	$check_in_cart = conditional_product_in_cart($pid);
	// Check if the field is required and set, if not then show an error message.
	if ( true == $check_in_cart && 'yes' == cwcf_required_field() && !$_POST['conditional_field'] ) {
			wc_add_notice( cwcf_required_error_text(), 'error' );
	}
}

/**
 * Update the order meta with custom field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'conditional_checkout_field_update_order_meta' );

function conditional_checkout_field_update_order_meta( $order_id ) {
    if ( !empty( $_POST['conditional_field'] ) ) {
        update_post_meta( $order_id, cwcf_conditional_field_title(), sanitize_text_field( $_POST['conditional_field'] ) );
    }
}

/**
 * Add the field to order emails
 **/
add_action( 'woocommerce_email_after_order_table', 'conditional_order_meta_keys', 15, 2 );

function conditional_order_meta_keys($order) {
	if ( 'yes' == cwcf_add_email() ) {
		if ( get_post_meta( $order->get_id(), cwcf_conditional_field_title(), true ) ) {
			echo '<br /><strong>' . cwcf_conditional_field_title() . ':</strong><br />' . get_post_meta( $order->get_id(), cwcf_conditional_field_title(), true );
		}
	}
}

/**
 * Add the field to the order details
 **/
add_action( 'woocommerce_order_details_after_order_table', 'conditional_order_details_invoice' );
function conditional_order_details_invoice($order) {
	if ( 'yes' == cwcf_add_invoice() ) {
		echo "<p><strong>" . cwcf_conditional_field_title() . ":</strong><br />" . get_post_meta( $order->get_id(), cwcf_conditional_field_title(), true ) . "</p>";
	}
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'name_display_admin_order_meta', 10, 1 );

function name_display_admin_order_meta($order){
echo '<ul>';
	if ( get_post_meta( $order->get_id(), cwcf_conditional_field_title(), true ) ) {
		echo '<li><strong>' . cwcf_conditional_field_title() . ':</strong><br />' . get_post_meta( $order->get_id(), cwcf_conditional_field_title(), true ) . '</li>';
	}
echo '</ul>';
}