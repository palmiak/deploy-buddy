<?php
namespace BuddyIntegration;

function load_text_domain() {
	load_plugin_textdomain( Config::get( 'language_slug' ), false, dirname( Config::get( 'base_name' ) ) . '/languages' );
}

/**
 * @return void
 */
function activate() {
	// Run database migrations, initialize WordPress options etc.
}

/**
 * @return void
 */
function deactivate() {
	 // Do something related to deactivation.
}

/**
 * @return void
 */
function uninstall() {
	// Remove custom database tables, WordPress options etc.
}

/**
 * @return void
 */
function print_requirements_notice() {     // phpcs:ignore Squiz.PHP.DiscouragedFunctions.Discouraged
	error_log( 'Deploy Buddy requirements are not met. Please read the Installation instructions.' );

	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	printf(
		'<div class="notice notice-error"><p>%1$s <a href="%2$s">%3$s</a> %4$s</p></div>',
		esc_html__( 'Webhook not set! Please set it in', Config::get( 'language_slug' ) ),
		esc_url( 'tools.php?page=deploy-buddy&tab=configuration' ),
		esc_html__( 'the Configuration Tab', Config::get( 'language_slug' ) ),
		esc_html__( '.', Config::get( 'language_slug' ) )
	);
}

/**
 * Start!
 *
 * @return void
 */
function boot() {
	new BuddyIntegration();
}

function requirements_met() {
	return ( options_helper( 'buddy_webhook', false ) !== false ) ? true : false;
}

function capabilities_helper( $type ) {
	if ( function_exists( 'BuddyIntegration\\' . $type ) ) {
		return call_user_func( 'BuddyIntegration\\' . $type );
	}

	return false;
}

function top_bar() {
	return is_admin_bar_showing() && ! empty( Config::get( 'webhook' ) ) && Config::get( 'manual_deploy' ) && Config::get( 'add_to_topbar' ) && current_user_can( Config::get( 'manual_deploy_capabilities' ) );
}

function manual_deploy() {
	return ! empty( Config::get( 'webhook' ) ) && Config::get( 'manual_deploy' ) && current_user_can( Config::get( 'manual_deploy_capabilities' ) );
}

function automatic_deploy() {
	return ! empty( Config::get( 'webhook' ) ) && Config::get( 'automatic_deploy' ) && ! empty( Config::get( 'automatic_deploy_post_types' ) ) && current_user_can( Config::get( 'automatic_deploy_capabilities' ) );
}

function edit_options() {
	return current_user_can( Config::get( 'capabilities_options' ) );
}

function options_helper( $key_name, $default, $is_checkbox = false ) {
	// seperate checkbox part is needed because of how CMB2 handles checkboxes - in a bit strange way.
	if ( $is_checkbox ) {
		if ( defined( $key_name ) ) {
			return constant( $key_name );
		} else {
			$option = isset( get_option( 'options-page' )[ $key_name ] );

			if ( $option ) {
				$option = get_option( 'options-page' )[ $key_name ];
			} else {
				$option = $default;
			}

			return 'on' === $option ? true : false;
		}
	} else {
		if ( defined( $key_name ) ) {
			return constant( $key_name );
		} elseif ( isset( get_option( 'options-page' )[ $key_name ] ) && ! empty( get_option( 'options-page' )[ $key_name ] ) ) {
			return get_option( 'options-page' )[ $key_name ];
		} else {
			return $default;
		}
	}


}
