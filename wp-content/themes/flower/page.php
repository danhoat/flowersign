<?php 

/**
 * Template Name: Default page
 *
 */

get_header();
the_post();
?>

<div class="main">
    <h1 class="page-title"><?php the_title();?> </h1>    
    <?php the_content(); ?>
</div>
<?php 



get_footer();
?>