<?php 

function woocommerce_template_single_title(){ ?>
   
   <h1 class="product_title entry-title">
       <?php the_title();?>
   </h1>
  
    <?php
}
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

function woocommerce_template_single_after_meta(){
   
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_after_meta', 41 );