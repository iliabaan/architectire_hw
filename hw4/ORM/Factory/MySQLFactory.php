<?php

namespace Factory;


use Db\MySQL;
use Interfaces\DbFactoryInterface;

class MySQLFactory implements DbFactoryInterface
{
    private MySQL $connection;

    /**
     * MySQLFactory constructor.
     * @param MySQL $connection
     */
    public function __construct(MySQL $connection)
    {
        $this->connection = $connection;
    }

    public function dbConnection(): MySQL
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