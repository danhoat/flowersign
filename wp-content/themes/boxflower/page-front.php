<?php /**
 * Template Name: Page Front
 *
 */

$customizer = get_customizer_values();
// echo '<pre>';
// echo 'front:';
// var_dump($customizer->show_slider);
// echo '</pre>';
 // if($customizer->show_slider == 'yes') { 
get_header();
?>

<?php if( wp_is_mobile() ){ ?>
<div id="layout_body" class="layout_body page-front.php">
    <?php } else { ?>
    <div style="width: 100%; max-width: 100%; overflow: hidden;">
<?php } ?>

<?php   include('home-slider.php'); // slide-intro.php  ?>
</div>


<div id="layout_body" class="layout_body page-front.php">
    <div class="resp_wrap " style="position:relative;">
        <?php 
        $categories = get_terms( 'product_cat', array(
            'orderby'    => 'count',
            'hide_empty' => 0,
            'order' => 'DESC',
            'number' => 8
        ) );
        ?>
        <div class="theme_content block-categories arow">
            <div class="row g-3 g-md-2">
                <?php  foreach($categories as $cat ){ ?> 
                <div class="col col-md-3">
                    <div class="theme_box_1220">
                        <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
                            <div class="theme_text"><?php echo $cat->name;?></div>
                            <?php

                                $term_id  = $cat->term_id;
                                $img_url = BOXTHEME_URL.'/images/cat-rose.png';
                                $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
                                $alt = $cat->name;

                                if($thumbnail_id){
                                    $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                                    if( isset($image[0 && !empty($image)])){
                                        $img_url = $image[0];
                                    }
                                   
                                }
                                ?>
                                <div><img src="<?php echo $img_url;?>" alt="<?php echo $alt;?>" /> </div>
 
                        </a>
                    </div>
                </div>
                <?php  } ?>

            </div>
        </div>

        <!-- END list categories !-->
        <?php $heading = 'MY Hear All Best wish to you';?>

        
        <?php box_block_best_selling();?>
        <?php block_products_by_category($slug = 'hoa-tot-nghiep', $label ='Hoa Tốt Nghiệp');?>
        <?php block_image_vs_button($heading);?>
        <?php block_products_by_category($slug = 'hoa-cuoi', $label ='Hoa Cưới');?>
        <?php block_image_vs_button($heading, $bg = IMAGE_URL.'/banner/bg_hydrangea.jpg');?>
        <?php block_products_by_category($slug = 'hoa-tinh-yeu', $label ='Hoa Tình Yêu');?>
        <?php block_image_vs_button($heading);?>
        <?php block_products_by_category($slug = 'hoa-chuc-mung', $label ='Hoa Chúc Mừng ');?>
    </div>    
</div>
<div class="full fixed_bg">
    <div class="container">
        <div class="desc aos-init aos-animate" data-aos="fade-right">
        <h2>The story of the flower lounge filled with happiness</h2>
        <div class="bar"></div>
        <p>I want to share the happiness that flowers give with many peoples.</p>
    </div>

    </div>
</div>

<div class=" full block-story">
    <div class="container ">
        <center>
        <img src="<?php echo IMAGE_URL;?>/home/img-love-story.png" class="icon-img" width="300">
        </center>
        <div class="cl-6 love-story ">
            <h2 class="block-title">Love Story</h2>
            <?php

            $post = get_post(280);
            //$text = explode("[xem_them]",$post->post_content);
            $text = str_replace('[xem_them]','<span class ="aaa" id="btn_gioi_thieu" > Xem thêm </span><div class = "view-full hide">', $post->post_content);
            $text.='</div>';


            ?>
            <div class="text-center right-text-styling w-50 mx-auto">
                <!-- <p>FlowerSight tự hào là một trong những shop hoa tươi Sài Gòn, Hà Nội uy tín và có tiếng trong ngành. Chúng tôi cung cấp dịch vụ đặt hoa online, đặt hoa tươi TPHCM và Hà Nội ship siêu tốc trong ngày. Tiệm hoa tươi giá rẻ ở Sài Gòn FlowerSight mang đến cho khách hàng những bó hoa, lẵng hoa, giỏ hoa tặng sinh nhật, hoa khai trương, hoa cưới cầm tay,hoa chia buồn, hoa sự kiện đầy nghệ thuật hay hoa tang tỏ lòng thành kính !-->
                    <?php  echo $text; ?>
                    <?php if( isset($text[1])){?> 
                        <!-- <span href="#" id="btn_gioi_thieu" class="read-link"> Xem thêm</span> -->
                        <div class="view-full hide ">
                            <?php echo wc_format_content($text[1]);?>
                         </div>
                    <?php } ?>
                    
                </p>
            </div>
        </div>
    </div>
