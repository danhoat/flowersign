<!-- 비주얼 배너 -->

<!-- line 293 intro start !-->
<!-- 비주얼배너 -->
<div class="slide-intro">
    <div id="image-carousel" class="splide" aria-label="">
        <div class="splide__track">
            <ul class="splide__list">
           <?php box_show_slider(); ?>
           
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
<!-- end intro_slide !-->


<!-- TVCF 영상 modal winddow : 서민혁 210805 -->
<!-- <div id="modal_tvcf01">
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
</script> -->

<!-- TVCF 영상 modal winddow 끝 -->

<!-- 테마 메뉴 -->
