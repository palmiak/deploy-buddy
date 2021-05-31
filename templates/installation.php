<?php
namespace BuddyIntegration;

?>
<div class="buddy-wrapper">
	<h1><?php _e( 'Installation', Config::get( 'language_slug' ) ); ?></h1>
	<br>
	<h2><?php _e( 'Get your webhook url', Config::get( 'language_slug' ) ); ?></h2>

	<?php
	_e(
		'<ol>
		<li>Login to your buddy.works account.</li>
		<li>Go to your project and than select the pipeline you want to execute.</li>
		<li>Click <strong>Webhook URL</strong> in the sidebar and copy URL.</li>
	</ol>',
		Config::get( 'language_slug' )
	);
	?>
	<br>
	<h2><?php _e( 'Configure the plugin', Config::get( 'language_slug' ) ); ?></h2>

	<?php
	_e(
		'<p>Currently the plugin is only configurable by constants that you can set in your <code>wp-config.php</code> file.</p>

	<p>The only required constant is the <code>buddy_webhook</code>, where you have to paste the webhook URL.</p>

	<p><pre><code>define( \'buddy_webhook\', PASTE_URL_HERE );
	</code></pre></p>',
		Config::get( 'language_slug' )
	);
	?>
	<br>
	<h3><?php _e( 'Other constants', Config::get( 'language_slug' ) ); ?></h3>

	<?php _e(
		'<p><code>buddy_topbar</code> - default: true - adds the deploy button to the admin bar</p>

	<p><code>buddy_capabilities</code> - default: manage_options - capability that is needed to see the deploy button</p>
	',
		Config::get( 'language_slug' )
	); ?>
</div>