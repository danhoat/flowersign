<?php

function box_show_slider(){
    $args =  array(
        'post_type' => 'slider',
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);
    if($query->have_posts() ){
        while($query->have_posts()){
            $query->the_post();
            global $post;
            box_item_html($post);
        }
    }
}

function box_item_html($slider){?>
    <?php
    $pc_img     = get_field('pc_img', $slider->ID);
    $mobile_img = get_field('mobile_img',  $slider->ID);

    ?>
    <li class="splide__slide">
        <a href="/page/event/timesale/timesale">
            <div class="splide__slide_pc"><img src="<?php echo $pc_img;?>" alt=""></div>
            <div class="splide__slide_mobile"><img src="<?php echo $mobile_img;?>" alt=""></div>
            <div class="fm_text_box">
                <h2 style="color:#FFD703;">10월 어썸 특가!</h2>
                <h3 style="color:#FFD703;">선선한 가을바람 타고온<br>가을꽃 감성템 강추(秋) SALE</h3>
                <div class="fm_btn" style="background-color: rgba(255, 215, 3, 1.0); color: #B64602;">타임딜 특가 보러가기</div>
            </div>
        </a>
    </li>

<?php } ?>