<?php


namespace Service;


use Contract\NotifyRepositoryInterface;

class NotifyService
{
    private NotifyRepositoryInterface $repository;

    private $notifies = [];
    private ?NotifyService $notify;

    /**
     * NotifyService constructor.
     * @param NotifyRepositoryInterface $repository
     * @param NotifyService|null $notify
     */
    public function __construct(NotifyRepositoryInterface $repository, NotifyService $notify = null)
    {
        $this->notify = $notify;
        $this->repository = $repository;
        $this->notifies = $notify->notifies;
    }

    function sendNotify()
    {
        if ($this->notify) {
            array_push($this->notifies, $this->repository->sendNotify($this->repository->getNotify()));
        } else {
            $this->notifies[] = $this->repository->sendNotify($this->repository->getNotify());
        }

    }

    function showNotifies(): string
    {
        $message = '';
            foreach ($this->notifies as $value) {
                $message .= $value . PHP_EOL;
            }

        return $message;
    }

}