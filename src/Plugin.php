<?php

/*
 * This file is part of WordPress Widget Boilerplate
 * (c) Tom McFarlin <tom@tommcfarlin.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WordPressWidgetBoilerplate;

use WordPressWidgetBoilerplate\Utilities\Registry;

/**
 * The base class for this plugin. Maintains a copy of the registry and starts
 * all of the objects that should hook into WordPress.
 */
class Plugin
{
    /**
     * @var Registry a reference to the simple container used to maintain plugin objects
     */
    private $registry;

    /**
     * @param Registry $registry a reference to the simple container used to maintain plugin objects
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Iterates through each of the subscribers maintained in the registry and registers them
     * to the proper WordPress hook.
     */
    public function start()
    {
        array_map(function ($subscriber) {
            add_action($subscriber->getHook(), [$subscriber, 'load']);
        }, $this->registry->getRegisteredSubscribers());

        if (is_admin()) {
            array_map(function ($object) {
                $object->load();
            }, $this->registry->getRegisteredObjects());
        }
    }
}
