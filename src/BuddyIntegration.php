<?php
namespace BuddyIntegration;

class BuddyIntegration {
	public function __construct() {
		$settings = new Settings();

		if ( Config::get( 'manual_deploy' ) && current_user_can( Config::get( 'capabilities' ) ) ) {
			new ManualDeploy();
		}

		add_action( 'admin_menu', array( $settings, 'add_menu' ) );
	}
}
