<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressWidgetBoilerplate\API;

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
     * @param mixed $widgetSlug
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
}
