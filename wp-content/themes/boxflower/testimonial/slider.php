<div id="designDisplay_670aa31da48d7" class="designDisplay" designelement="display" templatepath="main/index.html" displayseq="10001" perpage="" category="" displaystyle="sizeswipe">
    <div class="designDisplay_670aa31da48d7 display_slide_class displaySwipeTabContentsContainer" tabidx="0">
        <div class="goods_display_slide_wrap">
            <div class="swiper-wrapper">
            
                <ul class="goods_list swiper-slide">   
                    <li class="gl_item1">
                        <div class="gl_inner_item_wrap">
                        <?php testimonial_item1();?>

                        </div>
                    </li>
                
                </ul>
                <ul class="goods_list swiper-slide">   
                    <li class="gl_item1">
                        <div class="gl_inner_item_wrap">
                        <?php testimonial_item2();?>

                        </div>
                    </li>
                
                </ul>
                <ul class="goods_list swiper-slide">   
                    <li class="gl_item1">
                        <div class="gl_inner_item_wrap">
                        <?php testimonial_item3();?>

                        </div>
                    </li>
                
                </ul>
                


                    <!-- ------- //상품정보. ------- -->
            </div>
                  <!-- scrollbar -->
            <div class="display-scrollbar swiper-scrollbardesignDisplay_670aa31da48d7"></div>
        </div>
               <!-- left, right button -->
              <!-- <div class="swiper-button-next"></div> 
                <div class="swiper-button-prev"></div> !-->
              <?php btn_next_testimonial();?>
              <?php btn_pre_testimonial();?>
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
                   // slidesPerView: 'auto',
                    grabCursor: true,
                    loop: true,
                    nextButton: $(this).find('.mkdf-next-icon'),
                    prevButton: $(this).find('.mkdf-prev-icon')
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
