<?php
/**
 * @package mihdan-kladr-for-woocommerce
 */
namespace Mihdan\KladrForWooCommerce;

class Main {
	public function __construct() {
		$this->hooks();
	}

	public function hooks() {
		//if ( is_checkout() ) {
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		//}
	}

	public function enqueue_scripts() {
		wp_enqueue_script(
			MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG,
			MIHDAN_KLADR_FOR_WOOCOMMERCE_URL . '/frontend/js/jquery.fias.min.js',
			[ 'jquery' ],
			filemtime( MIHDAN_KLADR_FOR_WOOCOMMERCE_DIR . '/frontend/js/jquery.fias.min.js' ),
			true
		);

		wp_enqueue_script(
			MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG . '-app',
			MIHDAN_KLADR_FOR_WOOCOMMERCE_URL . '/frontend/js/app.js',
			[ MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG ],
			filemtime( MIHDAN_KLADR_FOR_WOOCOMMERCE_DIR . '/frontend/js/app.js' ),
			true
		);

		wp_enqueue_style(
			MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG,
			MIHDAN_KLADR_FOR_WOOCOMMERCE_URL . '/frontend/css/jquery.fias.min.css',
			[],
			filemtime( MIHDAN_KLADR_FOR_WOOCOMMERCE_DIR . '/frontend/css/jquery.fias.min.css' )
		);
	}
}
