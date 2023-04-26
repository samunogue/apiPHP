<?php

class DB
{
    public static function connect()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'teste';
        return new PDO("mysql:host={$host};dbname={$database};charset=UTF8;", $user, $password);
    }
}
