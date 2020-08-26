<?php
/**
 * Plugin Name: UAP Uganda Code Custom Widgets
 * Description: Adds custom widgets to Elementor.
 * Version:     1.0.0
 * Author:      Imokol Faith Ruth
 * Text Domain: uap-uganda
 */


namespace UAP\Custom;

use UAP\Custom\Widgets\UAP_Banner_Slider;
use UAP\Custom\Widgets\UAP_Recent_Posts;
use UAP\Custom\Widgets\UAP_Team;
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin{

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
     * @return Plugin An instance of the class.
     * @since 1.2.0
     * @access public
     *
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * widget_scripts
     *
     * Load required plugin core files.
     *
     * @since 1.2.0
     * @access public
     */
    public function widget_styles_and_scripts(){
        wp_enqueue_script('slick-js', PLUGIN_URL.'/assets/js/slick.min.js', array('jquery'));
        wp_enqueue_script('bootstrap-js', PLUGIN_URL.'/assets/js/bootstrap.min.js', array('jquery'));
        wp_enqueue_script('uap-custom-widgets-js', PLUGIN_URL.'/assets/js/scripts.js', array('slick-js'));
       
        wp_enqueue_style('slick-css', PLUGIN_URL.'/assets/css/slick.css');
        wp_enqueue_style('slick-theme-css', PLUGIN_URL.'/assets/css/slick-theme.css');
        wp_enqueue_style('bootstrap-css', PLUGIN_URL.'/assets/css/bootstrap.min.css');
        wp_enqueue_style('uap-custom-widgets-css', PLUGIN_URL.'/assets/css/styles.css');
    }

    /**
     * Include Widgets files
     *
     * Load widgets files
     *
     * @since 1.2.0
     * @access private
     */
    private function include_widgets_files()
    {
        require_once(__DIR__ . '/includes/widgets/uap-banner-slider.php');
        require_once(__DIR__ . '/includes/widgets/uap-recent-posts.php');
        require_once(__DIR__ . '/includes/widgets/uap-team.php');

    }

    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @since 1.2.0
     * @access public
     */
    public function register_widgets(){
        // Its is now safe to include Widgets files
        $this->include_widgets_files();

        // Register Widgets
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new UAP_Banner_Slider());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new UAP_Recent_Posts());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new UAP_Team());
    }

    /**
     *  Plugin class constructor
     *
     * Register plugin action hooks and filters
     *
     * @since 1.2.0
     * @access public
     */
    public function __construct()
    {

        define('PLUGIN_DIR', plugin_dir_path( __FILE__ ));
        define('PLUGIN_URL', plugin_dir_url( __FILE__ ));


        // Register widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);

        //enqueue scripts
        add_action( 'wp_enqueue_scripts', [$this, 'widget_styles_and_scripts'] );
    }
}

// Instantiate Plugin Class
Plugin::instance();