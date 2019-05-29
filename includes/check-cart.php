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

	$pid = cwcf_get_product_id();

	$check_in_cart = conditional_product_in_cart($pid);

	if ( 'select' == cwcf_get_field_type() ) {
		$options = explode( "\n", cwcf_get_select_field_options() );
		$select = array();
		foreach ( $options as $option ) {
			$select[$option] = $option;
		}
	}

	switch ( cwcf_required_field() ) {
		case 'yes':
			$required = true;
			break;

		case 'no':
			$required = false;
			break;

		default:
			$required = null;
			break;
	}

	// Check if the product is in the cart and show the custom fields if it is
	if ($check_in_cart == true ) {
		echo '<div id="conditional_checkout_field">';
		echo '<h3>'. cwcf_conditional_field_title() .'</h3>';
		woocommerce_form_field( 'conditional_field', array(
		'type'			=> cwcf_get_field_type(),
		'label'			=> cwcf_get_field_label(),
		'placeholder'	=> ( in_array( cwcf_get_field_type(), array( 'text', 'textarea' ) ) ) ? cwcf_get_field_placeholder() : null,
		'class'			=> array( cwcf_get_field_class() ),
		'required'		=> $required,
		'options'		=> ( 'select' == cwcf_get_field_type() ) ? $select : null
		), $checkout->get_value( 'conditional_field' ));

		echo '</div>';
	}
}