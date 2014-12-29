<?php
/**
 * Created by JetBrains PhpStorm.
 * User: TimAnderson
 * Date: 12/18/14
 * Time: 2:37 PM
 */

class Theme_Assets {
	protected function __construct() {}

////////////////////////////////////////////////////////////////////////////////
// Add scripts.
////////////////////////////////////////////////////////////////////////////////
	public static function scripts() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', false, null, true);
		wp_enqueue_script('jquery');

		wp_register_script('theme_scripts', get_template_directory_uri() . '/assets/production/js/scripts.js', array('jquery'), null, true);
		wp_enqueue_script('theme_scripts');
	}

////////////////////////////////////////////////////////////////////////////////
// Add styles.
////////////////////////////////////////////////////////////////////////////////
	public static function styles() {
		wp_register_style('theme_styles', get_template_directory_uri() . '/assets/production/css/styles.css', false, null, 'all');
		wp_enqueue_style('theme_styles');
	}
}