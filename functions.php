<?php
require_once dirname( __FILE__ ) . '/dependencies/tgm-plugin-activation.php';

if (!class_exists('Timber')){
	add_action( 'admin_notices', function(){
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
	});
	return;
}

class StarterSite extends TimberSite {
	public $assets = '';

	function __construct(){
		$this->assets = get_template_directory_uri() . '/assets/production';
			add_theme_support('post-formats');
		add_theme_support('post-thumbnails');
		add_theme_support('menus');
		add_filter('timber_context', array($this, 'add_to_context'));
		add_filter('get_twig', array($this, 'add_to_twig'));
		add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
		add_action('widgets_init', array($this, 'register_sidebars'));
		add_action( 'tgmpa_register', array($this, 'register_required_plugins'));
		parent::__construct();
	}

	// scripts and styles
	function register_scripts() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', false, null, true);
		wp_enqueue_script('jquery');
		wp_register_script('theme_scripts');
		wp_enqueue_script('theme_scripts', $this->assets . '/js/scripts.js', false, null, true);
		wp_register_style('theme_styles');
		wp_enqueue_style('theme_styles', $this->assets . '/css/styles.css', false, 'all');
	}

	// sidebars / widget areas
	function register_sidebars() {
		$sidebars = array(
			array(
				'name' => 'Sidebar',
				'id' => 'sidebar',
				'description' => __('Shows to the right of your content.', 'zz'),
				'before_title' => '',
				'after_title' => '',
				'before_widget' => '',
				'after_widget' => ''
			),
			array(
				'name' => 'Footer',
				'id' => 'footer',
				'description' => __('Shows at the bottom of your site.', 'zz'),
				'before_title' => '',
				'after_title' => '',
				'before_widget' => '',
				'after_widget' => ''
			)
		);
		foreach($sidebars as $args) {
			register_sidebar($args);
		}
	}

	// plugins
	function register_required_plugins() {
		$plugins = array(
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
				'name'      => 'Timber',
				'slug'      => 'timber-library',
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

	// global context
	function add_to_context($context){
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		return $context;
	}

	// twig filters/functions
	function add_to_twig($twig){
		$twig->addExtension(new Twig_Extension_StringLoader());
		$twig->addFilter('debug', new Twig_Filter_Function('debug'));
		return $twig;
	}
}
new StarterSite();
function debug($msg)
{
	echo '<code class="container">';
	echo '<pre class="well">';
	print_r($msg);
	echo '</pre>';
	echo '</code>';
}