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

use Indigo\Notify\Notification\NotificationInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\ProcessBuilder;

/**
 * Notify Send Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class NotifySendHandler extends AbstractHandler
{
    const NOTIFY_SEND_COMMAND = 'notify-send';

    /**
     * Executable Finder
     *
     * @var ExecutableFinder
     */
    protected $executableFinder;

    /**
     * Creates a new Notify Send Handler
     *
     * @param ExecutableFinder $executableFinder
     */
    public function __construct(ExecutableFinder $executableFinder = null)
    {
        if ($executableFinder === null)
        {
            $executableFinder = new ExecutableFinder;
        }

        $this->executableFinder = $executableFinder;
    }

    /**
     * {@inheritdoc}
     */
    public function isHandling(NotificationInterface $notification)
    {
        return $this->isExecutableAvailable();
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function handle(NotificationInterface $notification)
    {
        if ($this->isExecutableAvailable() === false) {
            throw new \RuntimeException('Command not found: ' . self::NOTIFY_SEND_COMMAND);
        }

        $process = $this->getProcess($notification);
        $process->run();

        if ($process->isSuccessful() === false) {
            throw new ProcessFailedException($process);
        }

        return false === $this->bubble;
    }

    /**
     * Returns a Process
     *
     * @param NotificationInterface $notification
     *
     * @return Process
     */
    public function getProcess(NotificationInterface $notification)
    {
        $builder = new ProcessBuilder($notification->getParameters());

        $builder->setPrefix(self::NOTIFY_SEND_COMMAND);

        $builder->add($notification->getMessage());

        return $builder->getProcess();
    }

    /**
     * Returns whether executable is available or not
     *
     * @return boolean
     */
    public function isExecutableAvailable()
    {
        return $this->executableFinder->find(self::NOTIFY_SEND_COMMAND) !== null;
    }
}
