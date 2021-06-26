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
		esc_html__( 'Webhook not set! Please read', Config::get( 'language_slug' ) ),
		esc_url( 'admin.php?page=' . Config::get( 'slug' ) ),
		esc_html__( 'the Installation instructions', Config::get( 'language_slug' ) ),
		esc_html__( 'on how to setup the plugin.', Config::get( 'language_slug' ) )
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
	return defined( 'buddy_webhook' ) ? true : false;
}

function capabilities_helper( $type ) {
	$sets = array(
		'top_bar'       => is_admin_bar_showing() && ! empty( Config::get( 'webhook' ) ) && Config::get( 'manual_deploy' ) && current_user_can( Config::get( 'capabilities' ) ),
		'manual_deploy' => ! empty( Config::get( 'webhook' ) ) && Config::get( 'manual_deploy' ) && current_user_can( Config::get( 'capabilities' ) ),
	);

	return isset( $sets[ $type ] ) ? $sets[ $type ] : false;
}


