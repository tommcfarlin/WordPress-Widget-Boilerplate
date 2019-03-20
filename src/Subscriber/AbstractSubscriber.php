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
 * An abstract implementation of a subscriber that requires a hook and the ability to
 * start the class.
 */
abstract class AbstractSubscriber
{
    /**
     * @var string a reference to the hook to which the subscriber should be registered
     */
    protected $hook;

    /**
     * @param string $hook the hook to which the subscriber is registered
     */
    public function __construct(string $hook)
    {
        $this->hook = $hook;
    }

    /**
     * @return string the hook to which the subscriber is registered
     */
    public function getHook(): string
    {
        return $this->hook;
    }

    /**
     * Implements the domain logic for the concrete class implementating this subcriber.
     */
    abstract public function load();
}
