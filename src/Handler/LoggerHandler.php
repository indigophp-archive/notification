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
use Indigo\Notify\Notification\LoggerNotificationInterface;
use Psr\Log\LoggerInterface;

/**
 * Logger Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class LoggerHandler extends AbstractHandler
{
    use \Psr\Log\LoggerAwareTrait;

    /**
     * Default level
     *
     * @var string
     */
    protected $level;

    /**
     * Creates a new Logger Handler
     *
     * @param LoggerInterface $logger
     * @param string          $level
     * @param boolean         $bubble
     */
    public function __construct(LoggerInterface $logger, $level = 'debug', $bubble = true)
    {
        $this->logger = $logger;
        $this->level = $level;

        parent::__construct($bubble);
    }

    /**
     * Returns the level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Sets the level
     *
     * @param string $level
     *
     * @return this
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(NotificationInterface $notification)
    {
        $level = $this->level;

        if ($notification instanceof LoggerNotificationInterface) {
            $level = $notification->getLevel();
        }

        $this->logger->log(
            $level,
            $notification->getMessage(),
            $notification->getParameters()
        );

        return $this->bubble === false;
    }
}
