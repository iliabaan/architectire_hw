<?php
$arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 8, 8 ,9, 10];

$element = 8;

function deleteElementInArray($array, $element)
{
    $index = array_search($element, $array);
    if ($index) {
        unset($array[$index]);
        $array = deleteElementInArray($array, $element);
    }
    return $array;
}

$arr = deleteElementInArray($arr, $element);
var_dump($arr);

