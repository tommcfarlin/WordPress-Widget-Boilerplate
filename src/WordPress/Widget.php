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
     * @param string $widgetSlug unique identifier for your widget
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
     *
     * @SuppressWarnings("unused")
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
     * Displays the widget based on the contents of the included template.
     *
     * @param array $args     argument provided by WordPress that may be useful in rendering the widget
     * @param array $instance the values of the widget
     */
    public function widget($args, $instance)
    {
        // Get a cached version of the widget. If it's empty, cache what we
        $cache = $this->getCachedWidget();
        if (empty($cache)) {
            $this->cacheWidget($args, $instance);
        }

        return $this->widgetDisplay->show($args, $instance);
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

    /**
     * @return array the cached instance of this widget if it's not empty.
     */
    private function getCachedWidget()
    {
        $cache = wp_cache_get($this->getWidgetSlug(), 'widget');
        if (!empty($cache)) {
            return $cache;
        }
        return [];
    }

    /**
     * Caches the values for the instance of this widget.
     *
     * @param array $args     argument provided by WordPress that may be useful in rendering the widget
     * @param array $instance the values of the widget
     */
    private function cacheWidget($args, $instance)
    {
        $cache = [];
        $cache['widget_id'] = $args['widget_id'];
        $cache['title'] = empty($instance['title']) ? '' : $instance['title'];
        $cache['content'] = empty($instance['content']) ? '' : $instance['content'];

        $instance['display-title'] = isset($instance['display-title']) ? $instance['display-title'] : '';
        $cache['display-title'] = $instance['display-title'];

        wp_cache_set($this->getWidgetSlug(), $cache, 'widget');
    }
}
