<?php get_header();?>
    <!-- 카테고리 전체 네비게이션 팝업 START -->
    <div id="categoryAll_wrap" class="categoryAll_wrap" style="display:none;">
        <div class="categoryAllContainer"><!-- 로딩 파일위치 : [스킨폴더]/_modules/category/all_navigation.html --></div>
    </div>
    <!-- 카테고리 전체 네비게이션 팝업 END -->

    <!-- 브랜드 전체 네비게이션 팝업 START -->
    <div id="brandAll_wrap" class="brandAll_wrap" style="display:none;">
        <div class="brandAllContainer"><!-- 로딩 파일위치 : [스킨폴더]/_modules/brand/all_navigation.html --></div>
    </div>
    <!-- 브랜드 전체 네비게이션 팝업 END -->

    <!-- 지역 전체 네비게이션 팝업 START -->
    <div id="locationAll_wrap" class="locationAll_wrap" style="display:none;">
        <div class="locationAllContainer"><!-- 로딩 파일위치 : [스킨폴더]/_modules/location/all_navigation.html --></div>
    </div>
    <!-- 지역 전체 네비게이션 팝업 END -->

</div>
<!-- 상단영역 : 끝 -->


<!-- 모바일 카카오톡 아이콘 (플로팅) -->
<div class="quick_kakao">
    <a href="https://pf.kakao.com/_Kyfxhl" target="_blank">
        <img src="https://f-mans.com/data/images/icon/footer/icon_kakao.png" alt="카카오 문의하기">
    </a>
</div>
<!-- 모바일 카카오톡 아이콘 (플로팅) 끝 -->



<script type="text/javascript" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/common/search_ver2_ready.js?v=1"></script><!-- 반응형 관련 프론트 js : 검색, 자동검색어 최근본상품 -->
<script type="text/javascript">
var resp_loc_top;
function flyingTitleBar() {
    //var resp_loc_top = $("#layout_header .logo_wrap").offset().top;
    var additional_add = $("#layout_header .parentsday_2021_top_banner").innerHeight();
    var obj = $("#layout_header .logo_wrap");
    var obj_H = $("#layout_header .logo_wrap").outerHeight();
    $(document).scroll(function(){
        //alert( resp_loc_top );
        if ( ( $('.designPopupBand').is(':hidden') || $('.designPopupBand').length < 1 )  && window.innerWidth < 480 ) {
            if ( $("#layout_header .util_wrap").is(':hidden') ) {
                resp_loc_top = 0;
            } else {
                resp_loc_top = $("#layout_header .util_wrap").outerHeight(); // 띠배너 클로즈시 보정
            }
        }
        if(resp_loc_top + additional_add < $(document).scrollTop() && window.innerWidth < 480 ){
            /*홍우기*/
                            obj.addClass("flying");
                if ( !$('#gonBox').length ) {
                    $('#layout_header .logo_wrap').before('<div id="gonBox"></div>');
                    $('#gonBox').css( 'height', obj_H + 'px' );
                }
                    } else {
            obj.removeClass('flying');
            if ( $('#gonBox').length ) {
                $('#gonBox').remove();
            }
        }
    });
}

$(function(){
    // 텍스트 수정기능을 통해 소스에 박혀있는 카테고리 삭제시 --> 항목 삭제
    $('#cateSwiper .custom_nav_link').each(function(e) {
        if ( $(this).find('a').text() == '' ) {
            $(this).remove();
        }
    });

    /* 카테고리 활성화 */
    var url2, cateIndex;
    $('#layout_header .designCategoryNavigation .respCategoryList>li').each(function() {
        url2 = $(this).find('a').attr('href');
        if ( REQURL == url2 ) {
            // 꽃청 수정 START 윤상희 2023.04.07 - 네비게이션 수정
            if($(this).is(":hidden")){
                cateIndex = -1;
            }else{
                if($('#layout_header .designCategoryNavigation .respCategoryList>li.on').length == 0){
                    cateIndex = $(this).index();
                }else{
                    cateIndex = -1;
                }
            }
            // 꽃청 수정 END
        } else if ( REQURL != url2 && ( REQURL.substr( 0, REQURL.length-4 ) == url2 || REQURL.substr( 0, REQURL.length-8 ) == url2) ) {
            // 1depth 카테고리 일치하는 요소가 없는 경우 2뎁스에서 검색
            cateIndex = $(this).index();
        }
    });
    $('#layout_header .designCategoryNavigation .respCategoryList>li').eq(cateIndex).addClass('on');
    /* //카테고리 활성화 */

    /* 카테고리 swiper 동작( 1024 미만인 경우 동작, 1024 이상인 경우 : 마우스 오버시 서브메뉴 노출 ) */
    var slideshowSwiper = undefined;
    if ( window.innerWidth < 1280 && $('#cateSwiper .designCategoryNavigation').length > 0 ) {
        $('#cateSwiper .designCategoryNavigation ul.respCategoryList>li').addClass('swiper-slide');
        slideshowSwiper = new Swiper('#cateSwiper .designCategoryNavigation', {
            wrapperClass: 'respCategoryList',
            slidesPerView: 'auto'
        });
        slideshowSwiper.slideTo( (cateIndex-1), 800, false );
    } else {
        $('#cateSwiper .designCategoryNavigation ul.respCategoryList>li').removeClass('swiper-slide');
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

    $( window ).resize(function() {
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
    });
    /* //카테고리 swiper 동작( 1024 미만인 경우 동작, 1024 이상인 경우 : 마우스 오버시 서브메뉴 노출 ) */

    //================= 카테고리 전체 네비게이션 START ====================
    $('.categoryAllBtn').click(function() {
        $('#categoryAll_wrap .categoryAllContainer').load('/common/category_all_navigation', function() {
            $('#categoryAll_wrap').show();
            $('body').css( 'overflow', 'hidden' );
        });
    });
    $('#categoryAll_wrap').on('click', '.categoryAllClose', function() {
        $('#categoryAll_wrap').hide();
        $('body').css( 'overflow', 'auto' );
    });
    //================= 카테고리 전체 네비게이션 END  ====================

    //================= 브랜드 전체 네비게이션 START ====================
    $('.brandAllBtn').click(function() {
        $('#brandAll_wrap .brandAllContainer').load('/common/brand_all_navigation', function() {
            $('#brandAll_wrap').show();
            $('body').css( 'overflow', 'hidden' );
        });
    });
    $('#brandAll_wrap').on('click', '.brandAllClose', function() {
        $('#brandAll_wrap').hide();
        $('body').css( 'overflow', 'auto' );
    });
    //================= 브랜드 전체 네비게이션 END  ====================

    //================= 지역 전체 네비게이션 START ====================
    $('.locationAllBtn').click(function() {
        $('#locationAll_wrap .locationAllContainer').load('/common/location_all_navigation', function() {
            $('#locationAll_wrap').show();
            $('body').css( 'overflow', 'hidden' );
        });
    });
    $('#locationAll_wrap').on('click', '.locationAllClose', function() {
        $('#locationAll_wrap').hide();
        $('body').css( 'overflow', 'auto' );
    });
    //================= 지역 전체 네비게이션 END  ====================

    // GNB 검색 관련
    $('#respTopSearch .search_open_btn').click(function() {
        $('#respTopSearch .search_form').addClass('animating');
        $('#respTopSearch .search_text').focus();
    });
    $('#respTopSearch .search_close_btn').click(function() {
        $('#respTopSearch .search_form').removeClass('animating');
    });

    // 타이틀바 띄우기
    flyingTitleBar();
    $( window ).on('resize', function() {
        if ( window.innerWidth != WINDOWWIDTH ) {
            flyingTitleBar();
        }
    });

    /* 카테고리 네비게이션 서브레이어 포지션 변화 */
    var category1DepthNum = $('.respCategoryList .categoryDepth1').length;
    var rightCategoryStandard = Math.floor( category1DepthNum / 2 );
    $('.respCategoryList .categoryDepth1').each(function(e) {
        if ( e > rightCategoryStandard ) {
            $('.respCategoryList .categoryDepth1').eq(e).addClass('right_area');
        }
    });
    /* 카테고리 네비게이션 서브레이어 포지션 변화 */

    $('.designPopupBand .designPopupClose').on('click', function() {
        // 띠배너 닫기 클릭시
    });
});

// 꽃청 추가 START 홍우기 2022.08.17 - GoogleAds
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-954660897/9KZmCOyCndYDEKHwm8cD',
      'event_callback': callback
  });
  return false;
}
// 꽃청 추가 END
</script>
        <!-- ================= #LAYOUT_HEADER :: END. 파일위치 : layout_header/standard.html (default) ================= -->

        <div id="layout_body" class="layout_body">
        <!-- ================= 파트 페이지들 :: START. ================= -->



