=== Plugin Name ===
Contributors: webreact
Donate link: https://www.webreact.nl
Tags: realworks, movingdigital
Requires at least: 5.0.3
Tested up to: 5.0.3
Stable tag: 5.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin connects your WordPress website to Moving Digitals API. It's intended use is to pull data in from Realworks objects.

== Description ==

This plugin connects your WordPress website to Moving Digitals API. It's intended use is to pull data in from Realworks objects.

== Installation ==

1. Upload `moving-digital-realworks.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress and enter your API key on the settings page.
3. For Anecdotes call this function in your templates and pass the Realworks object code as parameter <?php echo MovingDigital\Moving_Digital_Realworks_Admin::moving_digital_get_anecdotes('OBJECT_CODE'); ?>
4. For Features call this function in your templates and pass the Realworks object code as parameter <?php echo MovingDigital\Moving_Digital_Realworks_Admin::moving_digital_get_features('OBJECT_CODE'); ?>
5. Templates can be overridden in your theme or child-theme. In the root of your (child)theme you can create a directory with the name 'moving-digital-realworks' and place the template files there. The original files are located in /public/templates/.

== Frequently Asked Questions ==

= Will this plug-in work out of the box? =

Although this plugin connects your WordPress website to Moving Digital it still requires you to have basic knowledge of WordPress' templating system in orde to get the polled data into your templates!

== Changelog ==

= 1.0.1 =
* API url changed

= 1.0 =
* Inital release