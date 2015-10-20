<?php

namespace App\Library;

class Items
{
    public static function getItems()
    {
        $query = DB::$db->prepare('SELECT * FROM items');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    public static function putItem($request)
    {
        $query = DB::$db->prepare('INSERT INTO items (name, price, image, description) VALUES (?, ?, ?, ?)');
        $query->execute([$request->post['name'], $request->post['price'], $request->post['image'], $request->post['description']]);
        $result = $query->fetch();
        return $result;
    }
}
