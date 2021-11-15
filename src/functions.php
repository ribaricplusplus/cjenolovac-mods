<?php

namespace Cjenolovac;

defined( 'ABSPATH' ) || exit;

function product_card_vendor_logo() {

	$vendor_id = WCV_Vendors::get_vendor_from_product( get_the_ID() );

	if ( empty( $vendor_id ) ) {
		return;
	}

	$logo_id = couponseek_get_vendor_logo( $vendor_id );

	echo 'Logo id:' . $logo_id;

	if ( empty( $logo_id ) ) {
		return;
	}

	echo '<a href="'. WCV_Vendors::get_vendor_shop_page( $vendor_id )  .'">'. wp_get_attachment_image($logo_id) .'</a>';
}
