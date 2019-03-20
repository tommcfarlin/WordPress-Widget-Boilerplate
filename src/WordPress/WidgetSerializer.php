<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressWidgetBoilerplate\WordPress;

/**
 * Santiizes and saves the data for the widget.
 */
class WidgetSerializer
{
    /**
     * @var string a reference to the slug of the widget to which the serialier is associated
     */
    private $widgetSlug;

    /**
     * Initializes the class.
     *
     * @param string a reference to the slug of the widget to which the serialier is associated
     */
    public function __construct(string $widgetSlug)
    {
        $this->widgetSlug = $widgetSlug;
    }

    /**
     * Updates the values of the widget. Sanitizes the information before saving it.
     *
     * @param array $newInstance the array of new options to save
     */
    public function update($newInstance)
    {
        $instance = [];
        foreach ($newInstance as $key => $value) {
            $instance[$key] = strip_tags(
                stripslashes($value)
            );
        }

        do_action('flush_widget_cache', [$this->widgetSlug, 'widget']);

        return $instance;
    }
}
