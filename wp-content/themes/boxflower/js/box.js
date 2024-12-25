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
})


