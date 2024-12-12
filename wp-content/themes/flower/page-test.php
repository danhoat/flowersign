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
        <div class="theme_content">
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
        <?php block_products_by_category($slug = 'hoa-tot-nghiep', $label ='Hoa Tốt Nghiệp');?>
        <?php block_image_vs_button($heading, $bg = 'https://demo.dichvu139.com/wp-content/uploads/2024/12/bg_hydrangea.jpg');?>
        <?php box_block_best_selling();?>
        <?php block_image_vs_button($heading);?>

        <?php the_post(); ?>

        <div class="post-content">
            <?php  the_content(); ?>
        </div>
    </div>    

<?php get_footer(); ?>