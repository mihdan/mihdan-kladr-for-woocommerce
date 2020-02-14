<?php
/**
 * Class Main.
 *
 * @package mihdan-kladr-for-woocommerce
 */

namespace Mihdan\KladrForWooCommerce;

use \WPTRT\AdminNotices\Notices;
use \Mihdan\WPOSA\WPOSA;

/**
 * Class Main
 *
 * @package Mihdan\KladrForWooCommerce
 */
class Main {
	/**
	 * WP_OSA instance.
	 *
	 * @var WPOSA $wposa
	 */
	private $wposa;

	/**
	 * WP_OSA instance.
	 *
	 * @var Notices $wprtr
	 */
	private $wprtr;

	/**
	 * Main constructor.
	 *
	 * @param WPOSA   $wposa WP_OSA instance.
	 * @param Notices $wprtr Notices instance.
	 */
	public function __construct( $wposa = null, $wprtr = null ) {
		$this->wposa = $wposa;
		if ( ! $this->wposa ) {
			$this->wposa = new WPOSA();
		}

		$this->wprtr = $wprtr;
		if ( ! $this->wprtr ) {
			$this->wprtr = new Notices();
		}

		if ( ! $this->requirements() ) {
			return;
		}
		$this->hooks();
	}

	/**
	 * Hooks init.
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Check requirements.
	 */
	public function requirements() {
		if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {

			$this->wprtr->add(
				MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG,
				'',
				__( 'Для правильной работы плагина <strong>Mihdan: KLADR For WooCommerce</strong> необходимо установить и активировать <strong>WooCommerce</strong>.', 'mihdan-kladr-for-woocommerce' ),
				[
					'type' => 'error',
				]
			);

			$this->wprtr->boot();

			return false;
		}

		return true;
	}

	/**
	 * Enqueue plugin requirements.
	 */
	public function enqueue_scripts() {
		if ( ! is_checkout() ) {
			return;
		}

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

		wp_localize_script(
			MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG,
			'jQuery_fias',
			[
				'token' => '',
				'url'   => 'https://kladr-api.com/api.php',
			]
		);

		wp_enqueue_style(
			MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG,
			MIHDAN_KLADR_FOR_WOOCOMMERCE_URL . '/frontend/css/jquery.fias.min.css',
			[],
			filemtime( MIHDAN_KLADR_FOR_WOOCOMMERCE_DIR . '/frontend/css/jquery.fias.min.css' )
		);
	}
}
