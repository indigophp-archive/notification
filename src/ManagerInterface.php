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

use Indigo\Notify\Notification\NotificationInterface;

/**
 * Manager Interface
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface ManagerInterface
{
    /**
     * Sends a notification
     *
     * @param NotificationInterface $notification
     *
     * @return boolean
     */
    public function send(NotificationInterface $notification);
}