<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ index @@
- 파일위치 : [스킨폴더]/main/index.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->







<script>
if( window.SwingJavascriptInterface != undefined )
{
    //localStorage.clear();
    if( !localStorage.getItem("first_access") ){
        localStorage.setItem("first_access", "1");
        var x = document.createElement("div");
        x.className = "designPopup ui-draggable";
        x.innerHTML +=  '<div class="designPopupBody"><a href="/page/event/appdownload" target="_self"><img src="https://f-mans.com/data/popup/app_popup.jpg"></a></div>';
        x.innerHTML +=  '<div class="designPopupBar" style="cursor: move;"><div class="designPopupTodaymsg"><label onclick="pop_close()"><input type="checkbox"> 오늘 하루 이 창을 열지 않음</label></div><div class="designPopupClose"><a href="javascript:void(0)" onclick="pop_close()">닫기</a></div></div>';
        $("#layout_body").prepend(x)
    }
    function pop_close(){
        $('.designPopup').remove();
        $('#designPopupModalBack').remove();
    }
}
</script>
<style type="text/css">
#layout_body { max-width:100%; padding-left:0; padding-right:0; overflow: hidden; }


/* 하단 정보 (메인에서 하단 배너를 붙이기 위해 수정 된 코드) */
.layout_footer {margin-top: 0px;}
/* 하단 정보 끝*/
</style>

<!-- 비주얼 배너 -->
<!-- 비주얼배너 -->
<div class="slide-intro">
    <div id="image-carousel" class="splide" aria-label="">
        <div class="splide__track">
            <ul class="splide__list">
                <!--  날짜설정 -->
                                <!-- DIY 타임세일 -->
                <li class="splide__slide">
                    <a href="/page/event/timesale/timesale">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/timesale_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/timesale_m.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2 style="color:#FFD703;">10월 어썸 특가!</h2>
                            <h3 style="color:#FFD703;">선선한 가을바람 타고온<br>가을꽃 감성템 강추(秋) SALE</h3>
                            <div class="fm_btn" style="background-color: rgba(255, 215, 3, 1.0); color: #B64602;">타임딜 특가 보러가기</div>
                        </div>
                    </a>
                </li>
                                <!--  //날짜설정 -->
                  
                <li class="splide__slide" data-splide-interval="4000">
                    <a href="#" class="btn_tvcf01">
                        <div class="splide__slide_pc">
                            <div style="position: relative;">
                                <img src="https://f-mans.com/data/images/visual/mind_pc.jpg" alt="">
                                <div style="position: absolute; left: 0; top: 0; width: 100%; height: 100%;">
                                    <video classname="" autoplay="" loop="" muted="" playsinline="" poster="https://f-mans.com/data/images/visual/mind_pc.jpg" width="100%" height="100%">
                                        <source src="https://f-mans.com/data/images/visual/ending_pc.webm" type="video/webm">
                                        <source src="https://f-mans.com/data/images/visual/ending_pc.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide_mobile">
                            <div style="position: relative;">
                                <img src="https://f-mans.com/data/images/visual/mind_m.jpg" alt="">
                                <div style="position: absolute; left: 50%; top: 0; width: 100%; height: 100%; transform:translateX(-50%);">
                                    <video classname="" autoplay="" loop="" muted="" playsinline="" poster="https://f-mans.com/data/images/visual/mind_m.jpg" width="100%" height="100%">
                                        <source src="https://f-mans.com/data/images/visual/ending_m.webm" type="video/webm">
                                        <source src="https://f-mans.com/data/images/visual/ending_m.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="fm_text_box">
                            <h2>마음을 전하다</h2>
                            <h3>전국 당일 배송은 꽃집청년들</h3>
                            <div class="fm_btn" style="color: rgba(0, 59, 91, 0.8);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM10.1637 7.65625L5.35117 10.418C4.91914 10.6586 4.375 10.3496 4.375 9.84375V4.15625C4.375 3.65313 4.91641 3.34141 5.35117 3.58203L10.1637 6.50781C10.6121 6.75937 10.6121 7.40742 10.1637 7.65625Z" fill="rgba(0, 59, 91, 0.8)"></path>
                                </svg>
                                TV CF 보기
                            </div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/page/sub/famous">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/famous_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/famous_m.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2>명화를 꽃으로 만나다</h2>
                            <h3>꽃집청년들에만 있는 특별한 꽃</h3>
                            <div class="fm_btn" style="color: rgba(42, 19, 23, 0.8);">명화꽃 보러가기</div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/goods/catalog_list?code=0007">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/diy_pc_240214.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/diy_m_240214.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2 style="color:#7C574F;">DIY 꽃시장</h2>
                            <h3 style="color:#7C574F;">나만의 스타일로 공간을 연출해보세요.</h3>
                            <div class="fm_btn" style="color: rgba(124, 87, 79, .8);">DIY 꽃시장 구경가기</div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/page/event/appdownload">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/app_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/app_m.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2>앱으로 회원 가입시</h2>
                            <h3>최대 4,500원 지급혜택을 드려요</h3>
                            <div class="fm_btn" style="color: rgba(56, 107, 139, 0.8);">앱 설치하러 가기</div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/goods/brand?code=00160006">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/oeun_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/oeun_m.jpg?a1" alt=""></div>
                        <div class="fm_text_box">
                            <h2 style="color:#FFFFFF;">오은영과 함께하는</h2>
                            <h3 style="color:#FFFFFF;">뷰티 브랜드 오은 X 꽃집청년들</h3>
                            <div class="fm_btn" style="color: rgba(255, 125, 153, .8);">상품 보러가기</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    var splide = new Splide('.splide', {
        width: '1010px',
        padding: '45px',
        gap: '10px',
        type: 'loop',
        autoplay: 'true',
        interval: '5000',
    });

    splide.mount();
</script>
<!-- //비주얼배너 -->

<!-- 
클로즈 배너 백업
<li class="splide__slide" data-splide-interval="6000">
    <a href="#" class="btn_tvcf01">
        <div class="splide__slide_pc">
            <div style="position: relative;">
                <img src="https://f-mans.com/data/images/visual/cf_pc.jpg" alt="">
                <div style="position: absolute; left: 0; top: 0; width: 100%; height: 100%;">
                    <video className="" autoPlay loop muted playsinline poster="https://f-mans.com/data/images/visual/cf_pc.jpg" width="100%" height="100%">
                        <source src="https://f-mans.com/data/images/visual/tf_pc.webm" type="video/webm" />
                        <source src="https://f-mans.com/data/images/visual/tf_pc.mp4" type="video/mp4" />
                    </video>
                </div>
            </div>
        </div>
        <div class="splide__slide_mobile">
            <div style="position: relative;">
                <img src="https://f-mans.com/data/images/visual/cf_m.jpg" alt="">
                <div style="position: absolute; left: 50%; top: 0; width: 100%; height: 100%; transform:translateX(-50%);">
                    <video className="" autoPlay loop muted playsinline poster="https://f-mans.com/data/images/visual/cf_m.jpg" width="100%" height="100%">
                        <source src="https://f-mans.com/data/images/visual/tf_m.webm" type="video/webm" />
                        <source src="https://f-mans.com/data/images/visual/tf_m.mp4" type="video/mp4" />
                    </video>
                </div>
            </div>
        </div>
        <div class="fm_text_box">
            <h2>T도 F가 되는 매직</h2>
            <h3>FLOWER 앞에선</h3>
            <div class="fm_btn" style="color: rgba(0, 0, 0, .8);">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM10.1637 7.65625L5.35117 10.418C4.91914 10.6586 4.375 10.3496 4.375 9.84375V4.15625C4.375 3.65313 4.91641 3.34141 5.35117 3.58203L10.1637 6.50781C10.6121 6.75937 10.6121 7.40742 10.1637 7.65625Z" fill="rgba(0, 0, 0, .8)"/>
                </svg>
                TV CF 보러가기
            </div>
        </div>
    </a>
</li>
-->

