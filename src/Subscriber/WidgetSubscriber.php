<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressWidgetBoilerplate\Subscriber;

use WordPressWidgetBoilerplate\WordPress\Widget;
use WordPressWidgetBoilerplate\WordPress\WidgetAdmin;

/**
 * Initializes the core Widget class that's used by WordPress to instantiate the widget,
 * renders the administrative area, provide serialization functionality, and displays the
 * public-facing view.
 */
class WidgetSubscriber extends AbstractSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $hook)
    {
        parent::__construct($hook);
    }

    /**
     * Registers the core Widget class using the WordPress APIs.
     */
    public function load()
    {
        register_widget(
            new WidgetAdmin(
                'widget-name'
            )
        );
    }
}
