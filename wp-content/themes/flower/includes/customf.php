<?php

function fget_random_img($pos = 1){
    $images = glob(PRODUCT_PATH.'/*');

    foreach($images as $path){
        $img[] = BOXTHEME_URL.'/products/'.basename($path);
    }
    if($pos) return $img[$pos];

    return $img[rand(0, count($images) - 1)];
}

function cs_the_date($post){
echo get_the_date(get_option( 'date_format' ), $post);
}
function get_customizer_values(){

    global $boxOpt;
    var_dump($boxOpt);
    return $boxOpt;

}