<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressWidgetBoilerplate\WordPress;

use WP_Widget;

class Widget extends WP_Widget
{
    /**
     * @var string unique identifier for your widget
     */
    protected $widgetSlug;

    /**
     * Initializes the plugin by setting its properties and calling the parent class with the description.
     *
     * @param string           $widgetSlug       unique identifier for your widget
     * @param WidgetSerializer $widgetSerializer the class responsible for saving widget options
     */
    public function __construct($widgetSlug)
    {
        $this->widgetSlug = $widgetSlug;

        parent::__construct(
            $this->getWidgetSlug(),
            __('Widget Name', $this->getWidgetSlug()),
            [
                'classname' => $this->getWidgetSlug().'-class',
                'description' => __('Short description of the widget goes here.', $this->getWidgetSlug()),
            ]
        );
    }

    /**
     * Return the widget slug.
     *
     * @return string slug variable
     */
    public function getWidgetSlug()
    {
        return $this->widgetSlug;
    }

    /**
     * Displays the administrative view of the form and includes the options
     * for the instance of the widget as arguments passed into the function.
     *
     * @param array $instance the options for the instance of this widget
     */
    public function form($instance)
    {
        include plugin_dir_path(__FILE__).'Views/Admin.php';
    }

    /**
     * Updates the values of the widget. Uses the serialization class to sanitize the
     * information before saving it.
     *
     * @param array $newInstance the values to be sanitized and saved
     * @param array $oldInstance the values that were originally saved
     */
    public function update($newInstance, $oldInstance)
    {
        return $this->widgetSerializer->update($newInstance, $oldInstance);
    }

    /**
     * If the value for the key exists in the current instance of the widget, then it will
     * retrieve it. Otherwise, it will return an empty value.
     *
     * @param string $key      the used to identify the value of the widget
     * @param array  $instance the options for the instance of this widget
     */
    protected function get($key, $instance)
    {
        return empty($instance[$key]) ? '' : $instance[$key];
    }
}