<!-- TVCF 영상 modal winddow : 서민혁 210805 -->
<div id="modal_tvcf01">
    <div class="tvcf_content">
        <a href="#" class="btn_modal_close">
            <span></span>
            <span></span>
        </a>

        <div class="modal_movie modal_movie01">
            <iframe class="tvcf01" src="https://www.youtube.com/embed/w0TcX4nKzyg?si=ofGM59Tx8_d81nDX" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var embed1 = $('.tvcf01');

        $(".btn_tvcf01").click(function () {
            $("#modal_tvcf01").css('display', 'flex');
            $('.modal_movie').append(embed1);
            return false;
        });

        $("#modal_tvcf01 .btn_modal_close").click(function () {
            $("#modal_tvcf01").css('display', 'none');
            $('.modal_movie').empty();
        });

        $("body").click(function () {
            $("#modal_tvcf01").css('display', 'none');
            $('.modal_movie').empty();
        });

    })
</script>

<!-- TVCF 영상 modal winddow 끝 -->

<!-- 테마 메뉴 -->
<!-- 꽃청 수정 START 김태섭 2023-07-04 - 테마메뉴 UI -->
<div class="theme_content">
    <div class="row g-3 g-md-2">
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <a href="/goods/catalog_list?code=0001">
                    <div class="theme_text">꽃선물</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/flower-94.png" alt=""></div>
                </a>
            </div>
        </div>
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <a href="/goods/catalog_list?code=0002">
                    <div class="theme_text">개업축하</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/04/plant.png" alt=""></div>
                </a>
            </div>
        </div>
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <a href="/goods/catalog_list?code=0003">
                    <div class="theme_text">승진취임</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/04/orchid.png" alt=""></div>
                </a>
            </div>
        </div>
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <a href="/goods/catalog_list?code=0004">
                    <div class="theme_text">결혼/장례</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/04/wreath.png" alt=""></div>
                </a>
            </div>
        </div>
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <!--  날짜설정 -->
                                                <a href="/goods/brand?code=00160006">
                    <div class="theme_text">출산/육아</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/oeun.png" alt=""></div>
                </a>
                            </div>
        </div>
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <a href="/goods/brand?code=0019">
                    <div class="theme_text">선물 더하기</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/04/gift.png" alt=""></div>
                </a>
            </div>
        </div>
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <a href="/goods/catalog_list?code=0007">
                    <div class="theme_text">꽃시장</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/04/diy.png" alt=""></div>
                </a>
            </div>
        </div>
        <div class="col col-md-3">
            <div class="theme_box_1220">
                <a href="/subscribe/intro">
                    <div class="theme_text">정기구독</div>
                    <div><img src="https://f-mans.com/data/images/theme/2024/04/subscribe.png" alt=""></div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- 꽃청 수정 END 김태섭 2023-07-04 - 테마메뉴 UI -->

<!-- 테마메뉴 끝 -->

<!-- 해당 아이피에서만 노출 -->
 <!-- 해당 아이피에서만 노출 닫음 -->

<!-- 어버이날 배송불가지역 -->
<!-- 어버이날 - 배송불가 지역 탭메뉴 형식 -->
 <!-- 해당 날짜와 시간에 오픈 -->
<!-- 어버이날 - 배송불가 지역 탭메뉴 형식 끝 -->
    
<!-- 해당 아이피에서만 노출 -->
 <!-- 해당 아이피에서만 노출 닫음 -->
    
    




<div class="resp_wrap" style="position:relative;">

    <?php get_template_part('templates/slide','1'); ?>

    <!-- 명화 띠배너  -->
    <a class="bn_famous bn_starnight" href="/page/sub/famous">
        <h5>꽃, 명화(名花)를 표현하다.</h5>
        <span>자세히 보기</span>
    </a>



    <!-- 배너 모음 및 화환 -->
    <ul class="main_bnr_c1">
        <li class="left_area">
            <a href="#">
                <!-- 좌측 긴배너 (627x242) -->
                </a><a href="/page/award" target="_self"><img src="images/ban_award_2023.png" title="" alt=""></a>
            
            <ul class="main_bnr_c1_2 Pt6">
                <li class="left_area">
                    <a href="#">
                        <!-- 좌측 하단 01 (205x200) -->
                        </a><a href="https://pf.kakao.com/_Kyfxhl" target="_blank" onclick="window.open('https://pf.kakao.com/_Kyfxhl', 'kakao', 'width=480, height=640');return false;">
                            <img src="images/resp_bnr_main_102.jpg" title="" alt=""></a>
                    
                </li>
                <li class="center_area">
                    <a href="#">
                        <!-- 좌측 하단 02 (205x200) -->
                        </a><a href="https://talk.naver.com/ct/wc4604" target="_blank" onclick="window.open('https://talk.naver.com/wc4604', 'talktalk', 'width=471, height=640');return false;">
                            <img src="images/resp_bnr_main_103.jpg" title="" alt=""></a>
                    
                </li>
                <li class="right_area">
                    <a href="#" target="_self">
                        <!-- 좌측 하단 03 (205x200) -->
                        </a><a href="/page/paypal" target="_self"><img src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/design/resp_bnr_main_104.jpg" title="" alt=""></a>
                    
                </li>
            </ul>
        </li>

        <!-- 화환 영역 627x448 사이즈 eye design 으로 수정  -->
        <li class="right_area">
            <!-- 슬라이드 배너 영역 (light_style_1_3) :: START -->
            <div class="sliderA slider_before_loading">
                <!-- 슬라이드 배너 데이터 영역 :: START -->    <div class="light_style_1_3 designBanner" designelement="banner" templatepath="main/index.html" bannerseq="3"><div class="sslide"><a class="slink" href="/goods/catalog?code=0007" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/3/images_1.png"></a></div><div class="sslide"><a class="slink" href="/goods/catalog?code=0008" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/3/images_2.png"></a></div>    </div><!-- 슬라이드 배너 데이터 영역 :: END -->
            </div>
            <script type="text/javascript">
            $(function() {
                $('.light_style_1_3').slick({

                    dots: true, // 도트 페이징 사용( true 혹은 false )
                    autoplay: true, // 슬라이드 자동( true 혹은 false )
                    speed: 800, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 800 == 0.8초 )
                    autoplaySpeed: 4000 // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 4000 == 4초 )
                });
                // 이 외 slick 슬라이더의 자세한 옵션사항은 http://kenwheeler.github.io/slick/ 참고
            });
            </script>
            <!-- 슬라이드 배너 영역 (light_style_1_3) :: END -->
        </li>
    </ul>
    <!-- 배너 모음 및 화환 끝 -->

    <!--  해당 날짜에 노출 및 미노출 설정 -->
    <!-- 해당 날짜 노출 끝 -->




    <div class="title_group1">
        <h3 class="title1"><span designelement="text" textindex="3" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">꽃선물</span></h3>
        <p class="text2" designelement="text" textindex="4" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">한아름 피어나는 싱그러운 미소를 상상해요.</p>
    </div>
    <div data-effect="scale opacity">
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ [반응형] 디스플레이 템플릿 - 스와이프형 @@
- 파일위치 : [스킨폴더]/_modules/display/goods_display_sizeswipe.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<style>
    .designDisplay_670aa31dbdc10 .goods_list ol.gli_contents { text-align:center;}
    .designDisplay_670aa31dbdc10 .swiper-slide>li.gl_item { width:300px;  }
</style>

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁 -->

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁  끝 -->


<div id="designDisplay_670aa31dbdc10" class="designDisplay" designelement="display" templatepath="main/index.html" displayseq="10150" perpage="" category="" displaystyle="sizeswipe">
          <div class="designDisplay_670aa31dbdc10 display_slide_class displaySwipeTabContentsContainer" tabidx="0">
              <div class="goods_display_slide_wrap">
                  <div class="swiper-wrapper">
                    <!-- ------- 상품정보. 파일위치 : /data/design/ ------- -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ goods_info_style_2 @@
