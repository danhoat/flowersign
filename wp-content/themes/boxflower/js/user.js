/* **************************************************************************************
* 스킨 사용자/제작자 JS
************************************************************************************** */
$(function() {
	// jQuery


  ///////////////////////////////
  // 비주얼메인 슬라이드 관련 //
  //////////////////////////////
  // 슬라이드 상태 : 재생중 상태
  var slick_play = 1;

  // 슬라이드 초기화 및 설정
  $(".slides > div.visual").slick({
    dots: true, // 도트 페이징 사용( true 혹은 false )
    autoplay: true, // 슬라이드 자동( true 혹은 false )
    pauseOnHover: false, // Hover시 autoplay 정지안함( 정지: true, 정지안함: false )
    speed: 1000, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 600 == 0.6초 )
    fade: false, // 페이드 모션 사용
    autoplaySpeed: 6000 // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 8000 == 8초 )
  });

  // 슬라이드가 바뀌면 하단 현재 슬라이드 표시 변경 slick객체의 afterChange 이벤트 이용
  $(".slides>div.visual").on("afterChange", function(event, slick, currentSlide) {
    $("a.dot").removeClass("select"); // 선택표시 없앰
    $("a.dot[data-idx='" + currentSlide +"']").addClass("select"); // data-idx 에 슬라이드 번호가 지정되어 있음, 현재 슬라이드 번호와 data-idx가 같으면 선택됨으로 표시
  });

  // 슬라이드 표시 클릭시 슬라이드 변경
  $("a.dot").click(function(){
    $(".slides>div.visual").slick('slickGoTo', $(this).data("idx")); // 클릭시 data-idx에 해당하는 슬라이드로 이동
    return false;
  });

  // 이전슬라이드 클릭 버튼
  $(".btn_visualLeft").click(function(){
    $(".slides>div.visual").slick('slickPrev');
    return false;
  });

  // 다음슬라이드 클릭 버튼
  $(".btn_visualRight").click(function(){
    $(".slides>div.visual").slick('slickNext');
    return false;
  });
  ///////////////////////////////////
  // 비주얼메인 슬라이드 관련 끝 //
  /////////////////////////////////



  ////////////////////////
  // 회사소개 슬라이드 //
  ///////////////////////

  // 회사소개 -VISION 부분 슬라이드 초기화 및 설정
  $(".company_vision > ul.company_vision_contents").slick({
    arrows: true, //화살표 표시 안함
    dots: true, // 도트 페이징 사용( true 혹은 false )
    autoplay: true, // 슬라이드 자동( true 혹은 false )
    pauseOnHover: false, // Hover시 autoplay 정지안함( 정지: true, 정지안함: false )
    speed: 1000, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 600 == 0.6초 )
    fade: false, // 페이드 모션 사용
    autoplaySpeed: 5000, // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 8000 == 8초 )
    adaptiveHeight: true
  });

  // 회사소개 -VISION 부분 슬라이드 초기화 및 설정 끝



  // 회사소개 -HISTORY 부분 슬라이드 초기화 및 설정
  $(".company_history > div.history").slick({
    arrows: true, //화살표 표시 안함
    autoplay: true, // 슬라이드 자동( true 혹은 false )
    pauseOnHover: false, // Hover시 autoplay 정지안함( 정지: true, 정지안함: false )
    speed: 1000, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 600 == 0.6초 )
    fade: true, // 페이드 모션 사용
    autoplaySpeed: 10000, // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 8000 == 8초 )
    adaptiveHeight: true
  });

    // 슬라이드가 바뀌면 하단 현재 슬라이드 표시 변경 slick객체의 afterChange 이벤트 이용
  $(".company_history > div.history").on("afterChange", function(event, slick, currentSlide) {
    $("a.dot").removeClass("history_select"); // 선택표시 없앰
    $("a.dot[data-idx='" + currentSlide +"']").addClass("history_select"); // data-idx 에 슬라이드 번호가 지정되어 있음, 현재 슬라이드 번호와 data-idx가 같으면 선택됨으로 표시
  });
  // 슬라이드 표시 클릭시 슬라이드 변경
  $("a.dot").click(function(){
    $(".company_history > div.history").slick('slickGoTo', $(this).data("idx")); // 클릭시 data-idx에 해당하는 슬라이드로 이동
    return false;
  });

  ///////////////////////////
  // 회사소개 슬라이드 끝 //
  /////////////////////////



  ///////////////////////////
  // 브랜드 대상 슬라이드 //
  /////////////////////////

  $(".award_certification > ul.award_certification_list").slick({
    arrows: true, //화살표 표시 안함
    autoplay: true, // 슬라이드 자동( true 혹은 false )
    dots: false, // 도트 페이징 사용( true 혹은 false )
    pauseOnHover: false, // Hover시 autoplay 정지안함( 정지: true, 정지안함: false )
    speed: 1000, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 600 == 0.6초 )
    fade: false, // 페이드 모션 사용
    autoplaySpeed: 5000, // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 8000 == 8초 )
    adaptiveHeight: true
  });
  //////////////////////////////
  // 브랜드 대상 슬라이드 끝 //
  ////////////////////////////




  ///////////////////////////////////////////////////////////
  // 하단 인증 슬라이드 (ISO, 벤처, 특허청, 이지에스크로) //
  /////////////////////////////////////////////////////////
  $('.footer_cert').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  //////////////////////////////////////////////////////////////
  // 하단 인증 슬라이드 (ISO, 벤처, 특허청, 이지에스크로) 끝 //
  ////////////////////////////////////////////////////////////






    // 어버이날 - 코사지 이벤트 슬라이드 210324 추가 : 서민혁
    $(".parentsday_2021 .img_slides ul").slick({
      arrows: true, //화살표 표시 안함
      dots: false, // 도트 페이징 사용( true 혹은 false )
      autoplay: true, // 슬라이드 자동( true 혹은 false )
      pauseOnHover: false, // Hover시 autoplay 정지안함( 정지: true, 정지안함: false )
      speed: 1000, // 슬라이딩 모션 속도 ms( 밀리세컨드, ex. 600 == 0.6초 )
      fade: false, // 페이드 모션 사용
      autoplaySpeed: 5000, // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 8000 == 8초 )
      adaptiveHeight: true
    });

    // 어버이날 - 코사지 이벤트 슬라이드 끝







      /////////////////////////////////
      // STORY 아레카야자 슬라이드 //
      //////////////////////////////
      $(".location .slide_areca").slick({
        // dots: true,
        centerMode: true,
        autoplay: true, // 슬라이드 자동( true 혹은 false )
        arrows:true,
        autoplaySpeed: 3000, // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 8000 == 8초 )
        // adaptiveHeight:true,
        centerPadding: '250px',
        slidesToShow: 1,
        responsive: [
            {
              breakpoint: 1380,
              settings: {
                centerMode: true,
                slidesToShow: 1,
                centerPadding:'20vw'
              }
            },
            {
              breakpoint: 500,
              settings: {
                centerMode: true,
                slidesToShow: 1,
                centerPadding:'10vw'
              }
            }
          ]
      });



      ////////////////////////////////////
      // STORY 아레카야자 슬라이드 끝 //
      /////////////////////////////////


      /////////////////////////////////
      // STORY 만냥금 슬라이드 ///////
      //////////////////////////////

        $(".location .slide_berry").slick({
          // dots: true,
          centerMode: true,
          autoplay: true, // 슬라이드 자동( true 혹은 false )
          arrows:true,
          autoplaySpeed: 3000, // autoplay 사용시 슬라이드간 시간 ms( 밀리세컨드, ex. 8000 == 8초 )
          // adaptiveHeight:true,
          centerPadding: '350px',
          slidesToShow: 1,
          responsive: [
              {
                breakpoint: 1200,
                settings: {
                  centerMode: true,
                  slidesToShow: 1,
                  centerPadding:'25vw'
                }
              },
              {
                breakpoint: 500,
                settings: {
                  centerMode: true,
                  slidesToShow: 1,
                  centerPadding:'10vw'
                }
              }
            ]
        });

      ////////////////////////////////////
      // STORY 만냥금 슬라이드 끝 //////
      /////////////////////////////////




});
