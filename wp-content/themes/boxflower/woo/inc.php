<?php 

require_once __DIR__ .'/woocommerce_single_product_summary.php';
require_once __DIR__ .'/header_danhmuc.php';

require_once __DIR__ .'/be.php';
require_once __DIR__ .'/woo_rating.php';
require_once __DIR__ .'/btn_mua_ngay.php';
require_once __DIR__ .'/add_tabs.php';
require_once __DIR__ .'/sumary.php';
require_once __DIR__ .'/remove_hook.php';




function woo_related_products_limit() {
  global $product;
    
    $args['posts_per_page'] = 6;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 5; // 4 related products
    $args['columns'] = 5; // arranged in 2 columns

    if(wp_is_mobile() ){
        $args['posts_per_page'] = 4; // 4 related products
        $args['columns'] = 4; // arranged in 2 columns 
    }
    return $args;
}

// require_once __DIR__ .'/payment/paypal_vnd.php';
 require_once __DIR__ .'/clone_checkout_fields.php';
// require_once __DIR__ .'/custom_checkout_form.php';

// function check_add_cart(){

//     $is_remove = isset($_REQUEST['remove_item']) ? $_REQUEST['remove_item'] : 0;
//     if($is_remove){
//       var_dump($is_remove);
//     }
  
// }

// add_action('wp_loaded','check_add_cart');