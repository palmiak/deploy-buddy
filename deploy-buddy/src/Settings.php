<?php

namespace BuddyIntegration;

final class Settings {

	var $capabilities;

	function __construct() {
		if ( isset( $_GET['page'] ) && $_GET['page'] === Config::get( 'slug' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'include_styles' ) );
		}
		add_action( 'cmb2_admin_init', array( $this, 'register_metabox' ) );
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
					nav-tab-active<?php endif; ?>"><?php _e( 'Installation', Config::get( 'language_slug' ) ); ?></a>
				<a href="?page=<?php echo Config::get( 'slug' ); ?>&tab=manual_deploy" class="nav-tab
					<?php
					if ( 'manual_deploy' === $tab ) :
						?>
					nav-tab-active<?php endif; ?>"><?php _e( 'Manual Deploy', Config::get( 'language_slug' ) ); ?></a>
				<a href="?page=<?php echo Config::get( 'slug' ); ?>&tab=automatic_deploy" class="nav-tab
					<?php
					if ( 'automatic_deploy' === $tab ) :
						?>
					nav-tab-active<?php endif; ?>"><?php _e( 'Automatic Deploy', Config::get( 'language_slug' ) ); ?></a>
				<a href="?page=<?php echo Config::get( 'slug' ); ?>&tab=configuration" class="nav-tab
					<?php
					if ( 'configuration' === $tab ) :
						?>
					nav-tab-active<?php endif; ?>"><?php _e( 'Configuration', Config::get( 'language_slug' ) ); ?></a>
			</nav>

			<div class="tabs-content">
				<?php
				switch ( $tab ) :
					case 'manual_deploy':
						include Config::get( 'dir' ) . '/templates/manual_deploy.php';
						break;
					case 'automatic_deploy':
						include Config::get( 'dir' ) . '/templates/automatic_deploy.php';
						break;
					case 'configuration':
						include Config::get( 'dir' ) . '/templates/configuration.php';
						break;
					default:
						include Config::get( 'dir' ) . '/templates/installation.php';
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

	function register_metabox() {
		$cmb = new_cmb2_box(
			array(
				'id'           => 'options_metabox',
				'hookup'       => false,
				'object_types' => array( 'options-page' ),
			)
		);

		if ( ! defined( 'buddy_webhook' ) ) {
			$cmb->add_field(
				array(
					'name' => __( 'Basic configuration', Config::get( 'language_slug' ) ),
					'desc' => '',
					'type' => 'title',
					'id'   => 'basic_configuration',
				)
			);

			$cmb->add_field(
				array(
					'name' => __( 'Webhook', Config::get( 'language_slug' ) ),
					'desc' => __( 'Enter your Buddy webhook', Config::get( 'language_slug' ) ),
					'id'   => 'buddy_webhook',
					'type' => 'text_url',
					'protocols' => array( 'http', 'https' ),
				)
			);
		}

		$cmb->add_field(
			array(
				'name' => __( 'Manual Deployments', Config::get( 'language_slug' ) ),
				'desc' => '',
				'type' => 'title',
				'id'   => 'manual_deployments',
			)
		);

		if ( ! defined( 'buddy_manual_deploy' ) ) {
			$cmb->add_field(
				array(
					'name'    => __( 'Enable Manual Deployments', Config::get( 'language_slug' ) ),
					'desc'    => __( 'Check to enable or disable manual deployments.', Config::get( 'language_slug' ) ),
					'id'      => 'buddy_manual_deploy',
					'type'    => 'checkbox',
					'default' => 'true',
				)
			);
		}

		if ( ! defined( 'buddy_topbar' ) ) {
			$cmb->add_field(
				array(
					'name'    => __( 'Add deploy button to admin bar', Config::get( 'language_slug' ) ),
					'desc'    => __( 'Adds deployment button to admin bar.', Config::get( 'language_slug' ) ),
					'id'      => 'buddy_topbar',
					'type'    => 'checkbox',
					'default' => true,
				)
			);
		}

		if ( ! defined( 'buddy_manual_deploy_capabilities' ) ) {
			$cmb->add_field(
				array(
					'name'    => __( 'Manual deployments capability', Config::get( 'language_slug' ) ),
					'desc'    => __( 'Pick which capability is needed to run manual deployments.', Config::get( 'language_slug' ) ),
					'id'      => 'buddy_manual_deploy_capabilities',
					'type'    => 'select',
					'options' => $this->roles_helper(),
					'default' => 'manage_options',
				)
			);
		}

		$cmb->add_field(
			array(
				'name' => __( 'Automatic Deployments', Config::get( 'language_slug' ) ),
				'desc' => '',
				'type' => 'title',
				'id'   => 'automatic_deployments',
			)
		);

		if ( ! defined( 'buddy_automatic_deploy' ) ) {
			$cmb->add_field(
				array(
					'name'    => __( 'Enable Automatic Deployments', Config::get( 'language_slug' ) ),
					'desc'    => __( 'Check to enable or disable automatic deployments.', Config::get( 'language_slug' ) ),
					'id'      => 'buddy_automatic_deploy',
					'type'    => 'checkbox',
					'default' => false,
				)
			);
		}

		if ( ! defined( 'buddy_automatic_deploy_post_types' ) ) {
			$cmb->add_field(
				array(
					'name'              => __( 'Automatic deployment post types', Config::get( 'language_slug' ) ),
					'desc'              => __( 'Pick which post types will enable the automatic deployments.', Config::get( 'language_slug' ) ),
					'id'                => 'buddy_automatic_deploy_post_types',
					'type'              => 'multicheck',
					'options'           => \get_post_types(),
					'select_all_button' => true,
					'default'           => array( 'page', 'post' ),
				)
			);
		}

		if ( ! defined( 'buddy_automatic_deploy_capabilities' ) ) {
			$cmb->add_field(
				array(
					'name'    => __( 'Automatic deployment capability', Config::get( 'language_slug' ) ),
					'desc'    => __( 'Pick which capability is required to run automatic deployments.', Config::get( 'language_slug' ) ),
					'id'      => 'buddy_automatic_deploy_capabilities',
					'type'    => 'select',
					'options' => $this->roles_helper(),
					'default' => 'manage_options',
				)
			);
		}

	}

	function roles_helper() {
		if ( ! function_exists( '\get_editable_roles' ) ) {
			require_once ABSPATH . 'wp-admin/includes/user.php';
		}

		if ( ! empty( $this->capabilities ) ) {
			return $this->capabilities;
		} else {
			$caps           = array();
			$editable_roles = \get_editable_roles();
			foreach ( $editable_roles as $role => $details ) {
				$detail = get_role( $role )->capabilities;
				$caps   = array_merge( $caps, $detail );
			}

			$caps = array_unique( array_keys( $caps ) );
			$caps = array_combine( $caps, $caps );
			return $caps;
		}
	}
}
