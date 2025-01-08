
     <div id="layout_side" class="layout_side" style="display: none;"><!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++
@@ 어사이드 @@
- 파일위치 : [스킨폴더]/_modules/common/layout_side.html
++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<div class="aside_userinformation">
    <ul>
        <li class="left_area">
            <span class="gray_06" designelement="text" textindex="2" >FlowerSight.</span>
        </li>
        <li class="right_area">
            <a href="../member/login" class="btn_resp color4" designelement="text" textindex="3" > Đăng Nhập</a>
            <a href="../member/agreement" class="btn_resp" designelement="text" textindex="4" >Đăng Ký</a>
        </li>
    </ul>
</div>



<div class="aside_navigation_wrap">


    <!-- ++++++++ 카테고리 ++++++++ -->
    <div class="designElement" designelement="category">
        <ul id="categorySideMenu" class="menu mobilemenu">
            <?php 

             wp_nav_menu( array(
                'theme_location' => 'mobile_menu',
                'items_wrap' =>'%3$s',
               'container' => '',
            ) ); 
            ?>
        </ul>
    </div>
    <!-- ++++++++ //카테고리 ++++++++ -->

    <!-- ++++++++ 브랜드 ++++++++ -->
    <ul id="brandSideMenu" class="menu" style="display:none;">


            <li class="mitem category mitem_brand mitemicon3 hide" style="background:inherit !important; display:none;" title_eng="" title="라인별">
                <a class="mitem_title" style="width:0%;"></a>
                <a class="mitem_goodsview" href="/goods/brand?code=0004">라인별</a>
            </li>

           
            ?>
            <li class="mitem_subcontents" style="display:block;margin-top:1px;">


                <ul class="submenu">
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00040001" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">클래식라인</a>
                                            </li>
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00040008" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">모던라인</a>
                                            </li>
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00040007" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">테디라인</a>
                                            </li>
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00040010" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">라탄라인</a>
                                            </li>
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00040009" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">엔틱라인</a>
                                            </li>
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00040005" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">폴리곤라인</a>
                                            </li>
                </ul>
            </li>

    </ul>
    <!-- ++++++++ //브랜드 ++++++++ -->

    
    <ul id="locationSideMenu" class="menu" style="display:none;">
            <!--<li class="mitem category mitem_brand mitemicon1" title_eng="" title="컬렉션">-->
            <li class="mitem category mitem_location mitemicon1" style="background:inherit !important; border-bottom:0;" title_eng="" title="컬렉션">
                            </li>
            <li class="mitem_subcontents" style="display:block;margin-top:1px;">
                <ul class="submenu">
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00020001" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">명화 컬렉션</a>
                                            </li>
                    <li class="submitem category" style="border-bottom:solid 1px #eee;">
                        <!--<a class="submitem_title"></a>-->
                        <a class="mitem_goodsview" href="/goods/brand?code=00020002" style="margin:0; width:100%; padding:13px 5px 11px 15px; line-height: 1.3; height:40px;">수국 컬렉션</a>
                                            </li>
                </ul>
            </li>
    </ul>

    <!-- ++++++++ 커뮤니티 ++++++++ -->
    <ul id="boardSideMenu" class="menu board" style="display:none;">
        <li><a href="/board/?id=notice" designelement="text" textindex="18" >공지사항</a></li>
        <li><a href="/board/?id=faq" designelement="text" textindex="19" >자주묻는질문</a></li>
        <li><a href="/board/?id=goods_qna" designelement="text" textindex="20" >상품문의</a></li>
        <li><a href="/board/?id=goods_review" designelement="text" textindex="21" >상품후기</a></li>
<li><a href="/board/?id=bulkorder" designelement="text" textindex="22" >대량구매</a></li>        
<li><a href="/board/?id=gallery_adm" designelement="text" textindex="23" target="_self">실제배송사진</a></li>
    </ul>
    <!-- ++++++++ //커뮤니티 ++++++++ -->

    <div class="aside_navigation_bottom_line"></div>
</div>



<!-- 페이팔 배너 : 서민혁 220502 -->
<div class="banner_paypal">
    <a href="/page/paypal">
        <picture>
            <source media="(max-width: 750px)" srcset="<?php echo IMAGE_URL;?>/m_snb_banner_paypal.jpg">
            <img src="<?php echo IMAGE_URL;?>/snb_banner_paypal.jpg" alt="페이팔 결제 안내">
        </picture>
    </a>
</div>
<!-- 페이팔 배너 끝 -->


<!-- CS CENTER 정보(SIDE) -->
<div class="wrap_aside">
    <h3 class="title_sub3 v2"><a href="/service/cs" designelement="text" textindex="25">Hotline</a></h3>
    <a class="aside_cs_phone" href="tel:1800-7879">093 407 2575</a>
    <!-- <p class="aside_cs_addinfo" designElement="text">문자수신 가능합니다.</p> -->
    <p class="aside_cs_addinfo" designelement="text" textindex="26" >Thời gian<br>AM 08:00 ~ PM 08:00<br></p>
</div>



</div>

<!--end layout_lide - line 543 !-->
