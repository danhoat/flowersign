<?php get_header(); ?>

<div class="main">
    <?php if(have_posts() ){ the_post(); ?>
        <h1 class="title"><?php the_title();?> </h1>
        <?php the_content(); ?>
    <?php } else{
            echo '<div class="page404"><center>';
            _e('No post founds','boxtheme');
            echo '</center>';
        }

    ?>
</div>
<?php get_footer(); ?>