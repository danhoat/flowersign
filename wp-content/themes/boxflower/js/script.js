// fmans_mall_renew    2020/11/16
( function( $ ) {
	console.log('script load');

	jQuery(document).ready(function(){
		console.log('ready ');
		// 사이드 여닫기
		jQuery("#layout_header a[href='#category'], #layout_side_background, #side_close").click(function(){
			console.log('toggle menu');
			side_menu_onoff();
		});
	
		// 하단퀵메뉴
		jQuery(document)
		.bind('scroll',function(){
			if(jQuery(window).height()<jQuery("#quick_layer").height()*3 || (jQuery(document).height()-10 > jQuery(window).height() && jQuery(document).scrollTop()+jQuery(window).height() >= jQuery(document).height()-10)){
				jQuery("#quick_layer").hide();
			}else{
				if(!layout_side_opened) jQuery("#quick_layer").show();
			}
		}).trigger('scroll');
		jQuery(window).resize(function(){jQuery(document).scroll();});

		// 탭버튼스타일의 radio,checkbox
		jQuery(".radio_tab_wrapper input[type='radio'], .radio_tab_wrapper input[type='checkbox']").change(function(){
			jQuery("input[type='radio'], .radio_tab_wrapper input[type='checkbox']",jQuery(this).closest('.radio_tab_wrapper')).each(function(){
				if(jQuery(this).is(":checked")){
					jQuery(this).closest('td').addClass('checked');
				}else{
					jQuery(this).closest('td').removeClass('checked');
				}
			});
		});

		jQuery("button.btn_cancel_tab1").click(function(){
			jQuery("input[type='checkbox'], .ctg_list_sub input[type='checkbox']",jQuery(this).parents().find(".ctg_list_sub")).each(function(){
				if(jQuery(this).is(":checked")){
					jQuery(this).attr("checked",false).trigger('change');
				}
			});
		});

		jQuery("button.btn_cancel_tab2").click(function(){
			jQuery("input[type='text']",jQuery(this).parents().find(".ctg_result_sub")).each(function(){
				jQuery(this).val('');
				jQuery(this).attr('placeholder','');
			});
		});

		jQuery(".goodsSearchKeybtn").click(function(){
			jQuery("#goodsTopSearchForm input[name='insearch']").val('1');
		});

		/* 탭형식 공통사용 */
		jQuery(".sub_page_tab_wrap").each(function(){
			var wrapObj = this;
			jQuery(".sub_page_tab td",wrapObj).each(function(i){
				jQuery(this).click(function(){
					jQuery(".sub_page_tab td",wrapObj).removeClass("current");
					jQuery(this).addClass("current");
					jQuery(".sub_page_tab_contents",wrapObj).hide().eq(i).show();
				});
			}).eq(0).click();
		});

		// 서브 영역 열기/닫기
		// jQuery(".sub_division_title").live('click',function(){
		// 	var contentsObj = jQuery(this).closest('.sub_division_title').next('.sub_division_contents'),
		// 		 summaryObj = jQuery(this).parent().find('.sub_division_title_summary');
		// 	if(!contentsObj.is(":hidden")){
		// 		jQuery(this).children(".sub_division_arw").addClass('closed');
		// 		contentsObj.hide();
		// 		summaryObj.show();
		// 	}else{
		// 		jQuery(this).children(".sub_division_arw").removeClass('closed');
		// 		contentsObj.show();
		// 		summaryObj.hide();
		// 	}
		// 	typeof area_close_chk == 'function' && area_close_chk(); // 각 레이어별 닫힘 체크 :: 2017-05-29 lwh
		// });

		// //결제페이지의 사은품영역 서브 영역 열기/닫기
		// jQuery(".sub_division_title_gift").live('click',function(){
		// 	var contentsObj = jQuery(this).parent().closest('.sub_division_title').next('.sub_division_contents');
		// 	if(!contentsObj.is(":hidden")){
		// 		jQuery(this).children("sub_division_arw_gift").addClass('closed');
		// 		contentsObj.hide();
		// 	}else{
		// 		jQuery(this).children("sub_division_arw_gift").removeClass('closed');
		// 		contentsObj.show();
		// 	}
		// });

		/* 상품디스플레이 탭 스크립트 */
		jQuery('.displayTabContainer>li').on('click', function() {
			jQuery(this).closest('.displayTabContainer').find('li').removeClass('current');
			jQuery(this).addClass('current');
		});
		jQuery('[designelement=display]').each(function() {
			jQuery(this).find('.displayTabContentsContainer:first').show();
		});
		// 카테고리 추천상품에 탭인 경우
		jQuery('[designelement=categoryRecommendDisplay]').each(function() {
			jQuery(this).find('.displayTabContentsContainer:first').show();
		});

		/* 상품리스트 - 카테고리(슬라이딩 메뉴) */
		jQuery(".ctg_category").click(function(){
			jQuery(this).parent().parent().parent().nextAll().slideToggle().siblings("#ctg_category");
			jQuery("#ctg_category").css("max-height","70%");
			jQuery("#ctg_brand").hide();
			jQuery("#ctg_search").hide();
			jQuery("#ctg_sort").hide();
			jQuery(".ctg_bg").fadeIn();
			jQuery("html").attr("class","overflow");
		});
		jQuery("#ctg_category .ctg_close").click(function(){
			jQuery(this).parent().parent().slideToggle().siblings("#ctg_category");
			jQuery(".ctg_bg").fadeOut();
			jQuery("html").attr("class","auto");
		});

		/* 상품리스트 - 브랜드(슬라이딩 메뉴) */
		jQuery(".ctg_brand").click(function(){
			jQuery(this).parent().parent().parent().nextAll().slideToggle().siblings("#ctg_brand");
			jQuery("#ctg_category").hide();
			jQuery("#ctg_brand").css("max-height","70%");
			jQuery("#ctg_search").hide();
			jQuery("#ctg_sort").hide();
			jQuery(".ctg_bg").fadeIn();
			jQuery("html").attr("class","overflow");
		});

		jQuery("#ctg_brand .ctg_close").click(function(){
			jQuery(this).parent().parent().slideToggle().siblings("#ctg_brand");
			jQuery(".ctg_bg").fadeOut();
			jQuery("html").attr("class","auto");
		});

		/* 상품리스트 - 상세검색(슬라이딩 메뉴) */
		jQuery(".ctg_search").click(function(){
			jQuery(this).parent().parent().parent().nextAll().slideToggle().siblings("#ctg_search");
			jQuery("#ctg_category").hide();
			jQuery("#ctg_search").css("max-height","70%");
			jQuery("#ctg_brand").hide();
			jQuery("#ctg_sort").hide();
			jQuery(".ctg_bg").fadeIn();
			jQuery("html").attr("class","overflow");
		});
		jQuery("#ctg_search .ctg_close").click(function(){
			jQuery(this).parent().parent().slideToggle().siblings("#ctg_search");
			jQuery(".ctg_bg").fadeOut();
			jQuery("html").attr("class","auto");
		});

		/* 상품리스트 - 정렬(슬라이딩 메뉴) */
		jQuery(".ctg_sort").click(function(){
			jQuery(this).parent().parent().parent().nextAll().slideToggle().siblings("#ctg_sort");
			jQuery("#ctg_category").hide();
			jQuery("#ctg_brand").hide();
			jQuery("#ctg_search").hide();
			jQuery("#ctg_sort").css("max-height","70%");
			jQuery(".ctg_bg").fadeIn();
			jQuery("html").attr("class","overflow");
		});
		jQuery("#ctg_sort .ctg_close").click(function(){
			jQuery(this).parent().parent().slideToggle().siblings("#ctg_sort");
			jQuery(".ctg_bg").fadeOut();
			jQuery("html").attr("class","auto");
		});

		/* 상품리스트 - 백그라운드 */
		jQuery(".ctg_bg").click(function(){
			jQuery(".ctg_wrap").fadeOut();
			jQuery(".ctg_bg").fadeOut();
			jQuery("html").attr("class","auto");
		});

		/* 상품리스트 - 스와이프 안내 */
		jQuery(".swipe_close, .swipe_bg").click(function(){
			jQuery(".swipe_guide").hide();
		});

		/* 상품댓글 - SNS 공유(레이어) */
		jQuery("#cmt_sns_btn").live('click',function(){
			jQuery(".cmt_sns_pop").fadeIn();
			jQuery(".sns_bg").fadeIn();
			jQuery("html").attr("class","overflow").bind('touchmove', function(e){e.preventDefault()});
		});
		/* 상품상세 - SNS 공유(레이어) */
		jQuery("#sns_btn").click(function(){
			jQuery(".sns_pop").fadeIn();
			jQuery(".sns_bg").fadeIn();
			jQuery("html").attr("class","overflow").bind('touchmove', function(e){e.preventDefault()});
		});
		jQuery(".sns_close, .sns_bg").live('click', function(){
			jQuery(".sns_pop").fadeOut();
			jQuery(".cmt_sns_pop").fadeOut();
			jQuery(".sns_bg").fadeOut();
			jQuery("html").attr("class","auto").unbind('touchmove');
		});

		/* 플로팅 - BACK/TOP(대쉬보드) */
		jQuery(document).bind("scroll resize", function(){
			var scrollTop = parseInt(jQuery(document).scrollTop());
			if(scrollTop > 0){
				jQuery("#floating_over").fadeIn();
			}else{
				jQuery("#floating_over").fadeOut();
			}
		});
		jQuery("#floating_over .ico_floating_recently").click(function(){
			jQuery("#recently_popup").fadeIn();
			jQuery(".recently_bg").fadeIn();
			jQuery("html").attr("class","overflow").bind('touchmove', function(e){e.preventDefault()});
		});
		jQuery("#floating_over .recently_popup .btn_close").click(function(){
			jQuery("#recently_popup").fadeOut();
			jQuery(".recently_bg").fadeOut();
			jQuery("html").attr("class","auto").unbind('touchmove');
		});
	});

})( jQuery);

