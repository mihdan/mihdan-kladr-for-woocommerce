jQuery( function ( $ ) {
	'use strict';

	/**
	 * Город.
	 */
	$( '#billing_city' ).fias( {
		type: $.fias.type.city
	} );

	/**
	 * Индекс.
	 */
	$( '#billing_postcode' ).fiasZip( 'form.woocommerce-checkout', function ( obj ) {
		console.log( obj );
	} );

	/**
	 * Адрес.
	 */
	$( '#billing_address_1' ).fias( {
		type: $.fias.type.street,
		parentType: 'street',
		parentId: 'billing_city'
	} );

	/**
	 * Адрес.
	 */
	$( '#billing_address_2' ).fias( {
		type: $.fias.type.building,
		parentType: 'street',
		//parentId: 'billing_city'
	} );
});