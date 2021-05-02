<?php

namespace adapter;

use Area\CircleAdapter;
use Area\SquareAdapter;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^adapter/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$square = new SquareAdapter();
$circle = new CircleAdapter();

echo $square->squareArea(100);
echo PHP_EOL;
echo $circle->circleArea(9);