//최근본상품 삭제시 새로적용
function getfloatingrecentlydata(ftype, floatingid, act, totalcnt){
	var limit = ( floatingid == "recently_slide_bottom" )?4:3;
	if( act == "del" ) jQuery("#"+floatingid).parents().find(".recently_page").html('<a href="javascript:;" class="btn_page cover">선택</a>');
	$.ajax({
		'async' : false,
		'url' : '/common/get_right_display',
		'type' : 'GET',
		'data' : "type=right_item_recent&limit="+limit+"&ftype="+ftype,
		'success' : function(html){
			jQuery("#"+floatingid).html(html);
			if( limit < totalcnt ) {
				jQuery("#"+floatingid).touchSlider({
					flexible:true, roll:true, paging:jQuery("#"+floatingid).next().find(".btn_page"),
					initComplete:function(e){jQuery("#"+floatingid).next().find(".btn_page").each(function(i, el){jQuery(this).text("page " + (i+1));});},
					counter:function(e){jQuery("#"+floatingid).next().find(".btn_page").removeClass("on").eq(e.current-1).addClass("on");}
				});
			}
		}
	});
}

var layout_side_opened = false;
function side_menu_onoff(){
	//jQuery("#layout_side").css('min-height', jQuery(window).height());
	var tHeight		= jQuery("#layout_wrap").height();
	var sHeight		= jQuery("#layout_side").height();
	//if	(tHeight > sHeight) jQuery("#layout_side").css('height', tHeight+'px');
	if(tHeight > sHeight) jQuery("#layout_wrap").css('height', sHeight+'px');

	// 열기
	if	(!layout_side_opened){
		layout_side_opened = true;
		var orgWidth	= jQuery("#layout_side").width();
		var headerWidth	= jQuery("#layout_header").width() - orgWidth;
		jQuery("#layout_side").css("left", orgWidth*-1 + 'px');
		jQuery('a.hamberger_menu').addClass('on');
		if(jQuery("#layout_side").html()==''){
			$.ajax({
				'url' : '/common/ajax_mobile_layout_side',
				'async':true,
				'cache':false,
				'success' : function(res){
					jQuery("#layout_side").html(res);
					jQuery('#side_close').addClass('on');
				}
			});
		}
		jQuery("#quick_layer").hide();
		jQuery("#layout_side").show().animate({left:0}, 600, function(){
			//jQuery("#layout_header").css('left', orgWidth+'px');
			jQuery("#layout_wrap").css({'position' : 'absolute', 'width':'100%'});
			if(jQuery("body").find(".designPopupBandMobile").css("display") == 'block')
					jQuery("#side_close").css("top","-60px");
			else	jQuery("#side_close").css("top","0");
			jQuery('html, body').css({'overflow' : 'hidden'});
		});
		jQuery('#side_close').addClass('on');
		jQuery("#layout_side_background").fadeIn();
		//jQuery(".designPopupBandMobile").hide();

	// 닫기
	}else{
		layout_side_opened = false;
		jQuery("#layout_wrap").css({'position' : 'relative', 'width':'auto'});
		var orgWidth	= jQuery("#layout_side").width();
		var headerWidth	= jQuery("#layout_header").width() + orgWidth;
		//jQuery("#layout_header").css('left', '0px');
		jQuery("#layout_side").animate({left:orgWidth*-1}, 300, function(){
			jQuery("#layout_side").hide();
			jQuery("#layout_side_background").fadeOut();
			jQuery("#quick_layer").show();
			jQuery('html, body').css({'overflow' : 'visible'});
		});
		jQuery('#side_close').removeClass('on');
		setTimeout(function(){ jQuery('a[href=#category]').removeClass('on'); }, 800);
		//jQuery(".designPopupBandMobile").show();
	}
}

