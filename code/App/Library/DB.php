<?php

namespace App\Library;

class DB
{
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = 'root';
    private static $db_name = 'local';

    private static $mysqli = NULL;

    public static function init()
    {
        self::$mysqli = new \mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);
    }
    public static function insert($query)
    {
        return self::$mysqli->query($query);
    }
    public static function select($query)
    {
        $return = array();
        if ($result = self::$mysqli->query($query))
        {
            while($row = $result->fetch_assoc())
            {
                $return[] = $row;
            }
            $result->close();
        }
        return $return;
    }
    public static function escape($string)
    {
        return mysqli_real_escape_string($string);
    }
}
