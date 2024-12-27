<?php 
/**
 * Template Name: Cart Page
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

<?php checkbox_step_status('step1') ;?>
<div class="main">
   <?php  echo do_shortcode('[woocommerce_cart]'); ?>
</div>
<?php  get_footer(); ?>