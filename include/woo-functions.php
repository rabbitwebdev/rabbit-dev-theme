<?php



function add_container_shop_loop(){
echo '<div class="container">';
}
add_action( 'woocommerce_before_shop_loop', 'add_container_shop_loop');

function close_container_shop_loop(){
echo '</div>';
}
add_action( 'woocommerce_after_shop_loop', 'close_container_shop_loop');




function add_container_product_loop(){
echo '<div class="container pt-10 pb-10">';
echo '<div class="product-wrp d-flex">';
}
add_action( 'woocommerce_before_single_product_summary', 'add_container_product_loop');

add_action( 'woocommerce_before_add_to_cart_button', 'woocommerce_template_single_price', 30 );

function close_container_product_loop(){
echo '</div>';
echo '</div>';
}
add_action( 'woocommerce_after_single_product_summary', 'close_container_product_loop');


function rb_before_product(){
echo '<div class="rb-product bg-primary theme-light text-white">';
}

add_action( 'woocommerce_before_single_product', 'rb_before_product' );

function rb_after_product(){
echo '</div>';
echo '</div>';
}

add_action( 'woocommerce_after_single_product', 'rb_after_product' );

/**
 * @snippet       Hide Fields if Virtual @ WooCommerce Checkout
 * @how-to        businessbloomer.com/woocommerce-customization
 * @author        Rodolfo Melogli, Business Bloomer
 * @compatible    WooCommerce 8
 * @community     https://businessbloomer.com/club/
 */
 
add_filter( 'woocommerce_checkout_fields', 'bbloomer_simplify_checkout_virtual' );
  
function bbloomer_simplify_checkout_virtual( $fields ) {
   $only_virtual = true;
   foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      // Check if there are non-virtual products
      if ( ! $cart_item['data']->is_virtual() ) $only_virtual = false;
   }
   if ( $only_virtual ) {
      unset($fields['billing']['billing_company']);
      unset($fields['billing']['billing_address_1']);
      unset($fields['billing']['billing_address_2']);
      unset($fields['billing']['billing_city']);
      unset($fields['billing']['billing_postcode']);
      unset($fields['billing']['billing_country']);
      unset($fields['billing']['billing_state']);
      unset($fields['billing']['billing_phone']);
      add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
   }
   return $fields;
}

// REMOVE SALE BADGE FROM ITS ORIGINAL POSITION
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
 
// ADD SALE BADGE HTML BESIDE PRICE
add_filter( 'woocommerce_get_price_suffix', 'bbloomer_add_price_suffix_sale', 9999, 4 );
   
function bbloomer_add_price_suffix_sale( $html, $product, $price, $qty ) {
    if ( ! is_admin() && is_object( $product ) && $product->is_on_sale() ) {
      $html .= wc_get_template_html( 'single-product/sale-flash.php' );
    }
    return $html;
}

function woo_bunny_img_wrp_before() {
echo '<div class="bunny-after-img-wrp">';
}
add_action( 'woocommerce_product_thumbnails', 'woo_bunny_img_wrp_before', 20 );

add_action( 'woocommerce_product_thumbnails', 'woocommerce_simple_add_to_cart', 20 );
function woo_bunny_img_wrp_after() {
echo '</div>';
}
add_action( 'woocommerce_product_thumbnails', 'woo_bunny_img_wrp_after', 20 );


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_product_additional_information', 'wc_display_product_attributes', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );