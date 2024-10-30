=== Contact360 ===
Contributors: contact360
Tags: contact360
Requires at least: 4.9
Tested up to: 5.0
Requires PHP: 5.3
Stable tag: 1.3.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Contact360`s integration plugin.

== Description ==

Contact360`s integration plugin with https://panel.stelsoft.pl service.

We are including external JavaScript file (hosted by our service) on your website for email addresses and phone number replacements. Its done to ensure the best quality and always up-to-date services including your configuration in our panel.

We are also integrating your website`s forms and sending basic information about name, phone and email of the sender to our API at https://panel.stelsoft.pl.

All gathered statistics could be found at https://panel.stelsoft.pl.

For more information, account management and feedback, please use support tab on our plugin`s page.

== Requirements ==

* PHP >=5.3
* WordPress >=4.9
* Contact Form 7 plugin for contact forms integration

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/contact360` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Go to 'Contact360' position in your WordPress `Settings` menu.
4. Configure your plugin according to data in https://panel.stelsoft.pl/settings/configuration#tab-integrations (fill "Client ID" and "API secret" fields).
5. Check integrations you would like to enable on your website.
6. Save configuration.

== Screenshots ==

1. Plugin configuration page

== Changelog ==

= 1.3.0 =

* Added WPForms integration
* Removed dependencies notice

= 1.2.0 =

* Added Elementor PRO forms integration

= 1.1.1 =

* Forms integration fix

= 1.1.0 =

* Integration checkboxes removed (all enabled)
* Added API URL configuration field (defaults to production URL)

= 1.0.2 =

* PHP compatibility fix

= 1.0.1 =

* Code cleanup
* Moved API to external dependency

= 1.0.0 =

* Added ability to enable/disable certain integrations.
* Added API details configuration.
* Added phone and email replacement script.
* Added Contact Form 7 forms integration.
