<?php
namespace BuddyIntegration;

class ManualDeploy {
	function __construct() {
		add_action( 'admin_bar_menu', array( $this, 'deploy_button' ), 999 );
		add_action( 'init', array( $this, 'manual_deploy_initialize' ) );
	}

	function deploy_button( $wp_admin_bar ) {
		if ( capabilities_helper( 'top_bar' ) ) {
			$args = array(
				'id'    => 'buddy_manual_deploy_button',
				'title' => '<span class="ab-icon"></span>' . __( 'Deploy Buddy', Config::get( 'language_slug' ) ),
				'href'  => '#',
				'meta'  => array( 'class' => 'buddy_manual_deploy_button' ),
			);
			$wp_admin_bar->add_node( $args );
		}
	}


	function manual_deploy_initialize() {
		if ( capabilities_helper( 'manual_deploy' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'manual_trigger_script' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'manual_trigger_script' ) );
			add_action( 'wp_head', array( $this, 'topbar_button_icon_styles' ) );
			add_action( 'admin_head', array( $this, 'topbar_button_icon_styles' ) );
		}
	}

	function manual_trigger_script() {
		if ( ! is_admin() && ! wp_script_is( 'jquery', 'done' ) ) {
			wp_enqueue_script( 'jquery' );
		}
		wp_add_inline_script(
			'jquery',
			'
			jQuery( document ).ready( function() {
				jQuery( ".buddy_manual_deploy_button a, input.buddy_manual_deploy_button" ).on( "click", function( e ) {
					event.preventDefault();
					if ( confirm( " '. __( 'Are you sure that you want to trigger a deployment?', Config::get( 'language_slug' ) ) . '" ) ) {
						jQuery.ajax( {
							type: "POST",
							url: "' . Config::get( 'webhook' ) . '&comment=Manually triggered deployment",
							success: function( d ) {
								window.alert( "' . __( 'Deployment triggered succesfully.', Config::get( 'language_slug' ) ) . '" )
							}
						} )
					}
				} )
			} )
		'
		);
	}

	function topbar_button_icon_styles() {
		?>
			<style type="text/css">
				.buddy_manual_deploy_button a.ab-item .ab-icon {
					display: block;
				}

				.buddy_manual_deploy_button a.ab-item .ab-icon:before {
					content: "";
					display:inline-block;
					height: 18px;
					width: 18px;
					transform: translateY(2px);
					background-repeat: no-repeat;
					background-image: url( '<?php echo plugin_dir_url( Config::get( 'base_name' ) ); ?>assets/images/logo.svg' );
				}
			</style>
		<?php
	}
}
