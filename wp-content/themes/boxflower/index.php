<?php get_header(); ?>

<div class="main">
    <?php 
    if(have_posts() ){
             the_post();
            while(have_posts() ){
                the_post();
                the_title();
                the_content();
            }
    } else{
        echo '<div class="page404"><center>';
        _e('No posts found.','boxtheme');
        echo '</center>';
    }

    ?>
</div>
<?php get_footer(); ?>