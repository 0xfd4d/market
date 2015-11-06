<?php

namespace App\Library;

class Comments
{
    public function getAllCommentsByItemId($id)
    {
        $query = DB::$db->prepare('SELECT * from comments JOIN users WHERE user_id=users.id AND item_id=?');
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
}
