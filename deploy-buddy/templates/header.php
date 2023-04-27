<?php
namespace BuddyIntegration;

?>
<header class="buddy-header buddy-grid grid-columns-2">
    <div class="item">
        <span class="buddy-logo"><img src="<?php echo Config::get( 'plugin_url' ); ?>assets/images/deploy-buddy-logo.svg" alt="Deploy Buddy - WordPress Plugin"></span>
    </div>
    <nav class="item">
        <ul>
            <li><a href="<?php echo Config::get( 'utm' );?>" target="_blank"><?php _e( 'Try Buddy', Config::get( 'language_slug' ) ); ?></a></li>
            <li><a href="https://github.com/palmiak/deploy_buddy/issues" target="_blank"><?php _e( 'Report an issue', Config::get( 'language_slug' ) ); ?></a></li>
        </ul>
    </nav>
</header>
