<?php

namespace App\Library;

class DB
{
    public static $db = null;

    public static function init()
    {
        self::$db = new \PDO('mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASSWORD'));
    }
}
