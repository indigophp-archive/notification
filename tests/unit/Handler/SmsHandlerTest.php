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

/**
 * Tests for Sms Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Handler\SmsHandler
 * @group              Notify
 * @group              Handler
 */
class SmsHandlerTest extends AbstractHandlerTest
{
    public function _before()
    {
        $gateway = \Mockery::mock('Indigo\\Sms\\Gateway\\GatewayInterface');

        $gateway->shouldReceive('send')
            ->andReturn(true);

        $this->handler = new SmsHandler($gateway);
    }

    public function testConstruct()
    {
        $gateway = \Mockery::mock('Indigo\\Sms\\Gateway\\GatewayInterface');

        $handler = new SmsHandler($gateway);
    }

    /**
     * @covers ::isHandling
     */
    public function testHandling()
    {
        $this->assertFalse($this->handler->isHandling($this->getNotificationMock()));

        $notification = \Mockery::mock('Indigo\\Notify\\Notification\\SmsNotification');

        $this->assertTrue($this->handler->isHandling($notification));

        $notification = $this->getNotificationMock();

        $notification->shouldReceive('getMessage')
            ->andReturn(\Mockery::mock('Indigo\\Sms\\Message'));

        $this->assertTrue($this->handler->isHandling($notification));
    }

    /**
     * @covers ::handle
     */
    public function testHandle()
    {
        $notification = $this->getNotificationMock();

        $notification->shouldReceive('getMessage')
            ->andReturn(\Mockery::mock('Indigo\\Sms\\Message'));

        $this->assertFalse($this->handler->handle($notification));
    }
}
