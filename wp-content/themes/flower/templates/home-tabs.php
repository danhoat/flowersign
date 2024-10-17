
    <div class="title_group1">
        <h3 class="title1"><span designelement="text" textindex="9" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">동서양난 tab1 </span></h3>
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