// 꽃청 추가 START 홍우기 2020.08.06 - 네이버페이용 - 장바구니/구매하기 함수
function disable_ribbon(){
	for(i=0, have_hopdate=0, value_hopdate=0; i<jQuery(".selected_inputs_title").length; i++){
		if(jQuery(".selected_inputs_title").eq(i).val() == '희망배송일'){
			jQuery(".selected_inputs").eq(i).val( '' );
		}else if(jQuery(".selected_inputs_title").eq(i).val() == '리본문구'){
			jQuery(".selected_inputs").eq(i).val( '' );
		}else if(jQuery(".selected_inputs_title").eq(i).val() == '보내는분'){
			jQuery(".selected_inputs").eq(i).val( '' );
		}else if(jQuery(".selected_inputs_title").eq(i).val() == '카드메시지'){
			jQuery(".selected_inputs").eq(i).val( '' );
		// 윤상희 2024.02.13 - 희망배송일 마감 시간 변경
		}else if(jQuery(".selected_inputs_title").eq(i).val() == '행사시간' || jQuery(".selected_inputs_title").eq(i).val() == '추가정보'){
			jQuery(".selected_inputs").eq(i).val( '' );
		}else if(jQuery(".selected_inputs_title").eq(i).val() == '행사정보'){
			jQuery(".selected_inputs").eq(i).val( '' );
		}
	}
}

