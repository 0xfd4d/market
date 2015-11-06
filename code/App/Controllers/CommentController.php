<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Auth;
use App\Library\Items;
use App\Library\Request;
use App\Library\Comments;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $item = Items::getItemById($request->params[0]);
        $comments = Comments::getAllCommentsByItemId($request->params[0]);
        $comments_count = Comments::getCommentCount($request->params[0]);
        View::view('app', [
            'title' => 'Главная',
            'view' => 'items/comment',
            'params' => [
                    'request' => $request,
                    'item' => $item,
                    'comments' => $comments,
                    'comments_count' => $comments_count,
                ],
            ]
        );
    }
    public function store(Request $request)
    {
        if (!Auth::check()) {
            header('Location: /');
            exit();
        }
        $errors = Comments::validateComment($request);
        if (empty($errors[0])) {
            Comments::putComment($request->params[0], Auth::user()['id'], $request->post['body']);
            header('Location: /shop/'.$request->params[0]);
        } else {
            $request->errors = $errors;
            $this->create($request);
        }
    }
}
