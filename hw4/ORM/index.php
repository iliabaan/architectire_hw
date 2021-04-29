<?php

namespace ORM;

use Db\{Oracle, PostgreSQL, MySQL};
use Factory\{MySQLFactory, OracleFactory, PostgreSQLFactory};

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^AbstractFactory/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});
$mysql = new MySQL();
$oracle = new Oracle();
$postgresql = new PostgreSQL();
$db = new MySQLFactory($mysql);
$db1 = new OracleFactory($oracle);
$db2 = new PostgreSQLFactory($postgresql);

var_dump($db);