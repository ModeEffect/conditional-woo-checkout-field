<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function cwcf_get_product_id(){
	return get_option( 'oizuled_conditional_fields_pid' );
}

function cwcf_required_field(){
	return get_option( 'oizuled_conditional_fields_required' );
}

function cwcf_required_error_text(){
	return get_option( 'oizuled_conditional_fields_requiredtext' );
}

function cwcf_conditional_field_title(){
	return get_option( 'oizuled_conditional_fields_title' );
}

function cwcf_add_email(){
	return get_option( 'oizuled_conditional_fields_addemail' );
}

function cwcf_add_invoice(){
	return get_option( 'oizuled_conditional_fields_addinvoice' );
}

function cwcf_get_field_type(){
	return get_option('oizuled_conditional_fields_type');
}

function cwcf_get_select_field_options(){
	return get_option('oizuled_conditional_fields_options');
}

function cwcf_get_field_label(){
	return get_option('oizuled_conditional_fields_label');
}

function cwcf_get_field_placeholder(){
	return get_option('oizuled_conditional_fields_placeholder');
}

function cwcf_get_field_class(){
	return get_option('oizuled_conditional_fields_class');
}