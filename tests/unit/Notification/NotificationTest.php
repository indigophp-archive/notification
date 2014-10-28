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
 * Tests for Notification
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Notification\Notification
 * @group              Notify
 * @group              Notification
 */
class NotificationTest extends Test
{
    /**
     * Notification
     *
     * @var Notification
     */
    protected $notification;

    public function _before()
    {
        $this->notification = new Notification('Message', ['param1' => 'value1']);
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $notification = new Notification('Message', ['param1' => 'value1']);

        $this->assertEquals('Message', $notification->getMessage());
        $this->assertEquals(['param1' => 'value1'], $notification->getParameters());
    }

    /**
     * @covers ::getMessage
     * @covers ::setMessage
     */
    public function testMessage()
    {
        $this->assertSame($this->notification, $this->notification->setMessage('message'));
        $this->assertEquals('message', $this->notification->getMessage());
    }

    /**
     * @covers ::getParameters
     * @covers ::setParameters
     */
    public function testParameters()
    {
        $this->assertSame($this->notification, $this->notification->setParameters([]));
        $this->assertEquals([], $this->notification->getParameters());
    }
}
