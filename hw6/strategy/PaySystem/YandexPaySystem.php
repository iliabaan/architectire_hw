<?php


namespace PaySystem;


use Contract\PaySystemInterface;
use Entity\Order;

class YandexPaySystem implements PaySystemInterface
{
    public function proceedPayment(Order $order)
    {
        echo "Заказ на сумму {$order->getSum()} оплачен с помощью Yandex.";
    }
}