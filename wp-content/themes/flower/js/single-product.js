(function($){
    var top = 0;

    function form_validate_fail(msg, duration = 5000){
        
        top  = top + 60;

        var toppx = top+'px';
        var el = document.createElement("div");

        el.setAttribute("style","position:absolute;top:"+toppx);
        el.setAttribute("class","notice");
        el.innerHTML = msg;
        
        document.body.appendChild(el);
        setTimeout(function(){
            el.remove();
        },duration);


    }
    $("form.cart").submit(function(event){
        var form = $( this );
        var values = $(this).serialize();
        var data = $(this).serializeArray();
        var elementExists = $(".notice").length;
        if( ! elementExists || top > 600 ){
            top = 0;
        }
        var delivery_date = form.find("input[name='delivery_date']:checked").val();

        if(! delivery_date){
             $("html, body").animate({ scrollTop: 0 }, "slow");
            form_validate_fail('Lỗi chưa chọn ngày giao hàng.', 3000);
            console.log('false');
            $(this).removeClass('devvn-quickbuy');
            return false;
        }

        //return true;
    });
    // $("#tinh_tp").change(function(event){

    //     var ttp_name = $(this).val();

    //     console.log(feeShip);
    //     console.log(ttp_name);
    //     var price = $("#static_price").val();

    //     var newPrice = parseFloat(price) + parseFloat(feeShip[ttp_name]);
    //     console.log("new Price:", newPrice);
    //     $("#woo_price").html(newPrice);
    // });

    //$(".chosen-select").chosen();

    $(document).ready(function(){

        $(".cool-cash-box-detail").click(function(){
            console.log('js click');
            $(this).find(".js-coolcash-content").toggleClass('tw-max-h-0');
        });
        var total = $("#woo_price").html();
        total = parseFloat(total);

        console.log('total:', total);
        $(".hidden_choice_checkbox ").change(function(){
            var checked = $(this).is(":checked");
            console.log('checked:', checked);

            var price = $(this).attr('att_price');
            price = parseFloat(price);
            console.log('price: ', price);

            if( checked){
                total = total + price;
            }else{
                total = total - price;
            }
            
  
            console.log('total:', total);
            var new_price = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total)
            $("#subtotal").html(new_price);
        })
    });




}(jQuery));