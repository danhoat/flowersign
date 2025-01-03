<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head();?>



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<?php 
if( !is_singular('product')  ){?>
    
    <link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/slick.css"><!-- 반응형 슬라이드 -->
    <link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/goods_info_style.css?v=2"><!-- 상품디스플레이 CSS -->
<?php } else{ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/jquery-ui-1.8.16.custom.css"> <!-- css calendar !-->
<?php }?>
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/goods_info_user.css"><!-- ++++++++++++ 상품디스플레이 사용자/제작자 CSS ++++++++++++ -->
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/lib.css">
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/common.css?date=20241013&amp;v=11">
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/board.css?date=20241013&amp;v=12">
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/buttons.css">
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/mobile_pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/quick_design.css">

<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/broadcast.css">


<!-- // 꽃청 수정 START 홍우기 20.07.31 - 상대경로에서 절대경로로  -->
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/user.css?date=20241013&v=111">
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/modal.css?date=20241013&v=1">
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/_layout.css?date=20241013&v=1">


<!-- css 추가 상세페이지 및 추가 디자인 부분 -->
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/detail.css?date=20241013&ver=22"><!-- ++++++++++++ 상세페이지 및 공통 부분 CSS ++++++++++++ -->


<!-- 꽃청 추가 START 김태섭 2023-12-18 - splide -->
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/splide.min.css">
<!-- 꽃청 추가 END 김태섭 2023-12-18 - splide -->


<link rel="stylesheet" href="<?php echo BOXTHEME_URL;?>/css/swiper.css">
<!-- /CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo BOXTHEME_URL;?>/css/jquery_swipe.css">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/brands.min.css" integrity="sha512-sKhd1NGM4i4pJj+3P+NVHisu2z5rKAwNG1IpWMdKsFWYlUHFSrsAO3geQ5QNKttkMPZNTo76tfg8jVx2ICP7qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/regular.min.css" integrity="sha512-rxPM3RF3aiHhAtBSArcLR4reox2y22lhd/3eR5Wnk5HeeZuEslUaFmCwg6b5NKm1xeHZiAew3RVa8TI8ySLxPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css"> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- 꽃청 추가 END 김태섭 2023-12-18 - splide -->






<!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
     -->

<script>
var REQURL = '/';
var WINDOWWIDTH = window.innerWidth;
// sns 만14세 동의 체크 변수
var kid_agree = "";
</script>

<?php 
    if(LOAD_STATIC_JS){
        box_js_static();
    }
?>
<?php js_home(); ?>
</head>
<body <?php body_class();?>>
<div id="wrap">
    <!-- ================= 어사이드 :: START. 파일위치 : _modules/common/layout_side.html (비동기 로드) ================= -->
   
    <?php include('nav.php');?>


    <!-- ================= 어사이드 :: END. 파일위치 : _modules/common/layout_side.html (비동기 로드) ================= -->
    <a href="javascript:;" id="side_close" class="side_close">어사이드 닫기</a>

    <div id="layout_wrap" class="layout_wrap">
        <!-- ================= #LAYOUT_HEADER :: START. 파일위치 : layout_header/standard.html (default) ================= -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ #LAYOUT_HEADER @@
- 파일위치 : [스킨폴더]/layout_header/standard.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<div id="layout_header" class="layout_header">

        <div class="bn_top bn_top_div">
            <a href="javascript:void(0);" designelement="text" textindex="1">
                <p>
                    <!-- 지금 회원가입하면 할인/적립/페이백 혜택! -->
                    Giảm 30 nghìn cho khách hàng mới 
                    <span></span>
                    <button onclick="event.stopPropagation(); $('.bn_top_div').slideUp(); $.cookie('bn_top_cookie','1',{expire: '1',path: '/'});">닫기</button>
                </p>
            </a>
        </div>
    
    <div class="util_wrap">
        <div class="resp_wrap" style="position:relative;">

           <?php box_left_swing();?>

        </div>
    </div>
    <div class="logo_wrap">
        <div class="resp_wrap">
            <!-- logo -->
            <h1 class="logo_area">
                <a href="<?php echo home_url();?>" target="_self">
                    <img src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/design/resp_logo_sample.png" title="(주)청년들" alt="(주)청년들">
                </a>
            </h1>


            <div class="resp_top_hamburger">

                <a href="#category" class="hamberger_menu"><b>aside menu</b><h2>MENU</h2></a>

            </div>
            <?php if(wp_is_mobile() ){ module_search_html(); } ?>

            <a href="/order/cart" class="resp_top_cart"> <span class="cart_cnt2">0</span></a>

            <div class="gnb_bnr_slide gnb_bnr_slide_02 slider_before_loading">
                <div class="slider_gon">
                    <!-- 슬라이드 배너 데이터 영역 :: START -->    
                    <div class="light_style_1_2 designBanner" >
                        <div class="sslide">
                            <a class="slink" href="#" target="_self">
                            <img class="simg" src="<?php echo IMAGE_URL;?>/slider/images_1.jpg"></a>
                        </div>
                        <div class="sslide">
                            <a class="slink" href="#" target="_self">
                            <img class="simg" src="<?php echo IMAGE_URL;?>/slider/images_2.jpg"></a>
                        </div>
                        <div class="sslide">
                            <a class="slink" href="#" target="_self">
                                <img class="simg" src="<?php echo IMAGE_URL;?>/slider/images_3.jpg">
                            </a>
                        </div>
                     </div>
                </div>
            </div>
            <script type="text/javascript">
                (function($){
                    $(document).ready(function(){
                        $('.light_style_1_2').slick({
                            autoplay: true,
                            vertical: true,
                            speed: 400,
                            autoplaySpeed: 6000,
                        });
                    });
                }(jQuery));
            </script>
        </div>
    </div>

    <?php get_template_part('templates/primary','menu');?>


</div>

