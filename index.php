<?php
if (!class_exists('Timber')){
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}
$context = Timber::get_context();
$context['content'] = Timber::get_posts();
$context['page']['layout'] = 'content-sidebar';
$templates = array('index.twig');
Timber::render($templates, $context);