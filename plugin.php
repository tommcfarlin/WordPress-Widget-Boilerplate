<?php
/*
Plugin Name: TODO
Plugin URI: TODO
Description: TODO
Version: 1.0
Author: TODO
Author URI: TODO
Author Email: TODO
Text Domain: widget-name-locale
Domain Path: /lang/
Network: false
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright 2012 TODO (email@domain.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// TODO: change 'Widget_Name' to the name of your actual plugin
class Widget_Name extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/
	
	/**
	 * The widget constructor. Specifies the classname and description, instantiates
	 * the widget, loads localization files, and includes necessary scripts and
	 * styles.
	 */
	public function __construct() {
	
		// TODO be sure to change 'widget-name' to the name of *your* plugin
		load_plugin_textdomain( 'widget-name-locale', false, plugin_dir_path( __FILE__ ) . '/lang/' );
		
		// Manage plugin ativation/deactivation hooks
		register_activation_hook( __FILE__, array( &$this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );
		
		// TODO: update classname and description
		// TODO: replace 'widget-name-locale' to be named more plugin specific. other instances exist throughout the code, too.
		parent::__construct(
			'widget-name-id',
			__( 'Widget Name', 'widget-name-locale' ),
			array(
				'classname'		=>	'widget-name-class',
				'description'	=>	__( 'Short description of the widget goes here.', 'widget-name-locale' )
			)
		);
		
		// Register admin styles and scripts
		add_action( 'admin_print_styles', array( &$this, 'register_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'register_admin_scripts' ) );
	
		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( &$this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'register_widget_scripts' ) );
		
	} // end constructor

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/
	
	/**
	 * Outputs the content of the widget.
	 *
	 * @args			The array of form elements
	 * @instance		The current instance of the widget
	 */
	public function widget( $args, $instance ) {
	
		extract( $args, EXTR_SKIP );
		
		echo $before_widget;
		
    	// TODO: This is where you retrieve the widget values.
    	// Note that this 'Title' is just an example
    	$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Widget Name', 'widget-name-locale' ) : $instance['title'], $instance, $this->id_base);
    
		include( plugin_dir_path(__FILE__) . '/views/widget.php' );
		
		echo $after_widget;
		
	} // end widget
	
	/**
	 * Processes the widget's options to be saved.
	 *
	 * @new_instance	The previous instance of values before the update.
	 * @old_instance	The new instance of values to be generated via the update.
	 */
	public function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
		
		// TODO Update the widget with the new values
		// Note that this 'Title' is just an example
		$instance['title'] = strip_tags( $new_instance['title'] );
    
		return $instance;
		
	} // end widget
	
	/**
	 * Generates the administration form for the widget.
	 *
	 * @instance	The array of keys and values for the widget.
	 */
	public function form( $instance ) {
	
    	// TODO define default values for your variables
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'	=>	__( 'Widget Name', 'widget-name-locale' ),
			)
		);
	
		// TODO store the values of widget in a variable
		
		// Display the admin form
		include( plugin_dir_path(__FILE__) . '/views/admin.php' );	
		
	} // end form

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/
	
	/**
	 * Fired when the plugin is activated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
	 */
	public function activate( $network_wide ) {
		// TODO define activation functionality here
	} // end activate
	
	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog 
	 */
	public function deactivate( $network_wide ) {
		// TODO define deactivation functionality here		
	} // end deactivate
	
	/**
	 * Registers and enqueues admin-specific styles.
	 */
	public function register_admin_styles() {
	
		// TODO change 'widget-name' to the name of your plugin
		wp_register_style( 'widget-name-admin-styles', plugins_url( 'widget-name/css/admin.css' ) );
		wp_enqueue_style( 'widget-name-admin-styles' );
	
	} // end register_admin_styles

	/**
	 * Registers and enqueues admin-specific JavaScript.
	 */	
	public function register_admin_scripts() {
	
		// TODO change 'widget-name' to the name of your plugin
		wp_register_script( 'widget-name-admin-script', plugins_url( 'widget-name/js/admin.js' ) );
		wp_enqueue_script( 'widget-name-admin-script' );
		
	} // end register_admin_scripts
	
	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {
	
		// TODO change 'widget-name' to the name of your plugin
		wp_register_style( 'widget-name-widget-styles', plugins_url( 'widget-name/css/admin.css' ) );
		wp_enqueue_style( 'widget-name-widget-styles' );
		
	} // end register_widget_styles
	
	/**
	 * Registers and enqueues widget-specific scripts.
	 */
	public function register_widget_scripts() {
	
		// TODO change 'widget-name' to the name of your plugin
		wp_register_script( 'widget-name-admin-script', plugins_url( 'widget-name/js/admin.js' ) );
		wp_enqueue_script( 'widget-name-widget-script' );
		
	} // end register_widget_scripts
	
} // end class

// TODO remember to change 'Widget_Name' to match the class name definition
add_action( 'widgets_init', create_function( '', 'register_widget("Widget_Name");' ) ); 
?>