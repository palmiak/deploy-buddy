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
			<li>Login to your buddy.works account.</li>
			<li>Go to your project and than select the pipeline you want to execute.</li>
			<li>Click <strong>Webhook URL</strong> in the sidebar and copy URL.</li>
			</ol>',
				Config::get( 'language_slug' )
			);

			$constants = __(
				'<p><code>buddy_webhook</code> - default: \'\' - sets the webhook</p>
			<p><code>buddy_topbar</code> - default: true - adds the deploy button to the admin bar</p>
			<p><code>buddy_manual_deploy_capabilities</code> - default: manage_options - capability that is needed to see the deploy button</p>
			<p><code>buddy_automatic_deploy</code> - default: false - turns on or off automatic deployments on post update.</p>
			<p><code>buddy_automatic_deploy_post_types</code> - default: [\'post\', \'page\'] - sets on which post types does the update triggers the auto deploy.</p>
			<p><code>buddy_automatic_deploy_capabilities</code> - default: manage_options - capability that is need to run the auto deploy. </p>
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
