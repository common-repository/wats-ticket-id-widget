=== Wats Ticket ID Widget ===
Contributors: zoecorkhill
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=hello%40zoecorkhill%2eco%2euk&lc=GB&no_note=0&cn=Add%20special%20instructions%20to%20the%20seller&no_shipping=2&currency_code=GBP&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: wats, widget
Requires at least: 2.8
Tested up to: 3.1.4
Stable tag: 1.0

A plugin to jump to support tickets from a sidebar widget, by ID. Designed to work with WordPress Advanced Ticket System.

== Description ==

This plugin is to be used with the [WordPress Advanced Ticket System](http://www.ticket-system.net/ "WATS"). It is a sidebar widget that allows the user to jump to a specific ticket by entering the ticket ID number.

It is recommended that the user select the 'Numbered (ex : 1)' option under 'Ticket numerotation' in Wats Options when using the WATS plugin, so that the IDs shown on the site match the ID you need to put into the widget form.

== Installation ==

1. Upload the `wats-ticket-id` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the widget to your sidebar using the 'Widgets' menu in WordPress. Optionally, customise the title of the widget.

== Screenshots ==

1. The frontend widget
2. Widget options

== Frequently Asked Questions ==

= The ID doesn't work even though the ticket exists? =

Check that you are using the 'Numbered (ex : 1)' option under 'Ticket numerotation' in Wats Options, not the 'Dated (ex : 090601-00001)' option. This plugin is designed to be used when using the 'Numbered' system.

= How do I change the widget title? =

Go to the 'Appearance' -> 'Widgets' menu in WordPress admin, then click the arrow on the right hand side of the widget title to reveal the options pane. 

= How do I customise the widget appearance? =

CSS IDs have been added to each part of the widget, allowing for easy customisation in your stylesheet. These are:

* The form is in a div with the id #ticketID
* The form has the id #ticketIDform
* The error message is in a div with the id #ticketIDerror

== Changelog ==

= 1.0 =
* Initial release.