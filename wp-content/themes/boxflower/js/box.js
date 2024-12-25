$(document).ready(function(){
    console.log('ok');
    $("#btn_gioi_thieu").click(function(){
        $(".view-full").toggleClass('hide');
        if($(".view-full").hasClass('hide') ){
            $(this).html('Xem thêm');
        } else{
            $(this).html('Thu gọn');
        }
    });
    $(".show-more-top").click(function() {
        let p = $(".term-description").offset().top;
        let pos = Number(p) - 130; 
        console.log(pos);


        $('html,body').animate({
            scrollTop: pos},
            'slow');



    });
})


