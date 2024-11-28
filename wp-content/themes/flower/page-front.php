<?php /**
 * Template Name: Front page
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

<?php js_home();?>

<?php if( wp_is_mobile() ){ ?>
    <div id="layout_body" class="layout_body page-front.php">
    <?php } else { ?>
    <div style="width: 100%; max-width: 100%; overflow: hidden;">
<?php } ?>

<?php  include('home-intro.php'); // slide-intro.php  ?>
</div>
    <div id="layout_body" class="layout_body page-front.php">
        <div class="resp_wrap 99999 home" style="position:relative;">

        <?php the_post(); ?>

        <div class="post-content">
            <?php  the_content(); ?>
        </div>
            

<?php get_footer(); ?>