<?php

namespace BuddyIntegration;

final class ContextHelp {
    function __construct() {
        add_action( 'admin_head', array( $this, 'add_context_menu_help' ) );
    }

	function add_context_menu_help() {
		// get the current screen object
		$current_screen = get_current_screen();

		if ( 'tools_page_deploy-buddy' === $current_screen->base ) {
			// content for help tab
			$webhook = __(
				'<ol>
			<li>Sign in to your <a href="http://buddy.works" target="_blank">Buddy</a> account.</li>
			<li>Go to your project and select the pipeline you want to execute using the plugin.</li>
			<li>Click <strong>Webhook URL</strong> in the sidebar and copy the URL.</li>
			</ol>',
				Config::get( 'language_slug' )
			);

			$constants = __(
				'<ul>
				<li><code>buddy_webhook</code> - default: <code>\'\'</code> - adds the webhook url</li>
				<li><code>buddy_manual_deploy</code> - default: <code>true</code> - enables or disables manual deployments</li>
				<li><code>buddy_topbar</code> - default: <code>true</code> - adds the deploy button to the admin bar</li>
				<li><code>buddy_manual_deploy_capabilities</code> - default: <code>manage_options</code> - capability required to see the deploy button</li>
				<li><code>buddy_capabilities_options</code> - default: <code>manage_options</code> - capability required to view options panel</li>
				<li><code>buddy_automatic_deploy</code> - default: <code>false</code> - enables or disables automatic deployments</li>
				<li><code>buddy_automatic_deploy_post_types</code> - default: <code>[\'post\', \'page\']</code> - post types which trigger automatic deployments</li>
				<li><code>buddy_automatic_deploy_capabilities</code> - default: <code>manage_options</code> - capability required to trigger automatic deployments</li>
				</ul>
			',
				Config::get( 'language_slug' )
			);
			// register primary help tab
			$current_screen->add_help_tab(
				array(
					'id'      => 'buddy_get_webhook',
					'title'   => __( 'Get your webhook', Config::get( 'language_slug' ) ),
					'content' => $webhook,
				)
			);
			// register secondary help tab
			$current_screen->add_help_tab(
				array(
					'id'      => 'buddy_available_constants',
					'title'   => __( 'Available constants', Config::get( 'language_slug' ) ),
					'content' => $constants,
				)
			);
		}
	}
}
