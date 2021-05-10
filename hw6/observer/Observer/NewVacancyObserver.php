<?php


namespace Observer;

use Entity\User;
use SplObserver;
use SplSubject;

class NewVacancyObserver implements SplObserver
{

    private User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @inheritDoc
     */
    public function update(SplSubject $subject)
    {
        echo "{$this->user->getName()}, появилась новая вакансия '{$subject->getTitle()}' с зарплатой '{$subject->getSalary()}.'";
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}