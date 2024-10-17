 <?php 

add_filter ( 'woocommerce_product_thumbnails_columns', 'bbloomer_change_gallery_columns' );
add_filter ( 'woocommerce_single_product_image_gallery', 'bbloomer_change_gallery_columns' ); 
 
function bbloomer_change_gallery_columns() {
     return 1; 
}

add_filter ( 'storefront_product_thumbnail_columns', 'bbloomer_change_gallery_columns_storefront' );
 
function bbloomer_change_gallery_columns_storefront() {
     return 1; 
}
//where woocommerce_single_product_image_gallery is the selector
  
