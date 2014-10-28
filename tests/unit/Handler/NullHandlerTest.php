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
 * Tests for Null Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Notify\Handler\NullHandler
 * @group              Notify
 * @group              Handler
 */
class NullHandlerTest extends AbstractHandlerTest
{
    public function _before()
    {
        $this->handler = new NullHandler;
    }

    /**
     * @covers ::handle
     */
    public function testHandle()
    {
        $this->assertFalse($this->handler->handle($this->getNotificationMock()));
    }
}
