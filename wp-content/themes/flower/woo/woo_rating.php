<?php

// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');
function box_change_view_rating($html, $rating, $count ){
    if( is_singular('product') ) return $html.'<span class="rate-score">'.$rating.'</span>';

    global $product;
    if($product){
        $count = $product->get_review_count();
    }
    if($count <1 ) return ;
    $html = '<div class="rating"><i class="fa fa-star text-yellow-400 p-star"></i><span class="mx-1">'.number_format($rating,1).'</span><span>('.$count.')</span></div>';
    return $html;
}
add_filter('woocommerce_product_get_rating_html','box_change_view_rating',10,3);

// //remove_filter('woocommerce_after_shop_loop_item_title','');

// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

// add_action('woocommerce_after_shop_loop_item','woocommerce_template_single_rating', 40);


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );

function open_div_wrap(){
    if( is_singular('product') ) return ;
    echo '<div class="wrap-price-rating text-xs p-rating flex  justify-between text-xs mt-1">';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'open_div_wrap',9 );
function close_div_wrap(){
    if( is_singular('product') ) return ;
    echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'close_div_wrap', 16 );



remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );