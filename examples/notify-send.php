<?php

require __DIR__.'/../vendor/autoload.php';

use Indigo\Notify\Manager;
use Indigo\Notify\Handler\NotifySendHandler;
use Indigo\Notify\Notification\Notification;

$manager = new Manager;

$handler = new NotifySendHandler;

$manager->addHandler($handler);

$parameters = $_SERVER['argv'];

array_shift($parameters);

$notification = new Notification('Message', $parameters);

$manager->send($notification);
