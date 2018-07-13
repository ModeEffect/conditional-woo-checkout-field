<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action( 'add_meta_boxes', 'cwcf_upsell_meta_boxes' );
function cwcf_upsell_meta_boxes(){
	// Products
	add_meta_box( 'cwcfp-upsell-products', __( 'Upgrade to Conditional Checkout Fields Pro!', 'conditional-woo-checkout-field' ), 'cwcf_show_meta_box', 'product', 'side', 'default' );
	// Orders
	foreach ( wc_get_order_types( 'order-meta-boxes' ) as $type ) {
		$order_type_object = get_post_type_object( $type );
		add_meta_box( 'cwcfp-upsell-orders', __( 'Upgrade to Conditional Checkout Fields Pro!', 'conditional-woo-checkout-field' ), 'cwcf_show_meta_box', $type, 'side', 'default' );
	}
}

function cwcf_show_meta_box( $post ) {
	switch ( $post->post_type ) {
		case 'shop_order':
			$display = __( 'Did you need to collect additional information for specific products in this order? With Conditional Checkout Fields, you can! ', 'conditional-woo-checkout-field' );
			break;

		case 'product':
			$display = __( 'Do you want customers to provide additional information for this product at checkout? With Conditional Checkout Fields, they can!', 'conditional-woo-checkout-field' );

		default:
			$display = __( 'Do you ever need to collect additional information from customers at checkout based on the products in their cart? With Conditional Checkout Fields, you can!', 'conditional-woo-checkout-field' );
			break;
	}
	$url	= 'https://conditionalcheckoutfields.com/downloads/conditional-woo-checkout-field-pro/?utm_source=lite-' . $post->post_type . '-metabox&utm_medium=upgrade-to-pro&utm_campaign=admin';

	echo '<div>' . $display . '</div>';
	echo '<div style="margin-top:10px;"><a target="_blank" class="button button-primary" href="' . $url . '">' . __( 'Get Conditional Checkout Fields Pro!', 'simple-full-screen-background-image' ) . '</a></div>';
}