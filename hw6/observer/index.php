<?php
namespace observer;

use Entity\User;
use Entity\Vacancy;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Observer/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});


$user = new User('John', 'email@example.com', '2');
$user1 = new User('Nick', 'email1@example.com', 4);

$vacancy = new Vacancy('Dev', 10000);

$observer1 = new NewVacancyObserver($user);
$vacancy->attach($observer1);
echo PHP_EOL;
$observer2 = new NewVacancyObserver($user1);
$vacancy->attach($observer2);

echo PHP_EOL;

$vacancy->notify();

$vacancy->detach($observer1);

