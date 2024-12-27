<?php 
/**
 * Template Name: Checkout Page
 *
 */
?>

<?php
   get_header();
   the_post();
?>
<?php checkbox_step_status() ;?>
<div class="main">
   <h1 class="page-title"><?php the_title();?> </h1>    
   <?php 
   echo do_shortcode('[woocommerce_cart]');
    ?>
</div>
<?php  get_footer(); ?>