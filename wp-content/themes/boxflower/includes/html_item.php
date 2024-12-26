<?php
function slide_1_item($product, $pos = 0){

    // $img = wp_get_attachment_image( $product_meta['_thumbnail_id'][0], 'full' );
    $product_id = $product->get_id();
    $img = get_the_post_thumbnail_url($product_id);
    // echo '<pre>';
    // var_dump($product);
    // echo '</pre>';
    // die();
    // $t = $product->get_sale_price();
    // var_dump($t);
    // $t = $product->get_regular_price();
    // var_dump($t);
    $price_html = wc_price($product->get_regular_price());

    ?>

    <ul class="goods_list swiper-slide">   
     <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="<?php echo get_the_permalink($product_id);?>" class="respItemImageArea" >
                <img src="<?php echo $img;?>" data-src="<?php echo $img; ?>" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="계절마음" style="max-height: 300px;">
            </a>

            <!-- 반응형 icon new -->
                

                <!-- 텍스트형 아이콘-->
                <div class="respGoodsIcon typeText empty" style="background: #71a200">
                    <div class="respGoodsIconInner">
                        <div class="iconArea">
                            <span class="nuM">BEST</span><span class="secondMessage">1위</span>
                            <span class="nextMessage"></span><!-- 부가 텍스트 있는 경우, 없으면 항목 미노출 -->
                        </div>
                    </div>
                </div>



            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="detail.html" >
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

    <div class="resp_display_goods_info infO_style_4">
    <!-- +++++++++++++++++++++++++++++++++ NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
        <!-- 상품명-->
        <div class="goodS_info displaY_goods_name">
            <span class="areA"><a href="<?php echo get_the_permalink($product_id);?>"><?php echo $product->get_title();?> </a></span>
        </div>

        <!-- 비회원 대체문구 -->

        <div class="infO_group">
            <!-- (할인혜택)판매가 -->
            <div class="goodS_info displaY_sales_price">
                <span class="areA">                                 
                    <span class="nuM"><?php echo $price_html;?></span>
                </span>

            </div>

            <!-- 정가 -->
        </div>

        <!-- 짧은 설명 -->
        <div class="goodS_info displaY_goods_short_desc">
            <span class="areA">계절마음은 전국 해당지점에서 당일 가장 신선한 꽃으로 제작됩니다.</span>
        </div>

        <!-- 아이콘 -->
    <!-- +++++++++++++++++++++++++++++++++ //NEW 상품 정보 ++++++++++++++++++++++++++++++++ -->
    </div>

    </div>
  </li>
</ul>
<?php }

function slide_2_item($product = array(), $pos = 0){ ?>
    <ul class="goods_list swiper-slide">    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap" style="border: 0px;">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('83','',this,'goods_view')">
                <img src="https://f-mans.com/data/goods/1/2022/11/696_temp_16673666742102list1.jpg" data-src="/data/goods/1/2023/10/83_temp_16972450775474list1.jpg" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="금전수 모던라인">
            </a>

            <!-- 반응형 icon new -->

            <!-- 반응형 zzim -->
            <div class="respGoodsZzim">
                <a class="zzimArea" href="javascript:void(0)" onclick="display_goods_zzim(this, 83)">
                    <img src="/data/icon/goodsdisplay/zzim/icon_zzim.png" class="zzimImage normal " alt="찜하기" title="찜하기">
                    <img src="/data/icon/goodsdisplay/zzim_on/icon_zzim_on.png" class="zzimImage active hide" alt="찜한 상품" title="찜한 상품">
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
</ul>
<?php }

function slide_3_item($product = array()){?>
<ul class="goods_list swiper-slide">   <li class="gl_item">
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
</ul>
<?php }

function js_home(){?>

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

<?php }