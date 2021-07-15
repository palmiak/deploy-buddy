![](assets/images/cover.png)

# Deploy Buddy
Seamlessly trigger Buddy.works deploys from WordPress.

## Plugin Installation
1. Download the latest zip from [releases](https://github.com/palmiak/buddy_deploy/releases/)
2. Upload the plugin in WordPress admin panel

## Updates
If you want to keep this plugin up-to-date install and configure https://github.com/afragen/git-updater. 

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

## Automatic Deployments
After enabling the automating deployments by setting `buddy_automatic_deploy` to true, every time that user with a minimal capability set with `buddy_automatic_deploy_capabilities` constant will publish, unpublish or update a post from a post type set with `buddy_automatic_deploy_post_types` constant **Buddy's** pipeline will be triggered.

## Available constants
`buddy_topbar` - default: true - adds the deploy button to the admin bar

`buddy_manual_deploy_capabilities` - default: manage_options - capability that is needed to see the deploy button

`buddy_capabilities_options` - default: manage_options - capability that is needed to view options panel.

`buddy_automatic_deploy` - default: false - enables automatic deployments

`buddy_automatic_deploy_post_types` - default: ['post', 'page'] - post types on which the auto deployment will run.

`buddy_automatic_deploy_capabilities` - default: manage_options - capability needed to trigger the auto deploy.

## Changelog
**1.0.0**
- Added a **configuration** tab. Since now using constants is not required.

**0.2.1**
- Fixed a minor bug and a typo in readme.

**0.2.0**
- Added automatic deployments.

**0.1.5**
- Minor fix for empty webhook.

**0.1.4**
- You can install and mange the plugin with composer. Just run `composer require buddy/deploy-buddy`.

**0.1.3**
- Updates are made with [Git Updater](https://github.com/afragen/git-updater)

**0.1.2**
- Made the admin panel a lot nicer
- Fixed some minor bugs.
 
**0.1.1**
- Fixed some minor bugs.
- Plugin is fully translatable

**0.1.0**
- Initial release

## Roadmap
- Automatic deployments based on post type and post status.
- Adding admin panel instead of setting everything via constants.