- 파일 위치 : /data/design/goods_info_style_2.html
- CSS 경로 : /data/design/goods_info_style.css
- 상품정보 관련 CSS 수정 및 추가는 다음의 CSS파일에서 작업하시기 바랍니다.
/data/design/goods_info_user.css
※ /data 폴더는 /skin 폴더 상위 폴더입니다.
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<ul class="goods_list swiper-slide">    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('696','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2022/11/696_temp_16673666742102list1.jpg" data-src="https://f-mans.com/data/goods/1/2022/11/696_temp_16673666742102list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="계절꽃다발">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 696)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 696);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 696);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '696', '계절꽃다발' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=696">계절꽃다발</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">계절꽃다발은 전국 해당지점에서 당일 가장 신선한 꽃으로 제작됩니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">56,900</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('143','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/143_temp_16972588479416list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/143_temp_16972588479416list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="별이빛나는밤">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 143)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 143);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 143);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '143', '별이빛나는밤' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=143">별이빛나는밤</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">수국과 장미 계절꽃으로 '별이 빛나는 밤'을 표현해봤어요</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">97,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('61','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/61_temp_16972429342459list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/61_temp_16972429342459list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="분홍장미계절꽃다발">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 61)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 61);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 61);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '61', '분홍장미계절꽃다발' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=61">분홍장미계절꽃다발</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">분홍장미와 어울리는 계절꽃으로 다양한 매력이 있는 꽃다발입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">61,900</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('153','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/153_temp_16972610195979list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/153_temp_16972610195979list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="르누아르">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 153)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 153);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 153);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '153', '르누아르' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=153">르누아르</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">르누아르 특유의 따스한 빛을 담은 꽃바구니입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">102,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('70','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/70_temp_16972440461206list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/70_temp_16972440461206list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="아리따움">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 70)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 70);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 70);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '70', '아리따움' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=70">아리따움</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">아리따움은 빨간장미와 그린소재로 구성된 꽃다발 입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">72,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('158','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/158_temp_16972610957141list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/158_temp_16972610957141list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="프라고나르">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 158)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 158);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 158);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '158', '프라고나르' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=158">프라고나르</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">샤만트장미의 꽃말은 "영원한 사랑" 입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">92,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('75','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/75_temp_16972519416589list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/75_temp_16972519416589list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="사랑합니다">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 75)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 75);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 75);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '75', '사랑합니다' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=75">사랑합니다</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">사랑합니다는 빨간장미와 그린소재로 구성된 꽃바구니입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">68,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('121','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2024/06/121_temp_17179943897370list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/121_temp_17179943897370list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="클림트키스">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 121)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 121);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 121);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '121', '클림트키스' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=121">클림트키스</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">클림트키스의 연인들 처럼 황홀히 취하게 만드는 매력의 꽃다발.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,900</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('817','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/817_temp_17023673509440list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/817_temp_17023673509440list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="바이올렛 세이즈">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 817)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 817);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 817);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '817', '바이올렛 세이즈' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=817">바이올렛 세이즈</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">은은한 바이올렛 색상에 신비로움을 담은 바구니 입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->
            <div class="goodS_info displaY_consumer_price">
                <span class="areA">
                    <span class="nuM">80,900</span>원
                </span>
            </div>


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">65,900</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <div class="goodS_info displaY_sales_percent">
                    <span class="areA"><span class="nuM">19</span>%</span>
                </div>
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('681','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/681_temp_16972473985275list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/681_temp_16972473985275list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="새벽하늘(서울한정)">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 681)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 681);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 681);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '681', '새벽하늘(서울한정)' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=681">새벽하늘(서울한정)</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">시원한 듯, 차가운 듯 청량하고 맑은 기운이 느껴지는 꽃다발입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">55,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul>
                    <!-- ------- //상품정보. ------- -->
                  </div>
                  <!-- scrollbar -->
                  <div class="display-scrollbar swiper-scrollbardesignDisplay_670aa31dbdc10"></div>
              </div>
               <!-- left, right button -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
          </div>

<script>
    var t = new Date();
    var uniquekey_dsp = 'designDisplay_670aa31dbdc10'+t.getTime();
    var display_swiper = [];

    $(function(){
        /* 상품디스플레이 스와이프형 탭 스크립트 */
        $("#designDisplay_670aa31dbdc10 .displaySwipeTabContainer").each(function(){
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
                    //scrollbar: $(this).find('.display-scrollbar'),
                    slidesPerView: 'auto',
                    grabCursor: true,
                    nextButton: $(this).find('.swiper-button-next'),
                    prevButton: $(this).find('.swiper-button-prev')
                });
                $(this).addClass('set_slide_clear').bind('mousedown touchstart touchmove',function(){
                    $('.active_swipe_slide').removeClass('active_swipe_slide');
                    $(this).addClass('active_swipe_slide');
                });
            }
        });
        /*
         $(window).resize(function(){
            setTimeout(function(){
                if($('.swiper-scrollbar-drag').width() == 0) display_swiper[uniquekey_dsp].update(true);
            },1000);
         });
         set_goods_display_decoration(".goodsDisplayImageWrap");
        */
    });
</script>
</div>
    </div>


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



    <div class="title_group1">
        <h3 class="title1"><span designelement="text" textindex="5" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">관엽식물</span></h3>
        <p class="text2" designelement="text" textindex="6" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">삭막한 공간을 생기 넘치게!</p>
    </div>
    <div data-effect="scale opacity">
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ [반응형] 디스플레이 템플릿 - 스와이프형 @@
- 파일위치 : [스킨폴더]/_modules/display/goods_display_sizeswipe.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<style>
    .designDisplay_670aa31dc91bc .goods_list ol.gli_contents { text-align:center;}
    .designDisplay_670aa31dc91bc .swiper-slide>li.gl_item { width:300px;  }
</style>

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁 -->

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁  끝 -->


<div id="designDisplay_670aa31dc91bc" class="designDisplay" designelement="display" templatepath="main/index.html" displayseq="10151" perpage="" category="" displaystyle="sizeswipe">
          <div class="designDisplay_670aa31dc91bc display_slide_class displaySwipeTabContentsContainer" tabidx="0">
              <div class="goods_display_slide_wrap">
                  <div class="swiper-wrapper">
                    <!-- ------- 상품정보. 파일위치 : /data/design/ ------- -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ goods_info_style_2 @@
