<?php 

require_once __DIR__ .'/html_item.php';
require_once __DIR__ .'/customf.php';
require_once __DIR__ .'/after_setup_theme.php';
require_once __DIR__ .'/blog.php';
require_once __DIR__ .'/customizer.php';
require_once __DIR__ .'/customizer_clone.php';
require_once __DIR__ .'/post_types.php';
require_once BOXTHEME_PATH.'/slider/slider.php';
require_once __DIR__ .'/disable_crop_images.php';
require_once __DIR__ .'/html.php';
require_once __DIR__ .'/bundle_items.php';
require_once __DIR__ .'/extra_fee.php';
require_once __DIR__ .'/override_func.php';

// require_once __DIR__ .'/custom_gallery_vertical.php';

function box_register_product_color_tag(){
    $args = array(
        'label'        => __( 'Product Color', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true
    );
    
    register_taxonomy( 'color', array('product'), $args );
}
add_action('init', 'box_register_product_color_tag');