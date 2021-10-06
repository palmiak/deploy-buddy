<?php
/**
 * Plugin Name: Deploy Buddy
 * Description: Seamlessly trigger Buddy.works deploys from WordPress
 * Author: Buddy.Works, Maciek Palmowski
 * Version: 1.3.0
 * Author URI: https://buddy.works/
 * Text-domain: buddy_deploy
 * GitHub Plugin URI: palmiak/deploy-buddy
 * Release Asset: true
 */

namespace BuddyIntegration;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

Config::init(
	array(
		'version'                       => '1.3.0',
		'file_path'                     => __FILE__,
		'dir'                           => __DIR__,
		'base_name'                     => plugin_basename( __FILE__ ),
		'plugin_url'                    => plugin_dir_url( __FILE__ ),
		'slug'                          => 'deploy-buddy',
		'language_slug'                 => 'deploy-buddy',
		'name'                          => 'Deploy Buddy',
		'shortname'                     => 'Deploy Buddy',
		'utm'                           => 'https://buddy.works/?utm_medium=referral&utm_campaign=deploy_buddy_plugin',
		'settings_version'              => get_option( 'buddy_options_version' ),
		'webhook'                       => options_helper( 'buddy_webhook', false ),
		'add_to_topbar'                 => options_helper( 'buddy_topbar', 'on', true ),
		'manual_deploy_capabilities'    => options_helper( 'buddy_manual_deploy_capabilities', 'manage_options' ),
		'manual_deploy'                 => options_helper( 'buddy_manual_deploy', 'on', true ),
		'automatic_deploy'              => options_helper( 'buddy_automatic_deploy', 'off', true ),
		'automatic_deploy_post_types'   => options_helper( 'buddy_automatic_deploy_post_types', array( 'post', 'page' ) ),
		'automatic_deploy_capabilities' => options_helper( 'buddy_automatic_deploy_capabilities', 'manage_options' ),
		'capabilities_options'          => options_helper( 'buddy_capabilities_options', 'manage_options' ),
	)
);

add_action( 'init', __NAMESPACE__ . '\\load_text_domain', 10, 0 );

if ( ! requirements_met() ) {
	add_action( 'admin_notices', __NAMESPACE__ . '\\print_requirements_notice', 0, 0 );
}
register_activation_hook( __FILE__, __NAMESPACE__ . '\\activate' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\deactivate' );
register_uninstall_hook( __FILE__, __NAMESPACE__ . '\\uninstall' );
add_action( 'plugins_loaded', __NAMESPACE__ . '\\boot', 10, 0 );
