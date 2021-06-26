<?php
namespace BuddyIntegration;

?>

<div class="buddy-wrapper">
	<h1><?php _e( 'Automatic Deployments', Config::get( 'language_slug' ) ); ?></h1>

	<?php if ( capabilities_helper( 'automatic_deploy' ) ): ?>
		<?php echo sprintf( __('<p>Each time a member with at least <strong>%s</strong> capability will save or update a post from this post types:<br/> <strong>%s</strong><br/> the auto deploy will run.', Config::get( 'language_slug' ) ), Config::get( 'automatic_deploy_capabilities' ), implode( '<br>', Config::get( 'automatic_deploy_post_types' ) ) ); ?>

		<?php _e( '<p>If you want to change the capability needed to trigger the auto deploy, add <code>buddy_automatic_deploy_capabilities</code> constant to wp-config.php file.', Config::get( 'language_slug' ) ); ?>

		<?php _e( '<p>If you want to change the post types, add <code>buddy_automatic_deploy_post_types</code> constant to wp-config.php file.', Config::get( 'language_slug' ) ); ?>
	<?php else: ?>
		<?php _e( '<p>Automatic deployments are <strong>disabled</strong>.</p>', Config::get( 'language_slug' ) ); ?>
	<?php endif; ?>
</div>

