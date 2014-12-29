<?php

class Theme_Plugins {
	protected function __construct() {}


	////////////////////////////////////////////////////////////////////////////////
	// Add your plugins to the array below. If required = true, the plugin will
	// automatically be installed upon theme activation
	////////////////////////////////////////////////////////////////////////////////
	public static function plugins() {
		$plugins = array(
			array(
				'name'      => 'Advanced Custom Fields',
				'slug'      => 'advanced-custom-fields',
				'required'  => true
			),
			array(
				'name'      => 'Pods - Custom Content Types and Fields',
				'slug'      => 'pods',
				'required'  => true
			),
			array(
				'name'      => 'Timber',
				'slug'      => 'timber-library',
				'required'  => true
			),
			array(
				'name'      => 'Admin Menu Editor',
				'slug'      => 'admin-menu-editor',
				'required'  => false
			),
			array(
				'name'      => 'WordPress SEO by Yoast',
				'slug'      => 'wordpress-seo',
				'required'  => false
			),
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => false
			),
			array(
				'name'      => 'W3 Total Cache',
				'slug'      => 'w3-total-cache',
				'required'  => false
			),
			array(
				'name'      => 'EWWW Image Optimizer',
				'slug'      => 'ewww-image-optimizer',
				'required'  => false
			)
		);
		tgmpa($plugins);
	}
}