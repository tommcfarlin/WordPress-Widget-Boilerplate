<?php
/*
Plugin Name: TODO
Plugin URI: TODO
Description: TODO
Version: 1.0
Author: TODO
Author URI: TODO
Author Email: TODO
License:

  Copyright 2011 TODO (email@domain.com)

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

// TODO: change 'Plugin_Name' to the name of your actual plugin
class Plugin_Name extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/
	
	/**
	 * The widget constructor. Specifies the classname and description, instantiates
	 * the widget, loads localization files, and includes necessary scripts and
	 * styles.
	 */
  // TODO: This should match the title given in the class definition above.
	function Plugin_Name() {

    // Define constnats used throughout the plugin
    $this->init_plugin_constants();
  
    // TODO: update classname and description
		$widget_opts = array (
			'classname' => PLUGIN_NAME, 
			'description' => __('Short description of the plugin goes here.', PLUGIN_LOCALE)
		);	
		
		$this->WP_Widget(PLUGIN_SLUG, __(PLUGIN_NAME, PLUGIN_LOCALE), $widget_opts);
		load_plugin_textdomain(PLUGIN_LOCALE, false, dirname(plugin_basename( __FILE__ ) ) . '/lang/' );
		
    // Load JavaScript and stylesheets
    $this->register_scripts_and_styles();
		
	} // end constructor

	/*--------------------------------------------------*/
	/* API Functions
	/*--------------------------------------------------*/
	
	/**
	 * Outputs the content of the widget.
	 *
	 * @args			The array of form elements
	 * @instance
	 */
	function widget($args, $instance) {
	
		extract($args, EXTR_SKIP);
		
		echo $before_widget;
		
    // TODO: This is where you retrieve the widget values
    
		// Display the widget
		include(WP_PLUGIN_DIR . '/' . PLUGIN_SLUG . '/views/widget.php');
		
		echo $after_widget;
		
	} // end widget
	
	/**
	 * Processes the widget's options to be saved.
	 *
	 * @new_instance	The previous instance of values before the update.
	 * @old_instance	The new instance of values to be generated via the update.
	 */
	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;
		
    // TODO Update the widget with the new values
    
		return $instance;
		
	} // end widget
	
	/**
	 * Generates the administration form for the widget.
	 *
	 * @instance	The array of keys and values for the widget.
	 */
	function form($instance) {
	
    // TODO define default values for your variables
		$instance = wp_parse_args(
			(array)$instance,
			array(
				'' => ''
			)
		);
	
    // TODO store the values of widget in a variable
		
		// Display the admin form
    include(WP_PLUGIN_DIR . '/' . PLUGIN_SLUG . '/views/admin.php');
		
	} // end form
	
	/*--------------------------------------------------*/
	/* Private Functions
	/*--------------------------------------------------*/
	
  /**
   * Initializes constants used for convenience throughout 
   * the plugin.
   */
  private function init_plugin_constants() {
    
    /* TODO
     * 
     * This provides the unique identifier for your plugin used in
     * localizing the strings used throughout.
     * 
     * For example: wordpress-widget-boilerplate-locale.
     */
    if(!defined('PLUGIN_LOCALE')) {
      define('PLUGIN_LOCALE', 'plugin-name-locale');
    } // end if
    
    /* TODO
     * 
     * Define this as the name of your plugin. This is what shows
     * in the Widgets area of WordPress.
     * 
     * For example: WordPress Widget Boilerplate.
     */
    if(!defined('PLUGIN_NAME')) {
      define('PLUGIN_NAME', 'Plugin Name');
    } // end if
    
    /* TODO
     * 
     * this is the slug of your plugin used in initializing it with
     * the WordPress API.
     
     * This should also be the
     * directory in which your plugin resides. Use hyphens.
     * 
     * For example: wordpress-widget-boilerplate
     */
    if(!defined('PLUGIN_SLUG')) {
      define('PLUGIN_SLUG', 'plugin-name-slug');
    } // end if
  
  } // end init_plugin_constants
  
	/**
	 * Registers and enqueues stylesheets for the administration panel and the
	 * public facing site.
	 */
	private function register_scripts_and_styles() {
		if(is_admin()) {
      $this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/js/admin.js', true);
			$this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/css/admin.css');
		} else { 
      $this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/js/widget.js', true);
			$this->load_file(PLUGIN_NAME, '/' . PLUGIN_SLUG . '/css/widget.css');
		} // end if/else
	} // end register_scripts_and_styles

	/**
	 * Helper function for registering and enqueueing scripts and styles.
	 *
	 * @name	The 	ID to register with WordPress
	 * @file_path		The path to the actual file
	 * @is_script		Optional argument for if the incoming file_path is a JavaScript source file.
	 */
	private function load_file($name, $file_path, $is_script = false) {
		
    $url = WP_PLUGIN_URL . $file_path;
		$file = WP_PLUGIN_DIR . $file_path;
    
		if(file_exists($file)) {
			if($is_script) {
				wp_register_script($name, $url);
				wp_enqueue_script($name);
			} else {
				wp_register_style($name, $url);
				wp_enqueue_style($name);
			} // end if
		} // end if
    
	} // end load_file
	
} // end class
add_action('widgets_init', create_function('', 'register_widget("Plugin_Name");')); // TODO remember to change this to match the class definition above
?>