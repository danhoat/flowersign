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



}
add_action('after_setup_theme','theme_setup');

/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), rand() );

    //wp_enqueue_script( 'box-js', BOXTHEME_URL. '/js/box.js', array('jquery'), rand(), true );
    if( is_singular('product') ){
        wp_enqueue_style( 'single-product', BOXTHEME_URL.'/css/single-product.css', rand() );
        wp_enqueue_script( 'single-product', BOXTHEME_URL. '/js/single-product.js', array('jquery'), rand(), true );
    }
    if(! LOAD_STATIC_JS){
        $jss = box_js_enqueue();
        foreach($jss as $key=>$url){
            wp_enqueue_script('abc-'.$key, trim($url) );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function box_js_enqueue(){
    $js = array(
       // 'jquery' => 'https://f-mans.com/app/javascript/jquery/jquery.min.js',
        'jquery' => 'http://localhost/flower/wp-includes/js/jquery/jquery.min.js',

        'jquery.ui' => 'https://f-mans.com/app/javascript/jquery/jquery-ui.min.js',
        
        'cookie' => 'https://f-mans.com/app/javascript/plugin/jquery.cookie.js',
        'poshytip' => 'https://f-mans.com/app/javascript/plugin/jquery.poshytip.min.js',
        'indicator' => 'https://f-mans.com/app/javascript/plugin/jquery.activity-indicator-1.0.0.min.js',
        'spider' => 'https://f-mans.com/app/javascript/plugin/splide/splide.min.js',

        'slides' => 'https://f-mans.com/app/javascript/plugin/jquery.slides.min.js',

        'placeholder' =>'https://f-mans.com/app/javascript/plugin/jquery.placeholder.js',
        'validate' =>'https://f-mans.com/app/javascript/plugin/validate/jquery.validate.js',
        'ezmark' =>'https://f-mans.com/app/javascript/plugin/ezmark/js/jquery.ezmark.min.js',
        'select_box' =>'https://f-mans.com/app/javascript/plugin/custom-select-box.js',
        'pagination' =>'https://f-mans.com/app/javascript/plugin/custom-mobile-pagination.js',
        'slick' => 'https://f-mans.com/app/javascript/plugin/slick/slick.min.js',
        'jquery_swipe' => 'https://f-mans.com/app/javascript/plugin/jquery_swipe/jquery.event.swipe.js',
        'swiper' => 'https://f-mans.com/app/javascript/plugin/touchSlider/swiper.js',

        'tools' => 'https://f-mans.com/app/javascript/js/dev-tools.js?v=afe0eba294279d50c840',
        'display_mobile' => 'https://f-mans.com/app/javascript/js/goods-display_mobile.js?v=afe0eba294279d50c840',
        'design' => 'https://f-mans.com/app/javascript/js/design.js?v=afe0eba294279d50c840',
        'common' => BOXTHEME_URL.'/js/common.js',
        'lang' =>'https://f-mans.com/data/js/language/L10n_KR.js',
        'function' =>'https://f-mans.com/app/javascript/js/common-function.js?dummy=20240219111900',
        'mobile' =>'https://f-mans.com/app/javascript/js/common-mobile.js?v=afe0eba294279d50c840',
        'layout' =>'https://f-mans.com/app/javascript/js/front-layout.js?v=afe0eba294279d50c840',

        'base64' =>'https://f-mans.com/app/javascript/js/base64.js?v=afe0eba294279d50c840',
        'skin' =>'https://f-mans.com/app/javascript/js/skin-responsive.js?v=afe0eba294279d50c840',

        'drag' =>'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/jquery.event.drag-1.5.min.js?v=afe0eba294279d50c840',
        'touchSlider' =>'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/jquery.touchSlider.js?v=afe0eba294279d50c840',
        'responsive' =>'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/responsive.js?v=afe0eba294279d50c840',
        'cscript' =>'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/script.js?ver=2?v=afe0eba294279d50c840',

        'search_ver2' =>'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/search_ver2.js?ver=1?v=afe0eba294279d50c840',

        'user' =>'https://f-mans.com/data/skin/responsive_ver1_default_gl/common/user.js?ver=5?v=afe0eba294279fffd50c840',

        'bxslider' =>'https://f-mans.com/app/javascript/plugin/jquery.bxslider.js?v=afe0eba294279d50c840',
    ); 
    return $js;

}
function box_js_static(){ ?>
    <!-- 자바스크립트 -->
    <!-- 꽃청 추가 START 김태섭 2023-12-18 - splide -->
    <script type="text/javascript" src="https://f-mans.com/app/javascript/plugin/splide/splide.min.js"></script>



    <script src="https://f-mans.com/app/javascript/jquery/jquery.min.js"></script>
    <script src="https://f-mans.com/app/javascript/jquery/jquery-ui.min.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/jquery.cookie.js"></script> 

    <script src="https://f-mans.com/app/javascript/plugin/jquery.poshytip.min.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/jquery.activity-indicator-1.0.0.min.js"></script>


    <script src="https://f-mans.com/app/javascript/plugin/jquery.slides.min.js"></script>

    <script src="https://f-mans.com/app/javascript/plugin/jquery.placeholder.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/validate/jquery.validate.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/ezmark/js/jquery.ezmark.min.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/custom-select-box.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/custom-mobile-pagination.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/slick/slick.min.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/jquery_swipe/jquery.event.swipe.js"></script>
    <script src="https://f-mans.com/app/javascript/plugin/touchSlider/swiper.js"></script>

    <script src="https://f-mans.com/app/javascript/js/dev-tools.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/app/javascript/js/goods-display_mobile.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/app/javascript/js/design.js?v=afe0eba294279d50c840"></script>

    <script src="<?php echo home_url();?>/js/common.js?ver=123"></script>
    <script type="text/javascript" src="https://f-mans.com/data/js/language/L10n_KR.js?v=1"></script>
    <script type="text/javascript" src="https://f-mans.com/app/javascript/js/common-function.js?dummy=20240219111900"></script>
    <script src="https://f-mans.com/app/javascript/js/common-mobile.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/app/javascript/js/front-layout.js?v=afe0eba294279d50c840"></script>

    <script src="https://f-mans.com/app/javascript/js/base64.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/app/javascript/js/skin-responsive.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/data/js/language/L10n_KR.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/jquery.event.drag-1.5.min.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/jquery.touchSlider.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/responsive.js?v=afe0eba294279d50c840"></script>
    <script src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/script.js?ver=2?v=afe0eba294279d50c840"></script>

    <script src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/search_ver2.js?ver=1?v=afe0eba294279d50c840"></script>

    <script src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/user.js?ver=5?v=afe0eba294279fffd50c840"></script>

    <script src="https://f-mans.com/app/javascript/plugin/jquery.bxslider.js?v=afe0eba294279d50c840"></script> 
 <?php 

}