<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://woofx.kaizenflow.xyz
 * @since      1.0.0
 *
 * @package    Easy_Slider
 * @subpackage Easy_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Slider
 * @subpackage Easy_Slider/public
 * @author     WooFx <info@kaizenflow.xyz>
 */
class Easy_Slider_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if( has_block('easy-slider/slider-block')){

			if (defined('WP_DEBUG') && true === WP_DEBUG) {
				wp_enqueue_style( 'slick', plugin_dir_url( __FILE__ ) . 'css/slick.css', array( ), $this->version, 'all' );
				wp_enqueue_style( 'slick-theme', plugin_dir_url( __FILE__ ) . 'css/slick-theme.css', array( ), $this->version, 'all' );

			}
			else{
				wp_enqueue_style( 'slick', plugin_dir_url( __FILE__ ) . 'css/slick.min.css', array( ), $this->version, 'all' );
			}
			
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if( has_block('easy-slider/slider-block') ){
			if (defined('WP_DEBUG') && true === WP_DEBUG) {
				wp_enqueue_script( 'slick', plugin_dir_url( __FILE__ ) . 'js/slick.js', array('jquery' ), $this->version, 'all' );
			}
			else{
				wp_enqueue_script( 'slick', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array( 'jquery' ), $this->version, 'all' );
			}
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-slider-public.js', array( 'slick' ), $this->version, false );

		}
		

		
	}

}
