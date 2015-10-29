<?php

namespace App\Library;

class Cart
{
    public static function getItemsByUserId($user_id)
    {
        $items = DB::$db->prepare('SELECT * FROM items JOIN cart ON items.id = cart.item_id WHERE cart.user_id=?');
        $items->execute([$user_id]);
        $result = $items->fetchAll();

        return $result;
    }
    public static function putItemByUserId($user_id, $item_id)
    {
        $items = DB::$db->prepare('INSERT INTO cart (user_id, item_id) VALUES (?,?)');
        $items->execute([$user_id, $item_id]);
        $result = $items->fetch();

        return $result;
    }
}
