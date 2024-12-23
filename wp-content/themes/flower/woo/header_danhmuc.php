<?php 

// woocommerce_taxonomy_archive_description
function woocommerce_taxonomy_archive_description(){

}

function woocommerce_product_archive_description() {

    if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {

        ?>
        <h1 class="woocommerce-products-header__title page-title line266">
            <?php
                woocommerce_page_title();
            ?>
        </h1>

        <?php
        $term = get_queried_object();


        if ( $term ) {


            $term_id  = $term->term_id;

            $thumbnail_id = get_term_meta( $term_id, CAT_BANNER_IMG_ID, true );
        
            if($thumbnail_id){
                $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                echo '<img src="' . $image[0] . '" alt="" />'; 
            }

            /**
             * Filters the archive's raw description on taxonomy archives.
             *
             * @since 6.7.0
             *
             * @param string  $term_description Raw description text.
             * @param WP_Term $term             Term object for this taxonomy archive.
             */
            $term_description = apply_filters( 'woocommerce_taxonomy_archive_description_raw', $term->description, $term );
            $overview = explode("[xem_them]", $term_description);

            if ( ! empty( $overview[0] ) ) {
                $btn_xemthem = '<span class="btn-view-full"> Xem thêm ...</a>';
                $btn_thugon = '<span class="btn-view-less">Thu gọn </a>';
                $the_last = '';
                if(isset($overview[1])){
                    $the_last = '<div class="toggle">'.$overview[1].$btn_thugon.'<span>';
                }

                echo '<div class="term-description "> ' . wc_format_content( wp_kses_post( $overview[0].$btn_xemthem ) ).$the_last.'</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }


        

    }
}

//add_action('woocommerce_archive_description','box_show_cat_image');
function box_move_title_to_theme($check){
    if( is_product_taxonomy() || is_singular('product') ) return false;
    return true;

}
add_filter('woocommerce_show_page_title', 'box_move_title_to_theme');
function box_add_js_cat(){ ?>

    <script type="text/javascript">
        (function($){
            console.log('init cat1');
            $(document).ready(function(){
                console.log('init cat2');
                $(".btn-view-full").click(function(){
                    console.log('show full');

                    $('.term-description').toggleClass('full');
                })
            });
            $(".btn-view-less").click(function(){
                console.log('toggle full');
                $('.term-description').toggleClass('full');
            });

        }(jQuery));

    </script>
<?php    
}
add_action('wp_footer','box_add_js_cat');