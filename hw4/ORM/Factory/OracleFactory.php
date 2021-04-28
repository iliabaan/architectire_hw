<?php

namespace Factory;


use Interfaces\DbFactoryInterface;
use Db\Oracle;

class OracleFactory implements DbFactoryInterface
{
    private Oracle $connection;

    /**
     * OracleFactory constructor.
     * @param Oracle $connection
     */
    public function __construct(Oracle $connection)
    {
        $this->connection = $connection;
    }

    public function dbConnection(): Oracle
    {
        return $this->connection;
    }

    public function dbRecord(): bool
    {
        return true;
    }

    public function dbQueryBuilder(): bool
    {
        return true;
    }
}
$o = new Oracle();
$d = new OracleFactory($o);