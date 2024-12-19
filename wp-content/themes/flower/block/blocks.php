<?php 


// WC_Product_Query();
// wc_get_products();



function box_block_best_selling() {

    $top_selling_products = wc_get_products( array(
        'meta_key' => 'total_sales', // our custom query meta_key
        'posts_per_page' => 10,
        'return'   => 'ids', // needed to pass to $post_object
        'orderby'  => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ), // order from highest to lowest of top sellers
    ) );

    $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
    ?>
    <div class="woocommerce bestselling arow">

        <div class="full flex  line-heading justify-between">
            <a class="#" href="" class="h2heading">
                <h2 class="home-label h-heading"> Bán chạy nhất</h2>
            </a>
            <a class="link-collection" href="<?php echo $shop_page_url;?>">Thêm nhiều lựa chọn</a>
        </div>

      
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
        'posts_per_page' => 10,
        'return'   => 'ids', // needed to pass to $post_object
    );
    $term_link = get_term_link($slug, 'product_cat');
    if(is_wp_error($term_link)) return;
    $products = wc_get_products( $args );
    ?>
    <div class="woocommerce bestselling arow">
        <div class="full flex  line-heading justify-between">
            <a class="#" href="" class="h2heading">
                <h2 class="home-label h-heading"><?php echo $label;?></h2>
            </a>
            <a class="link-collection" href="<?php echo $term_link;?>">Thêm nhiều lựa chọn</a>
        </div>
        
        <?php if ( $products ) { ?>

            <ul class="products cls-5">
            <?php foreach ( $products as $product ) { ?>
                    <?php

                    $post_object = get_post( $product );
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
<?php } ?>

<?php

function block_image_vs_button($heading = '', $bg_img = ''){
    
    if(empty($bg_img) ){
        $bg_img = 'http://localhost/flower/wp-content/uploads/2024/11/bg_magazine_banner.jpg';
    }
    ?>
    <div class="image-box  arow">
        <div class="innner-box" style="background-image: url('<?php echo $bg_img;?>'); background-repeat:  no-repeat;">
            <h3 class="box-heading"><?php echo $heading;?></h2>
            <a href="#" class="btn btn-box-detail"> Xem chi tiết </a>
        </div>
    </div>
<?php }?>
