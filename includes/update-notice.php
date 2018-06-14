<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function cwcf_update_notice() {
	$url = 'https://conditionalcheckoutfields.com/downloads/conditional-woo-checkout-field-pro/';
	$link = sprintf( wp_kses( __( '<a href="%s">Click here</a> to upgrade Conditional Checkout Field to Pro! Get an unlimited number of checkout fields, duplicate checkout fields based on product quantity in the customer\'s cart, and more!', 'conditional-woo-checkout-field' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
    ?>
    <div class="notice notice-info cwcfp-update-notice is-dismissible">
        <p><?php echo $link; ?></p>
    </div>
    <?php
}
/* Change to true */
if ( false == defined( 'CWCFP_PLUGIN' ) && empty( get_option( 'cwcfp-update-notice-dismissed' ) ) ){
	add_action( 'admin_notices', 'cwcf_update_notice' );
}

add_action( 'admin_enqueue_scripts', 'cwcf_update_notice_assets' );

function cwcf_update_notice_assets() {
	wp_enqueue_script( 'cwcfp-notice-update', CWCF_PLUGIN_URL . '/includes/js/notice-update.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'cwcf-notice-review', CWCF_PLUGIN_URL . '/includes/js/notice-review.js', array( 'jquery' ), '1.0', true );
}

add_action( 'wp_ajax_cwcfp_dismiss_notice', 'cwcfp_dismiss_notice' );

function cwcfp_dismiss_notice(){
	update_option( 'cwcfp-update-notice-dismissed', '1' );
}

function cwcf_review_notice() {
	$url = 'https://wordpress.org/support/plugin/conditional-woo-checkout-field/reviews/#new-post';
	$link = sprintf( wp_kses( __( 'Could we ask for a 5 star review of Conditional Checkout Field? It would be greatly appreciated! <a href="%s">Click here</a> to leave a review.', 'conditional-woo-checkout-field' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
    ?>
    <div class="notice notice-info cwcf-review-notice is-dismissible">
        <p><?php echo $link; ?></p>
    </div>
    <?php
}
/* Change to true */
if ( false == defined( 'CWCFP_PLUGIN' ) && empty( get_option( 'cwcf-review-notice-dismissed' ) && !empty( get_option( 'cwcfp-update-notice-dismissed' ) ) ) ){
	add_action( 'admin_notices', 'cwcf_review_notice' );
}

add_action( 'wp_ajax_cwcf_review_dismiss_notice', 'cwcf_review_dismiss_notice' );

function cwcf_review_dismiss_notice(){
	update_option( 'cwcf-review-notice-dismissed', '1' );
}