<?php 


//call for woocommerce custom admin image code    

require_once __DIR__ .'/be_cat_fields.php';

/*--------------------------------------------------------------------------------------
    Uploader JS
----------------------------------------------------------------------------------------*/
function my_admin_scripts() {
    wp_enqueue_media();

    wp_register_script( 'wina_classic-uadmin-js', get_template_directory_uri() . '/js/uploader.js', 
                                        array('jquery','media-upload','thickbox'), '20130115', true );
    wp_enqueue_script( 'wina_classic-uadmin-js');
}

add_action('admin_print_scripts', 'my_admin_scripts');