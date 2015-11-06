<?php

namespace App\Controllers;

use App\Library\Request;
use App\Library\Comments;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $query = Comments::putComment($request->params[0], 1, 'test');
        print_r($query);
    }
    public function store(Request $request)
    {
        $query = Comments::putComment($request->params[0], $request->params[1], $request->params[2]);
        print_r($query);
    }
}
