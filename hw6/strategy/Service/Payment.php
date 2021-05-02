<?php
namespace Service;
use Contract\PaySystemInterface;
use Entity\Order;

class Payment
{
    private bool $isSuccess;

    /**
     * Payment constructor.
     */
    public function __construct()
    {
        $this->isSuccess = false;
    }


    public function proceedPayment(PaySystemInterface $paySystem, Order $order) {
        if (!$order->isPaid() && !$this->isSuccess) {
            $paySystem->proceedPayment($order);
            $order->setIsPaid(true);
            $this->isSuccess = true;
        } else echo 'Заказ уже оплачен!';
    }
}