<?php
namespace BuddyIntegration;

?>

<div class="buddy-wrapper">
	<h1><?php _e( 'Execute manual deployment', Config::get( 'language_slug' ) ); ?></h1>

	<?php if ( capabilities_helper( 'manual_deploy' ) ): ?>
		<?php _e( '<p>By pressing the <strong>deploy</strong> button you will trigger the endpoint you selected.</p>', Config::get( 'language_slug' ) ); ?>
		<br>
		<form action="#" method="post">
			<input type="submit" id="buddy_launch_pipe" class="button button-primary button-hero buddy_manual_deploy_button" value="<?php _e( 'Deploy', Config::get( 'language_slug' ) ); ?>">
		</form>
	<?php else: ?>
		<?php _e( '<p>Manual deployments are <strong>disabled</strong>.</p>', Config::get( 'language_slug' ) ); ?>
	<?php endif; ?>
</div>
