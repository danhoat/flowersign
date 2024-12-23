<?php

/**
 * Add some fields in the checkout form and remvoe some fields no need 
 * **/
function custom_override_checkout_fields( $fields )   {
    unset($fields['billing']['billing_country']);
    return $fields;
}
add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');

// add_filter( 'woocommerce_shipping_calculator_enable_country', '__return_false' );
// add_filter( 'woocommerce_shipping_calculator_enable_city', '__return_false' );
// add_filter( 'woocommerce_shipping_calculator_enable_state', '__return_false' );
// add_filter( 'woocommerce_shipping_calculator_enable_country','__return_false');



add_filter('woocommerce_shipping_instance_form_fields_flat_rate', 'ts_add_extra_fields_in_flat_rate', 10, 1);
function ts_add_extra_fields_in_flat_rate($settings)
{
    $new_settings = $settings;
    $new_settings['shipping_extra_field'] = array(
        'title'       => __('Note', 'woocommerce'),
        'type'        => 'text',
        'placeholder' => 'shipping',
        'description' => '',
        'default'     => '', // Add a default value here
    );
    return $new_settings;
}
function ts_display_shipping_extra_field_content() {
    // Retrieve the shipping method selected by the user
    $chosen_shipping_method = WC()->session->get('chosen_shipping_methods')[0];
    // Check if the shipping method has a corresponding custom field value
    $shipping_extra_field_content = get_post_meta(WC()->session->get('order_id'), '_' . $chosen_shipping_method . '_shipping_extra_field', true);
    // If the custom field value is empty or 'N/A', set a static value
    if (empty($shipping_extra_field_content) || $shipping_extra_field_content == 'N/A') {
        $shipping_extra_field_content = 'Your order is estimated to be shipped in 1 day.';
    }
    // Display the content
    echo '<tr class="shipping-extra-field">';
    echo '<th>Note:</th>';
    echo '<td>' . esc_html($shipping_extra_field_content) . '</td>';
    echo '</tr>';
}
add_action('woocommerce_review_order_after_shipping', 'ts_display_shipping_extra_field_content');



// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fieldss' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fieldss( $fields ) {
    $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
    $fields['order']['order_comments']['label']       = 'My new label';
    return $fields;
}

add_filter( 'woocommerce_shipping_fields', 'misha_remove_fields' );
function misha_remove_fields( $fields ) {
    unset( $fields[ 'shipping_last_name' ][ 'required' ] );
    return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields2' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields2( $fields ) {
     $fields['shipping']['shipping_phone'] = array(
        'label'       => __( 'Phone 111', 'woocommerce' ),
        'placeholder' => _x( 'Phone 222', 'placeholder', 'woocommerce' ),
        'required'    => false,
        'class'       => array( 'form-row-wide' ),
        'clear'       => true
     );

     return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_fields_woocommerce' );
 
function custom_fields_woocommerce( $fields ) {
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'woocommerce_checkout_field_editor' );
// Our hooked in function - $fields is passed via the filter!
function woocommerce_checkout_field_editor( $fields ) {
    $fields['shipping']['shipping_field_value'] = array(
        'label'     => __('Field Value', 'woocommerce'),
        'placeholder'   => _x('Field Value', 'placeholder', 'woocommerce'),
        'required'  => true
    );
    return $fields;
}


add_filter( 'woocommerce_default_address_fields', 'custom_override_address_fields', 999, 1 );
function custom_override_address_fields( $address_fields ) {

    // set as not required
    $address_fields['postcode']['required'] = false;

    // remove validation
    unset( $address_fields['postcode']['validate'] );

    return $address_fields;
}

add_filter( 'woocommerce_checkout_fields' , 'bbloomer_alternative_override_postcode_validation' );
 
function bbloomer_alternative_override_postcode_validation( $fields ) {
$fields['billing']['billing_postcode']['required'] = false;
$fields['shipping']['shipping_postcode']['required'] = false;
return $fields;
}


add_filter( 'woocommerce_default_address_fields' , 'bbloomer_override_postcode_validation' );
 
function bbloomer_override_postcode_validation( $address_fields ) {
  $address_fields['postcode']['required'] = false;
  return $address_fields;
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields1' , 999);

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields1( $fields ) {
    $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
    return $fields;
}

?>