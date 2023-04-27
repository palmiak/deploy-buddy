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
				'title' => '<span class="ab-icon"></span>' . __( 'Trigger Deployment', Config::get( 'language_slug' ) ),
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
				} );

				var link_html = \'<span class="buddy_manual_deploy_button"><a id="buddy_manual_gutenberg_button" class="components-button is-primary" href="#">Trigger Deployment</a></span>\';

				var editorEl = document.getElementById( "editor" );
				if( !editorEl ){
					return;
				}

				var unsubscribe = wp.data.subscribe( function () {
					setTimeout( function () {
						if ( !document.getElementById( "buddy_manual_gutenberg_button" ) ) {
							var toolbalEl = editorEl.querySelector( ".edit-post-header__toolbar" );
							if( toolbalEl instanceof HTMLElement ){
								toolbalEl.insertAdjacentHTML( "beforeend", link_html );
							}
						}
					}, 1 )
				} );
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

				#buddy_manual_gutenberg_button {
					background-repeat: no-repeat;
					background-image: url( '<?php echo plugin_dir_url( Config::get( 'base_name' ) ); ?>assets/images/logo.svg' );
					background-size: 18px;
					background-position-y: center;
					padding-left: 35px;
					background-position-x: 10px;
					background-color: #1A86FD;
					margin-right: 12px;
				}

				#buddy_manual_gutenberg_button:hover {
					background-color: #004DFF;
				}
			</style>
		<?php
	}
}
