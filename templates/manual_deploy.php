<?php
namespace BuddyIntegration;

?>
<h2><?php _e( 'Execute manual deployment', Config::get( 'language_slug' ) ); ?></h2>

<?php _e( '<p>By pressing the <strong>deploy</strong> button you will trigger the endpoint you selected.</p>', Config::get( 'language_slug' ) ); ?>

<form action="#" method="post">
	<input type="submit" id="buddy_launch_pipe" class="button button-primary button-hero buddy_manual_deploy_button" value="<?php _e( 'Deploy', Config::get( 'language_slug' ) ); ?>">
</form>
