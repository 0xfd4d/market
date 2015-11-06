<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Items;
use App\Library\Request;
use App\Library\Comments;
use App\Library\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Items::getItems();
        View::view('app', [
            'title' => 'Главная',
            'view' => 'items/index',
            'params' => [
                    'items' => $items,
                    'request' => $request,
                ],
            ]
        );
    }
    public function show(Request $request)
    {
        $item = Items::getItemById($request->params[0]);
        $comments = Comments::getAllCommentsByItemId($request->params[0]);
        echo '<pre>';
        print_r($comments);
        // View::view('app', [
        //     'title' => 'Главная',
        //     'view' => 'items/show',
        //     'params' => [
        //             'item' => $item,
        //         ],
        //     ]
        // );
    }
    public function create(Request $request)
    {
        if (!Auth::isAdmin()) {
            header('Location: /');
            exit();
        }
        View::view('app', [
            'title' => 'Создать',
            'view' => 'items/create',
            'params' => [
                    'request' => $request,
                ],
            ]
        );
    }
    public function store(Request $request)
    {
        if (!Auth::isAdmin()) {
            header('Location: /');
            exit();
        }
        $errors = Items::validateItem($request);
        if (empty($errors[0])) {
            Items::putItem($request);
            header('Location: /');
        } else {
            $request->errors = $errors;
            $this->create($request);
        }
    }
    public function edit(Request $request)
    {
        if (!Auth::isAdmin()) {
            header('Location: /');
            exit();
        }
        $item = Items::getItemById($request->params[0]);
        View::view('app', [
            'title' => 'Изменить',
            'view' => 'items/edit',
            'params' => [
                    'item' => $item,
                    'request' => $request,
                ],
            ]
        );
    }
    public function update(Request $request)
    {
        if (!Auth::isAdmin()) {
            header('Location: /');
            exit();
        }
        $errors = Items::validateItem($request);
        if (empty($errors[0])) {
            Items::updateItem($request);
            header('Location: /shop/'.$request->params[0]);
        } else {
            $request->errors = $errors;
            $this->edit($request);
        }
    }
    public function delete(Request $request)
    {
        if (!Auth::isAdmin()) {
            header('Location: /');
            exit();
        }
        Items::deleteItemById($request->params[0]);
        header('Location: /');
    }
}
