<?php
function slide_1_item($product, $pos = 0){ ?>

    <ul class="goods_list swiper-slide">    <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="detail.html" class="respItemImageArea" >
                <img src="<?php echo fget_random_img($pos);;?>" data-src="<?php echo fget_random_img($pos); ?>" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="계절마음">
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
            <span class="areA"><a href="detail.html">계절마음</a></span>
        </div>

        <!-- 비회원 대체문구 -->

        <div class="infO_group">
            <!-- (할인혜택)판매가 -->
            <div class="goodS_info displaY_sales_price">
                <span class="areA">                 
                    <span class="nuM">58,500</span>원
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
<?php } ?>