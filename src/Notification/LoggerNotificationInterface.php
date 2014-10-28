<?php

/*
 * This file is part of the Indigo Notify package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Notify\Notification;

/**
 * Logger Notification Interface
 *
 * Use this to create custom leveled notifications
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface LoggerNotificationInterface
{
    /**
     * Returns the notification level
     *
     * @return string
     */
    public function getLevel();
}
