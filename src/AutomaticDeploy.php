<?php
namespace BuddyIntegration;

class AutomaticDeploy {
	function __construct() {
		add_action( 'transition_post_status', array( $this, 'initialize' ), 10, 3 );
	}

	function initialize( $new_status, $old_status, $post ) {
		if ( $this->check_post_type( $post ) && $this->check_post_status( $new_status, $old_status, $post ) ) {
			$this->maybe_deploy( $post );
		}
	}

	function check_post_type( $post ) {
		return in_array( $post->post_type, Config::get( 'automatic_deploy_post_types' ), true ) ? true : false;
	}

	function check_post_status( $new_status, $old_status, $post ) {
		if ( 'auto-draft' === $post->post_status || wp_is_post_revision( $post->ID ) ) {
			return false;
		}

		if ( 'publish' === $new_status || ( 'publish' !== $new_status && 'publish' === $old_status ) ) {
			return true;
		}

		return false;

	}

	function maybe_deploy( $post ) {
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
			$this->deploy( $post );
			set_transient( 'buddy_updater_flag', 'done', 10 );
		} else {
			if ( false === get_transient( 'buddy_updater_flag' ) ) {
				$this->deploy( $post );
			}
		}
	}
	function deploy( $post ) {
		$response = wp_remote_post( Config::get( 'webhook' ) . '&comment=' . $post->post_title . ' was updated' );
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			\error_log( $error_message );
		}
	}
}
