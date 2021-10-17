<?php
namespace BuddyIntegration;
?>

<div class="buddy-wrapper">
	<h1><?php _e( 'Settings', Config::get( 'language_slug' ) ); ?></h1>

	<?php if ( capabilities_helper( 'edit_options' ) ): ?>
		<div class="notice notice-info">
			<p>If options are missing from the Settings tab, it means they are declared in the <code>wp-config.php</code>. Remove the declarations from the <code>wp-config.php</code> file to adjust the corresponding options here.</p>
		</div>

		<?php
			echo $this->cmb_form;
		?>
	<?php else: ?>
		<?php _e( '<p>Automatic deployments are <strong>disabled</strong>.</p>', Config::get( 'language_slug' ) ); ?>
	<?php endif; ?>
</div>

