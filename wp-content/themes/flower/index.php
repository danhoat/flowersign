<?php get_header(); ?>

<div class="main">
    <?php if(have_posts() ){?>
        <?php the_post(); the_content(); ?>
    <?php } else{
            echo '<div class="page404"><center>';
            _e('No post founds','boxtheme');
            echo '</center>';
        }

    ?>
</div>
<?php get_footer(); ?>