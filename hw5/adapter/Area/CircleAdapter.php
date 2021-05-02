<?php


namespace Area;


use Contract\ICircle;
use Service\CircleAreaLib;

class CircleAdapter implements ICircle
{

    function circleArea(int $circumference)
    {
        $diagonal = $circumference / M_PI;
        $circleArea = new CircleAreaLib();
        return $circleArea->getCircleArea($diagonal);
    }
}