<?php get_header();?>


<div id="layout_body" class="layout_body">
        <div class="main post-detail" >
        <?php the_post(); ?>

        <nav data-v-11b456fa="" class="breadcrumb dark:text-gray-500 mt-4 text-brand text-base">
            <ul data-v-11b456fa="" class="text-xs mb-3">
                <li data-v-11b456fa="" class="inline" value="Trang chủ"><a data-v-11b456fa="" href="https://potico.vn">Trang chủ</a> 
                   <i class="fa fa-chevron-right"></i>
                </li>
                <li data-v-11b456fa="" class="inline" value="Blog"><a data-v-11b456fa="" href="<?php echo home_url('/blog');?>">Blog</a><i class="fa fa-chevron-right"></i></li>
                <li data-v-11b456fa="" class="inline" value="<?php the_title();?>"><span data-v-11b456fa=""><?php the_title();?></span></li>
            </ul>
        </nav>



        <h1 class="post-title title-color"> <?php the_title();?> </h1>

        <div class="flex flex-wrap justify-between cmt-5">
        <div class="grid"><span class="font-xs font-medium italic text-gray-600">Written by</span><p class="font-base text-brand-blue">Tác giả: <?php echo  get_the_author(); ?> </p>
        </div>
        <div class="grid"><span class="font-xs font-medium italic text-gray-600">Publication date</span><p class="font-base text-brand-blue"><?php echo cs_the_date($post);?></p></div>

        <div class="flex flex-row items-center gap-5 mt-3 md:mt-0">
        <p class="font-base text-gray-600 font-medium italic col-span-1">Share this</p>
        <div class="flex flex-row gap-2">
        <a class="social-icon facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo home_url();?>">
            <i class="fa-brands fa-facebook-f"></i>
            
        </a>
        <a href="https://twitter.com/share?url=h<?php echo home_url();?>&amp;text=Hi%20everyone,%20check%20out%20this%20new%20post%20from%20Flowerstore.ph%20" class="social-icon twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter"><i class="fa-brands fa-twitter"></i></a>
        </div>
        </div>
        </div>

        <div class="wrap_post full">
        <div class="post-content">
        <?php  the_content(); ?>
        </div>
        <div class="sidebar">
        <h2 data-v-dd797744="" class="font-bold text-lg">Recent Posts</h2>
        <?php
        global $post;
        $args = array(
            'exclude' => $post->ID,
            'numberposts' => 5
        );
        $recent_posts = wp_get_recent_posts($args);

        foreach( $recent_posts as $recent ) { ?>
            <?php
            global $post;
            setup_postdata($recent);
            $pID =$recent['ID'];
            ?>
            <div data-v-dd797744="" class="item p-3 relative flex-row md:flex gap-4 hover:bg-white">

            <a data-v-dd797744="" href="<?php echo get_permalink($pID);?>" class="absolute w-full h-full"></a>

            <div data-v-dd797744="" class="flex-1">
                <img src="<?php echo get_the_post_thumbnail_url($pID);?>" />
            </div>
            <div data-v-dd797744="" class="mt-3 flex-1 md:mt-0">
                <h4 data-v-dd797744="" class="text-sm col-span-2 title-color"><?php echo $recent['post_title'];?></h4>
                <i data-v-dd797744="" class="text-gray-500 text-xs row-span-2 md:tex-sm"><?php echo cs_the_date($post);?></i>
            </div>
        </div>
            
        <?php } ?>
        <?php wp_reset_postdata();?>

        </div>
</div>


<?php get_footer(); ?>