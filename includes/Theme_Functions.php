<?php
////////////////////////////////////////////////////////////////////////////////
// Add any global functions here for cross-template use. These are used in
// the php files, not the twig files. If you need functions for twig, see
// Theme_Filters.php
////////////////////////////////////////////////////////////////////////////////

/**
 * Takes any message and echoes it to the screen in an easy to read fashion.
 * @param string $message Echoed to the screen
 */
function debug($message = '') {
	echo '<code class="container">';
	echo '<pre class="well">';
	print_r($message);
	echo '</pre>';
	echo '</code>';
}