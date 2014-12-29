<?php
/**
 * Created by JetBrains PhpStorm.
 * User: TimAnderson
 * Date: 12/18/14
 * Time: 1:08 PM
 */

class Theme_Filters {
	protected function __construct() {}


////////////////////////////////////////////////////////////////////////////////
// Add whatever filters/functions you want to the array.
////////////////////////////////////////////////////////////////////////////////
	public static function add_to_twig() {
		return array(
			array(
				'type'        => 'filter', // filter or function ?
				'twig_string' => 'debug', // in twig: {{ somevar|debug }}
				'function'    => 'debug'
			),
			array(
				'type'        => 'function',
				'twig_string' => 'social', // in twig: {{ social(post.title, post.permalink).facebook }}
				'function'    => 'social_media_icons'
			)
		);
	}


////////////////////////////////////////////////////////////////////////////////
// Now define the functions themselves.
////////////////////////////////////////////////////////////////////////////////
	public function debug($message) {
		echo '<code class="container">';
		echo '<pre class="well">';
		print_r($message);
		echo '</pre>';
		echo '</code>';
	}

	public function secial_media_icons($link, $title) {
		$share = array(
			'facebook'    => "http://www.facebook.com/share.php?u=$link&title=$title",
			'twitter'     => "http://twitter.com/home?status=$title+$link",
			'google_plus' => "https://plus.google.com/share?url=$link"
		);
		return $share;
	}
}