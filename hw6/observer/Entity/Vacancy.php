<?php


namespace Entity;


use SplObserver;

class Vacancy implements \SplSubject
{
    private $title;
    private $salary;
    private \SplObjectStorage $observers;

    /**
     * Vacancy constructor.
     * @param $title
     * @param $salary
     */
    public function __construct($title, $salary)
    {
        $this->title = $title;
        $this->salary = $salary;
        $this->observers = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $user = $observer->getUser();
        echo "Пользователь {$user->getName()} подписался на уведомления о вакансии {$this->title}.";
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $user = $observer->getUser();
        echo "Пользователь {$user->getName()} отписался от уведомлений о вакансии {$this->title}.";
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }
}