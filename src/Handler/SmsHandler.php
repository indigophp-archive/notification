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
use Indigo\Notify\Notification\SmsNotification;
use Indigo\Sms\Message;
use Indigo\Sms\Gateway\GatewayInterface;

/**
 * Sms Handler
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class SmsHandler extends AbstractHandler
{
    /**
     * Gateway
     *
     * @var GatewayInterface
     */
    protected $gateway;

    /**
     * Creates a new Sms Handler
     *
     * @param GatewayInterface $gateway
     * @param boolean          $bubble
     */
    public function __construct(GatewayInterface $gateway, $bubble = true)
    {
        $this->gateway = $gateway;

        parent::__construct($bubble);
    }

    /**
     * {@inheritdoc}
     */
    public function isHandling(NotificationInterface $notification)
    {
        return $notification instanceof SmsNotification or $notification->getMessage() instanceof Message;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(NotificationInterface $notification)
    {
        $this->gateway->send($notification->getMessage());

        return false === $this->bubble;
    }
}
