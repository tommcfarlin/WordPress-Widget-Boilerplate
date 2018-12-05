<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressWidgetBoilerplace;

class Plugin extends WP_Widget
{
    /**
     * TODO: Rename "widget-name" to the name your your widget.
     *
     * Unique identifier for your widget.
     *
     * @since    1.0.0
     *
     * @var string
     */
    protected $widgetSlug = 'widget-name';

    /**
     * Specifies the classname and description, instantiates the widget,
     * loads localization files, and includes necessary stylesheets and JavaScript.
     */
    public function __construct()
    {
        // load plugin text domain
        add_action('init', [$this, 'widgetTextdomain']);

        // TODO: update description
        parent::__construct(
            $this->getWidgetSlug(),
            __('Widget Name', $this->getWidgetSlug()),
            [
                'classname' => $this->getWidgetSlug().'-class',
                'description' => __('Short description of the widget goes here.', $this->getWidgetSlug()),
            ]
        );

        // Register admin styles and scripts
        add_action('admin_print_styles', [$this, 'registerAdminStyles']);
        add_action('admin_enqueue_scripts', [$this, 'registerAdminScripts']);

        // Register site styles and scripts
        add_action('wp_enqueue_scripts', [$this, 'registerWidgetStyles']);
        add_action('wp_enqueue_scripts', [$this, 'registerWidgetScripts']);

        // Refreshing the widget's cached output with each new post
        add_action('save_post', [$this, 'flushWidgetCache']);
        add_action('deleted_post', [$this, 'flushWidgetCache']);
        add_action('switch_theme', [$this, 'flushWidgetCache']);
    }

    /**
     * Return the widget slug.
     *
     * @since    1.0.0
     *
     * @return Plugin slug variable
     */
    public function getWidgetSlug()
    {
        return $this->widgetSlug;
    }

    /**
     * Outputs the content of the widget.
     *
     * @param array args  The array of form elements
     * @param array instance The current instance of the widget
     * @param mixed $args
     * @param mixed $instance
     */
    public function widget($args, $instance)
    {
        // Check if there is a cached output
        $cache = wp_cache_get($this->getWidgetSlug(), 'widget');

        if (!\is_array($cache)) {
            $cache = [];
        }

        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        if (isset($cache[$args['widget_id']])) {
            return print $cache[$args['widget_id']];
        }
        // go on with your widget logic, put everything into a string and …

        extract($args, EXTR_SKIP);

        $widgetString = $beforeWidget;

        // TODO: Here is where you manipulate your widget's values based on their input fields
        ob_start();
        include plugin_dir_path(__FILE__).'views/widget.php';
        $widgetString .= ob_get_clean();
        $widgetString .= $afterWidget;

        $cache[$args['widget_id']] = $widgetString;

        wp_cache_set($this->getWidgetSlug(), $cache, 'widget');

        echo $widgetString;
    }

    public function flushWidgetCache()
    {
        wp_cache_delete($this->getWidgetSlug(), 'widget');
    }

    /**
     * Processes the widget's options to be saved.
     *
     * @param array $newInstance The new instance of values to be generated via the update
     * @param array $oldInstance The previous instance of values before the update
     * @param mixed $newInstance
     * @param mixed $oldInstance
     */
    public function update($newInstance, $oldInstance)
    {
        $instance = $oldInstance;

        // TODO: Here is where you update your widget's old values with the new, incoming values

        return $instance;
    }

    /**
     * Generates the administration form for the widget.
     *
     * @param array instance The array of keys and values for the widget
     * @param mixed $instance
     */
    public function form($instance)
    {
        // TODO: Define default values for your variables
        $instance = wp_parse_args(
            (array) $instance
        );

        // TODO: Store the values of the widget in their own variable

        // Display the admin form
        include plugin_dir_path(__FILE__).'views/admin.php';
    }

    /**
     * Loads the Widget's text domain for localization and translation.
     */
    public function widgetTextdomain()
    {
        // TODO: be sure to change 'widget-name' to the name of *your* plugin
        load_plugin_textdomain($this->getWidgetSlug(), false, \dirname(plugin_basename(__FILE__)).'lang/');
    }

    /**
     * Fired when the plugin is activated.
     *
     * @param bool $networkWide true if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
     */
    public static function activate($networkWide)
    {
        // TODO: define activation functionality here
    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @param bool $networkWide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
     */
    public static function deactivate($networkWide)
    {
        // TODO:define deactivation functionality here
    }

    /**
     * Registers and enqueues admin-specific styles.
     */
    public function registerAdminStyles()
    {
        wp_enqueue_style($this->getWidgetSlug().'-admin-styles', plugins_url('css/admin.css', __FILE__));
    }

    /**
     * Registers and enqueues admin-specific JavaScript.
     */
    public function registerAdminScripts()
    {
        wp_enqueue_script($this->getWidgetSlug().'-admin-script', plugins_url('js/admin.js', __FILE__), ['jquery']);
    }

    /**
     * Registers and enqueues widget-specific styles.
     */
    public function registerWidgetStyles()
    {
        wp_enqueue_style($this->getWidgetSlug().'-widget-styles', plugins_url('css/widget.css', __FILE__));
    }

    /**
     * Registers and enqueues widget-specific scripts.
     */
    public function registerWidgetScripts()
    {
        wp_enqueue_script($this->getWidgetSlug().'-script', plugins_url('js/widget.js', __FILE__), ['jquery']);
    }
}

/*
// TODO: Remember to change 'Widget_Name' to match the class name definition
add_action('widgets_init', create_function('', 'register_widget("Widget_Name");'));

// Hooks fired when the Widget is activated and deactivated
// TODO: Remember to change 'Widget_Name' to match the class name definition
register_activation_hook(__FILE__, ['Widget_Name', 'activate']);
register_deactivation_hook(__FILE__, ['Widget_Name', 'deactivate']);
*/