function npay_layer_list(e, param){
	jQuery(".npay_layer_list").removeClass('selected');
	jQuery(e).addClass('selected');
	if(param == 'ribbon'){
		jQuery('.for_hidde_ribbon').css('display','block');
		jQuery('.for_hidden_balname').val('').css('display','block');
		jQuery('.for_hidden_card').val('').css('display','none');
		jQuery('.text_hidden_card').text('');
	}else if(param == 'card'){
		jQuery('.for_hidde_ribbon').val('').css('display','none');
		jQuery('.text_hidden_ribbon').text('');
		jQuery('.for_hidden_balname').css('display','none');
		jQuery('.text_hidden_balname').text('');
		jQuery('.for_hidden_card').css('display','block');
	}else if(param == 'both'){
		jQuery('.for_hidde_ribbon').css('display','block');
		jQuery('.for_hidden_balname').css('display','block');
		jQuery('.for_hidden_card').css('display','block');
	}else if(param == 'none'){
		jQuery('.for_hidde_ribbon').val('').css('display','none');
		jQuery('.text_hidden_ribbon').text('');
		jQuery('.for_hidden_balname').val('').css('display','none');
		jQuery('.text_hidden_balname').text('');
		jQuery('.for_hidden_card').val('').css('display','none');
		jQuery('.text_hidden_card').text('');
	}
}

