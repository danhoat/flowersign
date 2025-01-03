<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */


do_action( 'woocommerce_shop_loop_header' );

//echo do_shortcode("[woof  sid='generator_676549921f798' autohide='0' autosubmit='-1' is_ajax='0' ajax_redraw='0' start_filtering_btn='0' btn_position='b' dynamic_recount='-1' hide_terms_count_txt='0' mobile_mode='0' ]");
// echo do_shortcode("[woof  sid='generator_67654de9ad51d' autohide='0' autosubmit='-1' is_ajax='0' ajax_redraw='0' start_filtering_btn='0' btn_position='b' dynamic_recount='-1' hide_terms_count_txt='0' mobile_mode='0' ]");

global $wp_query;
$total = $wp_query->found_posts;
global $orderby;
$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '';

function is_active_sort($name){
	global $orderby;
	if($orderby == $name) echo 'active';
}
function is_selected($key,$value){
	
	if( isset($_GET[$key]) && $_GET[$key] == $value ) echo 'selected';
}
$is_selected_color = false;
$list_color = array('red','yell','white');

if(isset($_GET['color']) && in_array($_GET['color'], $list_color ) ){
	$is_selected_color = true;
}
if($is_selected_color){
	$is_selected_color = 'selected';
} else{
	$is_selected_color = '';
}


$is_selected_size = false;
$list_size = array('m','s','xl');

if(isset($_GET['size']) && in_array($_GET['size'], $list_size ) ){
	$is_selected_size = true;
}
if($is_selected_size){
	$is_selected_size = 'selected';
} else{
	$is_selected_size = '';
}
$has_childterm = false;

$cur_term = false;
$main_id = 0;
if ( is_product_taxonomy() ) {
	$cur_term = get_queried_object();

	if ( $cur_term  && !$cur_term->parent ) {
		$term_parent = $cur_term->parent;
		$term_id  = $cur_term->term_id;

	} else if($cur_term->parent) {
		$parent_term = get_term_by('term_id',$cur_term->parent,'product_cat');
		$term_id = $parent_term->term_id;

	}

	$has_childterm = get_term_children($term_id,'product_cat');
	$main_id= $term_id;
}



function is_select_subcat($term_id, $cur_term){
	if($term_id == $cur_term->term_id){
		echo 'class ="on"';
	}
}


?>

<?php
if(is_tax('product_cat') ){
	$main_term 			= get_term_by('term_id', $main_id,'product_cat');
	$term_description 	= apply_filters( 'woocommerce_taxonomy_archive_description_raw', $main_term->description, $main_term );
	
	//$term_description = apply_filters( 'woocommerce_taxonomy_archive_description_raw', $main_term->description, $main_term );
	$short_desc = get_term_meta( $main_id, 'short_desc', true ) ;

	// if ( ! empty( $short_desc ) ) {
	// 	echo '<div class="term-description">' . wc_format_content( wp_kses_post( $short_desc ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	// }
	$term_description = term_description($main_term);



	?>

	<?php if($has_childterm){ ?>
	<div class="full">
		<div class="catalog_subtitle_div swiper-container-horizontal" style="display: block;">
			<ul class="catalog_subtitle ">
				<?php foreach($has_childterm as $key=>$term_id){

					$term = get_term_by('term_id', $term_id,'product_cat');
					?>
					<li data-code="<?php echo $term_id;?>" <?php is_select_subcat($term_id, $cur_term);?> ><a <?php is_select_subcat($term_id, $cur_term);?> href="<?php echo get_term_link($term);?>"><?php echo $term->name;?> </a></li>
				<?php  } ?>
			</ul>
				
		</div>
	</div>
	<?php } ?>



	
<?php }?>


<div class="search_filter_wrap">




