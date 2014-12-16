<?php
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['page']['layout'] = 'content-sidebar';
$templates = array('index.twig');
Timber::render($templates, $context);