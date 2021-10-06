<?php

namespace BuddyIntegration;

final class Settings {

	var $capabilities;

	function __construct() {
		if ( isset( $_GET['page'] ) && $_GET['page'] === Config::get( 'slug' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'include_styles' ) );
		}
		add_action( 'init', array( $this, 'plugin_register_settings' ), 10 );
		add_action( 'admin_enqueue_scripts', array( $this, 'plugin_admin_scripts' ), 10 );
	}

	function plugin_register_settings() {
		register_setting(
			'buddy_plugin_settings',
			'buddy_webhook',
			array(
				'default'      => '',
				'show_in_rest' => true,
				'type'         => 'string',
			)
		);

		register_setting(
			'buddy_plugin_settings',
			'buddy_manual_deploy',
			array(
				'default'      => true,
				'show_in_rest' => true,
				'type'         => 'boolean',
			)
		);

		register_setting(
			'buddy_plugin_settings',
			'buddy_manual_deploy_capabilities',
			array(
				'default'      => 'manage_options',
				'show_in_rest' => true,
				'type'         => 'string',
			)
		);

		register_setting(
			'buddy_plugin_settings',
			'buddy_topbar',
			array(
				'default'      => true,
				'show_in_rest' => true,
				'type'         => 'boolean',
			)
		);

		register_setting(
			'buddy_plugin_settings',
			'buddy_automatic_deploy',
			array(
				'default'      => false,
				'show_in_rest' => true,
				'type'         => 'boolean',
			)
		);

		register_setting(
			'buddy_plugin_settings',
			'buddy_automatic_deploy_post_types',
			array(
				'default'      => array( 'post', 'page' ),
				'show_in_rest' => array(
					'schema' => array(
						'type'  => 'array',
						'items' => array(
							'type' => 'string',
						),
					),
				),
			)
		);

		register_setting(
			'buddy_plugin_settings',
			'buddy_automatic_deploy_capabilities',
			array(
				'default'      => 'manage_options',
				'show_in_rest' => true,
				'type'         => 'string',
			)
		);

	}

	function plugin_admin_scripts() {
		$dir = Config::get( 'dir' );

		$script_asset_path = "$dir/build/admin.asset.php";

		$admin_js     = 'build/admin.js';
		$script_asset = require $script_asset_path;

		wp_register_script(
			'buddy_deploy_admin_options',
			plugins_url( $admin_js, Config::get( 'file_path' ) ),
			$script_asset['dependencies'],
			$script_asset['version']
		);

		wp_localize_script(
			'buddy_deploy_admin_options',
			'buddy_vars',
			array(
				'roles'                              => $this->roles_helper(),
				'postTypes'                          => $this->post_type_helper(),
				'definedWebhook'                     => defined( 'buddy_webhook' ),
				'definedTopBar'                      => defined( 'buddy_topbar' ),
				'definedManualDeployCapabilities'    => defined( 'buddy_manual_deploy_capabilities' ),
				'definedManualDeploy'                => defined( 'buddy_manual_deploy' ),
				'definedAutomaticDeploy'             => defined( 'buddy_automatic_deploy' ),
				'definedAutomaticDeployPostTypes'    => defined( 'buddy_automatic_deploy_post_types' ),
				'definedAutomaticDeployCapabilities' => defined( 'buddy_automatic_deploy_capabilities' ),
				'languageSlug'                       => Config::get( 'language_slug' ),
			),
		);

		wp_enqueue_script( 'buddy_deploy_admin_options' );

		$admin_css = 'build/admin.css';
		wp_enqueue_style(
			'buddy_deploy_admin_options',
			plugins_url( $admin_css, Config::get( 'file_path' ) ),
			array( 'wp-components' ),
			filemtime( "$dir/$admin_css" )
		);
	}

	/**
	 * Add the top level menu page.
	 */
	function add_menu() {
		add_submenu_page(
			'tools.php',
			Config::get( 'name' ) . ' - Options',
			Config::get( 'shortname' ),
			Config::get( 'capabilities_options' ),
			Config::get( 'slug' ),
			array( $this, 'options_page_html' )
		);
	}

	function include_styles() {
		wp_enqueue_style( 'buddy_admin', Config::get( 'plugin_url' ) . 'assets/css/admin.css', array(), Config::get( 'version' ) );
	}

	function options_page_html() {
		$default_tab = null;
		$tab         = isset( $_GET['tab'] ) ? $_GET['tab'] : $default_tab;

		?>
		<?php
			include Config::get( 'dir' ) . '/templates/header.php';
		?>
		<div class="wrap">
			<nav class="nav-tab-wrapper">
				<a href="?page=<?php echo Config::get( 'slug' ); ?>" class="nav-tab
					<?php
					if ( null === $tab ) :
						?>
					nav-tab-active<?php endif; ?>"><?php _e( 'Manual Deploy', Config::get( 'language_slug' ) ); ?></a>
				<a href="?page=<?php echo Config::get( 'slug' ); ?>&tab=automatic_deploy" class="nav-tab
					<?php
					if ( 'automatic_deploy' === $tab ) :
						?>
					nav-tab-active<?php endif; ?>"><?php _e( 'Automatic Deploy', Config::get( 'language_slug' ) ); ?></a>
				<a href="?page=<?php echo Config::get( 'slug' ); ?>&tab=settings" class="nav-tab
					<?php
					if ( 'settings' === $tab ) :
						?>
					nav-tab-active<?php endif; ?>"><?php _e( 'Settings', Config::get( 'language_slug' ) ); ?></a>
			</nav>

			<div class="tabs-content">
				<?php
				switch ( $tab ) :
					case 'automatic_deploy':
						include Config::get( 'dir' ) . '/templates/automatic_deploy.php';
						break;
					case 'settings':
						echo '<div id="buddy-options-wrapper"></div>';
						break;
					default:
						include Config::get( 'dir' ) . '/templates/manual_deploy.php';
						break;
				endswitch;
				?>
			</div>
		</div>
		<?php
			include Config::get( 'dir' ) . '/templates/footer.php';
		?>
		<?php
	}

	function roles_helper() {
		if ( ! function_exists( '\get_editable_roles' ) ) {
			require_once ABSPATH . 'wp-admin/includes/user.php';
		}

		if ( ! empty( $this->capabilities ) ) {
			$tmp = $this->capabilities;
		} else {
			$caps           = array();
			$editable_roles = \get_editable_roles();
			foreach ( $editable_roles as $role => $details ) {
				$detail = get_role( $role )->capabilities;
				$caps   = array_merge( $caps, $detail );
			}

			$caps = array_unique( array_keys( $caps ) );
			$caps = array_combine( $caps, $caps );
			$tmp  = $caps;
		}

		$ret = array();
		foreach ( $caps as $cap ) {
			$ret[] = array(
				'label' => $cap,
				'value' => $cap,
			);
		}

		return $ret;
	}

	function post_type_helper() {
		$post_types = \get_post_types();
		$ret        = array();
		foreach ( $post_types as $type ) {
			$ret[] = array(
				'label' => $type,
				'value' => $type,
			);
		}

		return $ret;
	}
}
