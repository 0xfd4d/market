<?php

namespace App\Library;

use App\Library\Session;
use App\Library\Request;

class Auth
{
    public static function isAdmin()
    {
        if(self::check())
        {
            if($_SESSION['auth']['id'] == 1)
            {
                return true;
            }
        }
        return false;
    }
    public static function check()
    {
        if(isset($_SESSION['auth']['loggedin']) && $_SESSION['auth']['loggedin'] == true)
            return true;
        return false;
    }
    public static function user()
    {
        if(self::check())
        {
            $query = DB::$db->prepare('SELECT * FROM users WHERE id=?');
            $query->execute([$_SESSION['auth']['id']]);
            $result = $query->fetchAll();
            return $result[0];
        }
        return false;
    }
    public static function logout()
    {
        session_destroy();
    }
    public static function validateRegistration(Request $request)
    {
        $errors = [];
        if(!$request->hasPost('name'))
        {
            $errors[] = "Введите имя";
        }
        if(!$request->hasPost('email'))
        {
            $errors[] = "Введите почту";
        }
        if(self::emailExists($request)>0)
        {
            $errors[] = "Эта почта уже занята";
        }
        if(!$request->hasPost('password') || !$request->hasPost('password_confirm'))
        {
            $errors[] = "Введите пароль";
        }
        else if(strlen($request->post['password']) < 6)
        {
            $errors[] = "Длина пароля должна быть больше 6";
        }
        if($request->hasPost('password') != $request->hasPost('password_confirm'))
        {
            $errors[] = "Пароли не совпдают";
        }
        return $errors;
    }
    private static function emailExists($request)
    {
        $query = DB::$db->prepare('SELECT COUNT(*) as count FROM users WHERE email=?');
        $query->execute([$request->post['email']]);
        $result = $query->fetchAll();
        return $result[0]['count'];
    }
    public static function validateLogin(Request $request)
    {
        $errors = [];
        if(!$request->hasPost('email') || !$request->hasPost('password'))
        {
            $errors[] = "Все поля обязательны";
        }
        else if(self::validateLoginUser($request)<1)
        {
            $errors[] = "Почта или Пароль введены не верно";
        }
        return $errors;
    }
    private static function validateLoginUser(Request $request)
    {
        $query = DB::$db->prepare('SELECT COUNT(*) as count FROM users WHERE email=? AND password=?');
        $query->execute([
            $request->post['email'],
            self::encryptPassword($request->post['password'])
            ]
        );
        $result = $query->fetchAll();
        return $result[0]['count'];
    }
    public function register(Request $request)
    {
        $query = DB::$db->prepare('INSERT INTO users (name, email, password) VALUES(?, ?, ?)');
        $query->execute([
            $request->post['name'],
            $request->post['email'],
            self::encryptPassword($request->post['password'])
            ]
        );
    }
    public function login(Request $request)
    {
        $query = DB::$db->prepare('SELECT * FROM users WHERE email=?');
        $query->execute([$request->post['email']]);
        $result = $query->fetch();
        $_SESSION['auth']['loggedin'] = true;
        $_SESSION['auth']['id'] = $result['id'];

    }
    public static function encryptPassword($password)
    {
        return sha1($password);
    }
}
