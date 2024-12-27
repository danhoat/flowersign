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


<div class="main">
   <h1 class="page-title"><?php the_title();?> </h1>
</div>

<?php checkbox_step_status('step2') ;?>

<div class="main">  
   <?php echo do_shortcode('[woocommerce_checkout]'); ?>
</div>
<?php  get_footer(); ?>