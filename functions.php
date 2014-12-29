<?php
require_once dirname( __FILE__ ) . '/includes/tgm-plugin-activation.php';
// if Timber is not installed/activated, then redirect to the plugin install page.
if(!class_exists('TimberSite')) {
	add_action('tgmpa_register', 'load_plugins');
	function load_plugins() {
		$plugins = array(
			array(
				'name'      => 'Timber',
				'slug'      => 'timber-library',
				'required'  => true
			),
			array(
				'name'      => 'Advanced Custom Fields',
				'slug'      => 'advanced-custom-fields',
				'required'  => true
			),
			array(
				'name'      => 'Pods - Custom Content Types and Fields',
				'slug'      => 'pods',
				'required'  => true
			),
			array(
				'name'      => 'Admin Menu Editor',
				'slug'      => 'admin-menu-editor',
				'required'  => false
			),
			array(
				'name'      => 'WordPress SEO by Yoast',
				'slug'      => 'wordpress-seo',
				'required'  => false
			),
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => false
			),
			array(
				'name'      => 'W3 Total Cache',
				'slug'      => 'w3-total-cache',
				'required'  => false
			),
			array(
				'name'      => 'EWWW Image Optimizer',
				'slug'      => 'ewww-image-optimizer',
				'required'  => false
			)
		);

		tgmpa( $plugins );
	}
	if (is_admin() && isset($_GET['activated'] ) ) {
		header('Location: ' . admin_url() . 'themes.php?page=tgmpa-install-plugins');
	}
	if(!is_admin()) {
		echo 'Install <a href="' . site_url() . '/wp-admin/themes.php?page=tgmpa-install-plugins">Timber</a> before using this theme.';
		die;
	}
}
else {
class StarterSite extends TimberSite {
	public $assets = '';
	public $customTwig = '';

	function __construct(){
		Timber::$dirname = 'twig';
		$this->assets = get_template_directory_uri() . '/assets/production';
		$this->customTwig = new CustomTwig();

		add_action('after_setup_theme', array($this, 'setup'));
		parent::__construct();
	}

	function setup() {
		$this->add_theme_supports();
		$this->add_filters();
		$this->add_actions();
	}

	function add_theme_supports() {
		add_theme_support('post-formats');
		add_theme_support('post-thumbnails');
		add_theme_support('menus');
	}

	function add_filters() {
		add_filter('timber_context', array($this, 'add_to_context'));
		add_filter('get_twig',       array($this->customTwig, 'init'));
	}

	function add_actions() {
		add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
		add_action('widgets_init',       array($this, 'register_widget_areas'));
		add_action('tgmpa_register',     array($this, 'register_plugins'));
	}

	// scripts and styles
	function load_scripts() {
		if( !is_admin() ) {
			wp_deregister_script('jquery');

			wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', false, null, true);
			wp_enqueue_script('jquery');

			wp_register_script('theme_scripts', $this->assets . '/js/scripts.js', false, null, true);
			wp_enqueue_script('theme_scripts');

			wp_register_style('theme_styles', $this->assets . '/css/styles.css', false, 'all');
			wp_enqueue_style('theme_styles');
		}
	}

	// sidebars / widget areas
	function register_widget_areas() {
		$defaults = array(
			'before_title' => '<h2>',
			'after_title' => '</h2>',
			'before_widget' => '<aside class="widget">',
			'after_widget' => '</aside>'
		);
		$sidebars = array(
			array(
				'name' => 'Sidebar',
				'id' => 'sidebar'
			),
			array(
				'name' => 'Footer',
				'id' => 'footer'
			)
		);
		foreach($sidebars as $args) {
			$args = $args + $defaults;
			register_sidebar($args);
		}
	}

	// global context
	function add_to_context($context){
		$context['site'] = $this;
		$context['widgets']['footer'] = Timber::get_widgets('Footer');
		return $context;
	}
}
new StarterSite();
}


class CustomTwig {
	function init($twig) {

		// associate twig name and function name here
		$additions = array(
			array(
				'type'        => 'filter', // filter or function ?
				'twig_string' => 'debug', // in twig: {{ somevar|debug }}
				'function'    => array($this, 'debug')
			),
			array(
				'type'        => 'function',
				'twig_string' => 'social', // e.g. {{ social(post.title, post.permalink).facebook }}
				'function'    => array($this, 'social_media_icons')
			)
			// etc
		);



		$twig->addExtension(new Twig_Extension_StringLoader());
		foreach($additions as $item) {
			$args = $item['function'];
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




	// Add new functions and filters below.
	function debug($message) {
		echo '<code class="container">';
		echo '<pre class="well">';
		print_r($message);
		echo '</pre>';
		echo '</code>';
	}

	function secial_media_icons($link, $title) {
		$share = array(
			'facebook'    => "http://www.facebook.com/share.php?u=$link&title=$title",
			'twitter'     => "http://twitter.com/home?status=$title+$link",
			'google_plus' => "https://plus.google.com/share?url=$link"
		);
		return $share;
	}
}