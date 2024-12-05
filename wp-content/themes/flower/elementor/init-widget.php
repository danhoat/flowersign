<?php 

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_list_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/bestselling.php' );

    $widgets_manager->register( new \Elementor_BestSelling_Widget() );

    require_once( __DIR__ . '/widgets/categories.php' );
    $widgets_manager->register( new \Elementor_Categories_Widget() );

    require_once( __DIR__ . '/widgets/products-v2.php' );

   // $widgets_manager->register( new Box_Products() );



    require_once( __DIR__ . '/widgets/title.php' );

    $widgets_manager->register( new \Elementor_Title_Widget() );

    require_once( __DIR__ . '/widgets/banner.php' );

    $widgets_manager->register( new \Elementor_Banner_Widget() );



}
add_action( 'elementor/widgets/register', 'register_list_widget' ,999);


