<?php 

// woocommerce_taxonomy_archive_description
function woocommerce_taxonomy_archive_description(){

}

function woocommerce_product_archive_description() {

    if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {

        ?>
        <h1 class="woocommerce-products-header__title">
            <?php woocommerce_page_title(); ?>
        </h1>

        <?php
        $term = get_queried_object();


        if ( $term ) {


            $term_id  = $term->term_id;
            $thumbnail_id = get_term_meta( $term_id, CAT_BANNER_IMG_ID, true );
        
            if($thumbnail_id){
                $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                echo '<img class="cat-thumbnail" src="' . $image[0] . '" alt="'.$term->name.'" />'; 
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

            // if ( ! empty( $overview[0] ) ) {
            //     $btn_xemthem = '<span class="btn-view-full"> Xem thêm ...</a>';
            //     $btn_thugon = '<span class="btn-view-less">Thu gọn </a>';
            //     $the_last = '';
            //     if(isset($overview[1])){
            //         $the_last = '<div class="toggle">'.$overview[1].$btn_thugon.'<span>';
            //     }

            //   //  echo '<div class="term-description "> ' . wc_format_content( wp_kses_post( $overview[0].$btn_xemthem ) ).$the_last.'</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            // }
        }
    }
}
function woocommerce_product_cat_description(){
     if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {

        ?>
       

        <?php
        $term = get_queried_object();


        if ( $term ) {

            $term_id  = $term->term_id;

        
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
               
                
                $the_last = '';
                if( isset($overview[1]) && !empty($overview[1]) ){
                    $btn_xemthem = '<span class="btn-view-full 111"> Xem thêm ...</a>';
                    $btn_thugon = '<span class="btn-view-less">Thu gọn </a>';
                    $the_last = '<div class="toggle">'.$overview[1].$btn_thugon.'</div>';
                }
                echo '<div class = "container">';

                echo '<div class="term-description "> ' . wc_format_content( wp_kses_post( $overview[0].$btn_xemthem ) ).$the_last.'</div>  <!-- End term-description !-->'; 
                echo '</div> <!-- end container !-->';
            }
        }
    }
}
// add_action('woocommerce_after_main_content','woocommerce_product_cat_description');

//add_action('woocommerce_archive_description','box_show_cat_image');
function box_move_title_to_theme($check){
    if( is_product_taxonomy() || is_singular('product') ) return false;
    return true;

}
add_filter('woocommerce_show_page_title', 'box_move_title_to_theme');
function box_add_js_cat(){ ?>

    <script type="text/javascript">
        (function($){

    


            $(document).ready(function(){
            
                $(".btn-view-full").click(function(){
          
                    $('.term-description').toggleClass('full');
                })
            });
            $(".btn-view-less").click(function(){
     
                $('.term-description').toggleClass('full');
            });


    
            $(".select_number_items").change(function(){
              
                var limit= $(this).val();
                var url = location.href;
                     
                let pattern = /page\/\d+/g;
           
                var newURL= url.replace(pattern, '');
                console.log(newURL);

                var urlOK = new URL(newURL);

                urlOK.searchParams.set('limit', limit);
                console.log(urlOK.href);
              

                 location.href = urlOK.href;

            });
            $(".select_color").change(function(){
                var color= $(this).val();
                var url = new URL(location.href);

                if (!color ){
                    console.log('reset');
                    url.searchParams.delete('color');

                } else{
                     url.searchParams.set('color', color);
                }
               
                location.href = url.href;

            });

            $(".select_size").change(function(){
                var size= $(this).val();
                var url = new URL(location.href);

              if (!size ){
                    url.searchParams.delete('size');
                    
                }else{
                    url.searchParams.set('size', size);
                }
                location.href = url.href;

            });

            $(".sort-lowprice").click(function(){
                var size= $(this).val();
                var url = new URL(location.href);
                url.searchParams.set('orderby', 'price');
                location.href = url.href;

            })

             $(".orderbyDate").click(function(){
                var size= $(this).val();
                var url = new URL(location.href);
                let exitKey = url.searchParams.get('orderby');
                if(exitKey === 'date'){
                    url.searchParams.delete('orderby');
                } else {
                    url.searchParams.set('orderby', 'date');
                }
                location.href = url.href;

            })

            $(".sort-hightprice").click(function(){
                var size= $(this).val();
                var url = new URL(location.href);
                url.searchParams.set('orderby', 'price-desc');
                location.href = url.href;

            })


        }(jQuery));

    </script>
<?php    
}
add_action('wp_footer','box_add_js_cat');


// function portfolio_posts_per_page( $query ) {
//    if ! is_main_query()  $query->query_vars['posts_per_page'] = 8;
//    return $query;
// }
// add_filter( 'pre_get_posts', 'portfolio_posts_per_page' );


function wpdocs_modify_query_exclude_category( $query ) {
    if( !  $query->is_main_query()  ) return $query;

    if ( ! is_admin() && $query->is_main_query() &&  isset($_GET['limit']) )
        $query->set( 'posts_per_page', $_GET['limit'] );

    if( is_front_page() || is_archive() || is_cart() ){
        $query->set( 'post__not_in', LIST_BUNDLES_ITEM );
    }
    //$query->set( 'posts_per_page',6);
    
}
add_action( 'pre_get_posts', 'wpdocs_modify_query_exclude_category' );

function box_exclude_list_ban_kem($args){

    $args['post__not_in'] = LIST_BUNDLES_ITEM;
    $args['exclude'] = LIST_BUNDLES_ITEM;
    //var_dump($args);
    return $args;
}
// add_filter('woocommerce_product_object_query_args','box_exclude_list_ban_kem', 999);