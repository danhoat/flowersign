<?php 

function list_bundle_items(){
    $args = array();
    $args[] =  array(
        'product_id' => 630,
        'title' => 'Gấu Bông Đáng Yêu',
        'price' => 10000,
        'image' => 'https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_aIlFh7F0uQRQiuqrFxmuj5cOy.webp'
    );
    $args[] =  array(
        'product_id' => 631,
        'title' => 'Nến Thơm Giáng Sinh Cây Thông',
        'price' => 20000,
        'image' => 'https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_YRR6d609qQtD2eR4b5uzJkkxI.webp'
    );
    $args[] =  array(
        'product_id' => 632,
        'title' => ' Banner ( Băng Rôn ) Merry Christmas',
        'price' => 30000,
        'image' => 'https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_QMMDsxRzUKrXjoX8R3p9uzz9u.webp'
    );
     $args[] =  array(
        'product_id' => 633,
        'title' => ' Hộp Chocolate Ferrero Rocher (5 viên)',
        'price' => 40000,
        'image' => 'https://assets.flowerstore.ph/public/tenantVN/app/assets/images/variant/600_cXFSDEMW87kZbse3b23rt8bud.webp'
    );

    return  $args;
}

function get_bundle_fee($key){
    $items = list_bundle_items();
    return (float) $items[$key]['price'];
}
function list_bulde_product(){?>
    <ul class="list-bundles">
    <?php $list = (object) list_bundle_items(); ?>
    <?php foreach ($list as $key => $item) {

        $item = (object) $item;
       
     ?>
       <li class="splide__slide is-active is-visible" id="splide02-slide09" style="margin-right: 8px; width: 142px;" aria-hidden="false" tabindex="0">
            <div class="relative">
                <input id="hiddenChoice332" type="checkbox" class="hidden_choice_checkbox " value="<?php echo $item->product_id;?>" data-gtm-form-interact-field-id="0" name="bundles[]">
                <div class="addon-container flex flex-col justify-between px-3 pb-2 rounded-md border-2 border-blue-light text-center choice addon-box cursor-pointer hover:bg-gray-50" data-addonid="332"><div class="absolute addon-info cursor-pointer" data-id="8"><i class="fa fa-info pointer-events-none"></i></div>

                <div class="addon-name text-red pr-2 addon-title line-clamp-2" data-addonid="332"><?php echo $item->title;?></div>

                <img src="<?php echo $item->image;?>" alt="Gấu Bông Đáng Yêu" class="addon-image w-24 h-24 object-cover object-center my-1 self-center addon-img cursor-pointer" data-addonid="332"><span class="addon-price font-bold cursor-pointer" data-addonid="332"><?php echo $item->price;?> ₫</span></div>
            </div>
            <div class="grid-cols-3 hidden" id="qty-332"><span class="btn text-sm hover:text-brand-dark" data-symb="-" data-id="332">-</span><span class="self-center justify-self-center">0</span><span class="btn text-sm hover:text-brand-dark" data-symb="+" data-id="332">+</span></div>
        </li>

    <?php }?>



     
    </ul>
    <?php 

}