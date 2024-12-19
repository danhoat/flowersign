<?php

define('BOXTHEME_URL', get_template_directory_uri() );
define('BOXTHEME_PATH', __DIR__);
define('PRODUCT_PATH', __DIR__.'/products');
define('LOAD_STATIC_JS', true);
require_once __DIR__ .'/includes/required.php';
require_once __DIR__ .'/woo/inc.php';
require_once __DIR__ .'/elementor/required.php';
require_once __DIR__ .'/block/required.php';
function testimonial_item(){?>

<div class="testimonial-item">
    <p>Great service, delivery, price and product! Quality of flowers are amazing. Will be using you for all my flower needs.</p>
    <div class="box-image">
        <img src = "https://demo.dichvu139.com/wp-content/plugins/elementor/assets/images/placeholder.png" >
    </div>
    <div class="testimonial-author">
        <p class="testimonial-name"> Martin Micker</p>
        <p class="testimonial-job">Physician</p>
    </div>
</div>

<?php } ?>


