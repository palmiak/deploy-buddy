# Deploy Buddy

Stable tag: 1.3.2
Requires at least: 5.0
Tested up to: 5.8
Requires PHP: 7.2
License: GPL v2 or later
Tags: ci/cd, deployments, static, developer
Contributors: palmiak

![](assets/images/cover.png)

Seamlessly trigger [Buddy CI/CD](https://buddy.works/) deploys from WordPress.

## Description

### Plugin Installation

1. Download the latest [release](https://github.com/palmiak/buddy_deploy/releases/).
2. Upload the plugin in WordPress admin panel.

### Updates

To keep this plugin up-to-date, install and configure the [Git Updater](https://github.com/afragen/git-updater).

### Get your webhook url

1. Sign in to your [Buddy](http://buddy.works) account.
2. Go to your project and select the pipeline you want to execute using the plugin.
3. Click **Webhook URL** in the right sidebar and copy the URL.

### Configuration

You can configure the plugin using the UI or by using constants in the `wp-config.php` file.

### Available constants

- `buddy_webhook` - default: `false` - bool - adds the webhook url
- `buddy_manual_deploy` - default: `true` - bool - enables automatic deployments
- `buddy_topbar` - default: `true` - bool - adds the deploy button to the admin bar
- `buddy_manual_deploy_capabilities` - default: `manage_options` - string - capability required to see the deploy button
- `buddy_capabilities_options` - default: `manage_options` - string - capability required to view options panel
- `buddy_automatic_deploy` - default: `false` - bool - enables automatic deployments
- `buddy_automatic_deploy_post_types` - default: `['post', 'page']` - array - post types which trigger automatic deployments
- `buddy_automatic_deploy_capabilities` - default: `manage_options` - string - capability required to trigger automatic deployments

## Changelog

### 1.3.3

- Changed the default value of `automatic deployments`.

### 1.3.2

- More small fixes.

### 1.3.1

- Removed development leftovers.

### 1.3.0

- Settings screen rewrote to use Gutenberg.

### 1.2.4

- Added some missing constatns in readme and in context help.

### 1.2.3

- Lots of typos and descriptions fixed - all thanks to @tomekpapiernik.

### 1.2.2

- Fixed the problem with Automatic Deployments running twice.

### 1.2.1

- Minor coding fix.

### 1.2.0

- Added **Gutenberg** Support - you can trigger the deployment even in Full Screen Mode in Gutenberg.
- Fixed some typos.

### 1.1.1

- Small fix with adding menu button.

### 1.1.0

- Moved inline documentation into context help tab.
- Fixed checkboxes not fully working in some cases.
- Some other minor fixes.

### 1.0.0

- Added a **configuration** tab. Since now using constants is not required.

### 0.2.1

- Fixed a minor bug and a typo in readme.

### 0.2.0

- Added automatic deployments.

### 0.1.5

- Minor fix for empty webhook.

### 0.1.4

- You can install and mange the plugin with composer. Just run `composer require buddy/deploy-buddy`.

### 0.1.3

- Updates are made with [Git Updater](https://github.com/afragen/git-updater)

### 0.1.2

- Made the admin panel a lot nicer
- Fixed some minor bugs.

### 0.1.1

- Fixed some minor bugs.
- Plugin is fully translatable

### 0.1.0

- Initial release
