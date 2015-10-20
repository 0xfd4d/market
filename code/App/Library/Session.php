<?php

namespace App\Library;

class Session
{
    public static function init()
    {
        session_save_path(__DIR__.'/../../resources/sessions');
        session_name('market_session');
        session_start();
    }
}
