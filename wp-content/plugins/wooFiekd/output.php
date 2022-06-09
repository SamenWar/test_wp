<?php

add_action( 'woocommerce_after_shop_loop_item', 'my_field_on_loop_show', 2 );
function my_field_on_loop_show() {
	global $product;
	echo $product->get_meta( 'data' );
	echo '<img scr="'.$product->get_meta( 'produkts_image' ).'/>';
}
add_filter( 'woocommerce_product_tabs', 'dieg_woo_remove_reviews_tab', 98 );
function dieg_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}