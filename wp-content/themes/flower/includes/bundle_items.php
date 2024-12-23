<?php 

function list_bundle_items(){

    $args = array();
    $args[] =  wc_get_product(LIST_BUNDLES_ITEM[0]); 
    $args[] =  wc_get_product(LIST_BUNDLES_ITEM[1]); 
    $args[] =  wc_get_product(LIST_BUNDLES_ITEM[2]); 
    $args[] =  wc_get_product(LIST_BUNDLES_ITEM[3]); 
    
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

            $product_id = $item->get_ID();
            $thumbnail_url = IMAGE_URL.'/teddy-bear.jpg';
            if(has_post_thumbnail($product_id)){
                $thumbnail_url = get_the_post_thumbnail_url($product_id);
            }
           
         ?>
           <li class="splide__slide is-active is-visible"  >
                <div class="relative">
                    <input   type="checkbox" class="hidden_choice_checkbox " value="<?php echo $item->get_ID();?>"  name="bundles[]" att_price = "<?php echo $item->get_price();?>">
                    <div class="addon-container flex flex-col justify-between px-3 pb-2 rounded-md border-2 border-blue-light text-center choice addon-box cursor-pointer hover:bg-gray-50" >
                        <div class="absolute addon-info cursor-pointer" data-id="8"><i class="fa fa-info pointer-events-none"></i></div>

                    <div class="addon-name text-red pr-2 addon-title line-clamp-2" data-addonid="332"><?php echo $item->get_title();?></div>

                    <img src="<?php echo $thumbnail_url;?>" alt="<?php echo esc_attr($item->get_title());?>" class="addon-image w-24 h-24 object-cover object-center my-1 self-center addon-img cursor-pointer" >
                    <span class="addon-price font-bold cursor-pointer" data-addonid="332"><?php echo $item->get_price();?> ₫</span>
                </div>
                </div>
                <div class="grid-cols-3 hidden" id="qty-332"><span class="btn text-sm hover:text-brand-dark" data-symb="-" data-id="332">-</span>
                    <span class="self-center justify-self-center">0</span><span class="btn text-sm hover:text-brand-dark" data-symb="+" data-id="332">+</span>
                </div>
            </li>

        <?php }?>
     
    </ul>
    <?php 

}