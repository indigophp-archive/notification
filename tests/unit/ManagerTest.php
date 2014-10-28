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

use Codeception\TestCase\Test;

/**
 * Tests for Manager
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Manager
 * @group              Notify
 */
class ManagerTest extends Test
{
    /**
     * Manager
     *
     * @var Manager
     */
    protected $manager;

    public function _before()
    {
        $this->manager = new Manager;

        $handler = \Mockery::mock('Indigo\\Notify\\Handler\\HandlerInterface');

        $handler->shouldReceive('isHandling')
            ->andReturn(true)
            ->byDefault();

        $handler->shouldReceive('handle')
            ->andReturn(true)
            ->byDefault();

        $this->manager->addHandler($handler);
    }

    /**
     * @covers ::send
     */
    public function testSend()
    {
        $notification = \Mockery::mock('Indigo\\Notify\\Notification\\NotificationInterface');

        $this->assertTrue($this->manager->send($notification));
    }

    /**
     * @covers ::send
     */
    public function testSendBubbling()
    {
        $notification = \Mockery::mock('Indigo\\Notify\\Notification\\NotificationInterface');

        $handlers = $this->manager->getHandlers();
        $handlers[0]->shouldReceive('handle')->andReturn(false);

        $this->assertTrue($this->manager->send($notification));
    }

    /**
     * @covers ::getHandlers
     * @covers ::addHandler
     * @covers ::clearHandlers
     */
    public function testHandlers()
    {
        $handler = \Mockery::mock('Indigo\\Notify\\Handler\\HandlerInterface');

        $this->assertSame($this->manager, $this->manager->addHandler($handler));

        $handlers = $this->manager->getHandlers();

        $this->assertInternalType('array', $handlers);
        $this->assertSame($handler, end($handlers));
        $this->assertSame($this->manager, $this->manager->addHandler($handler, true));

        $handlers = $this->manager->getHandlers();

        $this->assertSame($handler, reset($handlers));
        $this->assertEquals($handlers, $this->manager->clearHandlers());
        $this->assertEquals(array(), $this->manager->getHandlers());
    }
}
