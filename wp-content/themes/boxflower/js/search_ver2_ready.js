var alert_timer = null;
function resp_search_ui() {
	// 검색필터 항목 하나도 없을때 UI처리 추가 190121 - sjg
	var searchFilterLength = jQuery('#searchFilter>li').length;
	if ( searchFilterLength == 0 ) {
		jQuery('#searchFilter').addClass('no_filter');
	}

	/* PC/MOBILE 분기해서 처리해야할 스크립트 */
	if ( window.innerWidth > 1023 ) { // ++++ PC형 ++++
		// PC init
		jQuery('#searchFilter').show();
		jQuery('#searchFilter .menuThebogi').removeClass('xxx opend');
		jQuery('#searchFilter .filter_detail_item').removeClass('opend');
		jQuery('#searchFilter .filter_section_sorting').hide();
		jQuery('#searchFilter .filter_detail_area').show();
		jQuery('#filteredItemSorting .item_order .list').show();

		// 항목 더보기(+) 노출
		setTimeout(function(){
			jQuery('#searchFilter .menuThebogi').each(function() {
				var filterDetailHeight = jQuery(this).closest('.filter_section').find('.filter_detail_item').prop('scrollHeight');
				if ( filterDetailHeight < 51 ) {
					jQuery(this).addClass('xxx');
				} else {
					jQuery(this).removeClass('xxx');
				}
			});
		}, 200);
	} else { // ++++ MOBILE형 ++++
		// MOBILE init
		jQuery('#searchFilter').hide();
		jQuery('#searchFilter .filter_section_sorting').show();
		jQuery('#btnFilterOpen').removeClass('opened');
		jQuery('#searchFilter .filter_detail_area').hide();
		jQuery('#searchFilter .filter_menu_area.on + .filter_detail_area').show();
		jQuery('#filteredItemSorting .item_order .list').hide();

		// 메뉴가 3개인 경우( 미니샵 )
		var filterMenuNum = jQuery('#searchFilter>li').length;
		jQuery('#searchFilter').addClass('devide' + filterMenuNum);

		// [Mobile] 필터 선택된 영역 scroll 위치
		mobileFilterSelectedScroll();
		var mo_f_s_s_click_item = '#searchFilter .filter_detail_item a[data-searchname], #searchFilter .filter_detail_item label[data-searchname]>input, #searchFilter #reSearchApply, #searchFilter #priceApply';
		jQuery( mo_f_s_s_click_item ).on('click', function() {
			setTimeout(function(){ mobileFilterSelectedScroll(); }, 20);
		});

		// 검색된 아이템 정렬
		jQuery('#filteredItemSorting .now_sorting_state').on('click', function() {
			if ( jQuery(this).hasClass('on') ) {
				jQuery(this).removeClass('on');
				jQuery(this).next('ul.list').hide();
			} else {
				jQuery(this).addClass('on');
				jQuery(this).next('ul.list').show();
			}
			return false;
		});
	}
}


