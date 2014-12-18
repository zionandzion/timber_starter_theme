<?php
function load_dependencies() {
	require_once dirname( __FILE__ ) . '/includes/tgm-plugin-activation.php';
	require_once dirname( __FILE__ ) . '/includes/Theme_Plugins.php';
	require_once dirname( __FILE__ ) . '/includes/Theme_Context.php';
	require_once dirname( __FILE__ ) . '/includes/Theme_Assets.php';
	require_once dirname( __FILE__ ) . '/includes/Theme_Widgets.php';
	require_once dirname( __FILE__ ) . '/includes/Theme_Filters.php';
}

class StarterSite extends TimberSite {
	private $Plugins;
	private $Context;
	private $Scripts;
	private $Widgets;
	private $Filters;

	function __construct(){
		load_dependencies();

		add_theme_support('post-formats');
		add_theme_support('post-thumbnails');
		add_theme_support('menus');
		add_filter('timber_context',      array($this, 'add_to_context'));
		add_filter('get_twig',            array($this, 'add_to_twig'));
		add_action('wp_enqueue_scripts',  array($this, 'laod_scripts'));
		add_action('widgets_init',        array($this, 'load_widget_areas'));
		add_action('tgmpa_register',      array($this, 'load_plugins'));
		parent::__construct();
	}

	// scripts and styles
	function load_scripts() {
		if( !is_admin() ) {
			Theme_Assets::scripts();
			Theme_Assets::styles();
		}
	}

	function register_widget_areas() {
		$defaults = array(
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => ''
		);
		$sidebars = Theme_Widgets::get_instance()->sidebars();
		foreach($sidebars as $args) {
			$args = $args + $defaults;
			register_sidebar($args);
		}
	}

	function add_to_context($context){
		return Theme_Context::add_to_context($context);
	}

	function add_to_twig($twig) {
		$additions = Theme_Filters::get_instance()->add_to_twig();
		$twig->addExtension(new Twig_Extension_StringLoader());
		foreach($this->filters as $item) {
			$args = array(Theme_Filters::get_instance(), $item['function']);
			if($item['type'] == 'filter') {
				$filter = new Twig_SimpleFilter($item['twig_string'], $args);
				$twig->addFilter($filter);
			}
			else {
				$filter = new Twig_SimpleFunction($item['twig_string'], $args);
				$twig->addFunction($filter);
			}
		}
	}
}
$TimberSite = new StarterSite();