<?php


namespace Entity;


class Order
{
    private int $sum;
    private string $phone;
    private bool $isPaid;

    /**
     * Order constructor.
     * @param int $sum
     * @param string $phone
     */
    public function __construct(int $sum, string $phone)
    {
        $this->sum = $sum;
        $this->phone = $phone;
        $this->isPaid = false;
    }

    /**
     * @return int
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->isPaid;
    }

    /**
     * @param bool $isPaid
     */
    public function setIsPaid(bool $isPaid): void
    {
        $this->isPaid = $isPaid;
    }



}