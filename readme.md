![](assets/images/cover.png)

# Deploy Buddy
Seamlessly trigger Buddy.works deploys from WordPress.

## Plugin Installation
1. Download the latest zip from [releases](https://github.com/palmiak/buddy_deploy/releases/)
2. Upload the plugin in WordPress admin panel

## Get your webhook url
1. Login to your [buddy.works](http://buddy.works) account.
2. Go to your project and than select the pipeline you want to execute.
3. Click **Webhook URL** in the sidebar and copy URL.

## Configuration
Currently the plugin is only configurable by constants that you can set in your `wp-config.php` file.

The only required constant is the `buddy_webhook`, where you have to paste the webhook URL.

Example:
```php
define( 'buddy_webhook', PASTE_URL_HERE );
```

### Other constants
`buddy_topbar` - default: true - adds the deploy button to the admin bar

`buddy_capabilities` - default: manage_options - capability that is needed to see the deploy button

## Changelog
**0.1.1**
- Fixed some minor bugs.
- Plugin is fully translatable

**0.1.0**
Initial release

## Roadmap
- Automatic deployments based on post type and post status.
- Adding admin panel instead of setting everything via constants.
