<?php


class Database extends PDO
{
    function __construct()
    {
        parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_SCHEMA, DB_NEV, DB_PASS);
    }

}