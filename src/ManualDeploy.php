<?php
namespace BuddyIntegration;

class ManualDeploy {
	function __construct() {
		add_action( 'admin_bar_menu', array( $this, 'add_button' ), 999 );
		add_action( 'init', array( $this, 'initialize' ) );
	}

	function add_button( $wp_admin_bar ) {
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


	function initialize() {
		if ( capabilities_helper( 'manual_deploy' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'trigger_script' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'trigger_script' ) );
			add_action( 'wp_head', array( $this, 'topbar_button_icon_styles' ) );
			add_action( 'admin_head', array( $this, 'topbar_button_icon_styles' ) );
		}
	}

	function trigger_script() {
		if ( ! is_admin() && ! wp_script_is( 'jquery', 'done' ) ) {
			wp_enqueue_script( 'jquery' );
		}

		/*
		var link_id = "buddy_manual_gutenberg_button";

				var link_html = \'<span class="buddy_manual_deploy_button"><a id="\' + link_id + \'" class="ab-item" href="#" ><span class="ab-icon">Deploy Buddy</span></a></span>\';

				const isFullscreenMode = ( wp.data.select( "core/edit-post" ) !== null ) ? wp.data.select( "core/edit-post" ).isFeatureActive( "fullscreenMode" ) : false;

				var editorEl = document.getElementById( "editor" );
				if( !editorEl || !isFullscreenMode ){
					return;
				}

				var unsubscribe = wp.data.subscribe( function () {
					setTimeout( function () {
						if ( !document.getElementById( link_id ) ) {
							var toolbalEl = editorEl.querySelector( ".edit-post-header__toolbar" );
							if( toolbalEl instanceof HTMLElement ){
								toolbalEl.insertAdjacentHTML( "beforeend", link_html );
							}
						}
					}, 1 )
				} );
				*/
		wp_add_inline_script(
			'jquery',
			'
			jQuery( document ).ready( function() {

				jQuery( document ).on( "click", ".buddy_manual_deploy_button a, input.buddy_manual_deploy_button", function( e ) {
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
