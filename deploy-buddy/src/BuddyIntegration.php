<?php
namespace BuddyIntegration;

class BuddyIntegration {
	public function __construct() {
		$settings = new Settings();
		new ContextHelp();

		if ( capabilities_helper( 'manual_deploy' ) ) {
			new ManualDeploy();
		}

		if ( capabilities_helper( 'automatic_deploy' ) ) {
			new AutomaticDeploy();
		}

		add_action( 'admin_menu', array( $settings, 'add_menu' ) );
	}
}
