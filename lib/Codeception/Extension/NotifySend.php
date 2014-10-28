<?php

/*
 * This file is part of the Indigo Notify package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Codeception\Extension;

use Indigo\Notify\Manager;
use Indigo\Notify\Handler\NotifySendHandler;
use Indigo\Notify\Notification\Notification;
use Codeception\Event\PrintResultEvent;

/**
 * Notify Extension
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class NotifySend extends \Codeception\Platform\Extension
{
    /**
     * {@inheritdoc}
     */
    public static $events = [
        'result.print.after' => 'notify'
    ];

    function notify(PrintResultEvent $e)
    {
        $result = $e->getResult();
        $failed = $result->failureCount() or $result->errorCount();

        $manager = new Manager;
        $manager->addHandler(new NotifySendHandler);

        $message = 'passed';
        $icon = 'info';

        if ($failed) {
            $message = 'failed.';
            $icon = 'error';
        }

        $notification = new Notification('Codeception Tests ' .$message.'.', ['--icon='.$icon]);

        $manager->send($notification);
    }
}
