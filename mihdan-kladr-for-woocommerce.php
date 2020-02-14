<?php
/**
 * Plugin Name: Mihdan: KLADR For WooCommerce
 * Description: ФИАС, КЛАДР в облаке
 * Version: 0.1
 *
 * @package mihdan-kladr-for-woocommerce
 */
namespace Mihdan\KladrForWooCommerce;

define( 'MIHDAN_KLADR_FOR_WOOCOMMERCE_VERSION', '0.1' );
define( 'MIHDAN_KLADR_FOR_WOOCOMMERCE_FILE', __FILE__ );
define( 'MIHDAN_KLADR_FOR_WOOCOMMERCE_DIR', __DIR__ );
define( 'MIHDAN_KLADR_FOR_WOOCOMMERCE_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'MIHDAN_KLADR_FOR_WOOCOMMERCE_SLUG', 'mihdan-kladr-for-woocommerce' );

require_once MIHDAN_KLADR_FOR_WOOCOMMERCE_DIR . '/vendor/autoload.php';

new Main();