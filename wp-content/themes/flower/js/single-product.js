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
        var is_buy_now = 0;
        $.each(data, function(i, field){
            if(field.name == 'is_buy_now'){
                is_buy_now = field.value;
            }
        });
        
        //if( is_buy_now ) return true;
    
        return true;
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


    $(document).ready(function(){

        $(".js-coolcash-toggle").click(function(){
            console.log('js click');
            //$(this).find(".js-coolcash-content").toggleClass('tw-max-h-0');
            $(this).next().toggleClass('tw-max-h-0');
        });
        var total = $("#static_price").val();
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
            
            var new_price = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total)
            $("#subtotal").html(new_price);
        });

        // $(".hidden_choice").change(function(){
        //     console.log('changed date');
        //     $("#datepicker").val('');
        // })
    });

    $(".btn-minus-quantity").click(function(){

        let newNumber = parseInt($(".qty").val());
        if(newNumber == 1) return;

        $(".qty").val(newNumber-1);
    });

    $(".btn-plus-quantity").click(function(){

        let newNumber = parseInt($(".qty").val());
        if(newNumber > 9 ) return;

        $(".qty").val(newNumber+1);
    });


}(jQuery));