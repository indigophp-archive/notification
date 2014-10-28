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
 * Tests for Abstract Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Handler\AbstractHandler
 * @group              Notify
 * @group              Handler
 */
class HandlerTest extends AbstractHandlerTest
{
    public function _before()
    {
        $this->handler = new NullHandler;
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $handler = new NullHandler(false);

        $this->assertFalse($handler->getBubble());
    }

    /**
     * @covers ::getBubble
     * @covers ::setBubble
     */
    public function testBubble()
    {
        $this->assertSame($this->handler, $this->handler->setBubble(false));
        $this->assertFalse($this->handler->getBubble());
    }

    /**
     * @covers ::isHandling
     */
    public function testDefaultHandling()
    {
        $notification = $this->getNotificationMock();

        $this->assertTrue($this->handler->isHandling($notification));
    }
}
