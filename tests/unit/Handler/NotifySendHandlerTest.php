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
 * Tests for Notify Send Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Handler\NotifySendHandler
 * @group              Notify
 * @group              Handler
 */
class NotifySendHandlerTest extends AbstractHandlerTest
{
    public function _before()
    {
        $this->handler = new NotifySendHandler;
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $handler = new NotifySendHandler();
    }

    /**
     * @covers ::isExecutableAvailable
     * @covers ::isHandling
     */
    public function testExecutable()
    {
        $isAvailable = $this->handler->isExecutableAvailable();

        $this->assertEquals($isAvailable, $this->handler->isHandling($this->getNotificationMock()));
    }

    /**
     * @covers ::getProcess
     */
    public function testProcess()
    {
        $notification = $this->getNotificationMock();

        $this->assertInstanceOf('Symfony\\Component\\Process\\Process', $this->handler->getProcess($notification));
    }
}
