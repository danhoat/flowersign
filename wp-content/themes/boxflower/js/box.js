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

    $(".btn-tab-bestsale").click(function(){
        console.log('123');

        $.ajax({
            url : 'https://demo.dichvu139.com/wp-admin/admin-ajax.php',
            data: {
                action: 'box_get_best_sale',
            },
            beforeSend  : function(event){
              
            },
            success : function(res){
                console.log(res);
                console.log(res.html);
                $(".top-products").html(res.html);
            }
        });
        return false;
    });
})


