<?php

namespace App\Library;

use App\Library\Request;

class Items
{
    public static function getItems()
    {
        $query = DB::$db->prepare('SELECT * FROM items ORDER BY id desc');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    public static function putItem($request)
    {
        $query = DB::$db->prepare('INSERT INTO items (name, price, image, description) VALUES (?, ?, ?, ?)');
        $query->execute([$request->post['name'], $request->post['price'], $request->post['image'], $request->post['description']]);
        $result = $query->fetch();
        return $result[0];
    }
    public static function validateCreateItem($request)
    {
        $errors = [];
        if(!$request->hasPost('name') || !$request->hasPost('price') || !$request->hasPost('image') || !$request->hasPost('description'))
        {
            $errors[] = 'All fields required';
        }
        return $errors;
    }
}
