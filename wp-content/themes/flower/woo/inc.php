<?php 

require_once __DIR__ .'/woocommerce_single_product_summary.php';

add_action('after_setup_theme','init_custom_woo');
function init_custom_woo(){
    require_once __DIR__ .'/custom_checkout_form.php';
}


