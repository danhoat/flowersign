<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();


// $product->get_regular_price();
// $product->get_sale_price();
// $product->get_price();


global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}
function ov_wc_get_star_rating_html( $rating, $count = 0 ) {
	$html = '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';

	if ( 0 < $count ) {
		/* translators: 1: rating 2: rating count */
		$html .= sprintf( _n( 'Rated %1$s out of 5 based on %2$s customer rating', 'Rated %1$s out of 5 based on %2$s customer ratings', $count, 'woocommerce' ), '<strong class="rating">' . esc_html( $rating ) . '</strong>', '<span class="rating">' . esc_html( $count ) . '</span>' );
	} else {
		/* translators: %s: rating */
		$html .= sprintf( esc_html__( 'Rated %s out of 5', 'woocommerce' ), '<strong class="rating">' . esc_html( $rating ) . '</strong>' );
	}

	$html .= '</span>';

	return $html;
}


echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php // do_action( 'woocommerce_before_add_to_cart_form' ); ?>


	<div class="full rating-price">
		<?php if ( $rating_count > 0 ) : ?>

			<div class="woocommerce-product-rating">
				<?php 
				if( $average>0 ) {

					/* translators: %s: rating */
					$label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating_count );
					$html  = '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . ov_wc_get_star_rating_html( $average, $rating_count ) . '</div><span class = "count">('.$rating_count.')</span>';
					echo $html;
				}
				
				?>
			
			</div>

		<?php endif; ?>

		<div class="sumary-price">
			<p class="woo-price woo-first-price text-right">
				<span id="woo_price" class=""><?php echo wc_price($product->get_price()); ?></span>
				<input type="hidden" id="static_price"  value="<?php echo $product->get_price();?>">
			</p>
			<?php if($product->is_on_sale() ) {?>
				<p class="woo-price woo-second-price text-right ">
					<del>
						<span id="woo_regular_price"><?php echo wc_price($product->get_regular_price());?></span>
					</del>
				</p>
			<?php } ?>
		</div>

	</div>

	<?php woocommerce_template_single_excerpt();?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		
		<div class="full">
			<span class="lable-qty">Số lượng: </span>
			<div data-v-53b46760="" class="h-10 col-span-2 grid grid-cols-3 w-40 text-brand">
				<div data-v-53b46760="" class="flex">
					<span data-v-53b46760="" class="btn text-xs self-center text-brand hover:text-brand-dark btn-minus-quantity"><i data-v-53b46760="" class="fa-solid fa-minus"></i></span>
				</div>

				
				<?php
				do_action( 'woocommerce_before_add_to_cart_quantity' );
				woocommerce_quantity_input(
					array(
						'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
						'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
						'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
					)
				);
				do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>

				<div data-v-53b46760="" class="flex"><span data-v-53b46760="" class="btn text-xs self-center text-brand hover:text-brand-dark btn-plus-quantity"><i data-v-53b46760="" class="fa-solid fa-plus"></i></span></div>
			</div>
		</div>

		<div class="full mt10 mb10">
			<div class="text-xs mb-2"><p>Đơn hàng được team shipper của shop giao và bảo hiểm.</p></div>
		</div>
		
		<div class="full">

			<div class="mt-2 text-xs">Chọn thêm sản phẩm:</div>

			<?php list_bulde_product();?>
		</div>

		<?php 
		$today = date('d/m',time());
		
		//$today = str_replace("/", ' Thg ', $today);
		$today =  wp_date( 'j/m', time() );
		$today_show = str_replace("/", ' Thg ', $today);

		$tomorrow =  wp_date( 'j/m', strtotime("+1 day") );
		$tomorrow_show = str_replace("/", ' Thg ', $tomorrow);

		$next_2days =  wp_date( 'j/m', strtotime("+2 days") );
		$n_week = wp_date('l',  strtotime("+2 days"));
		
		$next_2days_show = str_replace("/", ' Thg ', $next_2days);

		?>

		<div class="full">

			<div class="delivery-date text-xs" id="delivery-date" product_price="719000" style="">
				<span class="label">Chọn ngày giao hàng:</span>
				<input type="hidden" name="delivery_date" value="">

				<div class="grid select-date gap-5 grid-cols-4">
					<div class="date-item"><!---->
						<input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="<?php echo wp_date( 'j/m/Y',  time() );?>">
						<div class="card-form choice uppercase grid content-center id-2024-10-19-lg">
							<p class="block sm:hidden xl:hidden date-month"><?php echo $today_show;?></p>
							<span class="font-bold text-black text-xxs xs:text-xs sm:text-sm lg:text-xs xl:text-sm relative date-week-day">Hôm nay</span></div>
					</div>

					<div class="date-item">
						<!---->
						<input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="<?php  echo wp_date( 'j/m/Y', strtotime("+1 day") );?>">
						<div class="card-form choice uppercase grid content-center id-2024-10-20-lg">
							<p class="block sm:hidden xl:hidden date-month"><?php echo $tomorrow_show;?></p>
							<span class="font-bold text-black text-xxs xs:text-xs sm:text-sm lg:text-xs xl:text-sm relative date-week-day">Ngày mai</span>
						</div>
					</div>
					<div class="date-item">
						<!----><input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="<?php echo wp_date( 'j/m/Y', strtotime("+2 days")) ;?>">
						<div class="card-form choice uppercase grid content-center id-2024-10-21-lg">
							<p class="block sm:hidden xl:hidden date-month"><?php echo $next_2days_show;?></p>
							<span class="font-bold text-black text-xxs xs:text-xs sm:text-sm lg:text-xs xl:text-sm relative date-week-day"><?php echo $n_week;?></span></div>
					</div>
					<div class="date-item">
						<div id="calendar">
							<input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="">
							<div class="card-form choice pb-3 sm:py-3 lg:py-2 xl:py-3 xl:px-7 grid content-center">
								<i class="fa fa-calendar-days text-xl xxs:text-md" readonly></i>
							<span class="font-bold sm:block date-week-day" >LỊCH</span></div>
							<input id="datepicker" onkeydown="return false;"  />
						    <script>
						    	$("#datepicker").attr("readonly", true);
						        $('#datepicker').datepicker({
						            uiLibrary: 'bootstrap5',
						            //dateFormat:'dd/mm/yy',
						            // startDate: '+1d',
						            // setStartDate: "22-12-2024",
						            minDate: 3,
						            maxDate: 30,

						            onSelect: function(dateText) {
										        console.log("Selected date: " + dateText + "; input's current value: " + this.value);
										        $(this).val(this.value);
										        let item = $(this).closest('.date-item');
										        item.find(".hidden_choice").prop('checked', true);
										        const weekday = ["Chủ Nhật","Thứ Hai","Thứ Ba","Thứ Tư","Thứ Năm","Thứ sáu","Thứ Bảy"];
										        const months = ['1','2','3','4','5','6','7','8','9','10','11','12'];


										        const d = new Date(this.value);
										        let month = months[d.getMonth()] ;
										        let day = weekday[d.getDay()];
										    
										       	let date = d.getDate() + ' Thg '+ month;
										       	let deliverydate = d.getDate()+'/'+month+'/'+ d.getYear();

										       	let html = '<p class="block sm:hidden xl:hidden date-month">'+date+'</p>';
										       	 html+='<span class="font-bold text-black text-xxs xs:text-xs sm:text-sm lg:text-xs xl:text-sm relative date-week-day">'+day+'</span>';
										      
										       	item.find(".choice").html(html);
										       	item.find(".hidden_choice").val(deliverydate);
										}
									});
						    </script>
						</div>
					</div>
				</div>
				<!----></div>
		</div>

		<div class="full">
			<p>
				<h3 class=" text-lg"> <span class="label-tong">Tổng: </span> <span class="text-brand font-bold self-center whitespace-nowrap subtotal-price" id="subtotal">  <?php echo wc_price($product->get_price());?></span></h3>
			</p>
		</div>
		<div class="grid full grid-cols-2 form-btn">

			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button  btn-add-to-cart"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
			
			<?php btn_mua_ngay();?>
		</div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

		<div class="tw-bg-[#F1F3FF] tw-rounded-lg cool-cash-box">
			
		<div class="tw-py-2 tw-px-3 tw-rounded-lg cool-cash-box-detail">
			<div class="tw-flex tw-items-center tw-justify-between tw-cursor-pointer js-coolcash-toggle">


				<div class="tw-flex tw-items-center tw-gap-2 tw-text-sm">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.8021 0.0161133H3.19787C1.43133 0.0161133 0 1.44212 0 3.20866V12.7916C0 14.5529 1.43133 15.9842 3.19787 15.9842H12.8021C14.5687 15.9842 16 14.5582 16 12.7916V3.20866C15.9947 1.44212 14.5687 0.0161133 12.8021 0.0161133ZM14.9305 12.7863C14.9305 13.9569 13.9727 14.9147 12.8021 14.9147H3.19787C2.02195 14.9147 1.0695 13.9622 1.0695 12.7863V3.20334C1.0695 2.03274 2.02727 1.07498 3.19787 1.07498H12.8021C13.9781 1.07498 14.9305 2.02742 14.9305 3.20334V12.7863Z" fill="#2F5ACF"></path> <path d="M8.53963 4.74634H7.39032H7.37967C7.37435 5.72007 6.84758 6.32133 6.00156 6.32133C5.15553 6.32133 4.62876 5.72007 4.62344 4.74634H3.47412C3.47412 6.30537 4.44253 7.43872 6.00156 7.43872C6.8529 7.43872 7.52866 7.1035 7.9703 6.54481C8.32148 6.10317 8.51835 5.52851 8.53963 4.86872C8.53963 4.82615 8.53963 4.78891 8.53963 4.74634Z" fill="#2F5ACF"></path> <path d="M11.3595 4.74634C11.3542 5.72007 10.7955 6.32133 9.94945 6.32133C9.13535 6.32133 8.59261 5.76795 8.5394 4.86872C8.5394 4.83147 8.53408 4.78891 8.53408 4.74634H7.38477C7.38477 5.45402 7.59228 6.07657 7.96474 6.54481C8.4117 7.1035 9.09278 7.43872 9.94413 7.43872C11.5032 7.43872 12.5195 6.30537 12.5195 4.74634H11.3595Z" fill="#2F5ACF"></path> <path d="M4.62344 4.74634H3.47412C3.47412 4.75698 3.6976 10.1151 3.6976 10.1205H4.84691C4.84691 10.1098 4.62344 4.75698 4.62344 4.74634Z" fill="#2F5ACF"></path> <path d="M11.3748 4.74634H12.5242C12.5242 4.75698 12.3007 10.1151 12.3007 10.1205H11.1514C11.1514 10.1098 11.3748 4.75698 11.3748 4.74634Z" fill="#2F5ACF"></path> <path d="M12.3075 10.1206H3.69824V11.2433H12.3075V10.1206Z" fill="#2F5ACF"></path></svg> 


					<span>Được hoàn<span class="js-coolcash-title-text"> lên đến</span> <span class="tw-font-medium js-coolcash-amount">38.000</span> CoolCash.</span> 


					<p class="tw-text-cm-blue tw-no-underline tw-font-semibold tw-cursor-pointer js-coolcash-detail-link">Chi tiết</p>
				</div> 
				<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="tw-w-4 tw-h-4 tw-transition-transform js-coolcash-arrow"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
			</div>
	 <div class="tw-text-sm tw-text-cm-black tw-overflow-hidden tw-transition-all tw-duration-300 tw-max-h-0 js-coolcash-content"><div class="tw-p-2 tw-mt-2 tw-border-t tw-border-cm-black/20"><div>
                    Đây là số CoolCash ước tính bạn sẽ được hoàn lại khi mua sản phẩm hôm nay, tương ứng với quyền lợi hạng
                    <img src="<?php echo IMAGE_URL;?>/icon_backkim.png" alt="" class="tw-h-5 tw-object-contain js-ranking-image"></div> <div class="tw-mt-3 md:tw-mt-5 js-login-message" style="">
                    CoolCash có giá trị như tiền mặt dùng để mua hàng tại website Coolmate.me <br> <span rel-script="toggle-login-popup" class="tw-font-semibold tw-cursor-pointer tw-text-cm-blue">Đăng nhập</span> hoặc <span rel-script="toggle-register-popup" class="tw-font-semibold tw-cursor-pointer tw-text-cm-blue">Đăng ký</span> ngay để kiểm tra mức hoàn tiền chính xác nhất dành cho bạn.
                </div></div></div></div></div>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
