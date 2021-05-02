<?php

namespace Repository;

use Contract\NotifyRepositoryInterface;

class SMSNotifyRepository implements NotifyRepositoryInterface
{
    private string $notify;

    public function __construct($notify)
    {
        $this->notify = $notify;
    }

    function sendNotify($notify): string
    {
        return 'Уведомление' . ' ' . $this->notify . ' ' . 'было отправлено с помощью SMS.';
    }

    /**
     * @return string
     */
    public function getNotify(): string
    {
        return $this->notify;
    }


}