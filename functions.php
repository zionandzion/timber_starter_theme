<?php
require_once get_template_directory() . '/includes/tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/Theme_Plugins.php';
require_once get_template_directory() . '/includes/Theme_Context.php';
require_once get_template_directory() . '/includes/Theme_Assets.php';
require_once get_template_directory() . '/includes/Theme_Widgets.php';
require_once get_template_directory() . '/includes/Theme_Filters.php';
require_once get_template_directory() . '/includes/Theme_Functions.php';

/**
 * TODO: Side effects do not follow OOP. Move elsewhere: http://www.php-fig.org/psr/psr-1/ 2.3: Side effects
 */
if(!class_exists('TimberSite')) {
	add_action('tgmpa_register', 'load_plugins');
	function load_plugins() {
		Theme_Plugins::plugins();
	}
	if (is_admin() && isset($_GET['activated'] ) ) {
		header('Location: ' . admin_url() . 'themes.php?page=tgmpa-install-plugins');
	}
	if(!is_admin()) {
		echo 'Install <a href="' . admin_url() . 'themes.php?page=tgmpa-install-plugins">Timber</a> before using this theme.';
		die;
	}
}
// if Timber is installed, than run the theme setup
else {
class Starter_Site extends TimberSite {

	function __construct() {
		Timber::$dirname = 'twig';
		add_theme_support('post-formats');
		add_theme_support('post-thumbnails');
		add_theme_support('menus');
		add_action('wp_enqueue_scripts',  array($this, 'load_scripts'));
		add_filter('timber_context',      array($this, 'add_to_context'));
		add_filter('get_twig',            array($this, 'add_to_twig'));
		add_action('widgets_init',        array($this, 'register_widget_areas'));
		parent::__construct();
	}

	// scripts and styles

	function load_scripts() {
		Theme_Assets::scripts();
		Theme_Assets::styles();
	}

	function register_widget_areas() {
		$defaults = array(
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
			'before_widget' => "<aside>",
			'after_widget'  => '</aside>'
		);
		$sidebars = Theme_Widgets::sidebars();
		foreach($sidebars as $args) {
			$args = $args + $defaults;
			register_sidebar($args);
		}
	}

	function add_to_context($context){
		return Theme_Context::add_to_context($context);
	}

	function add_to_twig($twig) {
		$additions = Theme_Filters::add_to_twig();
		$twig->addExtension(new Twig_Extension_StringLoader());
		foreach($additions as $item) {
			$args = array('Theme_Filters', $item['function']);
			if($item['type'] == 'filter') {
				$filter = new Twig_SimpleFilter($item['twig_string'], $args);
				$twig->addFilter($filter);
			}
			else {
				$filter = new Twig_SimpleFunction($item['twig_string'], $args);
				$twig->addFunction($filter);
			}
		}
		return $twig;
	}

	function load_plugins() {
		Theme_Plugins::plugins();
	}
}
new Starter_Site();
}