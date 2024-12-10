<?php 
function box_left_swing(){ ?>

    <?php 

    if( is_home() || is_front_page() ){
     
    
    ?>


        <style type="text/css">
        .wing_area {position:absolute;}
        .left_wing_area {left:-90px; width:90px; height:155px; visibility:hidden;}
        .left_wing_area img {width:90px; height:155px;}
        .right_wing_area {right:-125px; width:125px; height:125px; visibility:hidden;}
        .right_wing_area img {width:125px; height:125px;}
        @media only screen and (max-width:1555px) { /*1340 + 윙배너 2개 크기*/
        .wing_area {display:none;}
        }
    </style>

    <!-- 꽃청 수정 START 윤상희 2023.04.07 - 정기구독 인트로 예외처리 -->
        <!-- 꽃청 수정 END -->
    <div class="wing_area left_wing_area" style=""><!-- 순간배송(윙배너) 배너 -->
        <a href="/page/sub/delivery">

        <img src="<?php echo BOXTHEME_URL;?>/images/banner/out_today.png" alt="전국어디든 오늘주문 오늘배송">
        </a>
        <a href="/page/paypal" style="display:block;margin:10px 0 0 0;">
        <img src="<?php echo BOXTHEME_URL;?>/images/banner/wing_banner_paypal.png" alt="페이팔 결제 가이드">
        </a>
    </div>

    <div class="wing_area right_wing_area" style="display:none;">
    <!--<img src="https://hammersoftware.ca/wp-content/uploads/2015/03/PHP-logo.png">-->
    </div>
    <script type="text/javascript">
    // 꽃청 수정 START 윤상희 2023.04.21 - 윙배너 위치 수정
    var main_slide_height = 30;
    // 꽃청 수정 END
    var nav_category_area_height = 0;
    var layout_footer_height = 0;
    function decide_wing_position(){
    //네비게이션바 위치 + 네비게이션바 높이 50 + (index면 메인화면 슬라이드) - 상단팝업 높이
    wing_up = nav_category_area_height+main_slide_height-$('.bn_top').height();
    wing_down = layout_footer_height-155;
    scroll = $(window).scrollTop();
    if( $(window).scrollTop() < wing_up ){
        scroll = wing_up;
    }else if( $(window).scrollTop() > wing_down ){
        scroll = wing_down
    }
    }


    $(document).ready(function(){
    $(window).scroll(function() {
        
        var check = $(".sidebar").scrollTop();

        var y = window.scrollY;
        console.log('y:', y);
        if( y > 500){
            $(".sidebar").addClass('sticky');
        } else{
            $(".sidebar").removeClass('sticky');
        }
    });

    <?php if( is_home() || is_front_page() ){ ?>
        nav_category_area_height = $('.nav_category_area').offset().top+50;
        layout_footer_height = $('.layout_footer').offset().top-40;
        //최초 로드시 위치 지정
                                main_slide_height = $('.custom_slider').height()+453;
                            decide_wing_position();
        $('.wing_area').css('top',wing_up+'px').css('visibility','visible');

        //스크롤시 위치 지정
        
        $(window).scroll(function() {
            nav_category_area_height = $('.nav_category_area').offset().top+50;
            layout_footer_height = $('.layout_footer').offset().top-40;
            decide_wing_position();
            var timer = setTimeout(function(){
                // 꽃청 추가 START 윤상희 2023.04.21 - 윙배너 위치 수정
                if($('.catalog_title.flying').length > 0){
                    scroll = scroll + 10;
                }
                // 꽃청 추가 END
                $('.wing_area').animate({'top':scroll+'px'});
                $('.wing_area').clearQueue();
                clearTimeout(timer);
            }, 100);
        })
    <?php } else{ ?>
        //스크롤시 위치 지정
        nav_category_area_height = $('.nav_category_area').offset().top+50;
        layout_footer_height = $('.layout_footer').offset().top-40;
        //최초 로드시 위치 지정
                            decide_wing_position();
        $('.wing_area').css('top',wing_up+'px').css('visibility','visible');

        //스크롤시 위치 지정
        $(window).scroll(function() {
            nav_category_area_height = $('.nav_category_area').offset().top+50;
            layout_footer_height = $('.layout_footer').offset().top-40;
            decide_wing_position();
            var timer = setTimeout(function(){
                // 꽃청 추가 START 윤상희 2023.04.21 - 윙배너 위치 수정
                if($('.catalog_title.flying').length > 0){
                    scroll = scroll + 10;
                }
                // 꽃청 추가 END
                $('.wing_area').animate({'top':scroll+'px'});
                $('.wing_area').clearQueue();
                clearTimeout(timer);
            }, 100);
        })


    <?php }?>

    //화면 리사이즈 위치 지정
    $( window ).resize(function() {
        var timer = setTimeout(function(){
                                        decide_wing_position();
            // 꽃청 추가 START 윤상희 2023.04.21 - 윙배너 위치 수정
            if($('.catalog_title.flying').length > 0){
                scroll = scroll + 60;
            }
            // 꽃청 추가 END
            $('.wing_area').animate({'top':scroll+'px'});
            $('.wing_area').clearQueue();
            clearTimeout(timer);
        }, 100);
    });

    // 꽃청 추가 START 윤상희 2023.04.21 - 윙배너 위치 수정
    $(window).load(function(){
        if($('.catalog_title.flying').length > 0){
            $(window).resize();
        }
    });
    // 꽃청 추가 END
    });
    </script>
    <!--윙배너 끝-->

    <?php } ?>
<?php } ?>