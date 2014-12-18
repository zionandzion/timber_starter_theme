<?php
/**
 * Created by JetBrains PhpStorm.
 * User: TimAnderson
 * Date: 12/18/14
 * Time: 12:44 PM
 */

////////////////////////////////////////////////////////////////////////////////
// A basic factory for the other classes.
////////////////////////////////////////////////////////////////////////////////
class Theme {
	static $instance;
	protected function __construct() {}

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new static();
		}
		return self::$instance;
	}
}