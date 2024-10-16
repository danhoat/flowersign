<?php get_header(); ?>




    <?php the_post(); ?>
    <h1><?php the_title();?>
    <?php the_content() ;?>
    <?php get_template_part('templates/home','footer');?>



<!-- ================= 파트 페이지들 :: END. ================= -->
</div>
<?php get_footer(); ?>