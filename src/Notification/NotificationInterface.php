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
 * Notification Interface
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface NotificationInterface
{
    /**
     * Returns the message
     *
     * @return string
     */
    public function getMessage();

    /**
     * Sets the message
     *
     * @param string $message
     *
     * @return this
     */
    public function setMessage($message);

    /**
     * Returns the parameters
     *
     * @return array
     */
    public function getParameters();

    /**
     * Sets the parameters
     *
     * @param array $parameters
     *
     * @return this
     */
    public function setParameters(array $parameters);
}
