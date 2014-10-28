<?php

/*
 * This file is part of the Indigo Notify package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Notify;

use Indigo\Notify\Handler\HandlerInterface;
use Indigo\Notify\Notification\NotificationInterface;

/**
 * Manager
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Manager implements ManagerInterface
{
    /**
     * Handlers
     *
     * @var HandlerInterface[]
     */
    protected $handlers = array();

    /**
     * {@inheritdoc}
     */
    public function send(NotificationInterface $notification)
    {
        $isHandled = false;

        // Try to handle the notification
        foreach ($this->handlers as $handler) {
            if ($handler->isHandling($notification)) {
                $isHandled = true;

                if ($handler->handle($notification)) {
                    break;
                }
            }
        }

        return $isHandled;
    }

    /**
     * Returns the handlers
     *
     * @return HandlerInterface[]
     */
    public function getHandlers()
    {
        return $this->handlers;
    }

    /**
     * Adds a handler to the stack
     *
     * @param HandlerInterface $handler
     * @param boolean          $prepend
     *
     * @return this
     */
    public function addHandler(HandlerInterface $handler, $prepend = false)
    {
        if ($prepend) {
            array_unshift($this->handlers, $handler);
        } else {
            $this->handlers[] = $handler;
        }

        return $this;
    }

    /**
     * Clears the handler stack and returns old handlers
     *
     * @return HandlerInterface[]
     */
    public function clearHandlers()
    {
        $handlers = $this->handlers;

        $this->handlers = array();

        return $handlers;
    }
}
