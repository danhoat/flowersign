
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
<style type="text/css">
#layout_body { max-width:100%; padding-left:0; padding-right:0; overflow: hidden; }


/* 하단 정보 (메인에서 하단 배너를 붙이기 위해 수정 된 코드) */
.layout_footer {margin-top: 0px;}
/* 하단 정보 끝*/
</style>

<!-- 비주얼 배너 -->
<!-- 비주얼배너 -->
<div class="slide-intro">
    <div id="image-carousel" class="splide" aria-label="">
        <div class="splide__track">
            <ul class="splide__list">
                <!--  날짜설정 -->
                                <!-- DIY 타임세일 -->
                <li class="splide__slide">
                    <a href="/page/event/timesale/timesale">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/timesale_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/timesale_m.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2 style="color:#FFD703;">10월 어썸 특가!</h2>
                            <h3 style="color:#FFD703;">선선한 가을바람 타고온<br>가을꽃 감성템 강추(秋) SALE</h3>
                            <div class="fm_btn" style="background-color: rgba(255, 215, 3, 1.0); color: #B64602;">타임딜 특가 보러가기</div>
                        </div>
                    </a>
                </li>
                                <!--  //날짜설정 -->
                  
                <li class="splide__slide" data-splide-interval="4000">
                    <a href="#" class="btn_tvcf01">
                        <div class="splide__slide_pc">
                            <div style="position: relative;">
                                <img src="https://f-mans.com/data/images/visual/mind_pc.jpg" alt="">
                                <div style="position: absolute; left: 0; top: 0; width: 100%; height: 100%;">
                                    <video classname="" autoplay="" loop="" muted="" playsinline="" poster="https://f-mans.com/data/images/visual/mind_pc.jpg" width="100%" height="100%">
                                        <source src="https://f-mans.com/data/images/visual/ending_pc.webm" type="video/webm">
                                        <source src="https://f-mans.com/data/images/visual/ending_pc.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide_mobile">
                            <div style="position: relative;">
                                <img src="https://f-mans.com/data/images/visual/mind_m.jpg" alt="">
                                <div style="position: absolute; left: 50%; top: 0; width: 100%; height: 100%; transform:translateX(-50%);">
                                    <video classname="" autoplay="" loop="" muted="" playsinline="" poster="https://f-mans.com/data/images/visual/mind_m.jpg" width="100%" height="100%">
                                        <source src="https://f-mans.com/data/images/visual/ending_m.webm" type="video/webm">
                                        <source src="https://f-mans.com/data/images/visual/ending_m.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="fm_text_box">
                            <h2>마음을 전하다</h2>
                            <h3>전국 당일 배송은 꽃집청년들</h3>
                            <div class="fm_btn" style="color: rgba(0, 59, 91, 0.8);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM10.1637 7.65625L5.35117 10.418C4.91914 10.6586 4.375 10.3496 4.375 9.84375V4.15625C4.375 3.65313 4.91641 3.34141 5.35117 3.58203L10.1637 6.50781C10.6121 6.75937 10.6121 7.40742 10.1637 7.65625Z" fill="rgba(0, 59, 91, 0.8)"></path>
                                </svg>
                                TV CF 보기
                            </div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/page/sub/famous">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/famous_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/famous_m.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2>명화를 꽃으로 만나다</h2>
                            <h3>꽃집청년들에만 있는 특별한 꽃</h3>
                            <div class="fm_btn" style="color: rgba(42, 19, 23, 0.8);">명화꽃 보러가기</div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/goods/catalog_list?code=0007">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/diy_pc_240214.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/diy_m_240214.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2 style="color:#7C574F;">DIY 꽃시장</h2>
                            <h3 style="color:#7C574F;">나만의 스타일로 공간을 연출해보세요.</h3>
                            <div class="fm_btn" style="color: rgba(124, 87, 79, .8);">DIY 꽃시장 구경가기</div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/page/event/appdownload">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/app_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/app_m.jpg" alt=""></div>
                        <div class="fm_text_box">
                            <h2>앱으로 회원 가입시</h2>
                            <h3>최대 4,500원 지급혜택을 드려요</h3>
                            <div class="fm_btn" style="color: rgba(56, 107, 139, 0.8);">앱 설치하러 가기</div>
                        </div>
                    </a>
                </li>
                <li class="splide__slide">
                    <a href="/goods/brand?code=00160006">
                        <div class="splide__slide_pc"><img src="https://f-mans.com/data/images/visual/oeun_pc.jpg" alt=""></div>
                        <div class="splide__slide_mobile"><img src="https://f-mans.com/data/images/visual/oeun_m.jpg?a1" alt=""></div>
                        <div class="fm_text_box">
                            <h2 style="color:#FFFFFF;">오은영과 함께하는</h2>
                            <h3 style="color:#FFFFFF;">뷰티 브랜드 오은 X 꽃집청년들</h3>
                            <div class="fm_btn" style="color: rgba(255, 125, 153, .8);">상품 보러가기</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    var splide = new Splide('.splide', {
        width: '1010px',
        padding: '45px',
        gap: '10px',
        type: 'loop',
        autoplay: 'true',
        interval: '5000',
    });

    splide.mount();
</script>
<!-- //비주얼배너 -->



<!-- TVCF 영상 modal winddow : 서민혁 210805 -->
<div id="modal_tvcf01">
    <div class="tvcf_content">
        <a href="#" class="btn_modal_close">
            <span></span>
            <span></span>
        </a>

        <div class="modal_movie modal_movie01">
            <iframe class="tvcf01" src="https://www.youtube.com/embed/w0TcX4nKzyg?si=ofGM59Tx8_d81nDX" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var embed1 = $('.tvcf01');

        $(".btn_tvcf01").click(function () {
            $("#modal_tvcf01").css('display', 'flex');
            $('.modal_movie').append(embed1);
            return false;
        });

        $("#modal_tvcf01 .btn_modal_close").click(function () {
            $("#modal_tvcf01").css('display', 'none');
            $('.modal_movie').empty();
        });

        $("body").click(function () {
            $("#modal_tvcf01").css('display', 'none');
            $('.modal_movie').empty();
        });

    })
</script>