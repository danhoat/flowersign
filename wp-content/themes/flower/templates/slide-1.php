<!-- start slide 1 !-->

    <!-- BEST PRODUCTS -->
    <div class="title_group1" style="display:block;">
        <h3 class="title1"><span designelement="text" textindex="1" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">추천상품 111</span></h3>
        <p class="text2" designelement="text" textindex="2" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">꽃집청년들이 선택했어요:D</p>
    </div>
    <div data-effect="scale opacity" data-iconposition="left" data-icontype="best" style="display:block;">
        <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ [반응형] 디스플레이 템플릿 - 스와이프형 @@
- 파일위치 : [스킨폴더]/_modules/display/goods_display_sizeswipe.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<style>
    .designDisplay_670aa31da48d7 .goods_list ol.gli_contents { text-align:center;}
    .designDisplay_670aa31da48d7 .swiper-slide>li.gl_item { width:300px;  }
</style>

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁 -->

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁  끝 -->


<div id="designDisplay_670aa31da48d7" class="designDisplay" designelement="display" templatepath="main/index.html" displayseq="10001" perpage="" category="" displaystyle="sizeswipe">
          <div class="designDisplay_670aa31da48d7 display_slide_class displaySwipeTabContentsContainer" tabidx="0">
              <div class="goods_display_slide_wrap">
                  <div class="swiper-wrapper">
                         <?php 


                    $args = array(
                        'status' => 'publish',
                    );
                    $products = wc_get_products( $args );
                    if($products){
                        foreach($products as $product){ 
                            slide_1_item($product);
                        }
                    } else{
                        echo 'No products found.';
                    }
                    ?>


                    <!-- ------- //상품정보. ------- -->
                  </div>
                  <!-- scrollbar -->
                  <div class="display-scrollbar swiper-scrollbardesignDisplay_670aa31da48d7"></div>
              </div>
               <!-- left, right button -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
          </div>

<script>
    var t = new Date();
    var uniquekey_dsp = 'designDisplay_670aa31da48d7'+t.getTime();
    var display_swiper = [];

    $(function(){
        /* 상품디스플레이 스와이프형 탭 스크립트 */
        $("#designDisplay_670aa31da48d7 .displaySwipeTabContainer").each(function(){
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
       
    });
</script>
</div>
    </div>


    <!-- end slide 1 !-->

        <!-- 명화 띠배너  -->
    <a class="bn_famous bn_starnight" href="/page/sub/famous">
        <h5>꽃, 명화(名花)를 표현하다.</h5>
        <span>자세히 보기</span>
    </a>
