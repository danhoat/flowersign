<?php get_header(); ?>




    <?php the_post(); ?>
    <h1><?php the_title();?>
    <?php the_content() ;?>
    <?php get_template_part('templates/home','footer');?>




<?php get_footer(); ?>