// 꽃청 추가 START 홍우기 2020.11.16
function npay_layer_submit(){
	str = jQuery(".for_hidde_ribbon").val()+jQuery(".for_hidden_balname").val()+jQuery(".for_hidden_card").val();
	str = str.split('♥').join('').split('♡').join('');
	const regex = /(?:[\u2700-\u27bf]|(?:\ud83c[\udde6-\uddff]){2}|[\ud800-\udbff][\udc00-\udfff]|[\u0023-\u0039]\ufe0f?\u20e3|\u3299|\u3297|\u303d|\u3030|\u24c2|\ud83c[\udd70-\udd71]|\ud83c[\udd7e-\udd7f]|\ud83c\udd8e|\ud83c[\udd91-\udd9a]|\ud83c[\udde6-\uddff]|\ud83c[\ude01-\ude02]|\ud83c\ude1a|\ud83c\ude2f|\ud83c[\ude32-\ude3a]|\ud83c[\ude50-\ude51]|\u203c|\u2049|[\u25aa-\u25ab]|\u25b6|\u25c0|[\u25fb-\u25fe]|\u00a9|\u00ae|\u2122|\u2139|\ud83c\udc04|[\u2600-\u26FF]|\u2b05|\u2b06|\u2b07|\u2b1b|\u2b1c|\u2b50|\u2b55|\u231a|\u231b|\u2328|\u23cf|[\u23e9-\u23f3]|[\u23f8-\u23fa]|\ud83c\udccf|\u2934|\u2935|[\u2190-\u21ff])/g;
	var jbMatch = str.match( regex );
	
	if(jbMatch != null){
		alert('아래 특수문자는 사용하실 수 없습니다. \n'+jbMatch);
		return false;
	}else if( jQuery("#hop_select_date").val() == '' ){
		alert('날짜를 선택해 주세요.');
		return false;
	}else if( jQuery("#hop_select_txt option:selected").val() == '0' || jQuery("#hop_select_txt option:selected").val() == '' ){
		alert('희망배송시간을 선택해 주세요.');
		return false;
	}else{

		//상세페이지 루트
		for(i=0, have_hopdate=0, value_hopdate=0; i<jQuery(".selected_inputs_title").length; i++){
			if(jQuery(".selected_inputs_title").eq(i).val() == '희망배송일'){
				jQuery(".selected_inputs").eq(i).val( jQuery("#hop_select_date").val() +' '+ jQuery("#hop_select_txt option:selected").val() );
			}else if(jQuery(".selected_inputs_title").eq(i).val() == '리본문구'){
				jQuery(".selected_inputs").eq(i).val( jQuery(".for_hidde_ribbon").val() );
			}else if(jQuery(".selected_inputs_title").eq(i).val() == '보내는분'){
				jQuery(".selected_inputs").eq(i).val( jQuery(".for_hidden_balname").val() );
			}else if(jQuery(".selected_inputs_title").eq(i).val() == '카드메시지'){
				jQuery(".selected_inputs").eq(i).val( jQuery(".for_hidden_card").val() );
			// 윤상희 2024.02.13 - 희망배송일 마감 시간 변경
			}else if(jQuery(".selected_inputs_title").eq(i).val() == '행사시간' || jQuery(".selected_inputs_title").eq(i).val() == '추가정보'){
				jQuery(".selected_inputs").eq(i).val( jQuery("input[name='hop_event_time']").val() );
			}else if(jQuery(".selected_inputs_title").eq(i).val() == '행사정보'){
				jQuery(".selected_inputs").eq(i).val( jQuery("#hop_event_name").val() );
			}
		}

		//장바구니 루트
		for(var i=0; i<jQuery(".cgd_top input[type=checkbox]").length; i++){
			if( jQuery(".cgd_top input[type=checkbox]").eq(i).is(":checked") ){

				$.ajax({
					'async' : false,
					'url' : '/order/cart_to_naverpay',
					'type' : 'POST',
					'data' : {'cart_seq':jQuery(".cgd_top input[type=checkbox]").eq(i).val(),'hop_date':jQuery("#hop_select_date").val() +' '+ jQuery("#hop_select_txt option:selected").val(),'lc_ll':jQuery(".for_hidde_ribbon").val(),'bal_name':jQuery(".for_hidden_balname").val(),'lc_cc':jQuery(".for_hidden_card").val(),'hop_event_time':jQuery("input[name='hop_event_time']").val(),'hop_event_name':jQuery("#hop_event_name").val()},
					'success' : function(html){
					}
				});

			}
		}

		jQuery(".npay_btn_pay").trigger("click");
	}
}
// 꽃청 추가 END

//네이버페이 레이아웃 50글자 제한
function text_length_check(e, param){
	jQuery(".text_hidden_"+param).text( jQuery(e).val().length +'/50글자');
}

//네이버페이 레이아웃 모바일일때 세로 스크롤 생기게
jQuery(window).resize(function() {
	if( window.innerHeight < 470 ){
		jQuery(".npay_layer_contents").css("height","80%");
	}else{
		jQuery(".npay_layer_contents").css("height","");
	}
});

//장바구니에서 일반결제로 갈 때 희망배송일 등 삭제
function delete_cart_input(){

	//장바구니 루트
	for(var i=0; i<jQuery(".cgd_top input[type=checkbox]").length; i++){
		if( jQuery(".cgd_top input[type=checkbox]").eq(i).is(":checked") ){

			$.ajax({
				'async' : true,
				'url' : '/order/delete_cart_input',
				'type' : 'POST',
				'data' : {'cart_seq':jQuery(".cgd_top input[type=checkbox]").eq(i).val()},
				'success' : function(html){
				}
			});

		}
	}

}
// 꽃청 추가 END
