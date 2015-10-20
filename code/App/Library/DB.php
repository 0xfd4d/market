<?php

namespace App\Library;

class DB
{
    public static $db = NULL;

    public static function init()
    {
        self::$db = new \PDO("mysql:host=localhost;dbname=local", "root", "root");
    }
    // public static function query($query)
    // {
    //     return self::$mysqli->query($query);
    // }
    // public static function select($query)
    // {
    //     $return = array();
    //     if ($result = self::$mysqli->query($query))
    //     {
    //         while($row = $result->fetch_assoc())
    //         {
    //             $return[] = $row;
    //         }
    //         $result->close();
    //     }
    //     return $return;
    // }
    // public static function escape($string)
    // {
    //     return mysqli_real_escape_string($string);
    // }
}
