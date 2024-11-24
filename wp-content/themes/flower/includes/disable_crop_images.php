<?php 

// image_resize_dimensions


//add_action( 'init', 'czc_disable_extra_image_sizes' );
// add_filter( 'image_resize_dimensions', 'czc_disable_crop', 10, 6 );
function czc_disable_crop( $enable, $orig_w, $orig_h, $dest_w, $dest_h, $crop )
{
    // Instantly disable this filter after the first run
    // remove_filter( current_filter(), __FUNCTION__ );
    // return image_resize_dimensions( $orig_w, $orig_h, $dest_w, $dest_h, false );
    var_dump($_REQUEST);
    $t  = wp_doing_ajax();

    $action == $_REQUEST['action']; 

    //upload-attachment ==> wp_ajax_upload_attachment ==> media_handle_upload ==> wp_handle_upload
    
    $_acfuploader = isset($_REQUEST['_acfuploader']) ? $_REQUEST['_acfuploader'] : '';


    return false;
}
// function czc_disable_extra_image_sizes() {
//     foreach ( get_intermediate_image_sizes() as $size ) {
//         remove_image_size( $size );
//     }
// }


// action: media-create-image-subsizes => media_create_image_subsizes

function box_disable_crop_subsizes( $result, $path ){

    $action = isset($_REQUEST['action']) ? $_REQUEST['action']:'';
    $_acfuploader = isset($_REQUEST['_acfuploader']) ? $_REQUEST['_acfuploader'] : '';

    if($action == "upload-attachment" && !empty($_acfuploader) ){
        return false;
    }
    return $result;

}
add_filter('file_is_displayable_image','box_disable_crop_subsizes', 10,2);