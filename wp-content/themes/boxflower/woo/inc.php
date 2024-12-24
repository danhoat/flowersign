<?php 

require_once __DIR__ .'/woocommerce_single_product_summary.php';
require_once __DIR__ .'/header_danhmuc.php';

require_once __DIR__ .'/be.php';
require_once __DIR__ .'/woo_rating.php';
require_once __DIR__ .'/btn_mua_ngay.php';
require_once __DIR__ .'/add_tabs.php';

require_once __DIR__ .'/payment/paypal_vnd.php';


// require_once __DIR__ .'/custom_checkout_form.php';



function box_reorder_fields($fields){

    // echo '<pre>';
    // var_dump($fields);
    // echo '</pre>';

    return $fields;

}
add_filter('woocommerce_checkout_fields','box_reorder_fields');