<?php


namespace Interfaces;


interface DbFactoryInterface
{
    public function dbConnection();

    public function dbRecord();

    public function dbQueryBuilder();
}