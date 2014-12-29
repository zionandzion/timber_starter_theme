<?php
/**
 * Created by JetBrains PhpStorm.
 * User: TimAnderson
 * Date: 12/18/14
 * Time: 2:33 PM
 */

class Theme_Widgets {
	protected function __construct() {}


////////////////////////////////////////////////////////////////////////////////
// Add items to the array to generate more widget areas for the them.
////////////////////////////////////////////////////////////////////////////////
	public static function sidebars() {
		$widget_areas =  array(
			array(
				'name' => 'Sidebar',
				'id' => 'sidebar'
			),
			array(
				'name' => 'Footer',
				'id' => 'footer'
			)
		);
		return $widget_areas;
	}
}