<?php
/* Elegro Crypto Payment support functions
------------------------------------------------------------------------------- */
// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'prodent_elegro_payment_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'prodent_elegro_payment_theme_setup9', 9 );
	function prodent_elegro_payment_theme_setup9() {
		if ( prodent_exists_elegro_payment() ) {
			add_filter( 'prodent_filter_merge_styles', 'prodent_elegro_payment_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'prodent_filter_tgmpa_required_plugins', 'prodent_elegro_payment_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'prodent_elegro_payment_tgmpa_required_plugins' ) ) {
	function prodent_elegro_payment_tgmpa_required_plugins( $list = array() ) {
            if (prodent_storage_isset('required_plugins', 'elegro-payment')) {
			$list[] = array(
                'name' 		=> esc_html__('Elegro Crypto Payment', 'prodent'),
				'slug'     => 'elegro-payment',
				'required' => false,
			);
		}
		return $list;
	}
}


// Check if this plugin installed and activated
if ( ! function_exists( 'prodent_exists_elegro_payment' ) ) {
	function prodent_exists_elegro_payment() {
		return class_exists( 'WC_Elegro_Payment' );
	}
}

// Merge custom styles
if ( ! function_exists( 'prodent_elegro_payment_merge_styles' ) ) {
	function prodent_elegro_payment_merge_styles( $list ) {
		$list[] = 'plugins/elegro-payment/elegro-payment.css';
		return $list;
	}
}