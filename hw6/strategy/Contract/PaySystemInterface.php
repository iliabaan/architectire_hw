<?php


namespace Contract;


use Entity\Order;

interface PaySystemInterface
{
public function proceedPayment(Order $order);
}