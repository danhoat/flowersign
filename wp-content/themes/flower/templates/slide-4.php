    <!-- line 983 !-->

    <div class="title_group1">
        <h3 class="title1"><span designelement="text" textindex="11" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">고객만족 444</span></h3>
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


<!-- end line 1764 !-->
