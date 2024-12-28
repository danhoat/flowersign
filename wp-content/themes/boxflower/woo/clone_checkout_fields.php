<?php
function storefront_child_remove_checkout_fields($fields) {
    unset( $fields ['billing'] ['billing_postcode'] );
    unset( $fields ['billing'] ['billing_company'] );
    unset( $fields ['billing'] ['billing_first_name'] );
    $fields['billing']['billing_last_name'] = array(
        'label' => __('Họ và tên', 'devvn'),
        'placeholder' => _x('Nhập đầy đủ họ và tên của bạn', 'placeholder', 'devvn'),
        'required' => true,
        'class' => array('form-row-wide'),
        'clear' => true
    );
    // $fields['billing']['billing_address_1'] = array(
    //     'label' => __('Địa chỉ người đặt hàng', 'devvn'),
    //     'placeholder' => _x('Nhập địa chỉ', 'placeholder', 'devvn'),
    //     'required' => true,
    //     'class' => array('form-row-wide'),
    //     'clear' => true
    // );
    return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'storefront_child_remove_checkout_fields' );

/**
* Add the field to the checkout
**/

add_filter( 'woocommerce_billing_fields', 'custom_woocommerce_billing_fields' );

function custom_woocommerce_billing_fields($fields)
{
    $fields['billing_message'] = array(
        'label' => __('Thêm lời nhắn bạn muốn thể hiện trên món quà', 'devvn'),
        'type'          => 'textarea',
        'required'  => false,
        'class' => array('form-row-wide'),
    );
    $fields['billing_timeline'] = array(
        'label' => __('Thời gian mong muốn khách hàng yêu cầu', 'devvn'),
        'type'          => 'text',
        'required'  => false,
        'class' => array('form-row-wide'),
    );

    $fields['billing_options'] = array(
        'type'          => 'checkbox',
        'label'         => __('Tick chọn nếu Địa chỉ giao hàng và thanh toán của tôi đều giống nhau'),
        'required'  => true,
        'class' => array('form-row-wide'),
    );

    return $fields;
}

/**
 * @author danng
 **/


function show_custom_checkout_fields_be($order){
    // show thong tin vao don hang.
    echo '<div class="custom_meta">';

    echo '<p><span style="font-weight: bold;">Thông điệp: </span>'.$order->billing_message.'</p>';
    echo '<p><span  style="font-weight: bold;">Thời gian mong muốn : </span>'.$order->billing_timeline.'</p>';
    echo '</div>';
}
add_action('woocommerce_admin_order_data_after_shipping_address','show_custom_checkout_fields_be');
function wooc_extra_register_fields() {?>
 <p class="form-row form-row-wide">
 <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
 <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
 </p>
 <p class="form-row form-row-first">
 <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
 <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
 </p>
 <p class="form-row form-row-last">
 <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
 <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
 </p>
 <div class="clear"></div>
 <?php
 }
 add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );


 if ( ! function_exists( 'inspiry_ajax_register' ) ) :
    /**
     * AJAX register request handler
     */
    function inspiry_ajax_register() {

        // First check the nonce, if it fails the function will break
        check_ajax_referer( 'inspiry-ajax-register-nonce', 'inspiry-secure-register' );

        // Nonce is checked, Get to work
        $info = array();
        $info[ 'user_nicename' ] = $info[ 'nickname' ] = $info[ 'display_name' ] = $info[ 'first_name' ] = $info[ 'user_login' ] = sanitize_user( $_POST[ 'register_username' ] );
        $info[ 'user_pass' ] = wp_generate_password( 12 );
        $info[ 'user_email' ] = sanitize_email( $_POST[ 'register_email' ] );
        // Register the user
        $user_register = wp_insert_user( $info );

        if ( is_wp_error( $user_register ) ) {

            $error = $user_register->get_error_codes();
            // print_r($error) ;
            if ( in_array( 'empty_user_login', $error ) ) {
                echo json_encode( array(
                    'success' => false,
                    'message' => __( $user_register->get_error_message( 'empty_user_login' ) )
                ) );
            } elseif ( in_array( 'existing_user_login', $error ) ) {
                echo json_encode( array(
                    'success' => false,
                    'message' => __( 'This username already exists.', 'framework' )
                ) );
            } elseif ( in_array( 'existing_user_email', $error ) ) {
                echo json_encode( array(
                    'success' => false,
                    'message' => __( 'This email is already registered.', 'framework' )
                ) );
            } else {
                echo json_encode( array(
                    'success' => false,
                    'message' => $user_register->get_error_message()
                ) );
            }

        } else {

            // Send email notification to newly registered user and admin
            inspiry_new_user_notification( $user_register, $info[ 'user_pass' ] );

            echo json_encode( array(
                'success' => true,
                'message' => __( 'Registration is complete. Check your email for details!', 'framework' ),
            ) );

        }

        die();
    }

    // Enable the user with no privileges to request ajax register
    add_action( 'wp_ajax_nopriv_inspiry_ajax_register', 'inspiry_ajax_register' );

endif;

