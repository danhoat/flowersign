<?php 

/**
 * Template Name: Checkout Page
 *
 */

get_header();
the_post();
?>

<div class="main">
   <h1 class="page-title"><?php the_title();?> </h1>    
   <?php 

   //the_content();
   echo do_shortcode('[woocommerce_checkout]');
    ?>
</div>
<?php 



get_footer();
?>