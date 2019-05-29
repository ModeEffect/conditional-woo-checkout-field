<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap">
	<div class="postbox">
		<h2><?php _e('Conditional Checkout Field', 'conditional-woo-checkout-field'); ?></h2>
		<p><?php _e('Enter in the details for a field to be displayed at checkout provided a certain product is in the cart.', 'conditional-woo-checkout-field'); ?></p>
		<form method='post' action='options.php'>
			<?php wp_nonce_field( 'update-options' ); ?>
			<?php settings_fields( 'oizuled_conditional_fields_option-group' ); ?>
			<table class="wp-list-table widefat fixed posts">
				<thead>
					<tr>
						<th scope="col" id="oizuled_conditional_fields_pid" class="manage-column"><?php _e('Product ID', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_title" class="manage-column"><?php _e('Title', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_type" class="manage-column"><?php _e('Input Type', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_label" class="manage-column"><?php _e('Field Label', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_placeholder" class="manage-column"><?php _e('Placeholder Text', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_class" class="manage-column"><?php _e('Class', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_required" class="manage-column"><?php _e('Required Field?', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_requiredtext" class="manage-column"><?php _e('Error Message', 'conditional-woo-checkout-field'); ?></th>
						<th scope="col" id="oizuled_conditional_fields_addemail" class="manage-column"><?php _e('Add to Order Email/Invoice?', 'conditional-woo-checkout-field'); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" name="oizuled_conditional_fields_pid" size="4" value="<?php echo cwcf_get_product_id(); ?>" /></td>
						<td><input type="text" name="oizuled_conditional_fields_title" size="10" value="<?php echo cwcf_conditional_field_title(); ?>" /></td>
						<td>
							<select name="oizuled_conditional_fields_type">
								<option value="text" <?php selected( cwcf_get_field_type(), 'text' ); ?>><?php _e('Text Box', 'conditional-woo-checkout-field'); ?></option>
								<option value="textarea" <?php selected( cwcf_get_field_type(), 'textarea' ); ?>><?php _e('Text Area', 'conditional-woo-checkout-field'); ?></option>
								<option value="select" <?php selected( cwcf_get_field_type(), 'select' ); ?>><?php _e('Select Menu', 'conditional-woo-checkout-field'); ?></option>
							</select>
								<hr />
								<?php _e('Select Options', 'conditional-woo-checkout-field'); ?><br />
								<textarea name="oizuled_conditional_fields_options" rows="3" cols="15"><?php echo cwcf_get_select_field_options(); ?></textarea>
						</td>
						<td><input type="text" name="oizuled_conditional_fields_label" size="10" value="<?php echo cwcf_get_field_label(); ?>" /></td>
						<td><input type="text" name="oizuled_conditional_fields_placeholder" size="10" value="<?php echo cwcf_get_field_placeholder(); ?>" /></td>
						<td><input type="text" name="oizuled_conditional_fields_class" size="10" value="<?php echo cwcf_get_field_class(); ?>" /></td>
						<td>
							<input type="radio" name="oizuled_conditional_fields_required" value="yes" <?php checked( cwcf_required_field(), 'yes' ); ?> /> <?php _e('Yes', 'conditional-woo-checkout-field'); ?><br />
							<input type="radio" name="oizuled_conditional_fields_required" value="no" <?php checked( cwcf_required_field(), 'no' ); ?> /> <?php _e('No', 'conditional-woo-checkout-field'); ?>
						</td>
						<td><input type="text" name="oizuled_conditional_fields_requiredtext" size="10" value="<?php echo cwcf_required_error_text(); ?>" /></td>
						<td>
							<input type="checkbox" name="oizuled_conditional_fields_addemail" value="yes" <?php checked( cwcf_add_email(), 'yes' ); ?> /> <?php _e('Order Email', 'conditional-woo-checkout-field'); ?><br />
							<input type="checkbox" name="oizuled_conditional_fields_addinvoice" value="yes" <?php checked( cwcf_add_invoice(), 'yes' ); ?> /> <?php _e('Order Invoice', 'conditional-woo-checkout-field'); ?>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="8"><input type="hidden" name="action" value="update" /><?php submit_button(); ?></td>
						<td><a href="https://wordpress.org/support/plugin/conditional-woo-checkout-field/reviews/#new-post"><?php _e('Enjoy this plugin? Give it a 5 star rating.', 'conditional-woo-checkout-field'); ?></a></td>
					</tr>
					<tr>
						<th colspan="2"><?php _e( 'Upgrade to Pro!', 'conditional-woo-checkout-field' ); ?></th>
						<th colspan="4">
							<?php _e( 'Upgrade to have unlimited conditional fields, and make each field display for any number of products.', 'conditional-woo-checkout-field' ); ?><br />
							<?php _e( 'Bonus - Pro version comes with an editor for the default checkout fields. Choose whether to make a field required, hide it, and more.', 'conditional-woo-checkout-field' ); ?><br />
							<a href="https://conditionalcheckoutfields.com/downloads/conditional-woo-checkout-field-pro/" target="_blank" class="cwcfp-upgrade"><?php _e( 'Upgrade Now!', 'conditional-woo-checkout-field' ); ?></a>
						</th>
						<th colspan="3"></th>
					</tr>
				</tfoot>
			</table>
		</form>
		<a href="#" onclick="showDetails('help'); return false;"><?php _e('Show Help', 'conditional-woo-checkout-field'); ?></a>
		<a href="#" onclick="hideDetails('help'); return false;"><?php _e('Hide Help', 'conditional-woo-checkout-field'); ?></a>
		<span id="help" style="display:none">
			<p><strong><?php _e('How to use these fields:', 'conditional-woo-checkout-field'); ?></strong><br /><?php _e('All fields are required unless otherwise indicated below.', 'conditional-woo-checkout-field'); ?></p>
			<ul>
				<li><strong><?php _e('Product ID:', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li>
							<?php
								$productURL = admin_url( 'edit.php?post_type=product' );
								$productLink = sprintf( wp_kses( __( 'This is the ID number of the product, which if it is in the cart, should trigger the custom field to display at checkout. You can get the ID number by viewing your <a href="%s">product admin page</a> and hovering your mouse over the product. The ID number will be displayed under the product name, next to the Edit links.', 'conditional-woo-checkout-field' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( $productURL ) );
								echo $productLink;
							?>
						</li>
					</ul>
				</li>
				<li><strong><?php _e('Title:', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li><?php _e('It is important that you do not change this after orders are made using this custom field. If changed, older orders may not show the customer\'s information entered into this field, as the script uses the "Title" name to lookup the value to be displayed. Changing this field would result in older orders not containing the correct "Title" that the script will use to pull the customer\'s information from. If it becomes necessary to change this title, and you wish to display the data along with the older orders, you can change the custom field\'s Name in each order to the new Title, and the information will continue to be displayed. Note, changing the title will not result in a loss of data, rather it will simply not display older data using an outdated field title.', 'conditional-woo-checkout-field'); ?></li>
					</ul>
				</li>
				<li><strong><?php _e('Input Type:', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li><?php _e('Identify what you would like the customer to use as the input field. Short responses, such as a name, date, etc. might only need a text box. Longer responses might need a text area. For a pre-defined list of choices, use Select, and enter the choices in the box below the Select option with one option on each line (hit enter on your keyboard after each option).', 'conditional-woo-checkout-field'); ?></li>
					</ul>
				</li>
				<li><strong><?php _e('Field Label (optional but recommended):', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li><?php _e('Use this to instruct the customer what to enter in the field. This is the text that is in between the Title and the input field. If the field is set to be required, a red asterisk (*) by default will show next to this label.', 'conditional-woo-checkout-field'); ?></li>
					</ul>
				</li>
				<li><strong><?php _e('Placeholder Text (optional):', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li><?php _e('Often times using placeholder text is a useful way to guide customers to enter information in the correct format. The information entered here will appear in the input field (if it is a text box or text area). It will look "greyed out" until the customer enters some information in the field.', 'conditional-woo-checkout-field'); ?></li>
					</ul>
				</li>
				<li><strong><?php _e('Class (optional):', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li><?php _e('If you wish to edit the CSS class of the input field, use this to enter the class.', 'conditional-woo-checkout-field'); ?></li>
					</ul>
				</li>
				<li><strong><?php _e('Required Field?:', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li><?php _e('Simply indicates whether or not the customer must enter information into the field. If required, a red asterisk will be placed immediately following the field label, and an error will be displayed if the customer leaves the field empty.', 'conditional-woo-checkout-field'); ?></li>
					</ul>
				</li>
				<li><strong><?php _e('Error Message (optional unless required field is set to Yes):', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li><?php _e('If the field is set to be required, this will be the error message displayed to the customer if they do not enter any information. Use this to give the customer information as to how to complete the field, such as "Please enter your customization text in the field below", etc. If you leave this error message blank and the customer does not fill out the required field, an error box will be displayed at the top of the page, but it will not give the customer any useful information on how to clear this error.', 'conditional-woo-checkout-field'); ?></li>
					</ul>
				</li>
				<li><strong><?php _e('Add to Order Email/Invoice:', 'conditional-woo-checkout-field'); ?></strong>
					<ul>
						<li>
							<?php
							$accountURL = get_permalink( get_option('woocommerce_myaccount_page_id') );
							$accountLink = sprintf( wp_kses( __( 'If you want the information the customer enters to be included in their order emails or order invoice check the appropriate boxes. The order invoice is found in the customers <a href="%s">My Account</a> page on your website.','conditional-woo-checkout-field' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( $accountURL ) );
							echo $accountLink;
							?>
						</li>
					</ul>
				</li>
			</ul>
		</span>
	</div>
</div>