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

    <?php get_template_part('templates/home','banner'); ?>

    <!--  해당 날짜에 노출 및 미노출 설정 -->
    <!-- 해당 날짜 노출 끝 -->

    <!-- start slide 2 !-->

     <?php get_template_part('templates/slide','2'); ?>

    <!-- end slide 2 !-->


    <!-- start  slide 3 !-->

    <?php get_template_part('templates/slide','3'); ?>

<!-- end slide 3 !-->


<!-- start block tabs 4 !-->

    <?php get_template_part('templates/home','tabs'); ?>




<!-- ENd tab 4 !-->
    <?php get_template_part('templates/slide','4'); ?>



        <!-- ================= #LAYOUT_FOOTER :: START. 파일위치 : layout_footer/standard.html (default) ================= -->

    

<?php get_footer(); ?>