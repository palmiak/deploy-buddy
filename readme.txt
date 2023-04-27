=== Deploy Buddy ===

Stable tag: 1.2.2
Requires at least: 5.0
Tested up to: 5.8
Requires PHP: 7.2
License: GPL v2 or later
Tags: ci/cd, deployments, static, developer
Contributors: palmiak

![](assets/images/cover.png)

Seamlessly trigger Buddy.works deploys from WordPress.
== Description ==

= Plugin Installation =

1. Download the latest zip from [releases](https://github.com/palmiak/buddy_deploy/releases/)
2. Upload the plugin in WordPress admin panel

= Updates =

If you want to keep this plugin up-to-date install and configure <https://github.com/afragen/git-updater>.

= Get your webhook url =

1. Login to your [buddy.works](http://buddy.works) account.
2. Go to your project and than select the pipeline you want to execute.
3. Click **Webhook URL** in the sidebar and copy URL.

= Configuration =

Currently the plugin is configurable by using the UI or by using constants in your `wp-config.php` file.

= Available constants =

`buddy_topbar` - default: true - adds the deploy button to the admin bar

`buddy_manual_deploy_capabilities` - default: manage_options - capability that is needed to see the deploy button

`buddy_capabilities_options` - default: manage_options - capability that is needed to view options panel.

`buddy_automatic_deploy` - default: false - enables automatic deployments

`buddy_automatic_deploy_post_types` - default: ['post', 'page'] - post types on which the auto deployment will run.

`buddy_automatic_deploy_capabilities` - default: manage_options - capability needed to trigger the auto deploy.

== Changelog ==

= 1.3.4 =

- Fixed a critical bug.

= 1.2.2 =

- Fixed the problem with Automatic Deployments running twice.

= 1.2.1 =

- Minor coding fix.

= 1.2.0 =

- Added **Gutenberg** Support - you can trigger the deployment even in Full Screen Mode in Gutenberg.
- Fixed some typos.

= 1.1.1 =

- Small fix with adding menu button.

= 1.1.0 =

- Moved inline documentation into context help tab.
- Fixed checkboxes not fully working in some cases.
- Some other minor fixes.

= 1.0.0 =

- Added a **configuration** tab. Since now using constants is not required.

= 0.2.1 =

- Fixed a minor bug and a typo in readme.

= 0.2.0 =

- Added automatic deployments.

= 0.1.5 =

- Minor fix for empty webhook.

= 0.1.4 =

- You can install and mange the plugin with composer. Just run `composer require buddy/deploy-buddy`.

= 0.1.3 =

- Updates are made with [Git Updater](https://github.com/afragen/git-updater)

= 0.1.2 =

- Made the admin panel a lot nicer
- Fixed some minor bugs.

= 0.1.1 =

- Fixed some minor bugs.
- Plugin is fully translatable

= 0.1.0 =

- Initial release
