<?php

define('BOXTHEME_URL', get_template_directory_uri() );
define('IMAGE_URL', BOXTHEME_URL.'/images' );
define('BOXTHEME_PATH', __DIR__);
define('PRODUCT_PATH', __DIR__.'/products');
define('LOAD_STATIC_JS', true);


if( !defined('LIST_BUNDLES_ITEM')){
    define( "LIST_BUNDLES_ITEM", array('630','631','632','633') );
}


require_once __DIR__ .'/includes/required.php';
require_once __DIR__ .'/woo/inc.php';
require_once __DIR__ .'/elementor/required.php';
require_once __DIR__ .'/block/required.php';
function testimonial_item1(){?>

    <div class="testimonial-item">
        
        <div class="box-image">
            <img src = "<?php echo BOXTHEME_URL;?>/images/home/review1.jpg" >
        </div>
        <p class="mkdf-testimonial-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget.</p>
        <span class="mkdf-testimonial-author">
            <span class="mkdf-testimonials-author-name">Jasmine White</span>
                <span class="mkdf-testimonials-author-job">Florist</span>
        </span>
    </div>

<?php } ?>
<?php

function testimonial_item2(){?>

    <div class="testimonial-item">
       
        <div class="box-image">
            <img src = "<?php echo BOXTHEME_URL;?>/images/home/review2.jpg" >
        </div>
        <p class="mkdf-testimonial-text">A Very special thanks. Flawless bouquet with very beautiful flowers with nice arrangement and wrapping i love it..</p>
        <span class="mkdf-testimonial-author">
            <span class="mkdf-testimonials-author-name">Flip White</span>
                <span class="mkdf-testimonials-author-job">Florist</span>
        </span>

    </div>

<?php } ?>

<?php
function testimonial_item3(){?>

    <div class="testimonial-item">
       
        <div class="box-image">
            <img src = "<?php echo BOXTHEME_URL;?>/images/home/review3.jpg" >
        </div>
        
        <p class="mkdf-testimonial-text">A Very special thanks. Flawless bouquet with very beautiful flowers with nice arrangement and wrapping i love it..</p>
        <span class="mkdf-testimonial-author">
            <span class="mkdf-testimonials-author-name">Jasmine Green</span>
            <span class="mkdf-testimonials-author-job">Florist</span>
        </span>
    </div>

<?php } 

function btn_next_testimonial(){?>
    <div class="wrap-owl-next wrap-btn-testimonial">
<span class="mkdf-next-icon">
    <svg xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="16.667px" viewBox="0 0 75.417 16.667" enable-background="new 0 0 75.417 16.667" xml:space="preserve"><line fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" x1="1.681" y1="7.817" x2="73.257" y2="7.817"></line><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="67.235,1.351 73.985,7.817 67.235,15.316"></polyline>
    </svg>
</span>
</div>
<?php }


function btn_pre_testimonial(){?>

<div class="wrap-owl-prev wrap-btn-testimonial">
<span class="mkdf-prev-icon"><svg xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="16.667px" viewBox="0 0 75.417 16.667" enable-background="new 0 0 75.417 16.667" xml:space="preserve"><line fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" x1="1.681" y1="7.817" x2="73.257" y2="7.817"></line><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8.235,1.351 1.681,7.817 8.235,15.316"></polyline></svg></span>
</div>

<?php }