/* fmans_mall_renew    2021/01/06 */
   if	(typeof L10n != 'object')
	   document.write('<script type="text/javascript" src="/data/js/language/L10n_KR.js?v=1"></script>');

   // 함수부만 따로 호출
	 document.write('<script type="text/javascript" src="/app/javascript/js/common-function.js?dummy=20240219111900"></script>');

   window.Firstmall = window.Firstmall || {};

   $(function(){
	   try {
			 var target = $(window);
		   var target_events = [];
		   var callback = function(e) {
			   if(['input', 'textarea', 'select'].indexOf(e.target.tagName.toLowerCase()) === -1 && !e.target.isContentEditable) e.preventDefault();
			   else e.stopPropagation();
		   };

		   if(Firstmall.Config.Security.PreventDrag) target_events.push('selectstart');
			 if(Firstmall.Config.Security.PreventContextMenu)
			 {
			 	console.log('enable right click');
				 // target_events.push('contextmenu');
				 // $('body').css('-webkit-touch-callout','none');
			 }
		   target.on(target_events.join(' '), callback);
	   } catch(ex) {
		   if(ex instanceof TypeError) 1;/* jQuery 1 related exception($(window).on is not exists) */
		   else console.log('An exception occured while set contextmenu prevent event: ', ex);
	   }
   });

   $(function(){
	   var cartVersion = $('input[name=cart_version]').val(); //18-05-03 카트 스킨 버전 gcns jhs add
	   /* 스타일적용 */
	   apply_input_style();

	   // jstree 객체를 사용하는 페이지에서는 jQuery 구버전을 사용하므로 on 함수가 없어 예외 처리
	   if(typeof $.jstree !== "object") {
		 //상품디스플레이의 동영상클릭시 -> 동영상자동실행설정되어있어야함
		 $(document).on('click', ".goodsDisplayVideoWrap", function() {
			 $(this).find("img").addClass("hide");
			 $(this).find(".thumbnailvideo").hide();
			 $(this).find(".mobilethumbnailvideo").hide();
			 $(this).find("iframe").removeClass("hide");
			 $(this).find("embed").removeClass("hide");

			 var iframe = $(this).find("iframe");
			 iframe.attr('src', iframe.attr('data-src'));
		 });

		 //동영상넣기의 동영상클릭시-> 동영상자동실행설정되어있어야함
		 $(document).on('click', ".DisplayVideoWrap", function() {
			 $(this).find("img").addClass("hide");
			 $(this).find(".thumbnailvideo").hide();
			 $(this).find(".mobilethumbnailvideo").hide();
			 $(this).find("iframe").removeClass("hide");
			 $(this).find("embed").removeClass("hide");

			 var iframe = $(this).find("iframe");
			 iframe.attr('src', iframe.attr('data-src'));
		 });
	   }

	   //18-05-03 gcns jhs add 장바구니 개선
	   if(cartVersion >= 3){
		   if (typeof gl_operation_type != 'undefined' && gl_operation_type == 'light') { // 반응형스킨
			   // 전체 선택
			   $('.btn_select_all').attr('checked',true);
			   $("form#cart_form .btn_select_all").change(function() {
				   if($(this).is(":checked")){
					   $("form#cart_form input[name='cart_option_seq[]']").each(function(){
						   $(this).attr("checked",true);
					   });
					   cnt = $("form#cart_form input[name='cart_option_seq[]']").length;
				   }else{
					   $("form#cart_form input[name='cart_option_seq[]']").each(function(){
						   $(this).removeAttr("checked");
					   });
				   }
			   });
			   $("form#cart_form .btn_select_all").change();

			   $('input[name*="cart_option_seq[]"]').live('click',function(){
				   checkBoxCheck();
				   setPriceInfoCheck();
			   });
		   } else if(gl_set_mode == 'mobile'){ // 전용스킨-모바일
			   // 전체 선택
			   $('.btn_select_all').attr('checked',true);
			   $("form#cart_form .btn_select_all").change(function() {
				   if($(this).is(":checked")){
					   $("form#cart_form input[name='cart_option_seq[]']").each(function(){
							 	/**
								* 20210408 : kjw
								* 배송 가능 상품 여부에 따른 테두리 색상 변경로직 추가
								*/
								var ship_possible_flag = $("input[name='ship_possible["+$(this).val()+"]']").val();
						   $(this).attr("checked",true);
						   $(this).closest("div").addClass("ez-checkbox-on");
							 	if(ship_possible_flag == "N") {
									$("#cart_goods_" + $(this).val()).css('outline','2px solid #F15F5F');
								} else {
									$("#cart_goods_" + $(this).val()).css('outline','2px solid #769dff');
								}
					   });
					   cnt = $("form#cart_form input[name='cart_option_seq[]']").length;
				   }else{
					   $("form#cart_form input[name='cart_option_seq[]']").each(function(){
						   $(this).removeAttr("checked");
						   $(this).closest("div").removeClass("ez-checkbox-on");
					   });

					   $(".cart_goods").css('outline','');
				   }
			   });
			   $("form#cart_form .btn_select_all").change();

			   $('input[name*="cart_option_seq[]"]').live('click',function(){
				   checkBoxCheck();
				   setPriceInfoCheck();
			   });
		   } else{ // 전용스킨-pc
			   $('.chk_select_all').attr('checked',true);
			   var chkSt = $('.chk_select_all').is(":checked");
			   checked_all_order(chkSt);
			   //setPriceInfo();

			   $('input[name*="cart_option_seq[]"]').live('click',function(){
				   checkBoxCheck();
				   setPriceInfoCheck();
			   });
		   }
	   }
	   //18-05-03 gcns jhs add 장바구니 개선

   });

   $(window).load(function() {
	   /* 스타일적용 */
	   chk_small_goods_image();
   });

   String.prototype.replaceAll = function (str1,str2){
	   var str	= this;
	   var result   = str.replace(eval("/"+str1+"/gi"),str2);
	   return result;
   }

   //통계서버로 통계데이터 전달 사용안함
   function statistics_firstmall(act,goods_seq,order_seq,review_point)
   {
	   return;
	   /*
	   var url = '/_firstmallplus/statistics';
	   var allFormValues = "act="+act+"&goods_seq="+goods_seq;
	   if( order_seq ) allFormValues += "&order_seq="+order_seq;
	   if( review_point ) allFormValues += "&review_point="+review_point;

	   if(act == 'order' && !order_seq) return false;
	   if(act == 'review' && !review_point) return false;
	   if(!goods_seq) return false;
	   $.ajax({
		   cache:false,
		   timeout:1000,
		   type:"POST",
		   url:url,
		   data:allFormValues,
		   error:function(){},
		   success:function(response){}
	   });
	   return true;
	   */
   }

   // 사은품 지급 조건 상세 2015-05-14 pjm
   $(".gift_log").bind('click', function(){
	   $.ajax({
		   type: "post",
		   url: "./gift_use_log",
		   data: "order_seq="+$(this).attr('order_seq')+"&item_seq="+$(this).attr('item_seq'),
		   success: function(result){
			   if	(result){
				   $("#gift_use_lay").html(result);
				   //사은품 이벤트 정보
				   openDialog(getAlert('mo023'), "gift_use_lay", {"width":"450","height":"250"});
			   }
		   }
	   });
   });


   //문자열 바이트 체크(utf-8도 가능)
   String.prototype.byteLength = function(mode){
	   mode	= (!mode) ? 'euc-kr' : mode;
	   text	= this;
	   byte	= 0;
	   switch(mode){
		   case	'utf-8' :
			   for(byte=i=0;char=text.charCodeAt(i++);byte+=char>>11?3:char>>7?2:1);
			   break;

		   default :
			   for(byte=i=0;char=text.charCodeAt(i++);byte+=char>>7?2:1);

	   }
	   return byte
   };


   /*
	* form RSA 암호화 프로세스
	*  - form 내에 file이 있을 경우 기존 프로세스에서도 file 데이터 전송은 동작하지 않았음.
	* 확인된 submit 예외 사항
	* - front script 레벨에서 form을 생성한 후 body에 추가하지 않고 submit
	*  -> 이 경우는 https://www.w3.org/TR/html5/forms.html#constraints 4.10.22.3 를 위반하여 일부 브라우저에서 submit이 발생하지 않음.
	* - ajax나 iframe을 통해 새로운 페이지를 생성한 후 document.sslForm.submit() 를 통해 submit
	*  -> DOM 객체로 submit 호출과 동일
	* - 스크립트 호출과 바인딩이 이루어지기 전 $(document).ready() 와 동시에 submit
	*/
   // RSA 전역 변수 선언
   var getPublicKeyUrl = ["/ssl/getRSAPublicKey","/RSA/ssl/getRSAPublicKey"];
   var handshakeUrl = ["/ssl/getRSAHandShake","/RSA/ssl/getRSAHandShake"];
   var arrCheckActions = ["/ssl/relayRsa?action=", "/RSA/ssl/setRSAReturnPost/"];
   var jcryptionReloadDelayTime = 500;	// 0.5 초 후 다시 리로드, 지연 발생 시 1초씩 증가
   var sGlSessionKey	= '';
   var sGlAction		= '';

   // 동적 스크립트 호출
   $.loadScript = function (url, callback) {$.ajax({url: url,dataType: 'script',success: callback,async: true});}
   $(window).load(function(){
	   // order_price_calculate 주문서 계산 함수에서 ssl 통신을 이용하고 있지 않고 현재 페이지가 주문서 작성 페이지라면 ssl_url로 치환
	   if( window.location.pathname.indexOf('/order/settle') > -1
			   && order_price_calculate.toString().indexOf("/common/ssl_action")==-1){
		   order_price_calculate = function () {
			   var f = $("form#orderFrm");
			   action = "/order/calculate?mode="+gl_mode;
			   // ssl 적용
			   $.ajax({
				   async: false,
				   'url'		: '/common/ssl_action',
				   'data'		: {'action':action},
				   'type'		: 'get',
				   'dataType'	: 'html',
				   'success'	: function(res) {
					   action = res;
				   }
			   });
			   f.attr("action",action);
			   f.attr("target","actionFrame");
			   // jCryption 재적용 스킨의 orderFrm 에 ssl 링크가 없기에 js 영역에서 재선언
			   moduleJcryption.resetJcryptionSubmit(f[0]);
			   f.submit();
		   };
	   }

	   // jquery 버전이 1.7 이하 일경우 관리자에서 사용중이므로 https 강화를 제외한다.
	   if($().jquery >= "1.7"){
		   $.loadScript("/app/javascript/plugin/jcryption/jquery.jcryption.3.1.0_custom.js", function(){
			   initJcryption();
		   });
	   }
	   // ajax 호출 후 새로 생성된 form에도 적용
	   $(document).ajaxComplete(function() {
		   // 모든 폼 엘리먼트에 이벤트를 바인딩 한다
		   $("body form").each(function (){
			   var domEl = this;
			   moduleJcryption.convertJcryptionSubmit(domEl);
		   });
	   });
   });
   // 암호화 적용 기능 모듈화
   var moduleJcryption = {
	   // 폼에서 프로토콜을 포함한 host name을 얻는다.
	   getHostNameFromForm : function (formObj) {
		   var formActionUrl = formObj.attr("action");
		   return moduleJcryption.getHostNameFromUrl(formActionUrl);
	   }
	   , getHostNameFromUrl : function (url){
		   var arr = url.split("/");
		   var result = arr[0]+"//"+arr[2];
		   return result;
	   }
	   // SSL 적용 폼인지 여부 확인
	   , checkSSLForm : function (formObj){
		   var formActionUrl = formObj.attr("action");
		   if(formActionUrl){
			   for(var i in arrCheckActions){
				   if(formActionUrl.indexOf(arrCheckActions[i])>-1){
					   return i;
				   }
			   }
		   }
		   return -1;
	   }
	   // 이벤트가 바인드 된 폼인지 확인
	   , checkBindEventForm : function (formObj){
		   var data = (formObj.data("jCryptionInit") === true);
		   if(data){
			   return true;
		   }
		   return false;
	   }
	   // 이벤트가 치환된 된 폼인지 확인
	   , checkBindEventJcryptionForm : function (formObj){
		   var data = (formObj.data("jCryptionAlready") === true);
		   if(data){
			   return true;
		   }
		   return false;
	   }
	   // 속성을 확인한다
	   , getAttributes : function ( $node ) {
		   var attrs = {};
		   $.each( $node[0].attributes, function ( index, attribute ) {
			   attrs[attribute.name] = attribute.value;
		   } );

		   return attrs;
	   }
	   , destroyJcryptionSubmit : function(domEl){
		   $(domEl).data("jCryptionInit",false);
		   $(domEl).data("jCryptionAlready",false);
		   $(domEl).off("submit");
	   }
	   , resetJcryptionSubmit : function(domEl){
		   moduleJcryption.destroyJcryptionSubmit(domEl);
		   moduleJcryption.convertJcryptionSubmit(domEl);
	   }
	   , convertJcryptionSubmit : function(domEl){
		   // 이미 치환된 폼은 중복 치환하지 않음.
		   if(moduleJcryption.checkBindEventJcryptionForm($(domEl))){
			   // console.log("already submit convert ", $(domEl));
		   }else{
			   // console.log("submit convert event binding!", $(domEl));
			   $(domEl).data("jCryptionAlready",true);
			   // URL 이 SSL 적용 폼인지 확인
			   // console.log($(domEl),$(domEl).attr("action"),moduleJcryption.checkSSLForm($(domEl)));
			   if(moduleJcryption.checkSSLForm($(domEl))>-1){
				   // 기본 dom 객체를 우선 치환한 후 jquery 객체 submit 이벤트 바인딩.
				   // jquery객체 서브밋이 발생한다면 preventDefault 로 인해 dom객체의 서브밋은 발생하지 않음.
				   domEl.submit = function (event){
					   // console.log("DOM el submit");
					   moduleJcryption.convertSubmit(domEl);
				   };
				   // validate 플러그인이 적용되어 있을 시 별도의 submithandle를 이용하므로 jquery 객체 바인딩 제외
				   if(typeof $(domEl).data("validator") !== "undefined"){
				   }else{
					   $(domEl).on("submit", function(event){
						   // console.log("jquery el submit");
						   event.preventDefault();
						   moduleJcryption.convertSubmit(domEl);
					   });
				   }
			   }
		   }
	   }
	   // 세션키 유지를 위한 action url 추가
	   , convertActionUrl : function ($formEl){
		   // console.log("convertActionUrl!", $formEl);
		   var action			= $formEl.attr("action");
		   var sessionKey		= $.jCryption.getAESSessionKey($formEl);
		   var actionDomain	= moduleJcryption.getHostNameFromForm($formEl);
		   var domain			= window.location.hostname;
		   if( domain.indexOf("m.") == 0 ){
			   domain			= domain.replace("m.","");
		   }
		   if( actionDomain.indexOf(domain) == -1 && moduleJcryption.checkSSLForm($formEl) > -1 && action.indexOf(sessionKey) == -1 ){
			   action			= action + "/" + sessionKey;
		   }

		   // firstmall ssl 사용시
		   var thisRegex = new RegExp('gabiafreemall');
		   if(	thisRegex.test(action) ){
			   var aPath		= action.split("/");
			   sGlAction		= aPath[6].replace("-", "+");
			   sGlAction		= sGlAction.replace("_", "/");
			   sGlAction		= window.atob(sGlAction);
			   action			= sGlAction;
		   }else{
			   sGlAction		= '';
		   }
		   $formEl.attr("action", action);
	   }
	   // 암호화 서브밋 처리
	   , convertSubmit : function(thisDom){
		   var $formEl = $(thisDom);
		   // submit 전용 폼인지 체크
		   if(moduleJcryption.checkBindEventForm($formEl)){
			   // console.log("already!", $formEl);
			   moduleJcryption.convertActionUrl($formEl);
			   return true;
		   }else{
			   // SSL 적용폼인지 체크
			   if(moduleJcryption.checkSSLForm($formEl)>-1){
				   // 스크립트가 로드되었는지 체크
				   if(typeof $.jCryption === "function"){
					   // rsa 폼 삭제
					   $(".rsaForm").remove();

					   // 암호화 적용
					   var AESEncryptionKey = $.jCryption.getAESEncryptionKey($formEl);
					   // console.log(AESEncryptionKey);
					   var hostName = moduleJcryption.getHostNameFromForm($formEl);

					   var $submitElement = $formEl.find(":input:submit");
					   var $encryptedElement = $("<input />",{
						 type:'hidden',
						 name:'jCryption'
					   });

					   // 암호화 submit 전용 form
					   var $submitRSAForm = $("<form class='rsaForm'/>");
					   var formAttrs = moduleJcryption.getAttributes($formEl);
					   for (var i in formAttrs){
						   if(i!="id" && i!="name"){
							   $submitRSAForm.attr(i,formAttrs[i]);
						   }
					   }
					   var remakeHandshakeUrl = handshakeUrl[moduleJcryption.checkSSLForm($formEl)];
					   if(moduleJcryption.checkSSLForm($formEl)!=0){
						   remakeHandshakeUrl = remakeHandshakeUrl+"/"+$.jCryption.getAESSessionKey($submitRSAForm);
					   }

					   $.jCryption.authenticate(
						   AESEncryptionKey,
						   hostName+getPublicKeyUrl[moduleJcryption.checkSSLForm($formEl)],
						   hostName+remakeHandshakeUrl,
						   function(AESEncryptionKey) {
							   var toEncrypt = $formEl.serialize();
							   // console.log(toEncrypt);
							   // console.log($formEl);
							   if ($submitElement.is(":submit")) {
								   toEncrypt = toEncrypt + "&" + $submitElement.attr("name") + "=" + $submitElement.val();
							   }
							   $encryptedElement.val($.jCryption.encrypt(toEncrypt, AESEncryptionKey));
							   // console.log($submitRSAForm.html());
							   $submitRSAForm.append($encryptedElement);
							   $("body").append($submitRSAForm);
							   $submitRSAForm.data("jCryptionInit",true);
							   moduleJcryption.convertActionUrl($submitRSAForm);
							   if(sGlAction){
								   var $encryptionKeyElement = $("<input />",{
									   type:'hidden',
									   name:'encryptionKey',
									   value:AESEncryptionKey
								   });
								   $submitRSAForm.append($encryptionKeyElement);
							   }
							   $submitRSAForm.submit();
						   },
						   function() {
							   // Authentication with AES Failed ... sending form without protection
							   confirm("Authentication with Server failed, are you sure you want to submit this form unencrypted?", function() {
								   $formEl.submit();
							   });
						   }
					   );
				   }else{
					   var delayTime = jcryptionReloadDelayTime;
					   console.log("필수 스크립트가 로드되지 않았습니다. "+(delayTime/1000)+"초 후 다시 시도합니다.");
					   setTimeout(function(){
						   console.log($formEl,"리로드"+delayTime);
						   moduleJcryption.resetJcryptionSubmit(thisDom);
						   $formEl.submit();
					   }, delayTime);
					   jcryptionReloadDelayTime += 1000;	// 1초씩 증가
					   // $formEl.submit();
				   }
				   return false;
			   }else{
				   return true;
			   }
		   }
	   }
   };

   // 암호화 적용
   var initJcryption = function(){
	   // 모든 폼 엘리먼트에 이벤트를 바인딩 한다
	   $("body form").each(function (){
		   var domEl = this;
		   moduleJcryption.convertJcryptionSubmit(domEl);
	   });

	   // 아이디 체크의 경우 SSL 통신이 없었으므로 강제로 적용
	   function setupJoinMemberPageCheckId(){
		   var url = location.href;
		   var tmp_url = url.split("?");
		   var domain = moduleJcryption.getHostNameFromUrl(tmp_url[0]);
		   var sub_url = tmp_url[0].replace(domain,"");

		   // 회원가입페이지 일 경우
		   if(sub_url=="/member/register"){

			   // 현재 회원가입 폼의 action 을 통해 유료/무료 SSL을 확인한다.
			   var registFrmAction = $("#registFrm").attr("action");
			   var registFrmHost = moduleJcryption.getHostNameFromUrl(registFrmAction);
			   if(registFrmHost.indexOf("http")>-1){
				   var sslSubUrlIndex = 0;
				   if(registFrmHost == "https://ssl.gabiafreemall.com"){
					   sslSubUrlIndex = 1;
				   }
				   var idCheckFormUrl = registFrmHost+arrCheckActions[sslSubUrlIndex];

				   var idCheckCallbackUrl = domain+"/member/"+"../member_process/id_chk";
				   var encodeIdCheckCallbackUrl = Base64.encode(idCheckCallbackUrl);
				   encodeIdCheckCallbackUrl = encodeIdCheckCallbackUrl.replace(/[\+]/g,"-");
				   encodeIdCheckCallbackUrl = encodeIdCheckCallbackUrl.replace(/[\/]/g,"_");
				   var idCheckFormAction = idCheckFormUrl+encodeIdCheckCallbackUrl;

				   $("input[name='userid']").unbind("blur");
				   $("input[name='userid']").blur(function() {

					   if($(this).val()){
						   // rsa 폼 삭제
						   $("#idchkform").remove();
						   $(".rsaForm").remove();
						   $formEl = $("<form id='idchkform' method='post' target='actionFrame' action='"+idCheckFormAction+"'/>");
						   var idval = $("<input type='hidden' name='userid' value='"+$(this).val()+"'>");
						   $formEl.append(idval);
						   $("body").append($formEl);

						   // 암호화 적용
						   var AESEncryptionKey = $.jCryption.getAESEncryptionKey($formEl);
						   // console.log(AESEncryptionKey);
						   var hostName = moduleJcryption.getHostNameFromForm($formEl);

						   var $submitElement = $formEl.find(":input:submit");
						   var $encryptedElement = $("<input />",{
							 type:'hidden',
							 name:'jCryption'
						   });

						   // 암호화 submit 전용 form
						   var $submitRSAForm = $("<form class='rsaForm'/>");
						   var formAttrs = moduleJcryption.getAttributes($formEl);
						   for (var i in formAttrs){
							   if(i!="id" && i!="name"){
								   $submitRSAForm.attr(i,formAttrs[i]);
							   }
						   }
						   var remakeHandshakeUrl = handshakeUrl[moduleJcryption.checkSSLForm($formEl)];
						   if(moduleJcryption.checkSSLForm($formEl)!=0){
							   remakeHandshakeUrl = remakeHandshakeUrl+"/"+$.jCryption.getAESSessionKey($submitRSAForm);
						   }

						   $.jCryption.authenticate(
							   AESEncryptionKey,
							   hostName+getPublicKeyUrl[moduleJcryption.checkSSLForm($formEl)],
							   hostName+remakeHandshakeUrl,
							   function(AESEncryptionKey) {
								   var toEncrypt = $formEl.serialize();
								   // console.log(toEncrypt);
								   // console.log($formEl);
								   if ($submitElement.is(":submit")) {
									   toEncrypt = toEncrypt + "&" + $submitElement.attr("name") + "=" + $submitElement.val();
								   }
								   $encryptedElement.val($.jCryption.encrypt(toEncrypt, AESEncryptionKey));
								   // console.log($submitRSAForm);
								   $submitRSAForm.append($encryptedElement);
								   $("body").append($submitRSAForm);
								   $submitRSAForm.data("jCryptionInit",true);
								   moduleJcryption.convertActionUrl($submitRSAForm);
								   $submitRSAForm.submit();
							   },
							   function() {
								   // Authentication with AES Failed ... sending form without protection
								   confirm("Authentication with Server failed, are you sure you want to submit this form unencrypted?", function() {
									   $formEl.submit();
								   });
							   }
						   );

					   }
				   });
			   }
		   }
	   }
	   setupJoinMemberPageCheckId();
   }

	 function callbackIdChk(json){
		 var response = $.parseJSON(json);
		 var text = response.return_result;
		 var userid = response.userid;
		 $("#id_info").html(text);
		 $("input[name='userid']").val(userid);
	 }

   // 크로스도메인 용 iframe 리사이징
   $(document).ready(function(){
	   // console.log($("iframe").height());
	   var message_frame_resize = function (event) {
		   if (event.origin !== "https://"+window.location.hostname) {
			   return;
		   }
		   var iframe = document.getElementById(event.data.id);
		   if (iframe) {
			   iframe.style.height = event.data.height + "px";
		   }
	   };
	   if (window.addEventListener) {
		   window.addEventListener("message", message_frame_resize, false);
	   } else if (window.attachEvent) {
		   window.attachEvent("onmessage", message_frame_resize);
	   }
   });

	 // 비밀번호 규칙 체크
	 function init_check_password_validation(obj){
	 	obj.off("focusout");
	 	obj.on("focusout", function(){
	 		call_check_password_validation($(this));
	 	});
	 }
	 
	 function init_check_password_validation_data(data, password){
	 	
	 	var jsonObj = [];
	 	
	 	jsonObj.push({
	 		name: 'password',
	 		value: password
	 	});
	 
	 	for(i=0;i<data.length; i++){
	 
	 		var formEl = data[i].name;
	 
	 		if(formEl.match(/^(mtype)/)){
	 			jsonObj.push({
	 				name: 'mtype',
	 				value: data[i].value
	 			});
	 		}else if(formEl.match(/^(member_|info_|provider_|manager_)*(seq)/)){
	 			jsonObj.push({
	 				name: 'seq',
	 				value: data[i].value
	 			});
	 		}
	 		else if(formEl.match(/^(?!.*cell).*(phone)/) && formEl != 'mphone' && formEl != 'info_phone'){	// 관리자&입점사 제외
	 			if(formEl.match(/\W/)){
	 				jsonObj.push({
	 					name: 'phone[]',
	 					value: data[i].value
	 				});
	 			}else {
	 				jsonObj.push({
	 					name: 'phone',
	 					value: data[i].value
	 				});
	 			}
	 		}else if(formEl.match(/^\w*(cellphone)/) && formEl != 'mcellphone'){	// 관리자&입점사 제외
	 			if(formEl.match(/\W/)){
	 				jsonObj.push({
	 					name: 'cellphone[]',
	 					value: data[i].value
	 				});
	 			}else {
	 				jsonObj.push({
	 					name: 'cellphone',
	 					value: data[i].value
	 				});
	 			}
	 		}else if(formEl.match(/^\w*(birthday)/)){
	 			jsonObj.push({
	 				name: 'birthday',
	 				value: data[i].value
	 			});
	 		}
	 	}
	 
	 	return jsonObj;
	 }
	 
	 function call_check_password_validation(obj){
	 	var action = "/common/check_password_validation";
	 	
	 	var password = obj.val();
		var form = obj.closest("form");
		if (form.length == 0) {
			form = $("form[name=registFrm]");
		}
		// 실명인증이나 기타 사유에 의해 데이터가 disabled 되어있을 경우
		// 정상적으로 데이터를 serialize 하지 못 하므로 disabled 속성을 임시 제거
		form.find(":disabled").each(function () {
			$(this).attr("disabled", false);
			// 제거 후 다시 원복을 위해 임의 데이터 지정
			$(this).attr("data-passcheck-disabled", '1');
		});
		// 폼 데이터 저장
		var data = form.serializeArray();
		// 다시 disabled 처리
		form.find("[data-passcheck-disabled]").each(function () {
			$(this).attr("disabled", true);
			$(this).removeAttr("data-passcheck-disabled");
		});
	 	jsonObj = init_check_password_validation_data(data, password);
	 	if(typeof password !== 'undefined' && password != ''){
	 		$.ajax({
	 			type: "post",
	 			async: false,
	 			url: action,
	 			data: jsonObj,
	 			success: function(result){
	 				try{
	 					result = JSON.parse(result);
	 					draw_check_password_validation(obj, result.alert_code);
	 				}catch(e){
	 					init_draw_check_password_validation(obj);
	 					obj.parent().find(".password_alert_msg").html(result);
	 				}
	 			}
	 		});
	 	}
	 }
	 function draw_check_password_validation(obj, alert_code){
	 	init_draw_check_password_validation(obj);
	 	var msg = '';
	 	if(alert_code != ''){
	 		msg = getAlert(alert_code);
	 	}
	 	if(msg){
	 		obj.parent().find(".password_alert_msg").html(msg);
	 	}else{
	 		obj.parent().find(".password_alert_msg").remove();
	 	}
	 }
	 function init_draw_check_password_validation(obj){
	 	if(obj.parent().find(".password_alert_msg").length == 0){
	 		var password_alert_msg = $('<div class="password_alert_msg" style="color:red;"></div>');
	 		obj.parent().append(password_alert_msg);
	 	}
	 }

	$(window).load(function() {
		$(".class_check_password_validation").each(function(){
			init_check_password_validation($(this));
		});
	});

	 // 꽃청 추가 START 홍우기 2020.10.14
	 // 통합주문리스트, 출고리스트 - 협회,발주금액,메모,담당자

	 //값이 변경됐는지 확인하기 위해, 초기값 저장하는 배열
	 var itrnet_arr = new Array();
	 var oprice_arr = new Array();
	 var cmemo_arr = new Array();
	 var manager_arr = new Array();

	 // focus event - 현재값(초기값) 저장
	 function arr_difin(id, no){
	 	if(id == 'itrnet'){
	 		if( !itrnet_arr['no_'+no] && itrnet_arr['no_'+no] != '' ){ // 현재 값 저장 안돼있으면
	 			itrnet_arr['no_'+no] = $('#'+id+'_'+no).val(); // 현재 값 저장
	 		}
	 	}else if(id == 'oprice'){
	 		if( !oprice_arr['no_'+no] && oprice_arr['no_'+no] != '' ){ // 현재 값 저장 안돼있으면
	 			oprice_arr['no_'+no] = $('#'+id+'_'+no).val(); // 현재 값 저장
	 		}
	 	}else if(id == 'cmemo'){
	 		if( !cmemo_arr['no_'+no] && cmemo_arr['no_'+no] != '' ){ // 현재 값 저장 안돼있으면
	 			cmemo_arr['no_'+no] = $('#'+id+'_'+no).val(); // 현재 값 저장
	 		}
	 	}else if(id == 'manager'){
	 		if( !manager_arr['no_'+no] && manager_arr['no_'+no] != '' ){ // 현재 값 저장 안돼있으면
	 			manager_arr['no_'+no] = $('#'+id+'_'+no).val(); // 현재 값 저장
	 		}
		}
	 }

	 // keyup event - 엔터 누르면 저장, 입력값 변경시 하이라이트
	 function keyboard_write(id, no, event){
	 	/* 나중에 쓸지 몰라서 일단 주석처리
	 	if(event.keyCode == '38'){ // ↑ 누를 경우
	 		$('#cmemo_'+no)[0].setSelectionRange($('#cmemo_'+no).val().length, $('#cmemo_'+no).val().length);
	 	}*/
	 	if(event.keyCode == '13'){ // 엔터 누를 경우
	 		contents_save(no);
	 	}else{
	 		is_contents_change(id, no);
	 	}
	 }

	 // 초기값과 비교해서 입력값이 변경되면 하이라이트
	 function is_contents_change(id, no){
	 	switch(id){
	 		case "itrnet" : var temp_var = itrnet_arr['no_'+no]; break;
	 		case "oprice" : var temp_var = oprice_arr['no_'+no]; $('#'+id+'_'+no).val( $('#'+id+'_'+no).val().replace(/[^0-9]/g,'').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") ); break;
	 		case "cmemo" : var temp_var = cmemo_arr['no_'+no]; break;
			case "manager" : var temp_var = manager_arr['no_'+no]; break;
	 	}

	   //인트라넷 추가 제거
	   if(id == 'itrnet' && ( $('#'+id+'_'+no).val() == '추가' || $('#'+id+'_'+no).val() == '삭제' ) ){
	     if($('#'+id+'_'+no).val() == '추가' && confirm('추가하시겠습니까?')){
	       //첫번째 cmemo 복사
	       $('#'+id+'_'+no).parent().clone().appendTo( $('#'+id+'_'+no).parent().parent() );
	       //복사된 cmemo 상단 3px 띄우기
	       $('#'+id+'_'+no).parent().parent().children().eq(-1).css("margin","3px 0 0 0");
	       //복사된 cmemo 내부 no변경
	       var last_no = no.split("_");
	       last_no = last_no[0].toString()+'_'+ ($('#'+id+'_'+no).parent().parent().children().length - 1);
	       var new_text = $('#'+id+'_'+no).parent().parent().children().eq(-1).html().replaceAll(no,last_no).replaceAll("추가","삭제");
	       $('#'+id+'_'+no).parent().parent().children().eq(-1).html( new_text );
	       //복사된 cmemo 값 초기화
	       $("#itrnet_"+last_no).val('');
	       $("#oprice_"+last_no).val('');
	       $("#cmemo_"+last_no).val('');
				 $("#manager_"+last_no).attr('disabled','disabled');
	       //DB에서 추가
	       $.ajax({
	     		type: "post",
	     		async : false,
	     		url: "../order_process/cmemo_ajax",
	     		data: { 'type':'add_list', 'order_seq' : $('#cmemo_'+no).attr('data-seq'), 'last_no' : last_no.split('_')[1] },
	     		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
	     		success: function(result){ }
	     	});
	     }else if($('#'+id+'_'+no).val() == '삭제' && confirm('삭제하시겠습니까?') ){
	       //HTML 삭제
	       var order_seq = $('#cmemo_'+no).attr('data-seq');
	       var last_no = no.split("_");
	       last_no = last_no[0].toString()+'_'+ ($('#'+id+'_'+no).parent().parent().children().length - 1);
	       if(no == last_no){
	         $('#'+id+'_'+no).parent().remove();
	       }else{
	         alert('가장 아래에 있는 메모만 지울 수 있습니다.');
	         return;
	       }
	       //DB에서 삭제
	       $.ajax({
		     		type: "post",
		     		async : false,
		     		url: "../order_process/cmemo_ajax",
		     		data: { 'type':'del_list', 'order_seq' : order_seq },
		     		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		     		success: function(result){ }
	     		});
	     }
	     $('#'+id+'_'+no).val(temp_var);
	     is_contents_change(id, no);
	     return;
	   }

	 	if( temp_var != $('#'+id+'_'+no).val() ){ // 현재 변수 저장값, input 값 비교
	 		$('#'+id+'_'+no).addClass('changed');
	 		$('#contents_save_'+no).addClass('changed');
			if($('#'+id+'_'+no).val() == '멘코넷'){
				$.ajax({
					type: "post",
					async : false,
					url: "../order_process/cmemo_ajax",
					data: { 'type':'make_url', 'order_seq' : $('#cmemo_'+no).attr('data-seq') },
					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
					success: function(result){
						if( window.location.pathname == '/admin/order/view' || window.location.pathname == '/admin/order/custom_order' ){
							//var asdf = window.open("http://t2.menconet.com", "_blank", "height=500,width=600");
								result = result.replace(/\n/g, "");//행바꿈제거
								result = result.replace(/\r/g, "");//엔터제거
							window.open("https://menconet.com/admin/order/admin_input_order.php?lm=1"+result, "send_menconet");
						}
					}
				});
			}
	 	}else{
	 		$('#'+id+'_'+no).removeClass('changed');
	 		if( $('#'+id+'_'+no).parent().find('.changed').length == 1 ){
	 			$('#contents_save_'+no).removeClass('changed');
	 		}
	 	}
	 }

	 // 입력값 저장 후, 현재값으로 초기값 저장
	 function contents_save(no){
	  var order_seq_no = no.split("_");
		var temp_oprice_value = { 'type':'mod_list', 'order_seq' : $('#cmemo_'+no).attr('data-seq'), 'order_seq_no' : order_seq_no[1], 'itrnet_value' : $('#itrnet_'+no).val(), 'cmemo_value' : $('#cmemo_'+no).val(), 'manager' : $('#manager_'+no).val() };
 		if( $('#oprice_'+no).hasClass('changed') ){
 			temp_oprice_value.oprice_value = $('#oprice_'+no).val();
 		}

	 	$.ajax({
	 		type: "post",
	 		async : false,
	 		url: "../order_process/cmemo_ajax",
	 		data: temp_oprice_value,
	 		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
	 		success: function(result){
				// 사용자가 발주금 변경 안했는데, 표시된 발주금이 저장된 발주금과 다른 경우
				if( !$('#oprice_'+no).hasClass('changed') && $('#oprice_'+no).val() != $.trim(result) ){
					// 저장된 발주금을 표시하기
					$('#oprice_'+no).val( $.trim(result) );
				}
			}
	 	});

	 	itrnet_arr['no_'+no] = $('#itrnet_'+no).val();
	 	oprice_arr['no_'+no] = $('#oprice_'+no).val();
	 	cmemo_arr['no_'+no] = $('#cmemo_'+no).val();
		manager_arr['no_'+no] = $('#manager_'+no).val();
	 	is_contents_change('itrnet',no);
	 	is_contents_change('oprice',no);
	 	is_contents_change('cmemo',no);
		is_contents_change('manager',no);

	   //발주협회, 발주금액 둘다 입력돼있으면 배경 흰색으로
	   if( $('#itrnet_'+no).val() != '' && $('#oprice_'+no).val() != '' ){
	     $('#itrnet_'+no).parent().removeClass('unsetting');
	   }else{
	     $('#itrnet_'+no).parent().addClass('unsetting');
	   }
	 }

	 // keydown event - 키보드로 위나 아래로 이동 가능
	 function keyboard_focus(id, no){
	   no = no.split("_");
	 	if(event.keyCode == '38'){ // 위 버튼
	 		$('#'+id+'_'+(parseInt(no[0]) + 1 )+'_'+no[1]).focus();
	 	}else if(event.keyCode == '40'){ // 아래 버튼
	 		$('#'+id+'_'+(parseInt(no[0]) - 1 )+'_'+no[1]).focus();
	 	}
	 }

	 //통합주문리스트, 출고리스트 - 협회이름 설정 저장
	 function custom_config(intranet_list){
	   var temp_value;
	   if( temp_value = prompt('사용시 주의사항\n①협회이름 5글자 내로\n②협회 구분은 \',\'(콤마)로', intranet_list) ){
	     $.ajax({
	       type: "post",
	       async : false,
	       url: "../order_process/intranet_config",
	       data: { 'intranet_list' : temp_value },
	       contentType: "application/x-www-form-urlencoded; charset=UTF-8",
	       success: function(result){ location.reload(); }
	     });
	   }
	 }

	 // 다음 주소 검색 API
	 // 우편번호 찾기 화면을 넣을 element
	 function closeDaumPostcode() {
	 // iframe을 넣은 element를 안보이게 한다.
	 var element_layer = document.getElementById('daum_layer');
	 element_layer.style.display = 'none';

	 // 꽃청 수정 START 윤상희 2022.12.08 - 배송지 수정
	 $('.resp_layer_bg').remove();
	 $('body').css('overflow', 'auto');
	 // 꽃청 수정 END
	 }

	 function DaumPostcode() {
	   // 꽃청 수정 START 윤상희 2022.12.08 - 배송지 수정
	   if ( $('.resp_layer_bg').length < 1 ) {
		$('body').append('<div class="resp_layer_bg"></div>');
		$('body').css('overflow', 'hidden');
	   }

	   var element_layer = document.getElementById('daum_layer');
	   element_layer.style.zIndex = 10006;
	   new daum.Postcode({
	     oncomplete: function(data) {
	       // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

	       // 각 주소의 노출 규칙에 따라 주소를 조합한다.
	       // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
	       var fullAddr = data.address; // 최종 주소 변수
	       var extraAddr = ''; // 조합형 주소 변수

	       // 기본 주소가 도로명 타입일때 조합한다.
	       if(data.addressType === 'R'){
	         //법정동명이 있을 경우 추가한다.
	         if(data.bname !== ''){
	           extraAddr += data.bname;
	         }
	         // 건물명이 있을 경우 추가한다.
	         if(data.buildingName !== ''){
	           extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
	         }
	         // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
	         fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
	       }

	       // 우편번호와 주소 정보를 해당 필드에 넣는다.
	       //document.getElementById('post').value = data.zonecode; //5자리 새우편번호 사용
	       $("input[name=recipient_input_new_zipcode]").val(data.zonecode); //주문페이지 우편번호
	       //document.getElementById('addr1').value = fullAddr;
	       if(fullAddr == ''){ fullAddr=data.jibunAddress; }
	       if(data.jibunAddress == ''){ data.jibunAddress=fullAddr; }
	       $("input[name=recipient_input_address_street]").val(fullAddr); //주문페이지 도로명주소
	       $("input[name=recipient_input_address]").val(data.jibunAddress); //주문페이지 지번주소

	       $("input[name=new_zipcode]").val(data.zonecode); //회원가입페이지 우편번호
	       $("input[name=address_street]").val(fullAddr); //회원가입페이지 도로명주소
	       $("input[name=address]").val(data.jibunAddress); //회원가입페이지 지번주소

	       $("input[name=recipient_zipcode]").val(data.zonecode); //회원가입페이지 우편번호
	       $("input[name=recipient_address_street]").val(fullAddr); //회원가입페이지 도로명주소
	       $("input[name=recipient_address]").val(data.jibunAddress); //회원가입페이지 지번주소

		   $("input[name=recipient_new_zipcode]").val(data.zonecode); //주문/배송 상세 우편번호

		   $('.resp_layer_bg').remove();
		   $('body').css('overflow', 'auto');
		   if($("#edit_address_wrap").length > 0) showCenterLayer('#edit_address_wrap');
	       // 커서를 상세주소 필드로 이동한다.\
	       //document.getElementById('addr2').focus();

		   // 꽃청 추가 START 윤상희 2024.02.01 - 배송지 선택 시 결제페이지 재계산
		   try{order_price_calculate();}catch(e){};
		   // 꽃청 추가 END

	       // iframe을 넣은 element를 안보이게 한다.
	       // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
	       element_layer.style.display = 'none';
	     },
	     width : '100%',
	     height : '100%',
	     maxSuggestItems : 5
	   }).embed(element_layer);
	   // 꽃청 수정 END

	   // iframe을 넣은 element를 보이게 한다.
	   element_layer.style.display = 'block';

	   // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
	   initLayerPosition();
	 }

	 // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
	 // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
	 // 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
	 function initLayerPosition(){
	   var element_layer = document.getElementById('daum_layer');
	   //var width = 400; //우편번호서비스가 들어갈 element의 width
	   //var height = 500; //우편번호서비스가 들어갈 element의 height
	   var width = $("#daum_layer").css("width");
	   width = parseInt(width);
	   var height = $("#daum_layer").css("height");
	   height = parseInt(height);
	   var borderWidth = 2; //샘플에서 사용하는 border의 두께

	   // 위에서 선언한 값들을 실제 element에 넣는다.
	   element_layer.style.width = width + 'px';
	   element_layer.style.height = height + 'px';
	   element_layer.style.border = borderWidth + 'px solid';
	   // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
	   element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
	   element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
	 }

	 // 타임세일
	$(function(){
	  // setInterval이 여러번 실행될 경우 한번만 실행되게
	 	if(typeof(countdown_timer) !== 'undefined')
			clearTimeout(countdown_timer);

	 	let current_sec = 0;
	 	let time_start = 0;
	 	let time_now = 0;
	 	let time_end = 0;
	 	let countdown_text = '';
	 	var countdown_timer = setInterval(function() {

	 		// 서버시간을 아직 못가져온 경우
	 		if(!time_now){
				//로딩시 나올 텍스트
	 			countdown_text = '000000';
	 		}
	 		// 이벤트 시간인 경우
	 		else if(time_now - time_start >= 0 && time_end - time_now >= 0){
	 			// 밀리 세컨드 계산
	 			//let milli_sec = 100 - current_sec%100;
	 			//if(milli_sec == 100) milli_sec = 0;
	 			//milli_sec = (milli_sec < 10)? '0' + milli_sec.toString() : milli_sec;

	 			// 시분초 계산
	 			let min = (time_end - time_now) / 60;
	 			let hour = Math.floor(min / 60);
	 			let sec = (time_end - time_now) % 60;
	 			min = Math.floor(min % 60);

	 			// 시분초 1자리 일때, 앞에 0 붙이기
	 			hour = (hour < 10)? '0' + hour.toString() : hour;
	 			min = (min < 10)? '0' + min.toString() : min;
	 			sec = (sec < 10)? '0' + sec.toString() : sec;

	 			//countdown_text = hour+':'+min+':'+sec+'.'+milli_sec;
				countdown_text = hour+min+sec;

				// 메인 페이지
				// 타임세일 배너 이벤트 시간중으로 변경
				$(".visual09 .m_visual img").attr("src","/data/images/event/timesale/202207/on/m_visual_timesale.jpg");
				$(".visual09").addClass('visual08').removeClass('visual09');
				$("#countdown").removeClass("hidden");

				// 이벤트 페이지
				if(document.location.href.indexOf('timesale_off') !== -1){
					location.href = '/page/event/timesale/202207/timesale_on';
				}

				// 상단 탭에 타임세일 추가
				/*if( !document.getElementById("time_sale_tab") ){
					time_sale_li = '<li class="custom_nav_link" id="time_sale_tab" style="display:none;">';
						time_sale_li += '<a class="categoryDepthLink designElement" designelement="category" href="/promotion/event_view?event=50"><em>타임세일</em></a>';
					time_sale_li += '</li>';
					$(".respCategoryList").prepend(time_sale_li);
					$("#time_sale_tab").fadeIn(2000);
				}*/
	 		}
	 		// 이벤트 시간이 아닌 경우
	 		else{
	 			countdown_text = '000000';

				// 메인 페이지
				// 타임세일 배너 이벤트 시간외로 변경
				$(".visual08 .m_visual img").attr("src","/data/images/event/timesale/202207/off/m_visual_timesale.jpg");
				$(".visual08").addClass('visual09').removeClass('visual08');
				$("#countdown").addClass("hidden");

				// 이벤트 페이지
				if(document.location.href.indexOf('timesale_on') !== -1){
					location.href = '/page/event/timesale/202207/timesale_off';
				}

				// 상단 탭에 타임세일 제거
				/*if( document.getElementById("time_sale_tab") ){
					$("#time_sale_tab").fadeOut(2000);
				}*/
	 		}

	 		// 시간 출력
	 		$("#countdown .cnt_down_1").html( countdown_text.substr(0,1) );
			$("#countdown .cnt_down_2").html( countdown_text.substr(1,1) );
			$("#countdown .cnt_down_3").html( countdown_text.substr(2,1) );
			$("#countdown .cnt_down_4").html( countdown_text.substr(3,1) );
			$("#countdown .cnt_down_5").html( countdown_text.substr(4,1) );
			$("#countdown .cnt_down_6").html( countdown_text.substr(5,1) );

	 		// 1초마다 현재 서버시간 1초씩 증가
	 		if(current_sec++ % 1 == 0 && time_now){
	 			time_now++;
	 		}

	 		// 서버에서 시간 가져왔으면 여기서 끝
	 		if(time_now && time_now % 5 != 0)
	 			return;

	 		$.ajax({
	 			type: "post",
	 			async : false,
	 			url: "/page/event_countdown",
	 			data: { 'name1' : '1', 'name2' : '2' },
	 			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
	 			success: function(result){
	 				result = jQuery.parseJSON(result);
	 				time_start = result['time_start'];
	 				time_end = result['time_end'];
	 				time_now = result['time_now'];
	 			}
	 		});

	 	}, 1000); // 1초마다 반복

		// 카운트다은 없는 곳에선 종료
		if( document.getElementById("countdown") === null)
			clearTimeout(countdown_timer);
	});

	/**
	* 팝업여부,타입,연도,월(모두 필수값 아님)을 받은 뒤 달력생성
	* @param {boolean} is_popup subscribe 넣으면 정기구독 달력
	* @param {string} type subscribe 넣으면 정기구독 달력
	* @param {string} year 연도 YYYY 형식 기본값은 현재 연도
	* @param {string} month 월 MM 형식 기본값은 현재 월
	*/
	function show_custom_calendar(is_popup, type, year, month){

		if(is_popup){
			$('body').css('overflow','hidden');

			// 달력 팝업 없으면 생성
			if($('.custom_calendar_layer').length == 0){
				var temp_text = '<div class="custom_calendar_layer" onclick="hide_custom_calendar();" style="display:flex;">';
				temp_text += '<div class="custom_calendar_modal" onclick="event.stopPropagation();">';
				temp_text += '</div">';
				temp_text += '</div">';
				$('body').append(temp_text);
			}
			// 달력 팝업 있으면 보여주기
			else{
				$('.custom_calendar_layer').css('display','flex');
			}
		}

		// 현재 연도와 월 계산
		var current_year = (year)?year:new Date().getFullYear();
		var current_month = (month)?month:new Date().getMonth() + 1;

		// 다음 달의 연도와 월 계산
		var next_month = new Date(current_year, current_month, 1).getMonth() + 1;
		var next_year = new Date(current_year, current_month, 1).getFullYear();

		// 이전 달의 연도와 월 계산
		var prev_month = new Date(current_year, current_month - 2, 1).getMonth() + 1;
		var prev_year = new Date(current_year, current_month - 2, 1).getFullYear();

		// 이번 달의 첫 날과 마지막 날 계산
		var first_day = new Date(current_year, current_month - 1, 1).getTime();
		var last_day = new Date(current_year, current_month, 0).getTime();

		// 이번 달의 날짜 수 계산
		var num_days = new Date(current_year, current_month, 0).getDate();

		// 이번 달의 첫 날 요일 계산 (0: 일요일, 1: 월요일, ..., 6: 토요일)
		var first_day_of_week = new Date(current_year, current_month - 1, 1).getDay();

		// 이전 달 체크
		var prev_btn = '';
		if(prev_year < new Date().getFullYear() || (prev_year == new Date().getFullYear() && prev_month < new Date().getMonth() + 1)){
			prev_btn = ' unclick';
		}

		// 현재 + 1달
		var next_btn = '';
		var temp_next_date = new Date();
		temp_next_date.setMonth(temp_next_date.getMonth() + 2); // 두 달 뒤 날짜 확인
		if((next_year >= temp_next_date.getFullYear() && next_month > temp_next_date.getMonth())) {
			next_btn = ' unclick';
		}

		// 선택한 날짜 가져오기
		var selected_date = '';
		if(type.indexOf('subscribe') != -1){
			selected_date = $('input[name=export_date]').val();
		}

		// HTML 생성
		var calendarHTML = '';
		calendarHTML += '<div class="custom_calendar_subject">';
		// 정기구독 이전 달로 이동하지 못하게 수정
		if(type.indexOf('subscribe') != -1 && prev_btn != '') {
			calendarHTML += '<span class="left_button'+prev_btn+'">◀</span>';
		}else{
			calendarHTML += '<span class="left_button" onclick="show_custom_calendar('+is_popup+',\'' + type + '\',\'' + prev_year + '\',\'' + prev_month + '\');">◀</span>';
		}
		calendarHTML += current_year + '년 ' + current_month + '월';
		// 정기구독 다음달 + 1로 이동하지 못하게 수정
		if(type.indexOf('subscribe') != -1 && next_btn != '') {
			calendarHTML += '<span class="right_button'+next_btn+'">▶</span>';
		}else{
			calendarHTML += '<span class="right_button" onclick="show_custom_calendar('+is_popup+',\'' + type + '\',\'' + next_year + '\',\'' + next_month + '\');">▶</span>';
		}
		calendarHTML += '</div>';
		calendarHTML += '<table>';
		calendarHTML += '<thead>';
		calendarHTML += '<tr>';
		calendarHTML += '<th class="custom_sunday">일</th>';
		calendarHTML += '<th>월</th>';
		calendarHTML += '<th>화</th>';
		calendarHTML += '<th>수</th>';
		calendarHTML += '<th>목</th>';
		calendarHTML += '<th>금</th>';
		calendarHTML += '<th class="custom_saturday">토</th>';
		calendarHTML += '</tr>';
		calendarHTML += '</thead>';
		calendarHTML += '<tbody>';
		calendarHTML += '<tr>';
		for (var i = 0; i < first_day_of_week; i++) {
			calendarHTML += '<td></td>'; // 공백 셀 출력
		}
		for (var day = 1; day <= num_days; day++) {
			var dateObj = new Date(current_year, current_month - 1, day);
			var date = dateObj.getDate();
			var weekDay = dateObj.getDay();
			var data = current_year+'-'+("0" + current_month).slice(-2)+'-'+("0" + date).slice(-2);
			if (weekDay === 0) {
				calendarHTML += '<tr>'; // 일요일이면 새로운 행 시작
			}
			if (weekDay === 0) {
				calendarHTML += '<td data-date="'+data+'" class="calendar_'+current_month+'_'+date+' custom_sunday">' + date + '</td>'; // 일요일 셀 출력
			} else if (weekDay === 6) {
				calendarHTML += '<td data-date="'+data+'" class="calendar_'+current_month+'_'+date+' custom_saturday">' + date + '</td>'; // 토요일 셀 출력
			} else {
				if(data == selected_date) selected_class = ' custom_selected_date'; else selected_class = '';
				calendarHTML += '<td data-date="'+data+'" class="calendar_'+current_month+'_'+date+selected_class+'">' + date + '</td>'; // 평일 셀 출력
			}
			if (weekDay === 6) {
				calendarHTML += '</tr>'; // 토요일이면 행 마무리
			}
		}
		for (var i = weekDay + 1; i <= 6; i++) {
			calendarHTML += '<td></td>'; // 마지막 주 빈 셀 채우기
		}
		calendarHTML += '</tr>';
		calendarHTML += '</tbody>';
		calendarHTML += '</table>';
		if(is_popup){
			$('.custom_calendar_modal').html(calendarHTML);
		}else{
			$('.btn_export_date').html(calendarHTML);
		}

		// 배송불가일 설정
		$.ajax({
			type: "get",
			async : false,
			url: "/page/get_non_delivery_date",
			data: { 'type' : type, 'year' : year, 'month' : month },
			dataType: "json",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			success: function(result){
				// 모든 날짜에 선택 가능(custom_selectable_date) 추가
				$('[class^="calendar_'+current_month+'_"]').addClass('custom_selectable_date');
				// 배송불가일에는 선택 가능 제거
				for(temp_i=0; temp_i<result.length; temp_i++){
					$('.calendar_'+current_month+'_'+result[temp_i]+'').removeClass('custom_selectable_date')
				}

				// 타입이 정기구독인 경우
				if(type.indexOf('subscribe') != -1) {
					$('.custom_selectable_date').click(function() { // 선택 가능한 날짜에만 클릭 이벤트 추가
						if(is_popup){
							$('.btn_export_date').html($(this).data('date'));
						}else{
							$('[class^="calendar_'+current_month+'_"]').removeClass('custom_selected_date');
							$(this).addClass('custom_selected_date');
							$('input[name=export_date]').prev().addClass('selected_date_txt').text($(this).data('date'));
						}
						$('input[name=export_date]').val($(this).data('date'));
						if(is_popup){
							hide_custom_calendar();
						}
					});
				} 
			}
		});

		// 달력에 공휴일 설정
		$.ajax({
			type: "get",
			async : false,
			url: "/page/get_holiday_date",
			data: { 'type' : type, 'year' : year, 'month' : month },
			dataType: "json",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			success: function(result){
				// 공휴일 빨간색으로 표시
				if(result){
					for(temp_i=0; temp_i<result.length; temp_i++){
						$('.calendar_'+current_month+'_'+result[temp_i]+'').addClass('custom_holiday');
					}
				}
			}
		});

		// 선택할 수 있는 날짜가 없으면 다음달로 이동
		if($('[class^="calendar_'+current_month+'_"].custom_selectable_date').length == 0){
			show_custom_calendar(is_popup, type, next_year, next_month);
		}
	}

	// 달력 닫기
	function hide_custom_calendar(){
		$('.custom_calendar_layer').hide();
		$('body').css('overflow','visible');
	}
	// 꽃청 추가 END

	// 꽃청 추가 START 윤상희 2023.07.18 - Firebase Analytics 추가
	function analyticsLogEvent(name, params) {
		if (!name) {
			return;
		}
	
		if (window.AnalyticsWebInterface) {
			window.AnalyticsWebInterface.logEvent(name, JSON.stringify(params));
		} else if (window.webkit
			&& window.webkit.messageHandlers
			&& window.webkit.messageHandlers.firebase) {
			// Call iOS interface
			var message = {
				command: 'logEvent',
				name: name,
				parameters: params
			};
			window.webkit.messageHandlers.firebase.postMessage(message);
		} else {
			
		}
	}

	// 주문 내역삭제
	function custom_order_hide(order_seq){
		if( !confirm('상품의 결제내역이 삭제되어 복구할 수 없습니다.\n정말 삭제하시겠습니까?') )
			return;

		$.ajax({
			type: "POST",
			async : false,
			url: "/page/order_hide",
			data: { 'order_seq' : order_seq},
			dataType: "json",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			success: function(result){
				location.reload();
			}
		});
	}
	// 꽃청 추가 END
