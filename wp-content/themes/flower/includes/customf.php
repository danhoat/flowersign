<?php

function fget_random_img($pos = 1){
    $images = glob(PRODUCT_PATH.'/*');

    foreach($images as $path){
        $img[] = BOXTHEME_URL.'/products/'.basename($path);
    }
    if($pos) return $img[$pos];

    return $img[rand(0, count($images) - 1)];
}


