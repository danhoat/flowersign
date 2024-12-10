<?php

define('CAT_BANNER_IMG_ID','banner_thumbnail_id');
/*-------------------------------------------------------------------
    Add Custom metabox for woocommerce Category page
---------------------------------------------------------------------*/

function product_cat_add_cat_head_field_rj() {  ?>
    <div class="form-field">
        <label for="term_meta[cat_head_link]"><?php _e( 'Category Page Image', 'wina-classic' ); ?></label>
        <input type="text" name="term_meta[cat_head_link]" id="term_meta[cat_head_link]" value="">
        <p class="description"><?php _e( 'Upload Category Page Image','wina-classic' ); ?></p>
    </div>
<?php }

function product_cat_edit_cat_head_field_rj($term) {
    $t_id = $term->term_id; $term_meta = get_option( "taxonomy_$t_id" ); ?>

    <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[cat_head_link]"><?php _e( 'Category Page Image', 'wina-classic' ); ?></label></th>
        <td>
            <img src="<?php echo esc_attr( $term_meta['cat_head_link'] ) ? esc_attr( $term_meta['cat_head_link'] ) : ''; ?>" height="60" width="120" id="category-header-preview" />
            <input type="hidden" name="term_meta[cat_head_link]" id="category-meta-woo" value="<?php echo esc_attr( $term_meta['cat_head_link'] ) ? esc_attr( $term_meta['cat_head_link'] ) : ''; ?>" style="margin-left: 0px; margin-right: 0px; width: 50%;" />
            <input type="button" class="button button-secondary" value="Upload Image" id="upload-button-woo" />
            <p class="description"><?php _e( 'Upload Category Page Image','wina-classic' ); ?></p>
        </td>
    </tr>
<?php
}

// this action use for add field in add form of taxonomy 
add_action( 'product_cat_add_form_fields', 'product_cat_add_cat_head_field_rj', 10, 2 );
// this action use for add field in edit form of taxonomy 
add_action( 'product_cat_edit_form_fields', 'product_cat_edit_cat_head_field_rj', 10, 2 );

function product_cat_cat_head_link_save( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
       update_option( "taxonomy_$t_id", $term_meta );
    }
}

// this action use for save field value of edit form of taxonomy 
add_action( 'edited_product_cat', 'product_cat_cat_head_link_save', 10, 2 );  
// this action use for save field value of add form of taxonomy 
add_action( 'create_product_cat', 'product_cat_cat_head_link_save', 10, 2 );




