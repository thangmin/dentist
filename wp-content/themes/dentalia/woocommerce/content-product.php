<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>
<?php 	
	// retrieve number of columns - works with shortcodes and on shop pages
	$product_number = wc_get_loop_prop('columns'); 
	$orion_product_class = 'col-lg-4 col-sm-6';
	

	if (isset($product_number) && is_integer($product_number)) {
		switch ($product_number) {
			case 2:
				$orion_product_class = 'col-lg-6';
				break;
			case 3:
				$orion_product_class = 'col-lg-4 col-sm-6';
		        break;        
		    case 4:
		    	$orion_product_class = 'col-lg-3 col-sm-6';
		    	break;
		    case 5:
		    	$orion_product_class = 'lg-5-per-row col-sm-6';
		    	break;		    	
		    case 6:
		    	$orion_product_class = 'col-lg-2 col-md-4 col-sm-6';
		    	break;	
			default:
				$orion_product_class = 'col-lg-3 col-sm-6';
				break;
		}
	}
?>


<li <?php wc_product_class( $orion_product_class, $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 8 );	

	add_action( 'woocommerce_before_shop_loop_item', 'orion_woocommerce_template_loop_product_header_open', 9 );

	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);	
	do_action( 'woocommerce_before_shop_loop_item_title' );


	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 */
	add_action( 'woocommerce_shop_loop_item_title', 'orion_close_product_link', 6 );
	
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 7 );
	add_action( 'woocommerce_shop_loop_item_title', 'orion_close_product_header', 8 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 9 );
	/**
	 * @hooked woocommerce_template_loop_product_title - 10
	 */

	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close',11 );

	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 *  Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */

	add_action('woocommerce_after_shop_loop_item_title','orion_woo_product_content_close',12);
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	/* left for customisation directions */
	// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	// do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li> 