<ul id="filteredItemSorting" class="filtered_item_sorting">
		<li class="item_total">
			<a href="javascript:void(0)" id="btnFilterOpen" class="total"><span class="num"><?php echo $total;?> </span> sản phẩm </a>
		</li>
		<li class="item_display ">
			<div class="hide">
				<label class="display display_lattice active"><input type="radio" name="filter_display" value="lattice" onclick="filterDisplay()" checked="">격자 반응형</label>
				<label class="display display_list"><input type="radio" name="filter_display" value="list" onclick="filterDisplay()">리스트 반응형</label>
			</div>

			
		
		</li>
		<li class="item_viewnum">
			<select name="per" class="select_number_items">
				<option value="20" <?php is_selected_limit(20);?> >&nbsp;20&nbsp;</option>
				<option value="40"<?php is_selected_limit(40);?>>&nbsp;40&nbsp;</option>
				<option value="100" <?php is_selected_limit(100);?>>&nbsp;100&nbsp;</option>
				<option value="200" <?php is_selected_limit(200);?>>&nbsp;200&nbsp;</option>
			</select>
		</li>
		<li class="item_order">
			<p id="mobileSortingSelected">Sort</p>
			<ul class="list">
				<li class="orderBysale hide">
					<label class="active"><input type="radio" name="sorting" value="sale" checked="">Bán chạy</label>
				</li>
				<li >
					<label class="orderbyDate <?php is_active_sort('date');?>"><input type="radio" name="sorting" value="date">Mới về</label>
				</li>
				<li>
					<label class="sort-lowprice <?php is_active_sort('price');?>"><input type="radio" name="sorting" value="price">Giá thấp</label>
				</li>
				<li>
					<label  class="sort-hightprice <?php is_active_sort('price-desc');?>"><input type="radio" name="sorting" value="price-desc">Giá cao</label>
				</li>

				<li><select name="color" class="select_color">
						<option value="" <?php echo $is_selected_color;?> >Color</option>
						<option value="red" <?php is_selected('color','red');?> >Red</option>
						<option value="yellow" <?php is_selected('color','yellow');?>  >Yellow</option>
						<option value="white" <?php is_selected('color','white');?>  >white;</option>
					</select>
				</li>
				<li><select name="size" class="select_size">
					<option value="" <?php echo $is_selected_size;?> >Size</option>
					<option value="m" <?php is_selected('size','m');?> >M</option>
					<option value="s"  <?php is_selected('size','s');?> >S</option>
					<option value="xl"  <?php is_selected('size','xl');?> >XL</option>
				</select>
				</li>
				<!-- <li>
					<label><input type="radio" name="sorting" value="review">상품평많은순</label>
				</li>
				<li>
					<label><input type="radio" name="sorting" value="sale">판매량순</label>
				</li> -->
			</ul>
		</li>
	</ul>
</div>



<?php

if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );



	?>

	

	<?php

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
// woocommerce_product_cat_description();

if( is_tax('product_cat') ){ ?>





<div class="full bg-slate-100">
	<div class="container">
		<div class="bg-slate-100">
			<div class="mx-auto max-w-screen-xl py-10 px-4 md:px-6">
				<h3 class="text-center font-title  text-2xl tracking-tight text-slate-900 sm:text-3xl">Why send flowers with&nbsp;Floom?</h3>
				<div class="flex flex-col lg:flex-row gap-8 lg:gap-12 justify-evenly">
					<div class="mx-auto flex flex-1 items-center flex-col gap-3 bg-slate-white lg:py-5 rounded-md max-w-[350px]">
						<img alt="What you see is what you get" loading="lazy" width="200" height="200" decoding="async" data-nimg="1" class="w-auto h-12 rounded-md object-cover" style="color:transparent" src="https://d3c3go6eq7r80g.cloudfront.net/products/200px-Flower-eye_180126_141515.gif">
						<div class="flex-1 md:flex-col text-center">

							<h4 class="font-title text-xl ">What you see is what you&nbsp;get</h4>

							<p class="text-sm leading-relaxed">Love the bouquet on your screen? That's exactly what our local florist will prepare freshly for your order... or your money back!</p>
						</div>
					</div>
					<div class="mx-auto flex flex-1 items-center flex-col gap-3 bg-slate-white lg:py-5 rounded-md max-w-[350px]">

						<img alt="Always unique, never generic" loading="lazy" width="200" height="200" decoding="async" data-nimg="1" class="w-auto h-12 rounded-md object-cover" style="color:transparent" src="https://d3c3go6eq7r80g.cloudfront.net/products/200px-Florist_180126_141526.gif">

						<div class="flex-1 md:flex-col text-center">
						<h4 class="font-title text-xl ">Always unique, never&nbsp;generic</h4>

						<p class="text-sm leading-relaxed">We only work with the most talented and unique artisans, and we're passionate about supporting our skilled family of florists.</p></div></div>
					<div class="mx-auto flex flex-1 items-center flex-col gap-3 bg-slate-white lg:py-5 rounded-md max-w-[350px]">
						<img alt="Hand-delivered with care and attention" loading="lazy" width="200" height="200" decoding="async" data-nimg="1" class="w-auto h-12 rounded-md object-cover" style="color:transparent" src="https://d3c3go6eq7r80g.cloudfront.net/products/200px-Hands_180126_141541.gif">
						<div class="flex-1 md:flex-col text-center">

							<h4 class="font-title text-xl ">Hand-delivered with care and&nbsp;attention</h4>
							<p class="text-sm leading-relaxed">Each of our orders is professionally arranged, wrapped and safely delivered with a hand-written card… on the exact day that you need it.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



	<?php 


	
		echo '<div class = "full term-description">';
		echo '<div class ="container">';
			echo '<div class ="short-description ">';
			echo $short_desc;
			echo '</div>';
		
		if( !empty($term_description) ){  ?>
			<a class="description-show-more show-more-top">
				<span><i class="fa fa-plus" aria-hidden="true"></i> Xem thêm</span>
			</a>

			<?php
			echo '<div class="full-description hide">'.$term_description.'</div>';
		}
		
		echo '</div>';
		echo '</div>';
	

}
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
