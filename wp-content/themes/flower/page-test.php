<?php /**
 * Template Name: Page Test
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

<script type="text/javascript" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/search_ver2_ready.js?v=1"></script><!-- 반응형 관련 프론트 js : 검색, 자동검색어 최근본상품 -->

<?php // js_home();?>

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

                                $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
                            
                                if($thumbnail_id){
                                    $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                                    echo '<div><img src="' . $image[0] . '" > </div>'; 
                                } else{ ?>
                                    <div> <img src="<?php echo BOXTHEME_URL;?>/images/cat-rose.png"  /> </div>
                                <?php } ?>
                        </a>
                    </div>
                </div>
                <?php  } ?>

            </div>
        </div>

        <!-- END list categories !-->
        <?php $heading = 'MY Hear All best wish to you';?>

        
        <?php box_block_best_selling();?>
        <?php block_products_by_category($slug = 'hoa-tot-nghiep', $label ='Hoa Tốt Nghiệp');?>
        <?php block_image_vs_button($heading);?>
        <?php block_products_by_category($slug = 'hoa-cuoi', $label ='Hoa Cưới');?>
        <?php block_image_vs_button($heading, $bg = IMAGE_URL.'/banner/bg_hydrangea.jpg');?>
        <?php block_products_by_category($slug = 'hoa-tinh-yeu', $label ='Hoa Tình Yêu');?>
        <?php block_image_vs_button($heading);?>

        <?php the_post(); ?>


        <div class="post-content">
            <?php  //  the_content(); ?>
        </div>
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
        <img src="<?php echo IMAGE_URL;?>/home/img-love-story.png" width="300">
        </center>
        <div class="cl-6 love-story ">
            <h2>Love Story</h2>
            <div class="text-center right-text-styling w-50 mx-auto">
                <p>FlowerSight tự hào là một trong những shop hoa tươi Sài Gòn, Hà Nội uy tín và có tiếng trong ngành. Chúng tôi cung cấp dịch vụ đặt hoa online, đặt hoa tươi TPHCM và Hà Nội ship siêu tốc trong ngày. Tiệm hoa tươi giá rẻ ở Sài Gòn FlowerSight mang đến cho khách hàng những bó hoa, lẵng hoa, giỏ hoa tặng sinh nhật, hoa khai trương, hoa cưới cầm tay,hoa chia buồn, hoa sự kiện đầy nghệ thuật hay hoa tang tỏ lòng thành kính</p>
            </div>
        </div>
    </div>
</div>




<div class="full block-testimonial">
    <div class="container">
        <?php get_template_part('testimonial/slider');?>


    </div>
</div>

<?php get_footer(); ?>