- 파일 위치 : /data/design/goods_info_style_2.html
- CSS 경로 : /data/design/goods_info_style.css
- 상품정보 관련 CSS 수정 및 추가는 다음의 CSS파일에서 작업하시기 바랍니다.
/data/design/goods_info_user.css
※ /data 폴더는 /skin 폴더 상위 폴더입니다.
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<ul class="goods_list swiper-slide">    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('272','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2024/04/272_temp_17119523494407list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/04/272_temp_17119523494407list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="금전수 클래식 1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 272)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 272);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 272);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '272', '금전수 클래식 1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=272">금전수 클래식 1호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">금전운과 행운을 들어오게 하는 기특한 식물, 금전수</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">75,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('109','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/109_temp_17025314777640list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/109_temp_17025314777640list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="해피트리 클래식 1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 109)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 109);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 109);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '109', '해피트리 클래식 1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=109">해피트리 클래식 1호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">행복을 가져다주는 나무, 해피트리</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('83','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/83_temp_16972450775474list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/83_temp_16972450775474list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="금전수 모던라인">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 83)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 83);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 83);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '83', '금전수 모던라인' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=83">금전수 모던라인</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">금전운과 행운을 들어오게 하는 기특한 식물, 금전수</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('251','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2024/05/251_temp_17165307204787list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/05/251_temp_17165307204787list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="스투키 모던라인 2호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 251)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 251);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 251);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '251', '스투키 모던라인 2호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=251">스투키 모던라인 2호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">나사가 인정한 공기정화식물, 스투키!</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">104,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('89','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/89_temp_16972468216347list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/89_temp_16972468216347list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="뱅갈고무나무 모던라인1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 89)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 89);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 89);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '89', '뱅갈고무나무 모던라인1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=89">뱅갈고무나무 모던라인1호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">햇빛을 보면 잎이 물이드는, 뱅갈고무나무</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">119,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('127','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/127_temp_16972467193837list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/127_temp_16972467193837list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="녹보수 모던라인 1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 127)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 127);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 127);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '127', '녹보수 모던라인 1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=127">녹보수 모던라인 1호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">녹보수는 행복,행운,대박을 불러오는 나무입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">124,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('80','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/80_temp_16972449692896list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/80_temp_16972449692896list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="고무나무 모던라인">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 80)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 80);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 80);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '80', '고무나무 모던라인' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=80">고무나무 모던라인</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">"영원한행복"이란 뜻을 가진 고무나무</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('112','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/112_temp_17025318164329list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/112_temp_17025318164329list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="황금죽 클래식 2호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 112)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 112);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 112);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '112', '황금죽 클래식 2호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=112">황금죽 클래식 2호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">행운과 황금을 상징하며 부귀죽이라고도 불리는, 황금죽</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">117,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('90','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/90_temp_17025312702689list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/90_temp_17025312702689list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="뱅갈고무나무 클래식1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 90)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 90);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 90);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '90', '뱅갈고무나무 클래식1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=90">뱅갈고무나무 클래식1호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">햇빛을 보면 잎이 물이드는, 뱅갈고무나무</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('113','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/113_temp_16972487586098list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/113_temp_16972487586098list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="극락조 모던라인">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 113)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 113);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 113);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '113', '극락조 모던라인' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=113">극락조 모던라인</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">이국적인 잎모양이 매력인 극락조</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">149,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('84','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/84_temp_17025306052468list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/84_temp_17025306052468list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="금전수 클래식 2호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 84)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 84);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 84);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '84', '금전수 클래식 2호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=84">금전수 클래식 2호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">금전운과 행운을 들어오게 하는 기특한 식물, 금전수</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('111','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/111_temp_16972480780819list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/111_temp_16972480780819list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="황금죽 모던라인 2호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 111)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 111);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 111);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '111', '황금죽 모던라인 2호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=111">황금죽 모던라인 2호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">행운과 황금을 상징하며 부귀죽이라고도 불리는, 황금죽</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">129,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('105','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/105_temp_17025319610835list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/105_temp_17025319610835list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="크로톤 클래식">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 105)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 105);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 105);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '105', '크로톤 클래식' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=105">크로톤 클래식</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">형형색색 화려한 잎이 매력인, 크로톤</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">87,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('103','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/103_temp_17025300776382list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/103_temp_17025300776382list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="천냥금(백량금) 클래식">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 103)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 103);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 103);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '103', '천냥금(백량금) 클래식' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=103">천냥금(백량금) 클래식</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">빨간열매가 열리는 앙증맞은 모양으로 키우는 재미가 있는, 천냥금</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">52,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('99','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/99_temp_17025325538773list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/99_temp_17025325538773list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="알로카시아 클래식">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 99)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 99);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 99);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '99', '알로카시아 클래식' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=99">알로카시아 클래식</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">하트모양의 특이한 잎을 가진 알로카시아</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">100,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('108','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/108_temp_16972472288717list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/108_temp_16972472288717list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="해피트리 모던라인 1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 108)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 108);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 108);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '108', '해피트리 모던라인 1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=108">해피트리 모던라인 1호</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">행복을 가져다주는 나무, 해피트리</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">124,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
</ul>
                    <!-- ------- //상품정보. ------- -->
                  </div>
                  <!-- scrollbar -->
                  <div class="display-scrollbar swiper-scrollbardesignDisplay_670aa31dc91bc"></div>
              </div>
               <!-- left, right button -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
          </div>

<script>
    var t = new Date();
    var uniquekey_dsp = 'designDisplay_670aa31dc91bc'+t.getTime();
    var display_swiper = [];

    $(function(){
        /* 상품디스플레이 스와이프형 탭 스크립트 */
        $("#designDisplay_670aa31dc91bc .displaySwipeTabContainer").each(function(){
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
                    //scrollbar: $(this).find('.display-scrollbar'),
                    slidesPerView: 'auto',
                    grabCursor: true,
                    nextButton: $(this).find('.swiper-button-next'),
                    prevButton: $(this).find('.swiper-button-prev')
                });
                $(this).addClass('set_slide_clear').bind('mousedown touchstart touchmove',function(){
                    $('.active_swipe_slide').removeClass('active_swipe_slide');
                    $(this).addClass('active_swipe_slide');
                });
            }
        });
        /*
         $(window).resize(function(){
            setTimeout(function(){
                if($('.swiper-scrollbar-drag').width() == 0) display_swiper[uniquekey_dsp].update(true);
            },1000);
         });
         set_goods_display_decoration(".goodsDisplayImageWrap");
        */
    });
</script>
</div>
    </div>






    <!-- 협찬 띠배너  -->
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
        <h3 class="title1"><span designelement="text" textindex="7" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">NEW</span></h3>
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



    <div class="title_group1">
        <h3 class="title1"><span designelement="text" textindex="9" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">동서양난</span></h3>
        <p class="text2" designelement="text" textindex="10" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">꼿꼿한 기품, 절개의 상징</p>
    </div>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ [반응형] 디스플레이 템플릿 - 격자 반응형 @@
- 파일위치 : [스킨폴더]/_modules/display/goods_display_responsible.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<style>
    .designDisplay_670aa31ddbc96 .goods_list li.gl_item{ width:300px; }
</style>

<div id="designDisplay_670aa31ddbc96" class="designDisplay" designelement="display" templatepath="main/index.html" displayseq="10002" page="" perpage="" category="" displaystyle="responsible">
    <ul class="displayTabContainer displayTabType1">
            <li class="current" style="width:50%">동양난</li>
            <li style="width:50%">서양난</li>
    </ul>

    <div class="designDisplay_670aa31ddbc96 display_responsible_class displayTabContentsContainer displayTabContentsContainerBox">
        <!-- ------- 상품정보. 파일위치 : /data/design/ ------- -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ goods_info_style_2 @@
