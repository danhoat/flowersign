<?php get_header(); ?>

    <?php

    $args = array();
    $products = wc_get_products($args);
    // echo '<pre>';
    // var_dump($products);
    // echo '</pre>';
    ?>
    <div id="catalog_list_page">
        
    <div class="catalog_title bg_blur">
        <ul class="">
                <li data-scroll="00010014" class="">플로리스트 추천</li>
                <li data-scroll="00010010" class="">출산 육아 선물</li>
                <li data-scroll="00010001" class="">택배특가</li>
                <li data-scroll="00010002" class="">명화컬렉션</li>
                <li data-scroll="00010004">이달의 꽃</li>
                <li data-scroll="00010005">꽃과 선물</li>
                <li data-scroll="00010011">DIY 꽃시장</li>
                <li data-href="/goods/brand?code=00160001A"><p><!-- 꽃선물 <img>-->전체보기</p></li>
        </ul>
    </div>


    <div class="catalog_content_list">
        <div class="catalog_content catalog_content_00010014">
            <div class="catalog_content_top"><div class="catalog_content_top_html">
<div>플로리스트 추천 꽃선물</div>
</div></div>
            <div class="catalog_content_subtitle_div_0" data-idx="0" style="overflow: hidden;">
            <ul class="catalog_content_subtitle">
                <li class="on" data-type="brand" data-category="00160001">전체</li>
                <li data-type="catalog" data-category="0001">꽃다발</li>
                <li data-type="catalog" data-category="0002">꽃바구니</li>
                <li data-type="catalog" data-category="0003">꽃상자</li>
            </ul>
            </div>
            <div class="catalog_content_middle">
                <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ [반응형] 디스플레이 템플릿 - 격자 반응형 @@
- 파일위치 : [스킨폴더]/_modules/display/goods_display_responsible.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<style>
    .designDisplay_670fe927bf69d .goods_list li.gl_item{ width:300px; }
</style>

<div id="designDisplay_670fe927bf69d" class="designDisplay" designelement="display" templatepath="goods/catalog_list.html" displayseq="10308" page="1" perpage="" category="" displaystyle="responsible">

    <div class="designDisplay_670fe927bf69d display_responsible_class ">
        <!-- ------- 상품정보. 파일위치 : /data/design/ ------- -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ goods_info_style_1 @@
- 파일 위치 : /data/design/goods_info_style_1.html
- CSS 경로 : /data/design/goods_info_style.css
- 상품정보 관련 CSS 수정 및 추가는 다음의 CSS파일에서 작업하시기 바랍니다.
/data/design/goods_info_user.css
※ /data 폴더는 /skin 폴더 상위 폴더입니다.
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <style>
        .designDisplay_670fe927bf69d.goods_list li.gl_item{ width:300px; }
    </style>


    <ul class="goods_list designDisplay_670fe927bf69d goods_info_style_1">
        <?php 

        $products = wc_get_products( $args );
        if($products){
            foreach($products as $product){ 
                $product_id = $product->get_id();
                $img = get_the_post_thumbnail_url($product_id);
                ?>

                <li class="gl_item">
                <div class="gl_inner_item_wrap">

                    <!--상품이미지-->
                    <div class="gli_image goodsDisplayImageWrap" style="border: 0px;">
                        <a href="<?php echo get_the_permalink($product_id);?>" class="respItemImageArea" >
                            <img src="<?php echo $img;?>" data-src="<?php echo $img; ?>" class="goodsDisplayImage lazyload" onerror="this.src='/data/skin/responsive_ver1_default_gl/images/common/noimage.gif'" alt="계절마음" style="max-height: 300px;">
                        </a>

                        <!-- 반응형 icon new -->

                        <!-- 반응형 zzim -->

                        <!-- 미리보기/옵션보기/SNS보내기 -->

                        <!-- 상품 상태 표시 -->
                    </div>

                    <div class="resp_display_goods_info infO_style_1">

                        <!-- 상품명-->
                        <div class="goodS_info displaY_goods_name">
                            <span class="areA"><a href="/goods/view?no=140">계절마음</a></span>
                        </div>

                        <div class="infO_group">
                            <!-- 비회원 대체문구 -->
                            <!-- (할인혜택)판매가 -->
                            <!-- 꽃청 수정 START 윤상희 2024.03.13 - 품절 -->
                            <div class="goodS_info displaY_sales_price ">
                            <!-- 꽃청 수정 END -->
                                <span class="areA">
                                    <span class="nuM">58,500</span>원
                                </span>
                            </div>

                            <!-- 정가 -->

                            <!-- 할인율 -->
                        </div>

                        <div class="infO_group">
                            <!-- 무료배송 -->
                            <div class="goodS_info displaY_besong typE_a">
                                <span class="areA">무료배송</span>
                            </div>

                            <!-- 해외배송 -->
                        </div>

                        <!-- 꽃청 추가 START 윤상희 2024.01.09 - 사이즈, 택배 및 퀵 서울 출력, 품절 -->
                        <div class="infO_group">
                            <div class="goodS_info displaY_custom_badge">
                            <span class="areA">퀵배송</span>
                            <!-- 사이즈 -->
                            <span class="areA">S</span>
                            </div>
                        </div>
                        <!-- 꽃청 추가 END -->

                        <div class="infO_group">
                            <!-- (단독이벤트) 판매수량 -->
                            <div class="goodS_info displaY_event_order_ea">
                                <span class="areA">구매<span class="nuM">41,349</span></span>
                            </div>

                            <!-- 상품후기 작성수 -->
                            <div class="goodS_info displaY_review_count">
                                <span class="areA">후기<span class="nuM">1,470</span></span>
                            </div>
                        </div>

                    </div>

                </div>
              </li>
   <?php } }?>
    </ul>
</div>


</div>

            </div>
            <div class="catalog_content_bottom">
                <a href="/goods/brand?code=00160001" onclick="" class="total_goods">플로리스트 추천 상품 모두 보기<img alt="icon"></a>
            </div>
        </div>
        
        
        
        
        
        
    </div>


</div>
        <!-- ================= 파트 페이지들 :: END. ================= -->
        </div>
<?php get_footer(); ?>