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

/**
 * Base Notification
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Notification implements NotificationInterface
{
    /**
     * Message
     *
     * @var string
     */
    protected $message;

    /**
     * Parameters
     *
     * @var array
     */
    protected $parameters = array();

    /**
     * Creates a new Notification
     *
     * @param string $message
     * @param array  $parameters
     */
    public function __construct($message = null, array $parameters = array())
    {
        $this->setMessage($message);
        $this->setParameters($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }
}
