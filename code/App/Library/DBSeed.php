<?php

namespace App\Library;

use App\Library\DB;
use App\Library\Auth;

Class DBSeed
{
    public function run()
    {
        DB::init();
        $user = DB::$db->prepare('INSERT INTO users (name, email, password) VALUES(?, ?, ?)');
        $user->execute([
                'admin',
                'mail@example.com',
                Auth::encryptPassword('qweqwe')
            ]
        );
        for($i=0; $i<5; $i++)
        {
            $item = DB::$db->prepare('INSERT INTO items (name, price, image, description) VALUES (?, ?, ?, ?)');
            $item->execute([
                'Lorem Ipsum',
                '10$',
                'http://lorempixel.com/400/200/technics',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                ]
            );
        }
    }
}
