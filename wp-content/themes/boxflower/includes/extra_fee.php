<?php 



/**
 *No.3 
 **/
function box_add_to_cart_validation( $passed, $product_id, $quantity, $variation_id = null ) {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // die('1111');
    if( isset($_POST['is_buy_now']) && (int) $_POST['is_buy_now'] > 0 ) return $passed;

    if ( empty( $_POST['delivery_date'] ) ) {
        $passed = false;
        wc_add_notice( __( 'Vui lòng chọn ngày giao hàng.', 'webkul' ), 'error' );
    }
    if( isset($_POST['bundles'] ) && !empty($_POST['bundles'] ) ){
        foreach( $_POST['bundles'] as $id ) {
            wc()->cart->add_to_cart( $id );
        }
    }
     

    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'box_add_to_cart_validation', 99, 4 );



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
            'key'   => __( 'Giao hàng', 'webkul' ),
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
            __( 'Giao hàng', 'webkul' ),
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


function box_add_bundles_fee($return, $cart_item, $cart_item_key){
    $return = 113;
    return $return;
}
// add_filter( 'woocommerce_cart_item_subtotal','box_add_bundles_fee', 10 ,3 ); 

function box_add_bundles_fee_to_cart($product_subtotal, $product, $quantity, $object){
    $product_subtotal = 123;
    return $product_subtotal;
}
// add_filter('woocommerce_cart_product_subtotal','box_add_bundles_fee_to_cart', 999, 4);