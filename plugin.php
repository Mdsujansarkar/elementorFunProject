<?php
namespace ElementorFunProject;

 
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {
 
  /**
   * Instance
   *
   * @since 1.0.0
   * @access private
   * @static
   *
   * @var Plugin The single instance of the class.
   */
  private static $_instance = null;
 
  /**
   * Instance
   *
   * Ensures only one instance of the class is loaded or can be loaded.
   *
   * @since 1.2.0
   * @access public
   *
   * @return Plugin An instance of the class.
   */
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
           
    return self::$_instance;
  }
   /**
   *  Plugin class constructor
   *
   * Register plugin action hooks and filters
   *
   * @since 1.2.0
   * @access public
   */
  public function __construct() {
    // Text Domain Load
    add_action( 'plugins_loaded', [ $this, 'loadtext_domain']);
    // Register widget scripts
    add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
 
    // Register widgets
    add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
    // Widget Style Enqueue
    add_action( 'wp_enqueue_scripts', [ $this, 'ele_slick_slider'] );
  
    //bootstrap main css
    add_action( 'wp_enqueue_scripts', [ $this, 'ele_slick_slider_bootstrap']);
  
    
  }
  
  /**
   * loadtext_domain
   *
   * Load text domain.
   *
   * @since 1.2.0
   * @access public
   */
  public function loadtext_domain() {
    load_plugin_textdomain( 'fun-project', false, plugin_dir_url(__FILE__) . "/languages");
  }
  
  /**
   * ele_slick_slider_bootstrap
   *
   * Fonts Load
   *
   * @since 1.2.0
   * @access public
   */
  public function ele_slick_slider_bootstrap() {
    wp_enqueue_style( 'ele-slick-slider-bootstrap-main', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
  }
  /**
   * ele_slick_slider
   *
   * Load .
   *
   * @since 1.2.0
   * @access public
   */
  public function ele_slick_slider() {
    wp_enqueue_style( 'ele-slick-slider-style', plugin_dir_url(__FILE__) . "assets/css/custom.css");
  }
  /**
   * widget_scripts
   *
   * Load required plugin core files.
   *
   * @since 1.2.0
   * @access public
   */
  public function widget_scripts() {
    wp_register_script( 'elementor-awesomesauce', plugins_url( '/assets/js/custom.js', __FILE__ ), [ 'jquery' ], false, true );
  }
 
  /**
   * Include Widgets files
   *
   * Load widgets files
   *
   * @since 1.2.0
   * @access private
   */
  private function include_widgets_files() {
    require_once( __DIR__ . '/widgets/fun-project.php' );
    require_once( __DIR__ . '/widgets/dual-heading.php' );
  }
 
  /**
   * Register Widgets
   *
   * Register new Elementor widgets.
   *
   * @since 1.2.0
   * @access public
   */
  public function register_widgets() {
    // Its is now safe to include Widgets files
    $this->include_widgets_files();
 
    // Register Widgets
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\FunProject() );
    // 
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\DualHeading() );
  }
 
}
 
// Instantiate Plugin Class
Plugin::instance();