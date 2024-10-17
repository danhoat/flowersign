
<!-- start sline 2 !-->

    <div class="title_group1">
        <h3 class="title1"><span designelement="text" textindex="3" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">꽃선물 SLIDE N0.2</span></h3>
        <p class="text2" designelement="text" textindex="4" texttemplatepath="cmVzcG9uc2l2ZV92ZXIxX2RlZmF1bHRfZ2wvbWFpbi9pbmRleC5odG1s">한아름 피어나는 싱그러운 미소를 상상해요.</p>
    </div>
    <div data-effect="scale opacity">
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ [반응형] 디스플레이 템플릿 - 스와이프형 @@
- 파일위치 : [스킨폴더]/_modules/display/goods_display_sizeswipe.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<style>
    .designDisplay_670aa31dbdc10 .goods_list ol.gli_contents { text-align:center;}
    .designDisplay_670aa31dbdc10 .swiper-slide>li.gl_item { width:300px;  }
</style>

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁 -->

<!-- 추천상품 타이틀 부분 20200717 수정 : 서민혁  끝 -->


<div id="designDisplay_670aa31dbdc10" class="designDisplay" designelement="display" templatepath="main/index.html" displayseq="10150" perpage="" category="" displaystyle="sizeswipe">
          <div class="designDisplay_670aa31dbdc10 display_slide_class displaySwipeTabContentsContainer" tabidx="0">
              <div class="goods_display_slide_wrap">
                  <div class="swiper-wrapper">
                    <!-- ------- 상품정보. 파일위치 : /data/design/ ------- -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ goods_info_style_2 @@
- 파일 위치 : /data/design/goods_info_style_2.html
- CSS 경로 : /data/design/goods_info_style.css
- 상품정보 관련 CSS 수정 및 추가는 다음의 CSS파일에서 작업하시기 바랍니다.
/data/design/goods_info_user.css
※ /data 폴더는 /skin 폴더 상위 폴더입니다.
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

                    <?php slide_2_item() ;?>
                     <?php slide_2_item() ;?>
                      <?php slide_2_item() ;?>
                       <?php slide_2_item() ;?>
                        <?php slide_2_item() ;?>
                    <!-- ------- //상품정보. ------- -->
                  </div>
                  <!-- scrollbar -->
                  <div class="display-scrollbar swiper-scrollbardesignDisplay_670aa31dbdc10"></div>
              </div>
               <!-- left, right button -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
          </div>

<script>
    var t = new Date();
    var uniquekey_dsp = 'designDisplay_670aa31dbdc10'+t.getTime();
    var display_swiper = [];

    $(function(){
        /* 상품디스플레이 스와이프형 탭 스크립트 */
        $("#designDisplay_670aa31dbdc10 .displaySwipeTabContainer").each(function(){
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

<!-- END Slide2 !-->
 <!-- 꽃청 삭제 START 김태섭 2023-06-09 - 작약 띠배너 삭제 후 수국 띠배너 교체 -->
    <!-- 작약 띠배너  -->
    <!-- <a class="bn_peony" href="/goods/brand?code=00020003">
        <h5>신부의 수줍은 고백, 작약!</h5>
        <span>자세히 보기</span>
    </a> -->
    <!-- 수국 띠배너  -->
    <a class="bn_hydrangea" href="/goods/brand?code=00020002">
        <h5>수국으로 진심을 선물해보세요:)</h5>
        <span>자세히 보기</span>
    </a>
    <!-- 꽃청 삭제 END 김태섭 2023-06-09 - 작약 띠배너 삭제 후 수국 띠배너 교체 -->
  <!-- end slide 2 !-->