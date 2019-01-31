<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressWidgetBoilerplate\Subscriber;

/**
 * The subscriber responsible for loading the stylesheet on the Widget administration page.
 */
class AdminStyleAssetSubscriber extends AbstractSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $hook)
    {
        parent::__construct($hook);
    }

    /**
     * Adds the administrative stylesheet to the widget administration page.
     */
    public function load()
    {
        if ('widgets' !== get_current_screen()->id) {
            return;
        }

        wp_enqueue_style(
            'wordpress-widget-boilerplate',
            plugin_dir_url(\dirname(__DIR__)).'assets/css/admin.css'
        );
    }
}
