<?php

const COUNT = 10000;
const MIN_RAND = 1;
const MAX_RAND = 30000;

function quickSortLesson(array $mas): array
{
    $arrCount = count($mas);

    if ($arrCount <= 1) {
        return $mas;
    }

    $base = $mas[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < $arrCount; $i++) {

        if ($base >= $mas[$i]) {
            $left[] = $mas[$i];
        } else {
            $right[] = $mas[$i];
        }
    }

    $left = quickSortLesson($left);
    $right = quickSortLesson($right);

    return array_merge($left, [$base], $right);
}


function _randArray($count, $minRand, $maxRand): array
{
    if ($count != COUNT && $count > $maxRand - $minRand) {
        $minRand = 1;
        $maxRand = $count * 3;
    }
    $myArray = [];
    for ($i = 0; $i < $count; $i++) {
        do {
            $num = mt_rand($minRand, $maxRand);
        } while (in_array($num, $myArray));
        $myArray[] = $num;
    }
    return $myArray;
}


function getSortRandArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND)
{
    return quickSortLesson(_randArray($count, $minRand, $maxRand));
}

$arr = getSortRandArray();
$num = 3456;

function LinearSearch ($myArray, $num): ?string
{
    $n = 0;
    $count = count($myArray);

    for ($i=0; $i < $count; $i++) {
        $n++;
        if ($myArray[$i] == $num) return 'Число ' . $num . ' найдено за ' . $n . ' шагов.' . PHP_EOL;
    }
    return 'Число ' . $num . ' не найдено за ' . $n . ' шагов' . PHP_EOL;
}

echo LinearSearch($arr, $num);

function binarySearch ($myArray, $num) {
    $n = 0;

//определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;

    while ($left <= $right) {

//находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left)/2);
//если центральный элемент и есть искомый
        if ($myArray[$middle] == $num) {
            $n++;
            return 'Число ' . $num . ' найдено за ' . $n . ' шагов.' . PHP_EOL;
        }

        elseif ($myArray[$middle] > $num) {
            $n++;
//сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        }
        elseif ($myArray[$middle] < $num) {
            $n++;
            $left = $middle + 1;
        }
    }
    return 'Число ' . $num . ' не найдено за ' . $n . ' шагов' . PHP_EOL;
}

echo binarySearch($arr, $num);

function InterpolationSearch($myArray, $num)
{
    $n = 0;
    $start = 0;
    $last = count($myArray) - 1;

    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])) {

        $pos = floor($start + (
                (($last - $start) / ($myArray[$last] - $myArray[$start]))
                * ($num - $myArray[$start])
            ));
        if ($myArray[$pos] == $num) {
            $n++;
            return 'Число ' . $num . ' найдено за ' . $n . ' шагов.' . PHP_EOL;
        }

        if ($myArray[$pos] < $num) {
            $n++;
            $start = $pos + 1;
        }

        else {
            $n++;
            $last = $pos - 1;
        }
    }
    return 'Число ' . $num . ' не найдено за ' . $n . ' шагов' . PHP_EOL;
}

echo InterpolationSearch($arr, $num);