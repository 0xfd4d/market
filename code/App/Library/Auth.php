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
            print_r($result);
            self::$user = $result[0];
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
            $errors[] = "Please give a name";
        }
        if(!$request->hasPost('email'))
        {
            $errors[] = "Please give a email";
        }
        if(self::emailExists($request)>0)
        {
            $errors[] = "This email is already taken";
        }
        if(!$request->hasPost('password') || !$request->hasPost('password_confirm'))
        {
            $errors[] = "Please give a password";
        }
        else if(strlen($request->post['password']) < 6)
        {
            $errors[] = "Password length should be more then 6";
        }
        if($request->hasPost('password') != $request->hasPost('password_confirm'))
        {
            $errors[] = "Password and confirmation password do not match";
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
            $errors[] = "All fields required";
        }
        else if(self::validateLoginUser($request)<1)
        {
            $errors[] = "Invalid credentials";
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
