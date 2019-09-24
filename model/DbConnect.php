<?php


class DbConnect
{
    protected static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = new PDO('mysql:host=localhost;dbname=p4-blog;charset=utf8', 'root', '');
        }
        return self::$connection;
    }
}