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

use Indigo\Sms\Message;

/**
 * Sms Notification
 *
 * Use this class to ensure that a valid Sms Message is provided
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class SmsNotification extends Notification
{
    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        if ($message instanceof Message === false) {
            throw new \InvalidArgumentException('Message should be an instance of Indigo\\Sms\\Message');
        }

        return parent::setMessage($message);
    }
}
