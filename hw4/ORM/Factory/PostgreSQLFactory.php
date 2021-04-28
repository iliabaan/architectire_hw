<?php

namespace Factory;


use Interfaces\DbFactoryInterface;
use Db\PostgreSQL;

class PostgreSQLFactory implements DbFactoryInterface
{
    private PostgreSQL $connection;

    /**
     * PostgreSQLFactory constructor.
     * @param PostgreSQL $connection
     */
    public function __construct(PostgreSQL $connection)
    {
        $this->connection = $connection;
    }

    public function dbConnection(): PostgreSQL
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