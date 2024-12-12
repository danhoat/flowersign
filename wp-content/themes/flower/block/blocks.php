<?php 


// WC_Product_Query();
// wc_get_products();



function box_block_best_selling() {

    $top_selling_products = wc_get_products( array(
            'meta_key' => 'total_sales', // our custom query meta_key
            'return'   => 'ids', // needed to pass to $post_object
            'orderby'  => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ), // order from highest to lowest of top sellers
        ) );
        ?>
        <div class="woocommerce bestselling arow">
            <h2 class="home-label h-heading">  Bán chạy nhất  </h2>
            <?php if ( $top_selling_products ) {

                echo '<ul class="products cls-5">';
                foreach ( $top_selling_products as $top_selling_product ) {
                    $post_object = get_post( $top_selling_product );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    wc_get_template_part( 'content', 'product' );

                }
                wp_reset_postdata();

                echo '</ul>';  
            } ?>
        </div>
    <?php
}
function block_products_by_category($slug = '', $label = ''){


    $args = array(
        'category' => array( $slug ),
        'return'   => 'ids', // needed to pass to $post_object
    );


    $top_selling_products = wc_get_products( $args );
    wp_reset_postdata();

    ?>
    <div class="woocommerce bestselling arow">
        <h2 class="home-label h-heading"><?php echo $label;?></h2>
        
        <?php if ( $top_selling_products ) { ?>

            <ul class="products cls-5">
            <?php foreach ( $top_selling_products as $top_selling_product ) { ?>
                    <?php

                    $post_object = get_post( $top_selling_product );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    wc_get_template_part( 'content', 'product' );
                    ?>

            <?php } ?>
            <?php wp_reset_postdata(); ?>
            </ul>
        <?php } else { ?>
            <?php _e('No post found in  cat '.$slug,'box');?>
        <?php } ?>
    </div>
    <?php


   }
?>