- 파일 위치 : /data/design/goods_info_style_2.html
- CSS 경로 : /data/design/goods_info_style.css
- 상품정보 관련 CSS 수정 및 추가는 다음의 CSS파일에서 작업하시기 바랍니다.
/data/design/goods_info_user.css
※ /data 폴더는 /skin 폴더 상위 폴더입니다.
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <style>
        .designDisplay_670aa31ddbc96.goods_list li.gl_item{ width:300px; }
    </style>
    <ul class="goods_list designDisplay_670aa31ddbc96 goods_info_style_2">
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('128','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/128_temp_16972576440319list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/128_temp_16972576440319list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-동">
                <img src="https://f-mans.com/data/goods/1/2024/05/128_temp_17168769799696list1.png" data-src="https://f-mans.com/data/goods/1/2024/05/128_temp_17168769799696list1.png" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-동">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 128)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 128);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 128);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '128', '고민NO 동양란-동' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=128">고민NO 동양란-동</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">어렵기만한 동양란, 어떤것으로 보낼지 고민하지 마시고 고민NO 상품을 선택하세요.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">54,900</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('171','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/171_temp_16972594941927list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/171_temp_16972594941927list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황금채홍 청자투각">
                <img src="https://f-mans.com/data/goods/1/2024/06/171_temp_17186790626873list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/171_temp_17186790626873list1.jpg" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황금채홍 청자투각">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 171)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 171);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 171);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '171', '황금채홍 청자투각' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=171">황금채홍 청자투각</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">무지개를 뜻하는 이름처럼 잎의 곡선과 가장자리에 머금은 금빛 테두리는 아름다움을 한껏 뽐내고, 청자분은 고급스러움을 더합니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('129','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/129_temp_16972577752253list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/129_temp_16972577752253list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-서">
                <img src="https://f-mans.com/data/goods/1/2024/06/129_temp_17185805269554list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/129_temp_17185805269554list1.jpg" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-서">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 129)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 129);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 129);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '129', '고민NO 동양란-서' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=129">고민NO 동양란-서</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">어렵기만한 동양란, 어떤것으로 보낼지 고민하지 마시고 고민NO 상품을 선택하세요.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('173','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/173_temp_16972581076350list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/173_temp_16972581076350list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황룡관 청자투각">
                <img src="https://f-mans.com/data/goods/1/2024/06/173_temp_17186098541099list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/173_temp_17186098541099list1.jpg" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황룡관 청자투각">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 173)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 173);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 173);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '173', '황룡관 청자투각' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=173">황룡관 청자투각</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">고풍스러운 금빛 기품을 자랑하는 고급란입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">148,500</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>

        <!-- ------- //상품정보. ------- -->
    </ul></div>
    <div class="designDisplay_670aa31ddbc96 display_responsible_class displayTabContentsContainer displayTabContentsContainerBox">
        <!-- ------- 상품정보. 파일위치 : /data/design/ ------- -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ goods_info_style_2 @@
- 파일 위치 : /data/design/goods_info_style_2.html
- CSS 경로 : /data/design/goods_info_style.css
- 상품정보 관련 CSS 수정 및 추가는 다음의 CSS파일에서 작업하시기 바랍니다.
/data/design/goods_info_user.css
※ /data 폴더는 /skin 폴더 상위 폴더입니다.
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <style>
        .designDisplay_670aa31ddbc96.goods_list li.gl_item{ width:300px; }
    </style>
    <ul class="goods_list designDisplay_670aa31ddbc96 goods_info_style_2">
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('128','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/128_temp_16972576440319list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/128_temp_16972576440319list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-동">
                <img src="https://f-mans.com/data/goods/1/2024/05/128_temp_17168769799696list1.png" data-src="https://f-mans.com/data/goods/1/2024/05/128_temp_17168769799696list1.png" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-동">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 128)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 128);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 128);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '128', '고민NO 동양란-동' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=128">고민NO 동양란-동</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">어렵기만한 동양란, 어떤것으로 보낼지 고민하지 마시고 고민NO 상품을 선택하세요.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">54,900</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('171','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/171_temp_16972594941927list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/171_temp_16972594941927list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황금채홍 청자투각">
                <img src="https://f-mans.com/data/goods/1/2024/06/171_temp_17186790626873list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/171_temp_17186790626873list1.jpg" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황금채홍 청자투각">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 171)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 171);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 171);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '171', '황금채홍 청자투각' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=171">황금채홍 청자투각</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">무지개를 뜻하는 이름처럼 잎의 곡선과 가장자리에 머금은 금빛 테두리는 아름다움을 한껏 뽐내고, 청자분은 고급스러움을 더합니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('129','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/129_temp_16972577752253list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/129_temp_16972577752253list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-서">
                <img src="https://f-mans.com/data/goods/1/2024/06/129_temp_17185805269554list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/129_temp_17185805269554list1.jpg" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="고민NO 동양란-서">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 129)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 129);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 129);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '129', '고민NO 동양란-서' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=129">고민NO 동양란-서</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">어렵기만한 동양란, 어떤것으로 보낼지 고민하지 마시고 고민NO 상품을 선택하세요.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">99,000</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>
    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('173','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/173_temp_16972581076350list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/173_temp_16972581076350list1.jpg" class="goodsDisplayImage lazyload item1cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황룡관 청자투각">
                <img src="https://f-mans.com/data/goods/1/2024/06/173_temp_17186098541099list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/173_temp_17186098541099list1.jpg" class="goodsDisplayImage lazyload item2cut" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif';" alt="황룡관 청자투각">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 173)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 173);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 173);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '173', '황룡관 청자투각' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

        <div class="resp_display_goods_info infO_style_2">
        <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
            <!-- 컬러옵션 -->
            <div class="goodS_info displaY_color_option">
            </div>

            <div class="infO_group">

                <!-- 브랜드명 -->
                
                <!-- 상품명-->
                <div class="goodS_info displaY_goods_name">
                    <span class="areA"><a href="/goods/view?no=173">황룡관 청자투각</a></span>
                </div>
            </div>

            <!-- 짧은 설명 -->
            <div class="goodS_info displaY_goods_short_desc">
                <span class="areA">고풍스러운 금빛 기품을 자랑하는 고급란입니다.</span>
            </div>

            <!-- 비회원 대체문구 -->
            <!-- 정가 -->


            <div class="infO_group">
                <!-- (할인혜택)판매가 -->
                <div class="goodS_info displaY_sales_price">
                    <span class="areA">
                        <span class="nuM">148,500</span>원
                    </span>
                </div>

                <!-- 할인율 -->
                <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
                <!--=sin(1.57)-->
                <!--1.4로 지정-->
                <style>
                @media only screen and (max-width:767px){
                    .no_mobile{display:none;}
                }
                </style>
                <span style="color:#08B899; font-size:14px;" class="no_mobile">
                </span>
                <!-- 꽃청 추가 END -->
            </div>

            <!-- 아이콘 -->
        <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        </div>


    </div>
  </li>

        <!-- ------- //상품정보. ------- -->
    </ul></div>


</div>




    <!-- 꽃청 추가 START 김태섭 2023-06-09 - 매거진 띠배너 -->
    <a class="bn_magazine" href="https://f-mans.com/board/?id=mz-main">
        <h5>
            MAGAZINE
            <p>내 마음을 담다</p>
        </h5>
        <span>자세히 보기</span>
    </a>
    <!-- 꽃청 추가 END 김태섭 2023-06-09 - 매거진 띠배너 -->



    <!-- 꽃청 삭제 START 김태섭 2023-06-09 - 스토리 Close -->
        <!-- firstmall STORY -->
        <!-- <div class="title_group1">
            <p class="text1" designElement="text">"마음을 전합니다."</p>
            <h3 class="title1"><span designElement="text">꽃집청년들 Story</span></h3>
            <p class="text2" designElement="text">마음을 전하는 다양한 방법을 만나보세요:)</p>
        </div> -->
        <!-- 슬라이드 배너 영역 (light_style_1_5) :: START -->
        <div class="main_slider_a1 sliderA slider_before_loading" data-effect="opacity" style="display: none;">
            <!-- <!-- 슬라이드 배너 데이터 영역 :: START -->   <div class="light_style_1_5 designBanner" designelement="banner" templatepath="main/index.html" bannerseq="5"><div class="sslide"><a class="slink" href="/board/view?id=custom_bbs2&amp;seq=3119" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_1.jpg"></a></div><div class="sslide"><a class="slink" href="/board/view?id=custom_bbs2&amp;seq=2984" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_2.jpg"></a></div><div class="sslide"><a class="slink" href="/board/view?id=custom_bbs2&amp;seq=2883" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_3.jpg"></a></div><div class="sslide"><a class="slink" href="/board/view?id=custom_bbs2&amp;seq=2817" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_4.jpg"></a></div><div class="sslide"><a class="slink" href="https://f-mans.com/board/view?id=custom_bbs2&amp;seq=2728" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_5.jpg"></a></div><div class="sslide"><a class="slink" href="/board/view?id=custom_bbs2&amp;seq=55" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_6.jpg"></a></div><div class="sslide"><a class="slink" href="/board/view?id=custom_bbs2&amp;seq=56" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_7.jpg"></a></div><div class="sslide"><a class="slink" href="/board/view?id=custom_bbs2&amp;seq=57" target="_self"><img class="simg" src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/banner/5/images_8.jpg"></a></div>  </div><!-- 슬라이드 배너 데이터 영역 :: END --> --&gt;
        </div>
        <script type="text/javascript">
        $(function() {
            $('.light_style_1_5').slick({
                slidesToShow: 3, // 한 화면에 몇개의 슬라이드를 보여줄 것인가? - 3개
                slidesToScroll: 2, // 슬라이드 할때, 몇개씩 슬라이드할 것인가? - 2개
                speed: 800, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 800 == 0.8초 )
                responsive: [
                {
                    breakpoint: 768, // 스크린 가로 사이즈가 768px 이하일 때,
                    settings: {
                        arrows: false, // 좌우 버튼 페이징 사용 안함( 사용함: true, 사용안함: false )
                        centerMode: true, // 센터모드 사용( true 혹은 false )
                        centerPadding: '40px', // 센터모드 사용시 좌우 여백
                        slidesToShow: 2 // 한 화면에 몇개의 슬라이드를 보여줄 것인가? - 2개
                    }
                },
                {
                    breakpoint: 480, // 스크린 가로 사이즈가 400px 이하일 때,
                    settings: {
                        arrows: false, // 좌우 버튼 페이징 사용 안함( 사용함: true, 사용안함: false )
                        centerMode: true, // 센터모드 사용( true 혹은 false )
                        centerPadding: '60px', // 센터모드 사용시 좌우 여백
                        slidesToShow: 1 // 한 화면에 몇개의 슬라이드를 보여줄 것인가? - 1개
                    }
                }]
            });
            // 이 외 slick 슬라이더의 자세한 옵션사항은 http://kenwheeler.github.io/slick/ 참고
        });
        </script>
        <!-- 슬라이드 배너 영역 (light_style_1_5) :: END -->
    <!-- 꽃청 삭제 END 김태섭 2023-06-09 - 스토리 Close -->


    <div class="title_group1">
        <h3 class="title1"><span designelement="text" textindex="11" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">고객만족</span></h3>
        <p class="text2" designelement="text" textindex="12" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">만족도가 높은 상품입니다.</p>
    </div>
    <div data-effect="scale opacity">
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ [반응형] 디스플레이 템플릿 - 스와이프형 @@
- 파일위치 : [스킨폴더]/_modules/display/goods_display_sizeswipe.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<style>
    .designDisplay_670aa31de3265 .goods_list ol.gli_contents { text-align:center;}
    .designDisplay_670aa31de3265 .swiper-slide>li.gl_item { width:300px;  }
