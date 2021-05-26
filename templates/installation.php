<h2>Installation</h2>

<h3>Get your webhook url</h3>
<ol>
	<li>Login to your buddy.works account.</li>
	<li>Go to your project and than select the pipeline you want to execute.</li>
	<li>Click <strong>Webhook URL</strong> in the sidebar and copy URL.</li>
</ol>

<h3>Configure the plugin</h3>
<p>Currently the plugin is only configurable by constants that you can set in your <code>wp-config.php</code> file.</p>

<p>The only required constant is the <code>buddy_webhook</code>, where you have to paste the webhook URL.</p>

<p><pre><code>define( 'buddy_webhook', PASTE_URL_HERE );
</code></pre></p>

<h4>Other constants</h4>
<p><code>buddy_topbar</code> - default: true - adds the deploy button to the admin bar</p>

<p><code>buddy_capabilities</code> - default: manage_options - capability that is needed to see the deploy button</p>
