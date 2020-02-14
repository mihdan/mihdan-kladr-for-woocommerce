<?php
/**
 * Class Setting.
 *
 * @package mihdan-kladr-for-woocommerce
 */

namespace Mihdan\KladrForWooCommerce;

use Mihdan\WPOSA\WPOSA;

/**
 * Class Settings
 *
 * @package mihdan-kladr-for-woocommerce
 */
class Settings {
	/**
	 * WP_OSA instance.
	 *
	 * @var WPOSA $wposa
	 */
	private $wposa;

	/**
	 * Settings constructor.
	 *
	 * @param WPOSA $wposa WPOSA instance.
	 */
	public function __construct( $wposa = null ) {
		$this->wposa = $wposa;
		if ( ! $this->wposa ) {
			$this->wposa = new WPOSA();
		}

		$this->hooks();
	}

	/**
	 * Init hooks
	 */
	public function hooks() {
		add_action( 'init', [ $this, 'fields' ], 111 );
	}

	/**
	 * Add fields.
	 */
	public function fields() {
		$this->wposa->add_section(
			array(
				'id'    => 'general',
				'title' => __( 'General', 'mihdan-kladr-for-woocommerce' ),
			)
		);

		$this->wposa->add_field(
			'general',
			array(
				'id'      => 'token',
				'type'    => 'text',
				'name'    => __( 'Token', 'mihdan-kladr-for-woocommerce' ),
				'options' => array(
					'UTF-8'        => 'UTF-8',
					'KOI8-R'       => 'KOI8-R',
					'Windows-1251' => 'Windows-1251',
				),
				'default' => 'UTF-8',
			)
		);
	}
}