</style>

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁 -->

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁  끝 -->


<div id="designDisplay_670aa31de3265" class="designDisplay" designelement="display" templatepath="main/index.html" displayseq="10003" perpage="" category="" displaystyle="sizeswipe">
          <div class="designDisplay_670aa31de3265 display_slide_class displaySwipeTabContentsContainer" tabidx="0">
              <div class="goods_display_slide_wrap">
                  <div class="swiper-wrapper">
                    <!-- ------- 상품정보. 파일위치 : /data/design/ ------- -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ goods_info_style_5 @@
- 파일 위치 : /data/design/goods_info_style_5.html
- CSS 경로 : /data/design/goods_info_style.css
- 상품정보 관련 CSS 수정 및 추가는 다음의 CSS파일에서 작업하시기 바랍니다.
/data/design/goods_info_user.css
※ /data 폴더는 /skin 폴더 상위 폴더입니다.
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<ul class="goods_list swiper-slide">    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('128','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/128_temp_16972576440319list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/128_temp_16972576440319list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="고민NO 동양란-동">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 128)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 128);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 128);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '128', '고민NO 동양란-동' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=128">고민NO 동양란-동</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">54,900</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:97%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.9</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('80','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/80_temp_16972449692896list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/80_temp_16972449692896list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="고무나무 모던라인">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 80)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 80);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 80);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '80', '고무나무 모던라인' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=80">고무나무 모던라인</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">99,000</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:96.8%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.8</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="detail.html" class="respItemImageArea" onclick="display_goods_view('140','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2022/11/140_temp_16675233646624list1.jpg" data-src="https://f-mans.com/data/goods/1/2022/11/140_temp_16675233646624list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="계절마음">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="detail.html" onclick="display_goods_zzim(this, 140)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 140);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 140);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '140', '계절마음' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=140">계절마음</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">58,500</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:91.5%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.6</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
        <!-- 꽃청 수정 START 윤상희 2023.09.26 - 실제배송사진 예외처리를 위한 숨김 -->
        <div class="goodS_info displaY_best_review hide">
        <!-- 꽃청 수정 END -->
            <span class="areA titlE">
                항상 신선한꽃으로 ...
            </span>
            <span class="areB desC">&nbsp;&nbsp;&nbsp;&nbsp;항상 신선한꽃으로 보내주세요^^ 잘받았습니다. &nbsp;&amp;nbs...</span>
        </div>
        <!-- 꽃청 수정 START 윤상희 2023.09.26 - 실제배송사진 예외처리를 위한 숨김 -->
        <div class="goodS_info displaY_best_review hide">
        <!-- 꽃청 수정 END -->
            <span class="areA titlE">
                후기 잘 안남기는데...
            </span>
            <span class="areB desC">너무 이쁜꽃이 왔어요 양가 너무 좋아하셔서 어깨 힘이 빡 들어가더라구요 하루종일 여러사람을 기분이 최고로 만...</span>
        </div>
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('83','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/83_temp_16972450775474list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/83_temp_16972450775474list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="금전수 모던라인">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 83)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 83);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 83);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '83', '금전수 모던라인' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=83">금전수 모던라인</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">99,000</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:95%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.8</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('210','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2024/06/210_temp_17181508789113list1.jpg" data-src="https://f-mans.com/data/goods/1/2024/06/210_temp_17181508789113list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="만천홍 클래식 1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 210)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 210);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 210);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '210', '만천홍 클래식 1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=210">만천홍 클래식 1호</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">59,000</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:93.4%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.7</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('143','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/143_temp_16972588479416list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/143_temp_16972588479416list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="별이빛나는밤">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 143)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 143);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 143);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '143', '별이빛나는밤' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=143">별이빛나는밤</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">97,000</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:88.9%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.4</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('89','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/10/89_temp_16972468216347list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/10/89_temp_16972468216347list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="뱅갈고무나무 모던라인1호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 89)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 89);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 89);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '89', '뱅갈고무나무 모던라인1호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=89">뱅갈고무나무 모던라인1호</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">119,000</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:93.8%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.7</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul><ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('215','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2023/12/215_temp_17029698355935list1.jpg" data-src="https://f-mans.com/data/goods/1/2023/12/215_temp_17029698355935list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="분홍호접란 클래식 4호">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 215)">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="https://f-mans.com/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
                </a>
            </div>

            <!-- 미리보기/옵션보기/SNS보내기 -->
            <div class="respGoodsFuncMenu">
                <ul class="goodsDisplayItemWrap">
                    <li class="funcMenu_quickview"><a href="javascript:void(0)" onclick="display_goods_quickview(this, 215);"><span class="txt">미리보기</span></a></li>
                    <li class="funcMenu_option"><a href="javascript:void(0)" onclick="display_goods_show_opt(this, 215);"><span class="txt">옵션보기</span></a></li>
                    <li class="funcMenu_send"><a href="javascript:void(0)" onclick="display_goods_send(this,'bottom', '215', '분홍호접란 클래식 4호' );"><span class="txt">SNS보내기</span></a></li>
                </ul>
            </div>

            <!-- 상품 상태 표시 -->
        </div>

<div class="resp_display_goods_info infO_style_5">
<!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    <!-- 상품명-->
    <div class="goodS_info displaY_goods_name">
        <span class="areA"><a href="/goods/view?no=215">분홍호접란 클래식 4호</a></span>
    </div>

    <!-- 비회원 대체문구 -->
    <div class="infO_group">
        <!-- 정가 -->

        <!-- (할인혜택)판매가 -->
        <div class="goodS_info displaY_sales_price">
            <span class="areA">
                <span class="nuM">159,000</span>원
            </span>
        </div>
        <!-- 꽃청 추가 START 홍우기 2022.10.27 - 빼빼로데이 상품개수 카운트 -->
        <!--=sin(1.57)-->
        <!--1.4로 지정-->
        <style>
        @media only screen and (max-width:767px){
            .no_mobile{display:none;}
        }
        </style>
        <span style="color:#08B899; font-size:14px;" class="no_mobile">
        </span>
        <!-- 꽃청 추가 END -->
    </div>

    <div class="infO_group">
        
        <!-- 상품후기 평가점수( 별점 ) -->
        <div class="goodS_info displaY_review_score_a">
            <span class="areA">
                <span class="ev_active2"><b style="width:91.9%;"></b></span>
            </span>
        </div>

        <!-- 상품후기 평가점수( 점수 ) -->
        <div class="goodS_info displaY_review_score_b">
            <span class="areA"><span class="nuM">4.6</span>점</span>
        </div>

        <!-- 상품후기 가장 좋은 평가정보( 사람수 ) -->
    </div>
    
    <!-- 리뷰 영역 -->
<!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
</div>

    </div>
  </li>
</ul>
                    <!-- ------- //상품정보. ------- -->
                  </div>
                  <!-- scrollbar -->
                  <div class="display-scrollbar swiper-scrollbardesignDisplay_670aa31de3265"></div>
              </div>
               <!-- left, right button -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
          </div>

<script>
    var t = new Date();
    var uniquekey_dsp = 'designDisplay_670aa31de3265'+t.getTime();
    var display_swiper = [];

    $(function(){
        /* 상품디스플레이 스와이프형 탭 스크립트 */
        $("#designDisplay_670aa31de3265 .displaySwipeTabContainer").each(function(){
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
                    //scrollbar: $(this).find('.display-scrollbar'),
                    slidesPerView: 'auto',
                    grabCursor: true,
                    nextButton: $(this).find('.swiper-button-next'),
                    prevButton: $(this).find('.swiper-button-prev')
                });
                $(this).addClass('set_slide_clear').bind('mousedown touchstart touchmove',function(){
                    $('.active_swipe_slide').removeClass('active_swipe_slide');
                    $(this).addClass('active_swipe_slide');
                });
            }
        });
        /*
         $(window).resize(function(){
            setTimeout(function(){
                if($('.swiper-scrollbar-drag').width() == 0) display_swiper[uniquekey_dsp].update(true);
            },1000);
         });
         set_goods_display_decoration(".goodsDisplayImageWrap");
        */
    });
