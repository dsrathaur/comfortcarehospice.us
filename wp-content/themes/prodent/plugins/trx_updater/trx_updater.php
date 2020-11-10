<?php


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'prodent_trx_updater_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'prodent_trx_updater_theme_setup9', 9 );
    function prodent_trx_updater_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'prodent_filter_tgmpa_required_plugins', 'prodent_trx_updater_tgmpa_required_plugins' );
        }
    }
}



// Filter to add in the required plugins list
if ( ! function_exists( 'prodent_trx_updater_tgmpa_required_plugins' ) ) {
    function prodent_trx_updater_tgmpa_required_plugins( $list = array() ) {
        if ( prodent_storage_isset( 'required_plugins', 'trx_updater' ) ) {
            $path = prodent_get_file_dir( 'plugins/trx_updater/trx_updater.zip' );
            if ( ! empty( $path ) || prodent_get_theme_setting( 'tgmpa_upload' ) ) {
                $list[] = array(
                    'name'     => prodent_storage_get_array( 'required_plugins', 'trx_updater' ),
                    'slug'     => 'trx_updater',
                    'version'  => '1.3.9',
                    'source'   => ! empty( $path ) ? $path : 'upload://trx_updater.zip',
                    'required' => false,
                );
            }
        }
        return $list;
    }
}



// Check if trx_updater installed and activated
if ( ! function_exists( 'prodent_exists_trx_updater' ) ) {
    function prodent_exists_trx_updater() {
        return function_exists( 'trx_updater_load_plugin_textdomain' );
    }
}