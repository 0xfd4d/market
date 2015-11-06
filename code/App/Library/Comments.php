<?php

namespace App\Library;

class Comments
{
    public function getAllCommentsByItemId($id)
    {
        $query = DB::$db->prepare('SELECT * from comments JOIN users WHERE user_id=users.id AND item_id=? ORDER BY comments.id DESC');
        $query->execute([$id]);
        $result = $query->fetchAll();

        return $result;
    }
    public function putComment($item_id, $user_id, $body)
    {
        $query = DB::$db->prepare('INSERT INTO comments (item_id, user_id, body) VALUES (?,?,?)');
        $query->execute([$item_id, $user_id, $body]);
        $result = $query->fetch();

        return $result;
    }
    public function getCommentCount($item_id)
    {
        $query = DB::$db->prepare('SELECT COUNT(*) as count from comments WHERE item_id=?');
        $query->execute([$item_id]);
        $result = $query->fetch();

        return $result['count'];
    }
    public function validateComment($request)
    {
        $errors = [];
        if(!$request->hasPost('body'))
        {
            $errors[] = "Все поля обязательны";
        }
        return $errors;
    }
}
