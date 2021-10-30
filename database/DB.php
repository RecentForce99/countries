<?php


class DB
{

    private static $db;

    public static function connect()
    {
        if(!self::$db)
        {
            $db = new PDO('mysql:host=test3;dbname=db', 'mysql', 'mysql');
            if ($db) {
                self::$db = $db;
            }
        }
        return self::$db;
    }

}