/**
 * Category thumbnail fields.
 */
 function add_category_fields() {
    ?>
  
    <div class="form-field box-thumbnail-wrap">
        <label><?php esc_html_e( 'Banner Image', 'woocommerce' ); ?></label>
        <div id="box_product_cat_thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" /></div>
        <div style="line-height: 60px;">
            <input type="hidden" id="cat_banner_thumbnail_id" name="<?php echo CAT_BANNER_IMG_ID;?>" />
            <button type="button" class="box_upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'woocommerce' ); ?></button>
            <button type="button" class="box_remove_image_button button"><?php esc_html_e( 'Remove image', 'woocommerce' ); ?></button>
        </div>
        <script type="text/javascript">

            // Only show the "remove image" button when needed
            if ( ! jQuery( '#cat_banner_thumbnail_id' ).val() ) {
                jQuery( '.box_remove_image_button' ).hide();
            }

            // Uploading files
            var file_frame_box;

            jQuery( document ).on( 'click', '.box_upload_image_button', function( event ) {

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame_box ) {
                    file_frame_box.open();
                    return;
                }

                // Create the media frame.
                file_frame_box = wp.media.frames.downloadable_file = wp.media({
                    title: '<?php esc_html_e( 'Choose an image', 'woocommerce' ); ?>',
                    button: {
                        text: '<?php esc_html_e( 'Use image', 'woocommerce' ); ?>'
                    },
                    multiple: false
                });

                // When an image is selected, run a callback.
                file_frame_box.on( 'select', function() {
                    var attachment           = file_frame_box.state().get( 'selection' ).first().toJSON();
                    var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

                    jQuery( '#cat_banner_thumbnail_id' ).val( attachment.id );
                    jQuery( '#box_product_cat_thumbnail' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
                    jQuery( '.box_remove_image_button' ).show();
                });

                // Finally, open the modal.
                file_frame_box.open();
            });

            jQuery( document ).on( 'click', '.box_remove_image_button', function() {
                jQuery( '#box_product_cat_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
                jQuery( '#cat_banner_thumbnail_id' ).val( '' );
                jQuery( '.box_remove_image_button' ).hide();
                return false;
            });

            jQuery( document ).ajaxComplete( function( event, request, options ) {
                if ( request && 4 === request.readyState && 200 === request.status
                    && options.data && 0 <= options.data.indexOf( 'action=add-tag' ) ) {

                    var res = wpAjax.parseAjaxResponse( request.responseXML, 'ajax-response' );
                    console.log('res:');
                    console.log(res);
                    if ( ! res || res.errors ) {
                        return;
                    }
                    // Clear Thumbnail fields on submit
                    jQuery( '#box_product_cat_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
                    jQuery( '#cat_banner_thumbnail_id' ).val( '' );
                    jQuery( '.box_remove_image_button' ).hide();
                    // Clear Display type field on submit
                    jQuery( '#display_type' ).val( '' );
                    return;
                }
            } );

        </script>
        <div class="clear"></div>
    </div>
    <?php
}

add_action( 'product_cat_add_form_fields',  'add_category_fields', 9999 ) ;


function box_edit_category_fields( $term ) {


        $ban_thumbnail_id = absint( get_term_meta( $term->term_id, CAT_BANNER_IMG_ID, true ) );

        if ( $ban_thumbnail_id ) {
            $image = wp_get_attachment_thumb_url( $ban_thumbnail_id );
        } else {
            $image = wc_placeholder_img_src();
        }
        ?>
      
        <tr class="form-field term-thumbnail-wrap">
            <th scope="row" valign="top"><label><?php esc_html_e( 'Banner Image', 'woocommerce' ); ?></label></th>
            <td>
                <div id="product_cat_banner" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
                <div style="line-height: 60px;">
                    <input type="hidden" id="product_cat_ban_thumbnail_id" name="<?php echo CAT_BANNER_IMG_ID;?>" value="<?php echo esc_attr( $ban_thumbnail_id ); ?>" />
                    <button type="button" class="box_upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'woocommerce' ); ?></button>
                    <button type="button" class="box_remove_image_button button"><?php esc_html_e( 'Remove image', 'woocommerce' ); ?></button>
                </div>
                <script type="text/javascript">

                    // Only show the "remove image" button when needed
                    if ( '0' === jQuery( '#product_cat_ban_thumbnail_id' ).val() ) {
                        jQuery( '.box_remove_image_button' ).hide();
                    }

                    // Uploading files
                    var file_frame_banner;

                    jQuery( document ).on( 'click', '.box_upload_image_button', function( event ) {

                        event.preventDefault();

                        // If the media frame already exists, reopen it.
                        if ( file_frame_banner ) {
                            file_frame_banner.open();
                            return;
                        }

                        // Create the media frame.
                        file_frame_banner = wp.media.frames.downloadable_file = wp.media({
                            title: '<?php esc_html_e( 'Choose an image', 'woocommerce' ); ?>',
                            button: {
                                text: '<?php esc_html_e( 'Use image', 'woocommerce' ); ?>'
                            },
                            multiple: false
                        });

                        // When an image is selected, run a callback.
                        file_frame_banner.on( 'select', function() {
                            var attachment           = file_frame_banner.state().get( 'selection' ).first().toJSON();
                            var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

                            jQuery( '#product_cat_ban_thumbnail_id' ).val( attachment.id );
                            jQuery( '#product_cat_banner' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
                            jQuery( '.box_remove_image_button' ).show();
                        });

                        // Finally, open the modal.
                        file_frame_banner.open();
                    });

                    jQuery( document ).on( 'click', '.box_remove_image_button', function() {
                        jQuery( '#product_cat_banner' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
                        jQuery( '#product_cat_ban_thumbnail_id' ).val( '' );
                        jQuery( '.box_remove_image_button' ).hide();
                        return false;
                    });

                </script>
                <div class="clear"></div>
            </td>
        </tr>
        <?php
    }
add_action( 'product_cat_edit_form_fields',  'box_edit_category_fields', 999 );



function box_save_category_fields( $term_id, $tt_id = '', $taxonomy = '' ) {

    if ( isset( $_POST[CAT_BANNER_IMG_ID] ) && 'product_cat' === $taxonomy ) { // WPCS: CSRF ok, input var ok.
        update_term_meta( $term_id, CAT_BANNER_IMG_ID, absint( $_POST[CAT_BANNER_IMG_ID] ) ); // WPCS: CSRF ok, input var ok.
    }
}


add_action( 'created_term', 'box_save_category_fields' , 10, 3 );
add_action( 'edit_term',  'box_save_category_fields' , 10, 3 );

