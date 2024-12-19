<?php

define('BOXTHEME_URL', get_template_directory_uri() );
define('IMAGE_URL', BOXTHEME_URL.'/images' );
define('BOXTHEME_PATH', __DIR__);
define('PRODUCT_PATH', __DIR__.'/products');
define('LOAD_STATIC_JS', true);
require_once __DIR__ .'/includes/required.php';
require_once __DIR__ .'/woo/inc.php';
require_once __DIR__ .'/elementor/required.php';
require_once __DIR__ .'/block/required.php';
function testimonial_item1(){?>

    <div class="testimonial-item">
        <p>Great service, delivery, price and product! Quality of flowers are amazing. Will be using you for all my flower needs.</p>
        <div class="box-image">
            <img src = "<?php echo BOXTHEME_URL;?>/images/home/review1.jpg" >
        </div>
        <div class="testimonial-author">
            <p class="testimonial-name"> Martin Micker</p>
            <p class="testimonial-job">Physician</p>
        </div>
    </div>

<?php } ?>
<?php

function testimonial_item2(){?>

    <div class="testimonial-item">
        <p>A Very special thanks. Flawless bouquet with very beautiful flowers with nice arrangement and wrapping i love it..</p>
        <div class="box-image">
            <img src = "<?php echo BOXTHEME_URL;?>/images/home/review2.jpg" >
        </div>
        <div class="testimonial-author">
            <p class="testimonial-name"> Martin Micker</p>
            <p class="testimonial-job">Physician</p>
        </div>
    </div>

<?php } ?>

<?php
function testimonial_item3(){?>

    <div class="testimonial-item">
        <p>Item received accordingly as shown. Thank you so much for timely delivery. My wife loved the beautiful flower and aroma.</p>
        <div class="box-image">
            <img src = "<?php echo BOXTHEME_URL;?>/images/home/review3.jpg" >
        </div>
        <div class="testimonial-author">
            <p class="testimonial-name"> Martin Micker</p>
            <p class="testimonial-job">Physician</p>
        </div>
    </div>

<?php } ?>


