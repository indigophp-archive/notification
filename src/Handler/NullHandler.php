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
 * Null Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class NullHandler extends AbstractHandler
{
    /**
     * {@inheritdoc}
     */
    public function handle(NotificationInterface $notification)
    {
        return false === $this->bubble;
    }
}
