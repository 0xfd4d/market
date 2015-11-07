<?php

namespace App\Library;

class Items
{
    public static function getItems()
    {
        $query = DB::$db->prepare('SELECT * FROM items ORDER BY id desc');
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    }
    public static function getItemById($id)
    {
        $query = DB::$db->prepare('SELECT * FROM items WHERE id=?');
        $query->execute([$id]);
        $result = $query->fetchAll();

        return $result[0];
    }
    public static function putItem($request)
    {
        $query = DB::$db->prepare('INSERT INTO items (name, price, image, description, littledescription) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$request->post['name'], $request->post['price'], $request->post['image'], $request->post['description'], $request->post['littledescription']]);
        $result = $query->fetch();

        return $result[0];
    }
    public static function validateItem($request)
    {
        $errors = [];
        if (!$request->hasPost('name') || !$request->hasPost('price') || !$request->hasPost('image') || !$request->hasPost('description') || !$request->hasPost('littledescription')) {
            $errors[] = 'Все поля обязательны';
        }
        if (!is_numeric($request->post['price'])) {
            $errors[] = 'Поле "Цена" должно быть в числовом формате';
        }

        return $errors;
    }
    public static function updateItem($request)
    {
        $query = DB::$db->prepare('UPDATE items SET name=?, price=?, image=?, description=?, littledescription=? WHERE id=?');
        $query->execute([$request->post['name'], $request->post['price'], $request->post['image'], $request->post['description'], $request->post['littledescription'], $request->params[0]]);
        $result = $query->fetch();

        return $result[0];
    }
    public static function deleteItemById($id)
    {
        $query = DB::$db->prepare('DELETE FROM items WHERE id=?');
        $query->execute([$id]);
        $result = $query->fetch();

        return $result;
    }
}
