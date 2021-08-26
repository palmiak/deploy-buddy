<?php
namespace BuddyIntegration;

$post_types = array_map(
	function( $value ) {
		return '<li><strong> - ' . $value . '</strong></li>';
	},
	Config::get( 'automatic_deploy_post_types' )
);
?>

<div class="buddy-wrapper">
	<h1><?php _e( 'Automatic Deployments', Config::get( 'language_slug' ) ); ?></h1>

	<?php if ( capabilities_helper( 'automatic_deploy' ) ) : ?>
		<?php echo sprintf( __( '<p>The automatic deployment runs every time a user with at least <strong>%1$s</strong> saves or updates post of these post types:<ul>%2$s</ul>', Config::get( 'language_slug' ) ), Config::get( 'automatic_deploy_capabilities' ), implode( '', $post_types ) ); ?>

		<?php _e( '<p>To change the capability required to trigger tha automatic deployment, go to the plugin\'s <strong>settings tab</strong> or add <code>buddy_automatic_deploy_capabilities</code> constant to wp-config.php file.', Config::get( 'language_slug' ) ); ?>

		<?php _e( '<p>To change the post types, go to the plugin\'s <strong>settings tab</strong> or add <code>buddy_automatic_deploy_post_types</code> constant to wp-config.php file.', Config::get( 'language_slug' ) ); ?>
	<?php else : ?>
		<?php _e( '<p>Automatic deployments are <strong>disabled</strong>.</p>', Config::get( 'language_slug' ) ); ?>
	<?php endif; ?>
</div>

