<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
* Check to see what is in the cart
*
* @param $product_id
*
* @return bool
*/
function conditional_product_in_cart( $product_id ) {
	global $woocommerce;

	$check_in_cart = false;

	foreach ( $woocommerce->cart->get_cart() as $cart_item ) {
		if ( $cart_item['product_id'] == $product_id ) {
			return true;
		}
	}
	return $check_in_cart;
}

/*
*  Set Custom Field
*  Hook into checkout form
*/
add_action( 'woocommerce_after_order_notes', 'conditional_checkout_field' );

function conditional_checkout_field( $checkout ) {

	$pid = get_option('oizuled_conditional_fields_pid');

	$check_in_cart = conditional_product_in_cart($pid);

	if (get_option('oizuled_conditional_fields_type') == 'select') {
		$options = explode("\n", get_option('oizuled_conditional_fields_options'));
		$select = array();
		foreach ($options as $option) {
			$select[$option] = $option;
		}
	}

	$required = null;
	if (get_option('oizuled_conditional_fields_required') == 'yes') {
		$required = true;
	}
	if (get_option('oizuled_conditional_fields_required') == 'no') {
		$required = false;
	}

	// Check if the product is in the cart and show the custom fields if it is
	if ($check_in_cart == true ) {
		echo '<div id="conditional_checkout_field">';
		echo '<h3>'.get_option('oizuled_conditional_fields_title').'</h3>';
		woocommerce_form_field( 'conditional_field', array(
		'type'          => get_option('oizuled_conditional_fields_type'),
		'label'         => get_option('oizuled_conditional_fields_label'),
		'placeholder'   => (in_array(get_option('oizuled_conditional_fields_type'), array('text', 'textarea'))) ? get_option('oizuled_conditional_fields_placeholder') : null,
		'class'         => array(get_option('oizuled_conditional_fields_class')),
		'required'      => $required,
		'options'		=> (get_option('oizuled_conditional_fields_type') == 'select') ? $select : null
		), $checkout->get_value( 'conditional_field' ));

		echo '</div>';
	}
}