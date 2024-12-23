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


<?php 

function module_search_html(){ ?>
    <div id="searchModule" class="resp_top_search">
                <a href="javascript:void(0)" id="btnSearchV2" class="btn_search_open">검색</a>
                <div id="searchVer2" class="search_ver2">
                    <div class="search_new">
                        <!-- ------- 검색 입력 ------- -->
                        <form name="topSearchForm" id="topSearchForm" action="/goods/search">
                        <div class="input_area">
                            <div class="cont">
                                <label class="search_box"><input type="text" name="search_text" id="searchVer2InputBox" class="search_ver2_input_box" placeholder="Search" autocomplete="off"></label>
                                <button type="submit" class="search"></button>
                                <button type="button" class="close searchModuleClose"></button>
                            </div>
                        </div>
                        </form>
                        <!-- ------- 페이지별 기본 검색 ------- -->
                        <script type="text/javascript">
                            $("form#topSearchForm input[name='search_text']").attr('placeholder', '필요한 상품을 입력해주세요');
                            $("form#topSearchForm").submit(function(event){
                                if(!$("form#topSearchForm input[name='search_text']").val()){
                                    var openNewWindow = window.open("about:blank");
                                    openNewWindow.document.location.href="/goods/search?search_text=";
                                    return false;
                                }
                            });
                        </script>
                        <!-- ------- //검색 입력 ------- -->
                        <div class="contetns_area" style="display:none;">
                        <!-- ------- 최근 검색어, 최근본 상품 ------- -->
                            <div id="recentArea" class="recent_area">
                                <ul class="tab_btns">
                                    <li class="on"><a href="#recent-searched-list">최근 검색어</a></li>
                                    <li><a href="#recent-item-list">최근본 상품</a></li>
                                </ul>
                                <!-- 최근 검색어 -->
                                <div id="recent-searched-list" class="tab_contents">
                                    <ul id="recentSearchedList" class="searching_list">
                                        <li class="recent_search_item popular_search_item">
                                            <a class="searched_item" href="javascript:void(0)">금전수</a>
                                        </li>
                                        <li class="recent_search_item popular_search_item">
                                            <a class="searched_item" href="javascript:void(0)">장미</a>
                                        </li>
                                        <li class="recent_search_item popular_search_item">
                                            <a class="searched_item" href="javascript:void(0)">만천홍</a>
                                        </li>
                                        <li class="recent_search_item popular_search_item">
                                            <a class="searched_item" href="javascript:void(0)">서양난</a>
                                        </li>
                                        <li class="recent_search_item popular_search_item">
                                            <a class="searched_item" href="javascript:void(0)">해피트리</a>
                                        </li>
                                        <li class="no_data">최근검색어가 없습니다.</li>
                                    </ul>
                                    <div id="recentSearchedGuide" class="no_data" style="display:none;">최근 검색어 저장 기능이 꺼져있습니다.</div>
                                    <ul class="tab_foot_menu">
                                        <li class="menu_item">
                                            <a href="javascript:void(0)" data-value="all" onclick="searchRecentRemove(this)">전체삭제</a>
                                            <a class="btnRecentAuto off" href="javascript:void(0)">자동저장 끄기</a>
                                            <a class="btnRecentAuto on" href="javascript:void(0)" style="display:none;">자동저장 <span class="importcolor">켜기</span></a>
                                        </li>
                                        <li class="search_close searchModuleClose"><a href="javascript:void(0)">닫기</a></li>
                                    </ul>
                                </div>
                                <!-- //최근 검색어 -->
                                <!-- 최근본 상품 -->
                                <div id="recent-item-list" class="tab_contents" style="display:none;">
                                    <ul class="recent_item_list">
                                        <li class="no_data" style="display:none;">최근본 상품이 없습니다.</li>
                                    </ul>
                                    <ul class="tab_foot_menu">
                                        <li class="swiper_guide">
                                            <span class="to_left">&lt;</span>
                                            <span class="to_right">&gt;</span>
                                        </li>
                                        <li class="search_close searchModuleClose"><a href="javascript:void(0)">닫기</a></li>
                                    </ul>
                                </div>
                                <!-- //최근본 상품 -->
                            </div>
                        <!-- ------- //최근 검색어, 최근본 상품 ------- -->

                        <!-- ------- 검색어 자동완성 ------- -->
                            <div id="autoCompleteArea" class="autocomplete_area" style="display:none;">

                                <!-- 검색어 자동완성 - 검색어 -->
                                <div class="autocomplete_searching">
                                    <ul id="autoCompleteList" class="searching_list">
                                    </ul>

                                    <div id="autoCompleteGuide" class="no_data" style="display:none;">자동완성 기능이 꺼져있습니다</div>

                                    <ul class="tab_foot_menu">
                                        <li class="menu_item">
                                            <a class="btnAutoComplete off" href="javascript:void(0)">자동완성 끄기</a>
                                            <a class="btnAutoComplete on" href="javascript:void(0)" style="display:none;">자동완성 <span class="importcolor">켜기</span></a>
                                        </li>
                                        <li class="search_close searchModuleClose"><a href="javascript:void(0)">닫기</a></li>
                                    </ul>
                                </div>
                                <!-- //검색어 자동완성 - 검색어 -->

                                <!-- 검색어 자동완성 - 배너( 추천상품 ) -->
                                <div id="autoCompleteBanner" class="autocomplete_banner">
                                    <h5 class="title">추천 상품</h5>
                                    <ul id="autocompleteBannerList" class="banner_list">
                                    </ul>
                                </div>
                                <!-- //검색어 자동완성 - 배너( 추천상품 ) -->
                            </div>
                        <!-- ------- //검색어 자동완성 ------- -->
                        </div>
                    </div>
                </div>
            </div>

            <?php 
}