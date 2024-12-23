<?php 

function box_add_woo_tabs($tabs){

    //var_dump($tabs);

    // review pri=30
    $key = 'cs_doi_tra';

    $tabs[$key] = array(
        "title"=> "Chính sách đổi trả",
        "priority"=> 31,
        "callback"=> "woocommerce_product_{$key}_tab",
    );
    $tabs['cs_baomat'] = array(
        "title"=> "Chính sách Bảo Mật ",
        "priority"=> 35,
        "callback"=> "woocommerce_product_cs_baomat_tab",
    );

    $tabs['qa'] = array(
        "title"=> "Câu hỏi thường gặp",
        "priority"=> 50,
        "callback"=> "woocommerce_product_qa_tab",
    );
  

    $tabs["reviews"]=  array(
        "title"=> "Đánh Giá - Nhận Xét Từ Khách Hàng",
        "priority"=>  30, 
        "callback"=> "comments_template"
    );

    return $tabs;
}
add_filter('woocommerce_product_tabs','box_add_woo_tabs');

function woocommerce_product_new_tab(){
    echo 'ok';
}
function woocommerce_product_cs_doi_tra_tab(){
    $html = '[sc name="cs_doitra"][/sc]';
    echo do_shortcode($html);

}
function woocommerce_product_cs_baomat_tab(){
    $html = '[sc name="cs_baomat"][/sc]';
    echo do_shortcode($html);
}
function woocommerce_product_qa_tab(){
   $html = '[sc name="qa_popular"][/sc]';
    echo do_shortcode($html);
}