</script>
</div>
    </div>







    <!-- 상품후기  최근글 start  display:none; -->
        <style type="text/css">
        .designLastestNew5ef41313bf849 .tit {font-size:12px; font-weight:bold;}
        .designLastestNew5ef41313bf849 .normal_bbslist .cat {font-size:12px;font-family:gothic,gulim;color:#888;letter-spacing:-1px;}
        .designLastestNew5ef41313bf849 .normal_bbslist .sbj {text-align:left;letter-spacing:0px;}
        .designLastestNew5ef41313bf849 .normal_bbslist .sbj a {font-size:12px;font-family:gothic,gulim;color:#222222;text-decoration:none;line-height:150%;}
        .designLastestNew5ef41313bf849 .normal_bbslist .sbj a:hover {text-decoration:underline;}
        .designLastestNew5ef41313bf849 .normal_bbslist .comment {font:normal 11px arial;color:#FC6138;}
        </style>

        <div class="designDisplay designLastestNew5ef41313bf849" designelement="displaylastest" id="designLastestNew5ef41313bf849" templatepath="bWFpbi9pbmRleC5odG1s" style="display:none;">

            <div class="title_group1">
                <h3 class="title1"><span designelement="text" textindex="15" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">REVIEW</span></h3>
                <p class="text2" designelement="text" textindex="16" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">퍼스트몰 반응형 스킨은 세련된 리뷰형 상품정보도 제공합니다.</p>
            </div>

            <div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td valign="bottom" align="left" height="25">
                            <span class="tit">
                                <p><br></p>
                            </span>
                        </td>
                        <td valign="bottom" align="right">
                            <b>
                                <a href="/board/?id=goods_review">
                                    <img src="https://f-mans.com/data/skin/responsive_ver1_default_gl/images/design/cscenter_btn_more.gif">
                                </a>
                            </b>
                        </td>
                    </tr>
                </tbody></table>
            </div>
            <br style="line-height:10px;">

            <table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr>
</tr><tr class="normal_bbslist">                    <td width="25%" valign="top" class="sbj"><table width="100%" align="left" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr><td align="left" width="80" height="80"><span class="BoardgoodsDisplayImageWrap" decoration=""><a href="/board/view?id=goods_review&amp;seq=8686"><img src="https://f-mans.com/data/board/goods_review/_widget_thumb_a1d47ed81c465f450904fd3dcbf22a191130591.jpeg" width="80" height="80" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'"></a></span></td></tr>               <tr><td height="6"></td></tr>
                        <tr>
                            <td align="left">
<a href="/board/view?id=goods_review&amp;seq=8686" target="">한강의 노을(서울한정) </a><br>                                   <a href="/board/view?id=goods_review&amp;seq=8686" board_seq="8686" board_id="goods_review"> 실망입니다   <span class="comment">(1)</span></a>   <img src="/admin/skin/default/images/board/icon/icon_hot.gif" title="hot">   
                                    <img src="/admin/skin/default/images/board/icon/icon_review.gif" title="2" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="2" valign="absmiddle" alt="score">
                                    구매
                            </td>
                        </tr>
                        </tbody></table>
                    </td>
                    <td width="25%" valign="top" class="sbj"><table width="100%" align="left" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr><td align="left" width="80" height="80"><span class="BoardgoodsDisplayImageWrap" decoration=""><a href="/board/view?id=goods_review&amp;seq=12937"><img src="https://f-mans.com/data/board/goods_review/_widget_thumb_9d20181a1b92d8299c04d3a294eae92e1629421.jpg" width="80" height="80" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'"></a></span></td></tr>               <tr><td height="6"></td></tr>
                        <tr>
                            <td align="left">
<a href="/board/view?id=goods_review&amp;seq=12937" target="">설렘의 온도 </a><br>                                    <a href="/board/view?id=goods_review&amp;seq=12937" board_seq="12937" board_id="goods_review"> 이쁘고 싱싱해요 </a>   <img src="/admin/skin/default/images/board/icon/icon_hot.gif" title="hot">   
                                    <img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score">
                                    구매
                            </td>
                        </tr>
                        </tbody></table>
                    </td>
                    <td width="25%" valign="top" class="sbj"><table width="100%" align="left" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr><td align="left" width="80" height="80"><span class="BoardgoodsDisplayImageWrap" decoration=""><a href="/board/view?id=goods_review&amp;seq=9105"><img src="https://f-mans.com/data/board/goods_review/_widget_thumb_8cccca426e939a99117ab54867e292af0032566.jpeg" width="80" height="80" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'"></a></span></td></tr>               <tr><td height="6"></td></tr>
                        <tr>
                            <td align="left">
<a href="/board/view?id=goods_review&amp;seq=9105" target="">새벽하늘(서울한정) </a><br>                                     <a href="/board/view?id=goods_review&amp;seq=9105" board_seq="9105" board_id="goods_review"> 넘넘 속상해요  <span class="comment">(1)</span></a>   <img src="/admin/skin/default/images/board/icon/icon_hot.gif" title="hot">   
                                    <img src="/admin/skin/default/images/board/icon/icon_review.gif" title="3" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="3" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="3" valign="absmiddle" alt="score">
                                    구매
                            </td>
                        </tr>
                        </tbody></table>
                    </td>
                    <td width="25%" valign="top" class="sbj"><table width="100%" align="left" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr><td align="left" width="80" height="80"><span class="BoardgoodsDisplayImageWrap" decoration=""><a href="/board/view?id=goods_review&amp;seq=8028"><img src="https://phinf.pstatic.net/checkout.phinf/20220326_290/1648266170530cTUOH_JPEG/review-attachment-2ea3b50e-c909-4783-b9b2-54157afd13b4.jpeg?type=w640" width="80" height="80" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'"></a></span></td></tr>               <tr><td height="6"></td></tr>
                        <tr>
                            <td align="left">
<a href="/board/view?id=goods_review&amp;seq=8028" target="">녹보수 모던라인 1호 </a><br>                                    <a href="/board/view?id=goods_review&amp;seq=8028" board_seq="8028" board_id="goods_review"> 지인 개업축하 화분으로 고급형으로 주문했는데 많이 좋아하시네요. 쬐금 아쉬운건 리본글씨 글꼴과 사이즈... </a>   <img src="/admin/skin/default/images/board/icon/icon_hot.gif" title="hot">   
                                    <img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score"><img src="/admin/skin/default/images/board/icon/icon_review.gif" title="5" valign="absmiddle" alt="score">
                                    구매
                            </td>
                        </tr>
                        </tbody></table>
                    </td>
</tr><tr class="normal_bbslist">                </tr>
                <tr>
                    <td height="30"></td>
                </tr>
            </tbody></table>
    </div>
    <!-- 상품후기  최근글 end -->



</div>
        <!-- ================= 파트 페이지들 :: END. ================= -->
        </div>

        <!-- ================= #LAYOUT_FOOTER :: START. 파일위치 : layout_footer/standard.html (default) ================= -->

<!-- 꽃청 추가 START 홍우기 2022.10.18 스마트로그 -->
<script type="text/javascript">
var hpt_info = {'_account':'UHPT-20592','_server':'a24'};
</script>
<script language="javascript" src="//cdn.smlog.co.kr/core/smart.js" charset="utf-8"></script>
<noscript><img src="//a24.smlog.co.kr/smart_bda.php?_account=20592" style="display:none;width:0;height:0;" border="0"></noscript>
<!-- 꽃청 추가 END -->

<div id="layout_footer" class="layout_footer">


    <!-- 하단 배너 (정기구독 및 배송안내) 230601 서민혁 -->
    <div class="banner_footer">
        <ul class="banner_footer_subscribe">
            <li class="footer_subscribe">
                <a href="/subscribe/intro">
                    <h3>
                        <b>꽃구독</b>을<br>
                        <b>시작</b>하세요.
                    </h3>
                </a>
            </li>
            <li class="footer_delivery">
                <a href="/page/sub/delivery">
                    <h3>
                        <b>오늘</b>주문<br>
                        오늘<b>도착!</b>
                    </h3>
                </a>
            </li>
        </ul>
    </div>
    <!-- 하단 배너 (정기구독 및 배송안내) 끝 -->
    

<?php get_footer(); ?>