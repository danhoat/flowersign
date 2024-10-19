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

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<h1> bat dau form </h1>
	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		

		<div class="full">
			<div class="text-xs"><h6 class="">Giao đến:</h6><div class="border-2 rounded-md p-2 my-2 flex text-black bg-brand border-brand" id="location-selector">

				<select name="tinh_tp" class="form-control">
					<option value="2">Hồ Chí Minh</option>
					<option value="3">Hà Nội</option>
					<option value="61">Các tỉnh khác tại Việt Nam</option>
				</select><!---->
				<!----></div>
			</div>
		</div>
		<div class="full">
			<span>Số lượng:</span>
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
		<div class="full">
			<div class="text-xs mb-2"><p>Đơn hàng sẽ được giao bởi một trong những đối tác của chúng tôi.</p></div>
		</div>
		<div class="full">
			<div class="text-xs" id="delivery-date" product_price="719000" style=""><h6 class="">Chọn ngày giao hàng:</h6><input type="hidden" name="delivery_date" value="">

				<div class="select-date">
					<div class="date-item"><!----><input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="2024-10-19"><div class="card-form choice uppercase grid content-center id-2024-10-19-lg"><p class="hidden sm:block xl:block">19 tháng 10</p><p class="block sm:hidden xl:hidden">19 Thg 10</p><span class="font-bold text-black text-xxs xs:text-xs sm:text-sm lg:text-xs xl:text-sm relative">Hôm nay</span></div></div>
					<div class="date-item"><!----><input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="2024-10-20"><div class="card-form choice uppercase grid content-center id-2024-10-20-lg"><p class="hidden sm:block xl:block">20 tháng 10</p><p class="block sm:hidden xl:hidden">20 Thg 10</p><span class="font-bold text-black text-xxs xs:text-xs sm:text-sm lg:text-xs xl:text-sm relative">Ngày mai</span></div></div>
					<div class="date-item"><!----><input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="2024-10-21"><div class="card-form choice uppercase grid content-center id-2024-10-21-lg"><p class="hidden sm:block xl:block">21 tháng 10</p><p class="block sm:hidden xl:hidden">21 Thg 10</p><span class="font-bold text-black text-xxs xs:text-xs sm:text-sm lg:text-xs xl:text-sm relative">thứ hai</span></div></div>
					<div class="date-item"><div id="calendar"><input type="radio" class="hidden_choice right-0 rounded-none" name="delivery_date" value="Calendar"><div class="card-form choice pb-3 sm:py-3 lg:py-2 xl:py-3 xl:px-7 grid content-center"><i class="fa fa-calendar-days text-xl xxs:text-md"></i><span class="font-bold text-black mb-2 lg:mb-1 xl:mb-2 hidden sm:block">LỊCH</span></div><div class="vc-popover-content-wrapper" placement="bottom-start"><!----></div></div>
				</div>
				</div>
				<!----></div>
		</div>
		<div class="full">
			<p>
				<h6 class="flex my-1 text-lg">Tổng: <span class="text-brand font-bold self-center ml-2 whitespace-nowrap">719,000 ₫</span></h6>
			</p>
		</div>
		<div class="grid full grid-cols-2 form-btn">

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button  btn-add-to-cart"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button btn-add-to-cart"> Mua Ngay </button>
		</div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>


	</form>
	<h1> END form </h1>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
