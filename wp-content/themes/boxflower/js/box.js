( function( $ ) {
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
            // let p = jQuery(".term-description").offset().top;
            // let pos = Number(p) - 130; 
            // console.log(pos);
            jQuery(".full-description").toggleClass('hide');
            $(this).closest(".term-description").toggleClass('active');

            // $('html,body').animate({
            //     scrollTop: pos},
            //     'slow'
            // );
        });

        $(".btn-tab").click(function(){

            $(".btn-tab").toggleClass('active');
            let key = 'newarrival';
            if($(this).hasClass('btn-tab-bestsale')) key = 'bestsale';
            $.ajax({
                url : 'https://demo.dichvu139.com/wp-admin/admin-ajax.php',
                data: {
                    action: 'box_get_top_products',
                    key : key,
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


        $(".menu-item-has-children").after().click(function(){
            console.log('toggle menu after');
           
            $(this).find(".sub-menu").toggle("slow");
             $(this).toggleClass('inactive');
        });
      
    })
})( jQuery);

