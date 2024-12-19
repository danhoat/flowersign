<?php

function the_item_post_loop($post){
    ?>
    <div class="post-item">
        <?php
        $author = get_the_author();
       // echo '<h2>'.$post->post_title.'</h2>';
        echo '<a href="'.get_permalink().'">';
        if( has_post_thumbnail() ){
            the_post_thumbnail('blog_thumbnail');
        }
        echo '</a>';
        ?>
        <div data-v-ce1f2810="" class="px-4 py-3 lg:py-4  flex-col justify-between flex-1">
            <span data-v-ce1f2810="" class="text-gray-500 text-xxs"><?php echo cs_the_date($post);?></span>
            <h3 data-v-ce1f2810="" class="post-title text-[#2F2C6F] font-extrabold text-base lg:text-lg xl:text-2xl title-color"> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h3>

            <p data-v-ce1f2810="" class="cmt-3 text-gray-500 font-normal text-xs"><?php the_excerpt();?></p>
            <div data-v-ce1f2810="" class="mt-auto">
                <h3 data-v-ce1f2810="" class="cmt-4 text-[#2F2C6F] text-xs font-bold title-color btn-readmore"> <a href="<?php the_permalink();?>">READ MORE</a></h3>
                <h2 data-v-ce1f2810="" class="cmt-4 font-bold text-xs text-[#2F2C6F] title-color">by: <?php echo $author;?></h2>
            </div>
        </div>
    </div> <!-- post-item end !-->
    <?php

}

function the_first_post($fp){ 


    global $post;
    $post= $fp;
    setup_postdata($post);
    $author = get_the_author();

    ?>
    <div class="post-item-first ">
        <div class="post-left">
        <?php

        echo '<a href="'.get_permalink().'">';
        if( has_post_thumbnail() ){
            the_post_thumbnail('blog_thumbnail');
        }
        ?>
        </a>
        </div>
        <div class="post-right">
            <div data-v-ce1f2810="" class="px-4 py-3 lg:py-4  flex-col justify-between flex-1">
                <span data-v-ce1f2810="" class="text-gray-500 text-xxs"><?php echo cs_the_date($post);?></span>
                <h2 data-v-ce1f2810="" class="post-title text-[#2F2C6F] font-extrabold text-base lg:text-lg xl:text-2xl title-color">
                    <a href="<?php the_permalink();?>"><?php the_title();?> </a></h2>

                <p data-v-ce1f2810="" class="cmt-3 text-gray-500 font-normal text-xs"><?php the_excerpt();?></p>
                <div data-v-ce1f2810="" class="mt-auto">
                    <h3 data-v-ce1f2810="" class="cmt-4 text-[#2F2C6F] text-xs font-bold title-color btn-readmore"> <a href="<?php the_permalink();?>">READ MORE</a></h3>
                    <h2 data-v-ce1f2810="" class="cmt-4 font-bold text-xs text-[#2F2C6F] title-color">by: <?php echo $author;?></h2>
                </div>
            </div>
         </div> <!-- post-right end !-->
    </div> <!-- full post !-->
    <?php 
}