<?php


class Database
{

    private static $connection;
    private static $username = "root";
    private static $password = "0724886404Was";
    private static $host = "localhost";
    private static $port = "3306";
    private static $database = "cafethevibe";


    private static function getConnection()
    {
        if (Database::$connection == null) {
            Database::$connection = new mysqli(Database::$host, Database::$username, Database::$password, Database::$database, Database::$port);
        }
        return Database::$connection;
    }

    public static function getPrepareStatement($q)
    {
        return Database::getConnection()->prepare($q);
    }
}
