<?php
add_action('init','box_check_and_disable_breadcrumb_in_single_product');
function box_check_and_disable_breadcrumb_in_single_product(){
    if( is_singular('product') ){
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    }
}
