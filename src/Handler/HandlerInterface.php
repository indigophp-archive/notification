<?php

/*
 * This file is part of the Indigo Notify package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Notify\Handler;

use Indigo\Notify\Notification\NotificationInterface;

/**
 * Handler Interface
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface HandlerInterface
{
    /**
     * Checks whether handler should handle notification
     *
     * @param NotificationInterface $notification
     *
     * @return boolean
     */
    public function isHandling(NotificationInterface $notification);

    /**
     * Handles a notification
     *
     * @param NotificationInterface $notification
     *
     * @return boolean False means manager can bubble up the stack or the record has not been processed
     */
    public function handle(NotificationInterface $notification);
}
