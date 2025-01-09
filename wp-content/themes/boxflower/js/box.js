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
      
    });



 
    var min_price = 100000,    max_price = 10000000;

    var current_min_price = 100000, current_max_price = 10000000;
    current_min_price = $("#price-from").val();
    current_max_price = $("#price-to").val();
    jQuery('#slider-price').slider({
        range   : true,
        min     : min_price,
        max     : max_price,
        step    : 100000,
        values  : [ current_min_price, current_max_price ],
        slide   : function (event, ui) {

            jQuery('#price-from').val(ui.values[0]);
            jQuery('#price-to').val(ui.values[1]);
            current_min_price = ui.values[0];
            current_max_price = ui.values[1];
        },
        stop    : function (event, ui) {

            filter_url = '?price=' + current_min_price + '-' + current_max_price;
            console.log('filter_url: ', filter_url);
            window.history.pushState("", "", filter_url);
            location.reload();
        }
    });




})( jQuery);

