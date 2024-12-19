<?php 

/**
 * Template Name: Default page
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