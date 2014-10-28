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
 * Tests for Logger Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Handler\LoggerHandler
 * @group              Notify
 * @group              Handler
 */
class LoggerHandlerTest extends AbstractHandlerTest
{
    public function _before()
    {
        $logger = \Mockery::mock('Psr\\Log\\LoggerInterface');

        $logger->shouldReceive('log')
            ->andReturn(true);

        $this->handler = new LoggerHandler($logger);
    }

    public function testConstruct()
    {
        $logger = \Mockery::mock('Psr\\Log\\LoggerInterface');

        $handler = new LoggerHandler($logger);

        $this->assertEquals('debug', $handler->getLevel());
    }

    /**
     * @covers ::getLevel
     * @covers ::setLevel
     */
    public function testLevel()
    {
        $this->assertSame($this->handler, $this->handler->setLevel('info'));
        $this->assertEquals('info', $this->handler->getLevel());
    }

    /**
     * @covers ::handle
     */
    public function testHandle()
    {
        $this->assertFalse($this->handler->handle($this->getNotificationMock()));

        $notification = \Mockery::mock('Indigo\\Notify\\Notification\\NotificationInterface', 'Indigo\\Notify\\Notification\\LoggerNotificationInterface');

        $notification->shouldReceive('getLevel')
            ->andReturn('notice');

        $notification->shouldReceive('getMessage')
            ->andReturn(null)
            ->byDefault();

        $notification->shouldReceive('getParameters')
            ->andReturn([])
            ->byDefault();

        $this->assertFalse($this->handler->handle($notification));
    }
}
