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
        interval: '3000',
    });

    splide.mount();
</script>
<!-- //비주얼배너 -->
<!-- end intro_slide !-->
