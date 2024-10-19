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
            return false;
        }

        //return true;
    });
}(jQuery))