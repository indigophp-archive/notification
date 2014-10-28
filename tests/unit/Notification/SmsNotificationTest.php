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

use Codeception\TestCase\Test;

/**
 * Tests for Sms Notification
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Notification\SmsNotification
 * @group              Notify
 * @group              Notification
 */
class SmsNotificationTest extends Test
{
    public function _before()
    {
        $message = \Mockery::mock('Indigo\\Sms\\Message');

        $this->notification = new SmsNotification($message);
    }

    /**
     * @covers ::getMessage
     * @covers ::setMessage
     */
    public function testMessage()
    {
        $message = \Mockery::mock('Indigo\\Sms\\Message');

        $this->assertSame($this->notification, $this->notification->setMessage($message));
        $this->assertEquals($message, $this->notification->getMessage());
    }

    /**
     * @covers            ::setMessage
     * @expectedException InvalidArgumentException
     */
    public function testFaultyMessage()
    {
        $this->notification->setMessage('');
    }
}
