<?php



add_action( 'wp_ajax_box_get_best_sale', 'box_get_best_sale' );
add_action( 'wp_ajax_nopriv_box_get_best_sale', 'box_get_best_sale' );
function box_get_best_sale() {
 
    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $website = (isset($_POST['website']))?esc_attr($_POST['website']) : '';

    

    $top_selling_products = wc_get_products( array(
        'meta_key'          => 'total_sales', // our custom query meta_key
        'posts_per_page'    => 6,
        'post__not_in'      => LIST_BUNDLES_ITEM,
        'return'            => 'ids', // needed to pass to $post_object
        'orderby'   => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ), // order from highest to lowest of top sellers
    ) );
   

    ob_start();
      
    if ( $top_selling_products ) {
         
            foreach ( $top_selling_products as $top_selling_product ) {
                $post_object = get_post( $top_selling_product );
                setup_postdata( $GLOBALS['post'] =& $post_object );
                wc_get_template_part( 'content', 'product' );

            }
            wp_reset_postdata();
           
    }
    $html = ob_get_clean();

    $res = array('success' => true,'html' => $html);

    wp_send_json($res);
 
    die();//bắt buộc phải có khi kết thúc
}