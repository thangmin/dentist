<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_before_cart' ); ?>

<div class="row">
	<div class="col-md-8 cart-content-table">

		<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
			<thead class="text-uppercase font-2">
				<tr>
					<th class="product-thumbnail">&nbsp;</th>
					<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
					<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
					<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
					<th class="product-subtotal"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<td class="product-thumbnail">
								<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

									if ( ! $product_permalink ) {
										echo wp_kses_post($thumbnail);
									} else {
										printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post($thumbnail) );
									}
								?>
							</td>

							<td class="product-name strong" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
								<?php
									if ( ! $product_permalink ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;');
									} else {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="orion-product-title" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key ));
									}

									if (!empty( $cart_item['variation'] )) : ?> 
										<div class="orion-woo-atts clearfix">
										<?php foreach ($cart_item['variation'] as $key => $value) : ?>
										<span class="orion-woo-att">
											<?php echo esc_html($value);?>
										</span>
										<?php endforeach;?>
										</div>
									<?php endif;?>

									<div class="hidden-lg hidden-md hidden-sm product-price font-2" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
										<?php
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ));
										?>
									</div>	
							<?php								
									
									// Backorder notification
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
									}
								?>
								<?php do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );?>
							</td>
							
							<td class="product-price font-1" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									// PHPCS: XSS ok.
								?>
							</td>

							<td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
								<div class="flex-wrap">
									<div class="orion-cart-quantity">
									
									<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input( array(
												'input_name'  => "cart[{$cart_item_key}][qty]",
												'input_value' => $cart_item['quantity'],
												'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
												'min_value'   => '0'
											), $_product, false );
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
									?>
									</div>

									<div class="product-remove">
										<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="remove black-hover" title="%s" data-product_id="%s" data-product_sku="%s"><i class="orionicon orionicon-icon_close"></i></a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );
										?>
									</div>
								</div>									
							</td>

							<td class="product-subtotal font-1" data-title="<?php esc_html_e( 'Total', 'woocommerce' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
									// PHPCS: XSS ok.
								?>
							</td>
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-sm-12 update-cart-btn icon-right text-right">
				<button type="submit" class="btn btn-empty btn-md btn-black" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>"> 
					<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>
					<i class="orionicon orionicon-refresh"></i> </button>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>
			<div class="col-sm-12">

				<?php if ( wc_coupons_enabled() ) { ?> 
					<div class="coupon row">
						<div class="col-sm-8 actions">

						 <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
						 </div>
						<div class="col-sm-4">
						  <button type="submit" class="btn btn-md btn-flat btn-white btn-block block" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"> 
						  	<?php esc_attr_e( 'Apply Coupon', 'woocommerce' ); ?>
						  	</button>
						</div>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
				<?php } ?>
			</div>

		</div>

		<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</form>
		<div class="cart-collaterals">
			<?php woocommerce_shipping_calculator(); ?>
		</div>		
	</div>

	<?php 
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
	add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 20 );
	?>
		<?php do_action( 'woocommerce_cart_collaterals' ); ?>

</div>
<?php do_action( 'woocommerce_after_cart' ); ?>
