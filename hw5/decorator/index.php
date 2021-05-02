<?php

namespace Decorator;

use Entity\Notify;
use Repository\CnNotifyRepository;
use Repository\EmailNotifyRepository;
use Repository\SMSNotifyRepository;
use Service\NotifyService;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Decorator/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$notify = new Notify('Hello!');

$notifies = new NotifyService(new CnNotifyRepository($notify->getText()));
$notifies->sendNotify();


$notifies = new NotifyService(new EmailNotifyRepository($notify->getText()), $notifies);
$notifies->sendNotify();

$notifies = new NotifyService(new SMSNotifyRepository($notify->getText()), $notifies);
$notifies->sendNotify();

echo $notifies->showNotifies();
