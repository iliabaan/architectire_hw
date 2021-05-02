<?php


namespace Repository;


class EmailNotifyRepository implements \Contract\NotifyRepositoryInterface
{
    private string $notify;

    public function __construct($notify)
    {
        $this->notify = $notify;
    }

    function sendNotify($notify): string
    {
        return 'Уведомление' . ' ' . $this->notify . ' ' . 'было отправлено с помощью Email.';
    }

    /**
     * @return string
     */
    public function getNotify(): string
    {
        return $this->notify;
    }
}