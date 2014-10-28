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

use Codeception\TestCase\Test;

/**
 * Tests for Handlers
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class AbstractHandlerTest extends Test
{
    /**
     * Handler
     *
     * @var HandlerInterface
     */
    protected $handler;

    /**
     * Returns a notification mock
     *
     * @return NotificationInterface
     */
    public function getNotificationMock()
    {
        $mock = \Mockery::mock('Indigo\\Notify\\Notification\\NotificationInterface');

        $mock->shouldReceive('getMessage')
            ->andReturn(null)
            ->byDefault();

        $mock->shouldReceive('getParameters')
            ->andReturn([])
            ->byDefault();

        return $mock;
    }
}
