<?php

namespace Cjenolovac;

defined( 'ABSPATH' ) || exit;

function product_card_vendor_logo() {
	$vendor_id = \WCV_Vendors::get_vendor_from_product( get_the_ID() );

	if ( empty( $vendor_id ) ) {
		return;
	}

	$logo_id = couponseek_get_vendor_logo( $vendor_id );

	if ( empty( $logo_id ) ) {
		return;
	}

	echo wp_get_attachment_image($logo_id, 'thumbnail', false, array( 'class' => 'woocommerce-loop-product__vendor' ));
}
