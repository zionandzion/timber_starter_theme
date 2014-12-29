<?php
/**
 * Created by JetBrains PhpStorm.
 * User: TimAnderson
 * Date: 12/18/14
 * Time: 12:10 PM
 */

class Theme_Context {
	protected function __construct() {}


////////////////////////////////////////////////////////////////////////////////
// Add whatever you want to the global context
////////////////////////////////////////////////////////////////////////////////
	public static function add_to_context($context) {
		return $context + array(
			'site' => new TimberSite(),
			'widgets' => array(
				'footer' => Timber::get_widgets('Footer')
			)
		);
	}
}