</div>




<div class="full block-testimonial">
    <div class="container">
        <?php get_template_part('testimonial/slider');?>


    </div>
</div>



<script>
    var t = new Date();
    var uniquekey_dsp = 'designDisplay_670aa31da48d7'+t.getTime();
    var display_swiper = [];

    ( function( $ ) {
        $(document).ready(function(){
            /* 상품디스플레이 스와이프형 탭 스크립트 */
            $("#designDisplay_670aa31da48d7 .displaySwipeTabContainer").each(function(){
                var tabContainerObj = $(this);
                tabContainerObj.children('li').css('width',(100/tabContainerObj.children('li').length)+'%');
                tabContainerObj.children('li').bind('mouseover click',function(){
                    tabContainerObj.children('li.current').removeClass('current');
                    $(this).addClass('current');
                    var tabIdx = tabContainerObj.children('li').index(this);
                    tabContainerObj.closest('.designDisplay, .designCategoryRecommendDisplay').find('.displayTabContentsContainer').hide().eq(tabIdx).show();
                }).eq(0).trigger('mouseover');
            });


            $('.display_slide_class').each(function(){
                if(!$(this).hasClass('set_slide_clear')){
                    display_swiper[uniquekey_dsp] = new Swiper($(this).find('.goods_display_slide_wrap'), {
                       // slidesPerView: 'auto',
                        grabCursor: true,
                        loop: true,
                        nextButton: $(this).find('.mkdf-next-icon'),
                        prevButton: $(this).find('.mkdf-prev-icon')
                    });
                    $(this).addClass('set_slide_clear').bind('mousedown touchstart touchmove',function(){
                        $('.active_swipe_slide').removeClass('active_swipe_slide');
                        $(this).addClass('active_swipe_slide');
                    });
                }
            });
           
        });

        $( window ).resize(function() {
            // "TOUCH PRIMARY MENU IN MOBILE"
            if ( window.innerWidth != WINDOWWIDTH ) {
                if ( window.innerWidth < 1280 && $('#cateSwiper .designCategoryNavigation').length > 0 && slideshowSwiper == undefined ) {
                    $('#cateSwiper .designCategoryNavigation ul.respCategoryList>li').addClass('swiper-slide');
                    $('#layout_header .respCategoryList .categoryDepth1').off('hover');
                    slideshowSwiper = new Swiper('#cateSwiper .designCategoryNavigation', {
                        wrapperClass: 'respCategoryList',
                        slidesPerView: 'auto'
                    });
                    slideshowSwiper.slideTo( (cateIndex-1), 800, false );
                } else if ( window.innerWidth > 1279 && slideshowSwiper != undefined ) {
                    slideshowSwiper.slideTo( 0, 800, false );
                    $('#cateSwiper .designCategoryNavigation ul.respCategoryList>li').removeClass('swiper-slide');
                    slideshowSwiper.destroy();
                    slideshowSwiper = undefined;
                    $('#layout_header .respCategoryList .categoryDepth1').hover(
                        function() { $(this).find('.categorySub').show(); },
                        function() { $(this).find('.categorySub').hide(); }
                    );
                }

                // 꽃청 수정 START 윤상희 2023.04.07 - 네비게이션 수정
                if($('#searchModule').length!=0){
                    if( window.innerWidth < 1024 && $('.logo_wrap .resp_wrap #searchModule').length == 0){
                        $('#searchModule').insertAfter($('.logo_wrap .resp_wrap .resp_top_hamburger'));
                    }else if( window.innerWidth >= 1024 && $('.top_menu_search #searchModule').length == 0){
                        $('#searchModule').insertAfter($('.top_menu_search'));
                    }
                }
                // 꽃청 수정 END
            }
        })
    })( jQuery);
     
</script>


<?php get_footer(); ?>