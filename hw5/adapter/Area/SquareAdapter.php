<?php


namespace Area;


use Contract\ISquare;
use Service\SquareAreaLib;

class SquareAdapter implements ISquare
{

    function squareArea(int $sideSquare): float
    {
        $diagonal = sqrt(2) * $sideSquare;
        $squareArea = new SquareAreaLib();
        return $squareArea->getSquareArea($diagonal);
    }
}