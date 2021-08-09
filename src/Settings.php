<?php

namespace BuddyIntegration;

final class Settings {

	var $capabilities;
	var $cmb_form;

	function __construct() {
		if ( isset( $_GET['page'] ) && $_GET['page'] === Config::get( 'slug' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'include_styles' ) );
		}
		add_action( 'cmb2_admin_init', array( $this, 'register_metabox' ) );
		add_filter( 'cmb2_sanitize_on_off', array( $this, 'cmb2_sanitize_on_off_callback' ), 11, 2 );
		add_action( 'cmb2_render_on_off', array( $this, 'cmb2_render_on_off_callback' ), 10, 5 );
		add_action( 'cmb2_admin_init', array( $this, 'init_form' ) );
		add_action( 'cmb2_save_options-page_fields', array( $this, 'force_redirect' ) );
	}

	function force_redirect() {
		$url = admin_url( 'tools.php?page=deploy-buddy&tab=settings' );
		wp_redirect( $url );
	}

	function init_form() {
		$tab         = isset( $_GET['tab'] ) ? $_GET['tab'] : '';
		if( $tab === 'settings' ) {
			$this->cmb_form = cmb2_get_metabox_form( 'options_metabox', 'options-page' );
		}
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
						include Config::get( 'dir' ) . '/templates/configuration.php';
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

	function register_metabox() {
		$cmb = new_cmb2_box(
			array(
				'id'           => 'options_metabox',
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
					'name'      => __( 'Webhook', Config::get( 'language_slug' ) ),
					'desc'      => __( 'Enter your Buddy webhook', Config::get( 'language_slug' ) ),
					'id'        => 'buddy_webhook',
					'type'      => 'text_url',
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
					'type'    => 'on_off',
					'default' => 'on',
				)
			);
		}

		if ( ! defined( 'buddy_topbar' ) ) {
			$cmb->add_field(
				array(
					'name'    => __( 'Add deploy button to admin bar', Config::get( 'language_slug' ) ),
					'desc'    => __( 'Adds deployment button to admin bar.', Config::get( 'language_slug' ) ),
					'id'      => 'buddy_topbar',
					'type'    => 'on_off',
					'default' => 'on',
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
					'type'    => 'on_off',
					'default' => 'off',
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

	function cmb2_render_on_off_callback( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
		if ( $field->value === 'on' ) {
			$is_checked = 'checked';
		} elseif ( $field->value === 'off' ) {
			$is_checked = '';
		} elseif ( $field->args['default'] === 'on' ) {
			$is_checked = 'checked';
		} else {
			$is_checked = '';
		}

		echo '<input class="cmb2-option cmb2-list" type="checkbox" ' . $is_checked . ' name="' . $field->args['id'] . '" id="' . $field->args['id'] . '"/>';
		echo '<label for="' . $field->args['id'] . '"><span class="cmb2-metabox-description">' . $field->args['desc'] . '</span></label>';
	}

	function cmb2_sanitize_on_off_callback( $override_value, $value ) {
		return is_null( $value ) ? 'off' : 'on';
	}

}
