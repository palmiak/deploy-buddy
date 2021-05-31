<?php

namespace BuddyIntegration;

final class Settings {

	function __construct() {
		if ( isset( $_GET['page'] ) && $_GET['page'] === Config::get( 'slug' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'include_styles' ) );
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
			Config::get( 'capabilities' ),
			Config::get( 'slug' ),
			array( $this, 'options_page_html' )
		);
	}

	function include_styles() {
		wp_enqueue_style( 'buddy_admin', Config::get( 'plugin_url' ) . 'assets/css/admin.css', array(), Config::get( 'version' ) );
	}

	function options_page_html() {
		if ( ! current_user_can( Config::get( 'capabilities' ) ) ) {
			return;
		}
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
				<?php if ( capabilities_helper( 'manual_deploy' ) ) : ?>
				<a href="?page=<?php echo Config::get( 'slug' ); ?>&tab=manual_deploy" class="nav-tab
					<?php
					if ( 'manual_deploy' === $tab ) :
						?>
					nav-tab-active<?php endif; ?>"><?php _e( 'Manual Deploy', Config::get( 'language_slug' ) ); ?></a>
				<?php endif; ?>
			</nav>

			<div class="tabs-content">
				<?php
				switch ( $tab ) :
					case 'manual_deploy':
						if ( ! ( capabilities_helper( 'manual_deploy' ) ) ) {
							wp_die( __( 'You are not allowed to view this page', Config::get( 'language_slug' ) ) );
						}
						include Config::get( 'dir' ) . '/templates/manual_deploy.php';
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
}
