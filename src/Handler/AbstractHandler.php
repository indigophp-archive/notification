<?php

/*
 * This file is part of the Indigo Notify packageWhether the messages that are handled can bubble up the stack or not.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Notify\Handler;

use Indigo\Notify\Notification\NotificationInterface;

/**
 * Abstract Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class AbstractHandler implements HandlerInterface
{
    /**
     * Whether the messages that are handled can bubble up the stack or not
     *
     * @var boolean
     */
    protected $bubble = true;

    /**
     * Creates a new Handler
     *
     * @param boolean $bubble
     */
    public function __construct($bubble = true)
    {
        $this->bubble = $bubble;
    }

    /**
     * {@inheritdoc}
     */
    public function isHandling(NotificationInterface $notification)
    {
        return true;
    }

    /**
     * Returns the bubble
     *
     * @return boolean
     */
    public function getBubble()
    {
        return $this->bubble;
    }

    /**
     * Sets the bubble
     *
     * @param boolean $bubble
     *
     * @return this
     */
    public function setBubble($bubble)
    {
        $this->bubble = (bool) $bubble;

        return $this;
    }
}
