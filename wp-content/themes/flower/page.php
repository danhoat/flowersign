<?php get_header();?>


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

</script>
        <!-- ================= #LAYOUT_HEADER :: END. 파일위치 : layout_header/standard.html (default) ================= -->

        <div id="layout_body" class="layout_body">


            <div class="resp_wrap 99999" style="position:relative;">



            <?php 
            wp_reset_query();
            while( have_posts() ){
                the_post(); the_content(); 
            } ?>
                

            <?php get_footer(); ?>