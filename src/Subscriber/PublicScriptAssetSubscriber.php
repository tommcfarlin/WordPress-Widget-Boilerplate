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
 * The subscriber responsible for loading the JavaScript on the blog.
 */
class PublicScriptAssetSubscriber extends AbstractSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $hook)
    {
        parent::__construct($hook);
    }

    /**
     * Adds the JavaScript to the public-facing side of the site.
     */
    public function load()
    {
        if (is_admin()) {
            return;
        }

        wp_enqueue_script(
            'wordpress-widget-boilerplate',
            plugin_dir_url(\dirname(__DIR__)).'assets/js/widget.js'
        );
    }
}
