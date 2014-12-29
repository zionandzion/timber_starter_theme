<?php
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['widgets']['sidebar'] = Timber::get_widgets('Sidebar'); // https://github.com/jarednova/timber/wiki/Sidebar#method-3-dynamic
Timber::render('index.twig', $context);