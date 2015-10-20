<?php

namespace App\Library;

class Session
{
    public static function init()
    {
        session_name('market_session');
        session_start();
    }
}
