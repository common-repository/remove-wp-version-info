<?php
   /*
   Plugin Name: Remove WP Version Info
   description: Remove WP Version Info is a plugin to easily hide your WordPress version information from everyone. Now no one would able to track which wordpress version you are using.
   Version: 1.0
   Author: Lokesh Sharma
   Author URI: http://lokeshsharma.xyz
   License: License: GPLv2
   */


// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function lS_remove_version_scripts_styles($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', 'lS_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'lS_remove_version_scripts_styles', 9999);

?>