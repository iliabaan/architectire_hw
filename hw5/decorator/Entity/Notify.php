<?php

namespace Entity;

class Notify
{
    private $text;

    /**
     * Notify constructor.
     * @param $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

}