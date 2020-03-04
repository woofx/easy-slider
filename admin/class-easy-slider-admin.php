<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://woofx.kaizenflow.xyz
 * @since      1.0.0
 *
 * @package    Easy_Slider
 * @subpackage Easy_Slider/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Easy_Slider
 * @subpackage Easy_Slider/admin
 * @author     WooFx <info@kaizenflow.xyz>
 */
class Easy_Slider_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name.'-editor-css', plugin_dir_url( __FILE__ ) . 'css/editor.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		
	}

	/**
	 * Register the JavaScript for the block editor.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_block_editor_assets() {

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

		if ( ! function_exists( 'register_block_type' ) ) {
			// Gutenberg is not active.
			return;
		}

		// automatically load dependencies and version
		$asset_file = require( plugin_dir_path( __FILE__ ) . '../blocks/build/index.asset.php');
		$block_slug = $this->plugin_name.'-blocks-slider';
		
		wp_register_script(
			$block_slug, 
			plugin_dir_url( __FILE__ ) . '../blocks/build/index.js', 
			$asset_file['dependencies'],
			$asset_file['version']
		);

		
	 
		register_block_type( 'easy-slider/slider-block', array(
			'editor_script' => $block_slug,
		) );

		

	}

}
