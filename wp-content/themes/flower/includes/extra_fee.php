<?php 

// function action_woocommerce_cart_calculate_fees( $cart ) {
//     if ( is_admin() && ! defined( 'DOING_AJAX' ) )
//         return;

//     // Settings
//     $settings = array(
//         array(
//             'product_id' => 30,
//             'amount'     => 5,
//             'name'       => __( 'Additional service fee', 'woocommerce' ),
//         ),
//         array(
//             'product_id' => 813,
//             'amount'     => 10,
//             'name'       => __( 'Packing fee', 'woocommerce' ),
//         ),
//         array(
//             'product_id' => 815,
//             'amount'     => 3,
//             'name'       => __( 'Another fee', 'woocommerce' ),
//         ),
//     );
    
//     // Loop through cart contents
//     foreach ( $cart->get_cart_contents() as $cart_item ) {      
//         // Get product id
//         $product_id = $cart_item['product_id'];
        
//         // Loop trough settings array
//         foreach ( $settings as $setting ) {
//             // Search for the product ID
//             if ( $setting['product_id'] == $product_id ) {
//                 // Add fee
//                 $cart->add_fee( $setting['name'], $setting['amount'], false );
//             }
//         }       
//     }
// }
// add_action( 'woocommerce_cart_calculate_fees', 'action_woocommerce_cart_calculate_fees', 10, 1 );

// add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );

// function add_custom_price( $cart_object ) {
//     $custom_price = 11; // This will be your custom price  
//     foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
//         $cart_item['data']->set_price($custom_price);   
//     }
// }



/**
 *No.3 
 **/
function box_add_to_cart_validation( $passed, $product_id, $quantity, $variation_id = null ) {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // die();
    // if ( empty( $_POST['custom-field'] ) ) {
    //     $passed = false;
    //     wc_add_notice( __( 'Quote is a required field.', 'webkul' ), 'error' );
    // }
    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'box_add_to_cart_validation', 10, 4 );



/**
 * No.4
 * Add custom cart item data
 */
function box_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
    if ( isset( $_POST['custom-field'] ) ) {
        $cart_item_data['pr_field'] = sanitize_text_field( $_POST['custom-field'] );
    }
    if ( isset( $_POST['delivery_date'] ) ) {
        $cart_item_data['delivery_date'] = sanitize_text_field( $_POST['delivery_date'] );
    }
     if ( isset( $_POST['bundles'] ) ) {
        $cart_item_data['bundles'] =  implode(",",$_POST['bundles'] );
    }
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'box_add_cart_item_data', 10, 3 );



/**
 * Display custom item data in the cart
 */
function box_get_item_data( $item_data, $cart_item_data ) {
    if ( isset( $cart_item_data['pr_field'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Quote', 'webkul' ),
            'value' => wc_clean( $cart_item_data['pr_field'] ),
        );
    }

     if ( isset( $cart_item_data['delivery_date'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Delivery Date', 'webkul' ),
            'value' => wc_clean( $cart_item_data['delivery_date'] ),
        );
    }
     if ( isset( $cart_item_data['bundles'] ) ) {
        $item_data[] = array(
            'key'   => __( 'bundles', 'webkul' ),
            'value' => wc_clean( $cart_item_data['bundles'] ),
        );
    }

    
    return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'box_get_item_data', 10, 2 );




/**
 * Add custom meta to order
 */
function box_checkout_create_order_line_item( $item, $cart_item_key, $values, $order ) {
    if ( isset( $values['pr_field'] ) ) {
        $item->add_meta_data(
            __( 'Quote', 'webkul' ),
            $values['pr_field'],
            true
        );
    }
    if ( isset( $values['delivery_date'] ) ) {
        $item->add_meta_data(
            __( 'Delivery date', 'webkul' ),
            $values['delivery_date'],
            true
        );
    }
    if ( isset( $values['bundles'] ) ) {
        $item->add_meta_data(
            __( 'bundles', 'webkul' ),
            $values['bundles'],
            true
        );
    }
}
add_action( 'woocommerce_checkout_create_order_line_item', 'box_checkout_create_order_line_item', 10, 4 );