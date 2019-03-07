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
 * Deletes the cached contents of the widget.
 */
class DeleteWidgetCacheSubscriber extends AbstractSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $hook)
    {
        parent::__construct($hook);
    }

    /**
     * Flushes the widget's cache based on the key that's specified in the function arguments.
     */
    public function load()
    {
        /* Because we're implementing an abstract class, we'll parse arguments from the
         * func_get_args().
         */
        $args = \func_get_args();
        if (!$this->hasValidArguments($args)) {
            return;
        }

        $args = $args[0];
        wp_cache_delete($args[0], $args[1]);
    }

    /**
     * Verifies that we have valid arguments with which to work.
     *
     * @param array $args the array of arguments we are validating
     *
     * @return bool true if the arguments are valid; otherwise, false
     */
    private function hasValidArguments(array $args): bool
    {
        // First, check the initial index of the arguments.
        if (!isset($args[0])) {
            return false;
        }

        // Next, check the values of the arguments for the widget key and group.
        $args = $args[0];
        if (!isset($args[0]) && !isset($args[1])) {
            return false;
        }

        return true;
    }
}
