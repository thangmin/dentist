<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if (isset( $args['class'] )) {
 	$args['class'] = str_replace("button", "btn", $args['class']);
}
if( $product->is_type( 'grouped' ) || $product->is_type( 'variable' ) || (! $product->managing_stock() && ! $product->is_in_stock())){

	echo apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a href="%s" data-quantity="%s" class="%s btn btn-c1 btn-flat">%s
			</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ?  $args['class'] : 'btn' ),
			esc_html( $product->add_to_cart_text() )
		),
	$product, $args );
} else {
	echo apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a href="%s" data-quantity="%s" class="%s btn-download icon-right btn btn-c1 btn-flat">%s
			<span class="orionicon orionicon-icon_cart"></span>
			<span class="btn-visited orionicon orionicon-icon_check"></span>
			</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity']  : 1 ),
			esc_attr( isset( $args['class'] ) ?  $args['class'] : 'btn' ),
			esc_html( $product->add_to_cart_text() )
		),
	$product );
}
