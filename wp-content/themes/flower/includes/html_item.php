<?php
function slide_1_item($product, $pos = 0){

    // $img = wp_get_attachment_image( $product_meta['_thumbnail_id'][0], 'full' );
    $product_id = $product->get_id();
    $img = get_the_post_thumbnail_url($product_id);
    // echo '<pre>';
    // var_dump($product);
    // echo '</pre>';
    // die();


    ?>

    <ul class="goods_list swiper-slide">    <li class="gl_item">
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
                    <span class="nuM"><?php echo $product->get_sale_price();?></span>원
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

function slide_2_item($product, $pos = 0){ ?>
    <ul class="goods_list swiper-slide">   <li class="gl_item">
    <div class="gl_inner_item_wrap">

        <!--상품이미지-->
        <div class="gli_image goodsDisplayImageWrap">
            <a href="javascript:void(0);" class="respItemImageArea" onclick="display_goods_view('143','',this,'goods_view')">
                <img src="<?php echo fget_random_img($pos);;?>" data-src="<?php echo fget_random_img($pos);;?>" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="별이빛나는밤">

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
</ul>
<?php }