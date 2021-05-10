<?php

namespace strategy;
use Entity\Order;
use PaySystem\QiwiPaySystem;
use PaySystem\WebmoneyPaySystem;
use PaySystem\YandexPaySystem;
use Service\Payment;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Strategy/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$order = new Order(233, '79991231213');
$order1 = new Order(1234, '79991231213');


$payment = new Payment();
$payment1 = new Payment();

$payment->proceedPayment(new QiwiPaySystem(), $order);
echo PHP_EOL;
$payment->proceedPayment(new QiwiPaySystem(), $order);
echo PHP_EOL;
$payment->proceedPayment(new YandexPaySystem(), $order);
echo PHP_EOL;
$payment->proceedPayment(new WebmoneyPaySystem(), $order1);
echo PHP_EOL;
$payment1->proceedPayment(new YandexPaySystem(), $order1);


