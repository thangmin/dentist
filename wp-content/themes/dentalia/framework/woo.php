<?php 

// remove unnecesery page title 
function orion_remove_title() {
    return false;
}
add_filter( 'woocommerce_show_page_title', 'orion_remove_title' );


/* WOO Cart Update (ajax ) */
add_filter( 'woocommerce_add_to_cart_fragments', 'orion_woocommerce_header_add_to_cart_fragment' );
function orion_woocommerce_header_add_to_cart_fragment( $fragments ) {

    ob_start();?>
    
    <div class="cart-contents">

        <?php if (WC()->cart->get_cart_contents_count() != '0'){
            echo '<span class="cart-quantity">' . WC()->cart->get_cart_contents_count() .'</span>';
        }?>
    </div> 

    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}

// woo product listenings override
function woocommerce_template_loop_product_title() {
    echo '<h2 class="h5 orion-product-title">' . get_the_title() . '</h2>';
}
// woo subcategories listenings override
function woocommerce_template_loop_category_title($category) {
    echo '<h2 class="h5 orion-product-title product-cats">';
    echo esc_html($category->name);

    if ( $category->count > 0 ) {
        echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">(' . $category->count . ')</span>', $category );
    }
    // echo get_the_title();

    echo '</h2>';
}
/**
 * Insert the opening anchor tag for products in the loop.
 */
function orion_woocommerce_template_loop_product_header_open() {
    echo '<div class="woo-header overflow-hidden clearfix">';
}
/**
 * Insert the opening anchor tag for products in the loop.
 */

function orion_close_product_link() { ?>
    </a>
<?php }

function orion_close_product_header() { ?>
    </div><div class="woo-content clearfix">
<?php }

function orion_woo_product_content_close() { ?>
    </div>
<?php }

if(!function_exists('orion_woo_products_per_page')) {
    function orion_woo_products_per_page($args) {
        $products_per_page = orion_get_option('woo_products_per_page', false, 12);
        return $products_per_page;
    }
}
add_filter( 'loop_shop_per_page', 'orion_woo_products_per_page', 20 );

/* apply select styling */
function orion_filter_woocommerce_dropdown_variation_attribute_options_html( $html, $args ) { 
    $output = '<div class="orion-select">';
    $output .= $html;
    $output .= '</div>';
    return $output; 
}; 
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'orion_filter_woocommerce_dropdown_variation_attribute_options_html', 10, 2 ); 
function orion_woocommerce_template_loop_add_to_cart_small( $args = array() ) {
    global $product;

    if ( $product ) {
        $defaults = array(
            'quantity' => 1,
            'class'    => implode( ' ', array_filter( array(
                    'button',
                    'product_type_' . $product->get_type(),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                    $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
            ) ) ),
        );

        $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

        wc_get_template( 'loop/add-to-cart-small.php', $args );
    }
}


/* enable page builder content in the shop page */
function woocommerce_product_archive_description() {
    // Don't display the description on search results page
    if ( is_search() ) {
        return;
    }

    if ( is_post_type_archive( 'product' ) && 0 === absint( get_query_var( 'paged' ) ) ) {
        $shop_page   = get_post( wc_get_page_id( 'shop' ) );
        if ( $shop_page ) {
            $page_data = get_page( $shop_page );
            $page_id = $page_data->ID;      
            $panels_data = get_post_meta($page_id, 'panels_data', true); 
            if( $panels_data != '') {
                ?><div class="page-description">
                    <?php if (function_exists( 'siteorigin_panels_render' )) {
                        echo siteorigin_panels_render( $page_id ); 
                    }
                    ?>
                </div><?php 
            } else {
                $description = wc_format_content( $shop_page->post_content );
                if ( $description ) {
                    echo '<div class="page-description">' . $description . '</div>';
                }                
            }
        }
    }
}
/* Woocommerce image sizes */
add_filter( 'single_product_archive_thumbnail_size', function( $size ) {
    return 'orion_square';
} );
add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
    return 'orion_square';
} );
add_filter( 'woocommerce_gallery_image_size', function( $size ) {
    return 'full';
} );
add_filter( 'subcategory_archive_thumbnail_size', function( $size ) {
    return 'orion_square';
} );



/* Related */
if(!function_exists('orion_related_columns')) {
    function orion_related_columns($args) {
        return 4;
    }
}
add_filter( 'woocommerce_related_products_columns', 'orion_related_columns' );

/* Cross-sells */
if(!function_exists('orion_crossell_columns')) {
    function orion_crossell_columns($args) {
        return 4;
    }
}
add_filter( 'woocommerce_cross_sells_columns', 'orion_crossell_columns' );
add_filter( 'woocommerce_cross_sells_total', 'orion_crossell_columns' );


/* Up-sells */
if(!function_exists('orion_upsell_columns')) {
    function orion_upsell_columns($args) {
        return 4;
    }
}
add_filter( 'woocommerce_upsell_sells_columns', 'orion_upsell_columns' );

/* To display number of columns dynamicly, we could also check the customizer setting like this: get_option( 'woocommerce_catalog_columns', 4 ); */

