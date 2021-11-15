<?php

/**
 * Product card title. Slightly modified _action_couponseek_wc_loop_product_title
 */
function cjenolovac_product_card_title() {

		global $post;

		// Product Title
		$external_url = couponseek_is_product_external_popup();

		if ( $external_url ) {
			$discount_code = (couponseek_get_field('discount_code')) ? couponseek_get_field('discount_code') : '';
			if ( $discount_code != '' ) {
				echo '<a href="' . esc_url( $external_url ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link is-show-coupon-code" data-target="#external-product-modal-' . get_the_ID() . '" data-clipboard-text="' . esc_attr($discount_code) . '"><h2 class="woocommerce-loop-product__title">' . wp_kses_post( get_the_title() ) . '</h2>';
				Cjenolovac\product_card_vendor_logo();
				echo '</a>';
			} else {
				echo '<a href="' . esc_url( $external_url ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" target="_blank"><h2 class="woocommerce-loop-product__title">' . wp_kses_post(get_the_title()) . '</h2>';
				Cjenolovac\product_card_vendor_logo();
				echo '</a>';
			}
		} else {
			echo '<a href="' . esc_url( get_the_permalink() ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><h2 class="woocommerce-loop-product__title">' . wp_kses_post( get_the_title() ) . '</h2>';
			Cjenolovac\product_card_vendor_logo();
			echo '</a>';
		}

		echo '<div class="clearfix"></div>';
}
