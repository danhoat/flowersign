<?php get_header(); ?>

<?php get_template_part('templates/home','slider'); ?>

<div class="resp_wrap" style="position:relative;">
    <?php get_template_part('templates/slide','1'); ?>

    <?php get_template_part('templates/home','banner');?>

    <?php get_template_part('templates/slide','2');?>

    <!-- 꽃청 삭제 START 김태섭 2023-06-09 - 작약 띠배너 삭제 후 수국 띠배너 교체 -->
    <!-- 작약 띠배너  -->
    <!-- <a class="bn_peony" href="/goods/brand?code=00020003">
        <h5>신부의 수줍은 고백, 작약!</h5>
        <span>자세히 보기</span>
    </a> -->
    <!-- 수국 띠배너  -->
    <a class="bn_hydrangea" href="/goods/brand?code=00020002">
        <h5>수국으로 진심을 선물해보세요:)</h5>
        <span>자세히 보기</span>
    </a>
    <!-- 꽃청 삭제 END 김태섭 2023-06-09 - 작약 띠배너 삭제 후 수국 띠배너 교체 -->

    <?php get_template_part('templates/slide','3'); ?>

    <div class="bn_support">
    <!-- <a class="bn_support bn_starnight" href="https://f-mans.com/page/support"> -->
        <h5><em>Support</em> 방송&amp;공연 협찬</h5>
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <!-- <span>더 알아보기</span> -->
    <!-- </a> -->
    </div>





    <!-- NEW PRODUCTS -->
    <div class="title_group1" style="display:none;">
        <h3 class="title1"><span designelement="text" textindex="7" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">NEW 4444 text</span></h3>
        <p class="text2" designelement="text" textindex="8" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">꽃집청년들만의 상품을 만나보세요.</p>
    </div>





    <!-- 슬라이드 배너 영역 (light_style_2_4) :: START -->
    <div class="main_slider_b2 sliderB slider_before_loading" style="display:none;">
        <!-- 슬라이드 배너 데이터 영역 :: START -->    <div class="light_style_2_4 designBanner" designelement="banner" templatepath="main/index.html" bannerseq="4"><div class="sslide">  <img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/4/images_1.jpg"> <div class="slide_contents">        <div class="wrap1">         <div class="wrap2">             <ul class="text_wrap">                  <li class="text1">TV CF</li>
<li class="text2">마음을 전하는 꽃집청년들</li>
<li class="sbtns1"><a class="sbtn sbtn1" target="_blank" href="https://www.youtube.com/channel/UCorkJMb3TgAt3SHFKp9dYoA?view_as=subscriber">보러가기</a></li>               </ul>           </div>      </div>  </div></div><div class="sslide">    <img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/4/images_2.jpg"> <div class="slide_contents">        <div class="wrap1">         <div class="wrap2">             <ul class="text_wrap">                  <li class="text1">명화의 탄생</li>
<li class="text2">꽃, 명화(名花)를 표현하다.</li>
<li class="sbtns1"><a class="sbtn sbtn1" href="/goods/brand?code=00020001">바로가기</a></li>                </ul>           </div>      </div>  </div></div><div class="sslide">    <img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/4/images_3.jpg"> <div class="slide_contents">        <div class="wrap1">         <div class="wrap2">             <ul class="text_wrap">                  <li class="text1">SUPPORT</li>
<li class="text2">꽃집청년들 협찬 방송&amp;공연</li>
<li class="sbtns1"><a class="sbtn sbtn1" href="/page/support">바로가기</a></li>             </ul>           </div>      </div>  </div></div>    </div><!-- 슬라이드 배너 데이터 영역 :: END -->
    </div>
    <script type="text/javascript">
    $(function() {
        $('.light_style_2_4').slick({
            dots: true, // 도트 페이징 사용( true 혹은 false )
            autoplay: true, // 슬라이드 자동( true 혹은 false )
            speed: 1000, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 600 == 0.6초 )
            fade: true, // 페이드 모션 사용
            autoplaySpeed: 5000 // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 5000 == 5초 )
        });
        // 이 외 slick 슬라이더의 자세한 옵션사항은 http://kenwheeler.github.io/slick/ 참고
    });
    </script>
    <!-- 슬라이드 배너 영역 (light_style_2_4) :: END -->

    <?php get_template_part('templates/home','tabs'); ?>




    <!-- line 983 !-->
    <?php get_template_part('templates/slide','4');?>


    <?php get_template_part('templates/home','footer');?>



</div>
        <!-- ================= 파트 페이지들 :: END. ================= -->
        </div>
<?php get_footer(); ?>