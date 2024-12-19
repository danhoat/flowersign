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

function list_bulde_product(){?>
    <ul class="list-bundles">

<li class="splide__slide is-active is-visible" id="splide02-slide09" style="margin-right: 8px; width: 142px;" aria-hidden="false" tabindex="0"><div class="relative"><input id="hiddenChoice332" type="checkbox" class="hidden_choice_checkbox hidden" value="true" data-gtm-form-interact-field-id="0"><div class="addon-container flex flex-col justify-between px-3 pb-2 rounded-md border-2 border-blue-light text-center choice addon-box cursor-pointer hover:bg-gray-50" data-addonid="332"><div class="absolute addon-info cursor-pointer" data-id="8"><i class="fa fa-info pointer-events-none"></i></div><div class="addon-name text-red pr-2 addon-title line-clamp-2" data-addonid="332">Gấu Bông Đáng Yêu</div><img src="https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_aIlFh7F0uQRQiuqrFxmuj5cOy.webp" alt="Gấu Bông Đáng Yêu" class="addon-image w-24 h-24 object-cover object-center my-1 self-center addon-img cursor-pointer" data-addonid="332"><span class="addon-price font-bold cursor-pointer" data-addonid="332">169,000 ₫</span></div></div><div class="grid-cols-3 hidden" id="qty-332"><span class="btn text-sm hover:text-brand-dark" data-symb="-" data-id="332">-</span><span class="self-center justify-self-center">0</span><span class="btn text-sm hover:text-brand-dark" data-symb="+" data-id="332">+</span></div></li>

       <li class="splide__slide is-visible" id="splide03-slide02" aria-hidden="false" tabindex="0" style="margin-right: 8px; width: 142px;"><div class="relative"><input id="hiddenChoice4632" type="checkbox" class="hidden_choice_checkbox hidden" value="true"><div class="addon-container flex flex-col justify-between px-3 pb-2 rounded-md border-2 border-blue-light text-center choice addon-box cursor-pointer hover:bg-gray-50" data-addonid="4632"><div class="absolute addon-info cursor-pointer" data-id="1"><i class="fa fa-info pointer-events-none"></i></div><div class="addon-name text-red pr-2 addon-title line-clamp-2" data-addonid="4632">Nến Thơm Giáng Sinh Cây Thông</div><img src="https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_YRR6d609qQtD2eR4b5uzJkkxI.webp" alt="Nến Thơm Giáng Sinh Cây Thông" class="addon-image w-24 h-24 object-cover object-center my-1 self-center addon-img cursor-pointer" data-addonid="4632"><span class="addon-price font-bold cursor-pointer" data-addonid="4632">169,000 ₫</span></div></div><div class="grid-cols-3 hidden" id="qty-4632"><span class="btn text-sm hover:text-brand-dark" data-symb="-" data-id="4632">-</span><span class="self-center justify-self-center">0</span><span class="btn text-sm hover:text-brand-dark" data-symb="+" data-id="4632">+</span></div></li>



<li class="splide__slide is-active is-visible" id="splide02-slide05" style="margin-right: 8px; width: 142px;" aria-hidden="false" tabindex="0"><div class="relative"><input id="hiddenChoice4630" type="checkbox" class="hidden_choice_checkbox hidden" value="true"><div class="addon-container flex flex-col justify-between px-3 pb-2 rounded-md border-2 border-blue-light text-center choice addon-box cursor-pointer hover:bg-gray-50" data-addonid="4630"><div class="absolute addon-info cursor-pointer" data-id="4"><i class="fa fa-info pointer-events-none"></i></div><div class="addon-name text-red pr-2 addon-title line-clamp-2" data-addonid="4630">Banner ( Băng Rôn ) Merry Christmas</div><img src="https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_QMMDsxRzUKrXjoX8R3p9uzz9u.webp" alt="Banner ( Băng Rôn ) Merry Christmas" class="addon-image w-24 h-24 object-cover object-center my-1 self-center addon-img cursor-pointer" data-addonid="4630"><span class="addon-price font-bold cursor-pointer" data-addonid="4630">19,000 ₫</span></div></div><div class="grid-cols-3 hidden" id="qty-4630"><span class="btn text-sm hover:text-brand-dark" data-symb="-" data-id="4630">-</span><span class="self-center justify-self-center">0</span><span class="btn text-sm hover:text-brand-dark" data-symb="+" data-id="4630">+</span></div></li>


     <li class="splide__slide is-visible" id="splide02-slide06" style="margin-right: 8px; width: 142px;" aria-hidden="false" tabindex="0"><div class="relative"><input id="hiddenChoice237" type="checkbox" class="hidden_choice_checkbox hidden" value="true"><div class="addon-container flex flex-col justify-between px-3 pb-2 rounded-md border-2 border-blue-light text-center choice addon-box cursor-pointer hover:bg-gray-50" data-addonid="237"><div class="absolute addon-info cursor-pointer" data-id="5"><i class="fa fa-info pointer-events-none"></i></div><div class="addon-name text-red pr-2 addon-title line-clamp-2" data-addonid="237">Hộp Chocolate Ferrero Rocher (5 viên)</div><img src="https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_cXFSDEMW87kZbse3b23rt8bud.webp" alt="Hộp Chocolate Ferrero Rocher (5 viên)" class="addon-image w-24 h-24 object-cover object-center my-1 self-center addon-img cursor-pointer" data-addonid="237"><span class="addon-price font-bold cursor-pointer" data-addonid="237">119,000 ₫</span></div></div><div class="grid-cols-3 hidden" id="qty-237"><span class="btn text-sm hover:text-brand-dark" data-symb="-" data-id="237">-</span><span class="self-center justify-self-center">0</span><span class="btn text-sm hover:text-brand-dark" data-symb="+" data-id="237">+</span></div></li>
     
    </ul>
    <?php 

}