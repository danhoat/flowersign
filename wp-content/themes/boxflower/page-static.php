<?php 

/**
 * Template Name: Static page
 *
 */

get_header();
the_post();
?>

<div class="main">
    <?php the_content(); ?>
</div>
<?php 



get_footer();
?>