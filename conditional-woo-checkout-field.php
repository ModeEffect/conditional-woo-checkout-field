<?php
	/*
	Plugin Name: Conditional WooCommerce Checkout Field
	Plugin URI: https://conditionalcheckoutfields.com/
	Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=N2TYAV69U9CP4
	Description: Display a custom field at checkout in your WooCommerce store if a certain product is in the customer's cart.
	Requires at leas: 3.1.0
	Tested up to: 6.1.1
	Version: 1.2.3
	WC requires at least: 3.0.0
	WC tested up to: 7.5.0
	Author: AMP-MODE
	Author URI: https://amplifyplugins.com
	License: GPL2
	Text Domain: conditional-woo-checkout-field
	*/

	/*  Copyright 2014  Scott DeLuzio  (email : me (at) scottdeluzio.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wc_fields_action_links' );

function wc_fields_action_links( $links ) {
   $links[] = '<a href="https://conditionalcheckoutfields.com/downloads/conditional-woo-checkout-field-pro/" target="_blank">Upgrade to PRO</a>';
   return $links;
}

if ( ! defined( 'CWCF_PLUGIN' ) ) {
	define( 'CWCF_PLUGIN', __FILE__ );
}
if( ! defined( 'CWCF_PLUGIN_DIR' ) ) {
	define( 'CWCF_PLUGIN_DIR', dirname( __FILE__ ) );
}
if( ! defined( 'CWCF_PLUGIN_URL' ) ) {
	define( 'CWCF_PLUGIN_URL', plugins_url( '', __FILE__ ) );
}

/* Load Text Domain */

add_action('plugins_loaded', 'conditional_woo_checkout_field_plugin_init');
function conditional_woo_checkout_field_plugin_init() {
	load_plugin_textdomain( 'conditional-woo-checkout-field', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
}

/*
 * Includes for our Plugin
 */
include( CWCF_PLUGIN_DIR . '/includes/scripts-styles.php' );
include( CWCF_PLUGIN_DIR . '/includes/misc-functions.php' );
include( CWCF_PLUGIN_DIR . '/includes/check-cart.php' );
include( CWCF_PLUGIN_DIR . '/includes/settings.php' );
include( CWCF_PLUGIN_DIR . '/includes/save-display-customer-input.php' );
include( CWCF_PLUGIN_DIR . '/includes/update-notice.php' );
include( CWCF_PLUGIN_DIR . '/includes/upsell-metabox.php' );
