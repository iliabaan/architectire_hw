<?php

/*
* Данные для подключения к БД не вынесены в config, следовательно, 
* могут возникнуть проблемы при подключении.
* Решение - создать config файл с константами и в параметры подключения вносить именно их.
*/

function getDb() {

    static $db = null;

    if (is_null($db)) {
        $db = @mysqli_connect("localhost", "admin", "1234", "database") or die("Could not connect: " . mysqli_connect_error());
    }

    return $db;
}
// $connect = @mysqli_connect("localhost", "admin", "1234", "database") or die('Ошибка подключения.');