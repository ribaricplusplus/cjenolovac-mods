<?php
/**
 * Plugin Name: Cjenolovac Mods
 * Description: Custom modifications to the Cjenolovac website.
 * Requires at least: 5.7
 * Requires PHP: 7.3
 * Version: 1.0.0
 * Author: Bruno Ribaric
 * Author URI: https://ribarich.me
 * Text Domain: cjenolovac-mods
 */

namespace Cjenolovac;

defined( 'ABSPATH' ) || exit;

class Cjenolovac {

	/** @var string */
	public $version = '';

	public function __construct() {
		$this->version = get_file_data( __FILE__, array( 'Version' => 'Version' ) )['Version'];

		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		if ( ! class_exists( '\\WCV_Vendors' ) ) {
			return;
		}

		if ( ! class_exists( '\\WooCommerce' ) ) {
			return;
		}

		if ( ! function_exists( 'couponseek_get_vendor_logo' ) ) {
			return;
		}

		require 'functions.php';
		require 'couponseek-overrides.php';

		add_action( 'wp_body_open', array( $this, 'replace_product_card_title' ) );
	}

	public function replace_product_card_title() {
		remove_action( 'woocommerce_shop_loop_item_title', '_action_couponseek_wc_loop_product_title' );
		add_action( 'woocommerce_shop_loop_item_title', 'cjenolovac_product_card_title' );
	}
}

new Cjenolovac();
