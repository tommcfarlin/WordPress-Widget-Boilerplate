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
 * Manages the administrative functionality of the widget.
 */
class WidgetAdmin extends Widget
{
    /**
     * {@inheritdoc}
     */
    public function __construct($widgetSlug)
    {
        parent::__construct($widgetSlug);
        $this->widgetSerializer = new WidgetSerializer($this->getWidgetSlug());
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
}
