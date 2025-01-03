<?php
/**
 * Essential theme supports
 * */
function theme_setup(){
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );

    /** tag-title **/
    add_theme_support( 'title-tag' );

    /** post formats */
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);

    /** post thumbnail **/
    add_theme_support( 'menus' );

    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support('woocommerce');

    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );

    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 300,
        'height'                 => 60,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );

    /** custom log **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    add_image_size( 'blog_thumbnail', 678, 388, true );
    // 678 * 388

    add_theme_support('caption');
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'text_domain' ),
        'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
    ) );
    



}
add_action('after_setup_theme','theme_setup');

/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {

    if( is_page_template('page-static.php') ) return 1;

    wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), rand() );

    wp_enqueue_script( 'box-js', BOXTHEME_URL. '/js/box.js', array('jquery'), rand(), true );

    if( is_singular('product') ){
        wp_enqueue_style( 'single-product', BOXTHEME_URL.'/css/single-product.css',array(), rand() );
        wp_enqueue_script( 'single-product', BOXTHEME_URL. '/js/single-product.js', array('jquery'), rand(), true );
    }

    if( is_post_type_archive('product') || is_tax( 'product_cat' ) ){
        wp_enqueue_style( 'archive-product', BOXTHEME_URL.'/css/archive.css',array(), rand() );
        
    }

    if( is_singular('post') || is_page_template('page-blog.php')){
        wp_enqueue_style( 'blog-post', BOXTHEME_URL.'/css/blog.css',array(), rand() );
    }

    if( is_page_template('page-checkout.php') || is_page('checkout') ||  is_page_template('box-cart.php') ||  is_page('cart') ){
        wp_enqueue_style( 'woo-checkout', BOXTHEME_URL.'/css/checkout.css',array(), rand() );
    }
    if( is_front_page() || is_home() ){
        wp_enqueue_style('home', BOXTHEME_URL.'/css/home.css',array(), rand() );    
    }
    wp_enqueue_style('responsive-css', BOXTHEME_URL.'/responsive.css?ok',array(), rand() );

    if(! LOAD_STATIC_JS){
        $jss = box_js_enqueue();
        foreach($jss as $key=>$url){
            wp_enqueue_script('abc-'.$key, trim($url) ,array() ,rand() ,true  );
        }
    }
    wp_enqueue_style('woo-css', BOXTHEME_URL.'/css/override_woo.css',array(), rand() );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function box_js_enqueue(){
    $js = array(
       // 'jquery' => JS_URL.'/jquery.min.js',
        
        //'jquery' => 'ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
        //'jquery' => JS_URL.'/jquery.min.171.js',
        // 'jquery' => 'https://code.jquery.com/jquery-3.2.1.min.js',
        'jquery' => SITE_URL.'/wp-includes/js/jquery/jquery.min.js',
        'jquery.ui' => JS_URL.'/jquery-ui.min.js',

        
        'cookie' => JS_URL.'/jquery.cookie.js',
        'poshytip' => JS_URL.'/jquery.poshytip.min.js',
        'indicator' => JS_URL.'/jquery.activity-indicator-1.0.0.min.js',
        'spider' => JS_URL.'/splide.min.js',

         'slides' => JS_URL.'/jquery.slides.min.js',

        // 'placeholder' =>JS_URL.'/jquery.placeholder.js',
        // 'validate' => JS_URL.'/jquery.validate.js',
        // 'ezmark' => JS_URL.'/jquery.ezmark.min.js',
        // 'select_box' =>JS_URL.'/custom-select-box.js',

        //'pagination' =>JS_URL.'/custom-mobile-pagination.js',
        'slick' => JS_URL.'/slick.min.js',
        'jquery_swipe' => JS_URL.'/jquery.event.swipe.js',
        'swiper' => JS_URL.'/swiper.js',

        // 'tools' => JS_URL.'/dev-tools.js?v=afe0eba294279d50c840',
        // 'display_mobile' => JS_URL.'/goods-display_mobile.js?v=afe0eba294279d50c840',
        // 'design' => JS_URL.'/design.js?v=afe0eba294279d50c840',
        // 'common' => BOXTHEME_URL.'/js/common.js',
        // 'lang' =>JS_URL.'/L10n_KR.js',
        // 'function' =>JS_URL.'/common-function.js?dummy=20240219111900',
        // 'mobile' =>JS_URL.'/common-mobile.js?v=afe0eba294279d50c840',
        // 'layout' =>JS_URL.'/front-layout.js?v=afe0eba294279d50c840',

        // 'base64' =>JS_URL.'/base64.js?v=afe0eba294279d50c840',
        // 'skin' =>JS_URL.'/skin-responsive.js?v=afe0eba294279d50c840',

        // 'drag' =>  JS_URL.'/jquery.event.drag-1.5.min.js?v=afe0eba294279d50c840',
        // 'touchSlider' => JS_URL.'/jquery.touchSlider.js?v=afe0eba294279d50c840',
        // 'responsive' => JS_URL.'/responsive.js',// 'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/responsive.js?v=afe0eba294279d50c840',
         'cscript' => JS_URL.'/script.js' , //'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/script.js?ver=2?v=afe0eba294279d50c840',

        // 'search_ver2' => JS_URL.'/search_ver2.js?ver=1?v=afe0eba294279d50c840',

        // 'user' => JS_URL.'/user.js', //'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/user.js?ver=5?v=afe0eba294279fffd50c840',

        // 'bxslider' => JS_URL.'/jquery.bxslider.js', // https://f-mans.com/app/javascript/plugin/jquery.bxslider.js?v=afe0eba294279d50c840',
        'searchJS' => JS_URL.'/search_ver2_ready.js', // https://f-mans.com/data/skin/responsive_ver1_default_gl/common/search_ver2_ready.js?v=1',
    ); 
    if( !wp_is_mobile() ){
        unset($js['pagination']);
        unset($js['mobile']);
    }
    return $js;

}
function box_js_static(){ 

    $jss = box_js_enqueue();
    foreach($jss as $key=>$url){ ?>
       <script src="<?php echo $url;?>"></script>
      <?php
    }

}