( function( $ ) {
    jQuery(document).ready(function(){

/* +++++++++++++++++++++++ 검색 입력창 ++++++++++++++++++++++++ */
	// 꽃청 수정 START 윤상희 2023.04.07 - 네비게이션 수정
	// 검색 섹션 열기
	jQuery('#btnSearchV2, .top_menu_search').on('click', function() {
	// 꽃청 수정 END
		jQuery('#recentArea').show();
		jQuery('#searchVer2').addClass('on');
		jQuery('#autoCompleteArea').hide();
	});

	// 검색 섹션 닫기
	jQuery('.searchModuleClose').on('click', function() {
		jQuery('#searchVer2InputBox').val('');
		jQuery('#searchVer2').removeClass('on');
		//jQuery('#searchModule .contetns_area').hide();
		//searchAutoCompleteSlider.destroySlider(); // bx슬라이더 멈추면 좋은데 콘솔 에러뜸.
	});

	// 탭 컨텐츠( 최근 검색어, 최근본 상품 )
	jQuery('.tab_btns>li>a').on('click', function() {
		jQuery(this).closest('.tab_btns').children('li').removeClass('on');
		jQuery(this).parent('li').addClass('on');
		jQuery(this).closest('.tab_btns').parent().find('.tab_contents').hide();
		jQuery(this.hash).show();
		return false;
	});

	// 최근 검색어, 검색어 자동완성 클릭시 -> 검색어 텍스트 입력
	jQuery('#searchVer2 .searched_item').on('click', function() {
		jQuery('#searchVer2InputBox').val( jQuery(this).text() ).focus();
		jQuery("form#topSearchForm").submit();
	});

	// 자동 저장 - 끄기/켜기 UI
	jQuery('#searchVer2 .btnRecentAuto').on('click', function() {
		setRecentAuto('toggle');
	});

	// 자동 완성 - 끄기/켜기 UI
	jQuery('#searchVer2 .btnAutoComplete').on('click', function() {
		jQuery('#searchVer2 .btnAutoComplete').hide();
		if ( jQuery(this).hasClass('off') ) {
			jQuery('#searchVer2 .btnAutoComplete.on').show();
			jQuery('#autoCompleteList').hide();
			jQuery('#autoCompleteGuide').show();
		} else {
			jQuery('#searchVer2 .btnAutoComplete.off').show();
			jQuery('#autoCompleteList').show();
			jQuery('#autoCompleteGuide').hide();
		}
	});

	// 검색 입력 박스 focus
	jQuery('#searchVer2InputBox').on('focus', function() {
		if ( jQuery('#searchModule .contetns_area').is(':hidden') ) {
			//jQuery('#searchModule .contetns_area').show();
		}
		if ( jQuery(this).val() == '' ) {
			jQuery('#recentArea').show();
			jQuery('#autoCompleteArea').hide();
		}
	});

	// 검색 입력 박스 keyup -> 자동 완성 영역 노출, 추천상품 노출
	var searchAutoCompleteSlider = '';
	jQuery('#searchVer2InputBox').on('keyup', function() {
		var _this = this;
		if ( jQuery(_this).val() == '' ) {
			jQuery('#recentArea').show();
			jQuery('#autoCompleteArea').hide();
		} else {
			jQuery('#recentArea').hide();
			jQuery('#autoCompleteArea').show();
			clearTimeout(_this.__AutoCompleteTimer);
			_this.__AutoCompleteTimer = setTimeout(function() { showAutoComplete(jQuery(_this).val()); }, 300);
		}
	});
	jQuery('#searchVer2InputBox').on('blur', function() {
		if ( jQuery(this).val() == '' ) {
			jQuery('#searchVer2, #recentArea').show();
			jQuery('#autoCompleteArea').hide();
			//searchAutoCompleteSlider.destroySlider(); // bx슬라이더 멈추면 좋은데 콘솔 에러뜸.
		}
	});

	// 자동 저장 - 끄기/켜기 UI
	jQuery('#autoCompleteArea .btnAutoComplete').on('click', function() {
		setUseAuto('toggle');
	});
/* +++++++++++++++++++++++ //검색 입력창 ++++++++++++++++++++++++ */



/* +++++++++++++++++++++++ 검색 결과 필터 ++++++++++++++++++++++++ */

	resp_search_ui();
	jQuery( window ).on('resize', function() {
		if ( window.innerWidth != WINDOWWIDTH ) {
			resp_search_ui();
		}
	});
	jQuery('#btnFilterOpen').click(function() {
		if ( jQuery(this).hasClass('opened') ) {
			jQuery(this).removeClass('opened');
			jQuery('#searchFilter').hide();
		} else {
			jQuery(this).addClass('opened');
			jQuery('#searchFilter').show();
		}
		return false;
	});


	// 상품수/가나다 클릭 UI
	jQuery('#searchFilter .filter_section_sorting input[type=radio]').on('click', function() {
		jQuery(this).closest('.filter_section_sorting').find('label').removeClass('active');
		jQuery(this).parent('label').addClass('active');
	});

	// 필터 선택 영역 - 가격
	jQuery('#searchFilter #priceApply').on('click', function() {
		setFilterPrice(jQuery(this), false);
	});

	// 필터 선택 영역 - 재검색
	jQuery('#searchFilter #reSearchApply').on('click', function() {
		setFilterReSearch(jQuery(this), false);
	});

	// 선택된 필터 영역
	jQuery('#searchFilterSelected').on('click', 'a.remove', function() {
		// 페이지별 필수 항복 제어
		var bRequireErr = false;
		var sType		= jQuery(this).closest('li').data('type');
		var filteritem		= jQuery(this).closest('li').data('filteritem');
		var sSearchMode	= jQuery("input[name='searchMode']").val();
		if(sSearchMode == 'catalog' && sType =='category'){
			bRequireErr = true;
		}
		if(sSearchMode == 'brand' && sType =='brand' ){
			bRequireErr = true;
		}
		if(sSearchMode == 'location' && sType =='location'){
			bRequireErr = true;
		}
		if(sSearchMode == 'mshop' && sType =='provider'){
			bRequireErr = true;
		}
		if(bRequireErr){
			return false;
		}
		// 필터 선택된 항목 제어
		jQuery(this).closest('li').remove();
		switch ( jQuery(this).closest('li').data('filtertype') ) {
			case 'checkbox' : // 브랜드, 배송, 컬러
				jQuery('#searchFilter [data-searchname=' + filteritem + '] input[type=checkbox]').prop( 'checked', false );
				jQuery('#searchFilter [data-searchname=' + filteritem + ']').removeClass('active');
				break;
			case 'price' : // 가격
				if ( filteritem == 'min_price' ) {
					jQuery('#searchFilter [data-searchname=min_price]').val('');
				}
				if ( filteritem == 'max_price' ) {
					jQuery('#searchFilter [data-searchname=max_price]').val('');
				}
				break;
			case 'category' : // 카테고리
				jQuery('#searchFilter [data-searchname=' + filteritem + ']').removeClass('active');
				jQuery(".category_all_nav a[data-searchname='all']").click();
				break;
			case 'location' : // 지역
				jQuery('#searchFilter [data-searchname=' + filteritem + ']').removeClass('active');
				jQuery(".location_all_nav a[data-searchname='all']").click();
				break;
			case 'provider' : // 판매자
				jQuery('#searchFilter [data-searchname=' + filteritem + ']').removeClass('active');
				break;
			case 're_search' : // 재검색
				jQuery('#searchFilter [data-searchname=re_search]').val('');
				break;
			default :
				alert( '아직 정의하지 않은 타입' );
				break;
		}
		goodsSearch();
		return false;
	});

	// 검색필터 입력박스 Enter Keydown
	jQuery('#searchFilter input[type=text].input_sfilter').keydown(function(key) {
		if(key.keyCode == 13) { // Enter
			jQuery(this).closest('li').find('button.btn_sfilter').click();
		}
	});

	// 필터내의 브랜드 정렬 변경
	jQuery("input[name='sorting-brand']").bind("change", function(){
		filterSort(jQuery(this).val(), 'brandList');
	});

	// 필터내의 판매자 정렬 변경
	jQuery("input[name='sorting-seller']").bind("change", function(){
		filterSort(jQuery(this).val(), 'sellerList');
	});

	// 필터내의 판매자 정렬 변경
	jQuery("#filteredItemSorting li.item_order ul.list li label input").bind("change", function(){
		jQuery("#filteredItemSorting li.item_order ul.list li label").removeClass("active");
		jQuery(this).parent().addClass("active");
		goodsSearch();
	});

	// 상품 리스팅 숫자 변경
	jQuery("form#goodsSearchForm ul li select[name='per']").bind("change",function(){
		jQuery("form#goodsSearchForm input[name='page']").val('1');
		goodsSearch();
	});

	// 190218 모바일에서 소팅 추가
	jQuery('#mobileSortingSelected').text( jQuery('#mobileSortingSelected + .list label.active').text() );
	jQuery('#mobileSortingSelected').on('click', function() {
		if ( jQuery(this).hasClass('on') ) {
			jQuery(this).removeClass('on');
			jQuery(this).next('.list').hide();
		} else {
			jQuery(this).addClass('on');
			jQuery(this).next('.list').show();
		}
	});
	jQuery('#mobileSortingSelected + .list label').on('click', function() {
		var selected_text = jQuery(this).text();
		jQuery('#mobileSortingSelected').removeClass('on').text( selected_text );
		if ( jQuery('#mobileSortingSelected').is(':visible') ) {
			jQuery(this).closest('.list').hide();
		}
	});

	// 항목 더보기(+) 클릭
	jQuery('#searchFilter .menuThebogi').on('click', function() {
		var winW = jQuery(window).width();
		if (winW > 1023){
			// PC 관련 스크립트
			if ( jQuery(this).hasClass('xxx') === false ) {
				if ( jQuery(this).hasClass('opend') === true ) {
					jQuery(this).removeClass('opend');
					jQuery(this).closest('.filter_section').find('.filter_detail_item').removeClass('opend');
					jQuery(this).closest('.filter_section').find('.filter_section_sorting').hide(); // 상품수/가나다
				} else {
					jQuery(this).addClass('opend');
					jQuery(this).closest('.filter_section').find('.filter_detail_item').addClass('opend');
					jQuery(this).closest('.filter_section').find('.filter_section_sorting').show(); // 상품수/가나다
				}
			}
		}else{
			// 모바일 관련 스크립트
			jQuery('#searchFilter .filter_menu_area').removeClass('on');
			jQuery('#searchFilter .filter_detail_area').hide();
			jQuery(this).parent('.filter_menu_area').addClass('on');
			jQuery(this).closest('.filter_section').find('.filter_detail_area').show();
		}
	});

/* +++++++++++++++++++++++ 검색 결과 필터 ++++++++++++++++++++++++ */

	// 최근 본 상품
	todayViewList();
	// 최근 검색어
	searchRecentList();
	// 최근 검색어 자동저장
	//setRecentAuto('now');
	// 자동완성 사용
	//setUseAuto('now');
    })

})( jQuery);
